@php
$name = "Rana";
$books = ["Html", "Css", "Js"];
@endphp
{{-- It's not a good way to makr the variabls here, unless we will move them to the route file and pass them here --}}

{{-- below is === to <?php echo $name ?> in pure php --}}
{{
    $name
}}

@foreach ($books as $book )
    {{
        $book
    }}
@endforeach

{{
    $nameFromRouteFile
}}