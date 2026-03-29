<?php

namespace IlBronza\Vehicles\Http\Middleware;

use IlBronza\CRUD\Middleware\CRUDBasePackageMiddlewareRolesPermissions;

/**
 * Resolves allowed roles for Vehicles routes from config (vehicles.defaultRoles / vehicles.routeRoles).
 */
class VehiclesRoleMiddleware extends CRUDBasePackageMiddlewareRolesPermissions
{
    protected string $configPackageName = 'vehicles';
}