<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class TypeFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
            'fields' => 
            [
                'mySelfPrimary' => 'primary',
                'mySelfEdit' => 'links.edit',
                'mySelfSee' => 'links.see',


                'name' => 'flat',
                'passengers' => 'flat',
                'license_needed' => 'flat',
                'external_length' => 'flat',
                'external_width' => 'flat',
                'external_height' => 'flat',
                'mass_empty' => 'flat',
                'internal_length' => 'flat',
                'internal_width' => 'flat',
                'internal_height' => 'flat',
                'mass_max_loading' => 'flat',
                'internal_volume_mq' => 'flat',

                'mySelfDelete' => 'links.delete'
            ]
        ];
	}
}