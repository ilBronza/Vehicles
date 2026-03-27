<?php

use IlBronza\Vehicles\Http\Controllers\Kmreadings\KmreadingCreateStoreController;
use IlBronza\Vehicles\Http\Controllers\Kmreadings\KmreadingDestroyController;
use IlBronza\Vehicles\Http\Controllers\Kmreadings\KmreadingEditUpdateController;
use IlBronza\Vehicles\Http\Controllers\Kmreadings\KmreadingIndexController;
use IlBronza\Vehicles\Http\Controllers\Kmreadings\KmreadingShowController;
use IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups\KmreadingFieldsGroupParametersFile;
use IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups\VehicleFieldsGroupParametersFile;
use IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups\VehicleOrderrowsFieldsGroupParametersFile;
use IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups\VehicleQuotationrowsFieldsGroupParametersFile;
use IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups\VehicleTypeFieldsGroupParametersFile;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\KmreadingCreateStoreFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\KmreadingEditUpdateFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\KmreadingShowFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\VehicleCreateStoreFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\VehicleEditUpdateFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\VehicleShowFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\VehicleTypeCreateStoreFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\VehicleTypeEditUpdateFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets\VehicleTypeSellableEditUpdateFieldsetsParameters;
use IlBronza\Vehicles\Http\Controllers\Providers\RelationshipsManagers\VehicleRelationManager;
use IlBronza\Vehicles\Http\Controllers\Providers\RelationshipsManagers\VehicleTypeRelationManager;
use IlBronza\Vehicles\Http\Controllers\VehicleTypes\VehicleTypeCreateStoreController;
use IlBronza\Vehicles\Http\Controllers\VehicleTypes\VehicleTypeDestroyController;
use IlBronza\Vehicles\Http\Controllers\VehicleTypes\VehicleTypeEditUpdateController;
use IlBronza\Vehicles\Http\Controllers\VehicleTypes\VehicleTypeIndexController;
use IlBronza\Vehicles\Http\Controllers\VehicleTypes\VehicleTypeShowController;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleCreateStoreController;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleDestroyController;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleEditUpdateController;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleEngagementController;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleIndexController;
use IlBronza\Vehicles\Http\Controllers\Vehicles\VehicleShowController;
use IlBronza\Vehicles\Models\Kmreading;
use IlBronza\Vehicles\Models\Vehicle;
use IlBronza\Vehicles\Models\VehicleType;

return [
    'routePrefix' => 'ibVehicles.',

    'datatableFieldWidths' => [
        'datatableFieldVehicle' => '10em'
    ],

    'enabled' => true,

    'models' => [
        'orderrow' => [
            'fieldsGroupsFiles' => [
                'index' => VehicleOrderrowsFieldsGroupParametersFile::class,
            ]
        ],
        'quotationrow' => [
            'fieldsGroupsFiles' => [
                'index' => VehicleQuotationrowsFieldsGroupParametersFile::class,
            ]
        ],
        'vehicleType' => [
            'class' => VehicleType::class,
            'table' => 'vehicles__types',
            'fieldsGroupsFiles' => [
                'index' => VehicleTypeFieldsGroupParametersFile::class
            ],
            'relationshipsManagerClasses' => [
                'show' => VehicleTypeRelationManager::class
            ],
            'parametersFiles' => [
                'create' => VehicleTypeCreateStoreFieldsetsParameters::class,
                'edit' => VehicleTypeEditUpdateFieldsetsParameters::class,
                'editSellable' => VehicleTypeSellableEditUpdateFieldsetsParameters::class,
                'show' => VehicleTypeEditUpdateFieldsetsParameters::class
            ],
            'controllers' => [
                'index' => VehicleTypeIndexController::class,
                'create' => VehicleTypeCreateStoreController::class,
                'store' => VehicleTypeCreateStoreController::class,
                'show' => VehicleTypeShowController::class,
                'edit' => VehicleTypeEditUpdateController::class,
                'update' => VehicleTypeEditUpdateController::class,
                'destroy' => VehicleTypeDestroyController::class,
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
                'edit' => VehicleEditUpdateFieldsetsParameters::class,
                'editSellable' => VehicleEditUpdateFieldsetsParameters::class,
                'show' => VehicleShowFieldsetsParameters::class
            ],
            'relationshipsManagerClasses' => [
                'show' => VehicleRelationManager::class,
            ],
            'controllers' => [
	            'engagement' => VehicleEngagementController::class,
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
                'edit' => KmreadingEditUpdateFieldsetsParameters::class,
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
