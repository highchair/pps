  <footer id="footer">

    <section>

      <div class="signup">
        <h3>Get E-News</h3>
        <p>Occasional Alerts and Updates from PPS</p>
        <form>
          <input type="email" placeholder="email@domain.com"><a class="button" href="#">Sign Up</a>
        </form>
      </div>

      <div class="contact" itemscope itemtype="http://schema.org/Organization">
        <h1 class="logo-text" itemprop="name">Providence Preservation Society</h1>
        <div class="address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <p><span itemprop="streetAddress">24 Meeting Street</span></p>
          <p>
            <span itemprop="addressLocality">Providence </span>,
            <span itemprop="addressRegion">RI</span> (<a href="javascript:void(0)" itemprop="maps">Map</a>)
          </p>
        </div>
        <p class="phone">ph: <span itemprop="telephone">(401) 831-7440</span></p>
        <p class="email"><span itemprop="email">info@ppsri.org</span></p>
      </div>

    </section>

    <section>

      <div class="social">
        <a href="http://facebook.com/pvdpreservation"><span class="icon-facebook"></span> facebook.com/pvdpreservation</a>
        <a href="http://twitter.com/pvdpreservation"><span class="icon-twitter"></span> twitter.com/pvdpreservation</a>
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