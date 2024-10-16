<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CURD application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
        .pagination a {
            padding: 5px 10px;
            border: 1px solid #ddd;
            margin: 2px;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }
        
        .pagination strong {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
        }
    </style>

  </head>
  <body>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#Modal">
  ADD DATA
</button>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" id="closed" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                
            <form id="upload-form" role="form" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Enter Name</label>
                                <input type="name" class="form-control " id="first-name" name="first-name" required>
                                
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required  >
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="phone" name="phone" required>
                            </div>

                            
                            <div>
                                <label for="example-datepicker">Choose a date</label>
                                <input type="date" class="form-control" id="date" name="date"  required>
                            </div>
                            

                            <div class="mb-3">
                                <label for="exampleInputFile" class="form-label">image</label>
                                <input type="file" class="form-control" id="img1" name="img1" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputFile" class="form-label">image</label>
                                <input type="file" class="form-control" id="img2" name="img2" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                </form>

            </div>
            
        </div>
    </div>
</div>
                                <!-- data load table -->
<div id="table-data">
            
</div>
                                                    <!-- EDIT MODAL -->
<!-- Button trigger modal -->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="edit-modal" style="display:none">
  EDIT MODAL
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" id="closes" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body" id="modal-form">
                        
                        
                    </div>
                
            </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="jquery.js"></script>

  </body>
</html>