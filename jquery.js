$(document).ready(function(){
                //Load table

function Loadtable(){
                    $.ajax({
                        url:"load-data.php",
                        type:"POST",
                        success:function(data){
                            $("#table-data").html(data);
                        }
                    })
                }
Loadtable();


                //upload FORM data

    $('#upload-form').on("submit",function (e){
        e.preventDefault();
        var formData = new FormData(this);
        
        $.ajax({
            url: "uploads.php",                         
            type: 'POST',
            data: formData,
            contentType: false, // Don't set contentType
            processData: false, // Don't process data
            success: function (response) {
                if (response.trim() === "Email already exists") {
                    alert("Email already exists");
                }
                let modal = bootstrap.Modal.getInstance(document.getElementById('Modal'));
                document.activeElement.blur();  // Remove focus from the active element
                modal.hide()
                Loadtable();        
            },
            error: function (xhr, status, error) {
             // Handle error
            console.error(xhr.responseText);
            }
        });
    });

                        //Delete BTN
    $(document).on("click",".delete-btn",function(){
        if(confirm("Do You Want To Delete This record ")){
            var productId=$(this).data("id");
            var element= this;
            $.ajax({
                url:"delete.php",
                type:"POST",
                data:{id:productId},
                success:function(data){
                    if(data==1){
                        $(element).closest("tr").fadeOut();
                }
                }
            })
        }
    })

   

                    //edit btn

    $(document).on("click",".edit-btn",function(){
        
            $('#edit-modal').trigger("click");

            var productId=$(this).data("id");
            
            $.ajax({
                url:"edit.php",
                type:"POST",
                data:{id:productId},
                success:function(data){
                    $("#modal-form").html(data);
                }
            })
        
    })

                //edited Data

    $(document).on("click","#update-data",function(e){
        e.preventDefault();

        var formData = new FormData($('#edit-form')[0]);
        
       
        
        $.ajax({
            url: "edit-data.php",                         
            type: 'POST',
            data: formData,
            contentType: false, // Don't set contentType
            processData: false, // Don't process data
            success: function (response) {
                if (response.trim() === "Email already exists") {
                    alert("Email already exists");
                }                
                if(response == 1){

                    $("#closes").click();
                    Loadtable();
                }
                console.log(response);        

            },
            error: function (xhr, status, error) {
             // Handle error
            console.error(xhr.responseText);
            }
        });
    });

     //live Search


     $("#search").on("keyup",function(){ 
        var search_term=$(this).val();

        $.ajax({
            url:"live-search.php",
            type:"POST",
            data:{search:search_term},
            success:function(data){
                $("#table-data").html(data);
                $('#search'). reset();
            }
        })
    })
});
