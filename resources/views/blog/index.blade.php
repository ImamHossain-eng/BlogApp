@extends('layouts.blogs')
@section('content')
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Blog Index</h3>
            </div>
            <div class="card-body">
                <a href="/blog/create" class="btn btn-primary">Add New Blog</a>                
                <table class="table table-striped table-hover table-light">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>BD ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Create at</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $key => $blog)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$blog->id}}</td>
                                <td> {{$blog->title}} </td>
                                <td> {{$blog->body}} </td>
                                <td> {{$blog->created_at->diffForHumans()}} </td>
                                <td>
                                    <a href="/blog/{{$blog->id}}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    
                                    {{Form::open(['route' =>['blog.destroy', $blog->id], 'method'=>'DELETE', 'style'=>'display:inline;'])}}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>

@endsection