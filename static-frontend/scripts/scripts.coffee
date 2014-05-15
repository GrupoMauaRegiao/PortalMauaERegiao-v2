Portal = {}

Portal.apps =
  paginador: ->
    $ ($) ->
      paginador = $ '.paginador'
      indice = $ '.indice'
      inputPagina = $ 'input[name="digitar-pagina"]'

      paginador.jPages {
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
        paginador.jPages pagina

      inputPagina.on 'input', _moverParaPagina

do ->
  Portal.apps.paginador()
  return