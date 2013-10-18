<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="eightcol first clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<section class="entry-content clearfix" itemprop="articleBody">
									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

									<?php the_post_thumbnail( 'bones-thumb-wide-xl' ); ?>

									<div class="article-categories">
										<?php the_terms($post->ID, 'categories'); ?>
									</div>
								
									<div class="entry-description">
										<?php the_content(); ?>
									</div>
								</section> <!-- end article section -->

								<footer class="article-footer">
									<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer> <!-- end article footer -->

								<?php comments_template(); ?>

							</article> <!-- end article -->

							<aside>
								<ul>
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

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div> <!-- end #main -->

					<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
