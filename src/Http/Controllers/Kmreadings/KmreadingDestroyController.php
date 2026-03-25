<?php

namespace IlBronza\Vehicles\Http\Controllers\Kmreadings;

use IlBronza\CRUD\Http\Controllers\Traits\PackageStandardDestroyTrait;

class KmreadingDestroyController extends KmreadingCRUD
{
	use PackageStandardDestroyTrait;

	public $allowedMethods = ['destroy'];
}

