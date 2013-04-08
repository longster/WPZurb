$(document).ready(function(){
	(function(a){
		a(function(){
			a(".toggle-nav").on("click",function(b){
				var c=a(b.currentTarget);
				c.hasClass("open")?(c.removeClass("open"),
				a("#navdrop").slideUp(400)):(c.addClass("open"),
				a("#navdrop").slideDown(400))
				}
			)}
		)}
	)(jQuery);
}); 