<section class="menu-mobile">
    <section class="conteudo">
        <section class="menu-conteudo">
            <button class="icon-menu-mobile menu-fechado" name="button"></button>

            <section class="menu-categorias-mobile esconder">
                <section class="itens">
                    <section class="categorias">
                        <section class="lista-categorias">
                            <section class="cidade">
                                <section class="header">
                                    Cidade
                                </section>

                                <section class="lista">
                                    <ul>
                                        <?php echo categorias_sem_title('Cidade'); ?>
                                    </ul>
                                </section>
                            </section>

                            <section class="politica">
                                <section class="header">
                                    Política
                                </section>

                                <section class="lista">
                                    <ul>
                                        <?php echo categorias_sem_title('Política'); ?>
                                    </ul>
                                </section>
                            </section>

                            <section class="e-mais">
                                <section class="header">
                                    E mais
                                </section>

                                <section class="lista">
                                    <ul class="grupo-1">
                                        <?php echo categorias_sem_title('Mais Grupo 1'); ?>
                                    </ul>
                                    <ul class="grupo-2">
                                        <?php echo categorias_sem_title('Mais Grupo 2'); ?>
                                    </ul>
                                    <ul class="grupo-3">
                                        <?php echo categorias_sem_title('Mais Grupo 3'); ?>
                                    </ul>
                                </section>
                            </section>
                        </section>
                    </section>

                    <section class="entretenimento">
                        <section class="header">
                            <section class="titulo">
                                Entretenimento
                            </section>
                            <section class="seta"></section>
                        </section>

                        <section class="lista-entretenimento">
                            <section class="cidade">
                                <section class="header"></section>
                                <section class="lista">
                                    <ul>
                                        <li><a href="<?php bloginfo('url') ?>/secao/agenda">Agenda</a></li>
                                        <li><a href="<?php bloginfo('url') ?>/secao/colunistas">Colunistas</a></li>
                                        <li><a href="<?php bloginfo('url') ?>/secao/fatos-e-fotos">Fatos e Fotos</a></li>
                                        <li><a target="_blank" href="http://tvmauaeregiao.com.br/categorias/programas/rapidinha/?canal=1">Rapidinha</a></li>
                                        <li><a target="_blank" href="http://tvmauaeregiao.com.br/categorias/programas/entrevista/?canal=1">Entrevistas</a></li>
                                    </ul>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>

        <a href="<?php bloginfo('url'); ?>">
          <section class="logotipo"></section>
        </a>

        <section class="busca">
            <button class="icon-menu-mobile-busca" name="button"></button>
            <form method="get" action="/" class="esconder">
                <input type="text" name="s" placeholder="Procurar">
            </form>
        </section>

    </section>
</section>
