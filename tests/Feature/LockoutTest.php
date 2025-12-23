<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class LockoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_account_is_locked_after_three_failed_attempts()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Attempt 1: Fail
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);
        $response->assertSessionHasErrors('email');
        $this->assertEquals('The provided credentials do not match our records.', session('errors')->first('email'));
        $this->assertNull($user->fresh()->account_locked_until);

        // Attempt 2: Fail
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);
        $response->assertSessionHasErrors('email');
        $this->assertNull($user->fresh()->account_locked_until);

        // Attempt 3: Fail (Should Lock)
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);
        $response->assertSessionHasErrors('email');
        $this->assertEquals('Account locked for 15 minutes due to too many failed attempts.', session('errors')->first('email'));

        $user->refresh();
        $this->assertNotNull($user->account_locked_until);
        $this->assertTrue($user->account_locked_until->isFuture());

        // Attempt 4: Should still be locked and show time remaining
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'correct-password', // Even with correct password, it is locked? No, my logic checks lock first.
        ]);
        // My logic: If locked, return error.
        $response->assertSessionHasErrors('email');
        $this->assertStringContainsString('Account locked', session('errors')->first('email'));
    }
}
