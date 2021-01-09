<?php


namespace App\Event;

use App\Mailer\Mailer;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class UserSubscriber implements EventSubscriberInterface
{

    /**
     * @var Mailer $mailer
     */
    private $mailer;
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
            UserRegisterEvent::NAME => 'onUserRegister'
        ];
    }

    public function onUserRegister(UserRegisterEvent $userRegisterEvent)
    {
        $this->mailer->sendConfirmationEmail($userRegisterEvent->getRegisteredUser());
    }
}
