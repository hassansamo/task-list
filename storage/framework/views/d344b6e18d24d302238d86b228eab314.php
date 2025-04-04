<?php $__env->startSection('content'); ?>
<div class="bg-gray-100 flex items-center justify-center">
    <div class="max-w-xl w-full px-4">
        <div class="text-center">
            <!-- Error Code -->
            <h1 class="text-9xl font-bold text-gray-800">404</h1>

            <!-- Error Message -->
            <p class="mt-4 text-3xl font-semibold text-gray-700">Page Not Found</p>

            <!-- Description -->
            <p class="mt-4 text-gray-600">Sorry, we couldn't find the page you're looking for. The page might have been
                moved, deleted, or never existed.</p>

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
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\task-list\resources\views/err404.blade.php ENDPATH**/ ?>