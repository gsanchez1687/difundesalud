<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'language' => 'es',
        'name'=>'::DifundeSalud::.',
        'sourceLanguage' => 'es',   
        'defaultController' => 'site/index',	

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'16871752',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => false,                   
                    'rules' => array(
//                        '<controller:\w+>/<id:\d+>' => '<controller>/view',
//                        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//                        '<lg>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//                        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                ),
        ),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

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
		'view-icon' => '<i class="fa fa-eye"></i>',
                'view-btn' => 'btn btn8-default',
                'update-icon' => '<i class="fa fa-pencil-square-o"></i>',
                'update-btn' => 'btn btn-default',
                'delete-icon' => '<i class="fa fa-times"></i>',
                'delete-btn' => 'btn btn-default',
                'save-icon' => '<i class="icon-menu glyph-icon flaticon-floppy1"></i>',
                'save-btn' => 'btn btn-sm btn6-success',
                'IDGridview'=>'',
                'rutaUrlGridviewBoxSwitch'=>'',
                'save-btn' => 'btn btn-primary',      
                'cancel-btn' => 'btn btn-default',
                'cancel-text' => 'Cancelar',
                'save-text' => 'Enviar',  
                'rollback' => FALSE,
                'cantregistros_defecto_gridview' => '10',
                'registros_pagina_gridview' => array(10 => 10, 20 => 20, 50 => 50, 100 => 100),
                'boton' => 'btn-sm btn btn6-default',
                'icon-view' => '<span class="glyphicon glyphicon-eye-open"></span>',
                'icon-edit' => '<span class="glyphicon glyphicon-pencil"></span>',
                'ErrorAccesoDenegado'=>'Acceso denegado',
                'message'=>'',
                'menu'=>''
                ),
);
