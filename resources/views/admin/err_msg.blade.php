@if ($errors->any())
    <div class="alert alert-danger myerre">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {{-- include('admin.err_msg') --}}

