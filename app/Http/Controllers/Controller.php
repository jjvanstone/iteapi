<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected function mapMultipleKeys($data)
    {
        foreach ($data as $key => $object) {
            $data[$key] = $this->mapKeys($object->toArray());
        }

        return $data;
    }

    protected function mapKeys($data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = $this->mapKeys($value);
            }
            $mappedKey = $this->underscoresToCamelCase($key);
            if ($mappedKey != $key) {
                $data[$this->underscoresToCamelCase($key)] = $data[$key];
                unset($data[$key]);
            }
        }

        return $data;
    }

    private function underscoresToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace('_', '', ucwords($string, '_'));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }
}
