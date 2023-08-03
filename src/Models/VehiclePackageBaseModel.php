<?php

namespace IlBronza\Vehicles\Models;


use IlBronza\CRUD\Models\BaseModel;
use IlBronza\CRUD\Traits\Model\CRUDUseUuidTrait;
use Illuminate\Support\Str;

class VehiclePackageBaseModel extends BaseModel
{
	use CRUDUseUuidTrait;

	protected $keyType = 'string';

	public function getRouteBaseNamePrefix() : ? string
	{
		return config('vehicles.routePrefix');
	}

	static function getModelConfigPrefix()
	{
		return static::$modelConfigPrefix ?? Str::camel(class_basename(static::class));
	}

	static function getProjectClassName()
	{
		return config('vehicles.models.' . static::getModelConfigPrefix() . '.class');
	}

	public function getTable()
	{
		return config("vehicles.models.{$this->getModelConfigPrefix()}.table");
	}

}