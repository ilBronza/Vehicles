<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Products\Casts\CalculatedTotalCostExtraField;
use IlBronza\Products\Casts\CalculatedTotalMarginExtraField;
use IlBronza\Products\Casts\CalculatedTotalPercentageMarginExtraField;
use IlBronza\Products\Casts\CalculatedTotalRevenueExtraField;
use IlBronza\Products\Models\Interfaces\RowInterface;
use IlBronza\Products\Providers\Helpers\RowsHelpers\RowsCostsFieldsHelper;
use IlBronza\Vehicles\Models\Sellables\VehicleOrderrow;
use Illuminate\Support\Collection;

trait UsesVehicleRowTrait
{
	public function initializeUsesVehicleRowTrait()
	{
		$this->addFieldsToUpdateByRowTypes('vehicleRows');

		$this->addSummaryFieldsCastsByRowTypes('vehicleRows');
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
}