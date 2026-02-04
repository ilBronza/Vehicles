<?php

namespace IlBronza\Vehicles\Http\Controllers\Kmreadings;

use IlBronza\CRUD\Traits\CRUDIndexTrait;
use IlBronza\CRUD\Traits\CRUDPlainIndexTrait;
use IlBronza\Vehicles\Http\Controllers\Kmreadings\KmreadingCRUD;

class KmreadingIndexController extends KmreadingCRUD
{
    use CRUDPlainIndexTrait;
    use CRUDIndexTrait;

    public $allowedMethods = ['index'];

    public function getIndexFieldsArray()
    {
        return config('vehicles.models.kmreading.fieldsGroupsFiles.index')::getTracedFieldsGroup();
    }

    public function getRelatedFieldsArray()
    {
        return config('vehicles.models.kmreading.fieldsGroupsFiles.index')::getTracedFieldsGroup();
    }

    public function getIndexElements()
    {
        return $this->getModelClass()::with('vehicle')->get();
    }

}
