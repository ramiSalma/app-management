<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>students management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @vite('resources/css/app.css')
</head>
<body class="bg-slate-950 ">
  
  <div class="flex  h-screen">
    <x-side-bar></x-side-bar>
   
    <div class="flex-1 p-5 pt-0 pb-10"> 
        @yield('content')
        @if (!View::hasSection('content'))

        <div class="bg-[#39239f] my-3 h-[250px] rounded-2xl " >
          <img width="350" class="" src="https://img.freepik.com/free-vector/online-education-background_52683-7614.jpg?semt=ais_hybrid" alt="">
        </div>
          <div class="grid grid-cols-5 gap-6">
              <div class="bg-[#33ff9c] h-24 items-end text-white flex justify-between p-6 rounded-lg shadow-md">
                <div>
                  <p class="text-4xl ">{{ $studentsCount ?? 0 }}</p>
                  <h3 class="text-1xl font-semibold">Total Students</h3>
                </div>
                <i class="fa-solid fa-chart-simple text-2xl"></i>
              </div>
              <div class="bg-[#ff6833] items-end h-24 flex justify-between text-white p-6 rounded-lg shadow-md">
                <div>
                  <p class="text-4xl text-">{{ $teachersCount ?? 0 }}</p>
                  <h3 class="text-1xl font-semibold text-">Total Teachers</h3>
                </div>
                <i class="fa-solid fa-chart-simple text-2xl"></i>
              </div>
              <div class="bg-[#9305f2] items-end h-24 flex justify-between text-white p-6 rounded-lg shadow-md">
                <div>
                  <p class="text-4xl ">{{ $coursesCount ?? 0 }}</p>
                   <h3 class="text-1xl  font-semibold">Total Courses</h3>
                </div>
                 <i class="fa-solid fa-chart-simple text-2xl"></i>
              </div>
              <div class="bg-[#30f2f2] items-end h-24 flex justify-between text-white p-6 rounded-lg shadow-md">
                <div>
                  <p class="text-4xl">{{ $coursesCount ?? 0 }}</p>
                   <h3 class="text-1xl  font-semibold">Total Courses</h3>
                </div>
                 <i class="fa-solid fa-chart-simple text-2xl"></i>
              </div>
          </div>
      
          
          <x-charts :labels="$labels" :topTeachers="$topTeachers" :avgAges="$avgAges" :studentsCountGender="$studentsCountGender"></x-charts>
          

        
          
          
        
        @endif 
  </div>

  
</body>
</html>