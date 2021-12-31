

<!doctype html>
<html lang="en">
  <head>
    <title>PHP RUPKOTHA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
     <!---Google Fonts--->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Noto+Sans:wght@700&display=swap" rel="stylesheet">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
  <body>`
      <div class="container-fluid">
          <div class="alert alert alert-primary" role="alert">
             <h4 class="text-primary text-center">PHP APPLICATION</h4>
          </div>

    <!-- Modal -->
       <?php include"adduser.php"?>

    <!----###############################Edit Modal###########################################----->
      <div class="modal fade" id="userModalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="POST" >
                <div class="form-group">
                    <label for="exampleInputEmail1" >Name</label>
                    <input type="text"  name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="" >
           
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="">
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Number</label>
                    <input type="number"  name="number"  class="form-control" id="exampleInputPassword1"  value="">
                  </div>
                  <div class="form-group">
                       <label for="">Select City</label>
                        <select name="city"  id="" class="form-control" value="">
                            <option value="Sylhet">Sylhet</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                        </select>
                    </div>
                
                      <div class="form-group">
                      <label for="exampleFormControlFile1">Upload Image</label>
                      <input type="file" class="form-control-file" id="exampleFormControlFile1"  value="">
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
      
         <!---UserviewModal-->
        <div class="modal fade" id="userViewModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="userViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                xxxxxxx
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
            </div>
        </div>
        </div>
        <?php
           if(isset($_SESSION['add']))
           {
             echo $_SESSION['add'];
             unset ($_SESSION['add']);
           }     
        ?>
        <div class="row mb-3">
            <div class="col-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal" >Add New</button>
            </div>
            <div class="col-9 " >
            <form action=""  class="form-inline" method="POST" >
              <input class="form-control mr-sm-2" type="text" name="search_name" placeholder="Search by Name" aria-label="Search">
              <button class="btn btn-outline-success " name="search" type="submit">Search</button>
            </form>
            </div>
        </div>
        <!--table-->

              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">City</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>

                <?php
                      $sql = "SELECT * FROM players";
                      if(isset($_POST['search']))
                     {
                        $searchKey = $_POST['search_name'];
                        $sql = "SELECT * FROM players WHERE name LIKE '%$searchKey%'";
                     }
                        $res = mysqli_query($conn, $sql);

                      if($res==TRUE)
                      {
                        $count = mysqli_num_rows($res);

                        $sn=1;

                        if($count>0)
                        {
                          while($rows=mysqli_fetch_assoc($res))
                          {
                            $id=$rows['id'];
                            $name=$rows['name'];
                            $email=$rows['email'];
                            $phone=$rows['phone'];
                            $city=$rows['city'];
                            $photo=$rows['photo'];

                            //display value in table
                            ?>
                            <tbody>
                            <tr>
                              <th scope="row" class="align-middle"><?php echo $sn++  ?></th>
                              <td>
                                <?php 
                                if($photo!="")
                                {
                                  ?>
                                  <img src="image/<?php echo $photo;?>" class="rounded" width="100px">
                                  <?php
                                }
                                else
                                {
                                  echo "Not Uploaded";
                                }
                                ?> 
                                </td>
                              <td class="align-middle"><?php echo $name  ?></td>
                              <td class="align-middle"><?php echo $email  ?></td>
                              <td class="align-middle"><?php echo $phone  ?></td>
                              <td class="align-middle"><?php echo $city  ?></td>
                               <td>
                             <button  type="button" class="btn btn-success editbtn"  data-toggle="" data-target="">Edit</button>
                              <button type="button" class="btn btn-danger">Delete</button>
                              </td>
                            </tr>
                            </tbody>
                            <?php


                          }
                        }else
                        {

                        }
                      
                    }
                ?>  
              </table>



      </div>
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     
    <script>
          $(document).ready(function() {
             $('.editbtn').on('click', function()
             {
               $('#userModalEdit').modal('show');

               $tr = $(this).closet('tr');

               var data = $tr.children("td").map(function()
               {
                 return $(this).text();
               }).get();

               console.log(data);

               $('')
             });
          });
    </script>

  </body>
</html>