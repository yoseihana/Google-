$(function(){

$(".delete").on("click", function(event)
	{ 
		var href= $(this).attr("href"); 
		var $this = $(this); 
		$.ajax(
			{ 
				url:href, 
				success: function(data){ 
					$this.parent().parent().parent().fadeOut(1000);} 
				}); 
				event.preventDefault(); 
			}
	); 
})