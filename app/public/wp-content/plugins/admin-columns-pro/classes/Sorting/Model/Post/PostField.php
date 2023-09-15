<?php

namespace ACP\Sorting\Model\Post;

use ACP\Search\Query\Bindings;
use ACP\Sorting\AbstractModel;
use ACP\Sorting\Model\QueryBindings;
use ACP\Sorting\Model\SqlOrderByFactory;
use ACP\Sorting\Type\DataType;
use ACP\Sorting\Type\Order;

class PostField extends AbstractModel implements QueryBindings
{

    protected $field;

    public function __construct(string $field, DataType $data_type = null)
    {
        parent::__construct();

        $this->field = $field;
        $this->data_type = $data_type;
    }

    public function create_query_bindings(Order $order): Bindings
    {
        global $wpdb;

        return (new Bindings())->order_by(
            SqlOrderByFactory::create("$wpdb->posts.$this->field", (string)$order, [
                'empty_values' => $this->create_empty_values(),
            ])
        );
    }

    private function create_empty_values(): ?array
    {
        switch ($this->data_type) {
            case DataType::DATETIME:
            case DataType::DATE:
                return [0];
            default:
                return [null, ''];
        }
    }

}