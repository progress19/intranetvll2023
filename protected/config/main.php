<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Intranet VLL',
	'language'=>'es',
	'sourceLanguage'=>'en',
	'charset'=>'utf-8',
	'theme'=>'bootstrap', 

// preloading 'log' component
//'preload'=>array('log'),
'preload'=>array('log','bootstrap'),  //Esto también deben de dejarlo así

// autoloading model and component classes
'import'=>array(
	'application.models.*',
	'application.components.*',
	'application.helpers.*',
	'ext.YiiMailer.YiiMailer',
	),

'modules'=>array(
// uncomment the following to enable the Gii tool

	'admin',
	'backup',
	'buscador',

	'gii'=>array(
		'class'=>'system.gii.GiiModule',
		'password'=>'1234',
// If removed, Gii defaults to localhost only. Edit carefully to taste.
		'ipFilters'=>array('127.0.0.1','::1'),
		),
	),
/*
'gii'=>array(
'class'=>'application.gii.GiiModule',
'password'=>'1234',
'ipFilters'=>array('127.0.0.1','::1'),
'generatorPaths' => array(
'bootstrap.gii'
),
),
),*/


// application components
'components'=>array(

	'bootstrap' => array(
		'class' => 'ext.bootstrap.components.Booster',
		'responsiveCss' => true, 
		),

	'image'=>array(
		'class'=>'application.extensions.image.CImageComponent',
// GD or ImageMagick
		'driver'=>'GD',
// ImageMagick setup path
		'params'=>array('directory'=>'/opt/local/bin'),
		),


	'phpThumb'=>array(
		'class'=>'ext.EPhpThumb.EPhpThumb',
//'options'=>array(optional phpThumb specific options are added here)
		),


	'format' => array(
		'datetimeFormat' => "d M, Y h:m:s a",
		'dateFormat' => 'd/m/Y',   
		'timeFormat' => 'h:m'
),

	'user'=>array(
// enable cookie-based authentication
		'allowAutoLogin'=>true,
		'class' => 'WebUser',
		),
// uncomment the following to enable URLs in path-format

	'urlManager'=>array(
		'urlFormat'=>'path',
		'showScriptName'=> false,
		'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
				
				'admin/<controller:\w+>/<action:\w+>/<id:\d+>'=>'admin/<controller>/<action>',

				'home'=>'site/index',

				'home'=>'site/index',
				'contacto'=>'site/contacto',
				'lector'=>'site/lector',
				'comedor'=>'site/comedor',
				'horario'=>'site/horario',

			),
		),

/*'db'=>array(
'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
),*/
// uncomment the following to use a MySQL database

'db'=>array(
	'connectionString' => 'mysql:host=localhost;dbname=intranetvll4',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	),

/*
'db'=>array(
'connectionString' => 'mysql:host=localhost;dbname=',
'emulatePrepare' => true,
'username' => 'opuscruceros_u',
'password' => '20Mau14Opus',
'charset' => 'utf8',
),
*/	
'errorHandler'=>array(
// use 'site/error' action to display errors
	'errorAction'=>'site/error',
	),
'log'=>array(
	'class'=>'CLogRouter',
	'routes'=>array(
		array(
			'class'=>'CFileLogRoute',
			'levels'=>'error, warning',
			),
// uncomment the following to show log messages on web pages
/*
array(
'class'=>'CWebLogRoute',
),
*/
	),
	),
),

// application-level parameters that can be accessed
// using Yii::app()->params['paramName']
'params'=>array(
// this is used in contact page
	'adminEmail'=>'mauricio@pixtudios.net',
	),
);
