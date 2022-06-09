//REVISAR SIEMPRE LA COMPARACION EN ESTA OCACION SE AGREGO UN #
var url = window.location;
//  console.log(url);
$('ul.nav a').filter(function () {
//console.log(this.href);
   return this.href+'#' == url;
}).parents('li').addClass('nav-expanded nav-active');

