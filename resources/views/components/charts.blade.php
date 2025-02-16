@props(['topTeachers','avgAges','studentsCountGender','labels'])
<!-- Chart -->
<div class="flex justify-between">
  <div style="width: 400px;height:300px" class="mt-6 bg-indigo-950 text-white p-9 shadow-md rounded-lg">
              <h1 class="text-center text-[#ff6833] mb-2">teachers activity</h1>
                <canvas   id="topTeachersChart"></canvas>
  </div>
  <div style="width: 500px;height:300px" class="bg-indigo-950 mt-6 p-4 shadow-md rounded-lg col-span-1 flex justify-center items-center">
    <canvas id="teachersBarChart" class="w-[250px] h-[250px]"></canvas>
  </div>
  <div style="width: 350px;height:300px" class="bg-indigo-950 mt-6 p-4 shadow-md rounded-lg col-span-1 flex justify-center items-center">
    <canvas id="studentChart" class="w-[50px] h-[250px]"></canvas>
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
          //==========================================================
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
            //==========================================================
            
                document.addEventListener("DOMContentLoaded", function () {
                    var ctx = document.getElementById('studentChart').getContext('2d');
                    
                    var studentChart = new Chart(ctx, {
                        type: 'polarArea',
                        data: {
                            labels: @json($labels),
                            datasets: [{
                                label: 'Students Count',
                                data: @json($studentsCountGender),
                                backgroundColor: ['#d8f521', '#9305f2'],
                                borderColor: 'transparent'
                            },
                            {
                                label: 'Average Age',
                                data: @json($avgAges),
                                backgroundColor: ['#33ff9c', '#ff6833'],
                                borderColor: 'transparent',
                                borderJoinStyle: 'bevel'
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }
                    });
                });
            
          </script>
