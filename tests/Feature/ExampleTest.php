<?php

namespace Tests\Feature;

use App\Events\PersonEvent;
use App\Jobs\MyJob;
use App\Listeners\PersonEventListener;
use App\MyClasses\PowerMyService;
use App\Person;
use App\User;
use Illuminate\Events\CallQueuedListener;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Mockery;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $msg = '*** OK ***';
        $mock = Mockery::mock(PowerMyService::class);
        $mock->shouldReceive('setId')->withArgs([2])->once()->andReturn(null);
        $mock->shouldReceive('say')->once()->andReturn($msg);

        $this->instance(PowerMyService::class, $mock);

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/hello');
        $response->assertSeeText($msg);
        $response->assertSee('<h1>', false); // '< >'をエスケープしない
    }
}
