<?php

namespace IlBronza\Vehicles\Http\Controllers\Kmreadings;

use IlBronza\CRUD\Traits\CRUDRelationshipTrait;
use IlBronza\CRUD\Traits\CRUDShowTrait;

class KmreadingShowController extends KmreadingCRUD
{
    use CRUDShowTrait;
    use CRUDRelationshipTrait;

    public $allowedMethods = ['show'];

    public function getGenericParametersFile() : ? string
    {
        return config('vehicles.models.kmreading.parametersFiles.show');
    }

    public function getRelationshipsManagerClass()
    {
        return config("vehicles.models.{$this->configModelClassName}.relationshipsManagerClasses.show");
    }

    public function show(string $kmreading)
    {
        $kmreading = $this->findModel($kmreading);

        return $this->_show($kmreading);
    }
}
