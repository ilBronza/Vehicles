<?php

namespace IlBronza\Vehicles\Http\Controllers\Vehicles;

use IlBronza\CRUD\Traits\CRUDIndexTrait;
use IlBronza\CRUD\Traits\CRUDPlainIndexTrait;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleCRUD;

class VehicleIndexController extends VehicleCRUD
{
    use CRUDPlainIndexTrait;
    use CRUDIndexTrait;

    public $allowedMethods = ['index'];

    public function getIndexFieldsArray()
    {
        return config('vehicles.models.vehicle.fieldsGroupsFiles.index')::getFieldsGroup();
    }

    public function getRelatedFieldsArray()
    {
        return $this->getIndexFieldsArray();
        // return config('vehicles.models.vehicle.fieldsGroupsFiles.index')::getFieldsGroup();
    }

    public function getIndexElements()
    {
        return $this->getModelClass()::with('type')
                ->withCount('sellableSuppliers')
                ->withLastKmReading()
                ->get();
    }

}
