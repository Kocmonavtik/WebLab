<?php

namespace App\MessageHandler;

use App\Message\Comment;
//use App\Message\SmsNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\Entity\BookComment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentHandler extends AbstractController implements MessageHandlerInterface
{
    public function __invoke(Comment $item)
    {
        $comment=new BookComment();
        $comment->setNameBook($item->getBookName());
        $comment->setDescriptionBook($item->getBookDescription());
        $comment->setCreatorName($item->getCreatorName());
        $comment->setCommentText($item->getCommentText());
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($comment);
        $entityManager->flush();
        //dump($item->getContent());
    }
}
