<?php

namespace IlBronza\Vehicles\Models\Traits;

trait VehicleTypeMeasuresTrait
{
	public function getMaximumWeightKg() : ? float
	{
		return $this->mass_max_loading;
	}

	public function getSuggestedMaximumWeightKg() : ? float
	{
		return $this->mass_max_loading * 0.8;
	}

	public function getCalculatedMaximumVolumeMc() : ? float
	{
		return round($this->getInternalWidth() * $this->getInternalLength() * $this->getInternalHeight() / 1000 / 1000 / 1000, 2);
	}

	public function getMaximumVolumeMc() : ? float
	{
		return $this->internal_volume_mq ?? $this->getCalculatedMaximumVolumeMc();
	}

	public function getSuggestedMaximumVolumeMc() : ? float
	{
		return $this->getMaximumVolumeMc() * 0.8;
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




}