<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background-color:#c3c629;">

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                            <?php echo csrf_field(); ?>


                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label" style="color:#1f3463">E-Mail</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label" style="color:#1f3463">Mot de passe</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label style="color:#1f3463">
                                            <input type="checkbox" name="remember" > Se souvenir de moi
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" >
                                <div class="col-md-6 col-md-offset-4" >
                                    <button type="submit" style="color:#1f3463" >
                                        <i class="fa fa-btn fa-sign-in"></i>S'identifier
                                    </button>

                                    <a class="btn btn-link" style="color:#1f3463" href="<?php echo e(url('/password/reset')); ?>">Mot de passe oublié?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>