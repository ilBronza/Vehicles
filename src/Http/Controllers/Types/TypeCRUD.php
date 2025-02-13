<?php

namespace IlBronza\Vehicles\Http\Controllers\Types;

use IlBronza\Vehicles\Http\Controllers\CRUDVehiclesPackageController;

class TypeCRUD extends CRUDVehiclesPackageController
{
	public ?bool $updateEditor = false;

    public $configModelClassName = 'type';
}
