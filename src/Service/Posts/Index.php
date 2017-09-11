<?php

namespace App\Service\Posts;

use Slim\Http\Request;
use Slim\Http\Response;

class Index
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function run(Request $request, Response $response)
    {
        return $this->view->render(
            'index.twig',
            [
                'response' => [
                    'data1' => 1,
                    'data2' => 2,
                ]
            ]
        );
    }
}