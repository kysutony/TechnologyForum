$('body').on("click", 'a:not(.noload)', function(mi){
mi.preventDefault();
url = $(this).attr('href');
load(url, false);
});
var state = {name: location.href, page: document.title};
window.history.pushState(state, document.title, location.href);
$(window).on("popstate", function(){
if (history.state){
load(history.state.name, true);
}
});
function load(link,pop){
$("loadpg").append('<div class="loading-wrapper"> <span class="loading-icon"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> </span></div>');
$.get(link,"", function(data_html){
var title = data_html.split('<title>')[1].split('</title>')[0];
var body = data_html.split('<loadpg>')[1].split('</loadpg>')[0];
$("title").text(title);
$("loadpg").html(body);
if(pop != true){
var state = {name: link, page: title};
window.history.pushState(state, title, link+'');		
}
$('html,body').animate({scrollTop:0},200);
});
}