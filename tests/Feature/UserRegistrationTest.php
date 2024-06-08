<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class UserRegistrationTest extends TestCase
{

    use RefreshDatabase, WithFaker;
    private $name;
    private $email;
    private $password;

    public function __construct($name = 'User', $email = 'test@gmail.com', $password = 'password123')
    {
        User::__construct();

        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /** @test */
    public function it_registers_a_user_successfully()
    {
        $response = $this->postJson('/register', [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password,
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'User registered successfully',
                 ]);

        $this->assertDatabaseHas('users', [
            'email' => $this->email,
        ]);
    }


    /** @test */
    // public function a_user_can_register()
    // {
    //     $response = $this->post(route('register.store'), [
    //         'name' => 'mrunal',
    //         'email' => 'mrunal@gmail.com',
    //         'password' => 'mrunal123',
    //         'password_confirmation' => 'mrunal123',
    //     ]);

    //     $response->assertRedirect(url('/login'));
    //     $this->assertDatabaseHas('users', [
    //         'email' => 'mrunal@gmail.com',
    //         'name'=>'mrunal',
    //          'password'=>'password'
    //     ]);

    // }
    // public function testExample(){
    //     $res->$this->get('/');
    //     $res->assertStatus(200);
    // }
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
