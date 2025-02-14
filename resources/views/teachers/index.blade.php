@extends('layout')
@section('content')
<div class="container mx-auto px-4">
    <h1 class="my-10 text-5xl text-cyan-700 text-center">Teachers Dashboard</h1>
    <a href="{{url('/teachers/create')}}" class="bg-cyan-500 m-5 p-4 text-white rounded-xl shadow-lg hover:shadow-cyan-500/100">add teacher</a>
    <div class="flex flex-wrap gap-4 justify-center">
        @foreach ($teachers as $teacher)
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 p-4">
            <div class="flex flex-col items-center pb-6">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{$teacher->image}}" alt="Profile Image"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$teacher->name}}</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{$teacher->email}}</span>
                <div class="flex mt-4">
                    <form action="{{url('/teachers/'. $teacher->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('are you sure?')"  class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-cyan-600 rounded-lg hover:bg-cyan-700">delete </a>
                    </form>
                    <button href="#" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700">Update</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
