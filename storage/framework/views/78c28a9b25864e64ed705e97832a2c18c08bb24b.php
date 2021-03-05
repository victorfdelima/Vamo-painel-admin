<?php $__env->startSection('content'); ?>

 <div class="container">
            <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="logo-section text-center">
                        <!-- <link rel="shortcut icon" type="image/png" href="<?php echo e(config('constants.site_icon')); ?>"> -->
                            <img src="<?php echo e(config('constants.site_icon')); ?>" alt="">
                        </div>
                    </div>
                </div>
                <div id="userform">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li id="last-button" <?php if(!$errors->has('login_type')): ?> class="active" <?php endif; ?> <?php if($errors->has('login_type') && $errors->first('login_type') == 'admin'): ?>  class="active" <?php endif; ?>><a href="#signup" role="tab" data-toggle="tab">Admin</a></li>
                        <li <?php if($errors->has('login_type') && $errors->first('login_type') == 'dispatcher'): ?>  class="active" <?php endif; ?>><a href="#dispatcher" role="tab" data-toggle="tab">Expedidor</a></li>
                        <li <?php if($errors->has('login_type') && $errors->first('login_type') == 'account'): ?>  class="active" <?php endif; ?>><a href="#account" role="tab" data-toggle="tab">Conta</a></li>
                        <li id="first-button" <?php if($errors->has('login_type') && $errors->first('login_type') == 'dispute'): ?>  class="active" <?php endif; ?>><a href="#dispute" role="tab" data-toggle="tab">Disputa</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade <?php if(!$errors->has('login_type')): ?> active <?php endif; ?> <?php if($errors->has('login_type') && $errors->first('login_type') == 'admin'): ?> active <?php endif; ?> in" id="signup">
                            <!--<h2 class="text-uppercase text-center"> ADMINISTRADOR</h2>-->
                            <form id="signup" role="form" method="POST" action="<?php echo e(url('/admin/login')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <input type="email" name="email" placehold="E-mail" class="form-control" id="email" required data-validation-required-message="Informe o endereço de e-mail" autocomplete="off" <?php if(Setting::get('demo_mode', 0)==1): ?>value="admin@demo.com"<?php endif; ?>>
                                    <?php if($errors->has('email')): ?>
                                        <p class="help-block text-danger"><?php echo e($errors->first('email')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placehold="Password" class="form-control" id="password" required data-validation-required-message="Informe sua Password" autocomplete="off" <?php if(Setting::get('demo_mode', 0)==1): ?>value="123456"<?php endif; ?>>
                                    <?php if($errors->has('password')): ?>
                                        <p class="help-block text-danger"><?php echo e($errors->first('password')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="mrgn-30-top">
                                    <input type="hidden" name="login_type" value="admin">
                                    <button type="submit" class="btn btn-larger btn-block" /> Conecte-se
                                    </button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="details">
                                    <?php if(Setting::get('demo_mode', 0)==1): ?>
                                        <h4 class="text-captilize text-left">Using below detail for demo version</h4>
                                        <h5><strong>User Name : </strong><span>admin@demo.com</span></h5>
                                        <h5><strong>Password  : </strong><span>123456</span></h5>
                                        <p>Super Administrator can manage whole system and other user's rights too.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade <?php if($errors->has('login_type') && $errors->first('login_type') == 'dispatcher'): ?> active <?php endif; ?> in" id="dispatcher">
                            <!--<h2 class="text-uppercase text-center">Dispatcher</h2>-->
                            <form id="login" role="form" method="POST" action="<?php echo e(url('/admin/login')); ?>">
                             <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <input type="email" name="email" placehold="E-mail" class="form-control" id="email" required data-validation-required-message="Informe o endereço de e-mail" autocomplete="off" <?php if(Setting::get('demo_mode', 0)==1): ?>value="dispatcher@demo.com"<?php endif; ?>>
                                    <?php if($errors->has('email')): ?>
                                        <p class="help-block text-danger"><?php echo e($errors->first('email')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placehold="Password" class="form-control" id="password" required data-validation-required-message="Informe sua Password" autocomplete="off" <?php if(Setting::get('demo_mode', 0)==1): ?>value="123456"<?php endif; ?>>
                                    <?php if($errors->has('password')): ?>
                                        <p class="help-block text-danger"><?php echo e($errors->first('password')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="mrgn-30-top">
                                    <input type="hidden" name="login_type" value="dispatcher">
                                    <button type="submit" class="btn btn-larger btn-block" /> Login
                                    </button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="details">
                                        <?php if(Setting::get('demo_mode', 0)==1): ?>
                                        <h4 class="text-captilize text-left">Using below detail for demo version</h4>
                                        <h5><strong>User Name : </strong><span>dispatcher@demo.com</span></h5>
                                        <h5><strong>Password  : </strong><span>123456</span></h5>
                                        <p>Super Administrator can manage whole system and other user's rights too.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Fleet -->
                        <div class="tab-pane fade <?php if($errors->has('login_type') && $errors->first('login_type') == 'account'): ?>  active <?php endif; ?> in" id="account">
                            <!--<h2 class="text-uppercase text-center">Gerente de Contas</h2>-->
                            <form id="login" role="form" method="POST" action="<?php echo e(url('/admin/login')); ?>">
                             <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                        <input type="email" name="email" placehold="E-mail" class="form-control" id="email" required data-validation-required-message="Informe o endereço de e-mail" autocomplete="off" <?php if(Setting::get('demo_mode', 0)==1): ?>value="account@demo.com"<?php endif; ?>>
                                        <?php if($errors->has('email')): ?>
                                            <p class="help-block text-danger"><?php echo e($errors->first('email')); ?></p>
                                        <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placehold="Password" class="form-control" id="password" required data-validation-required-message="Informe sua Password" autocomplete="off" <?php if(Setting::get('demo_mode', 0)==1): ?>value="123456"<?php endif; ?>>
                                    <?php if($errors->has('password')): ?>
                                        <p class="help-block text-danger"><?php echo e($errors->first('password')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="mrgn-30-top">
                                    <input type="hidden" name="login_type" value="account">
                                    <button type="submit" class="btn btn-larger btn-block" /> Login
                                    </button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="details">
                                    <?php if(Setting::get('demo_mode', 0)==1): ?>
                                     <h4 class="text-captilize text-left">Using below detail for demo version</h4>
                                        <h5><strong>User Name : </strong><span>account@demo.com</span></h5>
                                        <h5><strong>Password  : </strong><span>123456</span></h5>
                                        <p>Super Administrator can manage whole system and other user's rights too.</p>
                                    <?php endif; ?>
                                       </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade <?php if($errors->has('login_type') && $errors->first('login_type') == 'dispute'): ?>  active <?php endif; ?> in" id="dispute">
                            <!--<h2 class="text-uppercase text-center">Dispute</h2>-->
                            <form id="login" role="form" method="POST" action="<?php echo e(url('/admin/login')); ?>">
                             <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                        <input type="email" name="email" placehold="E-mail" class="form-control" id="email" required data-validation-required-message="Informe o endereço de e-mail" autocomplete="off" <?php if(Setting::get('demo_mode', 0)==1): ?>value="dispute@demo.com"<?php endif; ?>>
                                        <?php if($errors->has('email')): ?>
                                            <p class="help-block text-danger"><?php echo e($errors->first('email')); ?></p>
                                        <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placehold="Password" class="form-control" id="password" required data-validation-required-message="Informe sua Password" autocomplete="off" <?php if(Setting::get('demo_mode', 0)==1): ?>value="123456"<?php endif; ?>>
                                    <?php if($errors->has('password')): ?>
                                        <p class="help-block text-danger"><?php echo e($errors->first('password')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="mrgn-30-top">
                                    <input type="hidden" name="login_type" value="dispute">
                                    <button type="submit" class="btn btn-larger btn-block" /> Login
                                    </button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="details">
                                    <?php if(Setting::get('demo_mode', 0)==1): ?>
                                     <h4 class="text-captilize text-left">Using below detail for demo version</h4>
                                        <h5><strong>User Name : </strong><span>dispute@demo.com</span></h5>
                                        <h5><strong>Password  : </strong><span>123456</span></h5>
                                        <p>Super Administrator can manage whole system and other user's rights too.</p>
                                    <?php endif; ?>
                                       </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<script>

</script>

<?php echo $__env->make('admin.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>