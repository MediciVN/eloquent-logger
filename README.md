# EloquentLogger

Automatically update the logger when updating a model.

How to use:

- First, a root node must be initialized in your model's table
- Add `use ActivityLogTrait;` to your eloquent model, example:

```php 

use Medicivn\EloquentLogger\ActivityLogTrait;

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
    
```

## Function

- `writeLog`: write logger when changing data

## Notes

- If you are using ActivityLogTrait for MySQL then create a table with the following columns
  + `model_id`
  + `url`
  + `time`
  + `creator`
  + `creator_id`
  + `action`
  + `key`
  + `old_value`
  + `new_value`
