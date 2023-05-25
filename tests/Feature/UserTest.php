<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function test_user_has_no_access_to_posts_before_login(): void
    {
        $response = $this->get('/posts');

        $response->assertRedirect('/login');
    }

    public function test_user_has_no_access_to_individual_post_before_login(): void
    {
        $post = Post::factory()->create();
        $response = $this->get("/post/$post");

        $response->assertRedirect('/login');
    }

    public function test_user_has_no_access_to_user_page_before_login(): void
    {
        $user = $this->createUser();
        $response = $this->get("/user/$user->username");

        $response->assertRedirect('/login');
    }

    public function test_guest_cant_logout(): void
    {
        $response = $this->get('/logout');
        $response->assertRedirect('/login');
    }

    public function test_user_can_login()
    {
        $response = $this->login();

        $this->assertAuthenticated();

        $response->assertRedirect('/');
    }

    public function test_user_can_logout()
    {
        $response = $this->login();

        $this->assertAuthenticated();

        $this->get('/logout');

        $this->assertGuest();
    }

    public function test_user_has_access_to_posts_after_login()
    {
        $this->login();
        $response = $this->get('/posts');

        $response->assertViewIs('posts');

    }

    public function test_user_has_access_to_individual_post_after_login()
    {
        $this->login();
        $post = Post::factory()->create();
        $response = $this->get("/post/$post->id");

        $response->assertViewIs('post');
    }

    public function test_user_has_access_to_user_page_before_login(): void
    {
        $user = $this->createUser();
        $this->post('/login',[
            'username' => $user->username,
            'password' => 'password'
        ]);

        $response = $this->get("/user/$user->username");
        $response->assertViewIs('user');
    }

    private function login() {
        $user = $this->createUser();
        return $this->post('/login',[
            'username' => $user->username,
            'password' => 'password'
        ]);
    }

    private function createUser()
    {
        return $user = User::factory()->create();
    }
}
