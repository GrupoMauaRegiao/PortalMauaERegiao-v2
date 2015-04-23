var PortalMauaERegiao;

PortalMauaERegiao = {};
PortalMauaERegiao.utils = {
  botaoFechar: function() {
    "use strict";

    var overlay,
      modalWindow,
      botao,
      fechar;

    overlay = document.querySelector('.facebook-box-overlay');
    modalWindow = document.querySelector('.facebook-box');
    botao = document.querySelector('.close-bar .close-button');

    if (localStorage.paginaCurtida === 'false' || localStorage.paginaCurtida === undefined) {
      overlay.setAttribute('style', 'display: block');
      modalWindow.setAttribute('style', 'display: block');
    }

    fechar = function() {
      overlay.setAttribute('class', 'facebook-box-overlay close-overlay');
      modalWindow.setAttribute('class', 'facebook-box close-facebook-box');
    };

    botao.addEventListener('click', fechar);

    if (localStorage.paginaCurtida === 'true') {
      fechar();
    }
  },

  controlarExibicaoLikeBox: function() {
    var facebookWidget,
      widget,
      curtir,
      descurtir,
      loading;

    widget = document.querySelector('.widget');
    loadingWidget = document.querySelector('.facebook-widget .loading-widget');

    curtir = function(url, html) {
      localStorage.setItem('paginaCurtida', 'true');
    };

    descurtir = function(url, html) {
      localStorage.setItem('paginaCurtida', 'false');
    };

    loading = function() {
      loadingWidget.setAttribute('class', 'loading-widget hide');
    };

    FB.Event.subscribe('edge.create', curtir);
    FB.Event.subscribe('edge.remove', descurtir);
    FB.Event.subscribe('xfbml.render', loading);
  }
};

PortalMauaERegiao.utils.botaoFechar();

window.onload = function() {
  PortalMauaERegiao.utils.controlarExibicaoLikeBox();
};
