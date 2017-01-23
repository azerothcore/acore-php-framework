<?php

namespace ACore\Utils;

class AUtils {

    /**
     * Retrieve a value from an array without undefined index error
     * even if multidimensional
     * @param type $array
     * @param type $keys
     * @return type
     */
    public static function V($array, $keys) {
        if (!is_array($keys)) {
            if (isset($array[$keys]))
                return $array[$keys];
        } else {
            if (isset($array[$keys[0]])) {
                array_shift($keys);

                return self::V($array[$keys[0]], $keys);
            }
        }

        return NULL;
    }

}
