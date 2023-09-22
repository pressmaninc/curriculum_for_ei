<?php

declare(strict_types=1);

namespace ACP\Sorting\Model\Post;

use ACP\Search\Query\Bindings;
use ACP\Sorting\AbstractModel;
use ACP\Sorting\Model\QueryBindings;
use ACP\Sorting\Model\SqlOrderByFactory;
use ACP\Sorting\Type\ComputationType;
use ACP\Sorting\Type\Order;

class LatestComment extends AbstractModel implements QueryBindings
{

    public const STATUS_APPROVED = '1';
    public const STATUS_SPAM = 'spam';
    public const STATUS_TRASH = 'trash';
    public const STATUS_PENDING = '0';

    private $stati;

    public function __construct(array $stati = [])
    {
        parent::__construct();

        if (empty($stati)) {
            $stati = [self::STATUS_APPROVED, self::STATUS_PENDING];
        }

        $this->stati = $stati;
    }

    public function create_query_bindings(Order $order): Bindings
    {
        global $wpdb;

        $bindings = new Bindings();
        $alias = $bindings->get_unique_alias('lcomment');

        $join = "LEFT JOIN $wpdb->comments AS $alias ON $alias.comment_post_ID = $wpdb->posts.ID";

        if ($this->stati) {
            $join .= sprintf(
                "\nAND $alias.comment_approved IN ( '%s' )",
                implode("','", array_map('esc_sql', $this->stati))
            );
        }

        $bindings->join($join);
        $bindings->group_by("$wpdb->posts.ID");
        $bindings->order_by(
            SqlOrderByFactory::create_with_computation(
                new ComputationType(ComputationType::MAX),
                "$alias.comment_date",
                (string)$order
            )
        );

        return $bindings;
    }

}