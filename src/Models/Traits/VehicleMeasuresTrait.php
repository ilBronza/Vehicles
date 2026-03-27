<?php

namespace IlBronza\Vehicles\Models\Traits;

use IlBronza\Vehicles\Models\Vehicle;

trait VehicleMeasuresTrait
{
	public function getMaximumWeightKg() : ? float
	{
		return $this->getVehicleType()?->getMaximumWeightKg();
	}

	public function getSuggestedMaximumWeightKg() : ? float
	{
		return $this->getVehicleType()?->getSuggestedMaximumWeightKg();
	}

	public function getMaximumVolumeMc() : ? float
	{
		return $this->getVehicleType()?->getMaximumVolumeMc();
	}

	public function getSuggestedMaximumVolumeMc() : ? float
	{
		return $this->getVehicleType()?->getSuggestedMaximumVolumeMc();
	}




}