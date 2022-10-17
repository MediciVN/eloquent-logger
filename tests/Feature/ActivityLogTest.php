<?php

namespace Medicivn\EloquentLogger\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Medicivn\EloquentLogger\Tests\Models\ActivityUserTestLog;
use Medicivn\EloquentLogger\Tests\Models\UserTest;
use Medicivn\EloquentLogger\Tests\TestCase;

class ActivityLogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_write_logger_when_update_a_user()
    {
        $user = UserTest::factory()->create();

        $name_ole = $user->name;

        $user->update([
            'name' => 'medici',
        ]);

        $this->assertDatabaseHas('activity_user_test_log', [
            'model_id' => $user->id,
            'old_value' => $name_ole,
            'new_value' => $user->name
        ]);
    }
}
