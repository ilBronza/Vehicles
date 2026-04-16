<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Products\Models\Quotations\CustomQuotationrow;

class VehicleQuotationrow extends CustomQuotationrow
{
	protected static ?string $typeName = 'VehicleType';
	static $designedTargetConfigPackagePrefix = 'vehicles';	
}