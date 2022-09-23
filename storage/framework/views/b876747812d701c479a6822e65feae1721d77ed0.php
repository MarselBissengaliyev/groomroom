<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>GroomRoom</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
</head>

<body>
    <div class="page">
        <!-- Header -->
        <header class="header">
            <div class="header__inner container">
                <a href="<?php echo e(route('home')); ?>"><img src=<?php echo e(asset('assets/img/logo.png')); ?> alt="" class="header__logo"></a>
                <nav class="header__nav">
                    <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('user', ['userId' => auth()->user()->id])); ?>">
                        Личный кабинет
                    </a>
                    <a href="<?php echo e(route('logout')); ?>">Вытий</a>
                    <?php endif; ?>
                    
                    <?php if(auth()->user() && auth()->user()->isAdmin()): ?>
                        <a href="<?php echo e(route('admin', ['adminId' => auth()->user()->id])); ?>">
                            Админ панель
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
        </header>
        <!-- /.Header -->
<?php /**PATH D:\OSPanel\domains\groomroom\resources\views/components/header.blade.php ENDPATH**/ ?>