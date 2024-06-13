<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Event\Code\Test;
use Tests\TestCase;

use App\Models\User;
use Tests\Models\User as ModelsUser;

class UserRegistrationTest extends TestCase
{

    
  public function testHelloWorld()
    {
        // Arrange (no arrangement needed for this simple test)

        // Act (no action needed for this simple test)

        // Assert
        $expected = 'Hello, World!';
        $actual = 'Hello, World!'; // Your actual implementation would go here
        $this->assertEquals($expected, $actual);
    }
    use RefreshDatabase, WithFaker;
    private $name;
    private $email;
    private $password;

    public function __construct($name = 'User', $email = 'test@gmail.com', $password = 'password123')
    {


        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function test_user_default_attributes()
    {
        $user = new User();

        $this->assertEquals('User', $user->getName());
        $this->assertEquals('test@gmail.com', $user->getEmail());
        $this->assertEquals('password123', $user->getPassword());
    }

    public function test_user_custom_attributes()
    {
        $name = 'John Doe';
        $email = 'john.doe@example.com';
        $password = 'secret';

        $user = new ModelsUser($name, $email, $password);

        $this->assertEquals($name, $user->getName());
        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($password, $user->getPassword());
    }

    /** @test */
    // public function it_registers_a_user_successfully()
    // {
    //     $response = $this->postJson('/register', [
    //         'name' => $this->name,
    //         'email' => $this->email,
    //         'password' => $this->password,
    //         'password_confirmation' => $this->password,
    //     ]);

    //     $response->assertStatus(201)
    //              ->assertJson([
    //                  'message' => 'User registered successfully',
    //              ]);

    //     $this->assertDatabaseHas('users', [
    //         'email' => $this->email,
    //     ]);
    // }


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
