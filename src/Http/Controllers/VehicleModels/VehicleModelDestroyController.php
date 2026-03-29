<?php

namespace IlBronza\Vehicles\Http\Controllers\VehicleModels;

use IlBronza\CRUD\Traits\CRUDDeleteTrait;

class VehicleModelDestroyController extends VehicleModelCRUD
{
	use CRUDDeleteTrait;

	public $allowedMethods = ['destroy'];

	public function destroy($vehicleModel)
	{
		$vehicleModel = $this->findModel($vehicleModel);

		return $this->_destroy($vehicleModel);
	}
}
