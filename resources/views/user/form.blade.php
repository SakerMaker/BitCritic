
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('password') }}
            {{ Form::text('password', $user->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('location') }}
            {{ Form::text('location', $user->location, ['class' => 'form-control' . ($errors->has('location') ? ' is-invalid' : ''), 'placeholder' => 'Location photo path']) }}
            {!! $errors->first('location', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group {{ $errors->has('profile_photo_path') ? 'has-error' : '' }}">
            <label for="profile_photo_path">Profile photo path</label>
            <input type="file" name="profile_photo_path" class="form-control">
            <span class="text-danger">{{ $errors->first('profile_photo_path') }}</span>
        </div>

        <div class="form-group {{ $errors->has('banner_photo_path') ? 'has-error' : '' }}">
            <label for="banner_photo_path">Banner photo path</label>
            <input type="file" name="banner_photo_path" class="form-control">
            <span class="text-danger">{{ $errors->first('banner_photo_path') }}</span>
        </div>


        <div class="form-group">
            {{ Form::label('about_you') }}
            {{ Form::text('about_you', $user->about_you, ['class' => 'form-control' . ($errors->has('about_you') ? ' is-invalid' : ''), 'placeholder' => 'About you']) }}
            {!! $errors->first('about_you', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
