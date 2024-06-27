<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_login_with_email_and_password(){
         $users = User::factory()->create();
         $response = $this->post('login',[
            'id'=>$users->id,
            'email' =>$users->email,
            'password'=>$users->password,
         ]);
         $this->assertAuthenticated();

         $this->post(route('/login.post'),
         [
            'email'=>'email'
         ]);
         $this.assertEquals(1,User::count());
    }
}
