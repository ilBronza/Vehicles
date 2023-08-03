<?php

namespace IlBronza\Vehicles\Models\Traits;

use IlBronza\Vehicles\Models\Vehicle;

trait InteractsWithVehicle
{
	abstract function getTotalVolumeMc() : float;

	public function vehicle()
	{
		return $this->belongsTo(Vehicle::getProjectClassName());
	}

	public function getVehicle() : ? Vehicle
	{
		return $this->vehicle;
	}

	public function willOverload() : null|bool|array
	{
		if(! $vehicle = $this->getVehicle())
			return null;

		if($this->getTotalVolumeMc() > $vehicle->getVolumeMc())
			return ['overloaded'];

		return false;
	}

	public function getIsOverloadedAttribute()
	{
		return $this->willOverload();
	}
}