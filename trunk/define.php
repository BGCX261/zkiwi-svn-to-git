<?php

// Define path to application directory

defined('APPLICATION_PATH')

    || define('APPLICATION_PATH',

              realpath(dirname(__FILE__) . '/application'));





// Define application environment

defined('APPLICATION_ENV')

    || define('APPLICATION_ENV',

              (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')

                                         : 'developer'));



set_include_path(implode(PATH_SEPARATOR, array(

    dirname(__FILE__) . '/library',

	get_include_path(),

)));



define('PUBLIC_PATH', dirname(__FILE__) . '/public');

define('TEMPLATE_PATH', PUBLIC_PATH . '/templates');



define('APPLICATION_URL', '/zkiwi');

define('PUBLIC_URL', APPLICATION_URL . '/public');

define('TEMPLATE_URL', PUBLIC_URL . '/templates');

define('APPLICATION_EDITOR', realpath(dirname(__FILE__)));
define('JURI','http://localhost/zkiwi');

define('union_default','en_US');
define('JURI_BACK','http://localhost/zkiwi/manager/');
