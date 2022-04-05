<?php
namespace App\Controller;

use App\ObjectMessage\BookComment;
use App\Repository\BookCommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/message")
 */
class MessageController extends AbstractController
{
    /**
     * @Route("/", name="show_message")
     */
    public function showComments(BookCommentRepository $bookCommentRepository): Response
    {
        $user='';
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUsername();
        }
        return $this->render('test/showMessages.html.twig', [
            'messages' => $bookCommentRepository->findAll(),
            'user'=>$user,
        ]);
    }

    /**
     * @Route("/newmessage", name="new_message")
     */
    public function setMessage(MessageBusInterface $bus): Response
    {
        $user='';
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUsername();
        }
        $sms=new BookComment();
        $sms->setBookName("Тестовая книга");
        $sms->setDescription("Описание");
        $sms->setCreatorName("Автор");
        $sms->setCommentText("Комментарий");
        $bus->dispatch(new \App\Message\Comment($sms));
        return new RedirectResponse($this->generateUrl('show_message'));
    }
}
