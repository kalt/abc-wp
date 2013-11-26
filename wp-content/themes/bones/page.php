<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="content" role="main">
		<article class="page" id="post-<?php the_ID(); ?>" role="article">
			<div class="page-content">
				<header class="page-header">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>
				<div class="page-description description">
					<?php the_content(); ?>
				</div>
			</div>
		</article>
	</div>
<?php endwhile; endif; ?>

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

<?php get_footer(); ?>
