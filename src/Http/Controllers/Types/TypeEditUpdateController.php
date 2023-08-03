<?php

namespace IlBronza\Vehicles\Http\Controllers\Types;

use IlBronza\CRUD\Traits\CRUDEditUpdateTrait;
use Illuminate\Http\Request;

class TypeEditUpdateController extends TypeCRUD
{
    use CRUDEditUpdateTrait;

    public $allowedMethods = ['edit', 'update'];

    public function getGenericParametersFile() : ? string
    {
        return config('vehicles.models.type.parametersFiles.create');
    }

    public function edit(string $type)
    {
        $type = $this->findModel($type);

        return $this->_edit($type);
    }

    public function update(Request $request, $type)
    {
        $type = $this->findModel($type);

        return $this->_update($request, $type);
    }
}
