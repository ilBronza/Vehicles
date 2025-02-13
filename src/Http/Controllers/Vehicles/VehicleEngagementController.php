<?php

namespace IlBronza\Vehicles\Http\Controllers\Vehicles;

use Carbon\Carbon;
use IlBronza\CRUD\Traits\CRUDIndexTrait;
use IlBronza\Products\Models\Order;
use IlBronza\Products\Models\Orders\Orderrow;
use IlBronza\Products\Models\Sellables\Sellable;
use IlBronza\Products\Models\Sellables\SellableSupplier;
use IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups\VehicleDaysBaseFieldsGroupParametersFile;
use IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups\VehicleDaysFieldsGroupParametersHelper;
use IlBronza\Vehicles\Models\Type;
use Illuminate\Http\Request;

use function array_keys;
use function class_basename;
use function collect;
use function get_class_methods;
use function request;

class VehicleEngagementController extends VehicleCRUD
{
	use CRUDIndexTrait;

	public $allowedMethods = ['index'];

	public function getBaseDate() : Carbon
	{
		return Carbon::now()->subMonths(2);
	}

	public function getStartsAt() : Carbon
	{
		return request()->startsAt ?? $this->getBaseDate()->subDays(15);
	}

	public function getEndsAt() : Carbon
	{
		return request()->endsAt ?? $this->getBaseDate()->endOfMonth()->addDays(15);
	}

	public function getIndexFieldsArray()
	{
		//VehicleDaysFieldsGroupParametersFile
		return VehicleDaysFieldsGroupParametersHelper::getCalendarFieldsGroupsByDates(
			VehicleDaysBaseFieldsGroupParametersFile::class, $this->getStartsAt(), $this->getEndsAt()
		);
	}

	public function index(Request $request)
	{
		return $this->_index($request);
	}

	public function beforeRenderIndex()
	{
		$this->table->addHtmlClass('engagement');
	}

	public function getIndexElements()
	{
		$this->sellableSuppliersIdsDictionary = [];

		$vehicleTypesIds = Type::gpc()::select('id')->whereIn('name', ['bilico', 'autocarro'])->pluck('id');

		$sellablesIds = Sellable::gpc()::whereIn('target_id', $vehicleTypesIds)->where('target_type', 'type')->pluck('id');

		$sellableSuppliers = SellableSupplier::gpc()::with('supplier.target')->whereIn('sellable_id', $sellablesIds)->get();

		foreach ($sellableSuppliers as $sellableSupplier)
			$this->sellableSuppliersIdsDictionary[$sellableSupplier->getKey()] = [
				'vehicle' => $sellableSupplier->supplier->getTarget(),
				'sellableSupplier' => $sellableSupplier,
				'orderrows' => collect()
			];

		$ordersIds = Order::gpc()::select('id')->whereHas('extraFields', function ($query)
		{
			$query->whereBetween('starts_at', [$this->getStartsAt(), $this->getEndsAt()])->orWhereBetween('ends_at', [$this->getStartsAt(), $this->getEndsAt()]);
		})->pluck('id');

		$orderrows = Orderrow::gpc()::with('order')->whereIn('sellable_supplier_id', array_keys($this->sellableSuppliersIdsDictionary))->where(function ($query) use ($ordersIds)
		{
			$query->whereIn('order_id', $ordersIds);
			$query->orWhere(function ($_query)
			{
				$_query->whereBetween('starts_at', [$this->getStartsAt(), $this->getEndsAt()]);
				$_query->orWhereBetween('ends_at', [$this->getStartsAt(), $this->getEndsAt()]);
			});
		})->get();

		foreach ($orderrows as $orderrow)
			$this->sellableSuppliersIdsDictionary[$orderrow->sellable_supplier_id]['orderrows']->push($orderrow);

		$sellableSuppliers = collect();

		foreach ($this->sellableSuppliersIdsDictionary as $vehicleParameters)
		{
			$sellableSupplier = $vehicleParameters['sellableSupplier'];

//			$vehicle = $vehicleParameters['vehicle'];

			if(class_basename($sellableSupplier->getSellable()->getTarget()) != 'Type')
				continue;

			$sellableSupplier->setRelation('orderrows', $vehicleParameters['orderrows']);

			$sellableSuppliers->push($sellableSupplier);
		}

		return $sellableSuppliers;
	}
}
