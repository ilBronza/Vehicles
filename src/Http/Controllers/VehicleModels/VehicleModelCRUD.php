<?php

namespace IlBronza\Vehicles\Http\Controllers\VehicleModels;

use IlBronza\Vehicles\Http\Controllers\CRUDVehiclesPackageController;

class VehicleModelCRUD extends CRUDVehiclesPackageController
{
	public ?bool $updateEditor = false;

	public $configModelClassName = 'vehicleModel';
}
