<?php


namespace Sfneal\Helpers\Time;


use Sfneal\Actions\AbstractService;


class TimeConverterService extends AbstractService
{
    /**
     * @var float Number of hours
     */
    private $hours;

    /**
     * @var float Number of minutes
     */
    private $minutes;

    /**
     * @var float Number of seconds
     */
    private $seconds;

    /**
     * Retrieve number of hours as a float
     *
     * @return float
     */
    public function hours(): float {
        return $this->hours ?? 0;
    }

    /**
     * Retrieve number of minutes as a float
     *
     * @return float
     */
    public function minutes(): float {
        return $this->minutes ?? 0;
    }

    /**
     * Retrieve number of seconds as a float
     *
     * @return float
     */
    public function seconds(): float {
        return $this->seconds ?? 0;
    }

    /**
     * Set the number of hours
     *
     * @param float $hours
     * @return $this
     */
    public function setHours(float $hours): self {
        $this->hours = $hours;
        $this->minutes = $hours * 60;
        $this->seconds = null;
        return $this;
    }

    /**
     * Set the number of minutes
     *
     * @param float $minutes
     * @return $this
     */
    public function setMinutes(float $minutes): self {
        $this->hours = $minutes / 60;
        $this->minutes = $minutes;
        $this->seconds = null;
        return $this;
    }

    /**
     * Set the number of seconds
     *
     * @param float $seconds
     * @return $this
     */
    public function setSeconds(float $seconds): self {
        $this->hours = $seconds / 3600;
        $this->minutes = $seconds / 60;
        $this->seconds = $seconds;
        return $this;
    }

    /**
     * Retrieve time converted to hours string
     *
     * @param bool $include_seconds
     * @return string
     */
    public function getHours(bool $include_seconds = true): string {
        // Calculate remaining minutes
        $minutes = $this->minutes % 60;

        if ($include_seconds && isset($this->seconds)) {
            // Calculate number of remaining seconds if there are $seconds
            $seconds = $this->seconds - (floor($this->hours) * 3600) - ($minutes * 60);

            // Join & zero value time values (with seconds)
            return self::transform($this->hours, $minutes, $seconds);
        }

        // Join & zero value time values
        return self::transform($this->hours, $minutes);
    }

    /**
     * Join arrays of times to create datetime like strings
     *
     *  - prepend '0' to single digit integers
     *  - separate time values with ':' chars
     *
     * @param array $times
     * @return string
     */
    private static function transform(...$times): string {
        // Floor times & prepend "0" to single digit (< 10)
        return join(':', array_map(function(float $time) {
            return self::zeroFill(floor($time));
        }, $times));
    }

    /**
     * Prepend a "0" to a single digit integer
     *
     * @param int $int
     * @return string
     */
    private static function zeroFill(int $int): string {
        return (self::isSingleDigitInt($int) ? '0' : '') . $int;
    }

    /**
     * Determine if an integer is a single digit (< 10)
     *
     * @param int $int
     * @return bool
     */
    private static function isSingleDigitInt(int $int): bool {
        return strlen((string) $int) == 1;
    }
}
