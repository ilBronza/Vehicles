<?php

namespace IlBronza\Vehicles\Http\Controllers\Kmreadings;

use Carbon\Carbon;
use IlBronza\CRUD\Traits\CRUDCreateStoreTrait;
use IlBronza\CRUD\Traits\CRUDRelationshipTrait;
use IlBronza\Vehicles\Models\Vehicle;

class KmreadingCreateStoreController extends KmreadingCRUD
{
    use CRUDCreateStoreTrait;
    use CRUDRelationshipTrait;

	public $returnBack = true;

    public $allowedMethods = [
        'createFromVehicle',
        'create',
        'store',
    ];

    public function getModelDefaultParameters() : array
    {
        $result = [
            'registered_at' => Carbon::now()
        ];

        if($this->vehicle ?? false)
            $result['vehicle_id'] = $this->vehicle->getKey();

        return $result;
    }

    public function createFromVehicle(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;

        return $this->create();
    }

    public function getGenericParametersFile() : ? string
    {
        return config('vehicles.models.kmreading.parametersFiles.create');
    }

    public function getRelationshipsManagerClass()
    {
        return config("vehicles.models.{$this->configModelClassName}.relationshipsManagerClasses.show");
    }
}
