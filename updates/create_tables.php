<?php

namespace Martin\Settings\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTableSettings extends Migration {

    public function up() {
        Schema::create('martin_settings_parameters', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('parameter')->unique();
            $table->text('description')->nullable();
            $table->string('value');
            $table->string('validation');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('martin_settings_parameters');
    }

}

?>