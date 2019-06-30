<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use \Carbon\Carbon;

class LikedPost extends Notification
{
    use Queueable;
    protected $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post,$user,$article)
    {
        $this->post=$post;
        $this->user=$user;
        $this->article=$article;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'post'=>$this->post,
            'user'=>$this->user,
            'article'=>$this->article,
            'message'=>[
                'title'=>'liked your post',
                'icon-class'=>'fa fa-thumbs-o-up'
            ]
        ];
    }
}
