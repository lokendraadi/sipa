<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sistem Informasi Penghargaan Aparatur</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Surat Masuk</h1>

    <div class="container">
    <a href="/tambahsuratmasuk" class="btn btn-success">Tambah +</a>


    <div class="row g-3 align-items-center mt-2">
        <div class="col-auto">
        <form action="/suratmasuk" method="GET">
            <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
        </form>
        </div>

        <div class="col-auto">
            <a href="/exportpdf" class="btn btn-info">Export PDF</a>
        </div>
        <div class="col-auto">
            <a href="/exportexcel" class="btn btn-success">Export Excel</a>
        </div>

        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Import Data
            </button>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/importexcel" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="modal-body">
                <div class="form-group">
                    <input type="file" name="file" id="" required>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
            </div>
        </div>

    </div>

        <div class="row">
            {{-- @if ($message = Session::get('sukses'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">No.Surat</th>
                    <th scope="col">No.Agenda</th>
                    <th scope="col">Tanggal PKPA</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Dari</th>
                    <th scope="col">Kepada</th>
                    <th scope="col">Disposisi</th>
                    <th scope="col">Posisi Terakhir</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp
                    @foreach ($data as $index =>  $row)
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>{{ $row->no_surat }}</td>
                        <td>{{ $row->no_agenda }}</td>
                        <td>{{ date('d-m-Y', strtotime($row->tanggal_pkpa)) }}</td>
                        <td>{{ date('d-M-y', strtotime($row->tanggal_surat)) }}</td>
                        <td>{{ $row->perihal }}</td>
                        <td>{{ $row->dari }}</td>
                        <td>{{ $row->kepada }}</td>
                        <td>{{ $row->disposisi }}</td>
                        <td>{{ $row->posisi_terakhir }}</td>
                        <td>
                            <a href="/tampilkansuratmasuk/{{ $row->id }}" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-no_surat="{{ $row->no_surat }}">Delete</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click( function(){
        var suratmasukid = $(this).attr('data-id');
        var nosuratmasukid = $(this).attr('data-no_surat');

        swal({
            title: "Yakin ?",
            text: "Anda akan menghapus data Surat Masuk dengan  No Surat "+nosuratmasukid+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/deletesuratmasuk/"+suratmasukid+""
                swal("Data berhasil di hapus", {
                icon: "sukses",
                });
            } else {
                swal("Data tidak jadi dihapus");
            }
        });
    });
  </script>
  <script>
    @if (Session::has('sukses'))
      toastr.success("{{ Session::get('sukses') }}")
    @endif
  </script>
</html>
