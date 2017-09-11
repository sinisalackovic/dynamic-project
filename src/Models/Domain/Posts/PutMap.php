<?php

namespace Model\Domain\Posts;

use G4\DataMapper\Common\MappingInterface;

class PutMap implements MappingInterface
{
    private $array;
    private $entity;

    public function __construct(array $data, PostEntity $entity)
    {
        $this->array = $data;
        $this->entity = $entity;
    }

    public function map()
    {
        return [
            'title'         => isset($this->array['title'])  ? $this->array['title']  : $this->entity->getTitle(),
            'author'        => isset($this->array['author']) ? $this->array['author'] : $this->entity->getAuthor(),
            'body'          => isset($this->array['body'])   ? $this->array['body']   : $this->entity->getBody(),
            'ts_modified'   => time()
        ];
    }
}