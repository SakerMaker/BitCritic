<div class="box box-info padding-1">
    <div class="box-body">
        

        <div class="form-group {{ $errors->has('id_user') ? 'has-error' : '' }}">
            <label for="id_user">Id user</label>
            <select name="id_user" class="form-control">
                <option value="" selected>Seleccionar</option>
                @foreach ($allUsers as $user)
                @if ($comment->id_user==$user->id)
                <option selected value="{{$user->id}}">{{$user->name}}-{{$user->id}}</option>
                @else
                <option value="{{$user->id}}">{{$user->name}}-{{$user->id}}</option>
                @endif
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('id_user') }}</span>
        </div>

        <div class="form-group {{ $errors->has('id_review') ? 'has-error' : '' }}">
            <label for="id_review">Id review</label>
            <select name="id_review" class="form-control">
                <option value="" selected>Seleccionar</option>
                @foreach ($allReviews as $review)
                @if ($comment->id_review==$review->id)
                <option selected value="{{$review->id}}">{{$review->title}}-{{$review->id}}</option>
                @else
                <option value="{{$review->id}}">{{$review->title}}-{{$review->id}}</option>
                @endif
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('id_review') }}</span>
        </div>

        <div class="form-group">
            {{ Form::label('content') }}
            {{ Form::text('content', $comment->content, ['class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Content']) }}
            {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>