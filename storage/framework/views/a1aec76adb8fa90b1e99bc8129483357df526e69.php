<div class="col-md-6">

    <h1 class="moveup"><?php echo e($client->name); ?> (<?php echo e($client->company_name); ?>)</h1>

    <!--Client info leftside-->
    <div class="contactleft">
        <?php if($client->email != ""): ?>
                <!--MAIL-->
        <p><span class="glyphicon glyphicon-envelope" aria-hidden="true" data-toggle="tooltip"
                 title="<?php echo e(__('mail')); ?>" data-placement="left"> </span>
            <a href="mailto:<?php echo e($client->email); ?>" data-toggle="tooltip" data-placement="left"><?php echo e($client->email); ?></a></p>
        <?php endif; ?>
        <?php if($client->primary_number != ""): ?>
                <!--Work Phone-->
        <p><span class="glyphicon glyphicon-headphones" aria-hidden="true" data-toggle="tooltip"
                 title=" <?php echo e(__('Primary number')); ?> " data-placement="left"> </span>
            <a href="tel:<?php echo e($client->work_number); ?>"><?php echo e($client->primary_number); ?></a></p>
        <?php endif; ?>
        <?php if($client->secondary_number != ""): ?>
                <!--Secondary Phone-->
        <p><span class="glyphicon glyphicon-phone" aria-hidden="true" data-toggle="tooltip"
                 title="<?php echo e(__('Secondary number')); ?>" data-placement="left"> </span>
            <a href="tel:<?php echo e($client->secondary_number); ?>"><?php echo e($client->secondary_number); ?></a></p>
        <?php endif; ?>
        <?php if($client->address || $client->zipcode || $client->city != ""): ?>
                <!--Address-->
        <p><span class="glyphicon glyphicon-home" aria-hidden="true" data-toggle="tooltip"
                 title="<?php echo e(__('Full address')); ?>" data-placement="left"> </span> <?php echo e($client->address); ?>

            <br/><?php echo e($client->zipcode); ?> <?php echo e($client->city); ?>

        </p>
        <?php endif; ?>
    </div>

    <!--Client info leftside END-->
    <!--Client info rightside-->
    <div class="contactright">
        <?php if($client->company_name != ""): ?>
                <!--Company-->
        <p><span class="glyphicon glyphicon-star" aria-hidden="true" data-toggle="tooltip"
                 title="<?php echo e(__('Company')); ?>" data-placement="left"> </span> <?php echo e($client->company_name); ?></p>
        <?php endif; ?>
        <?php if($client->vat != ""): ?>
                <!--Company-->
        <p><span class="glyphicon glyphicon-cloud" aria-hidden="true" data-toggle="tooltip"
                 title="<?php echo e(__('vat')); ?>" data-placement="left"> </span> <?php echo e($client->vat); ?></p>
        <?php endif; ?>
        <?php if($client->industry != ""): ?>
                <!--Industry-->
        <p><span class="glyphicon glyphicon-briefcase" aria-hidden="true" data-toggle="tooltip"
                 title="<?php echo e(__('Industry')); ?>"data-placement="left"> </span> <?php echo e($client->industry); ?></p>
        <?php endif; ?>
        <?php if($client->company_type!= ""): ?>
                <!--Company Type-->
        <p><span class="glyphicon glyphicon-globe" aria-hidden="true" data-toggle="tooltip"
                 title="<?php echo e(__('Company type')); ?>" data-placement="left"> </span>
            <?php echo e($client->company_type); ?></p>
        <?php endif; ?>
    </div>
</div>

<!--Client info rightside END-->
