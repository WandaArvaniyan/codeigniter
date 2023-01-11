<?php
session_start();
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Enter Confirm Passwod">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Enter Nama">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <input type="text" name="status" class="form-control" placeholder="Enter Status">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Login</label>
                        <input type="date" name="last_login" class="form-control" placeholder="Enter Last Login">
                    </div>
                
                </div>            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="userbtn"class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="display-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Data User
                </h6>
                
            </div>
        </div>

        <div class="card-body">
            <div class="adddata">
                <a href="#">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Add Data
                    </button>
                </a>
            </div>

            <?php 
            if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
              echo '<h2> '.$_SESSION['success'].' </h2>';
              unset($_SESSION['success']);
            }

            if(isset($_SESSION['gagal']) && $_SESSION['gagal'] !=''){
              echo '<h2 class="bg-info"> '.$_SESSION['gagal'].' </h2>';
              unset($_SESSION['gagal']);
            }
            ?>
            <div class="table-responsive">
              <?php 
                $connection = mysqli_connect("localhost","root","","aset");
                $query ="SELECT * FROM user";
                $query_run = mysqli_query($connection, $query);
              ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Last Login</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if(mysqli_num_rows($query_run) > 0)
                        {
                          while($row = mysqli_fetch_assoc($query_run))
                          {
                            ?>

                            <tr>
                              <td><?php echo $row['id']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td><?php echo $row['password']; ?></td>
                              <td><?php echo $row['nama']; ?></td>
                              <td><?php echo $row['status']; ?></td>
                              <td><?php echo $row['last_login']; ?></td>
                              <td>
                                <form action="user_edit.php" method="post">
                                  <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                  <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                                </form>
                              </td>
                              <td>
                                <button type="submit" class="btn btn-danger">DELETE</button>
                              </td>
                            </tr>

                            <?php
                          }
                        } else{
                          echo "No Record Found";
                        }
                      ?>
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <?php
  ?>