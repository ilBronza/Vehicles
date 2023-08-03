<?php

use IlBronza\Vehicles\Http\Controllers\Kmreadings\KmreadingCreateStoreController;
use IlBronza\Vehicles\Http\Controllers\Kmreadings\KmreadingIndexController;
use IlBronza\Vehicles\Http\Controllers\Kmreadings\KmreadingShowController;
use IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups\KmreadingFieldsGroupParametersFile;
use IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups\TypeFieldsGroupParametersFile;
use IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups\VehicleFieldsGroupParametersFile;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\KmreadingCreateStoreFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\KmreadingShowFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\TypeCreateStoreFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\VehicleCreateStoreFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\VehicleShowFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\RelationshipsManagers\TypeRelationManager;
use IlBronza\Vehicles\Http\Controllers\Providers\RelationshipsManagers\VehicleRelationManager;
use IlBronza\Vehicles\Http\Controllers\Types\TypeCreateStoreController;
use IlBronza\Vehicles\Http\Controllers\Types\TypeDestroyController;
use IlBronza\Vehicles\Http\Controllers\Types\TypeEditUpdateController;
use IlBronza\Vehicles\Http\Controllers\Types\TypeIndexController;
use IlBronza\Vehicles\Http\Controllers\Types\TypeShowController;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleCreateStoreController;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleDestroyController;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleEditUpdateController;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleIndexController;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleShowController;
use IlBronza\Vehicles\Models\Kmreading;
use IlBronza\Vehicles\Models\Type;
use IlBronza\Vehicles\Models\Vehicle;

return [
    'routePrefix' => 'ibVehicles.',

    'models' => [
        'type' => [
            'class' => Type::class,
            'table' => 'vehicles__types',
            'fieldsGroupsFiles' => [
                'index' => TypeFieldsGroupParametersFile::class
            ],
            'relationshipsManagerClasses' => [
                'show' => TypeRelationManager::class
            ],
            'parametersFiles' => [
                'create' => TypeCreateStoreFieldsetsParameters::class
            ],
            'controllers' => [
                'index' => TypeIndexController::class,
                'create' => TypeCreateStoreController::class,
                'store' => TypeCreateStoreController::class,
                'show' => TypeShowController::class,
                'edit' => TypeEditUpdateController::class,
                'update' => TypeEditUpdateController::class,
                'destroy' => TypeDestroyController::class,
            ]
        ],
        'vehicle' => [
            'class' => Vehicle::class,
            'table' => 'vehicles__vehicles',
            'fieldsGroupsFiles' => [
                'index' => VehicleFieldsGroupParametersFile::class
            ],
            'parametersFiles' => [
                'create' => VehicleCreateStoreFieldsetsParameters::class,
                'show' => VehicleShowFieldsetsParameters::class
            ],
            'relationshipsManagerClasses' => [
                'show' => VehicleRelationManager::class
            ],
            'controllers' => [
                'index' => VehicleIndexController::class,
                'create' => VehicleCreateStoreController::class,
                'store' => VehicleCreateStoreController::class,
                'show' => VehicleShowController::class,
                'edit' => VehicleEditUpdateController::class,
                'update' => VehicleEditUpdateController::class,
                'destroy' => VehicleDestroyController::class,
            ]
        ],
        'kmreading' => [
            'class' => Kmreading::class,
            'table' => 'vehicles__km_reading',
            'fieldsGroupsFiles' => [
                'index' => KmreadingFieldsGroupParametersFile::class
            ],
            'parametersFiles' => [
                'create' => KmreadingCreateStoreFieldsetsParameters::class,
                'show' => KmreadingShowFieldsetsParameters::class,
            ],
            'controllers' => [
                'index' => KmreadingIndexController::class,
                'create' => KmreadingCreateStoreController::class,
                'store' => KmreadingCreateStoreController::class,
                'show' => KmreadingShowController::class,
                'edit' => KmreadingEditUpdateController::class,
                'destroy' => KmreadingDestroyController::class,
            ]
        ],
    ]
];