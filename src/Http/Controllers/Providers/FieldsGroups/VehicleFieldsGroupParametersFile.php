<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class VehicleFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
			'translationPrefix' => 'vehicles::fields',
			'fields' =>
			[
				'mySelfPrimary' => 'primary',
				'mySelfEdit' => 'links.edit',
				'mySelfSee' => 'links.see',

				'plate' => 'flat',
				'slug' => 'flat',

				'vehicleModel' => [
					'type' => 'links.link',
					'function' => 'getShowUrl',
					'textParameter' => 'fullLabel',
					'target' => '_blank',
					'icon' => false,
					'width' => '245px'
				],

				'vehicleType' => [
					'type' => 'links.link',
					'function' => 'getShowUrl',
					'textParameter' => 'name',
					'target' => '_blank',
					'icon' => false,
					'width' => '12em'
				],

				'description' => [
					'type' => 'flat',
					'width' => '20em'
				],

				'vehicleModel.brand' => 'flat',
				'vehicleModel.vehicleType.name' => 'flat',
				'vehicleModel.passengers' => [
					'type' => 'flat',
					'width' => '4em'
				],
				'vehicleModel.fuels' => 'flat',
				'vehicleModel.sizes_marching_external_length' => [
					'type' => 'flat',
					'width' => '4em'
				],
				'vehicleModel.sizes_marching_external_width' => [
					'type' => 'flat',
					'width' => '4em'
				],
				'vehicleModel.sizes_marching_external_height' => [
					'type' => 'flat',
					'width' => '4em'
				],
				'vehicleModel.sizes_functioning_internal_length' => [
					'type' => 'flat',
					'width' => '4em'
				],
				'vehicleModel.sizes_functioning_internal_width' => [
					'type' => 'flat',
					'width' => '4em'
				],
				'vehicleModel.sizes_functioning_internal_height' => [
					'type' => 'flat',
					'width' => '4em'
				],
				'vehicleModel.sizes_functioning_internal_volume_mq' => [
					'type' => 'flat',
					'width' => '4em'
				],
				'vehicleModel.mass_empty' => 'flat',
				'vehicleModel.mass_max_loading' => 'flat',

				'name' => [
					'type' => 'flat',
					'width' => '14em'
				],

				'cost_per_km' => 'flat',
				'cost_per_movimentation' => 'flat',
				'registered_at' => 'flat',

				'initial_km' => 'flat',
				'current_km' => 'flat',

				'mySelfDelete' => 'links.delete'
			]
		];
	}
}
