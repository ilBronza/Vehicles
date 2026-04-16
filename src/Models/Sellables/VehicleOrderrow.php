<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Products\Models\Orders\CustomOrderrow;

class VehicleOrderrow extends CustomOrderrow
{
	protected static ?string $typeName = 'VehicleType';
	static $designedTargetConfigPackagePrefix = 'vehicles';	
}