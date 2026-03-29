<?php

namespace IlBronza\Vehicles\Models;

use IlBronza\Category\Traits\InteractsWithCategoryStandardMethodsTrait;
use IlBronza\Category\Traits\InteractsWithCategoryTrait;
use Illuminate\Support\Collection;

class VehicleType extends VehiclePackageBaseModel
{
	use InteractsWithCategoryTrait;
	use InteractsWithCategoryStandardMethodsTrait;

	static $deletingRelationships = ['vehicles'];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::getProjectClassName(), 'type_id');
	}

	public function vehicleModels()
	{
		return $this->hasMany(VehicleModel::getProjectClassName(), 'vehicle_type');
	}

	public function getVehicles() : Collection
	{
		return $this->vehicles;
	}

	public function getMorphClass()
	{
		return 'VehicleType';
	}
}
