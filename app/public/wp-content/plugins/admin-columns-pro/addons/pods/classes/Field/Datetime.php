<?php

namespace ACA\Pods\Field;

use ACA\Pods\Editing;
use ACA\Pods\Field;
use ACA\Pods\Setting;
use ACP\Editing\View;
use ACP\Search;
use ACP\Sorting;

class Datetime extends Field {

	public function sorting() {
		return ( new Sorting\Model\MetaFactory() )->create( $this->get_meta_type(), $this->get_meta_key() );
	}

	public function editing() {
		return new Editing\Service\FieldStorage(
			( new Editing\StorageFactory() )->create_by_field( $this ),
			( new View\DateTime() )->set_clear_button( '1' === $this->get_option( 'datetime_allow_empty' ) )
		);
	}

	public function search() {
		return new Search\Comparison\Meta\DateTime\ISO( $this->get_meta_key(), $this->column->get_meta_type() );
	}

	public function get_dependent_settings() {
		return [
			new Setting\Date( $this->column ),
		];
	}

}