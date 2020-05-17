<?php

namespace App\Events;

;

use App\Person;
use Illuminate\Queue\SerializesModels;

class PersonEvent
{
    use SerializesModels;

    public $person;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Person $person)
    {
        $this->person = $person;
    }
}
