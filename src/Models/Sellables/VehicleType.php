<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Prices\Models\Interfaces\WithPriceInterface;
use IlBronza\Prices\Models\Traits\HasCustomPricesTrait;
// use IlBronza\Prices\Models\Traits\InteractsWithPriceTrait;
// use IlBronza\Prices\Models\Traits\UpdatePricesOnSaveTrait;
use IlBronza\Products\Models\Interfaces\SellableItemInterface;
use IlBronza\Products\Models\Interfaces\SellableSupplierPriceCreatorBaseClass;
use IlBronza\Products\Models\Traits\Sellable\InteractsWithSellableTrait;
use IlBronza\Vehicles\Models\VehicleType as IbVehicleType;
use Illuminate\Support\Collection;

class VehicleType extends IbVehicleType implements SellableItemInterface, WithPriceInterface
{
	use HasCustomPricesTrait;
	use InteractsWithSellableTrait;
	// use InteractsWithPriceTrait;
	// use UpdatePricesOnSaveTrait;

	public function getPriceFieldsForSellable() : array
	{
		return [
			'cost_per_km' => 'km',
			'cost_per_movimentation' => 'forfait',
			'cost_per_day' => 'day',
		];
	}

	public function getPossibleSuppliersElements() : Collection
	{
		return $this->vehicles()->with('supplier')->get()->pluck('supplier')->filter();
	}

	public function getPriceCreator() : ?SellableSupplierPriceCreatorBaseClass
	{
		$class = config('vehicles.models.vehicleType.helpers.sellableSupplierPricesCreator');

		return $class ? new $class : new \IlBronza\Vehicles\Helpers\VehiclePricesCreatorHelper;
	}

	/**
	 * SE NULL ignora
	 * SE FALSE NO
	 * SE TRUE SI'
	 **/
	public function mustAutomaticallyUpdatePrices() : ? bool
	{
		return null;
	}

	public function getEditParametersFile() : string
	{
		return $this->getCompulsoryConfigByKey('parametersFiles.editSellable');
	}

	public function getSellableSupplierIndexRelations() : array
	{
		return [
			'prices',
			'supplier.target',
		];
	}
}
