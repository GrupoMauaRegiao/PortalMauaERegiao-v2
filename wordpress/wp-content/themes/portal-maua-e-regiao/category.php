<?php get_header(); ?>
<?php wp_reset_query(); ?>

<section class="ultimas-noticias">
    <section class="layout-ultimas-noticias">
        <section class="conteudo">
            <section class="principal">
                <section class="header">
                    <section class="titulo">
                        <?php echo single_cat_title(); ?>
                    </section>
                    <section class="decoracao">
                        <section class="linha-grossa"></section>
                        <section class="linha-fina"></section>
                    </section>
                </section>

                <section class="noticias">
                    <section class="chamadas">
                        <?php
                        $slug = slug();
                        query_posts(query_todas_noticias($slug));

                        if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <section class="chamada">
                                    <section class="imagem">
                                        <section class="foto-materia">
                                            <img src="<?php echo get_post_meta($post -> ID, "imagem", true); ?>" alt="">
                                        </section>
                                        <section class="corte"></section>
                                    </section>

                                    <section class="titulo">
                                        <section class="header">
                                            <section class="decoracao">
                                                <section class="linha"></section>
                                            </section>
                                            <section class="categoria">
                                                <?php echo categoria(); ?>
                                            </section>
                                            <section class="horario" title="<?php echo get_the_time('j \d\e F \d\e Y'); ?>">
                                                <?php echo mostrar_tempo_transcorrido(); ?>
                                            </section>
                                        </section>

                                        <section class="texto">
                                            <?php the_title(); ?>
                                        </section>
                                    </section>
                                </section>
                            </a>
                            <?php endwhile; else: ?>

                                <p>Nenhuma notícia foi publicada ainda.</p>

                            <?php endif; ?>
                    </section>
                </section>

                <section class="paginacao">
                    <section class="indice"></section>
                    <section class="elementos">
                        <section class="paginador"></section>
                    </section>
                    <section class="controles">
                        <section title="Primeira"
                                 class="primeira">Primeira</section>
                        <section title="Anterior"
                                 class="anterior">Anterior</section>
                        <section title="Próxima"
                                 class="proxima">Próxima</section>
                        <section title="Última"
                                 class="ultima">Última</section>
                        <section class="input-pagina">
                            <input type="number"
                                   name="digitar-pagina"
                                   placeholder="Digite o número"
                                   max="99999"
                                   min="1">
                        </section>
                    </section>
                </section>

                <!-- ///////////////// PUBLICIDADE ////////////////// -->
                <section class="publicidade">
                    <?php include "loop-pub_630_x_200.php"; ?>
                </section>
                <!-- ///////////////// close PUBLICIDADE ////////////////// -->
            </section>

            <?php get_sidebar("mais-noticias"); ?>

        </section>
    </section>
</section>

<?php get_footer(); ?>
