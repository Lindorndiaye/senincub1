        <!-- Main Content -->
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="background-color:#c3c629;">
                    <div class="panel-heading" style="color:#1f3463;">réinitialiser le mot de passe</div>
                    <div class="panel-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">
                            <?php echo csrf_field(); ?>


                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label"style="color:#1f3463;">E-Mail</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-#1f3463" style="color:#1f3463;">
                                        <i class="fa fa-btn fa-envelope"></i>Envoyer le lien de réinitialisation du mot de passe
                                    </button>
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