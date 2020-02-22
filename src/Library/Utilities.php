<?php

namespace Ministrare\LaravelCorePackage\Library;

class Utilities
{
    public static function createSlug(string $name)
    {
        try {
            return $slug = implode('_', explode(" ", strtolower($name)));
        }catch (\Exception $exception){
            return false;
        }
    }

    /**
     * @param string $key
     * @param array $array
     * @return mixed|null
     */
    public static function keyExists(string $key, array $array)
    {
        if(array_key_exists( $key, $array)){
            return $array[$key];
        }

        return null;
    }
}
