<?php

use IlBronza\Vehicles\Vehicles;

Route::group([
	'middleware' => ['web', 'auth'],
	'prefix' => 'vehicles-management',
	'as' => config('vehicles.routePrefix')
	],
	function()
	{

Route::group(['prefix' => 'vehicles'], function()
{
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
	Route::get('', [Vehicles::getController('type', 'index'), 'index'])->name('types.index');
	Route::get('create', [Vehicles::getController('type', 'create'), 'create'])->name('types.create');
	Route::post('', [Vehicles::getController('type', 'store'), 'store'])->name('types.store');
	Route::get('{type}', [Vehicles::getController('type', 'show'), 'show'])->name('types.show');
	Route::get('{type}/edit', [Vehicles::getController('type', 'edit'), 'edit'])->name('types.edit');
	Route::put('{type}', [Vehicles::getController('type', 'edit'), 'update'])->name('types.update');

	Route::delete('{type}/delete', [Vehicles::getController('type', 'destroy'), 'destroy'])->name('types.destroy');
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