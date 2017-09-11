<?php

namespace App\Service\Posts;

use Slim\Http\Request;
use Model\Domain\Posts\PostRepository;

class Delete
{
    public function run(Request $request, $response, $args)
    {
        $id = $args['id'];
        
        (new PostRepository())->delete($id);
    }
}