Portal = {}

Portal.apps =
  paginador: ->
    # Cria paginador para página onde constará todas as notícias do Portal.

    paginas = $ '.paginador'

    if paginas[0]
      indice = $ '.indice'
      inputPagina = $ 'input[name="digitar-pagina"]'

      paginas.jPages {
        container: '.chamadas'
        perPage: 5
        startRange: 1
        endRange: 1
        first: '.primeira'
        last: '.ultima'
        next: '.proxima'
        previous: '.anterior'
        callback: (paginas, itens) ->
          if paginas.count >= 1
            mostrarIndice = ->
              indice.html('Página ' + paginas.current + ' de ' + paginas.count)

            controlarExibicaoPaginador = ->
              containerPaginador = $ '.paginacao'
              if itens.count > 5
                containerPaginador.show()
              else
                containerPaginador.hide()

            mostrarIndice()
            controlarExibicaoPaginador()
          return
      }

      _moverParaPagina = ->
        pagina = parseInt(inputPagina.val())
        paginas.jPages pagina

      inputPagina.on 'input', _moverParaPagina

  enviarEmail: ->
    # Efetua a validação dos campos e executa o envio das mensagens com método
    # GET a partir de um formulário HTML.

    formulario = $ '.formulario-fale-conosco form'

    if formulario
      cNome = $ '#nome'
      cEmail = $ '#email'
      cAssunto = $ '#assunto'
      cMsg = $ '#mensagem'
      msgSucesso = $ '.mensagem-sucesso'
      botao = $ '#enviar'

      botao.on 'click', (evt) ->
        xhr = new XMLHttpRequest()
        regexEmail = ///
            ^([a-zA-Z0-9_\.\-])
            +\@(([a-zA-Z0-9\-])
            +\.)+([a-zA-Z0-9]{2,4})+$
        ///
        msg = ''

        if cNome.value isnt ''
          if cEmail.value isnt '' and cEmail.value.match(regexEmail) isnt null
            if cMsg.value isnt ''
              msg += 'nome=' + encodeURI(cNome.value)
              msg += '&email=' + encodeURI(cEmail.value)
              msg += '&assunto=' + encodeURI(cAssunto.value)
              msg += '&mensagem=' + encodeURI(cMsg.value)

              xhr.open formulario.method, formulario.action + '?' + msg, true
              xhr.send msg
              xhr.onreadystatechange = ->
                if xhr.readyState is 4 and xhr.status is 200
                  formulario.style.display = 'none'
                  msgSucesso.setAttribute 'class', 'mensagem-sucesso exibir'
            else
              cMsg.focus()
              cMsg.setAttribute 'class', 'erro'
          else
            cEmail.focus()
            cEmail.setAttribute 'class', 'erro'
        else
          cNome.focus()
          cNome.setAttribute 'class', 'erro'

        evt.preventDefault()
        evt.stopPropagation()
        return

  limparFormularioContato: ->
    # Apaga todos os campos do formulario de contato [página Fale Conosco].

    formulario = $ '.formulario-fale-conosco form'
    if formulario
      cNome = $ '#nome'
      cEmail = $ '#email'
      cAssunto = $ '#assunto'
      cMsg = $ '#mensagem'
      botao = $ '#apagar'

      _apagar = ->
        cNome.value = ''
        cEmail.value = ''
        cAssunto.value = ''
        cMsg.value = ''
        return

      botao.on 'click', _apagar

  removerAcentos: (texto) ->
    mapa =
        a : /[\xE0-\xE6]/g
        e : /[\xE8-\xEB]/g
        i : /[\xEC-\xEF]/g
        o : /[\xF2-\xF6]/g
        u : /[\xF9-\xFC]/g
        c : /\xE7/g
        n : /\xF1/g

    for letra of mapa
      texto = texto.replace mapa[letra], letra
    texto

  diminuirTexto: (texto, max) ->
    indicador = "…"

    if texto.length >= max
      novoTexto = texto.substring 0, max
      if novoTexto.charAt(novoTexto.length - 1) is ' '
        novoTexto = novoTexto.substring 0, max - 1
      texto = novoTexto + indicador
    else
      texto = texto
    texto

  obterPrevisaoDoTempo: (cidade) ->
    container = $ '.elementos'
    imagemLoading = $ '.loading'
    icone = $ '.previsao-do-tempo .icone'
    containerTemperatura = $ '.temperatura'
    containerLocalidade = $ '.localidade'

    _converterBeauFort = (velocidade) ->
      tipoVento =
          'calmo': 'calmo'
          'aragem': 'aragem'
          'brisaLeve': 'brisa leve'
          'brisaFraca': 'brisa fraca'
          'brisaModerada': 'brisa moderada'
          'brisaForte': 'brisa forte'
          'ventoFresco': 'vento fresco'
          'ventoForte': 'vento forte'
          'ventania': 'ventania'
          'ventaniaForte': 'ventania forte'
          'tempestade': 'tempestade'
          'tempestadeViolenta': 'tempestade violenta'
          'furacao': 'furacão'

      if velocidade < 0.3
        vento = tipoVento.calmo
      else if velocidade is 0.3 or velocidade <= 1.5
        vento = tipoVento.aragem
      else if velocidade is 1.6 or velocidade <= 3.3
        vento = tipoVento.brisaLeve
      else if velocidade is 3.4 or velocidade <= 5.4
        vento = tipoVento.brisaFraca
      else if velocidade is 5.5 or velocidade <= 7.9
        vento = tipoVento.brisaModerada
      else if velocidade is 8.0 or velocidade <= 10.7
        vento = tipoVento.brisaForte
      else if velocidade is 10.8 or velocidade <= 13.8
        vento = tipoVento.ventoFresco
      else if velocidade is 13.9 or velocidade <= 17.1
        vento = tipoVento.ventoForte
      else if velocidade is 17.2 or velocidade <= 20.7
        vento = tipoVento.ventania
      else if velocidade is 20.8 or velocidade <= 24.4
        vento = tipoVento.ventaniaForte
      else if velocidade is 24.5 or velocidade <= 28.4
        vento = tipoVento.tempestade
      else if velocidade is 28.5 or velocidade <= 32.6
        vento = tipoVento.tempestadeViolenta
      else if velocidade >= 32.7
        vento = tipoVento.furacao
      vento

    # Obtém informações sobre o clima conforme a cidade
    $.ajax {
      url: 'http://api.openweathermap.org/data/2.5/weather?' +
          'q=' + Portal.apps.removerAcentos(cidade) + ',brasil&' +
          'units=metric&' +
          'lang=pt'
      dataType: 'json'
    }
    .done (dados) ->
      cidade = dados.name
      cidadeCompacto = Portal.apps.diminuirTexto cidade, 5
      tempMax = dados.main.temp_max.toFixed()
      tempMin = dados.main.temp_min.toFixed()
      codIcone = dados.weather[0].icon
      clima = dados.weather[0].description
      vento = dados.wind.speed
      urlIcone = 'http://openweathermap.org/img/w/' + codIcone + '.png'

      # Corrige temperatura quando ambas (máxima e mínima) forem iguais
      if tempMin is tempMax
        tempMin = tempMin - 1

      icone.css 'background', 'url(' + urlIcone + ') no-repeat'
      container.attr 'title', 'Descrição: ' + clima.toLowerCase() +
                              ' com ' + _converterBeauFort(vento) +
                              ' em ' + cidade + '.' +
                              ' Máxima: ' + tempMax + '°,' +
                              ' Mínima: ' + tempMin + '°'
      containerTemperatura.html tempMax + '°, ' + tempMin + '° '
      containerLocalidade.html cidadeCompacto

      imagemLoading.addClass 'esconder'
      container.removeClass 'esconder'

      _exibirNomeCompletoCidade = (e) ->
        containerLocalidade.html cidade

      _exibirNomeCompactoCidade = (e) ->
        containerLocalidade.html cidadeCompacto

      containerLocalidade.on 'mouseenter', _exibirNomeCompletoCidade
      containerLocalidade.on 'mouseleave', _exibirNomeCompactoCidade
      return

  previsaoDoTempo: ->
    # Implementa previsão do tempo no header da página com:
    # Temperatura máxima e mínima e vento, segundo a Escala de Beaufort.
    # Fonte da escala: http://pt.wikipedia.org/wiki/Escala_de_Beaufort

    _adicionarPrevisaoDoTempo = ->
      _success = (posicao) ->
        # Obtém a latitude e a longitude
        lt = posicao.coords.latitude
        lg = posicao.coords.longitude

        # Obtém o nome da cidade conforme a latitude e a longitude
        $.ajax {
          url: 'http://maps.googleapis.com/maps/api/geocode/json?' +
               'latlng=' + lt + ',' + lg
          dataType: 'json'
        }
        .done (dados) ->
          cidade = dados.results[0].address_components[3].short_name
          Portal.apps.obterPrevisaoDoTempo cidade
        return

      _error = (erro) ->
        Portal.apps.obterPrevisaoDoTempo 'Maua'

      _options =
        maximumAge: 75000

      navigator.geolocation.getCurrentPosition _success, _error, _options

    _adicionarPrevisaoDoTempo()
    return

  corrigirTamanhoImagemDestaque: ->
    imagens = $ '.box-com-3 .noticia .imagem img'

    if imagens[0]
      for item in imagens
        if $(item).width() < 302
          $(item).css 'width', '302px'

  limitarCaracteresTitulos: (limite) ->
    textoTitulo = document.title

    jQuery('[name="post_title"]').on 'keyup', ->
      $this = jQuery this
      document.title = '(' + $this.val().length +
                       ' de ' + limite + ' caracteres) ' + textoTitulo

      if $this.val().length > limite
        $this.val $this.val().substr 0, limite

  adicionarAtributoLightbox: ->
    links = $ '.texto div a, .texto p a'

    if links[0]
      titulo = $ 'article .titulo'

      for link, i in links
        $(link).attr 'data-lightbox', 'roadtrip'
        $(link).attr 'data-title', titulo.text()

window.onload = ->
  Portal.apps.paginador()
  Portal.apps.enviarEmail()
  Portal.apps.limparFormularioContato()
  Portal.apps.previsaoDoTempo()
  Portal.apps.corrigirTamanhoImagemDestaque()
  Portal.apps.adicionarAtributoLightbox()
  return
