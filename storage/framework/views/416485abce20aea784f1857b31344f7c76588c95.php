<?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="service">
    <div class="service__inner container">
        <h1>Все заявки</h1>
        <div class="service__content">
            <?php $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form enctype="multipart/form-data" method="post" action="<?php echo e(route('update-status', ['animalId' => $animal->id])); ?>" class="service__item">
                    <?php echo csrf_field(); ?>
                    <select name="status-<?php echo e($animal->id); ?>" id="status-<?php echo e($animal->id); ?>">
                        <option <?php echo e('new' == $animal->status ? "selected" : ""); ?> value="new">Новая</option>
                        <option <?php echo e('processing' == $animal->status ? "selected" : ""); ?> value="processing">Обработка данных</option>
                        <option <?php echo e('finished' == $animal->status ? "selected" : ""); ?> value="finished">Услуга оказана</option>
                    </select>
                    <img src="<?php echo e(Storage::url($animal->picture)); ?>" alt="">
                    <h6><?php echo e($animal->name); ?></h6>
                    <label for="picture-<?php echo e($animal->id); ?>" class="form__upload">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                              </svg>
                              
                            Прикрепить результат
                        </span>
                        <input name="picture-<?php echo e($animal->id); ?>" accept="image/jpeg, image/bmp" type="file"  id="picture-<?php echo e($animal->id); ?>">
                    </label>
                    <button type="submit" <?php echo e('finished' == $animal->status ? 'disabled' : ''); ?>>
                        <?php echo e('finished' == $animal->status ? 'Услуга оказанна' : 'Сохранить'); ?>

                    </button>
                </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\groomroom\resources\views/admin.blade.php ENDPATH**/ ?>