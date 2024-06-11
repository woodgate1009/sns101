@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="d-inline-flex">
                    <div class="p-3 d-flex flex-column">
                        <a href="{{ url('users/' .$user->id) }}"><img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="100" height="100"></a>
                        <div class="mt-3 d-flex flex-column">
                            <h4 class="mb-0 CountNumbers">{{ $user->name }}</h4>
                            <span class="text-secondary">{{ $user->screen_name }}</span>
                        </div>
                    </div>
                    <div class="p-3 d-flex flex-column justify-content-between">
                        <div class="d-flex">
                            <div>
                                @if ($user->id === Auth::user()->id)
                                    <a href="{{ url('users/' .$user->id .'/edit') }}" class="btn btn-primary">プロフィールの編集</a>
                                    @else
                                        @if ($is_following)
                                            <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">フォロー解除</button>
                                            </form>
                                        @else
                                            <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">フォロー</button>
                                            </form>
                                        @endif


                                    @if ($is_followed)
                                  </br><span class="mt-2 px-1 bg-secondary text-light">フォローされています</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="introdaction">

                        <div class="d-flex justify-content-end">
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="CountNumbers">ツイート</p>
                                <span style="font-weight:600;font-size:16px;">{{ $tweet_count }}</span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="CountNumbers">フォロー</p>
                                <span style="font-weight:600;font-size:16px;">{{ $follow_count }}</span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="CountNumbers">フォロワー</p>
                                <span style="font-weight:600;font-size:16px;">{{ $follower_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (isset($timelines))
            @foreach ($timelines as $timeline)
                <div class="col-md-8 mb-3">
                    <div class="card">
                      <div class="card-haeder p-3 w-100 d-flex">
                        <a href="{{ url('users/' .$user->id) }}"><img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="50" height="50"></a>
                      <div class="ml-2 d-flex flex-column flex-grow-1">
                                <p class="mb-0">{{ $timeline->user->name }}</p>
                                <a href="{{ url('users/' .$timeline->user->id) }}" class="text-secondary">{{ $timeline->user->screen_name }}</a>
                      </div>
                      <div class="d-flex justify-content-end flex-grow-1">
                       <p class="mb-0 text-secondary">{{ $timeline->created_at->format('Y-m-d H:i') }}</p>
                      </div>
                      @if ($timeline->user->id === Auth::user()->id)
                          <div class="dropdown mr-3 d-flex align-items-center" style="margin-top:-25px;margin-left:5px;">
                              <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v fa-fw" style="font-size:19px"></i>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <form method="POST" action="{{ url('tweets/' .$timeline->id) }}" class="mb-0">
                                      @csrf
                                      @method('DELETE')

                                      <a href="{{ url('tweets/' .$timeline->id .'/edit') }}" class="dropdown-item">編集</a>
                                      <button type="submit" class="dropdown-item del-btn">削除</button>
                                  </form>
                              </div>
                          </div>
                      @endif
                      </div>
                        <div class="card-body">
                            <a href="{{ url('tweets/' .$timeline->id) }}"  class="bodylinks"style="color:#000!important;text-decoration:none;">{{ $timeline->text }}</a>
                        </div>
                        <div class="card-footer py-1 d-flex justify-content-end bg-white">

                            <div class="mr-3 d-flex align-items-center button-1">
                                <a href="{{ url('tweets/' .$timeline->id) }}"><i class="far fa-comment fa-fw" style="font-size:19px;"></i></a>
                                <p class="mb-0 text-secondary">{{ count($timeline->comments) }}</p>
                            </div>
                            <div class="d-flex align-items-center button-1">
                                @if (!in_array(Auth::user()->id, array_column($timeline->favorites->toArray(), 'user_id'), TRUE))
                                    <form method="POST" action="{{ url('favorites/') }}" class="mb-0">
                                        @csrf

                                        <input type="hidden" name="tweet_id" value="{{ $timeline->id }}">
                                        <button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart fa-fw" style="font-size:19px;"></i></button>
                                    </form>
                                @else
                                    <form method="POST"action="{{ url('favorites/' .array_column($timeline->favorites->toArray(), 'id', 'user_id')[Auth::user()->id]) }}" class="mb-0">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn p-0 border-0 text-danger"><i class="fas fa-heart fa-fw" style="font-size:19px;"></i></button>
                                    </form>
                                @endif
                                <p class="mb-0 text-secondary">{{ count($timeline->favorites) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{ $timelines->links() }}
    </div>
    @extends('footer')
</div>
@endsection
