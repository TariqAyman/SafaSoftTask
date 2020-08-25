<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $address;

    public $telephone;

    /**
     * Create a new event instance.
     *
     * @param $address
     * @param $telephone
     */
    public function __construct($address , $telephone)
    {
        //
        $this->address = $address;
        $this->telephone = $telephone;
    }
}
