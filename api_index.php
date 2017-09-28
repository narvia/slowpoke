<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();

$app['HtmlParse'] = new Slowpoke\HtmlParse();

$app->before(function (Request $request) {
	
	// application/json only
	if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
		$data = json_decode($request->getContent(), true);
		$request->request->replace(is_array($data) ? $data : []);
	}
});

/**
 * Routing
 */
$app->post('/load_html', function(Request $request) use ($app) {
	return $app['HtmlParse']->parse($request->getContent());
});

$app->get('/load_html', function(Request $request) use ($app) {
	return $app['HtmlParse']->parse($request->getContent());
});

$app->view(function (array $controllerResult) use ($app) {
	return $app->json($controllerResult);
});

echo $app->run();