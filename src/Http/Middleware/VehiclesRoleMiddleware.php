<?php

namespace IlBronza\Vehicles\Http\Middleware;

use IlBronza\CRUD\Middleware\CRUDBasePackageMiddlewareRolesPermissions;

class VehiclesRoleMiddleware extends CRUDBasePackageMiddlewareRolesPermissions
{
    protected string $configPackageName = 'vehicles';
}