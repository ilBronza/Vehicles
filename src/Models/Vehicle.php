<?php

namespace IlBronza\Vehicles\Models;


use IlBronza\Buttons\Button;
use IlBronza\Vehicles\Models\Kmreading;
use IlBronza\Vehicles\Models\Type;

class Vehicle extends VehiclePackageBaseModel
{
	static $deletingRelationships = ['kmreadings'];

	public function getCreateKmreadingButton() : Button
	{
		return Button::create([
			'href' => $this->getCreateKmreadingUrl(),
			'text' => trans('kmreading.create'),
			'icon' => 'plus'
		]);
	}

	public function getCreateKmreadingUrl()
	{
		return route(config('vehicles.routePrefix') . 'vehicles.kmreadings.create', ['vehicle' => $this]);
	}


	public function getCurrentKmAttribute() : ? float
	{
		return $this->getLastKmreading()?->getKm();
	}

	public function type()
	{
		return $this->belongsTo(Type::getProjectClassName());
	}

	public function getType() : Type
	{
		return $this->type;
	}

	public function getLastKmreading() : ? Kmreading
	{
		if($this->relationLoaded('lastKmreading'))
			return $this->lastKmreading;

		return $this->kmreadings()->orderBy('created_at', 'DESC')->first();
	}

	public function kmreadings()
	{
		return $this->hasMany(Kmreading::getProjectClassName());
	}

	public function lastKmreading()
	{
		return $this->hasOne(Kmreading::getProjectClassName(), 'id', 'live_last_kmreading_id');
	}

	public function scopeWithLastKmreading($query)
	{
        $query->addSelect([
            'live_last_kmreading_id' => Kmreading::select('id')
                    ->whereColumn(config('vehicles.models.kmreading.table') . '.vehicle_id', $this->getTable() . '.id')
                    ->orderBy('created_at', 'DESC')
                    ->take(1)
                ])->with('lastKmreading');
	}

	public function getVolumeMc()
	{
		return $this->getType()->getVolumeMc();
	}
}