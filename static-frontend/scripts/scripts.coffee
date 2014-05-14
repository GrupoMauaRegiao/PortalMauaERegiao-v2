Portal = {}

Portal.apps =
  paginador: ->
    $ ->
      paginador = $ '.paginador'
      indice = $ '.indice'
      inputPagina = $ 'input[name="digitar-pagina"]'

      paginador.jPages {
        containerID: 'chamadas',
        perPage: 5,
        startPage: 1,
        startRange: 5,
        midRange: 5,
        endRange: 5,
        first: '.primeira',
        last: '.ultima',
        next: '.proxima',
        previous: '.anterior'
        callback: (pages, items) ->
          indice.html('Página ' + pages.current + ' de ' + pages.count)
          return
      }

      _moverParaPagina = ->
        pagina = parseInt(inputPagina.val())
        paginador.jPages pagina
        return

      inputPagina.on 'input', _moverParaPagina
      return
    return

do ->
  Portal.apps.paginador()
  return