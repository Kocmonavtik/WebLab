<?php
namespace App\MessageHandler;

use App\Entity\TextMessage;
use App\Message\SmsNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SmsNotificationHandler extends AbstractController implements MessageHandlerInterface
{
    public function __invoke(SmsNotification $TextString)
    {
        $message=new TextMessage();
        $message->setText($TextString->getContent());
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($message);
        $entityManager->flush();
    }

}
