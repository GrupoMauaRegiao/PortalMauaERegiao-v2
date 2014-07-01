      <footer>
        <section class="conteudo-rodape">
          <section class="cabecalho-rodape">
            <section class="conteudo">
              <section class="lateral">
                <section class="logotipo">
                  <a href="#" title="Grupo Mauá e Região de Comunicação">
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
                <form action="#">
                  <input type="text" name="s">
                  <input type="submit" value=" " title="Buscar">
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
                <a href="#" title="Revista Mauá e Região">
                  <section class="logotipo"></section>
                </a>

                <a href="#" title="Jornal Mauá e Região">
                  <section class="logotipo"></section>
                </a>

                <a href="#" title="Portal Mauá e Região">
                  <section class="logotipo"></section>
                </a>

                <a href="#" title="TV Mauá e Região">
                  <section class="logotipo"></section>
                </a>
              </section>
            </section>
          </section>
        </section>
      </footer>
    </section>

    <?php wp_reset_query(); ?>
    <?php wp_footer(); ?>
    <script src="<?php bloginfo('template_directory'); ?>/scripts/libs/jquery-2.1.1.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/scripts/libs/jquery.iecors.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/scripts/libs/jPages.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/scripts/libs/lightbox.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/scripts/scripts.js"></script>
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
  </body>
</html>
