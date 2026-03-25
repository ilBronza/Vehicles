<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Prices\Models\Interfaces\WithPriceInterface;
use IlBronza\Prices\Models\Traits\HasCustomPricesTrait;
use IlBronza\Prices\Models\Traits\InteractsWithPriceTrait;
use IlBronza\Prices\Models\Traits\UpdatePricesOnSaveTrait;
use IlBronza\Products\Models\Interfaces\SellableItemInterface;
use IlBronza\Products\Models\Interfaces\SellableSupplierPriceCreatorBaseClass;
use IlBronza\Products\Models\Traits\Sellable\InteractsWithSellableTrait;
use IlBronza\Vehicles\Models\VehicleType as IbVehicleType;
use Illuminate\Support\Collection;

class VehicleType extends IbVehicleType implements SellableItemInterface, WithPriceInterface
{
	use HasCustomPricesTrait;
	use InteractsWithSellableTrait;
	use InteractsWithPriceTrait;
	use UpdatePricesOnSaveTrait;

	protected $casts = [
		//'distance_price' => CastFieldPrice::class . ':distancePrice,km',
	];

	public function getPriceFieldsForSellable() : array
	{
		return [
			'cost_per_km',
			'cost_per_movimentation',
		];
	}

	public function getPossibleSuppliersElements() : Collection
	{
		return $this->vehicles()->with('supplier')->get()->pluck('supplier')->filter();
	}

	public function getPriceCreator() : SellableSupplierPriceCreatorBaseClass
	{
		$class = config('vehicles.models.vehicleType.helpers.sellableSupplierPricesCreator');

		dd('sostituiamo con dei comandi?');

		dd($class);

		return new $class;
		return new VehiclePricesCreatorHelper;
	}

	public function mustAutomaticallyUpdatePrices() : bool
	{
		return false;
	}

	public function getEditParametersFile() : string
	{
		return $this->getCompulsoryConfigByKey('parametersFiles.editSellable');
	}

}
