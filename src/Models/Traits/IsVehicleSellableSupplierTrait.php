<?php

namespace IlBronza\Vehicles\Models\Traits;

use IlBronza\CRUD\Models\Casts\CastFieldPrice;
use IlBronza\Vehicles\Models\Vehicle;
use IlBronza\Vehicles\Models\VehicleType;

trait IsVehicleSellableSupplierTrait
{
	public function InitializeIsVehicleSellableSupplierTrait() : void
	{
		$prices = VehicleType::gpc()::make()->getPriceFieldsForSellable();

        $casts = [];

        foreach ($prices as $field => $measurementUnit) {
            $casts[$field] = CastFieldPrice::class . ":{$field},$measurementUnit";
        }

        $this->casts = array_merge($this->casts, $casts);
	}
}