<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLIKASI PERHITUNGAN DISKON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('OIP.JPG');
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center">APLIKASI PERHITUNGAN DISKON</h2>
                <form method="post" class="border rounded bg-light p-2">
                    <label class="form-label">Harga Barang (Rp)</label>
                    <input type="number" name="harga" class="form-control" step="0.01" placeholder="Masukan Harga Barang" min="0"
                        autocomplete="off"
                        required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                    <label class="form-label">Diskon (%)</label>
                    <input type="text" maxlength="3" name="diskon" class="form-control" step="0.01" placeholder="Masukan Diskon (0-100)" min="0"
                        autocomplete="off"
                        required onkeypress="return event.charCode >= 48 && event.charCode <=57">
                    <button type="submit" class="btn btn-primary w-100 mt-2" name="hitung">HITUNG</button>
                    <button type="reset" class="btn btn-danger w-100 mt-2">HAPUS</button>
                </form>
                <div id="hasil">
                    <?php
                    include 'koneksi.php';

                    if (isset($_POST['hitung'])){
                        $harga = $_POST['harga'];
                        $diskon = $_POST['diskon'];
                        if ($harga < 0){
                            echo "<script>alert('Harga tidak boleh negatif!')</script>";
                        }elseif($diskon < 0 || $diskon > 100){
                            echo "<script>alert('Diskon harus diantara angka 0-100 !')</script>";
                        }else{
                            $nilai_diskon = $harga * ($diskon/100);
                            $total_harga = $harga - $nilai_diskon;
                            // Simpan ke database (cara sederhana)
                            $query = "INSERT INTO transaksi (harga, diskon, total_harga) VALUES ('$harga', '$diskon', '$total_harga')";
                            mysqli_query($koneksi, $query);
?>
                            <div id="hasil" class="border rounded p-2 bg-light mt-2">
                                <p>Harga Barang : Rp. <b><?php echo number_format($harga,2,',','.') ?></b></p>
                                <p>Diskon <?php echo $diskon ?>% : Rp. <b><?php echo number_format($nilai_diskon,2,',','.') ?></b></p>
                                <p>Total harga setelah diskon : Rp. <b><?php echo number_format($total_harga,2,',','.') ?></b></p>
                                <button type="reset" id="resetButton" class="btn btn-danger w-100 mt-2">HAPUS</button>
                                </form>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <p class="text-center">&copy; UKK-DISKON RPL 2025 |FADHIL ARRASYID | XII PPLG</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('resetButton').addEventListener('click' ,function() {
            document.getElementById('hasil').innerHTML ='';
        });
    </script>
</body>
</html>