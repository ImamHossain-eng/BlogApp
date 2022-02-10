@extends('layouts.blogs')

@section('content')
<body>
        <br>
        <div class="card">
            <div class="card-header">
                <h3>Edit Blog with id {{$blog->id}}</h3>
            </div>
            <div class="card-body">
                {{Form::open(['route'=> ['blog.update', $blog->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data'])}}
                {{-- @csrf  --}}
                {{-- {{method_field('PUT')}} --}}
                {{-- @method('PUT') --}}

                    <div class="form-group">
                        <input type="text" name="title" value="{{$blog->title}}" class="form-control" placeholder="Enter the Title">
                        {{-- {{Form::text('title', old('title'), ['placeholder'=>'Enter the title', 'class'=> 'form-control'])}} --}}
                    </div><br>
            
                    <div class="form-group">
                        {{-- <input type="text" name="body" value="{{$blog->body}}" class="form-control" placeholder="Enter the Body"> --}}
                        <textarea name="body" class="form-control" placeholder="Enter the body of this Blog">
                            {{$blog->body}}
                        </textarea>
                    </div><br>

                    <div class="form-group">
                        <input type="file" name="image" class="form-control">
                    </div><br>

                    <div class="form-group">
                        <select name="type" class="form-control">
                            <option value="{{$blog->type}}">Current type: {{$blog->type}}</option>
                            <option value="sports">Sports</option>
                            <option value="entertainment">Entertainment</option>
                        </select>
                    </div><br>
            
                    <input type="submit" value="Update" class="btn btn-primary">
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