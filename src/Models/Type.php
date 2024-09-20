<?php

namespace IlBronza\Vehicles\Models;

use IlBronza\Vehicles\Models\Vehicle;
use Illuminate\Support\Collection;

class Type extends VehiclePackageBaseModel
{
	static $deletingRelationships = ['vehicles'];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::getProjectClassName());
	}

	public function getVehicles() : Collection
	{
		return $this->vehicles;
	}

	public function getVolumeMc() : float
	{
		return $this->internal_volume_mq;
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
}