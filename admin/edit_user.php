<?php include '../user/connection.php'; ?>
<?php 
$id = $_GET['id']; 
$firstname = '';
$lastname = '';
$username = '';
$password = '';
$status = '';
$role = '';

$result = $conn->query("SELECT * FROM users WHERE id = '$id'") or die($conn->error());
while($row = mysqli_fetch_assoc($result)){
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $username = $row['username'];
    $password = $row['password'];
    $status = $row['status'];
    $role = $row['role'];
} ?>

                <?php
                    if(isset($_POST['submit'])){
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $status = $_POST['status'];
                        $role = $_POST['role'];

                        $conn->query("UPDATE users SET firstname = '$firstname', lastname = '$lastname', username = '$username', password = '$password', status = '$status', role = '$role' WHERE id = '$id'") or die($conn->error());
                        // $_SESSION['msg'] = 'User Updated Successfully';
                        header("Location: add_user.php");
                    }
                ?>

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
                    <h5>Edit User</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="" method="POST" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">First Name :</label>
                            <div class="controls">
                                <input type="text" class="span11" value="<?=$firstname;?>" name="firstname" placeholder="First name" required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Last Name :</label>
                            <div class="controls">
                                <input type="text" value="<?=$lastname;?>"  name="lastname" class="span11" placeholder="Last name" required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">User Name :</label>
                            <div class="controls">
                                <input type="text" value="<?=$username;?>" name="username" class="span11" placeholder="Last name" required />
                            </div>
                        </div>
                    
                        <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" value="<?=$password;?>" name="password"  class="span11" placeholder="Enter Password" required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Role</label>
                            <div class="controls">
                                <select name="role" class="span11">
                                    <option value="user" <?php if($role === 'user'){echo "selected";}  ?>>User</option>
                                    <option value="admin" <?php if($role === 'admin'){echo "selected";}  ?>>Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Status</label>
                            <div class="controls">
                                <select name="status" class="span11">
                                    <option value="active" <?php if($status === 'active'){echo "selected";}  ?>>Active</option>
                                    <option value="inactive" <?php if($status === 'inactive'){echo "selected";}  ?>>Inactive</option>
                                </select>
                            </div>
                        </div>

                        

                        

                    <div class="form-actions">
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                    </div>

                        
                </form>

                

                
                </div>
        </div>

    </div>
</div>

<!--end-main-container-part-->

<?php include 'footer.php'; ?>