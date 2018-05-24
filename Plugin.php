<?php

namespace Martin\Settings;

use Backend;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;

class Plugin extends PluginBase {

    public function pluginDetails() {
        return [
            'name'        => 'Settings & Parameters',
            'description' => 'Site settings & parameters repository',
            'author'      => 'Martín M.',
            'icon'        => 'icon-sliders'
        ];
    }

    public function boot() {
        SettingsManager::instance()->registerCallback(function ($manager) {
            $manager->registerSettingItems('October.System', [
                'settings_parameters' => [
                    'label'       => 'Settings & Parameters',
                    'description' => 'Site settings & parameters repository.',
                    'category'    => SettingsManager::CATEGORY_SYSTEM,
                    'icon'        => 'icon-sliders',
                    'url'         => Backend::url('martin/settings/parameters'),
                    'permissions' => ['martin.settings.access_parameters'],
                    'order'       => 800
                ],
            ]);
        });
    }

    public function registerPermissions() {
        return [
            'martin.settings.access_parameters' => ['label' => 'Access parameters', 'tab' => 'Settings & Parameters'],
        ];
    }

    public function register() {
        $this->registerConsoleCommand('settings:add', 'Martin\Settings\Console\AddParameterCommand');
    }

}