<?php

namespace IlBronza\Vehicles;

use IlBronza\CRUD\Providers\RouterProvider\IbRouter;
use IlBronza\CRUD\Providers\RouterProvider\RoutedObjectInterface;
use IlBronza\CRUD\Traits\IlBronzaPackages\IlBronzaPackagesTrait;

class Vehicles implements RoutedObjectInterface
{
	use IlBronzaPackagesTrait;

    public function manageMenuButtons()
    {
        if(! $menu = app('menu'))
            return;

        $settingsButton = $menu->provideButton([
                'text' => 'generals.settings',
                'name' => 'settings',
                'icon' => 'gear',
                'roles' => ['administrator']
            ]);

        $vehiclesManagerButton = $menu->createButton([
            'name' => 'vehiclesManager',
            'icon' => 'truck-moving',
            'text' => 'vehicles::vehicles.vehiclesManager',
        ]);

        $settingsButton->addChild($vehiclesManagerButton);

        $vehiclesManagerButton->addChild(
            $menu->createButton([
                'name' => 'vehicles.list',
                'icon' => 'truck-moving',
                'text' => 'vehicles::vehicles.list',
                'href' => IbRouter::route($this, 'vehicles.index')
            ])
        );

        $vehiclesManagerButton->addChild(
            $menu->createButton([
                'name' => 'vehicles.types.list',
                'icon' => 'gear',
                'text' => 'vehicles::vehicles.types',
                'href' => IbRouter::route($this, 'types.index')
            ])
        );

	    $vehiclesManagerButton->addChild(
		    $menu->createButton([
			    'name' => 'vehicles.kmreadings.list',
			    'icon' => 'bookmark',
			    'text' => 'vehicles::vehicles.kmreadings',
			    'href' => IbRouter::route($this, 'kmreadings.index')
		    ])
	    );

	    $vehiclesManagerButton->addChild(
		    $menu->createButton([
			    'name' => 'vehicles.engagement.index',
			    'icon' => 'calendar',
			    'text' => 'vehicles::vehicles.engagement.index',
			    'href' => IbRouter::route($this, 'vehicles.engagement.index')
		    ])
	    );
    }

    public function getRoutePrefix() : ? string
    {
        return config('vehicles.routePrefix');
    }

    static function getController(string $target, string $controllerPrefix) : string
    {
        try
        {
            return config("vehicles.models.{$target}.controllers.{$controllerPrefix}");
        }
        catch(\Throwable $e)
        {
            dd([$e->getMessage(), 'dichiara ' . "vehicles.models.{$target}.controllers.{$controllerPrefix}"]);
        }
    }

}