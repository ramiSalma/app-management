<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>students management</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-slate-950 ">
  
  <div class="flex  h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-indigo-950 text-white w-64 space-y-6 py-7 px-2 transition-all duration-300 ease-in-out relative">
      <!-- Toggle Button -->
      <button id="toggleButton" class="absolute -right-7 top-5 p-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 focus:outline-none border-2 border-gray-700">
        <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <!-- Logo or Brand -->
      <div class="text-2xl font-semibold text-center">
        My App
      </div>

      <!-- Navigation Links -->
      <nav>
        <a href="{{url('/')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
          home
        </a>
        <a href="{{url('/students')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
          students table
        </a>
        <a href="{{url('/teachers')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
          teachers 
        </a>
        <a href="{{url('/students')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
          courses
        </a>
        <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
          connexion
        </a>
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
          Settings
        </a>
        <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
          Logout
        </a>
      </nav>
    </div>

   
    <div class="flex-1 p-10">
      
        @yield('content')
      
        @if (!View::hasSection('content'))
        {{--  <div class="bg-indigo-800 my-5 rounded-2xl " >
          <img width="400px" class="" src="https://img.freepik.com/free-vector/online-education-background_52683-7614.jpg?semt=ais_hybrid" alt="">
        </div>  --}}
          <div class="grid grid-cols-3 gap-6">
              <div class="bg-indigo-950 text-white flex justify-between p-6 rounded-lg shadow-md">
                <img src="https://cdn-icons-png.flaticon.com/512/2995/2995620.png" width="60"  alt="">
                <div>
                  <h3 class="text-xl text-cyan-600 font-semibold">Total Students</h3>
                  <p class="text-3xl text-cyan-600">{{ $studentsCount ?? 0 }}</p>
                </div>
                
              </div>
              <div class="bg-indigo-950 flex justify-between text-white p-6 rounded-lg shadow-md">
                <img src="https://cdn-icons-png.freepik.com/256/3750/3750020.png?semt=ais_hybrid" width="90" alt="">
                <div>
                  <h3 class="text-xl font-semibold text-cyan-600">Total Teachers</h3>
                  <p class="text-3xl text-cyan-600">{{ $teachersCount ?? 0 }}</p>
                </div>
                  
              </div>
              <div class="bg-indigo-950 flex justify-between text-white p-6 rounded-lg shadow-md">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6BIyftNXNGB2sdqgRLh42jgABfDgxAEJm5w&s" width="90" alt="">
                <div>
                   <h3 class="text-xl text-cyan-600 font-semibold">Total Courses</h3>
                  <p class="text-3xl text-cyan-600">{{ $coursesCount ?? 0 }}</p>
                </div>
                 
              </div>
          </div>
      
          <!-- Chart -->
          <div class="flex justify-between">
            <div style="width: 400px;height:300px" class="mt-6 bg-indigo-950 text-white p-9 shadow-md rounded-lg">
                        <h1 class="text-center text-[#ff6833] mb-2">teachers activity</h1>
                          <canvas   id="topTeachersChart"></canvas>
            </div>
            <div style="width: 500px;height:300px" class="bg-indigo-950 mt-6 p-4 shadow-md rounded-lg col-span-1 flex justify-center items-center">
              <canvas id="teachersBarChart" class="w-[250px] h-[250px]"></canvas>
            </div>
          </div>
          
      
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

          <script>
            document.addEventListener("DOMContentLoaded", function () {
                var ctx = document.getElementById('topTeachersChart').getContext('2d');
        
                var teacherNames = @json($topTeachers->pluck('name')->toArray());
                var coursesCount = @json($topTeachers->pluck('total_courses')->toArray());
        
                if (teacherNames.length === 0 || coursesCount.length === 0) {
                    console.warn("No data available for the chart.");
                    return;
                }
        
                var myChart = new Chart(ctx, {
                    type: 'doughnut', // Changed from 'pie' to 'doughnut'
                    data: {
                        labels: teacherNames,
                        datasets: [{
                            label: 'Courses Taught',
                            data: coursesCount,
                            backgroundColor: [
                                '#9305f2',  
                                '#33ff9c',  
                                '#ff6833',  
                                '#6ba5f2',  
                                '#30f2f2'  
                            ],
                            borderColor: 'transparent',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            });
        </script>
        
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var ctx = document.getElementById('teachersBarChart').getContext('2d');
        
                var teacherNames = @json($topTeachers->pluck('name')->toArray());
                var coursesCount = @json($topTeachers->pluck('total_courses')->toArray());
        
                if (teacherNames.length === 0 || coursesCount.length === 0) {
                    console.warn("No data available for the chart.");
                    return;
                }
        
                var myChart = new Chart(ctx, {
                    type: 'line', // Changed from 'bar' to 'line'
                    data: {
                        labels: teacherNames,
                        datasets: [{
                            label: 'Courses Taught',
                            data: coursesCount,
                            backgroundColor: '#ff6833',
                            borderColor: '#ff6833',
                            borderWidth: 2,
                            fill: false,
                            tension: 0.4 // Makes the line smooth
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    color: 'white'
                                }
                            }
                        }
                    }
                });
            });
        </script>
        
        @endif
           
    
  </div>

  <script>
    // JavaScript to toggle sidebar visibility
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('toggleButton');
    const toggleIcon = document.getElementById('toggleIcon');

    toggleButton.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      // Change the icon based on sidebar visibility
      if (sidebar.classList.contains('-translate-x-full')) {
        toggleIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />`;
        toggleButton.classList.replace('-right-3', '-right-12'); // Move button to the right when sidebar is hidden
      } else {
        toggleIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />`;
        toggleButton.classList.replace('-right-12', '-right-3'); // Move button back when sidebar is visible
      }
    });
  </script>
</body>
</html>