<?php

namespace App\Service\Posts;

use Slim\Http\Request;
use Model\Domain\Posts\PostRepository;

class Get
{
    public function run($view, Request $request, $response, $args)
    {
        $id = $args['id'];

echo '<pre>'; var_dump($view); die;
        
        // Render Twig template in route
        return $this->view->render($response, 'profile.html', [
            'name' => $args['name']
        ]);
        
        
        return (new PostRepository())->findById($id);
    }
}