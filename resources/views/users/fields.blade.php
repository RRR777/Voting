<!-- Name Field -->
<div class="form-group col-sm-6">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {{ Form::label('email', 'Email:') }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {{ Form::label('password', 'Password:') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-6">
    {{ Form::label('avatar', 'Avatar:') }}
    {{ Form::text('avatar', null, ['class' => 'form-control']) }}
</div>

<!-- Facebook Profile Field -->
<div class="form-group col-sm-6">
    {{ Form::label('facebook_url', 'Facebook Url:') }}
    {{ Form::text('facebook_url', null, ['class' => 'form-control']) }}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {{ Form::label('nickname', 'Nickname:') }}
    {{ Form::text('nickname', null, ['class' => 'form-control']) }}
</div>

<!-- Role_id Field -->
<div class="form-group col-sm-6">
    {{ Form::label('role_id', 'Role:') }}
    {{ Form::select('role_id', $roles, old('role_id'), ['placeholder' => 'Select a role ...', 'class' => 'form-control', 'required']) }}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>
