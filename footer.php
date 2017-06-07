  <footer id="footer">

    <section>

      <div class="signup">
        <h3>Get E-News</h3>
        <p>Occasional Alerts and Updates from PPS</p>
        <form name="ccoptin" action="http://visitor.constantcontact.com/d.jsp" target="_blank" method="post">
          <input type="hidden" name="m" value="1102165220207">
          <input type="hidden" name="p" value="oi">
          <input type="email" name="ea" size="20" placeholder="email@domain.com">
          <input type="submit" name="go" value="Sign Up">
        </form>
      </div>

      <div class="contact" itemscope itemtype="http://schema.org/Organization">
        <h1 class="logo-text" itemprop="name">Providence Preservation Society</h1>
        <div class="address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
          <?php dynamic_sidebar('address'); ?>
        </div>
        <?php dynamic_sidebar('contact-info'); ?>
      </div>

    </section>

    <section>

      <div class="social">
        <?php dynamic_sidebar('social'); ?>
      </div>

      <nav role="navigation">

        <div class="secondary-nav">
          <?php ppsri_secondary_nav(); ?>
        </div>

        <div class="primary-nav">
            <?php ppsri_primary_nav(); ?>
        </div>

      </nav>

    </section>

  </footer>

  <?php wp_footer(); ?>

  <div class="subfooter">
    <p>
      <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</span>
      <span>All rights reserved.</span>
    </p>
  </div>

  </body>
</html>