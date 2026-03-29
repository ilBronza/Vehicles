<?php

namespace IlBronza\Vehicles\Http\Controllers\VehicleModels;

use IlBronza\CRUD\Traits\CRUDEditUpdateTrait;
use Illuminate\Http\Request;

class VehicleModelEditUpdateController extends VehicleModelCRUD
{
	use CRUDEditUpdateTrait;

	public $allowedMethods = ['edit', 'update'];

	public function edit(string $vehicleModel)
	{
		$vehicleModel = $this->findModel($vehicleModel);

		return $this->_edit($vehicleModel);
	}

	public function update(Request $request, $vehicleModel)
	{
		$vehicleModel = $this->findModel($vehicleModel);

		return $this->_update($request, $vehicleModel);
	}
}
