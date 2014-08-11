<?php get_header(); ?>
<?php wp_reset_query(); ?>
<?php $autor = get_user_by("slug", get_query_var("author_name")); ?>

<section class="ultimas-noticias">
    <section class="layout-ultimas-noticias">
        <section class="conteudo">
            <section class="principal">
                <section class="header">
                    <section class="titulo categoria">
                        Colunista
                    </section>
                    <section class="decoracao">
                        <section class="linha-grossa"></section>
                        <section class="linha-fina"></section>
                    </section>
                </section>

                <section class="perfil-colunista">
                    <section class="perfil">
                        <section class="imagem">
                            <?php echo get_avatar($autor -> ID, 140); ?>
                        </section>
                        <section class="nome">
                            <?php echo $autor -> first_name . " " . $autor -> last_name; ?>
                        </section>
                        <section class="categoria">
                            <?php echo $autor -> categoria; ?>
                        </section>
                        <section class="biografia">
                            <?php echo $autor -> description; ?>
                        </section>
                    </section>

                    <section class="ultimas-publicacoes">
                        <section class="header">
                            Últimas publicações
                        </section>
                        <section class="publicacoes">
                            <?php
                            query_posts(query_colunista($autor -> ID));
                            if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <section class="publicacao">
                                    <section class="horario">
                                        <?php echo mostrar_tempo_transcorrido(); ?>
                                    </section>
                                    <section class="titulo-artigo">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </section>
                                </section>
                            <?php endwhile; else: ?>
                                <section class="publicacao">
                                    <p>Nenhum conteúdo foi publicado ainda.</p>
                                </section>
                            <?php endif; ?>
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
                    </section>
                </section>
            </section>

            <?php get_sidebar(); ?>

        </section>
    </section>
</section>

<?php get_footer(); ?>
