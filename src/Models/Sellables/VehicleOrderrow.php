<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Products\Models\Orders\CustomOrderrow;
use IlBronza\Vehicles\Models\Sellables\VehicleRowQuotationOrderCommonTrait;

class VehicleOrderrow extends CustomOrderrow
{
	public string $fieldsGroupParametersKey = 'vehicleOrderrow';
	protected static ?string $typeName = 'VehicleType';
	static $designedTargetConfigPackagePrefix = 'vehicles';	

	use VehicleRowQuotationOrderCommonTrait;
}