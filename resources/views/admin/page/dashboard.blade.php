@extends('admin.layout.index')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@section('content')
    <div class="d-flex flex-wrap gap-4">
        <div class="card" style="width: 250px;">
            <div class="card-body m-auto">
                <div class="d-flex gap-4 align-items-center m-auto">
                    <span class="material-icons fs-1 p-0 m-0" style="font-size:52px; color:lightgray;">
                        inventory
                    </span>
                    <span class="fs-1 p-0 m-0">{{ $totalProduct }}</span>
                </div>
            </div>
            <div class="card-footer">
                <h5>Total Produk</h5>
            </div>
        </div>
        <div class="card" style="width: 250px;">
            <div class="card-body m-auto">
                <div class="d-flex gap-4 align-items-center m-auto">
                    <span class="material-icons fs-1 p-0 m-0" style="font-size:52px; color:lightgray;">
                        people
                    </span>
                    <span class="fs-1 p-0 m-0">{{ $totalUser }}</span>
                </div>
            </div>
            <div class="card-footer">
                <h5>Total User</h5>
            </div>
        </div>
    </div>

    @if(session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
            });
        </script>
    @endif

@endsection