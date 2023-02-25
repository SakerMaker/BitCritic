<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $game->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $game->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            <span class="text-danger">{{ $errors->first('image') }}</span>
        </div>

        <div class="form-group">
            {{ Form::label('fecha_salida') }}<br>
            {{ Form::date('fecha_salida', $game->fecha_salida, ['class' => 'form-control-sm' . ($errors->has('fecha_salida') ? ' is-invalid' : ''), 'placeholder' => 'Fecha salida']) }}
            {!! $errors->first('fecha_salida', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('genero') }}
            {{ Form::text('genero', $game->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : ''), 'placeholder' => 'Genero']) }}
            {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>