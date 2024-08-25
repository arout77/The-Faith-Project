<?php
/**
 * file: /src/Factory.php
 *
 * We will use Pimple to create our services
 * and manage dependencies
 */
use Pimple\Container as Container;
use Src\Error;
use Validate\Enums\Boolean as BOOLEAN;
use Validate\Enums\Database_Types as DBTYPE;

$app        = new Container;
$app['app'] = $app;

$app['global_config_import'] = function ()
{
	if ( !defined( 'ENV_PATH' ) )
	{
		require_once 'Paths.php';
	}

	return new \Src\Import( ENV_PATH );
};

$app['config'] = function ( $c )
{
	return new \Src\Config( $c['global_config_import'] );
};

# Set error reporting level [via Config.php]
switch ( $app['config']->setting( 'error_reports' ) )
{
case "ON":
	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL & ~E_NOTICE );
	break;

case "DEV MODE":
	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );
	break;

default:
	ini_set( 'display_errors', 0 );
	error_reporting( 0 );
}

// # Set log file
if ( $app['config']->setting( 'log_errors' ) == "TRUE" )
{
	ini_set( "log_errors", TRUE );
	ini_set( 'error_log', $app['config']->setting( 'log_path' ) . 'system.log' );
}

// # Set time zone [via Config.php]
date_default_timezone_set( $app['config']->setting( 'time_zone' ) );

$app['router'] = function ( $c )
{
	return new \Src\Router;
};

$app['database'] = function ( $c )
{
	$freeze           = strtoupper( $c['config']->setting( 'db_freeze' ) );
	$dbengine         = strtolower( $c['config']->setting( 'db_type' ) );
	$freeze_setting   = BOOLEAN::tryFrom( $freeze );
	$dbengine_setting = DBTYPE::tryFrom( $dbengine );

	/**
	 * @param $params
	 * @param $c
	 */
	function throwError( $params, $c )
	{
		$e                = new Error( $c );
		$e->type          = $params['type'];
		$e->category      = $params['category'];
		$e->triggeredBy   = $params['triggeredBy'];
		$e->object        = $params['object'];
		$e->value         = $params['value'];
		$e->valid_options = $params['valid_options'];
		$e->display();exit;
	}

	if ( is_null( $dbengine_setting ) )
	{
		$params = [
			'type'          => 'Enum',
			'category'      => 'Configuration',
			'triggeredBy'   => DBTYPE::class,
			'object'        => 'db_type',
			'value'         => $c['config']->setting( 'db_type' ),
			'valid_options' => DBTYPE::cases(),
		];

		return throwError( $params, $c );
	}

	if ( is_null( $freeze_setting ) )
	{
		$params = [
			'type'          => 'Enum',
			'category'      => 'Configuration',
			'triggeredBy'   => BOOLEAN::class,
			'object'        => 'db_freeze',
			'value'         => $c['config']->setting( 'db_freeze' ),
			'valid_options' => BOOLEAN::cases(),
		];

		return throwError( $params, $c );
	}
	// Create instance of redbean orm
	require_once VENDOR_PATH . 'gabordemooij/redbean/RedBeanPHP/R.php';
	\RedBeanPHP\R::setup(
		"{$dbengine}:host=" . $c['config']->setting( 'db_host' ) . ";
		dbname=" . $c['config']->setting( 'db_name' ) . "", $c['config']->setting( 'db_user' ), $c['config']->setting( 'db_pass' ) );
	// \RedBeanPHP\R::fancyDebug(TRUE);
	if ( $freeze === BOOLEAN::OFF )
	{
		\RedBeanPHP\R::useWriterCache( true );
		return \RedBeanPHP\R::getDatabaseAdapter()->getDatabase()->getPDO()->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );
	}

	\RedBeanPHP\R::useWriterCache( true );
	\RedBeanPHP\R::getDatabaseAdapter()->getDatabase()->getPDO()->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );
	return \RedBeanPHP\R::freeze( TRUE );
};

$app['database_info'] = function ( $c )
{
	$db = new \Src\Database( $c );
	return $db->sql_info( $c );
};

$app['load'] = function ( $c )
{
	return new \Src\Loader( $c );
};

$app['log'] = function ( $c )
{
	return new \Src\Logger( $c );
};

$app['system_model'] = function ( \Pimple\Container $app )
{
	return new \Src\Model\System_Model( $app );
};

$app['toolbox'] = function ( $app )
{
	// Used to pass the toolbox as a function parameter to other objects
	return $app;
};

$app['profiler'] = function ( $c )
{
	return new \Src\Profiler( $c, $middlewareArr = [] );
};

// $app['event_manager'] = function ( $app )
// {
// 	return new \Src\EventManager( $app );
// };

$app['base_controller'] = function ( $c )
{
	return new \Src\Controller\Base_Controller( $c );
};

$app['middleware'] = function ( $app )
{
	return new \Src\Middleware\Helper( $app );
};

