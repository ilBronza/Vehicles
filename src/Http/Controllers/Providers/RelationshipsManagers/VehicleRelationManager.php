<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\RelationshipsManagers;

use IlBronza\CRUD\Providers\RelationshipsManager\RelationshipsManager;
use IlBronza\Products\Models\Traits\Sellable\InteractsWithSupplierTrait;

class VehicleRelationManager Extends RelationshipsManager
{
	public  function getAllRelationsParameters() : array
	{
		$relations = [];

		if(in_array(InteractsWithSupplierTrait::class, class_uses_recursive($this->getModel())))
		{
			$relations['sellableSuppliers'] = $this->getModel()->getSellableSuppliersBySupplierRelationsManagerParameters();
			$relations['orderrows'] = $this->getModel()->getOrderrowsBySupplierRelationsManagerParameters();
			$relations['quotationrows'] = $this->getModel()->getQuotationrowsBySupplierRelationsManagerParameters();
		}

		$relations['kmreadings'] = config('vehicles.models.kmreading.controllers.index');
		// $relations['vehicleModel'] = config('vehicles.models.vehicleModel.controllers.show');
		// $relations['vehicleType'] = config('vehicles.models.vehicleType.controllers.show');
		// $relations['schedules'] = config('schedules.models.schedule.controllers.index');
		// $relations['scheduledNotifications'] = config('schedules.models.scheduledNotification.controllers.index');


		return [
			'show' => [
				'relations' => $relations
			]
		];
	}
}