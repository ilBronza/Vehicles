<?php

namespace IlBronza\Vehicles\Http\Controllers\VehicleModels;

use IlBronza\CRUD\Traits\CRUDRelationshipTrait;
use IlBronza\CRUD\Traits\CRUDShowTrait;

class VehicleModelShowController extends VehicleModelCRUD
{
	use CRUDShowTrait;
	use CRUDRelationshipTrait;

	public $allowedMethods = ['show'];

	public function getGenericParametersFile() : ? string
	{
		return config('vehicles.models.vehicleModel.parametersFiles.create');
	}

	public function getRelationshipsManagerClass()
	{
		return config("vehicles.models.{$this->configModelClassName}.relationshipsManagerClasses.show");
	}

	public function show(string $vehicleModel)
	{
		$vehicleModel = $this->findModel($vehicleModel);

		return $this->_show($vehicleModel);
	}
}
