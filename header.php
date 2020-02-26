<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include 'js/myfonts-loader.php'; ?>

	<?php wp_head(); ?>
	<style>
		#logo #desktop {
			display: none;
		}

		@media (min-width: 760px) {
			#logo #desktop {
				display: none;
			}

			#logo #mobile {
				display: block;
			}
		}
	</style>

</head>

<body <?php body_class(); ?>>

	<a class="skip-main" href="#main">Skip to main content</a>



	<header>

		<div class="container">

			<a href="<?php bloginfo('url'); ?>">
				<div id="logo">
					<img id="mobile" src="/wp-content/uploads/2017/12/JC-Mark-2018.svg" />
					<img id="desktop" src="/wp-content/uploads/2017/12/Full-Logo-2018.svg" />
				</div>
			</a>
			<?php wp_nav_menu(array(
				'theme_location'	=> 'jc_main_nav',
				'container'			=> 'nav',
				'container_id'		=> 'jc-main-nav'
			)) ?>

		</div>

	</header>