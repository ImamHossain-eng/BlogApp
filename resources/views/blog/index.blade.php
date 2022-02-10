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
                <a href="/blog/trash/all" class="btn btn-danger">Removed Blogs</a>                
                <table class="table table-striped table-hover table-light">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>DB ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Type</th>
                            <th>Create at</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $key => $blog)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$blog->id}}</td>
                                <td> {{$blog->title}} </td>
                                <td> {!! Str::limit($blog->body, 40, $end='....') !!} </td>
                                <td> {{$blog->type}} </td>
                                <td> {{$blog->created_at->diffForHumans()}} </td>
                                <td>
                                    <a href="/blog/{{$blog->id}}" title="Show this post" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="/blog/{{$blog->id}}/edit" class="btn btn-success" title="Edit this post">
                                        <i class="fa fa-check"></i>
                                    </a>                                    
                                    {{Form::open(['route' =>['blog.destroy', $blog->id], 'method'=>'DELETE', 'style'=>'display:inline;'])}}
                                        <button type="submit" title="Delete this post" 
                                        onclick="return confirm('Are you sure want to delete: {{$blog->title}}?')" 
                                        class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @empty 
                            <tr class="table-danger text-center">
                                <td colspan="7">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$blogs->links()}}
            </div>
        </div>
    </div>
    
</body>

@endsection