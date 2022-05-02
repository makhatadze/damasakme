<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Route prefix
    |--------------------------------------------------------------------------
    |
    */

    'prefix' => env('ADMIN_PREFIX', 'admin'),

    /**
     * Image upload config.
     */
    'image' => [

        /**
         * Enable or disable upload resolutions.
         */
        'upload_resolutions' => env('UPLOAD_IMAGE_RESOLUTIONS', false),

        /**
         * Resolution list.
         */
        'resolutions' => [
            600,
            1200,
            1800
        ]

    ]
];