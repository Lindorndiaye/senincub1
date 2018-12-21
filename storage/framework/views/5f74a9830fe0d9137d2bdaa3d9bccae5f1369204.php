<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SenIncub</title>
    <link href="<?php echo e(URL::asset('css/jasny-bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(URL::asset('css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(URL::asset('css/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(URL::asset('css/dropzone.css')); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo e(URL::asset('css/jquery.atwho.min.css')); ?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo e(asset(elixir('css/app.css'))); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('images/FP_logo_big.png')); ?>" />

</head>
<body>

<div id="wrapper">

    <button type="button" class="navbar-toggle menu-txt-toggle" style=""><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>

    <div class="navbar navbar-default navbar-top">
        <!--NOTIFICATIONS START-->
<div class="menu">
   
    <div class="notifications-header"><p>Notifications</p> </div>
  <!-- Menu -->
 <ul>
 <?php $notifications = auth()->user()->unreadNotifications; ?>

    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   
    <a href="<?php echo e(route('notification.read', ['id' => $notification->id])); ?>" onClick="postRead(<?php echo e($notification->id); ?>)">
    <li> 
 <img src="/<?php echo e(auth()->user()->avatar); ?>" class="notification-profile-image">
    <p><?php echo e($notification->data['message']); ?></p></li>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
  </ul>
</div>

       <div class="dropdown" id="nav-toggle">
            <a id="notification-clock" role="button" data-toggle="dropdown">
                <i class="glyphicon glyphicon-bell"><span id="notifycount"><?php echo e($notifications->count()); ?></span></i>
            </a>
                </div>
                    <?php $__env->startPush('scripts'); ?>
                    <script>
$('#notification-clock').click(function(e) {
  e.stopPropagation();
  $(".menu").toggleClass('bar')
});
$('body').click(function(e) {
  if ($('.menu').hasClass('bar')) {
    $(".menu").toggleClass('bar')
  }
})      
                  id = {};
                        function postRead(id) {
                            $.ajax({
                                type: 'post',
                                url: '<?php echo e(url('/notifications/markread')); ?>',
                                data: {
                                    id: id,
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                        }

                    </script>
                <?php $__env->stopPush(); ?>
        <!--NOTIFICATIONS END-->
        <button type="button" id="mobile-toggle" class="navbar-toggle mobile-toggle" data-toggle="offcanvas" data-target="#myNavmenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>


    <!-- /#sidebar-wrapper -->
    <!-- Sidebar menu -->

    <nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm" role="navigation">
        <div class="list-group panel">
            <p class=" list-group-item siderbar-top" title=""><img src="<?php echo e(url('images/flarepoint_logo.png')); ?>" alt="" style="margin-left:15px;" width="200px"></p>
            <a href="<?php echo e(route('dashboard', \Auth::id())); ?>" class=" list-group-item" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-dashboard"></i><span id="menu-txt"><?php echo e(__('Tableau de bord')); ?></span> </a>
            <a href="<?php echo e(route('users.show', \Auth::id())); ?>" class=" list-group-item" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-user"></i><span id="menu-txt"><?php echo e(__('Profil')); ?></span> </a>


            <a href="#clients" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-tag"></i><span id="menu-txt"><?php echo e(__('Clients')); ?></span>
            <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="clients">

                <a href="<?php echo e(route('clients.index')); ?>" class="list-group-item childlist"><?php echo e(__('Tous les clients')); ?></a>
                <?php if(Entrust::can('client-create')): ?>
                    <a href="<?php echo e(route('clients.create')); ?>"
                       class="list-group-item childlist"><?php echo e(__('Nouveau client')); ?></a>
                <?php endif; ?>
            </div>

            <a href="#tasks" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-tasks"></i><span id="menu-txt"><?php echo e(__('Tâches')); ?></span>
            <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="tasks">
                <a href="<?php echo e(route('tasks.index')); ?>" class="list-group-item childlist"><?php echo e(__('Toutes les tâches')); ?></a>
                <?php if(Entrust::can('task-create')): ?>
                    <a href="<?php echo e(route('tasks.create')); ?>" class="list-group-item childlist"><?php echo e(__('Nouvelle tâche')); ?></a>
                <?php endif; ?>
            </div>

            <a href="#user" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="sidebar-icon fa fa-users"></i><span id="menu-txt"><?php echo e(__('Utilisateurs')); ?></span>
            <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="user">
                <a href="<?php echo e(route('users.index')); ?>" class="list-group-item childlist"><?php echo e(__('Tous les utilisateurs')); ?></a>
                <?php if(Entrust::can('user-create')): ?>
                    <a href="<?php echo e(route('users.create')); ?>"
                       class="list-group-item childlist"><?php echo e(__('Nouvel utilisateur')); ?></a>
                <?php endif; ?>
            </div>

            <a href="#leads" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-hourglass"></i><span id="menu-txt"><?php echo e(__('Rendez-vous')); ?></span>
            <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="leads">
                <a href="<?php echo e(route('leads.index')); ?>" class="list-group-item childlist"><?php echo e(__('Tous les rendez-vous')); ?></a>
                <?php if(Entrust::can('lead-create')): ?>
                    <a href="<?php echo e(route('leads.create')); ?>"
                       class="list-group-item childlist"><?php echo e(__('Nouveau rendez-vous')); ?></a>
                <?php endif; ?>
            </div>
            <a href="#departments" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                        class="sidebar-icon glyphicon glyphicon-list-alt"></i><span id="menu-txt"><?php echo e(__('Départements')); ?></span>
            <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
            <div class="collapse" id="departments">
                <a href="<?php echo e(route('departments.index')); ?>"
                   class="list-group-item childlist"><?php echo e(__('Tous les départements')); ?></a>
                <?php if(Entrust::hasRole('administrator')): ?>
                    <a href="<?php echo e(route('departments.create')); ?>"
                       class="list-group-item childlist"><?php echo e(__('Nouveau département')); ?></a>
                <?php endif; ?>
            </div>

            <?php if(Entrust::hasRole('administrator')): ?>
                <a href="#settings" class=" list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i
                            class="glyphicon sidebar-icon glyphicon-cog"></i><span id="menu-txt"><?php echo e(__('Réglages')); ?></span>
                <i class="ion-chevron-up  arrow-up sidebar-arrow"></i></a>
                <div class="collapse" id="settings">
                    <a href="<?php echo e(route('settings.index')); ?>"
                       class="list-group-item childlist"><?php echo e(__('Paramètres généraux')); ?></a>

                    <a href="<?php echo e(route('roles.index')); ?>"
                       class="list-group-item childlist"><?php echo e(__('Gestion des rôles')); ?></a>
                    
                </div>


            <?php endif; ?>
            <a href="<?php echo e(url('/logout')); ?>" class=" list-group-item impmenu" data-parent="#MainMenu"><i
                        class="glyphicon sidebar-icon glyphicon-log-out"></i><span id="menu-txt"><?php echo e(__('Déconnexion')); ?></span> </a>

        </div>
    </nav>


    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo $__env->yieldContent('heading'); ?></h1>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        <?php endif; ?>
        <?php if(Session::has('flash_message_warning')): ?>
             <message message="<?php echo e(Session::get('flash_message_warning')); ?>" type="warning"></message>
        <?php endif; ?>
        <?php if(Session::has('flash_message')): ?>
            <message message="<?php echo e(Session::get('flash_message')); ?>" type="success"></message>
        <?php endif; ?>
    </div>
    <!-- /#page-content-wrapper -->
</div>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/app.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/dropzone.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/jasny-bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery.caret.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery.atwho.min.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>