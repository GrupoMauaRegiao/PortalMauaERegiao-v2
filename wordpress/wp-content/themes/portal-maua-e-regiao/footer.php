            <footer>
                <section class="conteudo-rodape">
                    <section class="cabecalho-rodape">
                        <section class="conteudo">
                            <section class="lateral">
                                <section class="logotipo">
                                    <a href="<?php bloginfo('url'); ?>"
                                       title="Grupo Mauá e Região de Comunicação">
                                        <section class="logotipo-grupo-maua-e-regiao"></section>
                                    </a>
                                </section>
                                <section class="links">
                                    <ul>
                                        <li><a href="<?php bloginfo('url'); ?>/anuncie"><strong>Anuncie</strong></a></li>
                                        <li><a href="<?php bloginfo('url'); ?>/fale-conosco">Fale <strong>conosco</strong></a></li>
                                    </ul>
                                </section>
                            </section>

                            <section class="busca-rodape">
                                <form method="get"
                                      action="/">
                                    <input type="text" name="s">
                                    <input type="submit"
                                           value=" "
                                           title="Buscar">
                                </form>
                            </section>
                        </section>

                    </section>

                    <section class="copyright-marcas">
                        <section class="conteudo-copyright-marcas">
                            <section class="copyright">
                                &copy; <?php echo date("Y"); ?> &#8212; Portal Mauá e Região<br>
                                <strong>Todos os direitos reservados</strong>
                            </section>

                            <section class="marcas">
                                <a target="_blank" href="http://revistamaua.com.br" title="Revista Mauá e Região">
                                    <section class="logotipo"></section>
                                </a>

                                <a target="_blank" href="#" title="Jornal Mauá e Região">
                                    <section class="logotipo"></section>
                                </a>

                                <a href="#" title="Portal Mauá e Região">
                                    <section class="logotipo"></section>
                                </a>

                                <a target="_blank" href="http://tvmauaeregiao.com.br" title="TV Mauá e Região">
                                    <section class="logotipo"></section>
                                </a>
                            </section>
                        </section>
                    </section>
                </section>
            </footer>
        </section>

        <?php
        wp_reset_query();
        wp_footer();
        ?>
        <script src="<?php bloginfo('template_directory'); ?>/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/bower_components/carouFredSel/jquery.carouFredSel-6.2.1-packed.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/scripts/public.min.js"></script>

        <!-- Google -->
        <script>
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-31061749-1']);
          _gaq.push(['_trackPageview']);
          (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol
              ? 'https://'
              : 'http://') + 'stats.g.doubleclick.net/dc.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
          })();
        </script>
        <!-- close Google -->

        <script src="https://apis.google.com/js/platform.js" async defer>
            {lang: 'pt-BR'}
        </script>

        <!-- Twitter button -->
        <script>
          !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
        </script>
        <!-- close Twitter button -->

        <!-- Facebook button -->
        <div id="fb-root"></div>
        <script>
          (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
        </script>
        <!-- close Facebook button -->

        <!-- Google + button -->
        <script src="https://apis.google.com/js/platform.js" async defer>
          {lang:'pt-BR'}
        </script>
        <!-- close Google + button -->
    </body>
</html>
