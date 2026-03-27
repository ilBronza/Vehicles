<?php

namespace IlBronza\Vehicles\Http\Controllers\VehicleTypes;

use IlBronza\CRUD\Traits\CRUDRelationshipTrait;
use IlBronza\CRUD\Traits\CRUDShowTrait;

class VehicleTypeShowController extends VehicleTypeCRUD
{
    use CRUDShowTrait;
    use CRUDRelationshipTrait;

    public $allowedMethods = ['show'];

    public function getGenericParametersFile() : ? string
    {
        return config('vehicles.models.vehicleType.parametersFiles.create');
    }

    public function getRelationshipsManagerClass()
    {
        return config("vehicles.models.{$this->configModelClassName}.relationshipsManagerClasses.show");
    }

    public function show(string $vehicleType)
    {
        $vehicleType = $this->findModel($vehicleType);

        return $this->_show($vehicleType);
    }
}
