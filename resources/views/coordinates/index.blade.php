@extends('layouts.default')

@section('title', $title)

@section('content')
<h1 class="mb-3">{{ $title }}</h1>
<a href="{{ route('coordinates.create', $user) }}" class="btn btn-primary mb-3">
    @if(\Auth::id() === $user->id)
        新規コーデ登録
    @else
        新規コーデ提案
    @endif
</a>

<section class="mt-5">
<h2>登録コーデ</h2>
<ul class="list-unstyled mt-4">
    @forelse($my_coordinates as $coordinate)
        <li class="border rounded border-primary mb-4 ml-3 mr-3">
            <h3 class="ml-2 mt-2">{{ $coordinate->title }}</h3>
            <div class="row mx-1">
                <div class="item col-4 col-lg-2 offset-lg-1 mb-2">
                    <div class="card">
                        <h4 class="text-center">Outer</h4>
                        <div class="coorde_image_box bg-light">
                            @if($coordinate->outer)
                                <img src="{{ \Storage::url($coordinate->outer->image) }}" class="coorde_image">
                            @else
                                <img src="{{ asset('images/noitem.png') }}" class="coorde_image">
                            @endif
                        </div>
                        <div class="coorde_item_name d-flex align-items-center justify-content-center">
                            <span class="text-center">
                                @if($coordinate->outer)
                                    {{  $coordinate->outer->name }}
                                @else
                                    選択なし
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="item col-4 col-lg-2 mb-2">
                    <div class="card">
                        <h4 class="text-center">Tops</h4>
                        <div class="coorde_image_box bg-light">
                            <img src="{{ \Storage::url($coordinate->tops->image) }}" class="coorde_image">
                        </div>
                        <div class="coorde_item_name d-flex align-items-center justify-content-center">
                            <span class="text-center">{{  $coordinate->tops->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="item col-4 col-lg-2 mb-2">
                    <div class="card">
                        <h4 class="text-center">Bag</h4>
                        <div class="coorde_image_box bg-light">
                            @if($coordinate->bag)
                                <img src="{{ \Storage::url($coordinate->bag->image) }}" class="coorde_image">
                            @else
                                <img src="{{ asset('images/noitem.png') }}" class="coorde_image">
                            @endif
                        </div>
                        <div class="coorde_item_name d-flex align-items-center justify-content-center">
                            <span class="text-center">
                                @if($coordinate->bag)
                                    {{  $coordinate->bag->name }}
                                @else
                                    選択なし
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="item col-4 col-lg-2 offset-2 offset-lg-0 mb-2">
                    <div class="card">
                        <h4 class="text-center">Bottoms</h4>
                        <div class="coorde_image_box bg-light">
                            <img src="{{ \Storage::url($coordinate->bottoms->image) }}" class="coorde_image">
                        </div>
                        <div class="coorde_item_name d-flex align-items-center justify-content-center">
                            <span class="text-center">
                                {{  $coordinate->bottoms->name }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="item col-4 col-lg-2 mb-2">
                    <div class="card">
                        <h4 class="text-center">Shoes</h4>
                        <div class="coorde_image_box bg-light">
                            <img src="{{ \Storage::url($coordinate->shoes->image) }}" class="coorde_image">
                        </div>
                        <div class="coorde_item_name d-flex align-items-center justify-content-center">
                            <span class="text-center">
                                {{  $coordinate->shoes->name }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-11 ml-3 mt-2 mb-1">
                    <div class="card pl-1 mb-2">
                        概要：{{ $coordinate->description }}
                    </div>
                </div>
            </div>
            <div class="d-flex mb-2">
                <a href="{{ route('coordinates.show', $coordinate) }}" class="btn btn-warning ml-3">詳細を見る</a>
                @if(\Auth::id() === $user->id)
                <form  class="ml-3" action="{{ route('coordinates.destroy', [$user, $coordinate]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-secondary delete">削除</button>
                </form>
                @endif
            </div>
        </li>
    @empty
        <li>登録したコーディネートはありません</li>
    @endforelse
</ul>
</section>

<section class="mt-5">
<h2>提案コーデ</h2>
<ul class="list-unstyled mt-4">
    @forelse($suggested_coordinates as $coordinate)
    <li class="border rounded border-primary mb-4 ml-3 mr-3">
        <h3 class="ml-2 mt-2">{{ $coordinate->title }}</h3>
        <div class="row mx-1">
            <div class="item col-4 col-lg-2 offset-lg-1 mb-2">
                <div class="card">
                    <h4 class="text-center">Outer</h4>
                    <div class="coorde_image_box bg-light">
                        @if($coordinate->outer)
                            <img src="{{ \Storage::url($coordinate->outer->image) }}" class="coorde_image">
                        @else
                            <img src="{{ asset('images/noitem.png') }}" class="coorde_image">
                        @endif
                    </div>
                    <div class="coorde_item_name d-flex align-items-center justify-content-center">
                        <span class="text-center">
                            @if($coordinate->outer)
                                {{  $coordinate->outer->name }}
                            @else
                                選択なし
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="item col-4 col-lg-2 mb-2">
                <div class="card">
                    <h4 class="text-center">Tops</h4>
                    <div class="coorde_image_box bg-light">
                        <img src="{{ \Storage::url($coordinate->tops->image) }}" class="coorde_image">
                    </div>
                    <div class="coorde_item_name d-flex align-items-center justify-content-center">
                        <span class="text-center">{{  $coordinate->tops->name }}</span>
                    </div>
                </div>
            </div>
            <div class="item col-4 col-lg-2 mb-2">
                <div class="card">
                    <h4 class="text-center">Bag</h4>
                    <div class="coorde_image_box bg-light">
                        @if($coordinate->bag)
                            <img src="{{ \Storage::url($coordinate->bag->image) }}" class="coorde_image">
                        @else
                            <img src="{{ asset('images/noitem.png') }}" class="coorde_image">
                        @endif
                    </div>
                    <div class="coorde_item_name d-flex align-items-center justify-content-center">
                        <span class="text-center">
                            @if($coordinate->bag)
                                {{  $coordinate->bag->name }}
                            @else
                                選択なし
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="item col-4 col-lg-2 offset-2 offset-lg-0 mb-2">
                <div class="card">
                    <h4 class="text-center">Bottoms</h4>
                    <div class="coorde_image_box bg-light">
                        <img src="{{ \Storage::url($coordinate->bottoms->image) }}" class="coorde_image">
                    </div>
                    <div class="coorde_item_name d-flex align-items-center justify-content-center">
                        <span class="text-center">
                            {{  $coordinate->bottoms->name }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="item col-4 col-lg-2 mb-2">
                <div class="card">
                    <h4 class="text-center">Shoes</h4>
                    <div class="coorde_image_box bg-light">
                        <img src="{{ \Storage::url($coordinate->shoes->image) }}" class="coorde_image">
                    </div>
                    <div class="coorde_item_name d-flex align-items-center justify-content-center">
                        <span class="text-center">
                            {{  $coordinate->shoes->name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-11 ml-3 mt-2 mb-1">
                <div class="card pl-1 mb-2">
                    提案者：{{ $coordinate->madeUser_name }}
                    <br>
                    概要：{{ $coordinate->description }}
                </div>
            </div>
        </div>
        <div class="d-flex mb-2">
            <a href="{{ route('coordinates.show', $coordinate) }}" class="btn btn-warning ml-3">詳細を見る</a>
            @auth
                @if(\Auth::id() === $user->id || \Auth::id() === $coordinate->madeUser_id)
                <form  class="ml-3" action="{{ route('coordinates.destroy', [$user, $coordinate]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-secondary delete">削除</button>
                </form>
                @endif
            @endauth
        </div>
    </li>
    @empty
        <li>提案されたコーディネートはありません</li>
    @endforelse
</ul>
</section>


@endsection
