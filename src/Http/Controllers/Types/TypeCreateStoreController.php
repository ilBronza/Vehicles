<?php

namespace IlBronza\Vehicles\Http\Controllers\Types;

use IlBronza\CRUD\Traits\CRUDCreateStoreTrait;
use IlBronza\CRUD\Traits\CRUDRelationshipTrait;
use IlBronza\CRUD\Traits\CRUDShowTrait;

class TypeCreateStoreController extends TypeCRUD
{
    use CRUDCreateStoreTrait;
    use CRUDShowTrait;
    use CRUDRelationshipTrait;

    public $allowedMethods = ['create', 'store', 'edit', 'update', 'show'];

    public function getGenericParametersFile() : ? string
    {
        return config('vehicles.models.type.parametersFiles.create');
    }

    public function getRelationshipsManagerClass()
    {
        return config("products.models.{$this->configModelClassName}.relationshipsManagerClasses.show");
    }

    public function show(string $type)
    {
        $type = $this->findModel($type);

        return $this->_show($type);
    }
}
