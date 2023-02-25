@extends('layouts.app')

@section('template_title')
    Review
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Review') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reviews.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Game</th>
                                        <th>Id User</th>
                                        <th>Title</th>
                                        <th>Content</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $review->id_game }}</td>
											<td>{{ $review->id_user }}</td>
                                            <td>{{ $review->title }}</td>
                                            <td>{{ $review->content }}</td>

                                            <td>
                                                <form action="{{ route('reviews.destroy',$review->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reviews.show',$review->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reviews.edit',$review->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $reviews->links() !!}
            </div>
        </div>
    </div>
@endsection
