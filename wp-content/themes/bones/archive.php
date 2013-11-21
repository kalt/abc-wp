<?php get_header(); ?>

	<div class="content" role="main">
		<h1 class="archive-title">
			<?php if (is_category()) { ?>
				<span><?php _e( 'Posts Categorized:', 'bonestheme' ); ?></span> <?php single_cat_title(); ?>
			<?php } elseif (is_tag()) { ?>
				<span><?php _e( 'Posts Tagged:', 'bonestheme' ); ?></span> <?php single_tag_title(); ?>
			<?php } elseif (is_author()) {
				global $post;
				$author_id = $post->post_author;
			?>
				<span><?php _e( 'Posts By:', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>
			<?php } elseif (is_day()) { ?>
				<span><?php _e( 'Daily Archives:', 'bonestheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
			<?php } elseif (is_month()) { ?>
				<span><?php _e( 'Monthly Archives:', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
			<?php } elseif (is_year()) { ?>
				<span><?php _e( 'Yearly Archives:', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
			<?php } elseif (is_tax('categories')) {
				global $post;
				list($cat) = array_values(get_the_terms($post->ID, 'categories'));
			 ?>
				Catégorie : <?php echo $cat->name; ?>
			<?php } ?>
		</h1>

		<?php if (have_posts()): ?>
		<div class="previews">
			<?php while (have_posts()) : the_post(); ?>
			<article class="preview" id="post-<?php the_ID(); ?>" role="article">
				<header class="preview-header">
					<div class="preview-image">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('bones-thumb-m'); ?></a>
					</div> <!-- end article header -->

					<?php if (get_field('unit_price') > 0): ?>
					<div class="price unit">
						<?php echo number_format(get_field('unit_price'), 2, ',', ' '); ?> <span class="currency">€</span>
					</div>
					<?php endif; ?>
				</header>

				<h2 class="preview-title">
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
