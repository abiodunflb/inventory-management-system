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
                    <h5>Add User</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="" method="POST" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">First Name :</label>
                            <div class="controls">
                                <input type="text" class="span11" name="firstname" placeholder="First name" required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Last Name :</label>
                            <div class="controls">
                                <input type="text" name="lastname" class="span11" placeholder="Last name" required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">User Name :</label>
                            <div class="controls">
                                <input type="text" name="username" class="span11" placeholder="Last name" required />
                            </div>
                        </div>
                    
                        <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" name="password"  class="span11" placeholder="Enter Password" required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Confirm Password</label>
                            <div class="controls">
                                <input type="password" name="conpassword"  class="span11" placeholder="Enter Password Again" required  />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Role</label>
                            <div class="controls">
                                <select name="role" class="span11">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>

                        <?php

                        if (isset($_POST['submit'])){
                        

                        $firstname = $conn->real_escape_string($_POST['firstname']);
                        $lastname = $conn->real_escape_string($_POST['lastname']);
                        $username = $conn->real_escape_string($_POST['username']);
                        $password = $conn->real_escape_string($_POST['password']);
                        $conpassword = $conn->real_escape_string($_POST['conpassword']);
                        $role = $conn->real_escape_string($_POST['role']);
                            $result = $conn->query("SELECT * FROM users WHERE username = '$username'") or die($conn->error());
                            $count = mysqli_num_rows($result);
                            if($count === 0){
                                if($password != $conpassword){
                                    ?>
                                   <div id="alert" class="alert alert-danger alert-dismissible">
                                        <a class="close" id="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error!</strong> Passwords do not match
                                    </div>
                                    <?php
                                }else{
                                    $conn->query("INSERT INTO users VALUES('NULL', '$firstname','$lastname','$username', '$password', '$role', 'active')") or die($conn->error());
                                    ?>
                                        <div id="alert" class="alert alert-success alert-dismissible">
                                            <a class="close" id="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Success!</strong> User Added Successfully
                                        </div>
                                    <?php    
                                }
                            }else{
                                ?>
                                <div id="alert" class="alert alert-danger alert-dismissible">
                                    <a class="close" id="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Error!</strong> Username Exists
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
            <h2 class="text-center">All Users</h2>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>User Name</th>
                  <th>Status</th>
                  <th>Role</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                  <?php

                  $res = $conn->query("SELECT * FROM users ORDER BY id asc") or die($conn->error());
                  while($row = mysqli_fetch_assoc($res)){

                    ?>
                    <tr>
                        <td><?=$row['firstname']; ?></td>
                        <td><?=$row['lastname']; ?></td>
                        <td><?=$row['username']; ?></td>
                        <td><?=$row['status']; ?></td>
                        <td><?=$row['role']; ?></td>
                        <td><a href="edit_user.php?id=<?=$row['id']; ?>" class="btn btn-info">Edit</a></td>
                        <td><a href="delete_user.php?id=<?=$row['id']; ?>" class="btn btn-danger">Delete</a></td>
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