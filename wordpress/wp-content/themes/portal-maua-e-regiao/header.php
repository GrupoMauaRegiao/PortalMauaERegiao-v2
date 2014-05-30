<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="keywords" content="portal maua e regiao, maua e regiao, maua, portal maua, noticias, ultimas noticias, qualidade, melhor, website maua, melhor website, melhor site, ribeirao pires, rio grande da serra, noticias de ribeirao pires, noticias de rio grande da serra, santo andre, noticias de santo andre, portal de noticias do abc, abc sao paulo, sao paulo abc">
    <meta name="description" content="Portal de notícias do Grupo Mauá e Região de Comunicação">
    <meta name="author" content="Grupo Mauá e Região de Comunicação">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/imagens/favicon.ico">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/styles.min.css">
    <title>Portal Mauá e Região</title>
  </head>
  <body>

    <section class="layout">
      <header>
        <section class="conteudo-header">
          <section class="facebook">
            <section class="fb-botao"></section>

            <a href="facebook.com">
              <section class="fb-icone"></section>
            </a>
          </section>

          <a href="#" title="Portal Mauá e Região">
            <section class="logotipo"></section>
          </a>

          <!-- ///////////////// PUBLICIDADE ////////////////// -->
          <section class="publicidade-topo">
            <a href="#" title="">
              <section class="imagem">
                <img src="#" alt="">
              </section>
            </a>
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
                      <li><a href="#">Mauá</a></li>
                      <li><a href="#">Ribeirão Pires</a></li>
                      <li><a href="#">Rio G. da Serra</a></li>
                    </ul>
                  </section>
                </section>

                <section class="politica">
                  <section class="header">
                    Política
                  </section>

                  <section class="lista">
                    <ul>
                      <li><a href="#">Mauá</a></li>
                      <li><a href="#">Ribeirão Pires</a></li>
                      <li><a href="#">Rio G. da Serra</a></li>
                    </ul>
                  </section>
                </section>

                <section class="e-mais">
                  <section class="header">
                    E mais
                  </section>

                  <section class="lista">
                    <ul>
                      <li><a href="#">Acidentes</a></li>
                      <li><a href="#">Brasil</a></li>
                      <li><a href="#">Curiosidades</a></li>
                      <li><a href="#">Educação</a></li>
                    </ul>
                    <ul>
                      <li><a href="#">Esportes</a></li>
                      <li><a href="#">LGBT</a></li>
                      <li><a href="#">Mauá e região</a></li>
                      <li><a href="#">Meio ambiente</a></li>
                    </ul>
                    <ul>
                      <li><a href="#">Moda</a></li>
                      <li><a href="#">Música</a></li>
                      <li><a href="#">Saúde</a></li>
                      <li><a href="#">Tecnologia</a></li>
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
                <!-- Conteúdo Entretenimento -->
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
              <section class="icone"></section>
              <section class="formulario-busca">
                <form action="#">
                  <input type="text" name="s" placeholder="Procurar">
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
                  <input type="text" name="s" placeholder="Buscar (nome, CEP, ramo, ...)">
                  <input type="submit" value=" " title="Buscar">
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