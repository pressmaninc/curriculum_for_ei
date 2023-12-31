<?php

namespace ACP\Transient;

use AC\Expirable;
use AC\Storage;

class UpdateCheckTransient implements Expirable {

	/**
	 * @var Storage\Timestamp
	 */
	protected $timestamp;

	public function __construct() {
		$this->timestamp = new Storage\Timestamp(
			new Storage\Option( 'acp_periodic_update_plugins_check' )
		);
	}

	/**
	 * @param int|null $value
	 *
	 * @return bool
	 */
	public function is_expired( int $value = null ): bool
    {
		return $this->timestamp->is_expired( $value );
	}

	public function delete() {
		$this->timestamp->delete();
	}

	/**
	 * @param int $expiration Time until expiration in seconds.
	 *
	 * @return bool
	 */
	public function save( $expiration ) {
		return $this->timestamp->save( time() + (int) $expiration );
	}

}