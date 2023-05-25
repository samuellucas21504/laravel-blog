<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_registration_screen_is_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->registerNewUser();

        $response->assertSessionHasNoErrors();

        $this->assertAuthenticated();

        $response->assertRedirect(route('home'));

        $this->assertDatabaseHas('users', [
            'username' => 'FeatureTestUser',
            'email' => 'test@email.com'
        ]);
    }

    public function test_new_users_can_logout(){
        $this->registerNewUser();
        $this->logout();

        $this->assertGuest();
    }

    public function test_new_users_cant_register_same_username()
    {
        $this->registerNewUser();
        $this->logout();

        $this
        ->registerNewUser()
        ->assertSessionHasErrors([
            'username',
            'email'
        ]);
    }

    public function test_post_validation()
    {
        $this->registerInvalidNewUser()
        ->assertSessionHasErrors([
            'username',
            'email',
            'password'
        ]);
    }

    private function registerNewUser() {
        return $this->post('/register', [
            'username' => 'FeatureTestUser',
            'email' => 'test@email.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
    }
    private function logout() {
        return $this->get('/logout');
    }

    private function registerInvalidNewUser() {
        return $this->post('/register', [
            'username' => 'Feature Test User',
            'email' => 'test@.com',
            'password' => 'password^/.ç´[123*  123',
            'password_confirmation' => 'pas',
        ]);
    }
}
