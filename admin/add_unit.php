<?php include '../user/connection.php'; ?>
<?php include 'header.php'; ?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Add Unit</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="" method="POST" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Unit Name :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="unitname" placeholder="Unit Name" required />
                            </div>
                        </div>

                        <?php

                        if (isset($_POST['submit'])){
                        

                            $unit = $conn->real_escape_string($_POST['unitname']);
                        
                            $result = $conn->query("SELECT * FROM units WHERE unit = '$unit'") or die($conn->error());
                            $count = mysqli_num_rows($result);
                            if($count === 0){
                                
                                
                                    $conn->query("INSERT INTO units VALUES('NULL', '$unit')") or die($conn->error());
                                    ?>
                                        <div id="alert" class="alert alert-success alert-dismissible">
                                            <a class="close" id="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Success!</strong> Unit Added Successfully
                                        </div>
                                    <?php    
                                } else{
                                ?>
                                <div id="alert" class="alert alert-danger alert-dismissible">
                                    <a class="close" id="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Error!</strong> Unit Exists
                                </div>
                                <?php
                            }

                        }
                        
                        ?>

                        

                        

                    <div class="form-actions">
                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                    </div>

                        
                </form>

                
                </div><br>

        <div class="widget-content nopadding">
            <h2 class="text-center">All Units</h2>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Unit Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                  <?php

                  $res = $conn->query("SELECT * FROM units ORDER BY id asc") or die($conn->error());
                  while($row = mysqli_fetch_assoc($res)){

                    ?>
                    <tr>
                        <td><?=$row['id']; ?></td>
                        <td><?=$row['unit']; ?></td>
                        <td><center><a href="edit_unit.php?id=<?=$row['id']; ?>" class="btn btn-info">Edit</a></center></td>
                        <td><center><a href="delete_unit.php?id=<?=$row['id']; ?>" class="btn btn-danger">Delete</a></center></td>
                    </tr>
                    <?php
                  }
                  ?>
                
                
              </tbody>
            </table>
          </div>

                
            </div>
                        

            </div>
        </div>

        

    </div>

    
</div>

<!--end-main-container-part-->

<?php include 'footer.php'; ?>