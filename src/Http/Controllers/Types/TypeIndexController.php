<?php

namespace IlBronza\Vehicles\Http\Controllers\Types;

use IlBronza\CRUD\Traits\CRUDIndexTrait;
use IlBronza\CRUD\Traits\CRUDPlainIndexTrait;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleCRUD;

class TypeIndexController extends TypeCRUD
{
    use CRUDPlainIndexTrait;
    use CRUDIndexTrait;

    public $allowedMethods = ['index'];

    public function getIndexFieldsArray()
    {
        return config('vehicles.models.type.fieldsGroupsFiles.index')::getFieldsGroup();
    }

    public function getIndexElements()
    {
        return $this->getModelClass()::all();
    }

}
