/**
 * Created with JetBrains PhpStorm.
 * User: annabelle
 * Date: 23/10/12
 * Time: 11:03
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $(".delete").on("click", function(event){
        var href= $(this).attr("href");
        var $this = $(this);
        console.log(href);
        $.ajax({
            url:href,
            success: function(data){
                console.log($this.parent());
                $this.parent().text(data).fadeOut(5000);
            }
        });
        event.preventDefault();
    });

})