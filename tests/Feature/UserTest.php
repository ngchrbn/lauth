<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use LazilyRefreshDatabase;

    /**
     * Test if the registration form is displayed.
     */
    public function test_the_registration_form_is_displayed(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test if a new user can be created.
     */
    public function test_a_new_user_can_be_created(): void
    {
        $response = $this->post('/register', [
            'full_name' => 'John Doe',
            'username' => 'joe',
            'email' => 'joe@gmail.com',
            'phone' => '01228334455',
            'address' => '123, Main Street, New York, USA',
            'birthdate' => '1998-01-01',
            'password' => 'L@uTh#!@#22',
            'password_confirmation' => 'L@uTh#!@#22',
        ]);

        $response->assertRedirect('/born-same-day')
            ->assertSessionHas('user');

        $this->assertDatabaseHas('users', [
            'full_name' => 'John Doe',
            'username' => 'joe',
            ]);
    }
}
