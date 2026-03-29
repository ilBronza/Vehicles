<?php

namespace IlBronza\Vehicles\Http\Controllers\VehicleModels;

use IlBronza\CRUD\Traits\CRUDIndexTrait;
use IlBronza\CRUD\Traits\CRUDPlainIndexTrait;

class VehicleModelIndexController extends VehicleModelCRUD
{
	use CRUDPlainIndexTrait;
	use CRUDIndexTrait;

	public $allowedMethods = ['index'];

	public function getIndexFieldsArray()
	{
		return config('vehicles.models.vehicleModel.fieldsGroupsFiles.index')::getTracedFieldsGroup();
	}

	public function getIndexElements()
	{
		return $this->getModelClass()::withCount(
			'vehicles'
		)->get();
	}
}
