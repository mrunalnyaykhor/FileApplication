<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\UserForm;

class UserFormControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_submit_form_and_data_is_saved()
    {
        // Simulate form data
        $formData = [
           
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ];

        // Send POST request to the userprocess route
        $response = $this->post('/userprocess', $formData);

        // Assert that the response indicates success
        $response->assertStatus(200);
        $response->assertSee('user saved successfully');

        // Assert that the data is in the database
        $this->assertDatabaseHas('user_forms', [

            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ]);
    }
}

