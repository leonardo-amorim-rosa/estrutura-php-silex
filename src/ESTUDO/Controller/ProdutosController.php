<?php 

namespace ESTUDO\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;

class ProdutosController implements ControllerProviderInterface
{

	public function connect(Application $app)
	{
		$controllers = $app['controllers_factory'];

		$controllers->get('/{id}', function($id) use ($app) {
			return $app['twig']->render('/Produtos/view.twig', ['id' => $id]);
		});

		$controllers->get('/', function() use ($app) {
			return $app['twig']->render('/Produtos/index.twig', []);
		});

		return $controllers;
	}

}

?>