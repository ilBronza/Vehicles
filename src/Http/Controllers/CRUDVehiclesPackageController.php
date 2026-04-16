<?php

namespace IlBronza\Vehicles\Http\Controllers;

use IlBronza\Buttons\Button;
use IlBronza\CRUD\Http\Controllers\BasePackageController;

class CRUDVehiclesPackageController extends BasePackageController
{
	static $packageConfigPrefix = 'vehicles';

    public function getRouteBaseNamePrefix() : ? string
    {
        return config('vehicles.routePrefix');
    }

    public function setModelClass()
    {
        $this->modelClass = config("vehicles.models.{$this->configModelClassName}.class");
    }

	/** @return array<string, string> chiave config models.* => nome route indice */
	protected function getVehiclesEntityIndexRouteMap() : array
	{
		$prefix = rtrim((string) config('vehicles.routePrefix'), '.');

		return [
			'vehicle' => "{$prefix}.vehicles.index",
			'vehicleType' => "{$prefix}.vehicleTypes.index",
			'vehicleModel' => "{$prefix}.vehicleModels.index",
			'kmreading' => "{$prefix}.kmreadings.index",
		];
	}

	protected function addVehiclesPackageCrossEntityIndexButtons() : void
	{
		if (! isset($this->configModelClassName, $this->table))
		{
			return;
		}

		foreach ($this->getVehiclesEntityIndexRouteMap() as $modelKey => $routeName)
		{
			if ($modelKey === $this->configModelClassName)
				continue;

			$button = Button::create([
				'href' => route($routeName),
				'text' => __('vehicles::routes.' . $routeName),
				'icon' => __('vehicles::icons.' . $modelKey),
			]);
			$button->setHtmlClass('uk-margin-small-right');

			$this->table->addButton($button);
		}
	}
}
