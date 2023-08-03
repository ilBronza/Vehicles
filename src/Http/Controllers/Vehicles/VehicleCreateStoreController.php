<?php

namespace IlBronza\Vehicles\Http\Controllers\Vehicles;

use IlBronza\CRUD\Traits\CRUDCreateStoreTrait;
use IlBronza\CRUD\Traits\CRUDRelationshipTrait;
// use IlBronza\CRUD\Traits\CRUDShowTrait;

class VehicleCreateStoreController extends VehicleCRUD
{
    use CRUDCreateStoreTrait;
    // use CRUDShowTrait;
    use CRUDRelationshipTrait;

    public $allowedMethods = [
        'create',
        'store',
        // 'edit',
        // 'update',
        // 'show'
    ];

    public function getGenericParametersFile() : ? string
    {
        return config('vehicles.models.vehicle.parametersFiles.create');
    }

    // public function getRelationshipsManagerClass()
    // {
    //     return config("vehicles.models.{$this->configModelClassName}.relationshipsManagerClasses.show");
    // }

    // public function show(string $vehicle)
    // {
    //     $vehicle = $this->findModel($vehicle);

    //     return $this->_show($vehicle);
    // }
}
