<?php

namespace Martin\Settings\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Martin\Settings\Models\Parameter;

class AddParameterCommand extends Command {

    protected $name = 'settings:add';
    protected $description = 'Create new parameter';

    public function handle() {

        $parameter   = $this->ask('Parameter name');
        $description = $this->ask('Parameter description');
        $value       = $this->ask('Parameter value');
        $validation  = $this->ask('Validation rules');

        $param = new Parameter;
        $param->parameter   = $parameter;
        $param->description = $description;
        $param->value       = $value;
        $param->validation  = $validation;
        $param->save();

        $this->info('Parameter created');

    }

}