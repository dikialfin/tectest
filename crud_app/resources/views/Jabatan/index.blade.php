<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/jabatan">Jabatan Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/kontrak">Kontrak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h3>Data Jabatan</h3>
    <button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#addDataModal'>Tambah Data</button>

    <table class="table ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


    <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAddData">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan">
                            <div class="invalid-feedback nama_jabatan_message d-none">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-btn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditData">
                        @csrf
                        <input id="id_jabatan" type="hidden" name="id_jabatan">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Jabatan</label>
                            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan">
                            <div class="invalid-feedback nama_jabatan_message d-none">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary edit-btn">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <script>
        $.get("http://localhost:8000/data/jabatan", function(result) {
            var index = 0;
            result.forEach(element => {
                index++
                $("tbody").append("<tr><th scope='row'>" + index + "</th><td>" + element.nama_jabatan + "</td><td><button type='button' class='btn btn-warning btn btn-sm btn-edit-modal' data-bs-toggle='modal' data-bs-target='#editDataModal' idJabatan='" + element.id_jabatan + "'>Edit Data</button><button type='button' class='btn btn-danger btn btn-sm btn-delete' idJabatan='" + element.id_jabatan + "'>delete Data</button></td></tr>")
            });

            $('.btn-delete').click(function() {
                var confirmed = window.confirm('anda yakin?');
                if (confirmed) {
                    $.ajax({
                        url: "http://localhost:8000/jabatan",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Content-Type': 'application/json'
                        },
                        method: 'DELETE',
                        data: JSON.stringify({
                            id_jabatan: $(this).attr('idJabatan')
                        }),
                        success: function(result) {
                           location.reload()
                        },
                        error: function(result) {
                            console.log(result)
                        },
                    });
                }
            });

            $(".btn-edit-modal").click(function(){
                $.get("http://localhost:8000/data/jabatan/"+$(this).attr('idJabatan'),function(result){
                    console.log('----')
                    console.log(result)
                    $("form#formEditData #nama_jabatan").val(result.nama_jabatan)
                    $("form#formEditData #id_jabatan").val(result.id_jabatan)
                });
            });

            $(".edit-btn").click(function(){
                $.ajax({
                    type: "PUT",
                    url: "http://localhost:8000/jabatan",
                    data: $("form#formEditData").serialize(),
                    success: function(result) {
                        location.reload();
                    },
                    error: function(result) {


                        if (result.status == 422) {

                            if (result.responseJSON.errors.hasOwnProperty('nama_jabatan')) {
                                $("form#formEditData .nama_jabatan_message").removeClass('d-none').append(result.responseJSON.errors.nama_jabatan[0])
                                $("form#formEditData #nama_jabatan").addClass('is-invalid')
                            }

                        }



                        console.log(result);
                    }
                });
            });
        });

        $.get("http://localhost:8000/data/jabatan", function(result) {
            result.forEach(element => {
                $("#id_jabatan").append("<option value='" + element.id_jabatan + "'>" + element.nama_jabatan + "</option>")
                $("form#formEditData #id_jabatan").append("<option value='" + element.id_jabatan + "'>" + element.nama_jabatan + "</option>")
            })
        });



        $(document).ready(function() {

            $(".save-btn").click(function() {

                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/jabatan",
                    data: $("form#formAddData").serialize(),
                    success: function(result) {
                        location.reload();
                    },
                    error: function(result) {


                        if (result.status == 422) {

                            if (result.responseJSON.errors.hasOwnProperty('nama_jabatan')) {
                                $(".nama_jabatan_message").removeClass('d-none').append(result.responseJSON.errors.nama_jabatan[0])
                                $("#nama_jabatan").addClass('is-invalid')
                            }
                        }

                    }
                });
            });



        });
    </script>
</body>

</html>