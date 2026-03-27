<?php

namespace IlBronza\Vehicles\Http\Controllers\Vehicles;

use IlBronza\CRUD\Traits\CRUDRelationshipTrait;
use IlBronza\CRUD\Traits\CRUDShowTrait;
use IlBronza\Products\Models\Sellables\Supplier;
use IlBronza\Products\Providers\Helpers\Sellables\SellableCreatorHelper;
use IlBronza\Products\Providers\Helpers\Sellables\SupplierCreatorHelper;

class VehicleShowController extends VehicleCRUD
{
    use CRUDShowTrait;
    use CRUDRelationshipTrait;

    public $allowedMethods = ['show'];

    public function setShowButtons()
    {
        $this->showButtons[] = $this->getModel()->getCreateKmreadingButton();
    }

    public function show(string $vehicle)
    {
        $vehicle = $this->findModel($vehicle);

        return $this->_show($vehicle);
    }
}
