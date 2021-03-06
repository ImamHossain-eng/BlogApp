<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Basic CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="container"><br>
        @include('inc.message')
        @yield('content')
    </div>

   


    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    {{-- <script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script> --}}
    {{-- <script src="//cdn.ckeditor.com/4.17.2/basic/ckeditor.js"></script> --}}
    {{-- <script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script> --}}
    <script>
        CKEDITOR.replaceAll( function(textarea, config) {});
    </script>

    
</body>
</html>