<?php

namespace Sfneal\Helpers\Time\Traits;

use Sfneal\Helpers\Time\TimeConverter;

/**
 * A time value attributes to an Eloquent Model.
 *
 * @property $total_duration
 * @property $total_seconds
 */
trait Duration
{
    // todo: add tests

    /**
     * Retrieve the total duration in minutes with decimals.
     *
     * @return float
     */
    abstract public function getTotalDurationAttribute(): float;

    /**
     * Retrieve total duration converted to hours.
     *
     * @return string
     */
    public function getTotalHoursAttribute(): string
    {
        return (new TimeConverter())->setMinutes($this->total_duration)->getHours();
    }

    /**
     * Retrieve total duration converted to minutes without decimals.
     *
     * @return false|float
     */
    public function getTotalMinutesAttribute()
    {
        return floor($this->total_duration);
    }

    /**
     * Retrieve total duration converted to seconds.
     *
     * @return float|int
     */
    public function getTotalSecondsAttribute()
    {
        return $this->total_duration * 60;
    }

    /**
     * Retrieve total seconds converted to 'hours:minutes:seconds' datetime.
     *
     * @return string
     */
    public function getTotalTimeAttribute(): string
    {
        return (new TimeConverter())->setSeconds($this->total_seconds)->getHours();
    }
}
