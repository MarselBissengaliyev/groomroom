<div class="alert">
<?php if($errors->any()): ?>
    <div class="alert-info alert-danger">
        <h6>Status error</h6>
        <div class="alert-close">x</div>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="alert-line"></div>
    </div>
<?php endif; ?>
<?php if($success): ?>
    <div class="alert-info alert-success">
        <h6>Status success</h6>
        <div class="alert-close">x</div>
        <p><?php echo e($success); ?></p>
        <div class="alert-line"></div>
    </div>
<?php endif; ?>
<?php if(session('success')): ?>
    <div class="alert-info alert-success">
        <h6>Status success</h6>
        <div class="alert-close">x</div>
        <p><?php echo e(session('success')); ?></p>
        <div class="alert-line"></div>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert-info alert-danger">
        <h6>Status error</h6>
        <div class="alert-close">x</div>
        <p><?php echo e(session('error')); ?></p>
        <div class="alert-line"></div>
    </div>
<?php endif; ?>
</div>
<?php /**PATH D:\OSPanel\domains\groomroom\resources\views/components/alert.blade.php ENDPATH**/ ?>