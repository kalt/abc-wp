<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

							<div class="arguments">
								
								<div class="argument" id="argument-1">
									<h3>Une production locale</h3>
									<p>Tous les gâteaux sont faits maison à Hérouville Saint Clair en Normandie.</p>
								</div>

								<div class="argument" id="argument-2">
									<h3>Sans additif</h3>
									<p>Nous n'utilisons aucun conservateur, aucun colorant.</p>
								</div>

								<div class="argument" id="argument-3">
									<h3>Des produits simples et sains</h3>
									<p>Farine, oeuf, sucre... uniquement des produits simples pour un goût authentique.</p>
								</div>

							</div>


							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<section class="entry-content clearfix">
									<header class="article-header">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'bones-thumb-wide-l' ); ?></a>
									</header> <!-- end article header -->

									<div class="article-categories">
										<?php the_terms($post->ID, 'categories'); ?>
									</div>

									<h2 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

									<div class="entry-excerpt">
										<?php the_excerpt(); ?>
									</div>
								</section> <!-- end article section -->
							</article> <!-- end article -->

							<?php endwhile; ?>

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

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

						<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
