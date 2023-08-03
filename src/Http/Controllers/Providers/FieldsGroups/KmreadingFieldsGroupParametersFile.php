<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use App\Models\ProjectSpecific\User;
use IlBronza\Datatables\Providers\FieldsGroupParametersFile;
use IlBronza\Vehicles\Models\Vehicle;

class KmreadingFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
            'fields' => 
            [
                'mySelfPrimary' => 'primary',
                'mySelfEdit' => 'links.edit',
                'mySelfSee' => 'links.see',

                'km' => 'flat',
                'registered_at' => 'dates.datetime',

                'vehicle_id' => [
                    'type' => 'links.LinkCachedProperty',
                    'modelClass' => Vehicle::getProjectClassName(),
                    'property' => 'name',
                    'avoidIcon' => true
                ],

                'user_id' => [
                    'type' => 'links.LinkCachedProperty',
                    'modelClass' => User::class,
                    'property' => 'name',
                    'avoidIcon' => true
                ],

                // 'plate' => 'flat',
                // 'registered_at' => 'flat',

                // 'initial_km' => 'flat',
                // 'current_km' => 'flat',

                'mySelfDelete' => 'links.delete'
            ]
        ];
	}
}