    </div>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <nav class="col-xs-12 footer-menu-wrap" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
                </nav>
            </div>

            <div class="row">
                <div class="col-xs-12 copy">
                    <p>Copyright &copy; <?php echo date( 'Y' ); ?> &ndash; <?php bloginfo( 'name' ); ?> <?php bloginfo( 'description' ); ?>. Todos os direitos reservados</p>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    <script src="//localhost:35729/livereload.js"></script>
</body>
</html>