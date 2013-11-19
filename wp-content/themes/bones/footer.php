	</div>

	<div class="main-footer-wrapper">
		<footer class="main-footer container" role="contentinfo">
			<div class="footer-block">
				<?php $contactPage = get_page_by_title("contact"); ?>
				<p>Passez commande sur la page <a href="<?php echo get_page_link($contactPage->ID); ?>">Contact</a></p>
			</div>

			<div class="footer-block">
				<p>Envoyez un email à l'adresse :<br>
				<a href="mailto:<?php echo antispambot('contact@amaretti-biscuits-cookies.com', 1); ?>">contact@amaretti-biscuits-cookies.com</a></p>
			</div>

			<div class="footer-block">
				<p>Suivez-moi sur <a href="http://www.facebook.com/amaretti.biscuits.cookies/" target="_blank">Facebook</a></p>
			</div>
		</footer>
	</div>

	<?php wp_footer(); ?>

	</body>

</html>
