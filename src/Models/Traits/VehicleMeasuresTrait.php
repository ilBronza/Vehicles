<?php

namespace IlBronza\Vehicles\Models\Traits;

use IlBronza\Vehicles\Models\Vehicle;

trait VehicleMeasuresTrait
{
	public function getMaximumWeightKg() : ? float
	{
		return $this->getType()?->getMaximumWeightKg();
	}

	public function getSuggestedMaximumWeightKg() : ? float
	{
		return $this->getType()?->getSuggestedMaximumWeightKg();
	}

	public function getMaximumVolumeMc() : ? float
	{
		return $this->getType()?->getMaximumVolumeMc();
	}

	public function getSuggestedMaximumVolumeMc() : ? float
	{
		return $this->getType()?->getSuggestedMaximumVolumeMc();
	}




}