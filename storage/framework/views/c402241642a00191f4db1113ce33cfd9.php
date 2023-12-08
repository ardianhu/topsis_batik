<?php $__env->startSection('content'); ?>
<!-- <style>
    * {
        border: red solid 1px;
    }
</style> -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="row">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo e('img_batik/'.$item->image); ?>" class="card-img-top" alt="<?php echo e($item->image); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($item->motif); ?></h5>
                                <!-- Add other details or actions related to the image if needed -->
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="row justify-content-center m-4">
                    <a class="btn btn-primary" style="width: 18rem;" href="/form" role="button">Form</a>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ardian/Private/batik/resources/views/dashboard.blade.php ENDPATH**/ ?>