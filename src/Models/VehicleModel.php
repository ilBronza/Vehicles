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

	public function vehicleType()
	{
		return $this->belongsTo(VehicleType::gpc(), 'vehicle_type');
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
		$w = $this->getFunctioningInternalWidth();
		$l = $this->getFunctioningInternalLength();
		$h = $this->getFunctioningInternalHeight();
		if ($w === null || $l === null || $h === null)
			return null;

		return $w * $l * $h / (1000 * 1000 * 1000);
	}

	public function getPassengersCapacity() : ? int
	{
		return $this->passengers;
	}

	public function getExternalWidth() : ? float
	{
		return $this->getMarchingExternalWidth();
	}

	public function getExternalLength() : ? float
	{
		return $this->getMarchingExternalLength();
	}

	public function getExternalHeight() : ? float
	{
		return $this->getMarchingExternalHeight();
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
