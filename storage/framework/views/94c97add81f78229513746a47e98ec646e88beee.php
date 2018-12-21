<div class="col-lg-6">

    <div class="profilepic"><img class="profilepicsize" src="../<?php echo e($contact->avatar); ?>" /></div>
    <h1><?php echo e($contact->nameAndDepartment); ?> </h1>

    <!--MAIL-->
    <p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
        <a href="mailto:<?php echo e($contact->email); ?>"><?php echo e($contact->email); ?></a></p>
    <!--Work Phone-->
    <p><span class="glyphicon glyphicon-headphones" aria-hidden="true"></span>
        <a href="tel:<?php echo e($contact->work_number); ?>"><?php echo e($contact->work_number); ?></a></p>

    <!--Personal Phone-->
    <p><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
        <a href="tel:<?php echo e($contact->personal_number); ?>"><?php echo e($contact->personal_number); ?></a></p>

    <!--Address-->
    <p><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
        <?php echo e($contact->address); ?>  </p>
</div>