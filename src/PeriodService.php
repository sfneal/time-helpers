<?php


namespace Sfneal\Helpers\Time;


use Carbon\Carbon;
use Spatie\Analytics\Exceptions\InvalidPeriod;
use Spatie\Analytics\Period;

class PeriodService extends Period
{
    /**
     * @var Carbon
     */
    public $startDate;

    /**
     * @var Carbon
     */
    public $endDate;

    /**
     * PeriodService constructor.
     *
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @throws InvalidPeriod
     */
    public function __construct(Carbon $startDate, Carbon $endDate)
    {
        parent::__construct($startDate, $endDate);
    }

    /**
     * Retrieve the Period's length in DateInterval
     *
     * @return int
     */
    public function length(): int
    {
        return $this->startDate->diff($this->endDate)->days ?? 0;
    }

    /**
     * Offset the Period by its length in days
     *
     * @return PeriodService
     */
    public function offsetPeriod(): PeriodService
    {
        // Get the Period's length (in days)
        $length = $this->length();

        // Offset the period by the length
        return $this->create($this->startDate->subDays($length), $this->endDate->subDays($length));
    }
}
