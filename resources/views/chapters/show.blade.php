@extends('app')

@section('content')

<div style="background:black; padding:20px;">

    <h1 style="color:white;">
        {{ $book->title }}
        -
        Chapter {{ $chapter->chapter_number }}
    </h1>

    @foreach($pages as $page)

        <img
            src="{{ asset('storage/' . $page->image) }}"
            style="
                width:100%;
                max-width:900px;
                display:block;
                margin:auto;
                margin-bottom:20px;
            ">

    @endforeach

</div>

@endsection