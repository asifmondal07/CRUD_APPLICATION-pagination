$(document).ready(function(){
    var currentpage=1;

    Loadtable(currentpage);
                //Load table

function Loadtable(page){
                    $.ajax({
                        url:"load-data.php",
                        type:"POST",
                        data: { page: page },
                        success:function(response){
                            
                            $("#table-data").html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error: " + error); // Log any errors
                        }
                    })
                }



                //upload FORM data

    $('#upload-form').submit(function (e){
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
                }if(response.trim() === "New record created successfully"){
                    $("#closed").click();
                    Loadtable(currentpage); 
                }else{
                    console.log(response);
                }
                
                       
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
                        Loadtable(currentpage);
                }
                }
            })
        }
    })

   

                    //edit btn

    $(document).on("click",".edit-btn",function(){
        
            $('#edit-modal').click();

            var productId=$(this).data("id");
            
            $.ajax({
                url:"edit.php",
                type:"POST",
                data:{id:productId},
                success:function(data){
                    $("#modal-form").html(data);
                    Loadtable(currentpage);
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
                if(response == 1){
                    $("#closes").click();
                    Loadtable(currentpage);
                }
                
                console.log(response);        

            },
            error: function (xhr, status, error) {
             // Handle error
            console.error(xhr.responseText);
            }
        });
    });

                    //pagination button

    // Event delegation for pagination link clicks
    $(document).on("click", ".page-link", function(e) {
        e.preventDefault();
        var page = $(this).data("page"); // Get the page number
        Loadtable(page); // Load that page
    });



});
