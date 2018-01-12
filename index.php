<?php
//old method of error reporting
//ini_set ("display_errors", 1);
//error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//new method of error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function()
{
    echo '<h1>Routing demo</h1>';
}
);


//Define a page 1
$f3->route('GET /page1', function()
{
    echo '<h1>This is Page 1</h1>';
}
);

//Define a subPage
$f3->route('GET /page1/subpage-a', function()
{
    echo '<h1>This is Page 1, Subpage A</h1>';
}
);

//Run fat free
$f3->run();