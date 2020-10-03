$(function() {
    $(".remove").click(function(){
        var element = $(this);
        var info= element.attr("id");
        var $tr = element.closest('tr');


            $.ajax({
                type: "POST",
                url: "./ajax-end-point/remove.php",
                data: {id: info},
                success: function(){
                    $tr.find('td').fadeOut(1000,function(){
                        $tr.remove();
                    });
                }
            });

        return false;
    });
});