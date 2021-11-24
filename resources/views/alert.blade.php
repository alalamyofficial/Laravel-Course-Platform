@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <strong>{{ $error }}</strong>
            @endforeach
        </ul>
    </div>
@endif

