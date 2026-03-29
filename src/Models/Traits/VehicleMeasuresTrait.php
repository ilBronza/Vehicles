<?php

namespace IlBronza\Vehicles\Models\Traits;

use IlBronza\Vehicles\Models\Vehicle;

trait VehicleMeasuresTrait
{
	public function getMaximumWeightKg() : ? float
	{
		return $this->getVehicleModel()?->getMaximumWeightKg();
	}

	public function getSuggestedMaximumWeightKg() : ? float
	{
		return $this->getVehicleModel()?->getSuggestedMaximumWeightKg();
	}

	public function getMaximumVolumeMc() : ? float
	{
		return $this->getVehicleModel()?->getMaximumVolumeMc();
	}

	public function getSuggestedMaximumVolumeMc() : ? float
	{
		return $this->getVehicleModel()?->getSuggestedMaximumVolumeMc();
	}




}