<?php

namespace Tomsgad\Beem\SMS;

use Illuminate\Notifications\Notification;

class BeemChannel
{
    public Beem $beem;

    public function __construct(Beem $beem)
    {
        $this->beem = $beem;
    }

    public function send($notifiable, Notification $notification): string
    {
        $message = $notification->toBeem($notifiable);
        $recipients = $this->getRecipients($notifiable);

        return $this->beem->sendMessage($message, $recipients);
    }

    public function getRecipients($notifiable): array
    {
        $arrayContacts = [];

        if ($notifiable->routeNotificationFor('beem')) {
            $phoneNumbers = $notifiable->routeNotificationFor('beem');

            for ($i = 0; $i < count($phoneNumbers); $i++) {
                $arrayContacts[] = [
                    'recipient_id' => $i,
                    'dest_addr' => (string)$phoneNumbers[$i],
                ];
            }
        }

        return $arrayContacts;
    }
}
