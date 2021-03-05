<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?><?php echo e(config('constants.site_title', 'Thinkin Cab')); ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(config('constants.site_icon')); ?>"/>


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="<?php echo e(asset('asset/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/css/style.css')); ?>" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="full-page-bg" style="background-image: url(<?php echo e(asset('asset/img/login-bg.jpg')); ?>);">
        <div class="log-overlay"></div>
            <div class="full-page-bg-inner">
                <div class="row no-margin">
                    <div class="col-md-6 log-left">
                        <span class="login-logo"><img src="<?php echo e(config('constants.site_logo', asset('logo-black.png'))); ?>"></span>
                        <h2><?php echo e(config('constants.site_title','Thinkin Cab')); ?> You need partners like you.</h2>
                        <p>Drive with the <?php echo e(config('constants.site_title','Thinkin Cab')); ?> and earn a lot of money with independent contractor. Get paid weekly just to help our rider community take city tours. Be your own boss and get paid on fares for driving at your own time.</p>
                    </div>
                    <div class="col-md-6 log-right">
                        <div class="login-box-outer">
                            <div class="login-box row no-margin">
                                <?php echo $__env->yieldContent('content'); ?>
                            </div>
                            <div class="log-copy"><p class="no-margin"><?php echo e(config('constants.site_copyright', '&copy; '.date('Y').' Thinkin Cab')); ?></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('asset/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/scripts.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
    
    <?php if(Setting::get('demo_mode', 0) == 1): ?>

    <?php endif; ?>
</body>
</html>
