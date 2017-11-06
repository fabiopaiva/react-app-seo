<?php
namespace ReactAppSeo;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\App;

class Render extends App {
    protected $html;
    protected $routes;

    public function __construct($html, $routes, $slimConfig = []) {
        $this->html = $html;
        $this->routes = $routes;            
        parent::__construct($slimConfig);
    }

    public function run($silent = false) {
        $html = $this->html;
        $this->add(function (Request $request, Response $response) use ($html) {
            $response->getBody()->write($html);
            return $response;
        });
        parent::run();
    }
}
