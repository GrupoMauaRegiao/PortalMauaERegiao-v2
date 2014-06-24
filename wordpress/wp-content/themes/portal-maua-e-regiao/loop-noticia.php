<?php query_posts("order=desc&showposts=3&post_type=noticia&category_name=destaque"); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    <section class="noticia">
      <section class="header-noticia">
        <section class="header">
          <?php echo categoria_noticia(); ?>
        </section>
        <section class="decoracao">
          <section class="linha-grossa"></section>
          <section class="linha-fina"></section>
        </section>
      </section>

      <section class="imagem">
        <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="">
      </section>
      <section class="informacoes">
        <section class="titulo">
          <h2>
            <span><?php the_title(); ?></span>
          </h2>
        </section>
      </section>
    </section>
  </a>

<?php endwhile; else: ?>

  <p>Nenhuma notícia foi publicada ainda.</p>

<?php endif; ?>
