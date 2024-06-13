<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\Request;

class LoginTest extends TestCase
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
    // public function __construct($newPassword)
    // {
    //     $this->newPassword = $newPassword;
    // }
    // use RefreshDatabase; // Reset the database after each test

    /** @test */
    // public $email;
    // public $password;
    // public $user;
    // function __construct($email, $password) {
    //     $this->email = $email;
    //     $this->password = $password;
    // }
//     public function user_can_login_with_correct_credentials()
//    {

//     // Create a user
//     $user = User::factory()->create([
//         'email' => 'mrunalnyaykhor@gmail.com',
//         'password' => Hash::make('12345'),
//     ]);

//     // Attempt to login with correct credentials
//     $response = $this->post(route('login'), [
//         'email' => 'mrunalnyaykhor@gmail.com',
//         'password' => '12345',
//     ]);
//     $response->save();

//     // Assert that the response indicates a successful login
//     $response->assertRedirect('gallery')->assertSessionHas('success');
// }
    /** @test */
    // public function user_cannot_login_with_incorrect_credentials()
    // {
    //     // Attempt to login with incorrect credentials
    //     $response = $this->post(route('login.post'), [
    //         'email' => 'wrong@example.com',
    //         'password' => 'wrong_password',
    //     ]);

    //     // Check if the user is redirected back to the login page with an error message
    //     $response->assertRedirect(route('login.post'));
    //     $response->assertSessionHas('error');
    // }

    // /** @test */
    // public function user_can_remember_login()
    // {
    //     // Create a user
    //     $user = User::factory()->create([
    //         'email' => 'test@example.com',
    //         'password' => Hash::make('password'),
    //     ]);

    //     // Attempt to login with remember me checked
    //     $response = $this->post(route('login.post'), [
    //         'email' => 'test@example.com',
    //         'password' => 'password',
    //         'remember' => 'on',
    //     ]);

    //     // Check if the user is redirected to the gallery page
    //     $response->assertRedirect('gallery');

    //     // Check if cookies are set
    //     $this->assertNotNull($_COOKIE['email']);
    //     $this->assertNotNull($_COOKIE['password']);
    // }

    // /** @test */
    // public function user_can_forget_login()
    // {
    //     // Attempt to login without remember me checked
    //     $response = $this->post(route('login.post'), [
    //         'email' => 'test@example.com',
    //         'password' => 'password',
    //     ]);

    //     // Check if the user is redirected to the gallery page
    //     $response->assertRedirect('gallery');

    //     // Check if cookies are not set
    //     $this->assertNull($_COOKIE['email']);
    //     $this->assertNull($_COOKIE['password']);
    // }
}
