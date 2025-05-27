<?php

declare(strict_types=1);

return [
   'default' => env('CACHE_DRIVER', 'file'),

   'stores' => [
      'file' => [
         'driver' => 'file',
         'path' => storage_path('framework/cache/data'),
      ],

      'redis' => [
         'driver' => 'redis',
         'connection' => 'cache',
         'servers' => [
            [
               'host' => env('REDIS_HOST', '127.0.0.1'),
               'port' => env('REDIS_PORT', 6379),
               'password' => env('REDIS_PASSWORD', null),
               'database' => 0,
               'timeout' => 10,
            ]
         ],
         'lock_connection' => 'default',
      ],

      'memcached' => [
         'driver' => 'memcached',
         'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
         'sasl' => [
            env('MEMCACHED_USERNAME'),
            env('MEMCACHED_PASSWORD'),
         ],
         'options' => [
            // Memcached::OPT_CONNECT_TIMEOUT => 2000,
         ],
         'servers' => [
            [
               'host' => env('MEMCACHED_HOST', '127.0.0.1'),
               'port' => env('MEMCACHED_PORT', 11211),
               'weight' => 100,
            ],
         ],
      ],
   ],

   'ttl' => 3600,
   'prefix' => env('CACHE_PREFIX', 'ironflow_cache_'),
];
