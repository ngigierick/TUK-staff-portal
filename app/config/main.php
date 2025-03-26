<?php
function setUp(){
	$myfile = fopen("../_/tlbds.txt", "r") or die("Unable to open file!");
	$data = array();
	while(!feof($myfile)) {
	  $data[] = fgets($myfile);
	}
	fclose($myfile);
	return $data;
	
}
function showError($data){
	 $conn = pg_connect(trim($data[3]))or die('connection failed');
	$result = pg_query($conn, "SELECT error from pol_site_config where id=5");
	if (!$result) {  echo "An error occurred.\n";  exit; }
	$row = pg_fetch_row($result);
	if (!isset($row[0])) return false;
	if ($row[0]==0) return false;
	defined('YII_DEBUG') or define('YII_DEBUG',true);
	return true;
}

$data = setUp();
$showErrors = showError($data);
$db=array(
		'connectionString'=>trim($data[0]),
		'username'=>trim($data[1]),
		'password'=>trim($data[2]),
		'charset' => 'utf8',
		'tablePrefix' => 'pol_',
		
		);

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return array(

	//PART1:: BASE DIRECTORY & APPLICATION NAME
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Staff ePortal',
	'theme'=>'bootstrap',
	//---- end PART1 -------------------------------------
	
	//PART2:: PRELOADING COMPONENTS
	// ...preloading 'log' and 'bootstrap' components...
	'preload'=>array('log'),
	//---- end PART2 -------------------------------------
	
	//PART3:: AUTOLOADING APPLICATION MODELS & COMPONENTS
	// ...autoloading model and component classes...
	'import'=>array(
		'application.models.*',
        'application.components.*',
				
		//user
		'application.modules.user.models.*',
		
		//setup
		'application.modules.setup.models.*',
		
		//giix
		'ext.giix-components.*', // giix components
		
		//audit trail
        'application.modules.auditTrail.models.AuditTrail',
		
		//php Excel
		 'application.vendors.phpexcel.PHPExcel',
		 
		  //Yii Mailer
		 'ext.YiiMailer.YiiMailer',
	   
	),
	//---- end PART3 -------------------------------------
	
	
	
	
	//PART4:: DEFAULT CONTROLLER
	'defaultController'=>'site',
	//---- end PART4 -------------------------------------
	
	
	
	//PART5:: SYSTEM MODULES
	'modules'=>array(
		
		// Gii tool - Using bootsrap now
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',

			'ipFilters'=>array('127.0.0.1'),
			//giix
			'generatorPaths'=>array(
				'ext.giix-core'// bootstrap generators
			),
			//'generatorPaths' => array('bootstrap.gii'),
			
		),
		//application specific modules
		 'setup',
		 'user',
		 'intake',
		 'selection',
		 'admission',
		 'finance',
		 'portal',
		 'courseApplication',
		 'hr',
		 'cart',
		  //audit trail
		 'auditTrail'=>array(
			'userClass' => 'User', // the class name for the user object
			'userIdColumn' => 'id', // the column name of the primary key for the user
			'userNameColumn' => 'name', // the column name of the primary key for the user
		),
		
	),
	//---- end PART5 -------------------------------------
	
	
	//PART6:: COMPONENT SETTINGS
	// application components
	'components'=>array(

		//user management
		'user'=>array(
			'class' => 'WebUser',
			 'loginUrl' => array('/site/login'),
		),
		//bootstrap
		'bootstrap'=>array(
        	'class'=>'bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
        	
		),
		//general utilities
		'utility'=>array('class'=>'GeneralUtility','category'=>3),
		
		//link manager
		'linkManager'=>array('class'=>'LinkManager'),	
		
		//database connection
		'db'=>$db,
	
		//error handling
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction' => $showErrors ? null : 'site/error',
		),
		 
		
		//url management
		/*'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:w+>/<id:d+>'=>'<controller>/view',
                '<controller:w+>/<action:w+>/<id:d+>'=>'<controller>/<action>',
                '<controller:w+>/<action:w+>'=>'<controller>/<action>',
			),
			'showScriptName'=>false,
            'caseSensitive'=>false,
		),*/
	
	
    //---- end PART6 -------------------------------------
	
	//:: Export to PDF
	'ePdf' => array(
        'class'         => 'ext.yii-pdf.EYiiPdf',
        'params'        => array(
            'mpdf'     => array(
                'librarySourcePath' => 'application.vendors.mpdf.*',
                'constants'         => array(
                    '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                ),
                'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                /*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                    'mode'              => '', //  This parameter specifies the mode of the new document.
                    'format'            => 'A4', // format A4, A5, ...
                    'default_font_size' => 0, // Sets the default document font size in points (pt)
                    'default_font'      => '', // Sets the default font-family for the new document.
                    'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                    'mgr'               => 15, // margin_right
                    'mgt'               => 16, // margin_top
                    'mgb'               => 16, // margin_bottom
                    'mgh'               => 9, // margin_header
                    'mgf'               => 9, // margin_footer
                    'orientation'       => 'P', // landscape or portrait orientation
                )*/
            ),
            'HTML2PDF' => array(
                'librarySourcePath' => 'application.vendors.html2pdf.*',
                'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                /*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                    'orientation' => 'P', // landscape or portrait orientation
                    'format'      => 'A4', // format A4, A5, ...
                    'language'    => 'en', // language: fr, en, it ...
                    'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                    'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                    'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                )*/
            )
        ),
    ),
    //...
	
		
	),
	
	
	//PART7:: PARAMETER SETTINGS
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
	//---- end PART7 -------------------------------------
	
);