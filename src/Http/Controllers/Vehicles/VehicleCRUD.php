<?php

namespace IlBronza\Vehicles\Http\Controllers\Vehicles;

use IlBronza\Vehicles\Http\Controllers\CRUDVehiclesPackageController;

class VehicleCRUD extends CRUDVehiclesPackageController
{
	public ?bool $updateEditor = false;
    public $configModelClassName = 'vehicle';
}
