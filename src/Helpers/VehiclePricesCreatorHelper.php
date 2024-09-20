<?php

namespace IlBronza\Vehicles\Helpers;

use IlBronza\Prices\Models\Price;
use IlBronza\Products\Models\Interfaces\SellableSupplierPriceCreatorBaseClass;
use Illuminate\Support\Collection;

use function collect;

class VehiclePricesCreatorHelper extends SellableSupplierPriceCreatorBaseClass
{
	private function setKmPrice(string $collectionId) : ? Price
	{
		$price = $this->createPrice();

		$price->setCollectionId($collectionId);
		$price->setMeasurementUnit('km');

		$price->price = $this->getSupplier()->getTarget()->cost_per_km;

		$price->save();

		return $price;
	}



	//	private function createDistancePrice() : Price
//	{
//		$price = $this->createPrice();
//
//		$price->setMeasurementUnit('km');
//		$price->collection_id = 'distancePrice';
//
//		$price->price = 0;
//		$price->save();
//
//		$this->getSellableSupplier()->directPrice()->associate($price);
//		$this->getSellableSupplier()->save();
//
//		return $price;
//	}

	public function createPrices() : Collection
    {
	    $prices = collect();

	    $prices->push($this->setKmPrice('distancePrice'));

	    return $prices;
		//		$price = $this->createDistancePrice();
//
//        return collect([$price]);
    }
}