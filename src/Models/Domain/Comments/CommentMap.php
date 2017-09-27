<?php

namespace Model\Domain\Comments;

use G4\DataMapper\Common\MappingInterface;

class CommentMap implements MappingInterface
{
    private $entity;

    public function __construct(CommentEntity $commentEntity)
    {
        $this->entity  = $commentEntity;
    }

    public function map()
    {
        return [
            'post_id'       => $this->entity->getPostId(),
            'name'          => $this->entity->getName(),
            'email'         => $this->entity->getEmail(),
            'message'       => $this->entity->getMessage()
        ];
    }
}