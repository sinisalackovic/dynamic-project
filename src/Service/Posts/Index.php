<?php

namespace App\Service\Posts;

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Domain\Posts\PostRepository;
use Model\Formatter\Posts\IndexFormatter;

class Index
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function run(Request $request, Response $response)
    {
        $postsCollection = (new PostRepository())->findAll();

        $posts = [];
        foreach ($postsCollection as $post){
            $posts[] = IndexFormatter::format($post);
        }
        
        return $this->view->render(
            'posts/index.twig',
            [
                'response' => [
                    'posts' => $posts,
                ]
            ]
        );
    }
}