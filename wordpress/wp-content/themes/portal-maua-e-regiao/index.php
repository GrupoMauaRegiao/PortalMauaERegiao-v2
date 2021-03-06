<?php get_header(); ?>

<section class="homepage-noticias">
    <section class="conteudo">
        <section class="noticias">
            <section class="box-com-3">
                <?php
                query_posts("order=desc&showposts=3&post_type=destaque_3_itens");
                if (have_posts()) : while (have_posts()) : the_post();

                    if (get_post_meta($post -> ID, "imagem", true)): ?>
                        <a href="<?php the_permalink(); ?>"
                           title="<?php the_title(); ?>">
                            <section class="noticia">
                                <section class="imagem carregando">
                                    <img src="<?php echo get_post_meta($post -> ID, 'imagem', true); ?>" alt="<?php the_title(); ?>">
                                </section>
                                <section class="informacoes">
                                    <section class="marca">
                                        <span><?php echo get_post_meta($post -> ID, 'expressao-chave', true); ?></span>
                                    </section>
                                    <section class="titulo">
                                        <h2>
                                            <span><?php the_title(); ?></span>
                                        </h2>
                                    </section>
                                </section>
                            </section>
                        </a>
                    <?php
                    endif;
                    endwhile; else:
                    ?>

                        <p>Nenhuma notícia publicada ainda.</p>

                    <?php endif; ?>

            </section>

            <section class="box-com-1">
                <?php
                query_posts("order=desc&showposts=1&post_type=destaque_1_item");

                if (have_posts()) : while (have_posts()) : the_post();
                    if (get_post_meta($post -> ID, "imagem", true)): ?>
                        <a href="<?php the_permalink(); ?>"
                           title="<?php the_title(); ?>">
                            <section class="noticia">
                                <section class="imagem carregando">
                                    <img src="<?php echo get_post_meta($post -> ID, 'imagem', true); ?>" alt="<?php the_title(); ?>">
                                </section>
                                <section class="informacoes">
                                    <section class="marca">
                                        <span><?php echo get_post_meta($post -> ID, 'expressao-chave', true); ?></span>
                                    </section>
                                    <section class="titulo">
                                        <h2>
                                            <span><?php the_title(); ?></span>
                                        </h2>
                                    </section>
                                </section>
                            </section>
                        </a>
                    <?php
                    endif;
                    endwhile; else:
                    ?>

                        <p>Nenhuma notícia publicada ainda.</p>

                    <?php endif; ?>

            </section>

            <section class="box-com-2">
                <?php
                query_posts("order=desc&showposts=2&post_type=destaque_2_itens");
                if (have_posts()) : while (have_posts()) : the_post();
                    if (get_post_meta($post -> ID, "imagem", true)): ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <section class="noticia">
                                <section class="imagem carregando">
                                    <img src="<?php echo get_post_meta($post -> ID, 'imagem', true); ?>" alt="<?php the_title(); ?>">
                                </section>
                                <section class="informacoes">
                                    <section class="marca">
                                        <span><?php echo get_post_meta($post -> ID, 'expressao-chave', true); ?></span>
                                    </section>
                                    <section class="titulo">
                                        <h2>
                                            <span><?php the_title(); ?></span>
                                        </h2>
                                    </section>
                                </section>
                            </section>
                        </a>
                    <?php
                    endif;
                    endwhile; else:
                    ?>

                        <p>Nenhuma notícia publicada ainda.</p>

                    <?php endif; ?>
            </section>
        </section>

        <section class="outros-destaques">
            <section class="header-outros-destaques">
                <h1><span>Outros <strong>Destaques</strong></span></h1>
            </section>
            <section class="box-com-destaques">
            <?php
            query_posts("order=desc&showposts=1&post_type=outros_destaques&category_name=maua");
            if (have_posts()) : while (have_posts()) : the_post();
                if (get_post_meta($post -> ID, "imagem", true)): ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <section class="destaque">
                            <section class="imagem carregando">
                                <img src="<?php echo get_post_meta($post -> ID, 'imagem', true); ?>" alt="<?php the_title(); ?>">
                            </section>
                            <section class="categoria">
                                Cidade <strong>Mauá</strong>
                            </section>
                            <section class="decoracao">
                                <section class="linha-grossa"></section>
                                <section class="linha-fina"></section>
                            </section>
                            <section class="titulo">
                                <h3><?php the_title(); ?></h3>
                            </section>
                        </section>
                    </a>

                    <?php
                    endif;
                    endwhile; else:
                    ?>

                        <p>Nenhuma notícia publicada ainda.</p>

                    <?php endif; ?>

                    <?php
                    query_posts("order= desc&showposts=1&post_type=outros_destaques&category_name=ribeirao-pires");
                    if (have_posts()) : while (have_posts()) : the_post();
                        if (get_post_meta($post -> ID, "imagem", true)): ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <section class="destaque">
                                    <section class="imagem carregando">
                                        <img src="<?php echo get_post_meta($post -> ID, 'imagem', true); ?>" alt="<?php the_title(); ?>">
                                    </section>
                                    <section class="categoria">
                                        Cidade <strong>Ribeirão Pires</strong>
                                    </section>
                                    <section class="decoracao">
                                        <section class="linha-grossa"></section>
                                        <section class="linha-fina"></section>
                                    </section>
                                    <section class="titulo">
                                        <h3><?php the_title(); ?></h3>
                                    </section>
                                </section>
                            </a>

                            <?php
                            endif;
                            endwhile; else:
                            ?>

                                <p>Nenhuma notícia publicada ainda.</p>

                            <?php endif; ?>

            </section>

            <!-- ///////////////// PUBLICIDADE ////////////////// -->
            <section class="publicidade-destaques">
            <?php
            query_posts("orderby=rand&showposts=1&post_type=pub_302_x_285");
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                <a target="_blank"
                   href="<?php echo get_post_meta($post -> ID, "link", true); ?>"
                   title="Publicidade &#8212; <?php echo get_post_meta($post -> ID, "link", true); ?>">

                    <?php if (get_post_meta($post -> ID, "imagem", true)): ?>

                        <section class="imagem carregando">
                            <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="<?php the_title(); ?>">
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

            <section class="sombra"></section>
        </section>

        <section class="widget-webtv">
            <section class="header-widget-webtv">
                <h1>
                    <span>Web <strong>TV</strong></span>
                </h1>
            </section>

            <section class="content-widget-webtv">
                <section class="controles">
                    <input class="anterior" type="button" title="Anterior" value=" ">
                    <input class="proximo" type="button" title="Próximo" value=" ">
                </section>

                <section class="clips">
                    <ul>
                        <?php
                        query_posts("orderby=rand&showposts=10&post_type=video");
                        if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <li>
                            <a target="_blank" href="<?php echo get_post_meta($post -> ID, "link", true); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="<?php the_title(); ?>"/>
                            </a>
                            <section class="titulo-video">
                                <span><?php the_title(); ?></span>
                            </section>
                        </li>
                        <?php endwhile; else: ?>
                            <li>
                                <p>Nenhum vídeo foi publicado ainda.</p>
                            </li>
                        <?php endif; ?>
                    </ul>
                </section>
            </section>

            <section class="chamada-widget-webtv">
                <a target="_blank" href="http://tvmauaeregiao.com.br">
                    Confira os vídeos da <strong>TV Mauá e Região</strong>
                </a>
            </section>

        </section>

        <section class="midias">
            <section class="f-e-f-pub">
                <section class="fatos-e-fotos">
                    <section class="header-fatos-e-fotos">
                        <h1>
                            <span>Fatos <strong>e Fotos</strong></span>
                        </h1>
                    </section>

                    <section class="galerias">
                        <section class="publicidade-destaques">
                            <?php
                            query_posts("order=desc&showposts=4&post_type=fatos_e_fotos");
                            if (have_posts()) : while (have_posts()) : the_post(); ?>

                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <section class="galeria">
                                        <section class="imagens" title="<?php the_title(); ?>">
                                            <section class="imagem">
                                                <img src="<?php echo get_post_meta($post -> ID, "capa_fundo_imagem_maior", true); ?>" alt="<?php the_title(); ?>">
                                            </section>
                                            <section class="subimagem">
                                                <img src="<?php echo get_post_meta($post -> ID, "capa_fundo_imagem_menor", true); ?>" alt="<?php the_title(); ?>">
                                            </section>
                                        </section>
                                        <section class="titulo">
                                            <?php the_title(); ?>
                                        </section>
                                    </section>
                                </a>

                                <?php endwhile; else: ?>

                                    <p>Nenhum evento foi publicado ainda.</p>

                                <?php endif; ?>

                        </section>
                    </section>

                    <!-- //////////////// PUBLICIDADE ////////////////// -->
                    <section class="publicidade-fatos-e-fotos">
                        <?php
                        query_posts("orderby=rand&showposts=2&post_type=pub_350_x_200");
                        if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <a target="_blank"
                               href="<?php echo get_post_meta($post -> ID, "link", true); ?>"
                               title="Publicidade &#8212; <?php echo get_post_meta($post -> ID, "link", true); ?>">

                                <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
                                    <section class="publicidade">
                                        <section class="imagem carregando">
                                            <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="<?php the_title(); ?>">
                                        </section>
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
                    </section>
                    <!-- //////////////// close PUBLICIDADE ////////////////// -->
                </section>
            </section>

            <section class="revista-e-jornal">
                <section class="revista">
                    <section class="header">
                        Revista
                    </section>
                    <section class="decoracao">
                        <section class="linha-grossa"></section>
                        <section class="linha-fina"></section>
                    </section>
                    <section class="issuu-embed">
                        <?php
                        query_posts("showposts=1&post_type=revista");
                        if (have_posts()) : while (have_posts()) : the_post();
                            echo get_post_meta($post -> ID, "iframe-issuu", true);
                        endwhile; else:
                        ?>

                            <p>Nenhuma revista publicada ainda.</p>

                        <?php endif; ?>
                    </section>
                </section>

                <section class="jornal">
                    <section class="header">
                        Jornal
                    </section>
                    <section class="decoracao">
                        <section class="linha-grossa"></section>
                        <section class="linha-fina"></section>
                    </section>
                    <section class="issuu-embed">
                        <?php
                        query_posts("showposts=1&post_type=jornal");
                        if (have_posts()) : while (have_posts()) : the_post();
                            echo get_post_meta($post -> ID, "iframe-issuu", true);
                        endwhile; else:
                        ?>

                            <p>Nenhuma revista publicada ainda.</p>

                        <?php endif; ?>
                </section>
            </section>
        </section>
    </section>

    <section class="outras-noticias">
        <section class="itens">
            <section class="destacadas">
                <section class="destaque">
                    <?php
                    query_posts("order=desc&showposts=1&post_type=noticia_destacada");
                    if (have_posts()) : while (have_posts()) : the_post();
                    ?>

                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <section class="noticia">
                                <section class="imagem carregando">
                                    <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="<?php the_title(); ?>">
                                </section>
                                <section class="informacoes">
                                    <section class="marca">
                                        <span><?php echo get_post_meta($post -> ID, "expressao-chave", true); ?></span>
                                    </section>
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

                </section>

                <section class="outras">
                    <?php
                    query_posts("order=desc&showposts=1&post_type=noticia_dstq_2");
                    if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <section class="noticia">
                                <section class="imagem carregando">
                                    <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="<?php the_title(); ?>">
                                </section>
                                <section class="informacoes">
                                    <section class="marca">
                                        <span><?php echo get_post_meta($post -> ID, "expressao-chave", true); ?></span>
                                    </section>
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

                        <?php endif;
                        query_posts("order=desc&showposts=1&post_type=noticia_dstq_3");
                        if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <section class="noticia">
                                    <section class="imagem carregando">
                                        <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="<?php the_title(); ?>">
                                    </section>
                                    <section class="informacoes">
                                        <section class="marca">
                                            <span><?php echo get_post_meta($post -> ID, "expressao-chave", true); ?></span>
                                        </section>
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

                            <?php
                            query_posts("order=desc&showposts=1&post_type=noticia_dstq_4");
                            if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <section class="noticia">
                                        <section class="imagem carregando">
                                            <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="<?php the_title(); ?>">
                                        </section>
                                        <section class="informacoes">
                                            <section class="marca">
                                                <span><?php echo get_post_meta($post -> ID, "expressao-chave", true); ?></span>
                                            </section>
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

                </section>
            </section>

            <section class="tematicas">
                <section class="noticias">

                    <?php
                    query_posts("order=desc&showposts=3&post_type=noticia");
                    if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <section class="noticia">
                                <section class="header-noticia">
                                    <section class="header">
                                        <?php echo categoria(); ?>
                                    </section>
                                    <section class="decoracao">
                                        <section class="linha-grossa"></section>
                                        <section class="linha-fina"></section>
                                    </section>
                                </section>

                                <section class="imagem carregando">
                                    <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="<?php the_title(); ?>">
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
                </section>
            </section>
        </section>

        <!-- ///////////////// PUBLICIDADE ////////////////// -->
        <section class="publicidades-lateral">
            <section class="header">
                Publicidade
            </section>

            <section class="publicidades">
                <?php
                query_posts("orderby=rand&showposts=4&post_type=pub_210_x_130");
                if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <section class="publicidade">
                        <a target="_blank"
                           href="<?php echo get_post_meta($post -> ID, "link", true); ?>"
                           title="Publicidade &#8212; <?php echo get_post_meta($post -> ID, "link", true); ?>">
                <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
                    <section class="imagem carregando">
                        <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="<?php the_title(); ?>">
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
                </section>
                <?php endwhile; else: ?>

                    <p>ANUNCIE AQUI</p>

                <?php endif; ?>
            </section>
        </section>
        <!-- ///////////////// close PUBLICIDADE ////////////////// -->

        <!-- //////////////// PUBLICIDADE ////////////////// -->
        <section class="strip-publicidade">
        <?php
        query_posts("orderby=rand&showposts=4&post_type=pub_223_x_200");
        if (have_posts()) : while (have_posts()) : the_post(); ?>
            <section class="publicidade">
                <a target="_blank"
                   href="<?php echo get_post_meta($post -> ID, "link", true); ?>"
                   title="Publicidade &#8212; <?php echo get_post_meta($post -> ID, "link", true); ?>">
                    <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
                    <section class="imagem carregando">
                        <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="<?php the_title(); ?>">
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
            </section>
            <?php endwhile; else: ?>

                <p>ANUNCIE AQUI</p>

            <?php endif; ?>
        </section>
        <!-- //////////////// close PUBLICIDADE ////////////////// -->

        </section>
    </section>
</section>

<?php get_footer(); ?>
