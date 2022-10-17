<?php

namespace Medicivn\EloquentLogger;

use Illuminate\Database\Eloquent\Model;

trait ActivityLogTrait
{
    /**
     * @var string
     */
    protected static $adminName = 'Admin';

    /**
     * @var string
     */
    protected static $adminId = '1';

    /**
     * @return array
     */
    public static function loggable(): array
    {
        return defined(static::class . '::LOGGABLE') ? static::LOGGABLE : [];
    }

    /**
     * @return string|null
     */
    public static function modelNameLog(): string|null
    {
        return defined(static::class . '::MODEL_NAME_LOG') ? static::MODEL_NAME_LOG : null;
    }

    /**
     * @return void
     */
    protected static function bootActivityLogTrait() : void
    {
        self::updating(function (Model $model) {
            foreach (static::loggable() as $item) {
                $key = $model->isDirty($item);

                if (!$key) {
                    continue;
                }

                static::writeLog($model, __('action.update'), $item);
            }
        });
    }

    /**
     * @param $model
     * @param $action
     * @param $key
     *
     * @return void
     */
    public static function writeLog($model, $action, $key = null)
    {
        $data = [
            'model_id' => $model->id,
            'url' => request()->url() ?: null,
            'time' => date('Y-m-d h:i:s'),
            'creator' => auth()->user()?->username ?: static::$adminName,
            'creator_id' => auth()->user()?->id ?: static::$adminId,
            'action' => $action,
            'key' => $key,
            'old_value' => $model->getOriginal($key),
            'new_value' => $model->$key
        ];

        if (!empty(static::modelNameLog())) {
            static::modelNameLog()::create($data);
        }
    }
}
