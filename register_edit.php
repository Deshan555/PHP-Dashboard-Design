<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="card shadow mb-0">
  <div class="card-header py-3">

    <h6 class="ml-6 mt-3  font-weight-bold text-primary">Change Admin Password </h6>

  </div>

  <div class="card-body">

    <form action="code.php" method="POST">
      <div class="form-group">
        <div class="form-group">
          <label>Admin ID</label>
          <input type="text" name="admin_id" class="form-control" placeholder="Enter Admin ID">
        </div>
        <div class="form-group">
          <label>Current Password</label>
          <input type="password" name="edit_password" class="form-control" placeholder="Enter Current Password">
        </div>
        <!-- <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" name="edit_confirmpassword" class="form-control" placeholder="Retype Current Password">
        </div> -->
        <div class="form-group">
          <label>New Password</label>
          <input type="password" name="edit_newpassword" class="form-control" placeholder="Enter New Password">
        </div>
    </form>

    <a href="register.php" class="btn btn-danger"> Cancel </a>
    <button type="submit" name="updatebtn" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
      Change
    </button>

  </div>


</div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>