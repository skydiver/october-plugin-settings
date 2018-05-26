<?php

namespace Martin\Settings\Classes;

use Martin\Settings\Models\Parameter;

class Parameters {

    private static $_timeout = 3600;

    /**
     * Returns all settings & parameters from the repository
     *
     * @return array
     */
    public static function all() :array {
        $parameters = \Cache::remember('martin_settings_parameters', self::$_timeout, function () {
            return Parameter::lists('value', 'parameter');
        });
        return $parameters;
    }

    /**
     * Returns an specific parameter from the repository
     *
     * @param string $parameter Parameter to query
     *
     * @return string
     */
    public static function get(string $parameter) :string {
        $parameters = self::all();
        return isset($parameters[$parameter]) ? $parameters[$parameter] : '';
    }

    /**
     * Reload parameters cache
     *
     * @return void
     */
    public static function clear() {
        \Cache::forget('martin_settings_parameters');
        return self::all();
    }

}