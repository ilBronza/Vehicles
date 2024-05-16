<?php

namespace IlBronza\Vehicles\Models;


use IlBronza\CRUD\Models\PackagedBaseModel;
use IlBronza\CRUD\Traits\Model\CRUDUseUuidTrait;
use Illuminate\Support\Str;

class VehiclePackageBaseModel extends PackagedBaseModel
{
	use CRUDUseUuidTrait;

	static $packageConfigPrefix = 'vehicles';

	protected $keyType = 'string';

	public function getRouteBaseNamePrefix() : ? string
	{
		return config('vehicles.routePrefix');
	}

	static function getModelConfigPrefix()
	{
		return static::$modelConfigPrefix ?? Str::camel(class_basename(static::class));
	}

	static function getProjectClassName() : string
	{
		return config('vehicles.models.' . static::getModelConfigPrefix() . '.class');
	}

	public function getTable() : string
	{
		return config("vehicles.models.{$this->getModelConfigPrefix()}.table");
	}

}