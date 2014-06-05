<?php get_header(); ?>

<section class="homepage-noticias">
  <section class="conteudo">
    <section class="noticias">
      <section class="box-com-3">
        <?php query_posts("order=desc&showposts=3&post_type=destaque_esquerda"); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <section class="noticia">
                <section class="imagem">
                  <img src="<?php echo get_post_meta($post -> ID, 'imagem', true); ?>" alt="">
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
          <?php endif; ?>

        <?php endwhile; else: ?>

          <p>Nenhuma notícia publicada ainda.</p>

        <?php endif; ?>

      </section>

      <section class="box-com-1">
        <?php query_posts("order=desc&showposts=1&post_type=destaque_centro"); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <section class="noticia">
                <section class="imagem">
                  <img src="<?php echo get_post_meta($post -> ID, 'imagem', true); ?>" alt="">
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
          <?php endif; ?>

        <?php endwhile; else: ?>

          <p>Nenhuma notícia publicada ainda.</p>

        <?php endif; ?>

      </section>

      <section class="box-com-2">
        <?php query_posts("order=desc&showposts=2&post_type=destaque_direita"); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <section class="noticia">
                <section class="imagem">
                  <img src="<?php echo get_post_meta($post -> ID, 'imagem', true); ?>" alt="">
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
          <?php endif; ?>

        <?php endwhile; else: ?>

          <p>Nenhuma notícia publicada ainda.</p>

        <?php endif; ?>
      </section>
    </section>

    <section class="outros-destaques">
      <section class="header-outros-destaques">
        <h1><span>Outros <strong>Destaques</strong></span></h1>
      </section>
      <section class="box-com-destaques">
        <?php query_posts("order=desc&showposts=1&post_type=outros_destaques&category_name=maua"); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <section class="destaque">
                <section class="imagem">
                  <img src="<?php echo get_post_meta($post -> ID, 'imagem', true); ?>" alt="">
                </section>
                <section class="categoria">
                  Cidade <strong>Mauá</strong>
                </section>
                <section class="decoracao">
                  <section class="linha-grossa"></section>
                  <section class="linha-fina"></section>
                </section>
                <section class="titulo">
                  <h3>
                    <?php the_title(); ?>
                  </h3>
                </section>
              </section>
            </a>

          <?php endif; ?>

        <?php endwhile; else: ?>

          <p>Nenhuma notícia publicada ainda.</p>

        <?php endif; ?>

        <?php query_posts("order=desc&showposts=1&post_type=outros_destaques&category_name=ribeirao-pires"); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php if (get_post_meta($post -> ID, "imagem", true)): ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <section class="destaque">
                <section class="imagem">
                  <img src="<?php echo get_post_meta($post -> ID, 'imagem', true); ?>" alt="">
                </section>
                <section class="categoria">
                  Cidade <strong>Ribeirão Pires</strong>
                </section>
                <section class="decoracao">
                  <section class="linha-grossa"></section>
                  <section class="linha-fina"></section>
                </section>
                <section class="titulo">
                  <h3>
                    <?php the_title(); ?>
                  </h3>
                </section>
              </section>
            </a>

          <?php endif; ?>

        <?php endwhile; else: ?>

          <p>Nenhuma notícia publicada ainda.</p>

        <?php endif; ?>

      </section>

      <!-- ///////////////// PUBLICIDADE ////////////////// -->
      <section class="publicidade-destaques">
        <?php query_posts("order=desc&showposts=1&post_type=pub_302_x_285"); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <a target="_blank" href="<?php echo get_post_meta($post -> ID, "link", true); ?>" title="Publicidade">

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

      <section class="sombra"></section>
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
            <a href="#" title="Inauguração Clínica Infinity Vision">
              <section class="galeria">
                <section class="imagens" title="Inauguração Clínica Infinity Vision">
                  <section class="imagem">
                    <img src="imagens/materias/materia1.jpg" alt="" title="">
                  </section>
                  <section class="subimagem">
                    <img src="imagens/materias/materia2.jpg" alt="" title="">
                  </section>
                </section>
                <section class="titulo">
                  Inauguração Clínica Infinity Vision
                </section>
              </section>
            </a>

            <a href="#" title="Galera curtindo no Rancho do Serjão">
              <section class="galeria">
                <section class="imagens" title="Galera curtindo no Rancho do Serjão">
                  <section class="imagem">
                    <img src="imagens/materias/materia3.jpg" alt="" title="">
                  </section>
                  <section class="subimagem">
                    <img src="imagens/materias/materia4.jpg" alt="" title="">
                  </section>
                </section>
                <section class="titulo">
                  Galera curtindo no Rancho do Serjão
                </section>
              </section>
            </a>

            <a href="#" title="Viagem pela América do Sul Vinicius">
              <section class="galeria">
                <section class="imagens" title="Viagem pela América do Sul Vinicius">
                  <section class="imagem">
                    <img src="imagens/materias/materia5.jpg" alt="" title="">
                  </section>
                  <section class="subimagem">
                    <img src="imagens/materias/materia6.jpg" alt="" title="">
                  </section>
                </section>
                <section class="titulo">
                  Viagem pela América do Sul Vinicius
                </section>
              </section>
            </a>

            <a href="#" title="Inauguração Nova Morada do Vinho">
              <section class="galeria">
                <section class="imagens" title="Inauguração Nova Morada do Vinho">
                  <section class="imagem">
                    <img src="imagens/materias/materia2.jpg" alt="" title="">
                  </section>
                  <section class="subimagem">
                    <img src="imagens/materias/materia7.jpg" alt="" title="">
                  </section>
                </section>
                <section class="titulo">
                  Inauguração Nova Morada do Vinho
                </section>
              </section>
            </a>
          </section>
        </section>

        <!-- //////////////// PUBLICIDADE ////////////////// -->
        <section class="publicidade-fatos-e-fotos">
          <a href="#" title="">
            <section class="publicidade">
              <section class="imagem">
                <img src="#" alt="">
              </section>
            </section>
          </a>

          <a href="#" title="">
            <section class="publicidade">
              <section class="imagem">
                <img src="#" alt="">
              </section>
            </section>
          </a>
        </section>
        <!-- //////////////// close PUBLICIDADE ////////////////// -->
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
            <?php query_posts("showposts=1&post_type=revista"); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

              <?php echo get_post_meta($post -> ID, "iframe-issuu", true); ?>

            <?php endwhile; else: ?>

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

    <section class="outras-noticias">
      <section class="itens">
        <section class="destacadas">
          <section class="destaque">
            <a href="#" title="MH370: navio capta mais 2 sínais no Índico">
              <section class="noticia">
                <section class="imagem">
                  <img src="imagens/materias/materia8.jpg" alt="" title="">
                </section>
                <section class="informacoes">
                  <section class="marca">
                    <span>Malaysia Airlines</span>
                  </section>
                  <section class="titulo">
                    <h2>
                      <span>MH370: navio capta mais 2 sínais no Índico</span>
                    </h2>
                  </section>
                </section>
              </section>
            </a>
          </section>

          <section class="outras">
            <a href="#" title="Argentina amanhece dividida por greve">
              <section class="noticia">
                <section class="imagem">
                  <img src="imagens/materias/materia7.jpg" alt="" title="">
                </section>
                <section class="informacoes">
                  <section class="marca">
                    <span>Greve</span>
                  </section>
                  <section class="titulo">
                    <h2>
                      <span>Argentina amanhece dividida por greve</span>
                    </h2>
                  </section>
                </section>
              </section>
            </a>

            <a href="#" title="Insatisfeitos, médicos e pacientes criam alternativas a plano de saúde">
              <section class="noticia">
                <section class="imagem">
                  <img src="imagens/materias/materia9.jpg" alt="" title="">
                </section>
                <section class="informacoes">
                  <section class="marca">
                    <span>Crise</span>
                  </section>
                  <section class="titulo">
                    <h2>
                      <span>Insatisfeitos, médicos e pacientes criam</span>
                    </h2>
                  </section>
                </section>
              </section>
            </a>

            <!-- ///////////////// PUBLICIDADE ////////////////// -->
            <section class="publicidade">
              <a href="#" title="">
                <section class="imagem">
                  <img src="#" alt="">
                </section>
              </a>
            </section>
            <!-- ///////////////// close PUBLICIDADE ////////////////// -->
          </section>
        </section>

        <section class="tematicas">
          <section class="noticias">
            <a href="#" title="ONU: países de América Latina lideram índice de homicídios no mundo">
              <section class="noticia">
                <section class="header-noticia">
                  <section class="header">
                    Brasil
                  </section>
                  <section class="decoracao">
                    <section class="linha-grossa"></section>
                    <section class="linha-fina"></section>
                  </section>
                </section>

                <section class="imagem">
                  <img src="imagens/materias/materia10.jpg" alt="" title="">
                </section>
                <section class="informacoes">
                  <section class="titulo">
                    <h2>
                      <span>ONU: países de América Latina lideram índice de homicídios no mundo</span>
                    </h2>
                  </section>
                </section>
              </section>
            </a>

            <a href="#" title="Tempo está se esgotando para reduzir aquecimento global, diz estudo da ONU">
              <section class="noticia">
                <section class="header-noticia">
                  <section class="header">
                    Meio Ambiente
                  </section>
                  <section class="decoracao">
                    <section class="linha-grossa"></section>
                    <section class="linha-fina"></section>
                  </section>
                </section>

                <section class="imagem">
                  <img src="imagens/materias/materia11.jpg" alt="" title="">
                </section>
                <section class="informacoes">
                  <section class="titulo">
                    <h2>
                      <span>Tempo está se esgotando para reduzir aquecimento global, diz estudo da ONU</span>
                    </h2>
                  </section>
                </section>
              </section>
            </a>

            <a href="#" title="Facebook vai esconder posts que pedem curtidas e compartilhamentos">
              <section class="noticia">
                <section class="header-noticia">
                  <section class="header">
                    Tecnologia
                  </section>
                  <section class="decoracao">
                    <section class="linha-grossa"></section>
                    <section class="linha-fina"></section>
                  </section>
                </section>

                <section class="imagem">
                  <img src="imagens/materias/materia12.jpg" alt="" title="">
                </section>
                <section class="informacoes">
                  <section class="titulo">
                    <h2>
                      <span>Facebook vai esconder posts que pedem curtidas e compartilhamentos</span>
                    </h2>
                  </section>
                </section>
              </section>
            </a>
          </section>
        </section>
      </section>
      <!-- ///////////////// PUBLICIDADE ////////////////// -->
      <section class="publicidades-lateral">
        <section class="header">
          Publicidade
        </section>

        <section class="publicidades">
          <section class="publicidade">
            <a href="#" title="">
              <section class="imagem">
                <img src="#" alt="">
              </section>
            </a>
          </section>

          <section class="publicidade">
            <a href="#" title="">
              <section class="imagem">
                <img src="#" alt="">
              </section>
            </a>
          </section>

          <section class="publicidade">
            <a href="#" title="">
              <section class="imagem">
                <img src="#" alt="">
              </section>
            </a>
          </section>

          <section class="publicidade">
            <a href="#" title="">
              <section class="imagem">
                <img src="#" alt="">
              </section>
            </a>
          </section>

        </section>
      </section>
      <!-- ///////////////// close PUBLICIDADE ////////////////// -->


      <!-- //////////////// PUBLICIDADE ////////////////// -->
      <section class="strip-publicidade">
        <section class="publicidade">
          <a href="#" title="">
            <section class="imagem">
              <img src="#" alt="">
            </section>
          </a>
        </section>

        <section class="publicidade">
          <a href="#" title="">
            <section class="imagem">
              <img src="#" alt="">
            </section>
          </a>
        </section>

        <section class="publicidade">
          <a href="#" title="">
            <section class="imagem">
              <img src="#" alt="">
            </section>
          </a>
        </section>

        <section class="publicidade">
          <a href="#" title="">
            <section class="imagem">
              <img src="#" alt="">
            </section>
          </a>
        </section>
      </section>
      <!-- //////////////// close PUBLICIDADE ////////////////// -->
    </section>
  </section>
</section>

<?php get_footer(); ?>
