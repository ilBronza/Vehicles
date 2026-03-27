<?php

namespace IlBronza\Vehicles\Http\Controllers\VehicleTypes;

use IlBronza\Vehicles\Http\Controllers\CRUDVehiclesPackageController;

class VehicleTypeCRUD extends CRUDVehiclesPackageController
{
	public ?bool $updateEditor = false;

    public $configModelClassName = 'vehicleType';
}
