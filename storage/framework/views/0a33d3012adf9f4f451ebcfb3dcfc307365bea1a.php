<?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Form -->
<?php if(!Auth::check()): ?>
    <section class="form">
        <div class="form__inner container">
            <form method="post" action="<?php echo e(route('register')); ?>" class="form__item">
                <?php echo csrf_field(); ?>
                <div class="form__content">
                    <h2>Регистрация</h2>
                    <input name="fio" type="text" placeholder="ФИО" value=<?php echo e(old('fio')); ?>>
                    <input name="login" type="text" placeholder="Логин" value=<?php echo e(old('login')); ?>>
                    <input name="email" type="email" placeholder="Email" value=<?php echo e(old('email')); ?>>
                    <input name="password" type="password" placeholder="Пароль" value=<?php echo e(old('password')); ?>>
                    <input name="password_confirmation" type="password" placeholder="Повтор пароля"
                        value=<?php echo e(old('password_confirmation')); ?>>
                    <div>
                        <input type="hidden" name="confirmed" value="">
                        <input type="checkbox" name="confirmed" value="1">
                        <p>Согласен на обработку персональных данных</p>
                    </div>
                    <button type="submit" class="btn">Зарегестрироваться</button>
                </div>
            </form>

            <form method="post" action="<?php echo e(route('login')); ?>" class="form__item">
                <?php echo csrf_field(); ?>
                <div class="form__content">
                    <h2>Вход</h2>
                    <input value="<?php echo e(old('login')); ?>" name="login" type="text" placeholder="Логин">
                    <input name="password" type="password" placeholder="Пароль">
                    <button class="btn">Войти</button>
                </div>
            </form>
        </div>
    </section>
<?php endif; ?>
<!-- /.Form -->
<!-- Service -->
<section class="service">
    <div class="service__inner container">
        <h1>Выполненные услуги</h1>
        <div class="service__content">
            <div class="service__item">
                <p>Услуга оказана</p>
                <img src="<?php echo e(asset('assets/img/cat.jpg')); ?>" alt="">
                <h6>Барсик</h6>
            </div>
            <div class="service__item">
                <p>Услуга оказана</p>
                <img src="<?php echo e(asset('assets/img/dog.jpg')); ?>" alt="">
                <h6>Шарик</h6>
            </div>
            <div class="service__item">
                <p>Услуга оказана</p>
                <img src="<?php echo e(asset('assets/img/cat2.jpg')); ?>" alt="">
                <h6>Муська</h6>
            </div>
            <div class="service__item">
                <p>Услуга оказана</p>
                <img src="<?php echo e(asset('assets/img/dog2.jpg')); ?>" alt="">
                <h6>Бруно</h6>
            </div>
        </div>
        <a class="service__btn btn" href="user.html">Подать заявку</a>
    </div>
</section>
<!-- /.Service -->

<?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\OSPanel\domains\groomroom\resources\views/home.blade.php ENDPATH**/ ?>