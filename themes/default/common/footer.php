    <footer role="contentinfo">
        <div class="container">
            <div id="footer-text">
                <?php echo get_theme_option('Footer Text'); ?>
                <div>
                    <a href="http://kuleuven.be"><img src="<?php echo img("KULEUVEN.png");?>"></a>
                    <a href="http://libis.be"><img src="<?php echo img("libis_gray.png");?>"></a>
                </div>
                <div class="footer-brand">
                  <div class="footer-content">
                    <!--<p><a class="footer-logo" href="<?php echo url("/");?>">digital<span>Husserl</span></a> Straatstraat 22 | 3000 Leuven | +3216222222</p>-->
                    <ul>
                        <li><a href="http://hiw.kuleuven.be/hua/about/">Husserl Archives</a></li>
                        <li><a href="http://hiw.kuleuven.be/hua/manuscript/">Manuscript Index</a></li>
                        <li><a href="http://hiw.kuleuven.be/hua/editionspublications/">Publications & editions</a></li>
                    </ul>
                  </div>
                </div>
                <div class="copyright">
                  © KU Leuven
                </div>
            </div>
            <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
        </div>
    </footer><!-- end footer -->
</body>
<script>
jQuery(".toggle").on("click", function() {
  jQuery(".toggle").parent().toggleClass('active');
});

</script>
</html>
