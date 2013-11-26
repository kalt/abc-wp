<?php get_header(); ?>

	<div class="content" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="entry" id="post-<?php the_ID(); ?>" role="article">
			<div class="entry-image">
				<?php the_post_thumbnail( 'bones-thumb-xl' ); ?>
			</div>
			<header class="entry-header">
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
				<div class="entry-categories">
					<?php if (has_category()): ?>
						Classé dans : 
						<?php 
						$categories = get_the_category();
						if ($categories) {
							foreach ($categories as $category) {
								echo '<a href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>';
							}
						} ?>
					<?php else: ?>
						Classé dans : <?php the_terms($post->ID, 'categories'); ?>
					<?php endif; ?>
				</div>
			</header>

			<div class="entry-description description">
				<?php the_content(); ?>
				
				<?php if (get_field('ingredients') != ""): ?>
				<div class="entry-ingredients">
					<h2>Ingrédients</h2>
					<?php echo get_field('ingredients'); ?>
				</div>
				<?php endif; ?>
			</div>

			<?php if (get_fields()): ?>
			<aside class="entry-meta">
				<?php if (get_field('unit_price') > 0): ?>
				<div class="price unit">
					<?php echo number_format(get_field('unit_price'), 2, ',', ' '); ?> <span class="currency">€</span>
				</div>
				<?php endif; ?>

				<?php if (get_field('weight') > 0): ?>
				<div class="weight">
					Le sachet de <strong><?php echo number_format(get_field('weight'), 0, ',', ' '); ?>g</strong>
				</div>
				<?php endif; ?>

				<?php if (get_field('price_per_kilo') > 0): ?>
				<div class="price per-kilo">
					Soit <?php echo number_format(get_field('price_per_kilo'), 2, ',', ' '); ?> € le kg
				</div>
				<?php endif; ?>

				<div class="action">
					<a href="<?php echo get_permalink(get_page_by_path('bon-de-commande')); ?>" class="btn">Passer commande</a>
				</div>
			</aside>
			<?php endif; ?>
		</article>
		<?php endwhile; ?>

		<?php else : ?>
		<div class="message notfound">
			La page demandée n'exste pas.
		</div>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
