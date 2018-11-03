<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => true,
    'allowedOrigins' => ['*'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ["x-requested-with", "Content-Type", "origin", "authorization", "accept", "api-key"],
    'allowedMethods' => ["POST", "GET", "OPTIONS", "DELETE", "PUT"],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
