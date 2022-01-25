<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Blog Index</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-light">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>BD ID</th>
                            <th>Title</th>
                            <th>Body</th>
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
                                <td>Option</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>