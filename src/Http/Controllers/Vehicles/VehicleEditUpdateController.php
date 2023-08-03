<?php

namespace IlBronza\Vehicles\Http\Controllers\Vehicles;

use IlBronza\CRUD\Traits\CRUDEditUpdateTrait;
use Illuminate\Http\Request;

class VehicleEditUpdateController extends VehicleCRUD
{
    use CRUDEditUpdateTrait;

    public $allowedMethods = ['edit', 'update'];

    public function getGenericParametersFile() : ? string
    {
        return config('vehicles.models.vehicle.parametersFiles.create');
    }

    public function edit(string $vehicle)
    {
        $vehicle = $this->findModel($vehicle);

        return $this->_edit($vehicle);
    }

    public function update(Request $request, $vehicle)
    {
        $vehicle = $this->findModel($vehicle);

        return $this->_update($request, $vehicle);
    }
}
