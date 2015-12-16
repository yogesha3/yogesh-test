<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 *
 */

/**
 * Custom Inflector rules can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. Make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */
CakePlugin::loadAll();

/**
 * To prefer app translation over plugin translation, you can set
 *
 * Configure::write('I18n.preferApp', true);
 */

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *		'MyCacheFilter' => array('prefix' => 'my_cache_'), //  will use MyCacheFilter class from the Routing/Filter package in your app with settings array.
 *		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 *		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

CakePlugin::load('Csv');

/**
 * user defined constants
 */
Configure::write('Email_From_Email','no-reply@foxhoper.com');
Configure::write('Email_From_Name','foxhoper.com');
if(isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'localhost')){
    Configure::write('SITE_URL', 'http://localhost/foxhopr_testing/');
    Configure::write('TRANSPORT', 'smtp');
}else{
    Configure::write('SITE_URL', 'http://10.10.12.69/foxhopr_testing/');
    Configure::write('TRANSPORT', 'default');
}
/*********** Twitter API 1.1 *************/
Configure::write('twitter_consumer_key','kQUGbemTwsEj3IksfTjoUFLlB');
Configure::write('twitter_consumer_secret','SwcnXWcg7yFRs3qCOyK8t6iWtAWVBIEIrChVRPcaXqRV7tg2lc');
Configure::write('twitter_oauth_callback','http://10.10.12.69/foxhopr_testing/businessOwners/twitterOauthCallback');

/*********Facebook Post API**************/
Configure::write('appId', '1667214980183186'); //Facebook App ID
Configure::write('appSecret', '013a8f3273d5cf0a2c2191979de47130'); // Facebook App Secret
Configure::write('return_url', 'http://localhost/FBPost/process.php');  //return url (url to script)
Configure::write('fbPermissions', 'publish_actions');  //Required facebook permissions
//$fbPermissions = 'publish_actions,manage_pages';  //Required facebook permissions

/*********** Linkedin API *************/
Configure::write('linkedinApiKey', '75xgyju3kns2yi');
Configure::write('linkedinApiSecret', 'mO6YedlZjMxRko14');

/*********** Authorize.net *************/

$METHOD_TO_USE = "AIM";
//define("AUTHORIZENET_API_LOGIN_ID","49U4TrcR");    // Add your API LOGIN ID Rohan Account
//define("AUTHORIZENET_TRANSACTION_KEY","528S2q7p6wgM7Fab"); // Add your API transaction key old Rohan Account

define("AUTHORIZENET_API_LOGIN_ID","5tfnrwN5H9Af");    // Add your API LOGIN ID 
define("AUTHORIZENET_TRANSACTION_KEY","5dTg5SU7r55h7hv4"); // Add your API transaction key 
define("AUTHORIZENET_SANDBOX",true);       // Set to false to test against production
define("TEST_REQUEST", "FALSE");           // You may want to set to true if testing against production
define("AUTHORIZENET_MD5_SETTING",""); 

/*********** Authorize.net *************/

Configure::write('PERPAGE',array('10'=>'10' , '25'=>'25' ,'50'=>'50', '100'=>'100'));
Configure::write('GROUP_PREFIX', 'Group');

/*********** Google OAuth *************/

Configure::write('GOOGLE_CLIENT_ID','349215608557-8kqf6omgb8bgbe0guur0tsgl1j1d33bs.apps.googleusercontent.com');
Configure::write('GOOGLE_CLIENT_SECRET', 'HzwVIhse8Mw_xUYhuMVb6a59');
Configure::write('GOOGLE_REDIRECT_URI', Configure::read('SITE_URL').'contacts/gmailSync/callback');

/***********WEb Services****************/
Configure::write('SERVICEFORMAT', 'json');
Configure::write('HASHKEY', 'bf1f135e2cf4440ddd4b4c209d9bb319206a406a');
Configure::write('RESPONSE_ERROR', '404');
Configure::write('RESPONSE_SUCCESS', '200');
Configure::write('RESPONSE_WARNING', '201');

/******* Live Feed MSG ***********/
define("EVENTFEED", "has sent an event.");
define("MSGFEED", "has sent a message.");
define("REFERRARFEED", "has sent a referral.");
define("REVIEWFEED", "has sent a review.");
define("NEWMEMBERFEED", "has joined your group.");

/********** admin email **********/
define('AdminEmail','bhanu.bhati@a3logics.in');
define('AdminName','Admin');

//extension array to be checked while uploading file
Configure::write('ARRAYEXT', array('jpeg', 'jpg', 'png', 'doc', 'docx', 'pdf', 'xls', 'xlsx'));
Configure::write('MAX_IMG_ARRAY_SIZE', 10);
Configure::write('MIN_IMG_ARRAY_SIZE', 0);
Configure::write('RATING_TYPE_NO', 3);
Configure::write('PLANPRICE', 49.99);
Configure::write('PER_PAGE', 10); //default limit in pagination
Configure::write('PAGE_NO', 1); //default page no in pagination
Configure::write('REVIEW_PER_PAGE', 5);
Configure::write('DEFAULT_MILES', 5);
Configure::write('MILESTOKM', 1.60934);
Configure::write('LATLONGDEGREE', 110.54);
Configure::write('MAX_RATING', 5);
Configure::write('MAXFILESIZE', 1048576);
Configure::write('MAX_USER_IN_GROUP', 20);
Configure::write('AJAX_LOAD', 20);
Configure::write('PAYMENT_TYPE', 'Credit Card');
Configure::write('FIRSTDAY_CURRENT_MONTH', date('Y-m-01 00:00:00'));
Configure::write('LASTDAY_CURRENT_MONTH', date('Y-m-t 23:59:59'));

//Adobe connect Url
Configure::write('ADOBECONNECTURL','https://foxhopr.adobeconnect.com/api/xml');
Configure::write('MEETING_BASE_URL','https://foxhopr.adobeconnect.com');


//Adobe connect meeting slots management
Configure::write('SLOT_POSITION_FIRST','t1,t5,t9,t13,t17,t21,t25,t29,t33,t37,t41,t45');
Configure::write('SLOT_POSITION_SECOND','t2,t6,t10,t14,t18,t22,t26,t30,t34,t38,t42,t46');
Configure::write('SLOT_POSITION_THIRD','t3,t7,t11,t15,t19,t23,t27,t31,t35,t39,t43,t47');
Configure::write('SLOT_POSITION_FOURTH','t4,t8,t12,t16,t20,t24,t28,t32,t36,t40,t44,t48');