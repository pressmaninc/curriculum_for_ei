<?php

declare(strict_types=1);

namespace ACP\Expression;

use ACP\Expression\Exception\OperatorNotFoundException;
use DateTimeZone;

final class DateRelativeDeductedSpecification extends DateSpecification
{

    use SpecificationTrait;
    use OperatorTrait;

    public function __construct(string $operator, string $format = null, DateTimeZone $time_zone = null)
    {
        parent::__construct($format, $time_zone);

        $this->operator = $operator;

        $this->validate_operator();
    }

    protected function get_operators(): array
    {
        return [
            DateOperators::TODAY,
            DateOperators::PAST,
            DateOperators::FUTURE,
        ];
    }

    /**
     * @throws Exception\InvalidDateFormatException
     */
    public function is_satisfied_by(string $value): bool
    {
        // Format date to discard time
        $date = $this->create_date_from_value($value)->format(self::MYSQL_DATE);
        $today = $this->get_current_date()->format(self::MYSQL_DATE);

        switch ($this->operator) {
            case DateOperators::TODAY:
                return $today === $date;
            case DateOperators::PAST:
                return $date < $today;
            case DateOperators::FUTURE:
                return $date > $today;
        }

        throw new OperatorNotFoundException($this->operator);
    }

}