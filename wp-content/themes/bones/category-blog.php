<?php get_header(); ?>

	<div class="content" role="main">
		<h1 class="archive-title">
			<?php single_cat_title(); ?>
		</h1>

		<?php if (have_posts()): ?>
		<div class="summaries">
			<?php while (have_posts()) : the_post(); ?>
			<article class="summary" id="post-<?php the_ID(); ?>" role="article">
				<header class="summary-header">
					<div class="summary-image">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('bones-thumb-m'); ?></a>
					</div> <!-- end article header -->

					<?php if (get_field('unit_price') > 0): ?>
					<div class="price unit">
						<?php echo number_format(get_field('unit_price'), 2, ',', ' '); ?> <span class="currency">€</span>
					</div>
					<?php endif; ?>
				</header>

				<h2 class="summary-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
			</article>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>

		<?php if ( function_exists( 'bones_page_navi' ) ) { ?>
			<?php bones_page_navi(); ?>
		<?php } else { ?>
			<nav class="wp-prev-next">
				<ul class="clearfix">
					<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
					<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
				</ul>
			</nav>
		<?php } ?>
	</div>

<?php get_footer(); ?>
