$(function(){
    $(".delete").on("click", function(event){
        alert('ok');

        var href= $(this).attr("href");

        var $this = $(this);
        console.log(href);
        $.ajax({
            url:href,
            success: function(data){

                $this.parent().text(data).fadeOut(5000);
            }
        });
        event.preventDefault();
    });
})