<?php

namespace App\Message;

use App\ObjectMessage\BookMessage;

class Book
{
    private $content;

    public function __construct(BookMessage $content)
    {
        $this->content=$content;
    }

    public function getContent():BookMessage
    {
        return $this->content;
    }
}
