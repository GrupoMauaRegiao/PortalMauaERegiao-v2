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
                        Fatos e Fotos
                    </section>
                    <section class="decoracao">
                        <section class="linha-grossa"></section>
                        <section class="linha-fina"></section>
                    </section>
                </section>

                <article class="materia">
                    <section class="data">
                        <?php the_date(); ?>
                    </section>

                    <section class="titulo">
                        <?php the_title(); ?>
                    </section>

                    <section class="creditos">
                        Por <strong>Portal Mauá e Região</strong>
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
