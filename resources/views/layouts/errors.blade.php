@if(count($errors))

    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                @if ($error == 'validation.profanity')
                    <li>The text can't contain any profanity</li>
                @else
                    <li>{{ $error }}</li>
                @endif
            @endforeach
        </ul>
    </div>
@endif