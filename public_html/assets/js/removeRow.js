$(document).on('click','.remove', function() {
    var element = $(this);
    var info= element.attr("id");
    var $tr = element.closest('tr');
    if (confirm('Are You sure You want to remove this?')) {
        $.ajax({
            type: "POST",
            url: "./ajax-end-point/remove.php",
            data: {id: info},
            success: function(){
                console.log(info);
                $tr.find('td').fadeOut(1000,function(){
                    $tr.remove();
                });
            }
        });
    }

    return false;
});
