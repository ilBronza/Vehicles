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

    public function getGenericParametersFile() : ? string
    {
        return config('vehicles.models.vehicle.parametersFiles.show');
    }

    public function getRelationshipsManagerClass()
    {
        return config("vehicles.models.{$this->configModelClassName}.relationshipsManagerClasses.show");
    }

    public function setShowButtons()
    {
        $this->showButtons[] = $this->getModel()->getCreateKmreadingButton();
    }

    public function show(string $vehicle)
    {
        $vehicle = $this->findModel($vehicle);

        if(! $supplier = $vehicle->getSupplier());
            $supplier = SupplierCreatorHelper::getOrCreateSupplierFromTarget($vehicle);

        $sellable = SellableCreatorHelper::getOrcreateSellableByTarget(
            $vehicle->getType(), [], 'vehicle'
        );

        $sellableSupplier = SellableCreatorHelper::getOrCreateSellableSupplier($supplier, $sellable);

        return $this->_show($vehicle);
    }
}
