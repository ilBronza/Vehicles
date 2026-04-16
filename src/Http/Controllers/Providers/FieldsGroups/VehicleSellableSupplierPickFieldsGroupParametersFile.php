<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;
use Illuminate\Database\Eloquent\Model;

class VehicleSellableSupplierPickFieldsGroupParametersFile extends FieldsGroupParametersFile
{
    static function getFieldsGroup(Model $model = null) : array
	{
		return [
            'translationPrefix' => 'products::fields',
            'fields' => 
            [
                'mySelfPrimary' => 'primary',
				'supplier.target.name' => 'flat',
				'mySelfAssign' => "products::{$model->getModelConfigPrefix()}rows.addSellableSupplierRow",'sellable.name' => 'flat',

				'cost_per_km' => 'numbers.price',
				'cost_per_movimentation' => 'numbers.price',
				'cost_per_day' => 'numbers.price',
            ]
        ];
	}
}
