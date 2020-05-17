<?php

namespace App\Console;

use App\Jobs\MyJob;
use App\Person;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $count = Person::all()->count();
        $id = rand(1, $count);
        // ディスパッチ
        // 1.ジョブ(コンストラクタ→invoke→handle)を発行
        // 2.キューに追加 ※ワーカ起動でジョブ実行
        $schedule->job(new MyJob($id));
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

class ScheduleObj
{
    private $person;

    public function __construct($id)
    {
        $this->person = Person::find($id);
    }

    public function __invoke()
    {
        Storage::append('person_access.log', $this->person->all_data);
        MyJob::dispatch($this->person);
        return 'true';
    }
}
