@extends('app')

@section('styles')

<title>Black Jack Volume 1 Chapter 1</title>


<style> 
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}
.image-column {
  display: flex;
  justify-self: center;
  flex-direction: column;
  align-items: center;
  gap: 10px;
}

</style>
@endsection

@section('content')

<body> 

<div class="image-column">
  @foreach($pages as $page)
    <img src="{{ asset($page->image) }}">
@endforeach
</div>

</body>
@endsection