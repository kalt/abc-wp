<?php get_header(); ?>

	<div class="content" role="main">
		<div class="arguments">
			<div class="argument" id="argument-1">
				<h3 class="argument-title">Une production locale</h3>
				<div class="argument-description">
					<p>Tous les gâteaux sont faits maison à Hérouville Saint Clair en Normandie.</p>
				</div>
			</div>

			<div class="argument" id="argument-2">
				<h3 class="argument-title">Sans additif</h3>
				<div class="argument-description">
					<p>Nous n'utilisons aucun conservateur, aucun colorant.</p>
				</div>
			</div>

			<div class="argument" id="argument-3">
				<h3 class="argument-title">Des produits simples et sains</h3>
				<div class="argument-description">
					<p>Farine, oeuf, sucre... uniquement des produits simples pour un goût authentique.</p>
				</div>
			</div>
		</div>

		<?php if (have_posts()): ?>
		<div class="previews">
			<?php while (have_posts()): the_post(); ?>
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
