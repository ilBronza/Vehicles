<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\RelationshipsManagers;

use IlBronza\CRUD\Providers\RelationshipsManager;

class TypeRelationManager Extends RelationshipsManager
{
	public function getAllRelationsParameters()
	{
		return [
			'show' => [
				'relations' => [
					'vehicles' => config('vehicles.models.vehicle.controllers.index')
				]
			]
		];
	}
}