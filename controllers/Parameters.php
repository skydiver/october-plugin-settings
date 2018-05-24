<?php

namespace Martin\Settings\Controllers;

use App;
use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;

class Parameters extends Controller {

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['martin.settings.access_parameters'];

    public function __construct() {
        parent::__construct();
        BackendMenu::setContext('October.System', 'system');
        SettingsManager::setContext('October.System', 'settings_parameters');
    }

    public function create() {
        return App::make('Cms\Classes\Controller')->setStatusCode(404)->run('/404');
    }

    public function update_onDelete() {
        return App::make('Cms\Classes\Controller')->setStatusCode(404)->run('/404');
    }

}

?>