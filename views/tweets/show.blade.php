@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-haeder p-3 w-100 d-flex">
                    <a href="{{ url('users/' .$tweet->user->id) }}"><img src="{{ asset('storage/profile_image/' .$tweet->user->profile_image) }}" class="rounded-circle" width="50" height="50"></a>
                    <div class="ml-2 d-flex flex-column">
                        <a href="{{ url('users/' .$tweet->user->id) }}" style="color:#000;text-decoration:none;"><p class="mb-0">{{ $tweet->user->name }}</p></a>
                        <a href="{{ url('users/' .$tweet->user->id) }}" class="text-secondary">{{ $tweet->user->screen_name }}</a>
                    </div>
                    <div class="d-flex justify-content-end flex-grow-1">
                        <p class="mb-0 text-secondary">{{ $tweet->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                    @if ($tweet->user->id === Auth::user()->id)
                        <div class="dropdown mr-3 d-flex align-items-center" style="margin-top:-25px;margin-left:5px;">
                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-fw" style="font-size:19px;"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <form method="POST" action="{{ url('tweets/' .$tweet->id) }}" class="mb-0">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ url('tweets/' .$tweet->id .'/edit') }}" class="dropdown-item">編集</a>
                                    <button type="submit" class="dropdown-item del-btn">削除</button>
                                </form>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="card-body">
                    {!! nl2br(e($tweet->text)) !!}
                </div>
                <div class="card-footer py-1 d-flex justify-content-end bg-white">

                    <div class="mr-3 d-flex align-items-center button-1">
                        <a href="{{ url('tweets/' .$tweet->id) }}"><i class="far fa-comment fa-fw" style="font-size:19px;"></i></a>
                        <p class="mb-0 text-secondary">{{ count($tweet->comments) }}</p>
                    </div>
                    <div class="d-flex align-items-center button-1">
                        @if (!in_array($user->id, array_column($tweet->favorites->toArray(), 'user_id'), TRUE))
                            <form method="POST" action="{{ url('favorites/') }}" class="mb-0">
                                @csrf

                                <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                <button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart fa-fw" style="font-size:19px;"></i></button>
                            </form>
                        @else
                            <form method="POST" action="{{ url('favorites/' .array_column($tweet->favorites->toArray(), 'id', 'user_id')[$user->id]) }}" class="mb-0">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn p-0 border-0 text-danger"><i class="fas fa-heart fa-fw" style="font-size:19px;"></i></button>
                            </form>
                        @endif
                        <p class="mb-0 text-secondary">{{ count($tweet->favorites) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <ul class="list-group">
                @forelse ($comments as $comment)
                    <li class="list-group-item">
                        <div class="py-3 w-100 d-flex">
                            <a href="{{ url('users/' .$tweet->user->id) }}"><img src="{{ asset('storage/profile_image/' .$comment->user->profile_image) }}" class="rounded-circle" width="50" height="50"></a>
                            <div class="ml-2 d-flex flex-column">
                                <a href="{{ url('users/' .$tweet->user->id) }}" style="color:#000;text-decoration:none;"><p class="mb-0">{{ $comment->user->name }}</p></a>
                                <a href="{{ url('users/' .$comment->user->id) }}" class="text-secondary">{{ $comment->user->screen_name }}</a>
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">{{ $comment->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                        <div class="py-3">
                            {!! nl2br(e($comment->text)) !!}
                        </div>
                    </li>
                @empty

                @endforelse
                <li class="list-group-item">
                    <div class="py-3">
                        <form method="POST" action="{{ route('comments.store') }}">
                            @csrf

                            <div class="form-group row mb-0">
                                <div class="col-md-12 p-3 w-100 d-flex">
                                    <a href="{{ url('users/' .$tweet->user->id) }}"><img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="50" height="50"></a>
                                    <div class="ml-2 d-flex flex-column">
                                        <a href="{{ url('users/' .$tweet->user->id) }}" style="color:#000;text-decoration:none;"><p class="mb-0">{{ $user->name }}</p></a>
                                        <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                    <textarea class="form-control @error('text') is-invalid @enderror" name="text" required autocomplete="text" rows="4">{{ old('text') }}</textarea>

                                    @error('text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-right">

                                    <button type="submit" class="btn btn-primary">
                                        コメント
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @extends('footer')
</div>
@endsection
