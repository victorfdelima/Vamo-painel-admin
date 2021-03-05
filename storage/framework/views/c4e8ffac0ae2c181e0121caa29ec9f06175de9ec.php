<?php $__env->startSection('title', 'Painel de controle '); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('main/vendor/jvectormap/jquery-jvectormap-2.0.3.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

            
            <div class="row">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard-menus')): ?>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">local_taxi</i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('Total de passeios'); ?></p>
                        <h3 class="card-title">
                            <?php if(!is_null($totalRides)): ?>
                                        <?php echo e($totalRides); ?>

                                    <?php endif; ?>
                        <small>Passeios</small>
                        </h3>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">money</i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('Receita'); ?></p>
                        <h3 class="card-title"><?php echo e(currency($revenue)); ?></h3>
                    </div>
                    
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">supervisor_account</i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('Passageiros'); ?></p>
                        <h3 class="card-title"><?php echo e($users); ?></h3>
                    </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="row">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard-menus')): ?>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-times"></i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('admin.dashboard.cancel_count'); ?></p>
                        <h3 class="card-title">
                            <?php echo e($user_cancelled); ?>

                        <small> Passeios</small>
                        </h3>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-default card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-times"></i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('admin.dashboard.provider_cancel_count'); ?></p>
                        <h3 class="card-title"><?php echo e($provider_cancelled); ?></h3>
                    </div>
                    
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <p class="card-category"><?php echo app('translator')->getFromJson('Motorista'); ?></p>
                        <h3 class="card-title"><?php echo e($provider); ?></h3>
                    </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

        <div class="row row-md mb-2">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('wallet-summary')): ?>
                <div class="col-md-4">
                <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title pull-left"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary'); ?></h4>
                </div>
                <div class="card-body">
                        <table class="table">
                            <tbody>
                            <?php ($total=$wallet['admin']); ?>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_admin_credit'); ?></th>
                                <td class="text-success"><?php echo e(currency($wallet['admin'])); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_provider_credit'); ?></th>
                                <?php if($wallet['provider_credit']): ?>
                                    <?php ($total=$total-$wallet['provider_credit'][0]['total_credit']); ?>
                                    <td class="text-success"><?php echo e(currency($wallet['provider_credit'][0]['total_credit'])); ?></td>
                                <?php else: ?>
                                    <td class="text-success"><?php echo e(currency()); ?></td>
                                <?php endif; ?>
                            </tr>

                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_provider_debit'); ?></th>
                                <?php if($wallet['provider_debit']): ?>

                                    <td class="text-danger"><?php echo e(currency($wallet['provider_debit'][0]['total_debit'])); ?></td>
                                <?php else: ?>
                                    <td class="text-danger"><?php echo e(currency()); ?></td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_commission'); ?></th>
                                <td class="text-success"><?php echo e(currency($wallet['admin_commission'])); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_peak_commission'); ?></th>
                                <td class="text-success"><?php echo e(currency($wallet['peak_commission'])); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_waitining_commission'); ?></th>
                                <td class="text-success"><?php echo e(currency($wallet['waiting_commission'])); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_discount'); ?></th>
                                <td class="text-danger"><?php echo e(currency($wallet['admin_discount'])); ?></td>
                            </tr>
                            <tr>
                                <?php ($total=$total-($wallet['admin_tax'])); ?>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_tax_amount'); ?></th>
                                <td class="text-success"><?php echo e(currency($wallet['admin_tax'])); ?></td>
                            </tr>

                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_tips'); ?></th>
                                <td class="text-danger"><?php echo e(currency($wallet['tips'])); ?></td>
                            </tr>

                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_referrals'); ?></th>
                                <td class="text-danger"><?php echo e(currency($wallet['admin_referral'])); ?></td>
                            </tr>

                            <tr>
                                <th scope="row"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_disputes'); ?></th>
                                <td class="text-danger"><?php echo e(currency($wallet['admin_dispute'])); ?></td>
                            </tr>

                            <!--                             <tr>
                            <th scope="row text-right"><?php echo app('translator')->getFromJson('admin.dashboard.wallet_summary_total'); ?></th>
                            <td><?php echo e(currency($total)); ?></td>
                        </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recent-rides')): ?>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <h4 class="card-title pull-left"><?php echo app('translator')->getFromJson('admin.dashboard.Recent_Rides'); ?></h4>
                        </div>
                        <div class="card-body">
                                <table class="table">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tbody>
                                    <?php if(is_null($rides)): ?>
                                        <tr>
                                            <th>No Data
                                            </th>
                                        </tr>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $rides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ride): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row"><?php echo e($index + 1); ?></th>
                                                <td><?php echo e($ride->user->first_name); ?> <?php echo e($ride->user->last_name); ?></td>
                                                <td>
                                                    <a class="text-primary"
                                                        href="<?php echo e(route('admin.requests.show',$ride->id)); ?>"><span
                                                                class="underline"><?php echo app('translator')->getFromJson('admin.dashboard.View_Ride_Details'); ?></span></a>
                                                </td>
                                                <td>
                                                    <span class="text-muted"><?php echo e($ride->created_at->diffForHumans()); ?></span>
                                                </td>
                                                <td>
                                                    <?php if($ride->status == "COMPLETED"): ?>
                                                        <span class="tag tag-success">COMPLETO</span>
                                                    <?php elseif($ride->status == "CANCELLED"): ?>
                                                        <span class="tag tag-danger">CANCELADO</span>
                                                    <?php elseif($ride->status == "ARRIVED"): ?>
                                                        <span class="tag tag-info">ARRIVED</span>
                                                    <?php elseif($ride->status == "SEARCHING"): ?>
                                                        <span class="tag tag-info">SEARCHING</span>
                                                    <?php elseif($ride->status == "ACCEPTED"): ?>
                                                        <span class="tag tag-info">ACCEPTED</span>
                                                    <?php elseif($ride->status == "STARTED"): ?>
                                                        <span class="tag tag-info">STARTED</span>
                                                    <?php elseif($ride->status == "DROPPED"): ?>
                                                        <span class="tag tag-info">DROPPED</span>
                                                    <?php elseif($ride->status == "PICKEDUP"): ?>
                                                        <span class="tag tag-info">PICKEDUP</span>
                                                    <?php elseif($ride->status == "SCHEDULED"): ?>
                                                        <span class="tag tag-info">SCHEDULED</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>