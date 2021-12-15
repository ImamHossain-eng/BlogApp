<h2>
    @if($test != '')
        {{$test}}
    @else Empty variable 
    @endif

</h2>
<br>
@foreach($fruits as $item)
    <h4> {{$item}} </h4>
@endforeach