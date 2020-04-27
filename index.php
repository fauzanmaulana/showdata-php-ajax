<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div class="container table-responsive">
    <h3 class="my-4 text-center">Menampilkan Data Dari database Mysql Dengan PHP dan AJAX</h3>
        <table id="data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'connection.php';
                        $no = 1;
                        $query = "SELECT * FROM siswa ORDER BY id DESC";
                        $res = $db->query($query);
                    ?>
                    <?php while($row = $res->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['jurusan'] ?></td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['tanggal_masuk'] ?></td>
                        <td><button class="btn btn-primary" id="detail">detail</button></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
        </table>
    </div>


    <div id="viewModal" class="modal fade mr-tp-100" role="dialog">
        <div class="modal-dialog modal-lg flipInX animated">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="detailData">View Data</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" id="id" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" readonly>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="alamat" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="text" class="form-control" id="tgl_masuk" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" id="Jurusan" readonly>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js"integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(() => {
            let table = $('#data').DataTable();
            $('#data tbody').on('click', '#detail', function(){
                const current_row = $(this).parents('tr')
                let data = table.row(current_row).data()

                $("#id").val(data[0])
                $("#nama_siswa").val(data[1])
                $("#alamat").val(data[2])
                $("#jenis_kelamin").val(data[3])
                $("#tgl_masuk").val(data[4])
                $("#Jurusan").val(data[5])

                $("#viewModal").modal("show");
            })
        })
    </script>
</body>
</html>