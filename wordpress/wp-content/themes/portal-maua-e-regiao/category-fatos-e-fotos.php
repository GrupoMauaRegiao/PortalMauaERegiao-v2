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

        <section class="fatos-e-fotos-chamada">
          <p>
            Aqui você pode acompanhar os principais eventos da região.
          </p>
        </section>

        <section class="itens-fatos-e-fotos">
          <section class="publicidade-destaques">
            <?php query_posts("order=desc&showposts=-1&post_type=fatos_e_fotos"); ?>
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                  <section class="galeria">
                    <section class="imagens" title="<?php the_title(); ?>">
                      <section class="imagem">
                        <img src="<?php echo get_post_meta($post -> ID, "capa_fundo_imagem_maior", true); ?>" alt="">
                      </section>
                    </section>
                    <section class="titulo">
                      <h3>
                        <?php the_title(); ?>
                      </h3>
                    </section>
                  </section>
                </a>
                <?php endwhile; else: ?>

                  <p>Nenhum evento foi publicado ainda.</p>

                <?php endif; ?>
          </section>
        </section>
      </section>

      <?php get_sidebar(); ?>

    </section>
  </section>
</section>

<?php get_footer(); ?>
