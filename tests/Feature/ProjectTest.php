<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Fixtures;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{

    use RefreshDatabase;

    /** @test **/
    public function guests_may_not_create_projects(){
        // $this->withoutExceptionHandling(); // if this works, this will throw unAuthorizedException

        $this->post('/projects')->assertRedirect('/login');
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test **/
    public function user_can_create_projects()
    {
        // $this->withoutExceptionHandling();
        // Given I am a logged in user
        $this->actingAs(factory('App\User')->create()); // actingAs will log in user

        // When they hit the endpoint /project/create to create a new project, passing in the required attributes
        // here assuming the form is correct n passes the correct data
        
        $testData = [
            'title' => 'Some test title',
            'description' => 'Some test description'
        ];

        $this->post('/projects', Fixtures::testData);

        // Then there should be a new project in the db
        // With these array data
        $this->assertDatabaseHas('projects', $testData);
    }
}
