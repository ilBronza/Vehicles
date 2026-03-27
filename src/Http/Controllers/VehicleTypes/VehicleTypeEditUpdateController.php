<?php

namespace IlBronza\Vehicles\Http\Controllers\VehicleTypes;

use IlBronza\CRUD\Traits\CRUDEditUpdateTrait;
use Illuminate\Http\Request;

class VehicleTypeEditUpdateController extends VehicleTypeCRUD
{
    use CRUDEditUpdateTrait;

    public $allowedMethods = ['edit', 'update'];

    public function edit(string $vehicleType)
    {
        $vehicleType = $this->findModel($vehicleType);

        return $this->_edit($vehicleType);
    }

    public function update(Request $request, $vehicleType)
    {
        $vehicleType = $this->findModel($vehicleType);

        return $this->_update($request, $vehicleType);
    }
}
