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

                <section class="itens-colunistas">
                    <section class="publicidade-destaques">
                        <?php
                        // IDs dos não-colunistas
                        $marcker      = 1;
                        $leonardo     = 2;
                        $vinipinheiro = 3;
                        $autores      = get_users("orderby=nicename&exclude=$marcker,$leonardo,$vinipinheiro");
                        foreach ($autores as $autor ) {
                        ?>
                            <a href="<?php echo get_author_posts_url($autor -> ID); ?>"
                               title="<?php echo 'Colunista ' . $autor -> first_name . ' ' . $autor -> last_name; ?>">
                                <section class="galeria">
                                    <section class="categoria">
                                        <?php echo $autor -> categoria; ?>
                                    </section>
                                    <section class="imagens"
                                             title="<?php echo 'Colunista ' . $autor -> first_name . ' ' . $autor -> last_name; ?>">
                                        <section class="imagem">
                                            <?php echo get_avatar($autor -> ID); ?>
                                        </section>
                                    </section>
                                    <section class="titulo">
                                        <h3><?php echo $autor -> first_name; ?> <?php echo $autor -> last_name; ?></h3>
                                    </section>
                                </section>
                            </a>
                        <?php
                        }
                        ?>
                    </section>
                </section>
            </section>

            <?php get_sidebar(); ?>

        </section>
    </section>
</section>

<?php get_footer(); ?>
