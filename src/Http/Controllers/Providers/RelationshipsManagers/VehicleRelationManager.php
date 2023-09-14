<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\RelationshipsManagers;

use IlBronza\CRUD\Providers\RelationshipsManager;

class VehicleRelationManager Extends RelationshipsManager
{
	public function getAllRelationsParameters()
	{
		return [
			'show' => [
				'relations' => [
					'kmreadings' => config('vehicles.models.kmreading.controllers.index'),
					'type' => config('vehicles.models.type.controllers.show'),
					'schedules' => config('schedules.models.schedule.controllers.index'),
					'scheduledNotifications' => config('schedules.models.scheduledNotification.controllers.index'),
				]
			]
		];
	}
}