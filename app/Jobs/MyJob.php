<?php

namespace App\Jobs;

use App\Person;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class MyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $person;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->person = Person::find($id);
    }

    public function __invoke()
    {
        $this->handle();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->doJob();
    }

    public function getPersonId()
    {
        return $this->person->id;
    }

    private function doJob()
    {
        $sufix = ' [+MYJOB]';
        $person = $this->person;
        $name = $person->name;
        if (strpos($name, $sufix)) {
            $person->name = str_replace($sufix, '', $name);
        } else {
            $person->name .= $sufix;
        }
        $person->save();
        
        Storage::append('person_access.log', $person->all_data);
    }
}
