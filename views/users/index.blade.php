@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- 検索フォーム -->
                <form action="{{ route('users.search') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="query" class="form-control" placeholder="ユーザー名で検索" value="{{ request()->input('query') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">検索</button>
                        </div>
                    </div>
                </form>

                @if($all_users->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        見つかりませんでした。
                    </div>
                @else
                    @foreach ($all_users as $user)
                    <div class="card">
                        <div class="card-header p-3 w-100 d-flex">
                            <a href="{{ url('users/' . $user->id) }}">
                                <img src="{{ asset('storage/profile_image/' . $user->profile_image) }}" class="rounded-circle" width="50" height="50">
                            </a>
                            <div class="ml-2 d-flex flex-column">
                                <a href="{{ url('users/' . $user->id) }}" style="text-decoration: none;color:#000;">
                                    <p class="mb-0">{{ $user->name }}</p>
                                </a>
                                <a href="{{ url('users/' . $user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>
                            </div>
                            @if (auth()->user()->isFollowed($user->id))
                            <div class="px-2">
                                <span class="px-1 bg-secondary text-light">フォローされています</span>
                            </div>
                            @endif
                            <div class="d-flex justify-content-end flex-grow-1">
                                @if (auth()->user()->isFollowing($user->id))
                                <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                                </form>
                                @else
                                <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">フォローする</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- ページネーション -->
                    <div class="mt-3">
                        {{ $all_users->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
