<!DOCTYPE html>
<html>

<head>
  <title>Task List App</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  {{-- blade-formatter-disable --}}
  <style type="text/tailwindcss">
    .btn {
      @apply rounded-lg px-4 py-2.5 text-center font-medium text-white shadow-lg ring-1 ring-inset ring-white/10 transition-all duration-200 hover:shadow-xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2
    }

    .btn-primary {
      @apply bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 focus:ring-blue-500
    }

    .btn-secondary {
      @apply bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 focus:ring-gray-500
    }

    .btn-danger {
      @apply bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 focus:ring-red-500
    }

    .btn-success {
      @apply bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 focus:ring-green-500
    }

    .link {
      @apply font-medium text-blue-600 hover:text-blue-800 underline decoration-2 decoration-blue-300 hover:decoration-blue-500 transition-colors duration-200
    }

    label {
      @apply block text-sm font-semibold text-gray-700 mb-2
    }

    input,
    textarea {
      @apply shadow-md appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200
    }

    .error {
      @apply text-red-600 text-sm font-medium mt-1
    }

    .task-card {
      @apply bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-gray-200
    }

    .task-card:hover {
      transform: translateY(-2px);
    }
  </style>
  {{-- blade-formatter-enable --}}

  @yield('styles')
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen font-['Inter']">
  <div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-8">
      <h1 class="mb-8 text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">@yield('title')</h1>
      <div x-data="{ flash: true }">
        @if (session()->has('success'))
          <div x-show="flash"
            class="relative mb-8 rounded-xl border border-green-200 bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 text-green-800 shadow-lg"
            role="alert">
            <div class="flex items-center">
              <svg class="w-5 h-5 mr-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
              <div>
                <strong class="font-semibold">Success!</strong>
                <div class="mt-1">{{ session('success') }}</div>
              </div>
            </div>

            <button @click="flash = false" class="absolute top-4 right-4 text-green-600 hover:text-green-800 transition-colors">
              <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        @endif

        @yield('content')
      </div>
    </div>
  </div>
</body>

</html>
