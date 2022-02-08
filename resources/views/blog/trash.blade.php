@extends('layouts.blogs')
@section('content')
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Removed Blog List</h3>
            </div>
            <div class="card-body">              
                <table class="table table-striped table-hover table-light">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>DB ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Type</th>
                            <th>Deleted at</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $key => $blog)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$blog->id}}</td>
                                <td> {{$blog->title}} </td>
                                <td> {{$blog->body}} </td>
                                <td> {{$blog->type}} </td>
                                <td> {{$blog->deleted_at->diffForHumans()}} </td>
                                <td>
                                   <a href="/blog/{{$blog->id}}/restore" title="Restore this Blog" class="btn btn-warning">
                                    <i class="fa fa-refresh"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty 
                            <tr class="table-danger text-center">
                                <td colspan="7">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>

@endsection