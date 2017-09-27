<?php

namespace App\Service\Comments;

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Domain\Comments\CommentRepository;
use Model\Domain\Comments\CommentEntityFactory;


class Post
{
    public function run(Request $request, Response $response)
    {
        $data   = $request->getParams();
        $entity = (new CommentEntityFactory())->create($data);

        (new CommentRepository())->save($entity);

        header('Location: /' . $request->getParam('post_id')); die;
    }
}