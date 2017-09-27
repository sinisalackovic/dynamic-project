<?php

namespace Model\Domain\Comments;

class CommentEntityFactory
{
    public static function create(array $data)
    {
        return new CommentEntity($data['post_id'], $data['name'], $data['email'], $data['message']);
    }

    public static function reconstitute(array $data)
    {
        return new CommentEntity($data['post_id'], $data['name'], $data['email'], $data['message']);
    }
}