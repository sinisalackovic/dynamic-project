<?php

namespace App\Service\Posts;

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Domain\Posts\PostRepository;
use Model\Formatter\Comments\GetFormatter;
use Model\Formatter\Posts\IndexFormatter;
use Model\Domain\Comments\CommentRepository;

class Get
{
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function run(Request $request, Response $response, $args)
    {
        $id = $args['id'];

        $entity = (new PostRepository())->findById($id);
        $posts  = IndexFormatter::format($entity);

        $commentsCollection = (new CommentRepository())->findAll($id);

        $comments = [];
        foreach ($commentsCollection as $comment){
            $comments[] = GetFormatter::format($comment);
        }

        return $this->view->render(
            'posts/get.twig',
            [
                'response' => [
                    'post'      => $posts,
                    'comments'  => $comments
                ]
            ]
        );
    }
}

