'use strict';
var iduser = localStorage.getItem("iduser");
var idsite = localStorage.getItem("idsite");
var logado = localStorage.getItem("logado");
var site = localStorage.getItem("site");
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
var ip = localStorage.getItem("ip");
var valiuser = localStorage.getItem('iduser');
var validsite = localStorage.getItem('idsite');

var pagina = "";
iduser = localStorage.getItem('iduser');
idsite = localStorage.getItem('idsite');
if (logado != 1) {
    $('#loginErroacessodireto').show();
}
var tokenval = localStorage.getItem("tokenval");
var projectURL = 'http://' + window.location.hostname + ":8000/contact";
var url = 'http://' + window.location.hostname;
var token = tokenval + '&idsite=' + idsite + '&ip=' + ip + "&tipopagamento=boleto";
var thisSearch = null;
var thisNotificationId = null;
var app = angular.module('App', ['thatisuday.dropzone', 'ngLoadingSpinner', 'ngRoute', 'angular-md5']);
app.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            controller: "ContactController",
            templateUrl: "views/contact/contact.html"
        })

    .otherwise({ redirectTo: '/' });
});