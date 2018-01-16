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

//Define a route using parameters ---
$f3->route('GET /hello/@name', function($f3, $params)
{
    //$name = $params['name'];
    //echo "<h1>Hello, $name</h1>";

    $f3->set('name', $params['name']);
    $template = new Template();
    echo $template->render('views/hello.html');
}
);

////...IT328_Works/routing-demo-repo/h1/joe/shmo
$f3->route('GET /hi/@first/@last', function($f3, $params)
{
    $f3->set('first', $params['first']);
    $f3->set('last', $params['last']);
    $f3->set('message', 'Hi');

    $template = new Template();
    echo $template->render('views/hi.html');
}
);

//define a Toe Ring page
$f3->route('GET /jewelry/rings/toe-rings', function()
{
    $template = new Template();
    echo $template->render('views/toe-rings.html');
}
);

//Run fat free
$f3->run();