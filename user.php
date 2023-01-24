<?php
session_start();

if(!isset($_SESSION['id']))
{
  header('location: signin.php');

  exit;
}

if($_SESSION['password'] != $_SESSION['user_type'])
{
  header('location: signin.php');

  exit;
}

include('includes/header.php');
include('includes/navbar.php');
?>




<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <h6 class="m-2 mt-5  font-weight-bold text-primary">User Profiles

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
        $query = "SELECT * FROM users WHERE USER_TYPE = 1";
        $query_run = mysqli_query($connection, $query);

        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th> User Name </th>
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
                    <form action="userdelete.php" method="POST">
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

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>