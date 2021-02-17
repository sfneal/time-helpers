<?php

namespace Sfneal\Helpers\Time\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sfneal\Helpers\Time\Tests\Factories\TaskFactory;
use Sfneal\Helpers\Time\Traits\Duration;

class Task extends Model
{
    use HasFactory;
    use Duration;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    protected $table = 'task';
    protected $primaryKey = 'task_id';

    protected $fillable = [
        'task_id',
        'total_duration',
    ];

    /**
     * Model Factory.
     *
     * @return TaskFactory
     */
    protected static function newFactory(): TaskFactory
    {
        return new TaskFactory();
    }

    /**
     * Retrieve the total duration in minutes with decimals.
     *
     * @return float
     */
    public function getTotalDurationAttribute(): float
    {
        return $this->attributes['total_duration'];
    }
}
