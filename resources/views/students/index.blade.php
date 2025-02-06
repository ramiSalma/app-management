@extends('layout')
@section('content')
    <table class="table bg-pink-500">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>address</th>
            <th>phone</th>
        </tr>
        @foreach ($students as $student )
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->phone }}</td>
            </tr>
        @endforeach
    </table>
@endsection