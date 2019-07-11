@extends('layouts.base')

@section('content')
<div id="profile-container">

</div>
    {{-- <h2>
        {{ $user->name }}
    </h2>
    <p>
        email: {{ $user->email }}
    </p>
    <a href="javascript:openChangePassword();">
        <p>
            change password
        </p>
    </a>
    <p>
        posts: {{ Count($user->posts) }}
    </p>
    <p>
        comments: {{ count($user->comments) }}
    </p> --}}

    <div id="change-password" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-light">Modal title</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close" >
                        <span class="text-light" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/user/{{ $user->name }}">
                        @csrf
                        @method('PUT')
                        <label for="password_old">Old password</label>
                        <input type="password" name="password_old" id="password_old" class="form-control mb-1" required>
                        <label for="password">New password</label>
                        <input type="password" name="password" id="password" class="form-control mb-1" required>
                        <label for="password_confirmed">Confrim password</label>
                        <input type="password" name="password_confirmed" id="password_confirm" class="form-control mb-2" required>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary mr-2">Close</button>
                            <input type="submit" value="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
@endsection