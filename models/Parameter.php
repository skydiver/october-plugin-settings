<?php

namespace Martin\Settings\Models;

use Cache;
use Model;

class Parameter extends Model {

    use \October\Rain\Database\Traits\Validation;

    public $table = 'martin_settings_parameters';

    public $rules = [];

    public function beforeValidate() {
        $this->rules['value'] = $this->validation;
    }

    public function afterSave() {
        Cache::forget('martin_settings_parameters');
    }

}

?>