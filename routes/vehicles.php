<?php

use IlBronza\Vehicles\Vehicles;

Route::group([
	'middleware' => ['web', 'auth', 'vehicles.roles'],
	'prefix' => 'vehicles-management',
	'as' => config('vehicles.routePrefix')
	],
	function()
	{

Route::group(['prefix' => 'vehicles'], function()
{
	Route::get('monitoring/engagement', [Vehicles::getController('vehicle', 'engagement'), 'index'])->name('vehicles.engagement.index');

	//KmreadingCreateStoreController
	Route::get('{vehicle}/kmreadings/create', [Vehicles::getController('kmreading', 'create'), 'createFromVehicle'])
		->name('vehicles.kmreadings.create');


	Route::get('', [Vehicles::getController('vehicle', 'index'), 'index'])->name('vehicles.index');
	Route::get('create', [Vehicles::getController('vehicle', 'create'), 'create'])->name('vehicles.create');
	Route::post('', [Vehicles::getController('vehicle', 'store'), 'store'])->name('vehicles.store');



	Route::get('{vehicle}', [Vehicles::getController('vehicle', 'show'), 'show'])->name('vehicles.show');
	Route::get('{vehicle}/edit', [Vehicles::getController('vehicle', 'edit'), 'edit'])->name('vehicles.edit');
	Route::put('{vehicle}', [Vehicles::getController('vehicle', 'edit'), 'update'])->name('vehicles.update');

	Route::delete('{vehicle}/delete', [Vehicles::getController('vehicle', 'destroy'), 'destroy'])->name('vehicles.destroy');
});

Route::group(['prefix' => 'types'], function()
{
	Route::get('', [Vehicles::getController('vehicleType', 'index'), 'index'])->name('vehicleTypes.index');
	Route::get('create', [Vehicles::getController('vehicleType', 'create'), 'create'])->name('vehicleTypes.create');
	Route::post('', [Vehicles::getController('vehicleType', 'store'), 'store'])->name('vehicleTypes.store');
	Route::get('{vehicleType}', [Vehicles::getController('vehicleType', 'show'), 'show'])->name('vehicleTypes.show');
	Route::get('{vehicleType}/edit', [Vehicles::getController('vehicleType', 'edit'), 'edit'])->name('vehicleTypes.edit');
	Route::put('{vehicleType}', [Vehicles::getController('vehicleType', 'edit'), 'update'])->name('vehicleTypes.update');

	Route::delete('{vehicleType}/delete', [Vehicles::getController('vehicleType', 'destroy'), 'destroy'])->name('vehicleTypes.destroy');
});

Route::group(['prefix' => 'models'], function()
{
	Route::get('', [Vehicles::getController('vehicleModel', 'index'), 'index'])->name('vehicleModels.index');
	Route::get('create', [Vehicles::getController('vehicleModel', 'create'), 'create'])->name('vehicleModels.create');
	Route::post('', [Vehicles::getController('vehicleModel', 'store'), 'store'])->name('vehicleModels.store');
	Route::get('{vehicleModel}', [Vehicles::getController('vehicleModel', 'show'), 'show'])->name('vehicleModels.show');
	Route::get('{vehicleModel}/edit', [Vehicles::getController('vehicleModel', 'edit'), 'edit'])->name('vehicleModels.edit');
	Route::put('{vehicleModel}', [Vehicles::getController('vehicleModel', 'update'), 'update'])->name('vehicleModels.update');

	Route::delete('{vehicleModel}/delete', [Vehicles::getController('vehicleModel', 'destroy'), 'destroy'])->name('vehicleModels.destroy');
});

Route::group(['prefix' => 'kmreadings'], function()
{
	Route::get('', [Vehicles::getController('kmreading', 'index'), 'index'])->name('kmreadings.index');

	Route::post('', [Vehicles::getController('kmreading', 'store'), 'store'])->name('kmreadings.store');
	Route::get('create', [Vehicles::getController('kmreading', 'create'), 'create'])->name('kmreadings.create');

	Route::get('{kmreading}', [Vehicles::getController('kmreading', 'show'), 'show'])->name('kmreadings.show');
	Route::get('{kmreading}/edit', [Vehicles::getController('kmreading', 'edit'), 'edit'])->name('kmreadings.edit');
	Route::put('{kmreading}', [Vehicles::getController('kmreading', 'edit'), 'update'])->name('kmreadings.update');

	Route::delete('{kmreading}/delete', [Vehicles::getController('kmreading', 'destroy'), 'destroy'])->name('kmreading.destroy');
});


});