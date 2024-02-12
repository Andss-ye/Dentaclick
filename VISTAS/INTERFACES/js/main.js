$(document).ready(function(){

	//Mostrar y esconder los menus
	$('.nav-btn-submenu').on('click', function(e){
		e.preventDefault();
		var SubMenu=$(this).next('ul');
		var iconBtn=$(this).children('.fa-chevron-down');
		if(SubMenu.hasClass('show-nav-lateral-submenu')){
			$(this).removeClass('active');
			iconBtn.removeClass('fa-rotate-180');
			SubMenu.removeClass('show-nav-lateral-submenu');
		}else{
			$(this).addClass('active');
			iconBtn.addClass('fa-rotate-180');
			SubMenu.addClass('show-nav-lateral-submenu');
		}
	});

	//Mostrar la barra lateral
	$('.show-nav-lateral').on('click', function(e){
		e.preventDefault();
		var NavLateral=$('.nav-lateral');
		var PageConten=$('.page-content');
		if(NavLateral.hasClass('active')){
			NavLateral.removeClass('active');
			PageConten.removeClass('active');
		}else{
			NavLateral.addClass('active');
			PageConten.addClass('active');
		}
	}); 
});
(function($){
    $(window).on("load",function(){
        $(".nav-lateral-content").mCustomScrollbar({
        	theme:"light-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
        $(".page-content").mCustomScrollbar({
        	theme:"dark-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
    });
})(jQuery);

