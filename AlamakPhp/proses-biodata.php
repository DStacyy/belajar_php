<!-- PROSES-BIODATA.PHP -->
<!-- Memproses data dari form biodata -->

<!DOCTYPE html>
<html lang='id'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>📊 Data Biodata Diterima</title>
    <style>
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .success-box {
            background-color: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            border: 2px solid #c3e6cb;
        }

        .data-box {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 15px 0;
            border-left: 5px solid #3498db;
        }

        .data-item {
            margin: 10px 0;
            padding: 8px;
            background-color: white;
            border-radius: 5px;
        }

        .data-label {
            font-weight: bold;
            color: #2c3e50;
        }
    </style>
</head>

<body>
    <div class='container'>

        <div class='success-box'>
            <h2>✅ Biodata Berhasil Diterima!</h2>
            <p>Terima kasih telah mengisi form biodata. Berikut data yang Anda kirim:</p>
        </div>

        <div class='data-box'>
            <h3>👤 Data Pribadi</h3>



            <div class='data-item'><span class='data-label'>Nama Lengkap:</span> Dani Mahendra</div>
            <div class='data-item'><span class='data-label'>NIS:</span> 092837037</div>
            <div class='data-item'><span class='data-label'>Jenis Kelamin:</span> Laki-laki </div>
            <div class='data-item'><span class='data-label'>Tanggal Lahir:</span> 12-8-2007</div>

        </div>

        <div class='data-box'>
            <h3>Data Sekolah</h3>


            <div class='data-item'><span class='data-label'>Kelas:</span> XI RPL</div>
            <div class='data-item'><span class='data-label'>Alamat:</span> Jombang</div>
            <div class='data-item'><span class='data-label'>Email:</span> dani123@gmail.com</div>
            <div class='data-item'><span class='data-label'>Telepon:</span> 08576576572</div>

        </div>

        <div class='data-box'>
            <h3>Minat dan Hobi</h3>


            <!-- Minat dan hobi (bisa multiple) -->

            <div class='data-item'>
                <span class='data-label'>Hobi yang dipilih:</span><br>

                - 🎨 Desain <br>


            </div>
            
            <!-- Tombol kembali -->
            <div style='text-align: center; margin-top: 30px;'>
                <a href='form-biodata.html' style='
background-color: #3498db; 
color: white; 
padding: 12px 25px; 
text-decoration: none; 
border-radius: 5px;
display: inline-block;
'>📝 Isi Form Lagi</a>
            </div>
        </div>
</body>

</html>