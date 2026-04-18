<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Products\Models\Orders\CustomOrderrow;
use IlBronza\Vehicles\Models\Traits\VehicleRowQuotationOrderCommonTrait;

class VehicleOrderrow extends CustomOrderrow
{
	protected static ?string $typeName = 'VehicleType';
	static $designedTargetConfigPackagePrefix = 'vehicles';	

	use VehicleRowQuotationOrderCommonTrait;
}