@extends('layout')
@section('content')
<h1 class="my-10 text-5xl text-cyan-700">students application</h1>
<a href="{{url('/students/create')}}" class="bg-purple-500 p-4 text-white rounded-xl shadow-lg hover:shadow-purple-500/100">add student</a>
    <table class="w-full text-sm text-left my-7 rtl:text-right text-gray-500 dark:text-gray-40">
        <thead class="p-9 text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr >
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">full name</th>
                <th class="px-6 py-3">email</th>
                <th class="px-6 py-3">phone number</th>
                <th class="px-6 py-3">info</th>
                <th class="px-6 py-3">delete</th>
                <th class="px-6 py-3">update</th>
            </tr></thead>
        <tbody class=" text-gray-300  ">
            @foreach ($students as $student )
                <tr class="hover:bg-gray-500 transition-all duration-500 ease-in-out">
                    <td class="py-3 px-6 border-b-2 border-gray-700">{{ $student->id }}</td>
                    <td class="py-3 px-6 border-b-2 border-gray-700">{{ $student->name }}</td>
                    <td class="py-3 px-6 border-b-2 border-gray-700">{{ $student->email }}</td>
                    <td class="py-3 px-6 border-b-2 border-gray-700">{{ $student->phone }}</td>
                    <td class="py-3 px-6 border-b-2 border-gray-700"><a href="{{url('/students/'. $student->id)}}" class="bg-cyan-500  rounded-xl p-4 ">info</a></td>
                    <td class="py-3 px-6 border-b-2 border-gray-700">
                        <form action="{{url('/students/'. $student->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="bg-pink-500  rounded-xl p-4" onclick="return confirm('are you sure?')">delete</button>
                        </form>
                        
                    </td>
                    <td class="py-3 px-6 border-b-2 border-gray-700"><a href="{{url('/students/'.$student->id.'/edit')}}" class="bg-purple-700  rounded-xl p-4 ">update</a></td>
                </tr>
            @endforeach
        </tbody>
        
       
    </table>
@endsection