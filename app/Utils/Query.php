<?php

namespace App\Utils;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Query {
    static function execute($file, $params)
    {
        $key = 'query-' . $file . '-' . md5(serialize($params));
        return Cache::remember($key, 60, function() use ($file, $params) {
            $sql = file_get_contents(resource_path('queries/' . $file . '.sql'));
            return DB::select($sql, $params);
        });
    }
}
