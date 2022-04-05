<?php

namespace App\MessageHandler;

use App\Message\Book;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class BookHandler implements MessageHandlerInterface
{
    public function __invoke(Book $item)
    {
        dump($item->getContent());
    }
}
