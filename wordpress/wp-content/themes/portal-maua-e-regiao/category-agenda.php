<?php get_header(); ?>
<?php wp_reset_query(); ?>

<section class="ultimas-noticias">
  <section class="layout-ultimas-noticias">
    <section class="conteudo">
      <section class="principal">
        <section class="header">
          <section class="titulo categoria">
            <?php echo single_cat_title(); ?>
          </section>
          <section class="decoracao">
            <section class="linha-grossa"></section>
            <section class="linha-fina"></section>
          </section>
        </section>

        <section class="agenda-chamada">
          <p>
            Tem alguma dúvida, sugestão ou crítica? Então entre em contato com a gente. Sua opinião é fundamental para nosso aperfeiçoamento.
          </p>
        </section>

        <section class="agenda">
          <?php query_posts(query_agenda()); ?>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <section class="evento evento-<?php echo get_post_meta($post -> ID, 'cor_box', true); ?>" title="<?php the_title(); ?>">
            <section class="imagem">
              <section class="foto-materia">
                <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="">
              </section>
              <section class="corte"></section>
            </section>

            <section class="agenda-header">
              <section class="decoracao">
                <section class="linha-grossa"></section>
                <section class="linha-fina"></section>
                <section class="data-horario">
                  <section class="data">
                    Data: <?php echo get_post_meta($post -> ID, "data", true); ?>
                  </section>
                  <section class="horario">
                    Hora: <?php echo get_post_meta($post -> ID, "hora", true); ?>
                  </section>
                </section>
              </section>
            </section>
            <section class="informacoes">
              <section class="titulo">
                <?php the_title(); ?>
              </section>
              <section class="descricao">
                <?php the_content(); ?>
              </section>
            </section>
            <section class="localizacao">
              Local: <?php echo get_post_meta($post -> ID, "local", true); ?><br>
              Endereço: <?php echo get_post_meta($post -> ID, "endereco", true); ?><br>
              Valor: <?php echo get_post_meta($post -> ID, "valor-ingresso", true); ?>
            </section>
          </section>
          <?php endwhile; else: ?>

            <p>Nenhum evento foi publicado ainda.</p>

          <?php endif; ?>
        </section>
      </section>

      <?php get_sidebar(); ?>

    </section>
  </section>
</section>

<?php get_footer(); ?>
