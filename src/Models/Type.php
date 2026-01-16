<?php

namespace IlBronza\Vehicles\Models;

use IlBronza\Vehicles\Models\Traits\VehicleTypeMeasuresTrait;
use IlBronza\Vehicles\Models\Vehicle;
use Illuminate\Support\Collection;

class Type extends VehiclePackageBaseModel
{
	use VehicleTypeMeasuresTrait;

	static $deletingRelationships = ['vehicles'];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::getProjectClassName());
	}

	public function getVehicles() : Collection
	{
		return $this->vehicles;
	}

	//		deprecato, usare getVolumeMc
//	public function getVolumeMc() : float
//	{
////		return $this->internal_volume_mq;
//	}

	public function getLoadingVolumeCubicMeters() : ? float
	{
		return $this->getInternalWidth() * $this->getInternalLength() * $this->getInternalHeight() / (1000 * 1000 * 1000);
	}

	public function getPassengersCapacity() : ? int
	{
		return $this->passengers;
	}

	public function getInternalWidth() : ? float
	{
		return $this->internal_width;
	}

	public function getInternalLength() : ? float
	{
		return $this->internal_length;
	}

	public function getInternalHeight() : ? float
	{
		return $this->internal_height;
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
}