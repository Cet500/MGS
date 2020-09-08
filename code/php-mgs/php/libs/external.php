<?php

	function CheckGetInt($get, $default, $min = 0, $max = 1000) {
		
		if ( isset( $get ) ) {

			if ( ( $get >= $min ) and ( $get <= $max ) ) {
				return $get;
			}
			else{
				return $default;
			}

		}
		else{
			return $default;
		}

	}

	function PrintPagesLinks($current, $last, $num_games, $num_genre) {
		print('<a href="index.php?num_page=1&num_games='.$num_games.'&num_genre='.$num_genre.'">первая</a>');
		print(' ... ');

		if ( $current > 2 ) {
			printf('<a href="index.php?num_page='.( $current - 2 ).'&num_games='.$num_games.'&num_genre='.$num_genre.'"> '.( $current - 2 ).' </a>');
		}
		if ( $current > 1 ) {
			printf('<a href="index.php?num_page='.( $current - 1 ).'&num_games='.$num_games.'&num_genre='.$num_genre.'"> '.( $current - 1 ).' </a>');
		}

		print('<a href="index.php?num_page='.$current.'&num_games='.$num_games.'&num_genre='.$num_genre.'">'.$current.'</a>');

		if ( $current < $last ) {
			printf('<a href="index.php?num_page='.( $current + 1 ).'&num_games='.$num_games.'&num_genre='.$num_genre.'"> '.( $current + 1 ).' </a>');
		}
		if ( $current < ( $last - 1 ) ) {
			printf('<a href="index.php?num_page='.( $current + 2 ).'&num_games='.$num_games.'&num_genre='.$num_genre.'"> '.( $current + 2 ).' </a>');
		}

		print(' ... ');
		print('<a href="index.php?num_page='.$last.'&num_games='.$num_games.'&num_genre='.$num_genre.'">последняя</a>');
	}