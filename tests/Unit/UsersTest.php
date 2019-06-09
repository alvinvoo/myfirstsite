<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\Fixtures;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase; // this part will take 10 seconds

    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function a_user_can_have_projects(){
        $user = factory('App\User')->create();

        $user->projects()->create(Fixtures::testData);

        $this->assertEquals(Fixtures::testData['title'], $user->projects->first()->title);
    }
}
