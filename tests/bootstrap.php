<?php
declare(strict_types=1);

/**
 * A KnpMenu seasoned menu plugin for CakePHP.
 *
 * @see https://github.com/icings/menu
 */

use Cake\Core\Configure;
use Cake\Core\Plugin;
use Icings\Menu\Plugin as MenuPlugin;

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
define('ROOT', dirname(__DIR__));
define('APP_DIR', 'src');
define('APP_ROOT', ROOT . DS . 'tests' . DS . 'TestApp' . DS);
define('APP', APP_ROOT . APP_DIR . DS);
define('CONFIG', APP_ROOT . DS . 'config' . DS);
define('WWW_ROOT', APP . DS . 'webroot' . DS);
define('TESTS', ROOT . DS . 'tests' . DS);
define('TMP', APP_ROOT . DS . 'tmp' . DS);
define('LOGS', APP_ROOT . DS . 'logs' . DS);
define('CACHE', TMP . 'cache' . DS);
define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp');
define('CORE_PATH', CAKE_CORE_INCLUDE_PATH . DS);
define('CAKE', CORE_PATH . 'src' . DS);

require_once ROOT . DS . 'vendor' . DS . 'autoload.php';
require_once CORE_PATH . 'config' . DS . 'bootstrap.php';

$config = [
    'debug' => true,

    'App' => [
        'namespace' => 'App',
        'encoding' => 'UTF-8',
        'defaultLocale' => 'en_US',
        'base' => false,
        'baseUrl' => false,
        'dir' => 'src',
        'webroot' => 'webroot',
        'wwwRoot' => WWW_ROOT,
        'fullBaseUrl' => 'http://localhost',
        'imageBaseUrl' => 'img/',
        'cssBaseUrl' => 'css/',
        'jsBaseUrl' => 'js/',
        'paths' => [
            'plugins' => [APP_ROOT . 'plugins' . DS],
            'templates' => [APP . 'Template' . DS],
            'locales' => [APP . 'Locale' . DS],
        ],
    ]
];
Configure::write($config);

date_default_timezone_set('UTC');
mb_internal_encoding(Configure::read('App.encoding'));
ini_set('intl.default_locale', Configure::read('App.defaultLocale'));

Plugin::getCollection()->add(new MenuPlugin(['path' => ROOT]));
