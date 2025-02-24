@extends('layouts.public')

@section('title', $page->title)

@section('public-content')
    <div class="home-content">
        @foreach($blocks as $block)
            @php
                $view = 'blocks.' . $block->type;
            @endphp

            @if (view()->exists($view))
                @include($view, ['block' => $block])
            @endif

        @endforeach
    </div>
@endsection
