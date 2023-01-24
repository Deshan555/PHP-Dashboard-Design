<?php
session_start();

if(!isset($_SESSION['id']))
{
  header('location: signin.php');

  exit;
}

include('includes/header.php');
include('includes/navbar.php');
?>

<?php if(isset($_GET['error_message'])){ ?>

<?php

$message = $_GET['error_message'];

echo"<body onload='notification_function(`Error Message`, `$message`, `#da1857`);'</body>"

?>

<?php }?>

<?php if(isset($_GET['success_message'])){ ?>

<?php

$message = $_GET['success_message'];

echo"<body onload='notification_function(`Success Message`, `$message`, `#0F73FA`);'</body>"

?>

<?php }?>

<link rel="stylesheet" href="notifast/notifast.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Club Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="new-club.php" method="POST">

        <div class="modal-body">
          
          <div class="form-group">
            <label>Club Mail</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Club Mail @sltc.ac.lk">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="registerbtn" class="btn btn-primary">Register Club</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Add New Club
      </button>
      <h6 class="m-2 mt-5  font-weight-bold text-primary">Club Profiles

      </h6>
    </div>

    <div class="card-body">

      <?php

      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h3 class="status"> ' . $_SESSION['status'] . ' </h3>';
        unset($_SESSION['status']);
      }

      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h3 class="bg-danger"> ' . $_SESSION['status'] . ' </h3>';
        unset($_SESSION['status']);
      }

      ?>

      <div class="table-responsive">

        <?php

        $connection = mysqli_connect("localhost", "root", "", "eventswave");
        $query = "SELECT * FROM users WHERE USER_TYPE = 0";
        $query_run = mysqli_query($connection, $query);

        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th> Club Name </th>
              <th> Email </th>
              <th> Facebook </th>
              <th> WhatsApp </th>
              <th> DELETE </th>
            </tr>
          </thead>
          <tbody>

            <?php

            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
                ?>

                <tr>
                  <td>
                    <?php echo $row['User_ID']; ?>
                  </td>
                  <td>
                    <?php echo $row['FULL_NAME']; ?>
                  </td>
                  <td>
                    <?php echo $row['EMAIL']; ?>
                  </td>
                  <td>
                    <?php echo $row['FACEBOOK']; ?>
                  </td>
                  <td>
                    <?php echo $row['WHATSAPP']; ?>
                  </td>
                  <!-- <td>
                  <form action="register_edit.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $row['Admin_ID']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                  </form>
                </td> -->
                  <td>
                    <form action="clubdelete.php" method="POST">
                      <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                    </form>
                  </td>
                </tr>


                <?php
              }
            } else {
              echo "Couldn't find records";
            }
            ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>

  <script src="notifast/notifast.min.js"></script>

  <script src="notifast/function.js"></script>
</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>