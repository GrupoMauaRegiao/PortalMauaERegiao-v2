<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">

    <script src="<?php bloginfo('template_directory'); ?>/scripts/libs/pace.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/scripts/libs/pace.config.js"></script>

    <meta name="keywords" content="portal maua e regiao, maua e regiao, maua, portal maua, noticias, ultimas noticias, qualidade, melhor, website maua, melhor website, melhor site, ribeirao pires, rio grande da serra, noticias de ribeirao pires, noticias de rio grande da serra, santo andre, noticias de santo andre, portal de noticias do abc, abc sao paulo, sao paulo abc">
    <meta name="description" content="Portal de notícias do Grupo Mauá e Região de Comunicação; <?php bloginfo('description'); ?>">
    <meta name="author" content="Grupo Mauá e Região de Comunicação">

    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/imagens/favicon.ico">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/libs/lightbox.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/styles.min.css">

    <title><?php echo mostrar_titulo(); ?></title>

    <?php echo implementar_open_graph(); ?>

  </head>
  <body>

    <section class="layout">
      <header>
        <section class="conteudo-header">
        <?php wp_reset_query(); ?>
        <?php if (is_single()): ?>
          <a href="<?php echo feed_rss_url(); ?>">
            <section class="feed"></section>
          </a>
        <?php endif; ?>
          <section class="facebook">
            <section class="facebook">
              <div class="fb-like"
                   data-href="<?php bloginfo('url'); ?>"
                   data-layout="button_count"
                   data-action="like"
                   data-show-faces="false"
                   data-share="false"></div>
            </section>
          </section>

          <a href="<?php bloginfo('url'); ?>" title="Portal Mauá e Região">
            <section class="logotipo"></section>
          </a>

          <!-- ///////////////// PUBLICIDADE ////////////////// -->
          <section class="publicidade-topo">
            <?php query_posts("orderby=rand&showposts=1&post_type=pub_730_x_100"); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <a target="_blank" href="<?php echo get_post_meta($post -> ID, "link", true); ?>" title="Publicidade &#8212; <?php echo get_post_meta($post -> ID, "link", true); ?>">

                <?php if (get_post_meta($post -> ID, "imagem", true)): ?>

                  <section class="imagem">
                    <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="">
                  </section>

                <?php elseif (get_post_meta($post -> ID, "object", true)): ?>

                  <section class="object">
                    <object data="<?php echo get_post_meta($post -> ID, "object", true); ?>"
                            type="application/x-shockwave-flash">
                      <param name="movie" value="<?php echo get_post_meta($post -> ID, "object", true); ?>">
                      <param name="quality" value="high">
                    </object>
                  </section>

                <?php endif; ?>
              </a>
            <?php endwhile; else: ?>

              <p>ANUNCIE AQUI</p>

            <?php endif; ?>
          </section>
          <!-- //////////////// close PUBLICIDADE ////////////////// -->

          <nav class="topo">
            <section class="categorias">
              <section class="header">
                <section class="titulo">
                  Categorias
                </section>
                <section class="seta"></section>
              </section>

              <section class="lista-categorias">
                <section class="cidade">
                  <section class="header">
                    Cidade
                  </section>

                  <section class="lista">
                    <ul>
                      <?php echo categorias_sem_title('Cidade'); ?>
                    </ul>
                  </section>
                </section>

                <section class="politica">
                  <section class="header">
                    Política
                  </section>

                  <section class="lista">
                    <ul>
                      <?php echo categorias_sem_title('Política'); ?>
                    </ul>
                  </section>
                </section>

                <section class="e-mais">
                  <section class="header">
                    E mais
                  </section>

                  <section class="lista">
                    <ul class="grupo-1">
                      <?php echo categorias_sem_title('Mais Grupo 1'); ?>
                    </ul>
                    <ul class="grupo-2">
                      <?php echo categorias_sem_title('Mais Grupo 2'); ?>
                    </ul>
                    <ul class="grupo-3">
                      <?php echo categorias_sem_title('Mais Grupo 3'); ?>
                    </ul>
                  </section>
                </section>
              </section>
            </section>

            <section class="entretenimento">
              <section class="header">
                <section class="titulo">
                  Entretenimento
                </section>
                <section class="seta"></section>
              </section>

              <section class="lista-entretenimento">
                <section class="cidade">
                  <section class="header">

                  </section>

                  <section class="lista">
                    <ul>
                      <li><a href="<?php bloginfo('url') ?>/categorias/agenda">Agenda</a></li>
                      <li><a target="_blank" href="http://tvmauaeregiao.com.br/categorias/programas/rapidinha/?canal=1">Rapidinha</a></li>
                      <li><a target="_blank" href="http://tvmauaeregiao.com.br/categorias/programas/entrevista/?canal=1">Entrevistas</a></li>
                    </ul>
                  </section>
                </section>
              </section>
            </section>

            <section class="previsao-do-tempo">
              <section class="loading"></section>

              <section class="elementos esconder">
                <section class="icone"></section>
                <section class="temperatura"></section>
                <section class="localidade"></section>
              </section>
            </section>

            <section class="busca">
              <section class="header">
                <section class="icone"></section>
              </section>
              <section class="formulario-busca">
                <form method="get"
                      action="/">
                  <input type="text"
                         name="s"
                         placeholder="Procurar">
                  <input type="submit"
                         value=" "
                         title="Buscar">
                </form>
              </section>
            </section>

            <section class="revista">
              <section class="header">
                <section class="titulo">
                  Revista
                </section>
                <section class="seta"></section>
              </section>

              <section class="ver-revista">
                <section class="embed">
                  <?php query_posts("showposts=1&post_type=revista"); ?>
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php echo get_post_meta($post -> ID, "iframe-issuu", true); ?>

                  <?php endwhile; else: ?>

                    <p>Nenhuma revista publicada ainda.</p>

                  <?php endif; ?>
                </section>

                <section class="ver-todas">
                  <a target="_blank" href="http://revistamaua.com.br/todas-as-edicoes">Ver todas</a>
                </section>
              </section>
            </section>

            <section class="jornal">
              <section class="header">
                <section class="titulo">
                  Jornal
                </section>
                <section class="seta"></section>
              </section>

              <section class="ver-jornal">
                <section class="embed">
                  <?php query_posts("showposts=1&post_type=jornal"); ?>
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php echo get_post_meta($post -> ID, "iframe-issuu", true); ?>

                  <?php endwhile; else: ?>

                    <p>Nenhum jornal publicado ainda.</p>

                  <?php endif; ?>
                </section>

                <section class="ver-todos">
                  <a target="_blank" href="http://issuu.com/jornalmaua">Ver todos</a>
                </section>
              </section>
            </section>

            <section class="empresas">
              <section class="header">
                <section class="icone"></section>
                <section class="titulo">
                  Empresas
                </section>
              </section>

              <section class="formulario-busca-empresas">
                <form action="#">
                  <input type="text"
                         name="s"
                         placeholder="Buscar (nome, CEP, ramo, ...)">
                  <input type="submit"
                         value=" "
                         title="Buscar">
                </form>

                <section class="links">
                  <a href="#">Todas as categorias</a>
                  <a href="#">Busca avançada</a>
                </section>
              </section>

            </section>
          </nav>
        </section>
      </header>
