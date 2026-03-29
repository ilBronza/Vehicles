<?php

namespace IlBronza\Vehicles\Models;

use IlBronza\Vehicles\Models\Traits\VehicleModelMeasuresTrait;
use Illuminate\Support\Collection;

class VehicleModel extends VehiclePackageBaseModel
{
	use VehicleModelMeasuresTrait;

	static $deletingRelationships = ['vehicles'];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::getProjectClassName(), 'vehicle_model_id');
	}

	public function getVehicles() : Collection
	{
		return $this->vehicles;
	}

	public function getFullLabel() : string
	{
		return trim(implode(' ', array_filter([$this->brand, $this->name])));
	}

	public function getFullLabelAttribute() : string
	{
		return $this->getFullLabel();
	}

	public function getLoadingVolumeCubicMeters() : ? float
	{
		return $this->getInternalWidth() * $this->getInternalLength() * $this->getInternalHeight() / (1000 * 1000 * 1000);
	}

	public function getPassengersCapacity() : ? int
	{
		return $this->passengers;
	}

	public function getExternalWidth() : ? float
	{
		return $this->external_width;
	}

	public function getExternalLength() : ? float
	{
		return $this->external_length;
	}

	public function getExternalHeight() : ? float
	{
		return $this->external_height;
	}

	public function getMassEmpty() : ? float
	{
		return $this->mass_empty;
	}

	public function getMorphClass()
	{
		return 'VehicleModel';
	}
}
