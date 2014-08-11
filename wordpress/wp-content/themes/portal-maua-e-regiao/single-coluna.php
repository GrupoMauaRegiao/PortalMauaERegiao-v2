<?php
get_header();
wp_reset_query();
?>

<section class="ultimas-noticias">
    <section class="layout-ultimas-noticias">
        <section class="conteudo">
            <section class="principal">
                <section class="header">
                    <section class="titulo categoria">
                        <?php echo categoria(); ?>
                    </section>
                    <section class="decoracao">
                        <section class="linha-grossa"></section>
                        <section class="linha-fina"></section>
                    </section>
                </section>

                <article class="materia">
                    <section class="data">
                        Publicado às <?php the_time('G\hi'); ?> &#8212; <?php the_date(); ?>
                    </section>

                    <section class="titulo">
                        <?php the_title(); ?>
                    </section>

                    <section class="resumo">
                        <?php the_excerpt(); ?>
                    </section>

                    <section class="creditos">
                        Por <strong title="<?php the_author_meta("user_email"); ?>"><?php the_author_meta("user_firstname"); ?> <?php the_author_meta("user_lastname"); ?></strong>
                    </section>

                    <?php include "icones-social.php"; ?>

                    <section class="texto">
                        <?php the_content(); ?>
                    </section>
                </article>

                <!-- ///////////////// PUBLICIDADE ////////////////// -->
                <section class="publicidade">

                    <?php include "loop-pub_630_x_200.php"; ?>

                </section>
                <!-- ///////////////// close PUBLICIDADE ////////////////// -->
            </section>

            <?php get_sidebar(); ?>

        </section>
    </section>
</section>

<?php get_footer() ?>
