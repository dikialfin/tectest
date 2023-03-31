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

    <h3>Data Kontrak</h3>
    <button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#addDataModal'>Tambah Data</button>

    <table class="table ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Join Date</th>
                <th scope="col">End Date</th>
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
                            <label for="id_pegawai" class="form-label">Nama Pegawai</label>
                            <select class="form-select" aria-label="Default select example" name="id_pegawai" id="id_pegawai">
                            </select>
                            <div class="invalid-feedback id_pegawai_message d-none">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="join_date" class="form-label">Join Date</label>
                            <input type="date" class="form-control" id="join_date" name="join_date">
                            <div class="invalid-feedback join_date_message d-none">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                            <div class="invalid-feedback end_date_message d-none">
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
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="id_pegawai" name="id_pegawai">
                            <fieldset disabled>
                            <label for="nama_lengkap" class="form-label">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama_lengkap">
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <label for="join_date" class="form-label">Join Date</label>
                            <input type="date" class="form-control" id="join_date" name="join_date">
                            <div class="invalid-feedback join_date_message d-none">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                            <div class="invalid-feedback end_date_message d-none">
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
        $.get("http://localhost:9000/pegawai",function(result){
            result.forEach(element => {
                $("form#formAddData #id_pegawai").append("<option value='" + element.id_pegawai + "'>" + element.nama_lengkap + "</option>")
            });
        });

        $.get("http://localhost:9000/kontrak", function(result) {

            if (result.length > 0) {

                var index = 0;
            result.forEach(element => {
                index++
                $("tbody").append("<tr><th scope='row'>" + index + "</th><td>" + element.nama_lengkap + "</td><td>"+element.join_date+"</td><td>"+element.end_date+"</td><td><button type='button' class='btn btn-warning btn btn-sm btn-edit-modal' data-bs-toggle='modal' data-bs-target='#editDataModal' idKontrak='" + element.id_kontrak + "'>Edit Data</button><button type='button' class='btn btn-danger btn btn-sm btn-delete' idKontrak='" + element.id_kontrak + "'>delete Data</button></td></tr>")
            });
            } else {
                $("tbody").append("<tr><td colspan='4' class='text-center'>no data</td></tr>")
            }

            $('.btn-delete').click(function() {
                var confirmed = window.confirm('anda yakin?');
                if (confirmed) {
                    $.ajax({
                        url: "http://localhost:8000/kontrak",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Content-Type': 'application/json'
                        },
                        method: 'DELETE',
                        data: JSON.stringify({
                            id_kontrak: $(this).attr('idKontrak')
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
                $.get("http://localhost:9000/kontrak/"+$(this).attr('idKontrak'),function(result){
                    $("form#formEditData #nama_lengkap").val(result.nama_lengkap)
                    $("form#formEditData #id_pegawai").val(result.id_pegawai)
                    $("form#formEditData #join_date").val(result.join_date)
                    $("form#formEditData #end_date").val(result.end_date)
                });
            });

            $(".edit-btn").click(function(){
                console.log($("form#formEditData").serialize())
                $.ajax({
                    type: "PUT",
                    url: "http://localhost:8000/kontrak",
                    data: $("form#formEditData").serialize(),
                    success: function(result) {
                        location.reload();
                    },
                    error: function(result) {


                        if (result.status == 422) {

                            if (result.responseJSON.errors.hasOwnProperty('id_pegawai')) {
                                $("form#formEditData .id_pegawai_message").removeClass('d-none').append(result.responseJSON.errors.id_pegawai[0])
                                $("form#formEditData #id_pegawai").addClass('is-invalid')
                            }
                            if (result.responseJSON.errors.hasOwnProperty('join_date')) {
                                $(".join_date_message").removeClass('d-none').append(result.responseJSON.errors.join_date[0])
                                $("#join_date").addClass('is-invalid')
                            }
                            if (result.responseJSON.errors.hasOwnProperty('edn_date')) {
                                $(".edn_date_message").removeClass('d-none').append(result.responseJSON.errors.edn_date[0])
                                $("#edn_date").addClass('is-invalid')
                            }

                        }

                    }
                });
            });
        });

        $(document).ready(function() {

            $(".save-btn").click(function() {

                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/kontrak",
                    data: $("form#formAddData").serialize(),
                    success: function(result) {
                        location.reload();
                    },
                    error: function(result) {


                        if (result.status == 422) {

                            if (result.responseJSON.errors.hasOwnProperty('id_pegawai')) {
                                $(".id_pegawai_message").removeClass('d-none').append(result.responseJSON.errors.id_pegawai[0])
                                $("#id_pegawai").addClass('is-invalid')
                            }
                            if (result.responseJSON.errors.hasOwnProperty('join_date')) {
                                $(".join_date_message").removeClass('d-none').append(result.responseJSON.errors.join_date[0])
                                $("#join_date").addClass('is-invalid')
                            }
                            if (result.responseJSON.errors.hasOwnProperty('end_date')) {
                                $(".end_date_message").removeClass('d-none').append(result.responseJSON.errors.end_date[0])
                                $("#end_date").addClass('is-invalid')
                            }
                        }

                    }
                });
            });



        });
    </script>
</body>

</html>