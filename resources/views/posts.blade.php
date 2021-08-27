@extends('layout')

@section('banner')
    <h1>El super Blog</h1>
@endsection

@section('content')

    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <article>
                <h1>
                    <a href="/post/<?= $post->slug?>">
                        <?= $post->title ?>
                    </a>
                </h1>
                <p><?= $post->resumen ?></p>
            </article>
        @endforeach
    @else
        I don't have any posts!
    @endif 
@endsection