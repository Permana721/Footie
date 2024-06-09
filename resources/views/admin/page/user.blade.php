@extends('admin.layout.index')

@section('content')

    <div class="card">
        <div class="card-body d-flex flex-row justify-content-between">
            <div class="card-header bg-transparent">
                <button class="btn btn-info" id="addData">
                    <i class="fa fa-plus"></i>
                    <span>Tambah User</span>
                </button>
            </div>
            <form action="{{ url('/admin/user_management') }}" method="get" class="form-inline">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Cari..." name="search" value="{{ Request::get('search') }}" aria-label="search">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card rounded-full">

        <div class="card-body">
            <table class="table table-responsive table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Join Date</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->isEmpty())
                        <tr class="text-center">
                            <td colspan="9">Tidak ada User</td>
                        </tr>
                    @else
                        <?php $y = $data->firstItem() ?>
                        @foreach ($data as $x)
                            <tr class="align-middle">
                                <td>{{ $y }}</td>
                                    <td>
                                        <img src="{{ asset('storage/user/' . $x->foto) }}" style="width:100px;">
                                    </td>
                                    <td>{{ $x->created_at}}</td>
                                    <td>{{ $x->name}}</td>
                                    <td>{{ $x->email}}</td>
                                    <td>{{ $x->tlp}}</td>
                                    <td>{{ $x->jenis_kelamin}}</td>
                                    <td> 
                                        <span class="badge text-bg-{{ $x->role == 1 ? 'info' : 'success' }}">{{ $x->role == 1 ? 'Admin' : 'User' }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-info editModal" data-id="{{$x->id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger deleteData" data-id="{{ $x->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                            </tr>
                        <?php $y++ ?>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="pagination d-flex flex-row justify-content-between">
                <div class="showData">
                    Menampilkan {{ $data->count() }} user dari total {{ $data->total() }} user
                </div>
                <div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="tampilData" style="display: none;"></div>
    <div class="tampilEditData" style="display: none;"></div>

    @if(session('success'))
        <div id="swalContainer" data-message="{{ session('success') }}"></div>
    @elseif(session('errors'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session('errors') }}',
                icon: 'error',
            });
        </script>
    @endif

    <script>
        $('#addData').click(function() {
            $.ajax({
                url: '{{ route('addModalUser') }}',
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#userTambah').modal("show");
                }
            });
        });

        $('.editModal').click(function (e) { 
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "{{route('showDataUser', ['id'=> ':id'])}}".replace(':id',id),
                success: function (response) {
                    $('.tampilEditData').html(response).show();
                    $('#editModal').modal("show");
                }
            });
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr("content"),
            }
        })

        $(document).ready(function() {
            var successMessage = $('#swalContainer').data('message');
            if(successMessage) {
                Swal.fire('Berhasil!', successMessage, 'success');
            }
        });

        $('.deleteData').click(function (e) { 
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: "Apakah anda yakin",
                text: "ingin menghapus user ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('destroyDataUser', ['id' => ':id']) }}".replace(':id', id),
                        success: function (response) {
                            Swal.fire('Berhasil!', 'User telah dihapus.', 'success').then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire('Berhasil!', 'User telah dihapus.', 'success').then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            })
        });
    </script>
@endsection