<?php $__env->startSection('title', '404 - Page Not Found'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="max-w-xl w-full px-4">
        <div class="text-center">
            <!-- Error Code -->
            <h1 class="text-9xl font-bold text-gray-800">404</h1>

            <!-- Error Message -->
            <p class="mt-4 text-3xl font-semibold text-gray-700">Page Not Found</p>

            <!-- Description -->
            <p class="mt-4 text-gray-600">Sorry, we couldn't find the page you're looking for. The page might have been moved, deleted, or never existed.</p>

            <!-- Helpful Links -->
            <div class="mt-8 space-x-4">
                <a href="<?php echo e(url('/')); ?>"
                   class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">
                    Back to Home
                </a>

                <a href="<?php echo e(url()->previous()); ?>"
                   class="inline-block px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition duration-200">
                    Go Back
                </a>
            </div>
        </div>

        <!-- Optional: Custom Illustration -->
        <div class="mt-12 flex justify-center">
            <svg class="w-64 h-64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 14H11V12H13V14ZM13 5H11V11H13V5Z" fill="currentColor"/>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M2 12C2 6.48 6.48 2 12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12ZM4 12C4 16.42 7.58 20 12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12Z"
                      fill="currentColor"/>
            </svg>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\task-list\resources\views//err404.blade.php ENDPATH**/ ?>