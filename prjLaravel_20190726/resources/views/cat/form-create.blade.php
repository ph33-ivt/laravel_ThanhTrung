<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Cat
        </div>
        <form action="{{ route('store-cat') }}" method="post">
            @csrf {{--input random string--}}

            <label>Name:</label>
            <input type="text" name="name" value="{{old('name')}}">
            @if($errors->has('name'))
                <p style="color: red;">{{ $errors->first('name') }}</p>
            @endif

            <label>Age:</label>
            <input type="text" name="age" value="{{old('age')}}">
            @if($errors->has('age'))
                <p style="color: red;">{{ $errors->first('age') }}</p>
            @endif

            <label>Breed ID:</label>
            {{--<input type="text" name="breed_id">--}}
            <select name="breed_id">
                @foreach($listBreed as $breed)
                    <option value="{{$breed->id}}" {{$breed->id == old('breed_id') ? 'selected': ''}}>
                        {{$breed->name}}
                    </option>
                @endforeach
            </select>
            @if($errors->has('breed_id'))
                <p style="color: red;">{{ $errors->first('breed_id') }}</p>
            @endif

            <button type="submit">Create</button>
        </form>
    </div>
</div>
</body>
</html>
