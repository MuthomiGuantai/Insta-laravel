@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img
                src="https://instagram.fmba1-1.fna.fbcdn.net/v/t51.2885-19/s150x150/67167453_341653786718820_6068681814497558528_n.jpg?_nc_ht=instagram.fmba1-1.fna.fbcdn.net&_nc_ohc=ppBW0rg1YNYAX-tlYqg&oh=df466ee7dab95d3d154bf4d9a6ff72ba&oe=5F8269C0"
                class="rounded-circle"
            />
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                @can('update', $user->profile)
                <a href="/p/create">Add new Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-3">
                    <strong>{{ $user->posts->count() }}</strong> posts
                </div>
                <div class="pr-3"><strong>400</strong> followers</div>
                <div class="pr-3"><strong>460</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">
                {{ $user->profile->title }}
            </div>
            <div>
                {{ $user->profile->description }}
            </div>
            <div>
                <a
                    href="https://muthomiguantai.github.io/MuthomiGuantai.com/"
                    >{{ $user->profile->url ?? 'N/A' }}</a
                >
            </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100" />
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
