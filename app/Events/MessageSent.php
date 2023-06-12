<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Chat;

class MessageSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $message;
    public function __construct(User $user, Chat $message)
    {
        $this->user = $user;
        $this->message = $message;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('chat');
    }
}
