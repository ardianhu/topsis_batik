<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rekomendasi</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <h1><?php echo e($motif); ?></h1>
                            <p><?php echo e($warna); ?></p>
                            <p><?php echo e($jenis_kain); ?></p>
                            <p>Rp.<?php echo e($harga); ?></p>
                        </div>
                        <div class="col-md-7">
                            <img src="<?php echo e('img_batik/'.$image); ?>" class="card-img-top" alt="<?php echo e($image); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ardian/Private/batik/resources/views/rekomendasi.blade.php ENDPATH**/ ?>