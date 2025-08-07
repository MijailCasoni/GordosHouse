<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CORS Paths
    |--------------------------------------------------------------------------
    |
    | You can enable CORS for 1 or multiple paths.
    | Example: ['api/*']
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    /*
    |--------------------------------------------------------------------------
    | CORS Allowed Methods
    |--------------------------------------------------------------------------
    |
    | You can enable CORS for 1 or multiple HTTP methods.
    | Example: ['*'] for all methods.
    | Example: ['GET', 'POST'] for specific methods.
    */

    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | CORS Allowed Origins
    |--------------------------------------------------------------------------
    |
    | You can specify the origins that are allowed to access your application.
    | Example: ['*'] for all origins.
    | Example: ['http://localhost:3000'] for a specific origin.
    */

    'allowed_origins' => ['*'],


    /*
    |--------------------------------------------------------------------------
    | CORS Allowed Origins Patterns
    |--------------------------------------------------------------------------
    |
    | You can specify origin patterns that are allowed to access your application.
    | Example: ['http://localhost:*']
    |
    */

    'allowed_origins_patterns' => [],

    /*
    |--------------------------------------------------------------------------
    | CORS Allowed Headers
    |--------------------------------------------------------------------------
    |
    | You can specify the headers that are allowed to be sent with the request.
    | Example: ['*'] for all headers.
    | Example: ['X-Custom-Header', 'Authorization'] for specific headers.
    */

    'allowed_headers' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | CORS Exposed Headers
    |--------------------------------------------------------------------------
    |
    | You can specify the headers that are exposed to the browser.
    | Example: [] for no headers.
    | Example: ['Authorization', 'X-Custom-Header'] for specific headers.
    */

    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | CORS Max Age
    |--------------------------------------------------------------------------
    |
    | You can specify the number of seconds the results of a preflight request can be cached.
    | A value of 0 will disable the cache.
    */

    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | CORS Supports Credentials
    |--------------------------------------------------------------------------
    |
    | You can specify whether the browser should send credentials with the request.
    */

    'supports_credentials' => false,

];
