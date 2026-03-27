<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Products\Models\Interfaces\SupplierInterface;
use IlBronza\Products\Models\Traits\Sellable\InteractsWithSupplierTrait;
use IlBronza\Products\Providers\Helpers\Sellables\SellableCreatorHelper;
use IlBronza\Vehicles\Models\Vehicle as IbVehicle;
use Illuminate\Support\Collection;

class Vehicle extends IbVehicle implements SupplierInterface
{
	use InteractsWithSupplierTrait;

	public function getPossibleSellables() : Collection
	{
		$sellable = SellableCreatorHelper::getOrcreateSellableByTarget($this->getVehicleType());

		return collect([$sellable]);
	}
}