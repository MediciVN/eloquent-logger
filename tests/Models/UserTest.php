<?php

namespace Medicivn\EloquentLogger\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Medicivn\EloquentLogger\ActivityLogTrait;
use Medicivn\EloquentLogger\Tests\Database\Factories\UserTestFactory;

class UserTest extends Model
{
    use HasFactory, ActivityLogTrait;

    /**
     * The column need note write the change
     *
     * Default: []
     */
    const LOGGABLE = [
        'name',
    ];

    /**
     * The model name to record changes
     *
     * Default: null
     */
    const MODEL_NAME_LOG = ActivityUserTestLog::class;

    protected $table = 'user_tests';

    protected $fillable = [
        'name',
        'status'
    ];

    /**
     * Create a new factory instance for the model
     *
     * @return UserTestFactory
     */
    protected static function newFactory(): UserTestFactory
    {
        return UserTestFactory::new();
    }

}
