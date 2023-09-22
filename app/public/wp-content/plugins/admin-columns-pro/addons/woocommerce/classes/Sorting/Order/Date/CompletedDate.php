<?php

declare(strict_types=1);

namespace ACA\WC\Sorting\Order\Date;

use ACA\WC\Sorting\Order\OperationalData;
use ACP\Sorting\Type\DataType;

class CompletedDate extends OperationalData
{

    public function __construct()
    {
        parent::__construct('date_completed_gmt', new DataType(DataType::DATE));
    }

}