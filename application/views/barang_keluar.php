<?php
session_start();
// include('../sb2/assets/includes/header.php'); 
// include('../sb2/assets/includes/sidebar.php');
// include('../sb2/assets/includes/topbar.php'); 
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Barang Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">

                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Id</label>
                        <input type="text" name="kode_barang" class="form-control" placeholder="Enter Id">
                    </div> -->

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Keluar</label>
                        <input type="date" name="tanggal_keluar" class="form-control" placeholder="Enter Tanggal Keluar">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Barang</label>
                        <input type="list" name="kode_barang" class="form-control" placeholder="Enter Lokasi">
                            <?php 
                                foreach ($kode_barang as $row)
                                {
                            ?>
                                <?php echo $row['id'];?>"><?php echo $row['kode_barang'];?></a>
                                <?php
                                }
                            ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kondisi</label>
                        <input type="text" name="kondisi" class="form-control" placeholder="Enter Kondisi">
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
                    Data Barang Keluar
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
                $query ="SELECT * FROM barang_keluar";
                $query_run = mysqli_query($connection, $query);
              ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tanggal Keluar</th>
                            <th>Kode Barang</th>
                            <th>Kondisi</th>
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
                              <td><?php echo $row['tanggal']; ?></td>
                              <td><?php echo $row['kode_barang']; ?></td>
                              <td><?php echo $row['kondisi']; ?></td>
                              <td>
                                <form action="user_edit.php" method="post">
                                  <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                  <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                                </form>
                              </td>
                              <td>
                                <button type="submit" class="btn btn-danger">DELETE</button>
                              </td>
                              <!-- <td><?php //echo anchor('admin/tbl_kategori/edit/'.$ktg->id,'<div class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></div>')?></td>
                              <td><?php //echo anchor('admin/tbl_kategori/hapus/'.$ktg->id,'<div class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></div>')?></td> -->
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
  // include('../sb2/assets/includes/footer.php');
  // include('../sb2/assets/includes/scripts.php');
  ?>