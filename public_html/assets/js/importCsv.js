$(document).ready(function(){
    $('#upload_csv').on("submit", function(e){
        if (confirm('Are You sure You want to import the selected file?')) {
            e.preventDefault(); //form will not submitted
            $.ajax({
                url:"./ajax-end-point/import.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success: function(data){
                    if (data=='Error1')
                    {
                        alert("Invalid File");
                    }
                    else if (data == "Error2")
                    {
                        alert("Please Select File");
                    }
                    else
                    {
                        $('#csv_table').html(data);
                    }
                }
            })
        }
    });
});