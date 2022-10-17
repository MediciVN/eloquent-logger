<?php

namespace Medicivn\EloquentLogger\Tests\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityUserTestLog extends Model
{
    protected $table = 'activity_user_test_log';

    protected $fillable = [
        'model_id',
        'url',
        'time',
        'creator',
        'creator_id',
        'action',
        'key',
        'old_value',
        'new_value'
    ];
}
