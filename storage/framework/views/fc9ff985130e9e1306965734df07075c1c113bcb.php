<?php $__env->startSection('title', __('admin.provides.update_provider')); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('asset/css/intlTelInput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h5 class="card-title"><?php echo app('translator')->getFromJson('admin.provides.update_provider'); ?></h5>
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="<?php echo e(route('admin.provider.update', $provider->id )); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="PATCH">

                <div class="form-group">
                    <label for="first_name" class="bmd-label-floating"><?php echo app('translator')->getFromJson('admin.first_name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($provider->first_name); ?>" name="first_name" required id="first_name" placehold="First Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="last_name" class="bmd-label-floating"><?php echo app('translator')->getFromJson('admin.last_name'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="<?php echo e($provider->last_name); ?>" name="last_name" required id="last_name" placehold="Last Name">
                    </div>
                </div>

                <div class="input-group row">
                    
                    <label for="picture" class="bmd-label-floating"><?php echo app('translator')->getFromJson('admin.picture'); ?></label>
                    <div class="col-xs-10">
                    <?php if(isset($provider->avatar)): ?>
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="<?php echo e(img($provider->avatar)); ?>">
                    <?php endif; ?>
                        <input type="file" accept="image/*" name="avatar" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group">
                    <label for="country_code" class="bmd-label-floating">Código do País</label>
                    <div class="col-xs-10">
                    <input type="text" name="country_code" style ="padding-bottom:5px;" id="country_code" class="country-name"  value="<?php echo e($provider->country_code); ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobile" class="bmd-label-floating"><?php echo app('translator')->getFromJson('admin.mobile'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="<?php echo e($provider->mobile); ?>" name="mobile" required id="mobile" placehold="Mobile">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->getFromJson('admin.password'); ?></label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password" placehold="<?php echo app('translator')->getFromJson('admin.password'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->getFromJson('admin.account-manager.password_confirmation'); ?></label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="password_confirm" placehold="<?php echo app('translator')->getFromJson('admin.account-manager.password_confirmation'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.provides.update_provider'); ?></button>
                        <a href="<?php echo e(route('admin.provider.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('admin.cancel'); ?></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('asset/js/intlTelInput.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('asset/js/intlTelInput-jquery.min.js')); ?>"></script>
<script type="text/javascript">
        var input = document.querySelector("#country_code");

    //    var states = $('#states');
    //    var providerCity = "<?php echo e($provider->city_id); ?>";

    //    states.change(function () {
    //        var idEstado = $(this).val();
    //        $.get('/admin/cities/' + idEstado, function (cidades) {
    //            $('#cities').empty();
    //            $.each(cidades, function (key, value) {
    //                $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
    //            });
    //        });
    //    });

    //    if(states.val() != null){
    //        $.get('/admin/cities/' + states.val(), function (cidades) {
    //            $('#cities').empty();
    //            $.each(cidades, function (key, value) {
    //                if(value.id == providerCity){
    //                    $('#cities').append('<option value=' + value.id + ' selected>' + value.title + '</option>');
    //                }else{
    //                    $('#cities').append('<option value=' + value.id + '>' + value.title + '</option>');
    //                }
    //            });
    //        });
    //    }

       window.intlTelInput(input,({
           // separateDialCode:true,
       }));
       $(".country-name").click(function(){
           var myVar = $(this).closest('.country').find(".dial-code").text();
           $('#country_code').val(myVar);
        });
		</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>