<?php

namespace App\Service\Posts;

use Model\Domain\Posts\PutMap;
use Slim\Http\Request;
use Model\Domain\Posts\PostRepository;

class Put
{
    public function run(Request $request, $response, $args)
    {
        $data = $request->getParams();
        $entity = (new PostRepository())->findById($data['id']);
        (new PostRepository())->update($data['id'], new PutMap($data, $entity));
    }
}