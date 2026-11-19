<?php

return [
    // The current deployment is one server; file storage avoids requiring a cache table.
    // Use a shared cache store here when deploying multiple application servers.
    'auth_rate_limit_store' => env('FRONTEND_AUTH_RATE_LIMIT_STORE', 'file'),
];
