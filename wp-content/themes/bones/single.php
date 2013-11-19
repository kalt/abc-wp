<?php get_header(); ?>

	<div class="content" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="entry" id="post-<?php the_ID(); ?>" role="article">
				<div class="entry-image">
					<?php the_post_thumbnail( 'bones-thumb-wide-xl' ); ?>
				</div>
				<section class="entry-content">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php the_title(); ?>
						</h1>
						<div class="entry-categories">
							Recette classée dans : <?php the_terms($post->ID, 'categories'); ?>
						</div>
					</header>

				
					<div class="entry-description description">
						<?php the_content(); ?>
					</div>

					<?php if (get_field('ingredients') != ""): ?>
					<div class="entry-ingredients">
						<h2>Ingrédients</h2>
						<?php echo get_field('ingredients'); ?>
					</div>
					<?php endif; ?>
				</section>
			</article>

			<aside class="entry-meta">
				<ul class="entry-prices">
				<?php if (get_field('weight') > 0): ?>
					<li>Poids du sachet : <?php echo number_format(get_field('weight'), 0, ',', ' '); ?>g</li>
				<?php endif; ?>
				<?php if (get_field('unit_price') > 0): ?>
					<li>Prix du sachet : <?php echo number_format(get_field('unit_price'), 2, ',', ' '); ?> €</li>
				<?php endif; ?>
				<?php if (get_field('price_per_kilo') > 0): ?>
					<li>Prix au kilo : <?php echo number_format(get_field('price_per_kilo'), 2, ',', ' '); ?> €</li>
				<?php endif; ?>
				</ul>
			</aside>

		<?php endwhile; ?>

		<?php else : ?>
		<div class="message notfound">
			La page demandée n'exste pas.
		</div>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
