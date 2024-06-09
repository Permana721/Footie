<link rel="stylesheet" href="/assets/css/message.css">
@if (Session::has('success'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if ($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $data)
                    <li>{{ $data }}</li>
                @endforeach 
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif