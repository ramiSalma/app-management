<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>students management</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 ">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 transition-all duration-300 ease-in-out relative">
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
        <a href="" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
          connexion
        </a>
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
          Settings
        </a>
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
          Logout
        </a>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-10">
      @yield('content')
    </div>
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