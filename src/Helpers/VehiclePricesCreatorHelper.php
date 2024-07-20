<?php

namespace IlBronza\Vehicles\Helpers;

use IlBronza\Products\Models\Interfaces\SellableSupplierPriceCreatorBaseClass;
use Illuminate\Support\Collection;

class VehiclePricesCreatorHelper extends SellableSupplierPriceCreatorBaseClass
{
	public function createPrices() : Collection
    {
        $price = $this->createPrice();

        $price->setMeasurementUnit('km');

        $price->price = 0;
        $price->save();

        $this->getSellableSupplier()->directPrice()->associate($price);
        $this->getSellableSupplier()->save();

        return collect([$price]);
    }
}