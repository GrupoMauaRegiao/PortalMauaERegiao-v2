<?php query_posts("orderby=rand&showposts=1&post_type=pub_630_x_200");
if (have_posts()) : while (have_posts()) : the_post(); ?>
    <a target="_blank"
       href="<?php echo get_post_meta($post -> ID, "link", true); ?>"
       title="Publicidade &#8212; <?php echo get_post_meta($post -> ID, "link", true); ?>">
        <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
            <section class="imagem">
                <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="">
            </section>
        <?php elseif (get_post_meta($post -> ID, "object", true)): ?>
            <section class="object publicidade">
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
