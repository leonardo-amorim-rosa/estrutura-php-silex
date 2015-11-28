<?php 

require_once __DIR__ . "/../vendor/autoload.php";

$app = new Silex\Application();

//registrando twig para trabalhar com templates
$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__ . '/../views',
));

//log
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../log/development.log',
));

//layout master
$app->before(function () use ($app) {
    $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('/Layouts/master.twig'));
});

//configurando um controlador em arquivo separado
$app->mount('/produtos', new ESTUDO\Controller\ProdutosController());

$app->run();
?>