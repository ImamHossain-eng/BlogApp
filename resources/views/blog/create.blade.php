@extends('layouts.blogs')

@section('content')
<body>
        <br>
        <div class="card">
            <div class="card-header">
                <h3>Create New Blog</h3>
            </div>
            <div class="card-body">
                {{Form::open(['route'=>'blog.store', 'method'=>'PUT'])}}
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Enter the Title">
                    </div><br>
            
                    <div class="form-group">
                        <input type="text" name="body" class="form-control" placeholder="Enter the Body">
                    </div><br>
            
                    <input type="submit" value="Save" class="btn btn-primary">
                {{Form::close()}}
                <!--<form action="/blog" method="POST" enctype="multipart/form-data">
                    
                  
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Enter the Title">
                    </div><br>
            
                    <div class="form-group">
                        <input type="text" name="body" class="form-control" placeholder="Enter the Body">
                    </div><br>
            
                    <input type="submit" value="Save" class="btn btn-primary">
                </form>-->
            </div>
        </div>



    
</body>
@endsection