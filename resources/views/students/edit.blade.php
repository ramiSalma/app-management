@extends('layout')
@section('content')
<form action="{{url('/students/'. $student->id)}}" method="post"
    class="max-w-md mx-auto p-6 bg-gray-900 rounded-lg shadow-lg border border-gray-700">
    @csrf
    @method('PATCH')
    

    
    <div class="mb-4">
        <label for="name" class="block text-purple-500 font-medium">name</label>
        <input type="text" id="name" name="name"  value="{{$student->name}}"
            class="w-full px-4 py-2 mt-2 bg-gray-800 border border-gray-800 text-white rounded focus:bg-gray-800 focus:ring-2 focus:ring-purple-500 focus:outline-none" >
    </div>

   
    <div class="mb-4">
        <label for="text" class="block text-purple-500 font-medium">address</label>
        <input type="text" id="email" name="address"  value="{{$student->address}}"
            class="w-full px-4 py-2 mt-2 bg-gray-800 border border-gray-800 text-white rounded focus:ring-2 focus:ring-purple-500 focus:outline-none" >
    </div>

    
    <div class="mb-4">
        <label for="message" class="block text-purple-500 font-medium">phone</label>
        <input id="message" name="phone" rows="4" type="tel" value="{{$student->phone}}"
            class="w-full px-4 py-2 mt-2 bg-gray-800 border border-gray-800 text-white rounded focus:ring-2 focus:ring-purple-500 focus:outline-none" 
            ></input>
    </div>

    <button type="submit" 
        class="w-full py-2 mt-2 text-white bg-purple-500 shadow-lg hover:shadow-purple-500/100 transition-all duration-300 rounded text-lg font-semibold shadow-lg">
        Envoyer
    </button>
</form>
@endsection
