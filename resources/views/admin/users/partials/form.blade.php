

@csrf

<div class="form-row">
    <div class="col form-group">
        <label for="name" class="form-label">Worker Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset">
        @error('ps_worker_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="col form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control "
            value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

@isset($create)
<div class="form-row">
    <div class="col form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
@endisset

<div class="mb-3">
    @foreach ($roles as $role)
        <div class="form-check mb-2">
            <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}"
                    @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
            <label for="{{ $role->name }}" class="form-check-label ml-2">
                {{ $role->name }}
            </label>

        </div>
    @endforeach
</div>

<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save</button>


