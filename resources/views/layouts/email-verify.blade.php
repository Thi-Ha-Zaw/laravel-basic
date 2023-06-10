@user
@if (is_null(session('auth')->email_verified_at))
    <div class=" alert alert-info">Verify Your Accout <a href="{{ route('auth.verifyEmail') }}"
            class=" alert-link">Here</a> </div>
@endif
@enduser
