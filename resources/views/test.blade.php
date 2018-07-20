<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$table}}</title>
</head>
<body>
    <h1>{{$table}} Table</h1>
   <form action="{{ route("$table.create") }}" method="post">
       {{csrf_field()}}
       @foreach($cols as $col)
       <label for="{{$col}}">{{$col}}: </label>
       <input type="text" name="{{$col}}" id="{{$col}}"><br>
        @endforeach
       <button>提交</button>
   </form>
</body>
</html>