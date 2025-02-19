@if (session('successProfilePicture'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('successProfilePicture') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session('successEditProfile'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('successEditProfile') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session('errorUsernameTaken'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('errorUsernameTaken') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session('errorOldPassword'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('errorOldPassword') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session('errorNewPassword'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('errorNewPassword') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session('successChangePassword'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('successChangePassword') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session('errorNewEmailTaken'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('errorNewEmailTaken') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session('errorNewEmailPassword'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('errorNewEmailPassword') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session('successChangeEmail'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('successChangeEmail') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session('errorDeleteAccount'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('errorDeleteAccount') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session('deleteProfilePicture'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('deleteProfilePicture') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session('deletePost'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('deletePost') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
