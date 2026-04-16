<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Vehicles\Models\Sellables\VehicleOrderrow;
use Illuminate\Support\Collection;

trait UsesVehicleRowTrait
{
	// VehicleOrderrow or VehicleQuotationrow
	abstract public function getVehicleRowRelatedModel() : string;

	public function vehicleRows()
	{
		return $this->hasMany(
			$this->getVehicleRowRelatedModel()
		);
	}

	public function getVehicleRows()
	{
		return $this->vehicleRows;
	}

	public function getAddVehicleTypeUrl() : string
	{
		return $this->getAddRowByTypeUrl('VehicleType');
	}

	public function getVehicleRowsForRelationshipManager() : Collection
	{
		$modelString = strtolower(class_basename($this->getModel()));

		if(method_exists($this->getModel(), 'getExtraFieldsClass'))
			if($this->getModel()->getExtraFieldsClass())
				$modelString .= '.extraFields';

		$relations = [
			"{$modelString}",
			'prices',
			'sellable',
			'sellable.target',
			'sellable.prices',
			'sellableSupplier.prices',
			'sellableSupplier.supplier.target',
			'sellableSupplier.sellable.target',
		];

		$vehicleRowPlaceholder = $this->vehicleRows()->make();

		if(method_exists($vehicleRowPlaceholder, 'getExtraFieldsClass'))
			if($vehicleRowPlaceholder->getExtraFieldsClass())
				$relations[] = 'extraFields';

		return $this->vehicleRows()->with($relations)->get();
	}

}