<?php

require 'ceklogin.php';

//Hitung jumlah produk
$h1 = mysqli_query($c, "select * from produk");
$h2 = mysqli_num_rows($h1); //jumlahproduk

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="" style="background: rgb(91,190,242);
     background: linear-gradient(90deg, rgba(91,190,242,1) 34%, rgba(158,222,255,1) 58%);">

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-linear-gradient bg-linear-gradient">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Aplikasi Kasir Pakaian</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-linear-gradient" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
                                Order
                            </a>
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Kelola Pelanggan
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah barang: <?= $h2; ?></div>
                                </div>

                                <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Tambah Barang Baru
                                </button>
                            </div>

                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Barang
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Stock</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $get = mysqli_query($c, "select * from produk");
                                        $i = 1;

                                        while ($p = mysqli_fetch_array($get)) {
                                            $namaproduk = $p['namaproduk'];
                                            $deskripsi = $p['deskripsi'];
                                            $harga = $p['harga'];
                                            $stock = $p['stock'];
                                            $harga = $p['harga'];
                                            $idproduk = $p['idproduk'];

                                        ?>

                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $namaproduk; ?></td>
                                                <td><?= $deskripsi; ?></td>
                                                <td><?= $stock; ?></td>
                                                <td>Rp<?= number_format($harga); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $idproduk; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $idproduk; ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>




                                            <!-- modal edit-->
                                            <div class="modal fade" id="edit<?= $idproduk; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Ubah <?= $namaproduk; ?></h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <form method="post">

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk" value="<?= $namaproduk; ?>">
                                                                <input type="text" name="deskripsi" class="form-control mt-2" placeholder="Deskripsi" value="<?= $deskripsi; ?>">
                                                                <input type="num" name="harga" class="form-control mt-2" placeholder="Harga Produk" value="<?= $harga; ?>">
                                                                <input type="hidden" name="idp" value="<?= $idproduk; ?>">
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success" name="editbarang">Submit</button>
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>



                                            <!-- modal delete-->
                                            <div class="modal fade" id="delete<?= $idproduk; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus <?= $namaproduk; ?></h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <form method="post">

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus barang ini?
                                                                <input type="hidden" name="idp" value="<?= $idproduk; ?>">
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success" name="hapusbarang">Submit</button>
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }; //end of while

                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang Baru</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="post">

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk">
                        <input type="text" name="deskripsi" class="form-control mt-2" placeholder="Deskripsi">
                        <input type="num" name="stock" class="form-control mt-2" placeholder="Stock Awal">
                        <input type="num" name="harga" class="form-control mt-2" placeholder="Harga Produk">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="tambahbarang">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </form>

            </div>
        </div>
    </div>


</html>