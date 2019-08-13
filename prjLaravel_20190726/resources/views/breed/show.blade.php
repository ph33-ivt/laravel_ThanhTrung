<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    {{--<script type="text/javascript" src="{{asset('/js/filename.js')}}"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
<div class="content">
    <div class="title m-b-md">
        Breed Name: {{$breed->name}}
    </div>

    <div>
        <h1>LIST CAT OF BREED</h1>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Breed ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Deleted At</th>
            </tr>
            </thead>
            <tbody>
            {{-- Cach 1 --}}
            {{--@foreach($listCats as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->breed_id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->age}}</td>
                    <td>{{$cat->created_at}}</td>
                    <td>{{$cat->updated_at}}</td>
                    <td>{{$cat->deleted_at}}</td>
                </tr>
            @endforeach--}}

            @foreach($breed->cats as $cat)
                <tr id="{{$cat->id}}">
                    <td>{{$cat['id']}}</td>
                    <td>{{$cat->breed_id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->age}}</td>
                    <td>{{$cat->created_at}}</td>
                    <td>{{$cat->updated_at}}</td>
                    <td>{{$cat->deleted_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('list-cat')}}">Link</a>
    </div>
</div>

<script type="text/javascript">
    /*$(document).ready(function () {
        $('a').click(function (e) {
            e.preventDefault(); // ngan khong cho chuyen trang khi click vao the a
            var link = $(this).attr('href');
            //alert(link);
            setInterval(function () {
                alert(link)
            }, 3000);
        });
    });*/

    $(document).ready(function () {
        /*$('tr').click(function () {*/
        $(document).on('click', 'tr', function () { //'click': ten su kien,'tr': doi tuong nhan su kien, function ()
            var catID = $(this).attr('id');
            /*var catID = $(this).attr({'id':'abc'});*/
            //alert(catID);
            // ajax call api delete cat
            $.ajax({
                url: '/api/cats/' + catID,
                type: 'GET',
                data: {},
                success: function (data) {
                    //console.log(data.message);
                    console.log(data);
                    var html = '';
                    $.each(data.list_cat, function (key, value) {
                        html += '<tr id="' + value.id + '">' +
                            '<td>' + value.id + '</td>' +
                            '<td>' + value.name + '</td>' +
                            '<td>' + value.age + '</td>' +
                            '<td>' + value.created_at + '</td>' +
                            '<td>' + value.updated_at + '</td>' +
                            '</tr>'
                    });
                    $('tbody').html(''); //xoa html trong the tbody
                    $('tbody').append(html); //truyen doan html vua tao o tren vao the tbody
                },
                error: function (error) {
                    console.log(error);
                },
            });
        });
    });
</script>
</body>
</html>
