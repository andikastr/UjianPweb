<?php
    //koneksi database
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "pweb_ujian";

    //membuat koneksi
    $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));


    //ketikamenggunakan tombol save
    if(isset($_POST['bsimpan'])){

        
        if(isset($_GET['hal']) == "edit"){
            //ketika data akan diedit
            $edit = mysqli_query($koneksi, "UPDATE list_ujian SET matkul = '$_POST[matkul]', sesi = '$_POST[sesi]', tanggalUjian = '$_POST[tanggalUjian]' WHERE id = '$_GET[id]'");

            if($edit){
                echo "<script>
                document.location='index.php';
                </script>";
            }
        } else {
            //ketika data baru akan disimpan
            $simpan = mysqli_query($koneksi, " INSERT INTO list_ujian (matkul, sesi, tanggalUjian) VALUE ('$_POST[matkul]', '$_POST[sesi]', '$_POST[tanggalUjian]')");

            if($simpan){
                echo "<script>
                document.location='index.php';
                </script>";
            }
        }

        
    }

    //deklarasi variabel yang akan diedit
    $v_matkul = "";
    $v_sesi = "";
    $v_tanggalUjian = "";

    //ketika menekan tombol edit/hapus
    if(isset($_GET['hal'])){

        //edit
        if($_GET['hal'] == "edit"){

            //data yang akan diedit
            $tampil = mysqli_query($koneksi, " SELECT * FROM list_ujian WHERE id = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data){
                $v_matkul = $data['matkul'];
                $v_sesi = $data['sesi'];
                $v_tanggalUjian = $data['tanggalUjian'];
            }
        } 
        
        //delete data
        else if($_GET['hal'] == "hapus"){

            $hapus = mysqli_query($koneksi, "DELETE FROM list_ujian WHERE id = '$_GET[id]'");
            if($hapus){
                echo "<script>
                document.location='index.php';
                </script>";
            }
        }

    }
    

?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Project Ujian</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h3 class="text-center">PENJADWALAN UJIAN</h3>
            <hr>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header bg-info text-light fw-bold">
                            INPUT UJIAN
                        </div>
                        <div class="card-body">
                            <!-- Awal Form -->
                                <form method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Mata Kuliah</label>
                                        <input type="text" name="matkul" value="<?= $v_matkul?>" class="form-control" placeholder="Masukkan Nama Mata Kuliah">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Sesi Ujian</label>
                                        <input type="text" name="sesi" value="<?= $v_sesi?>" class="form-control" placeholder="Masukkan Sesi Ujian">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Ujian</label>
                                        <input type="date" name="tanggalUjian" value="<?= $v_tanggalUjian?>" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <hr>
                                        <button class="btn btn-primary" name="bsimpan">Save</button>
                                    </div>
                                </form>

                            <!-- Akhir Form -->
                        </div>
                        <div class="card-footer bg-info text-light">
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header bg-info text-light fw-bold">
                    DAFTAR UJIAN
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Sesi Ujian</th>
                            <th>Tanggal Ujian</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>


                        <!-- Menampilkan isi database -->

                        <?php
                            
                            $no = 1;
                            $tampil = mysqli_query($koneksi, "SELECT * FROM list_ujian ORDER BY id DESC");
                            while($data = mysqli_fetch_array($tampil)) :
                        
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['matkul'] ?></td>
                            <td><?= $data['sesi'] ?></td>
                            <td><?= $data['tanggalUjian'] ?></td>
                            <td><?= $data['tanggalSimpan']?></td>
                            <td>
                                <a href="index.php?hal=edit&id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="index.php?hal=hapus&id=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')">Delete</a>
                            </td>
                        </tr>

                        <?php endwhile; ?>
                    </table>
                </div>
                <div class="card-footer bg-info text-light">
                    
                </div>
            </div>
            
        </div>



    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>