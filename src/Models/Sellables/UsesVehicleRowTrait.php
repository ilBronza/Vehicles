<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Products\Models\Interfaces\RowInterface;
use IlBronza\Products\Providers\Helpers\RowsHelpers\RowsCostsFieldsHelper;
use IlBronza\Vehicles\Models\Sellables\VehicleOrderrow;
use Illuminate\Support\Collection;

trait UsesVehicleRowTrait
{
	public function initializeUsesVehicleRowTrait()
	{
		$this->addFieldsToUpdateByRowTypes('vehicleRows');
	}

	// VehicleOrderrow or VehicleQuotationrow
	abstract public function getVehicleRowRelatedModel() : string;

	public function rowRelationByVehicleType()
	{
		return $this->vehicleRows();
	}

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

	public function getTotalVehicleRowsCostAttribute()
	{
		return $this->getTotalByCustomRowsCost('vehicleRows');
	}

	public function getTotalVehicleRowsRevenueAttribute()
	{
		return $this->getTotalByCustomRowsRevenue('vehicleRows');
	}

	public function getMarginVehicleRowsAttribute()
	{
		return $this->getMarginByCustomRows('vehicleRows');
	}

	public function getPercentageMarginVehicleRowsAttribute()
	{
		return $this->getPercentageMarginByCustomRows('vehicleRows');
	}
}