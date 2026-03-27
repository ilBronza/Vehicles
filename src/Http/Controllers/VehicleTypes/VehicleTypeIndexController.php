<?php

namespace IlBronza\Vehicles\Http\Controllers\VehicleTypes;

use IlBronza\CRUD\Traits\CRUDIndexTrait;
use IlBronza\CRUD\Traits\CRUDPlainIndexTrait;

class VehicleTypeIndexController extends VehicleTypeCRUD
{
    use CRUDPlainIndexTrait;
    use CRUDIndexTrait;

    public $allowedMethods = ['index'];

    public function getIndexFieldsArray()
    {
        return config('vehicles.models.vehicleType.fieldsGroupsFiles.index')::getTracedFieldsGroup();
    }

    public function getIndexElements()
    {
        return $this->getModelClass()::withCount(
            'vehicles'
        )->get();
    }

}
