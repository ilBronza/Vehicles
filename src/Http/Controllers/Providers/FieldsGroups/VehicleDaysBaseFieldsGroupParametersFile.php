<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use Carbon\Carbon;
use IlBronza\Datatables\Providers\FieldsGroupParametersFile;
use IlBronza\Datatables\Providers\FieldsGroupsMergerHelper;

class VehicleDaysBaseFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
            'translationPrefix' => 'vehicles::fields',
            'fields' => 
            [
                'mySelfPrimary' => 'primary',
	            'supplier.target.slug' => 'flat',
            ]
        ];
	}
}