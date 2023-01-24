<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="card shadow mb-0">
  <div class="card-header py-3">

    <h6 class="ml-6 mt-3  font-weight-bold text-primary">Change Special Event Details </h6>

  </div>

  <div class="card-body">

    <form action="codeevent.php" method="POST">
      <div class="form-group">
        <div class="form-group">
          <label>Event ID</label>
          <input type="text" name="new_event_id" class="form-control" placeholder="Enter Admin ID">
        </div>
        <div class="form-group">
          <label>Current Password</label>
          <input type="password" name="edit_password" class="form-control" placeholder="Enter Current Password">
        </div>
        <!-- <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" name="edit_confirmpassword" class="form-control" placeholder="Retype Current Password">
        </div> -->
        <div class="row mx-1">
            <div class="form-group">
                <label>New Invite Link</label>
                <input type="text" name="edit_invitelink" class="form-control" placeholder="Enter New Event Invite Link">
            </div>
            <div class="form-group mx-3">
                    <label>New Event Date</label>
                    <input type="date" name="edit_eventdate" class="form-control" placeholder="Select New Event Date">
            </div>
            <div class="form-group">
                    <label>New Event Time</label>
                    <input type="time" name="edit_eventtime" class="form-control" placeholder="Select New Event Time">
            </div>
        </div>
    </form>

    <a href="events.php" class="btn btn-danger"> Cancel </a>
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