<?php

namespace Model\Domain\Posts;

use G4\DataMapper\Common\MappingInterface;

class PostMap implements MappingInterface
{
    private $entity;

    public function __construct(PostEntity $postEntity)
    {
        $this->entity  = $postEntity;
    }

    public function map()
    {
        return [
            'title'         => $this->entity->getTitle(),
            'author'        => $this->entity->getAuthor(),
            'body'          => $this->entity->getBody(),
            'ts_created'    => time(),
            'ts_modified'   => time()
        ];
    }
}