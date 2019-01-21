$(document).ready(function(){
	var userFeed=new Instafeed({
		get: 'user',
		userId:'6500966040',
		limit:12,
		resolution: 'standard_resolution',
 
        accessToken: ''
		sortBy:'most-recent',
		template:'<div class="gallery"><a href="{{image}}" title="{{caption}}" target="_blank"><img scr="{{image}}" alt="{{caption}}" class="img-fluid"/></a></div>',
		
	});
	userFeed.run();
});
