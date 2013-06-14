$(document).ready(function(){

	//expand & collapse sub menu bar
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

	//set sidebar to to match the document height
	document.getElementById('sidebar').style.height = $(document).height() - 380 + "px";

}); 