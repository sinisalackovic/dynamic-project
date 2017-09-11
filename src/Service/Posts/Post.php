<?php

namespace App\Service\Posts;

use Slim\Http\Request;
use Model\Domain\Posts\PostRepository;
use Model\Domain\Posts\PostEntityFactory;

class Post
{
    /**
     * @param Request $request
     */
    public function run(Request $request)
    {
        $data   = $request->getQueryParams();
        $entity = PostEntityFactory::create($data);

        (new PostRepository())->save($entity);
        
    }
}