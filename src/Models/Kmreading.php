<?php

namespace IlBronza\Vehicles\Models;

use App\Models\ProjectSpecific\User;
use IlBronza\CRUD\Traits\Model\CRUDCreatedByUserTrait;
use IlBronza\Vehicles\Models\Vehicle;

class Kmreading extends VehiclePackageBaseModel
{
	use CRUDCreatedByUserTrait;

	protected $dates = [
		'registered_at'
	];

	public function getKm() : ? float
	{
		return $this->km;
	}

	public function vehicle()
	{
		return $this->belongsTo(Vehicle::getProjectClassName());
	}

	public function getVehicle() : ? Vehicle
	{
		return $this->vehicle;
	}

	public function user()
	{
		return $this->belongsTo(User::getProjectClassName());
	}

	public function getUser() : ? User
	{
		return $this->user;
	}
}