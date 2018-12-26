<?php

declare(strict_types = 1);

namespace McMatters\Math;

use InvalidArgumentException;
use const false, true;
use function is_numeric;

/**
 * Class Prime
 *
 * @package McMatters\Math
 */
class Prime
{
    /**
     * @param int|float|string $number
     *
     * @return int
     * @throws \InvalidArgumentException
     */
    public function next($number): int
    {
        return $this->findPrime($number);
    }

    /**
     * @param int|float|string $number
     *
     * @return int
     * @throws \InvalidArgumentException
     */
    public function previous($number): int
    {
        return $this->findPrime($number, false);
    }

    /**
     * @param int|float|string $number
     *
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function isPrime($number): bool
    {
        $this->checkNumber($number);

        if ($number < 2) {
            return false;
        }

        $division = $number / 2;

        for ($i = 2; $i <= $division; $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param int|float|string $number
     * @param bool $next
     *
     * @return int
     * @throws \InvalidArgumentException
     */
    protected function findPrime($number, bool $next = true): int
    {
        $this->checkNumber($number);

        $operation = $next ? 1 : -1;

        $prime = $number;

        do {
            $prime += $operation;
        } while (!$this->isPrime($prime));

        return $prime;
    }

    /**
     * @param mixed $number
     *
     * @throws \InvalidArgumentException
     */
    protected function checkNumber($number): void
    {
        if (!is_numeric($number)) {
            throw new InvalidArgumentException('Number must be numeric');
        }
    }
}
