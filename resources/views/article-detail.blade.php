@extends('layouts.app')

@section('title', 'Artikel | ')

@section('content')
    <section class="section blog-single">
        <div class="container" id="container" data-id="{{ $id }}">
            <div class="row justify-center">
                <div class="lg:col-10 mt-14">
                    <img src="" alt="" id="article-image" class="mx-auto shadow-lg"/>
                </div>
                <div class="mt-10 max-w-[810px] lg:col-9">
                    {{-- title --}}
                    <h1 class="h2 dark:text-white" id="title">{{ $title }}</h1>
                    <div class="">
                        {{-- username --}}
                        <p class="text-dark dark:text-white" id="username">{{ $user['name'] }}</p>
                        {{-- date --}}
                        <span class="text-sm flex" id="date">{{ $date }}</span>
                    </div>
                    {{-- content --}}
                    <div class="content dark:text-white" id="content">
                        {!! $content !!}
                    </div>
                    <div class="flex flex-wrap gap-1" id="tags">
                        Tag :
                        @foreach ($tags as $tag)
                            <span class="tag">
                            <a href="/article?tag={{ $tag['name'] }}" >{{ $tag['name'] }}</a>
                            </span>
                        @endforeach
                    </div>
{{--                    <div class="mt-10 flex justify-center items-center">--}}
{{--                        <video class="media w-full" id="video" controls>--}}
{{--                            <source type="video/mp4">--}}
{{--                        </video>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
{{--    <script src="{{ asset('assets/js/pages/article-detail.js') }}"></script>--}}
@endpush
