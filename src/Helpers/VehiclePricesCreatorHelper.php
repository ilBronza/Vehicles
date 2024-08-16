<?php

namespace IlBronza\Vehicles\Helpers;

use IlBronza\Prices\Models\Price;
use IlBronza\Products\Models\Interfaces\SellableSupplierPriceCreatorBaseClass;
use Illuminate\Support\Collection;

class VehiclePricesCreatorHelper extends SellableSupplierPriceCreatorBaseClass
{
	private function createDistancePrice() : Price
	{
		$price = $this->createPrice();

		$price->setMeasurementUnit('km');
		$price->collection_id = 'distance_price';

		$price->price = 0;
		$price->save();

		$this->getSellableSupplier()->directPrice()->associate($price);
		$this->getSellableSupplier()->save();

		return $price;
	}

	public function createPrices() : Collection
    {
		$price = $this->createDistancePrice();

        return collect([$price]);
    }
}