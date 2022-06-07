<?php

class Basket {

	public static function add( $product_id, $count = 1) {
		self::init_basket();
		if ( self::exist( $product_id ) ) {
			$_SESSION['basket']['items'][ $product_id ]['count']++;
		} else {
			$product                                    = Product::find( $product_id );
			$_SESSION['basket']['items'][ $product_id ] = [
				'title'         => $product->post_title,
				'regular_price' => Product::regular_price( $product_id ),
				'sale_price'    => Product::sale_price( $product_id ),
				'count'         => $count
			];
		}
	}

	public static function remove( $product_id ) {
		if ( self::exist( $product_id ) ) {
			unset( $_SESSION['basket']['items'][ $product_id ] );

			return true;
		}

		return false;
	}

	public static function update( $product_id, $count ) {
		if ( self::exist( $product_id ) ) {
			if ( intval( $count ) == 0 ) {
				return self::remove( $product_id );
			}
			$_SESSION['basket']['items'][ $product_id ]['count'] = $count;
		}
	}

	public static function exist( $product_id ) {
		return isset( $_SESSION['basket']['items'][ $product_id ] );
	}

	public static function total_count() {
		if ( isset( $_SESSION['basket']['items'] ) && count( $_SESSION['basket']['items'] ) > 0 ) {
			return count( $_SESSION['basket']['items'] );
		}

		return 0;
	}

	public static function items() {
		if ( isset( $_SESSION['basket']['items'] ) && count( $_SESSION['basket']['items'] ) > 0 ) {
			return $_SESSION['basket']['items'];
		}

		return [];
	}

	public static function total_price() {
		return array_reduce( $_SESSION['basket']['items'], function ( $total, $item ) {
			$total += $item['price'] * $item['count'];

			return $total;
		}, 0 );
	}

	public static function init_basket() {
		if ( ! isset( $_SESSION['basket'] ) ) {
			$_SESSION['basket'] = [];
		}
	}
}