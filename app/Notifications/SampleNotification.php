<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class SampleNotification extends Notification
{
    use Queueable;

    protected $user;
    protected $title;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $title, $message)
    {
        //
        $this->user = $user;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack', 'mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('サンプルメール通知')
            ->from('studylaravel@coremind.jp', 'StudyLaravelAdministrator')
            ->view('emails.notification', [
                'notification_title' => $this->title,
                'notification_message' => $this->message,
            ]);
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->user->name,
            'title' => $this->title,
            'message' => $this->message,
        ];
    }

    /**
     * Get the slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->from('StudyLaravel@App')
            // ->content($this->message);
            ->attachment(function ($attachment) {
                $attachment
                    ->title('Notification from App.')
                    ->fields([
                        'title' => $this->title,
                        'message' => $this->message
                    ]);
            });
    }
}
