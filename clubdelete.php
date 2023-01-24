<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="card shadow mb-0">
  <div class="card-header py-3">

    <h6 class="ml-6 mt-3  font-weight-bold text-primary">Remove Club </h6>

  </div>


  <div class="card-body">

    <form action="codeclub.php" method="POST">
      <div class="form-group">
        <div class="form-group">
          <label>Club ID</label>
          <input type="text" name="new_club_id" class="form-control" placeholder="Enter Admin ID">
        </div>
        <div class="form-group">
          <label>Admin ID</label>
          <input type="text" name="new_admin_id" class="form-control" placeholder="Enter Admin ID">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="delete_password" class="form-control" placeholder="Enter Current Password">
        </div>
        <!-- <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" name="delete_confirmpassword" class="form-control"
            placeholder="Retype Current Password">
        </div> -->
    </form>

    <a href="club.php" class="btn btn-primary"> Cancel </a>
    <button type="submit" name="deletebtn" class="btn btn-danger" data-toggle="modal" data-target="#addadminprofile">
      Delete
    </button>

  </div>
</div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>