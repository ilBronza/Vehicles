<?php

namespace IlBronza\Vehicles\Http\Controllers\VehicleTypes;

use IlBronza\CRUD\Traits\CRUDDeleteTrait;

class VehicleTypeDestroyController extends VehicleTypeCRUD
{
    use CRUDDeleteTrait;

    public $allowedMethods = ['destroy'];

    public function destroy($vehicleType)
    {
        $vehicleType = $this->findModel($vehicleType);

        return $this->_destroy($vehicleType);
    }
}
