<?php
namespace App\Controller;

use App\Message\SmsNotification;
use App\MessageHandler\SmsNotificationHandler;
use App\Repository\TextMessageRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/Test")
 */
class TestMessage extends AbstractController
{
    /**
     * @Route("/new", name="new_message")
     */
    public function index(MessageBusInterface $bus): Response
    {
        $user='';
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUsername();
        }
        $txt='ваня лох';
        $bus->dispatch(new SmsNotification($txt));
        return $this->render('test/message.html.twig', [
            'message' =>$txt,
            'user'=>$user,
        ]);
    }
    /**
     * @Route("/show", name="show_message")
     */
    public function show(TextMessageRepository $textMessageRepository): Response
    {
        $user='';
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUsername();
        }
        return $this->render('test/showMessages.html.twig', [
            'messages' => $textMessageRepository->findAll(),
            'user'=>$user,
        ]);
    }
}
