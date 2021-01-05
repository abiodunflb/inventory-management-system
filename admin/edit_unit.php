<?php include '../user/connection.php'; ?>
<?php 
$id = $_GET['id']; 
$unit = '';


$result = $conn->query("SELECT * FROM units WHERE id = '$id'") or die($conn->error());
while($row = mysqli_fetch_assoc($result)){
    $unit = $row['unit'];
} ?>

                <?php
                    if(isset($_POST['submit'])){
                        $unit = $_POST['unitname'];

                        $conn->query("UPDATE units SET unit = '$unit' WHERE id = '$id'") or die($conn->error());
                        // $_SESSION['msg'] = 'User Updated Successfully';
                        header("Location: add_unit.php");
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
                    <h5>Edit Unit</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="" method="POST" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Unit Name :</label>
                            <div class="controls">
                                <input type="text" class="span11" value="<?=$unit;?>" name="unitname" placeholder="Unit Name" required />
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