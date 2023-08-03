<?php

namespace IlBronza\Vehicles\Http\Controllers\Vehicles;

use IlBronza\CRUD\Traits\CRUDDeleteTrait;

class VehicleDestroyController extends VehicleCRUD
{
    use CRUDDeleteTrait;

    public $allowedMethods = ['destroy'];

    public function destroy($vehicle)
    {
        $vehicle = $this->findModel($vehicle);

        return $this->_destroy($vehicle);
    }
}