<?php

namespace IlBronza\Vehicles\Models\Sellables;

use IlBronza\Products\Models\Interfaces\SupplierInterface;
use IlBronza\Products\Models\Traits\Sellable\InteractsWithSupplierTrait;
use IlBronza\Products\Models\Traits\Sellable\SingleSellableSupplierTrait;
use IlBronza\Products\Providers\Helpers\Sellables\SellableCreatorHelper;
use IlBronza\Vehicles\Models\Vehicle as IbVehicle;
use Illuminate\Support\Collection;

class Vehicle extends IbVehicle implements SupplierInterface
{
	use InteractsWithSupplierTrait;
	use SingleSellableSupplierTrait;

	public function getPossibleSellables() : Collection
	{
		$sellable = SellableCreatorHelper::getOrcreateSellableByTarget($this->getVehicleType());

		return collect([$sellable]);
	}

	public function mustAutomaticallyUpdatePrices() : ? bool
	{
		return true;
	}

	static function inheritPricesFromVehicleTypeIfEmpty($model)
	{
		if(! $vehicleType = $model->getVehicleType())
			return ;

		$fields = $vehicleType->getPriceFieldsForSellable();

		foreach($fields as $field => $measurementUnit)
			if(! $model->$field)
				$model->$field = $vehicleType->$field;
	}

	static function boot()
	{
		parent::boot();

		static::saving(function ($model)
		{
			static::inheritPricesFromVehicleTypeIfEmpty($model);
		});
	}


}