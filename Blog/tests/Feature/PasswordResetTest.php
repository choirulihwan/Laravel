<?php

namespace Tests\Feature;

use App\User;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Notification;
use Password;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use WithFaker;

    const ROUTE_PASSWORD_EMAIL = 'password.email';
    const ROUTE_PASSWORD_REQUEST = 'password.request';
    const ROUTE_PASSWORD_RESET = 'password.reset';
    const ROUTE_PASSWORD_RESET_SUBMIT = 'password.reset.submit';

    const USER_ORIGINAL_PASSWORD = 'secret';

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /*
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    */

    public function testShowPasswordResetRequestPage() {
        $this
        ->get(route(self::ROUTE_PASSWORD_REQUEST))
        ->assertSuccessful()
        ->assertSee('Reset Password')
        ->assertSee('E-Mail Address')
        ->assertSee('Send Password Reset Link');
    }

    public function testSubmitPasswordResetRequestInvalidEmail()
    {
    
        $this->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_REQUEST))
            ->post(route(self::ROUTE_PASSWORD_EMAIL), ['email' => str_random(),])
            ->assertSuccessful()
            ->assertSee(__('validation.email', ['attribute' => 'email',]));
    }
}
