<?php

namespace IlBronza\Vehicles\Http\Controllers\Types;

use IlBronza\CRUD\Traits\CRUDDeleteTrait;

class TypeDestroyController extends TypeCRUD
{
    use CRUDDeleteTrait;

    public $allowedMethods = ['destroy'];

    public function destroy($type)
    {
        $type = $this->findModel($type);

        return $this->_destroy($type);
    }
}