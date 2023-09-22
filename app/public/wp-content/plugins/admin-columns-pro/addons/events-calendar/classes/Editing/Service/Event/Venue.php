<?php

namespace ACA\EC\Editing\Service\Event;

use AC\Helper\Select\Options\Paginated;
use ACA\EC\Editing;
use ACP;
use ACP\Editing\View;

class Venue implements ACP\Editing\Service, ACP\Editing\PaginatedOptions {

	const META_KEY = '_EventVenueID';

	public function get_view( string $context ): ?View {
		return ( new ACP\Editing\View\AjaxSelect() )->set_clear_button( true );
	}

	public function get_value( $id ) {
		$post = get_post( get_post_meta( $id, self::META_KEY, true ) );

		return $post
			? [ $post->ID => $post->post_title ]
			: [];
	}

	public function update( int $id, $data ): void {
		update_post_meta( $id, self::META_KEY, $data );
	}

	public function get_paginated_options( $search, $page, $id = null ): Paginated {
		return new ACP\Helper\Select\Paginated\Posts( $search, $page, [
			'post_type' => 'tribe_venue',
		] );
	}

}