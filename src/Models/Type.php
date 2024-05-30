<?php

namespace IlBronza\Vehicles\Models;

use IlBronza\Vehicles\Models\Vehicle;

class Type extends VehiclePackageBaseModel
{
	static $deletingRelationships = ['vehicles'];

	public function vehicles()
	{
		return $this->hasMany(Vehicle::getProjectClassName());
	}

	public function getVolumeMc() : float
	{
		return $this->internal_volume_mq;
	}

	public function getPassengersCapacity() : ? int
	{
		return $this->passengers;
	}
}