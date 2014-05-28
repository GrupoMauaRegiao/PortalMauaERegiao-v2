Portal = {}

Portal.apps =
  paginador: ->
    # Cria paginador para página onde constará todas as notícias do Portal.

    $ ->
      paginas = $ '.paginador'

      if paginas.length
        indice = $ '.indice'
        inputPagina = $ 'input[name="digitar-pagina"]'

        paginas.jPages {
          containerID: 'chamadas'
          perPage: 5
          startRange: 5
          endRange: 5
          first: '.primeira'
          last: '.ultima'
          next: '.proxima'
          previous: '.anterior'
          callback: (paginas, itens) ->
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

    formulario = document.querySelector '.formulario-fale-conosco form'

    if formulario
      cNome = document.querySelector '#nome'
      cEmail = document.querySelector '#email'
      cAssunto = document.querySelector '#assunto'
      cMsg = document.querySelector '#mensagem'
      msgSucesso = document.querySelector '.mensagem-sucesso'
      botao = document.querySelector '#enviar'

      botao.addEventListener 'click', (evt) ->
        xhr = new XMLHttpRequest()
        regexEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
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

    formulario = document.querySelector '.formulario-fale-conosco form'

    if formulario
      cNome = document.querySelector '#nome'
      cEmail = document.querySelector '#email'
      cAssunto = document.querySelector '#assunto'
      cMsg = document.querySelector '#mensagem'
      botao = document.querySelector '#apagar'

      _apagar = ->
        cNome.value = ''
        cEmail.value = ''
        cAssunto.value = ''
        cMsg.value = ''
        return

      botao.addEventListener 'click', _apagar

  previsaoDoTempo: ->
    # Implementa previsão do tempo no header da página com:
    # Temperatura máxima e mínima e vento, segundo a Escala de Beaufort.
    # Fonte da escala: http://pt.wikipedia.org/wiki/Escala_de_Beaufort

    converterBeauFort = (velocidade) ->
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

    _adicionarPrevisaoDoTempo = ->
      container = $ '.elementos'
      imagemLoading = $ '.loading'
      icone = $ '.previsao-do-tempo .icone'
      containerTemperatura = $ '.temperatura'
      containerLocalidade = $ '.localidade'

      navigator.geolocation.getCurrentPosition (posicao) ->
        # Obtém a latitude e a longitude
        lt = posicao.coords.latitude
        lg = posicao.coords.longitude

        # Obtém o nome da cidade conforme a latitude e a longitude
        $.getJSON 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' + lt + ',' + lg, (dados) ->
          cidade = dados.results[0].address_components[3].short_name

          # Obtém informações sobre o clima conforme a cidade
          $.getJSON 'http://api.openweathermap.org/data/2.5/weather?q=' + cidade + '&units=metric&lang=pt', (dados) ->
            cidade = dados.name
            tempMax = dados.main.temp_max
            tempMin = dados.main.temp_min
            codIcone = dados.weather[0].icon
            clima = dados.weather[0].description
            vento = dados.wind.speed

            # Corrige português de Portugal
            if clima is 'nuvens quebrados'
              clima = 'nuvens quebradas'

            icone.css 'background', 'url("http://openweathermap.org/img/w/' + codIcone + '.png") no-repeat'
            container.attr 'title', 'Descrição: ' + clima + ' com ' + converterBeauFort vento
            containerTemperatura.html tempMax.toFixed() + '°, ' + tempMin.toFixed() + '° '
            containerLocalidade.html cidade

            imagemLoading.addClass 'esconder'
            container.removeClass 'esconder'
        return

    _adicionarPrevisaoDoTempo()
    return

do ->
  Portal.apps.paginador()
  Portal.apps.enviarEmail()
  Portal.apps.limparFormularioContato()
  Portal.apps.previsaoDoTempo()
  return