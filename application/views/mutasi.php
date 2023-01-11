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
                        <label for="exampleInputEmail1">Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" placeholder="Enter Kode Barang">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Penanggung Jawab</label>
                        <input type="text" name="nama_penanggungjawab" class="form-control" placeholder="Enter Penanggung Jawab">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Lokasi Awal</label>
                        <input type="text" name="lokasi_awal" class="form-control" placeholder="Enter Lokasi Awal">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Lokasi Akhir</label>
                        <input type="text" name="lokasi_akhir" class="form-control" placeholder="Enter Lokasi Akhir">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Mutasi</label>
                        <input type="date" name="tanggal_mutasi" class="form-control" placeholder="Enter Tanggal Mutasi">
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
                    Data Mutasi Aset
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
                $query ="SELECT * FROM mutasi";
                $query_run = mysqli_query($connection, $query);
              ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Penanggungjawab</th>
                            <th>Lokasi Awal</th>
                            <th>Lokasi Akhir</th>
                            <th>Tanggal Mutasi</th>
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
                              <td><?php echo $row['kode_barang']; ?></td>
                              <td><?php echo $row['nama_penanggungjawab']; ?></td>
                              <td><?php echo $row['lokasi_awal']; ?></td>
                              <td><?php echo $row['lokasi_akhir']; ?></td>
                              <td><?php echo $row['tanggal_mutasi']; ?></td>
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