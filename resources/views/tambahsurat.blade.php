<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Sistem Informasi Penghargaan Aparatur</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Tambah Surat Masuk</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertsuratmasuk" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No.Surat</label>
                                <input type="text" name="no_surat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan No.Surat">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No.Agenda</label>
                                <input type="number" name="no_agenda" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan No.Agenda">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal PKPA</label>
                                <input type="date" name="tanggal_pkpa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tanggal Surat</label>
                                <input type="date" name="tanggal_surat" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Perihal</label>
                                <textarea name="perihal" class="form-control" placeholder="Perihal Surat" id="floatingTextarea"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Dari</label>
                                <input type="text" name="dari" class="form-control" id="exampleInputPassword1" placeholder="Surat Dari">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Kepada</label>
                                <input type="text" name="kepada" class="form-control" id="exampleInputPassword1" placeholder="Surat Kepada">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Disposisi</label>
                                <input type="text" name="disposisi" class="form-control" id="exampleInputPassword1" placeholder="Surat Disposisi">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Posisi Terakhir</label>
                                <input type="text" name="posisi_terakhir" class="form-control" id="exampleInputPassword1" placeholder="Penerima Surat">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
