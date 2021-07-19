@extends('layouts.master')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="/tambahsuratmasuk" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="fas fa-plus"></i> Tambah</a>
                                    {{-- {{ Session::get('halaman_url') }} --}}

                                    <a href="/exportpdf" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Export PDF</a>

                                    <a href="/exportexcel" class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</a>

                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-file-import"></i> Import Data</button>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <form action="/suratmasuk" method="GET">
                                                <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline" placeholder="Search">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive">
                                    <table class="table table-head-fixed text-nowrap">
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
                                                <td>{{ date('d-m-Y', strtotime($row->tanggal_surat)) }}</td>
                                                <td>{{ $row->perihal }}</td>
                                                <td>{{ $row->dari }}</td>
                                                <td>{{ $row->kepada }}</td>
                                                <td>{{ $row->disposisi }}</td>
                                                <td>{{ $row->posisi_terakhir }}</td>
                                                <td>
                                                    <a href="/tampilkansuratmasuk/{{ $row->id }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-no_surat="{{ $row->no_surat }}"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Insert Data Modal -->
                                    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/insertsuratmasuk" method="POST" enctype="multipart/form-data">
                                                    @csrf

                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">No.Surat</label>
                                                        <input type="text" name="no_surat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan No.Surat">
                                                        @error('no_surat')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">No.Agenda</label>
                                                        <input type="number" name="no_agenda" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan No.Agenda">
                                                        @error('no_agenda')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Tanggal PKPA</label>
                                                        <input type="date" name="tanggal_pkpa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        @error('tanggal_pkpa')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Tanggal Surat</label>
                                                        <input type="date" name="tanggal_surat" class="form-control" id="exampleInputPassword1">
                                                        @error('tanggal_surat')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Perihal</label>
                                                        <textarea name="perihal" class="form-control" placeholder="Perihal Surat" id="floatingTextarea"></textarea>
                                                        @error('perihal')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Dari</label>
                                                        <input type="text" name="dari" class="form-control" id="exampleInputPassword1" placeholder="Surat Dari">
                                                        @error('dari')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Kepada</label>
                                                        <input type="text" name="kepada" class="form-control" id="exampleInputPassword1" placeholder="Surat Kepada">
                                                        @error('kepada')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Disposisi</label>
                                                        <input type="text" name="disposisi" class="form-control" id="exampleInputPassword1" placeholder="Surat Disposisi">
                                                        @error('disposisi')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Posisi Terakhir</label>
                                                        <input type="text" name="posisi_terakhir" class="form-control" id="exampleInputPassword1" placeholder="Penerima Surat">
                                                        @error('posisi_terakhir')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
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

                                    <!-- Import Data Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
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
                                    <br>
                                    <!-- Button trigger modal -->
                                    {{ $data->links() }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                icon: "success",
                });
            } else {
                swal("Data tidak jadi dihapus");
            }
        });
    });
    </script>
    <script>
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
    </script>
@endpush
