@if($errors->any())
    <div class="row">
        <div class="panel">
            <ol>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    </div>
@endif
