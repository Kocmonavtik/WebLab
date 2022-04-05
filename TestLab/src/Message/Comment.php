<?php

namespace App\Message;

use App\ObjectMessage\BookComment;
use PhpParser\Node\Expr\Cast\Object_;

class Comment
{
    private $content;

    public function __construct(BookComment $content)
    {
        $this->content=$content;
    }

    public function getBookName():string
    {
        return $this->content->getBookName();
    }
    public function getBookDescription():string
    {
        return $this->content->getDescription();
    }
    public function getCreatorName():string
    {
        return $this->content->getCreatorName();
    }
    public function getCommentText():string
    {
        return $this->content->getCommentText();
    }
}
