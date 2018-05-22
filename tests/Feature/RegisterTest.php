<?php 

namespace Tests\Unit; 

use App\User; 
use Tests\TestCase; 
use Illuminate\Foundation\Testing\WithFaker; 
use Illuminate\Foundation\Testing\RefreshDatabase; 

class RegisterTest extends TestCase 
{ 
    use WithFaker; 
    use RefreshDatabase; 
    protected $password = 'password'; 
    
    protected function get_unique_username() 
    { 
        return $this->faker->unique()->firstName(); 
    } 
    
    protected function get_unique_email() 
    { 
        return $this->faker->unique()->safeEmail(); 
    } 
    
    /** @test */ 
    public function register_a_valid_user() 
    { 
        $user = [ 'username' => $this->get_unique_username(), 
                  'email' => $this->get_unique_email(), 
                  'password' => $this->password, 
                  'password_confirmation' => $this->password ]; 
        
        $this->from(route('register')) 
             ->post(route('register'), $user) 
             ->assertStatus(302) 
             ->assertRedirect(route('home')); 
             
        $created_user = User::where('username', $user['username'])->first(); 
        $this->assertDatabaseHas('users', [ 'username' => $user['username'], 'email' => $user['email'] ]); 
        $this->assertAuthenticatedAs($created_user); 
    } 
    
    /** @test */ 
    public function guest_can_access() 
    { 
        $this->get(route('register')) 
             ->assertStatus(200); 
    } 
    
    /** @test */ 
    public function auth_cannot_access() 
    { 
        $user = factory('App\User')->create(); 
        $this->actingAs($user); 
        $this->assertAuthenticatedAs($user); 
        $this->from(route('home')) 
             ->get(route('register')) 
             ->assertStatus(302) 
             ->assertRedirect(route('home')); 
    } 
    
    /** @test */ 
    public function username_is_required() 
    { 
        $this->from(route('register')) 
             ->post(route('register'), ['username' => null]) 
             ->assertSessionHasErrors('username') 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    } 
    
    /** @test */ 
    public function username_is_unique() 
    { 
        $unique_user = factory('App\User')->create(); 
        $this->from(route('register')) 
             ->post(route('register'), ['username' => $unique_user->username]) 
             ->assertSessionHasErrors('username') 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    } 
    
    /** @test */ 
    public function username_min_length_is_3() 
    { 
        $this->from(route('register')) 
             ->post(route('register'), ['username' => str_repeat('a', 2) ]) 
             ->assertSessionHasErrors('username') 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    } 
    
    /** @test */ 
    public function username_max_length_is_16() 
    { 
        $this->from(route('register')) 
             ->post(route('register'), ['username' => str_repeat('a', 17) ]) 
             ->assertSessionHasErrors('username') 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    } 
    
    /** @test */ 
    public function email_is_required() 
    { 
        $this->from(route('register')) 
             ->post(route('register'), ['email' => null]) 
             ->assertSessionHasErrors('email') 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    } 
    
    /** @test */ 
    public function email_is_unique() 
    { 
        $unique_user = factory('App\User')->create(); 
        $this->from(route('register')) 
             ->post(route('register'), ['email' => $unique_user->email]) 
             ->assertSessionHasErrors('email') 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    } 
    
    /** @test */ 
    public function email_max_length_is_255() 
    { 
        $long_email = str_repeat('a', 246) . '@email.com'; 
        $this->from(route('register')) 
             ->post(route('register'), ['email' => $long_email]) 
             ->assertSessionHasErrors([ 'email' => 'The email may not be greater than 255 characters.' ]) 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    } 
    
    /** @test */ 
    public function password_is_required() 
    { 
        $this->from(route('register')) 
             ->post(route('register'), ['password' => null, 'password_confirmation' => $this->password ]) 
             ->assertSessionHasErrors('password') 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    } 
    
    /** @test */ 
    public function password_min_length_is_6() 
    { 
        $short_password = str_repeat('a', 5); 
        $this->from(route('register')) 
             ->post(route('register'), [ 'password' => $short_password, 'password_confirmation' => $short_password ]) 
             ->assertSessionHasErrors('password') 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    } 
             
    /** @test */ 
    public function password_max_length_is_255() 
    { 
        $long_password = str_repeat('a', 256); 
        $this->from(route('register')) 
             ->post(route('register'), [ 'password' => $long_password, 'password_confirmation' => $long_password ]) 
             ->assertSessionHasErrors('password') 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    }
             
    /** @test */ 
    public function password_confirm_is_required() 
    { 
        $this->from(route('register')) 
             ->post(route('register'), ['password' => $this->password, 'password_confirmation' => null ]) 
             ->assertSessionHasErrors('password') 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    } 
             
    /** @test */ 
    public function password_confirm_is_correct() 
    { 
        $this->from(route('register')) 
             ->post(route('register'), ['password' => $this->password, 'password_confirmation' => 'incorrect_password' ]) 
             ->assertSessionHasErrors('password') 
             ->assertStatus(302) 
             ->assertRedirect(route('register')); 
    } 
}