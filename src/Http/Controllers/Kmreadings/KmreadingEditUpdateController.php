<?php

namespace IlBronza\Vehicles\Http\Controllers\Kmreadings;

use IlBronza\CRUD\Traits\CRUDEditUpdateTrait;
use Illuminate\Http\Request;

class KmreadingEditUpdateController extends KmreadingCRUD
{
	use CRUDEditUpdateTrait;

	public $allowedMethods = ['edit', 'update'];

	public function getGenericParametersFile() : ? string
	{
		return config('vehicles.models.kmreading.parametersFiles.edit');
	}

	public function getEditParametersFile() : ? string
	{
		return config('vehicles.models.kmreading.parametersFiles.edit');
	}

	public function edit(string $kmreading)
	{
		$kmreading = $this->findModel($kmreading);

		return $this->_edit($kmreading);
	}

	public function update(Request $request, string $kmreading)
	{
		$kmreading = $this->findModel($kmreading);

		return $this->_update($request, $kmreading);
	}
}
