<div class="box box-info padding-1">
    <div class="box-body">
        

        <div class="form-group {{ $errors->has('id_game') ? 'has-error' : '' }}">
            <label for="id_game">Id game</label>
            <select name="id_game" class="form-control">
                <option value="" selected>Seleccionar</option>
                @foreach ($allGames as $game)
                @if ($review->id_game==$game->id)
                <option selected value="{{$game->id}}">{{$game->title}}-{{$game->id}}</option>
                @else
                <option value="{{$game->id}}">{{$game->title}}-{{$game->id}}</option>
                @endif
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('id_game') }}</span>
        </div>

        <div class="form-group {{ $errors->has('id_user') ? 'has-error' : '' }}">
            <label for="id_user">Id user</label>
            <select name="id_user" class="form-control">
                <option value="" selected>Seleccionar</option>
                @foreach ($allUsers as $user)
                @if ($review->id_user==$user->id)
                <option selected value="{{$user->id}}">{{$user->name}}-{{$user->id}}</option>
                @else
                <option value="{{$user->id}}">{{$user->name}}-{{$user->id}}</option>
                @endif
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('id_user') }}</span>
        </div>

        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $review->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('content') }}
            {{ Form::text('content', $review->content, ['class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Content']) }}
            {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
        </div>



    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>