$app['mailer'] = function ( $c, MailerInterface $mailer )
{
	return $mailer;
};

$app['email'] = function ( $c )
{
	return new \Src\Middleware\Email( $c );
};

$app['pagination'] = function ( $c )
{
	return new \Src\Middleware\Pagination( $c );
};

$app['format'] = function ( $c )
{
	return new \Src\Middleware\Format;
};

// new geo module
$app['geoip'] = function ( $c )
{
	return new \Src\Middleware\Geoip( $c );
};

$app['hash'] = function ( $c )
{
	return new \Src\Middleware\Hash;
};

$app['session'] = function ( $c )
{
	return new \Src\Middleware\Session( $c );
};

$app['template'] = function ( $c )
{
	return new \Src\Template( $c );
};

// $app['html_purify'] = function ($c) {
// 	require_once VENDOR_PATH . 'ezyang/htmlpurifier/library/HTMLPurifier.auto.php';
// 	$config = HTMLPurifier_Config::createDefault();
// 	$config->set('Core.Encoding', 'UTF-8'); // replace with your encoding
// 	$config->set('HTML.Doctype', 'HTML 4.01 Strict'); // replace with your doctype
// 	$config->set('Cache.DefinitionImpl', null); // Turns off definition caching for dev purposes. Turn on for live environment
// 	return new HTMLPurifier($config);
// };

// $app['login'] = function ($c) {
// 	return new \Src\Middleware\Login($c);
// };

// $app['paypal'] = function ($c) {
// 	return new \Src\Middleware\Paypal($c);
// };

// $app['sanitize'] = function ($c) {
// 	return new \Src\Middleware\Sanitize($c);
// };

// $app['title'] = function ($app) {

// 	$title = new \Src\Middleware\Title($app['toolbox']);
// 	require_once MODULES_PATH . 'Titlesettings.php';
// 	# Pass the Titlesettings() function from the included file above to $title->set()
// 	$title->set(Titlesettings($app));
// 	return $title;
// };

// $app['validate'] = function ($c) {
// 	return new \Src\Middleware\Validation;
// };

// $app['whitelist'] = function ($app) {
// 	return new \Src\Middleware\Whitelist($app);
// };

/*

$app['cron'] = function ($c) {
return new \Src\Cron;
};

$app['dispatcher'] = new Src\Dispatch;

$app['registry'] = function ($c) {
return new \Src\Registry($c);
};

$app['event'] = function ($c) {
return new \Src\Event($c);
};

$app['system_block'] = function ($c) {
return new \App\Block\System_Block($c);
};

$app['parse'] = function ($c) {
return new \Src\Parse($c);
};

// $app['orm'] = function ($c) {
// Create instance of redbean orm
// 	require_once VENDOR_PATH . 'gabordemooij/redbean/RedBeanPHP/R.php';
// 	return \RedBeanPHP\R::setup("mysql:host=" . $c['config']->setting('db_host') . ";
// 		dbname=" . $c['config']->setting('db_name') . "", $c['config']->setting('db_user'), $c['config']->setting('db_pass'));

// uncomment the below in production environment to prevent database columns from changing
// R::freeze( TRUE );
// };

$app['view'] = function ($c) {
return new \Src\SystemView;
};

$app['cache'] = function ($c) {
return new \Src\Cache;
};

$app['code_generator'] = function ($c) {
return new \Src\Codegenerator($c);
};

#   Toolbox middlewares
$app['breadcrumbs'] = function ($c) {
$bc = new \Src\Middleware\Breadcrumbs($c['router'], $c['config']);
$bc->show();
return $bc;
};

$app['cookie'] = function ($c) {
return new \Src\Cookie;
};

$app['friends'] = function ($c) {
return new \Src\Middleware\Friends($c['database'], $c['toolbox'], $c['system_model']);
};

$app['image'] = function ($c) {
return new \Src\Middleware\Image($c['config'], $c['toolbox']);
};

$app['input'] = function ($c) {
return new \Src\Middleware\Input($c['sanitize'], $c['validate']);
};

$app['memcached'] = function ($c) {
$host            = $c['config']->setting('memcached_host');
$port            = $c['config']->setting('memcached_port');
return $instance = new \Src\Middleware\Cache($host, $port);
return $instance->connect($host, $port);
if (!$connect) {
$c['log']->save('Could not connect to Memcached');}
// return $_s->connect();
};

$app['messenger'] = function ($c) {
return new \Src\Middleware\Messenger($c['database'], $c['toolbox']);
};

$app['mysql'] = function ($c) {
return new \Src\Middleware\Mysql($c);
};

$app['opcache'] = function ($c) {
return new \Src\Opcache;
};

$app['performance'] = function ($c) {
return new \Src\Middleware\Performance;
};

$app['search'] = function ($c) {
return new \Src\Middleware\Search($c['database']);
};
 */
