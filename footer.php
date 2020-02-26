<footer>
	<div class="container">

		<p>
			<small>
				<b>© 2018–<?php echo date('Y'); ?> Josh Collinsworth.</b>
			</small>
		</p>

		<?php wp_nav_menu( array(
			'theme_location'	=> 'jc_footer_menu',
			'container'			=> 'nav',
			'container_id'		=> 'jc-footer-nav'
		)) ?>
		
	</div>

	<?php if( is_single() || is_page( 'code' ) || is_page('contact') || is_archive() || is_search() || is_404() ): ?>
		<script type="text/javascript">
			
		// Add the nifty borders below the last line of each <h2> element
			const headings = document.querySelectorAll('main h2, main h1');

			headings.forEach(h2 => {
			    var parent = h2.parentNode;
			    var wrapper = document.createElement('div');
			    parent.replaceChild(wrapper, h2);
			    wrapper.appendChild(h2);
			    wrapper.classList.add('heading-wrapper');
			});

			var styleElem = document.head.appendChild(document.createElement("style"));

			styleElem.innerHTML = `
			.heading-wrapper {
			    overflow: hidden!important;
				position: relative;
				width: 100%;
			}

			main h2:after, main h1:after {
			    content: "";
			    line-height: 1em;
			    border-bottom: .15em solid #ffd100;
			    width: 100%;
			    margin-left: -100%;
			    position: absolute;
			    bottom: 0.8em;
			    z-index: -1;
			}

			main h1:after {
				bottom: 0.4em;
			}

			.page main h1:after {
			    bottom: .3em;
			}`;

		</script>

	<?php endif; ?>

</footer>
<?php wp_footer(); ?>
</body>

</html>