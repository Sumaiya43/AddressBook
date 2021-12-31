<?php
      include('includes/Database.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
  <div class="modal fade" id="userModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <?php
              
            ?>

                <form action="" method="POST" enctype="multipart/form-data" >

                    <div class="form-group">
                        <label for="exampleInputEmail1" >Name</label>
                        <input type="text"  name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Number</label>
                    <input type="number"  name="number"  class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                       <label for="">Select City</label>
                        <select name="city"  id="" class="form-control">
                            <option value="Sylhet">Sylhet</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Cox'sBazar">Cox's Bazar</option>
                        </select>
                  </div>
                      <div class="form-group">
                      <label for="exampleFormControlFile1">Upload Image</label>
                      <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                 </div>

            <div class="modal-footer" >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
          
            </form>
          </div>
        </div>
       </div>

       <!--------#################################################------------------>

        <?php
       
        if(isset($_POST['submit']))
        {

          //getting data from form
             $name = $_POST['name'];
             $email = $_POST['email'];
             $number = $_POST['number'];
             $city = $_POST['city'];

         if(isset($_FILES['image']['name']))
         {
           $image_name = $_FILES['image']['name'];

           if($image_name!="")
           {
           

             $src = $_FILES['image']['tmp_name'];

             $dst = "image/".$image_name;

             $upload = move_uploaded_file($src, $dst);
           }
         }
         else
         {
           $image_name = "";
         }

        
            
       
        
        //SQL Query to save data in database

          $sql = "INSERT INTO players SET
            name = '$name',
            email = '$email',
            phone = '$number',
            photo = '$image_name',
            city = '$city'
          
          ";


         $res = mysqli_query($conn, $sql) or die(mysqli_error());  


         if($res==TRUE)
         {
          //header("Location: http://google.com");

          $_SESSION['add'] = "Added Successfully";
        
         }
        else
         {
          $_SESSION['add'] = "failed to Add Successfully";
          
         }
         
        
      }
        
        ?>

        <script>
          if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href)
          }
        </script> 
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>