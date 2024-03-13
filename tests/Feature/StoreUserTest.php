<?php

namespace Tests\Feature;

use App\Events\UserCreatedEvent;
use App\Listeners\UserCreatedEventListener;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class StoreUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_the_homepage_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_store_new_user_successful() : void 
    {
        $this->postJson(route('user.store'), [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email'    => 'johndoe@gmail.com'
        ])->assertRedirect('/')->assertSessionHas('success', "User details Stored successfully.");
    }

    public function test_app_logs_user_creation_event()
    {
        $user = User::factory()->create();

        Log::shouldReceive('info')->once()->with("User created: {$user}");

        $event = new UserCreatedEvent($user);
        $listener = new UserCreatedEventListener();
        $listener->handle($event);
    }
}
