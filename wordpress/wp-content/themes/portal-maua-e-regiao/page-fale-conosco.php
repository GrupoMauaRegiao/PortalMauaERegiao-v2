<?php get_header(); ?>

<section class="ultimas-noticias">
    <section class="layout-ultimas-noticias">
        <section class="conteudo">
            <section class="principal">
                <section class="header">
                    <section class="titulo categoria">
                        Fale <strong>conosco</strong>
                    </section>
                    <section class="decoracao">
                        <section class="linha-grossa"></section>
                        <section class="linha-fina"></section>
                    </section>
                </section>

                <section class="fale-conosco-chamada">
                    <p>
                        Tem alguma dúvida, sugestão ou crítica? Então entre em contato com a gente. Sua opinião é fundamental para nosso aperfeiçoamento.
                    </p>
                </section>

                <section class="fale-conosco">
                    <section class="formulario-fale-conosco">
                        <section class="mensagem-sucesso esconder">
                            <p>
                                Obrigado!<br>
                                Sua mensagem foi enviada com sucesso.
                            </p>
                        </section>
                        <form action="<?php bloginfo('template_url'); ?>/enviar-mensagem.php">
                            <section class="nome">
                                <input id="nome"
                                       name="nome"
                                       type="text"
                                       placeholder="Nome"
                                       required>
                            </section>

                            <section class="email">
                                <input id="email"
                                       name="email"
                                       type="email"
                                       placeholder="E-mail"
                                       required>
                            </section>

                            <section class="assunto">
                                <input id="assunto"
                                       name="assunto"
                                       type="text"
                                       placeholder="Assunto"
                                       required>
                            </section>

                            <section class="mensagem">
                                <textarea id="mensagem"
                                          name="mensagem"
                                          placeholder="Mensagem">
                                </textarea>
                            </section>

                            <section class="botoes">
                                <input id="enviar"
                                       name="enviar"
                                       type="submit"
                                       value="_Enviar">
                                <input id="apagar"
                                       name="apagar"
                                       type="button"
                                       value="_Apagar">
                            </section>
                        </form>
                    </section>

                    <section class="redes-sociais">
                        <section class="decoracao">
                            <section class="linha"></section>
                        </section>
                        <section class="icones">
                            <a href="https://www.facebook.com/
                    pages/Portal-Mau%C3%A1-e-Regi%C3%A3o/359211450756546?fref=ts"
                               target="_blank"
                               title="Facebook">
                               <section class="icone"></section>
                            </a>

                            <a href="https://twitter.com/tvmauaeregiao"
                               target="_blank"
                               title="Twitter">
                               <section class="icone"></section>
                            </a>

                            <a href="https://www.youtube.com/channel/UC78ysBoZL1FwD4Nn8Gl6E3g"
                                target="_blank"
                                title="Youtube">
                                <section class="icone"></section>
                            </a>
                        </section>
                    </section>

                    <section class="informacoes-contato">
                        <section class="telefone">
                            +55 11 4513 1591 | 4513 2200
                        </section>

                        <section class="email">
                            <a href="mailto:atendimento@grupomaua.com.br">
                                atendimento@grupomaua.com.br
                            </a>
                        </section>
                    </section>
                </section>
            </section>

            <section class="lateral">
                <section class="header">
                    <section class="titulo">
                        Ajuda
                    </section>
                    <section class="decoracao">
                        <section class="linha-grossa"></section>
                        <section class="linha-fina"></section>
                    </section>
                </section>

                <section class="conteudo-ajuda">
                    <p>
                        No que mais podemos te auxiliar?
                    </p>

                    <h2>Anúncios</h2>

                    <p>
                        Quer fazer parte de nosso time de parceiros? Então descubra aqui as vantagens em anunciar com quem entende do assunto!
                    </p>

                    <h2>Navegação</h2>

                    <p>
                        Oferecemos o que há de mais contemporâneo em navegabilidade: o HTML 5 para facilitar seu dia a dia em nosso Portal. Se houver algo que possamos aprimorar ou se você  está com alguma dúvida basta preencher os campos ao lado que iremos lhe auxiliar com prazer.
                    </p>

                    <h2>Busca</h2>

                    <p>
                        Nossa busca realiza um varredura geral em nossa base de dados, a fim de lhe fornecer tudo que necessitar em sua navegação. Se houver alguma dúvida ou algum problema em nossas ferramentas, por favor, nos comunique por meio do formulário ao lado.
                    </p>
                </section>
            </section>
        </section>
    </section>
</section>

<?php get_footer(); ?>
