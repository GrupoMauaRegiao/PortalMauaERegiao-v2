  <section class="lateral">
     <section class="header">
       <section class="titulo">
         Siga-nos
       </section>
       <section class="decoracao">
         <section class="linha-grossa"></section>
         <section class="linha-fina"></section>
       </section>
     </section>

     <section class="redes-sociais">
       <section class="icones">
         <a target="_blank"
            href="https://www.facebook.com/pages/Portal-Mau%C3%A1-e-Regi%C3%A3o/359211450756546" title="Facebook">
           <section class="icone"></section>
         </a>
         <a target="_blank"
            href="https://twitter.com/tvmauaeregiao" title="Twitter">
           <section class="icone"></section>
         </a>
         <a target="_blank"
            href="#" title="Instagram">
           <section class="icone"></section>
         </a>
         <a target="_blank"
            href="#" title="Tumblr">
           <section class="icone"></section>
         </a>
         <a target="_blank"
            href="https://www.youtube.com/user/portalmauaeregiao" title="YouTube">
           <section class="icone"></section>
         </a>
       </section>
     </section>

     <!-- ///////////////// PUBLICIDADE ////////////////// -->
      <section class="publicidade">
      <?php query_posts("orderby=rand&showposts=1&post_type=pub_300_x_250"); ?>
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
     <!-- ///////////////// close PUBLICIDADE ////////////////// -->

     <section class="destaques">
       <section class="header">
         <section class="titulo">
           Destaques
         </section>
         <section class="decoracao">
           <section class="linha-grossa"></section>
           <section class="linha-fina"></section>
         </section>
       </section>

       <section class="lista-destaques">

        <?php wp_reset_query(); ?>
        <?php query_posts(query_noticias("destaque_3_itens", $post -> ID)); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <section class="destaque">
                <section class="titulo">
                  <?php the_title(); ?>
                </section>
              </section>
            </a>
          <?php endif; ?>

        <?php endwhile; else: ?>

          <p>Nenhuma notícia publicada ainda.</p>

        <?php endif; ?>

        <?php query_posts(query_noticias("destaque_1_item", $post -> ID)); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <section class="destaque">
                <section class="titulo">
                  <?php the_title(); ?>
                </section>
              </section>
            </a>
          <?php endif; ?>

        <?php endwhile; else: ?>

          <p>Nenhuma notícia publicada ainda.</p>

        <?php endif; ?>
        <?php query_posts(query_noticias("destaque_2_itens", $post -> ID)); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <section class="destaque">
                <section class="titulo">
                  <?php the_title(); ?>
                </section>
              </section>
            </a>
          <?php endif; ?>

        <?php endwhile; else: ?>

          <p>Nenhuma notícia publicada ainda.</p>

        <?php endif; ?>

       </section>
     </section>

     <section class="revista">
       <section class="header">
         <section class="titulo">
           Revista
         </section>
         <section class="decoracao">
           <section class="linha-grossa"></section>
           <section class="linha-fina"></section>
         </section>
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
       </section>
     </section>

     <section class="jornal">
       <section class="header">
         <section class="titulo">
           Jornal
         </section>
         <section class="decoracao">
           <section class="linha-grossa"></section>
           <section class="linha-fina"></section>
         </section>
       </section>

        <section class="ver-jornal">
          <section class="embed">
            <?php query_posts("showposts=1&post_type=jornal"); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <?php echo get_post_meta($post -> ID, "iframe-issuu", true); ?>

            <?php endwhile; else: ?>

              <p>Nenhuma revista publicada ainda.</p>

            <?php endif; ?>
          </section>
        </section>
     </section>
   </section>
