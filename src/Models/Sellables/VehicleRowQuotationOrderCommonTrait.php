<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Products\Models\Orders\Orderrow;
use IlBronza\Vehicles\Models\VehicleType;

trait VehicleRowQuotationOrderCommonTrait
{
	public function initializeVehicleRowQuotationOrderCommonTrait()
	{
		$this->setCustomrowCasts(
			VehicleType::gpc()::make()->getPriceFieldsForSellable()
		);
	}

	public function getQuantityAttribute($value) : ? float
	{
		if($value)
			return $value;

		return $this->getModelContainer()?->km * 2;
	}

	public function getCalculatedCostPerKm() : float
	{
		return $this->calculated_cost_per_km;
	}

	public function getCalculatedCostPerMovimentation() : float
	{
		return $this->calculated_cost_per_movimentation ?? 0;
	}

	public function getCalculatedCostPerDay() : float
	{
		return $this->calculated_cost_per_day ?? 0;
	}


	public function getSingleCostAttribute() : float
	{
		if(! $this->getQuantity())
			return 0;

		return $this->getTotalRowCost() / $this->getQuantity();
	}

	public function getSingleRevenueAttribute() : float
	{
		if(! $this->getQuantity())
			return 0;

		return $this->getTotalRowRevenue() / $this->getQuantity();
	}

	//total_row_cost
	public function getTotalRowCostAttribute() : float
	{
		$tripCost = round($this->getQuantity() * $this->getCalculatedCostPerKm(), 2) ?? 0;

		$daysCost = round($this->getDaysQuantity() * $this->getCalculatedCostPerDay(), 2) ?? 0;

		$total = $tripCost + $this->getCalculatedCostPerMovimentation() + $daysCost;

		return $total * $this->getCostCoefficient();
	}

	//total_row_revenue
	public function getTotalRowRevenueAttribute() : float
	{
		return round($this->getTotalRowCost() * 1.33);
	}

}
