<form class="profile-form" method="post" action="{{ route('user.profile.update', $user) }}">

    @csrf
    @method('PATCH')

    <h3>{{ __('Information') }}</h3>

    <div class="form-group">
        <label>{{ __('Email') }}</label>
        <label>{{ $user->email }}</label>
    </div>

    <div class="form-group">
        <label>{{ __('Last name') }}</label>
        <input name="last_name" type="text" class="form-control" value="{{ $user->last_name }}">
    </div>

    <div class="form-group">
        <label>{{ __('First name') }}</label>
        <input name="first_name" type="text" class="form-control" value="{{ $user->first_name }}">
    </div>

    <div class="form-group">
        <label>{{ __('Middle name') }}</label>
        <input name="middle_name" type="text" class="form-control" value="{{ $user->middle_name }}">
    </div>

    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>

</form>
