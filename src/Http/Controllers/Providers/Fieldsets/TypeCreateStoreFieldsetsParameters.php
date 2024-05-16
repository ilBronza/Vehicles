<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class TypeCreateStoreFieldsetsParameters extends FieldsetParametersFile
{
    public function _getFieldsetsParameters() : array
    {
        return [
            'package' => [
                'translationPrefix' => 'vehicles::fields',
                'fields' => [
                    'name' => ['text' => 'string|required'],
                    'passengers' => ['number' => 'integer|nullable|min:0|max:64'],
                    'license_needed' => ['text' => 'string|nullable'],
                ],
                'width' => ["1-3@l", '1-2@m']
            ],
            'sizes' => [
                'translationPrefix' => 'vehicles::fields',
                'fields' => [
                    'external_length' => ['number' => 'numeric|nullable|min:0'],
                    'external_width' => ['number' => 'numeric|nullable|min:0'],
                    'external_height' => ['number' => 'numeric|nullable|min:0'],
                    'mass_empty' => ['number' => 'numeric|nullable|min:0'],
                ],
                'width' => ["1-3@l", '1-2@m']
            ],
            'internal' => [
                'translationPrefix' => 'vehicles::fields',
                'fields' => [
                    'internal_length' => ['number' => 'numeric|nullable|min:0'],
                    'internal_width' => ['number' => 'numeric|nullable|min:0'],
                    'internal_height' => ['number' => 'numeric|nullable|min:0'],
                    'mass_max_loading' => ['number' => 'numeric|nullable|min:0'],
                    'internal_volume_mq' => ['number' => 'numeric|nullable|min:0'],
                ],
                'width' => ["1-3@l", '1-2@m']
            ]
        ];
    }
}
