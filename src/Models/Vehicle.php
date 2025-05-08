<?php

namespace IlBronza\Vehicles\Models;

use Carbon\Carbon;
use IlBronza\Buttons\Button;
use IlBronza\CRUD\Models\Casts\CastFieldPrice;
use IlBronza\Prices\Models\Traits\InteractsWithPriceTrait;
use IlBronza\Products\Models\Interfaces\SellableItemInterface;
use IlBronza\Products\Models\Interfaces\SellableSupplierPriceCreatorBaseClass;
use IlBronza\Products\Models\Sellables\Supplier;
use IlBronza\Products\Models\Traits\Sellable\InteractsWithSellableTrait;
use IlBronza\Schedules\Models\Type as ScheduleType;
use IlBronza\Schedules\Traits\InteractsWithSchedule;
use IlBronza\Vehicles\Helpers\VehiclePricesCreatorHelper;
use IlBronza\Vehicles\Models\Kmreading;
use IlBronza\Vehicles\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;

use function is_string;

class Vehicle extends VehiclePackageBaseModel //implements SellableItemInterface
{
	use InteractsWithSchedule;
//	use InteractsWithSellableTrait;
//	use InteractsWithPriceTrait;

	protected $casts = [
		'registered_at' => 'date'
	];

//	protected $casts = [
//		'distance_price' => CastFieldPrice::class . ':distancePrice,km',
//	];

//	public function getNameForSellable(...$parameters) : string
//	{
//		return $this->getFullName();
//	}

	public function owner() : MorphTo
	{
		return $this->morphTo();
	}

	public function getOwner() : ?Model
	{
		return $this->owner;
	}

//	public function getPossibleSuppliersElements() : Collection
//	{
//		if ($owner = $this->getOwner())
//			return collect([
//				$owner
//			]);
//
//		return collect();
//	}

//	public function getPriceCreator() : SellableSupplierPriceCreatorBaseClass
//	{
//		return new VehiclePricesCreatorHelper;
//	}
//
//	public function getSellablePricesBySupplier(Supplier $supplier, ...$parameters) : array
//	{
//		return [];
//	}

	public function getMorphClass()
	{
		return 'Vehicle';
	}

	public function getSchedulableModelNameAttribute() : string
	{
		return trans('vehicles::vehicles.vehicle');
	}

	public function getSchedulableModelTableFieldsArray() : array
	{
		return [
			'fields' => [
				'plate' => 'flat',
				'current_km' => 'flat'
			]
		];
	}

	/**
	 * END schedule interactions
	 **/

	static $deletingRelationships = ['kmreadings'];

	public function getCreateKmreadingButton() : Button
	{
		return Button::create([
			'href' => $this->getCreateKmreadingUrl(),
			'text' => 'vehicles::kmreading.create',
			'icon' => 'plus'
		]);
	}

	public function getCreateKmreadingUrl()
	{
		return route(config('vehicles.routePrefix') . 'vehicles.kmreadings.create', ['vehicle' => $this]);
	}

	public function getCurrentKmAttribute() : ?float
	{
		return $this->getLastKmreading()?->getKm();
	}

	public function type()
	{
		return $this->belongsTo(Type::getProjectClassName());
	}

	public function getType() : ?Type
	{
		return $this->type;
	}

	public function getLastKmreading() : ?Kmreading
	{
		if ($this->relationLoaded('lastKmreading'))
			return $this->lastKmreading;

		return $this->kmreadings()->orderBy('created_at', 'DESC')->first();
	}

	public function kmreadings()
	{
		return $this->hasMany(Kmreading::getProjectClassName());
	}

	public function lastKmreading()
	{
		return $this->hasOne(Kmreading::getProjectClassName(), 'id', 'live_last_kmreading_id');
	}

	public function getPassengersCapacity() : ?int
	{
		return $this->getType()->getPassengersCapacity();
	}

	public function scopeByType($query, string|array $type)
	{
		if(is_string($type))
			$type = [$type];

		$query->whereHas('type', function ($query) use ($type)
		{
			$query->whereIn('name', $type);
		});
	}

	public function scopeWithLastKmreading($query)
	{
		$query->addSelect([
			'live_last_kmreading_id' => Kmreading::select('id')->whereColumn(config('vehicles.models.kmreading.table') . '.vehicle_id', $this->getTable() . '.id')->orderBy('created_at', 'DESC')->take(1)
		])->with('lastKmreading');
	}

	//'deprecato, usare getLoadingVolume'
//	public function getVolumeMc()
//	{
////		return $this->getType()->getVolumeMc();
//	}

	public function getLoadingVolumeCubicMeters()
	{
		return $this->getType()->getLoadingVolumeCubicMeters();
	}

	public function getRCAStartingValue()// : Carbon
	{
		$rca = ScheduleType::getProjectClassName()::findCachedField('name', 'Assicurazione RCA');

		if ($schedule = $this->getLatestByType($rca))
			if (($deadline = $schedule->getDeadlineValue()) > Carbon::now())
				return $deadline;

		return Carbon::now();
	}

	public function getLastCarInspection() : Carbon
	{
		$carInspectionTypes = ScheduleType::getProjectClassName()::where('name', 'like', '%revisione%')->get();

		if($schedule = $this->schedules()->byTypes($carInspectionTypes)->orderByDesc('deadline_value')->first())
			$schedule->getDeadlineValue();

		return $this->getImmatricolationDate();
	}

	public function getImmatricolationDate() : Carbon
	{
		return $this->created_at;
	}

	public function getPlate() : ?string
	{
		return $this->plate;
	}

	public function getFullName() : ? string
	{
		return $this->full_name;
	}

	public function getFullNameAttribute() : ? string
	{
		if(! $this->getPlate())
			return $this->getName();

		return "{$this->getName()} - {$this->getPlate()}";
	}

	public function getCreatedAt()
	{
		return $this->created_at;
	}
}