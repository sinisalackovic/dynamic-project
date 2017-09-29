<?php

namespace Model\Formatter\Posts;

use Model\Domain\Posts\PostEntity;

class IndexFormatter
{
    public static function format(PostEntity $postEntity)
    {
        return [
            "id"          =>   $postEntity->getId(),
            "title"       =>   $postEntity->getTitle(),
            "body"        =>   $postEntity->getBody(),
            "author"      =>   $postEntity->getAuthor(),
            "ts_created"  =>   date('m/d/Y', $postEntity->getTsCreated()),
            "ts_updated"  =>   date('m/d/Y', $postEntity->getTsUpdated())
        ];
    }
}