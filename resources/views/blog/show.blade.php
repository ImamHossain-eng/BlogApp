@extends('layouts.blogs')

@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3> {{$blog->title}} </h3>
        </div>
        <div class="card-body">
            <p>
                {{$blog->body}}
            </p>
        </div>
        <div class="card-footer">
            Inserted at: {{$blog->created_at->diffForHumans()}}
        </div>
    </div>
</body>
@endsection