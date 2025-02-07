@extends('layout')
@section('content')
     <div class="container  flex items-center justify-center">
            <x-card 
                :id="$student->id" 
                :gender="$student->gender" 
                :date="$student->date_of_birth" 
                :email="$student->email" 
                :name="$student->name" 
                :image="$student->image" 
                :age="$student->age" 
                :address="$student->address" 
                :phone="$student->phone">
            </x-card>
        </div>
@endsection