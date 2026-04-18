<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Products\Models\Quotations\CustomQuotationrow;
use IlBronza\Vehicles\Models\Traits\VehicleRowQuotationOrderCommonTrait;

class VehicleQuotationrow extends CustomQuotationrow
{
	protected static ?string $typeName = 'VehicleType';
	static $designedTargetConfigPackagePrefix = 'vehicles';

	use VehicleRowQuotationOrderCommonTrait;
}