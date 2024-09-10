@extends('base.base2')

@section('content')
<div class="container my-4 mx-auto">
    <article>
        <h1 class="text-2xl font-bold">{{ $course['course_name'] }} || {{ $course['course_id'] }}</h1>
        <hr>
        <p><span class="font-bold">Nama Inggris:</span>{{ $course['course_name_en'] }}</p>
        <p><span class="font-bold">Tahun: </span>{{ $course['curriculum_year'] }}</p>
        <p><span class="font-bold">Details: </span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus sint ad laborum delectus. Reiciendis incidunt, tempore, fugit esse magni iste culpa modi laudantium sint, a veritatis sunt ipsam labore non.</p>
        <a href="/courses" class="underline text-slate-700">Back to All Courses</a>
    </article>
</div>
@endsection