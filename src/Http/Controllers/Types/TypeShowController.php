<?php

namespace IlBronza\Vehicles\Http\Controllers\Types;

use IlBronza\CRUD\Traits\CRUDRelationshipTrait;
use IlBronza\CRUD\Traits\CRUDShowTrait;

class TypeShowController extends TypeCRUD
{
    use CRUDShowTrait;
    use CRUDRelationshipTrait;

    public $allowedMethods = ['show'];

    public function getGenericParametersFile() : ? string
    {
        return config('vehicles.models.type.parametersFiles.create');
    }

    public function getRelationshipsManagerClass()
    {
        return config("vehicles.models.{$this->configModelClassName}.relationshipsManagerClasses.show");
    }

    public function show(string $type)
    {
        $type = $this->findModel($type);

        return $this->_show($type);
    }
}
