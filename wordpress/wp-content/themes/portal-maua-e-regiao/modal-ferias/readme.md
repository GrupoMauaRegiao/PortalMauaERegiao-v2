# Modal de férias (600 x 300)

Adiciona um `modal` -- 600 x 300 -- com um banner (pasta de imagens: `mensagem-manutencao-ferias.jpg`) e um botão de fechar.

## PHP

```php
<!-- MODAL Happy New Year, Merry Christmas -->
<section class="overlay"></section>

<section class="modal-vacation">
    <section class="close-button">
        &#10006;
    </section>

    <section class="image">
        <img src="<?php bloginfo('template_url') ?>/imagens/mensagem-manutencao-ferias.jpg" alt="">
    </section>
</section>
```

## JS ou CoffeeScript

```coffee
fecharMensagem = ->
    overlay = $ '.overlay'
    mensagem = $ '.modal-vacation'
    botaoX = $ '.modal-vacation .close-button'

    if botaoX[0]
      botaoX.on 'click', ->
        overlay.css 'display', 'none'
        mensagem.css 'display', 'none'

fecharMensagem()
```

## CSS ou SASS

```sass
.overlay
  display: block
  position: fixed
  z-index: 1
  width: 100%
  height: 100%
  background: rgba(0, 0, 0, 0.5)

.modal-vacation
  position: fixed
  display: block
  top: 17%
  left: 50%
  margin-left: -300px
  z-index: 1

  .close-button
    padding: 5px 0 0
    font-size: 10px
    background: rgb(255, 255, 255)
    float: right
    width: 20px
    cursor: pointer
    text-align: center

  .image
    img
      border: 5px solid rgb(255, 255, 255)
```
