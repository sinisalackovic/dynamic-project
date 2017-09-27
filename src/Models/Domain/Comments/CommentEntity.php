<?php

namespace Model\Domain\Comments;

class CommentEntity
{
    private $postId;
    private $name;
    private $email;
    private $message;

    public function __construct($postId, $name, $email, $message)
    {
        $this->postId  = $postId;
        $this->name    = $name;
        $this->email   = $email;
        $this->message = $message;
    }

    public function getPostId()
    {
        return $this->postId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMessage()
    {
        return $this->message;
    }
}