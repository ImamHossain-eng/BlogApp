@extends('layouts.blogs')

@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3> {{$blog->title}} </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('images/blogs/'.$blog->image)}}" alt="" class="img-thumbnail w-100">
                </div>
                <div class="col-md-8">
                    <p>
                        {!! $blog->body !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-4">
                    Inserted: {{$blog->created_at->diffForHumans()}}
                </div>
                <div class="col-md-4">
                    Inserted at: {{date('F d, Y', strtotime($blog->created_at))}} 
                              at {{date('g:ia', strtotime($blog->created_at))}}
                </div>
                <div class="col-md-4">
                    Updated at: 
                    @if($blog->created_at != $blog->updated_at)
                     {{date('F d, Y', strtotime($blog->updated_at))}} 
                    at {{date('g:ia', strtotime($blog->updated_at))}}
                    @else Not Updated Yet
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
@endsection