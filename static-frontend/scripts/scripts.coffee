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

  geolocation: ->
    _localizar = ->
      containerTemperatura = $ '.temperatura'
      containerLocalidade = $ '.localidade'

      containerTemperatura.html 'Obtendo informações...'

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

            containerTemperatura.html tempMax.toFixed() + '°, ' + tempMin.toFixed() + '° '
            containerLocalidade.html cidade
        return

    _localizar()
    return

do ->
  Portal.apps.paginador()
  Portal.apps.enviarEmail()
  Portal.apps.limparFormularioContato()
  Portal.apps.geolocation()
  return