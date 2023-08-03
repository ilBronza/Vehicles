<?php

namespace IlBronza\Vehicles\Http\Controllers;

use IlBronza\CRUD\CRUD;

class CRUDVehiclesPackageController extends CRUD
{
    public function getRouteBaseNamePrefix() : ? string
    {
        return config('vehicles.routePrefix');
    }

    public function setModelClass()
    {
        $this->modelClass = config("vehicles.models.{$this->configModelClassName}.class");
    }
}
