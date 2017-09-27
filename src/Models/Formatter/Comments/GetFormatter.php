<?php

namespace Model\Formatter\Comments;

use Model\Domain\Comments\CommentEntity;

class GetFormatter
{
    public static function format(CommentEntity $commentEntity)
    {
        return [
            "post_id"    =>   $commentEntity->getPostId(),
            "name"       =>   $commentEntity->getName(),
            "email"      =>   $commentEntity->getEmail(),
            "message"    =>   $commentEntity->getMessage()
        ];
    }
}