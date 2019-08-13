@extends('layouts.app')
@section('content')
    <h1>Breed Name: {{$breed->name}}</h1>
    <h1>List all cat of breed</h1>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listCats as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->age}}</td>
                <td>{{$cat->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
