  <footer>
    <div>
      <section class="footer-left">
        <?php dynamic_sidebar( 'footer_left' ); ?>
      </section>
      <section class="footer-middle">
        <?php dynamic_sidebar( 'footer_middle' ); ?>
      </section>
      <section class="footer-right">
        <?php dynamic_sidebar( 'footer_right' ); ?>
      </section>
    </div>
  </footer>

  <?php wp_footer(); ?>

  <div class="subfooter">
    <div><?php echo get_theme_mod( 'sub_footer' ); ?></div>
  </div>

  </body>
</html>