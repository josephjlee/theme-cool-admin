<?php

use BasicApp\Helpers\CliHelper;

CodeIgniter\Events\Events::on('install', function() {

    $themeDir = FCPATH . 'themes' . DIRECTORY_SEPARATOR . 'colorlib-cool-admin';

    CliHelper::downloadToFile('https://codeload.github.com/puikinsh/CoolAdmin/zip/master', $themeDir . '.zip');
    CliHelper::zipExtractTo($themeDir . '.zip', $themeDir);
    CliHelper::delete($themeDir . '.zip');
    CliHelper::copy($themeDir . DIRECTORY_SEPARATOR . 'CoolAdmin-master/css', $themeDir . DIRECTORY_SEPARATOR . 'css');
    CliHelper::copy($themeDir . DIRECTORY_SEPARATOR . 'CoolAdmin-master/fonts', $themeDir . DIRECTORY_SEPARATOR . 'fonts');
    CliHelper::copy($themeDir . DIRECTORY_SEPARATOR . 'CoolAdmin-master/images', $themeDir . DIRECTORY_SEPARATOR . 'images');
    CliHelper::copy($themeDir . DIRECTORY_SEPARATOR . 'CoolAdmin-master/js', $themeDir . DIRECTORY_SEPARATOR . 'js');
    CliHelper::copy($themeDir . DIRECTORY_SEPARATOR . 'CoolAdmin-master/vendor', $themeDir . DIRECTORY_SEPARATOR . 'vendor');
    CliHelper::delete($themeDir . DIRECTORY_SEPARATOR . 'CoolAdmin-master');
    CliHelper::copy(dirname(__DIR__) . '/custom.css', $themeDir . DIRECTORY_SEPARATOR . 'custom.css');
});

CodeIgniter\Events\Events::on('admin_theme_list', function($event) {

    $event->result['BasicApp\CoolAdminTheme\Theme'] = 'Cool Admin by Colorlib';

});