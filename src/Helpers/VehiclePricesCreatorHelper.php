<?php

namespace IlBronza\Vehicles\Helpers;

use IlBronza\Products\Models\Interfaces\SellableSupplierPriceCreatorBaseClass;
use Illuminate\Support\Collection;

class VehiclePricesCreatorHelper extends SellableSupplierPriceCreatorBaseClass
{
	public function createPrices() : Collection
    {
    	dd("£ QUA dentro scrivere regola dei prezzi");
    }
}