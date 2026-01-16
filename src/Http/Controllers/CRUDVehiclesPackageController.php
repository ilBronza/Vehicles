<?php

namespace IlBronza\Vehicles\Http\Controllers;

use IlBronza\CRUD\Http\Controllers\BasePackageController;

class CRUDVehiclesPackageController extends BasePackageController
{
	static $packageConfigPrefix = 'vehicles';

    public function getRouteBaseNamePrefix() : ? string
    {
        return config('vehicles.routePrefix');
    }

    public function setModelClass()
    {
        $this->modelClass = config("vehicles.models.{$this->configModelClassName}.class");
    }
}
