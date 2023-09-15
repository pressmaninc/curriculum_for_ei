<?php
declare( strict_types=1 );

namespace ACA\WC\Editing\Storage\Order;

use ACP\Editing\Storage;

class Status implements Storage {

	public function get( int $id ) {
		$status =  wc_get_order( $id )->get_status();

		if ( strpos( $status, 'wc-' ) !== 0 ) {
			$status = 'wc-' . $status;
		}

		return $status;
	}

	public function update( int $id, $data ): bool {
		$order = wc_get_order( $id );

		$order->set_status( $data );
		$order->save();

		return true;
	}

}