@extends('layouts.blogs')

@section('content')
<body>
        <br>
        <div class="card">
            <div class="card-header">
                <h3>Create New Blog</h3>
            </div>
            <div class="card-body">
                {{Form::open(['route'=>'blog.store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])}}
                {{-- @csrf  --}}
                {{-- {{method_field('PUT')}} --}}
                {{-- @method('PUT') --}}

                    <div class="form-group">
                        {{-- <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Enter the Title"> --}}
                        {{Form::text('title', old('title'), ['placeholder'=>'Enter the title', 'class'=> 'form-control'])}}
                    </div><br>
            
                    <div class="form-group">
                        {{-- <input type="text" name="body" value="{{old('body')}}" class="form-control" placeholder="Enter the Body"> --}}
                        <textarea name="body" class="form-control" placeholder="Enter the body of this Blog"></textarea>
                        {{-- {{Form::textarea('body', '', ['placeholder' => 'Enter the body', 'id '=> 'abc', 'class' => 'form-control'])}} --}}
                    </div><br>

                    <div class="form-group">
                        <input type="file" name="image" class="form-control">
                    </div><br>

                    <div class="form-group">
                        <select name="type" class="form-control">
                            <option value="null">Choose type...</option>
                            <option value="sports">Sports</option>
                            <option value="entertainment">Entertainment</option>
                        </select>
                    </div><br>
            
                    <input type="submit" value="Save" class="btn btn-primary w-100">
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