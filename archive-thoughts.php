<?php get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 

function convertMonth($month){
	$currentMonth = date('n');
	if($month != $currentMonth){
		$month = ($month * -1) + $currentMonth + 1;

		if($month < 1){
			while ($month < 1){
				$month += 12;
			}
		} else if ($month > 12){
			while ($month < 12){
				$month -= 12;
			}
		}
	}
	return $month;
} 

$months = array(
	'1'		=>	'January',
	'2'		=>	'February',
	'3'		=>	'March',
	'4'		=>	'April',
	'5'		=>	'May',
	'6'		=>	'June',
	'7'		=>	'July',
	'8'		=>	'August',
	'9'		=>	'September',
	'10'	=>	'October',
	'11'	=>	'November',
	'12'	=>	'December',
);

function pageYear($year, $paged){
	if(date('n') - $paged < 0){
		$howFarBack = 0;
		while ($paged > 0){
			$howFarBack++;
			while($paged > 12 ) {
				$paged -= 12;
				$howFarBack++;
			}
			return $year - $howFarBack;
		}
	} else {
		return $year;
	}
} ?>

<h1>Personal Journal
	<br>
	<small>
		<?php echo $months[convertMonth($paged)] . ' ' . pageYear( date('Y'), $paged ); ?>
	</small>
</h1>

<?php while(have_posts()){ the_post();  ?>

	<article>
		
		<h2>
			<strong>
				<?php the_title(); ?>
			</strong>
			<br>
			<small>
				<?php the_date('l, F jS'); ?>
			</small>
		</h2>

		<?php the_content(); ?>

	</article>

<?php } 

$args = array(
	'prev_text'          => __('« Next month'),
	'next_text'          => __('Previous month »'),
);

echo paginate_links( $args ); ?>

</main>

<!-- Just a comment -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>