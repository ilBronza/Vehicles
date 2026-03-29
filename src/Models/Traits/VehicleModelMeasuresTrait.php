<?php

namespace IlBronza\Vehicles\Models\Traits;

trait VehicleModelMeasuresTrait
{
	public function getMaximumWeightKg() : ? float
	{
		return $this->mass_max_loading;
	}

	public function getSuggestedMaximumWeightKg() : ? float
	{
		if ($this->mass_max_loading === null)
			return null;

		return $this->mass_max_loading * 0.8;
	}

	public function getCalculatedMaximumVolumeMc() : ? float
	{
		$l = $this->getFunctioningInternalLength();
		$w = $this->getFunctioningInternalWidth();
		$h = $this->getFunctioningInternalHeight();
		if ($l === null || $w === null || $h === null)
			return null;

		return round($l * $w * $h / 1000 / 1000 / 1000, 2);
	}

	public function getMaximumVolumeMc() : ? float
	{
		return $this->sizes_functioning_internal_volume_mq ?? $this->getCalculatedMaximumVolumeMc();
	}

	public function getSuggestedMaximumVolumeMc() : ? float
	{
		$max = $this->getMaximumVolumeMc();
		if ($max === null)
			return null;

		return $max * 0.8;
	}

	public function getMarchingExternalLength() : ? float
	{
		return $this->sizes_marching_external_length;
	}

	public function getMarchingExternalWidth() : ? float
	{
		return $this->sizes_marching_external_width;
	}

	public function getMarchingExternalHeight() : ? float
	{
		return $this->sizes_marching_external_height;
	}

	public function getMarchingInternalLength() : ? float
	{
		return $this->sizes_marching_internal_length;
	}

	public function getMarchingInternalWidth() : ? float
	{
		return $this->sizes_marching_internal_width;
	}

	public function getMarchingInternalHeight() : ? float
	{
		return $this->sizes_marching_internal_height;
	}

	public function getFunctioningExternalLength() : ? float
	{
		return $this->sizes_functioning_external_length;
	}

	public function getFunctioningExternalWidth() : ? float
	{
		return $this->sizes_functioning_external_width;
	}

	public function getFunctioningExternalHeight() : ? float
	{
		return $this->sizes_functioning_external_height;
	}

	public function getFunctioningInternalLength() : ? float
	{
		return $this->sizes_functioning_internal_length;
	}

	public function getFunctioningInternalWidth() : ? float
	{
		return $this->sizes_functioning_internal_width;
	}

	public function getFunctioningInternalHeight() : ? float
	{
		return $this->sizes_functioning_internal_height;
	}

	public function getInternalWidth() : ? float
	{
		return $this->getFunctioningInternalWidth();
	}

	public function getInternalLength() : ? float
	{
		return $this->getFunctioningInternalLength();
	}

	public function getInternalHeight() : ? float
	{
		return $this->getFunctioningInternalHeight();
	}
}
