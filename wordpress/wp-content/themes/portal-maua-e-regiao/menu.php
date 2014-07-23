<nav class="menu esconder">
  <section class="itens">
    <section class="logotipo">
    </section>
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
          <section class="header"></section>

          <section class="lista">
            <ul>
              <li><a href="<?php bloginfo('url') ?>/categorias/agenda">Agenda</a></li>
              <li><a href="<?php bloginfo('url') ?>/categorias/agenda">Fatos e Fotos</a></li>
              <li><a target="_blank" href="http://tvmauaeregiao.com.br/categorias/programas/rapidinha/?canal=1">Rapidinha</a></li>
              <li><a target="_blank" href="http://tvmauaeregiao.com.br/categorias/programas/entrevista/?canal=1">Entrevistas</a></li>
            </ul>
          </section>
        </section>
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
  </section>
 </nav>
