<?php

namespace Tests\Feature;

use App\User;
use App\Person;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HelloTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testHello()
    {
        $userData = ['name' => 'AAA',
                    'email' => 'BBB@CCC.COM',
                    'password' => 'ABCABC'];
        factory(User::class)->create($userData);

        factory(User::class, 10)->create();
        $this->assertDatabaseHas('users', $userData);

        $personData = ['name' => 'XXX',
                    'mail' => 'YYY@ZZZ.COM',
                    'age' => 123];
        factory(Person::class)->create($personData);

        factory(Person::class, 100)->create();
        $this->assertDatabaseHas('people', $personData);
    }
}
