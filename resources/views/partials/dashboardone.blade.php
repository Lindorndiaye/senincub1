
<br/><br/>
<div class="col-sm-6">
    {{-- <ul class="nav nav-tabs navtab-bg"> 
        <li class=""> 
            <a href="#home" data-toggle="tab" aria-expanded="false"> 
                <span class="visible-xs"><i class="fa fa-home"></i></span> 
                <span class="hidden-xs">Home</span> 
            </a> 
        </li> 
        <li class="active"> 
            <a href="#profile" data-toggle="tab" aria-expanded="true"> 
                <span class="visible-xs"><i class="fa fa-user"></i></span> 
                <span class="hidden-xs">Profile</span> 
            </a> 
        </li> 
        <li class=""> 
            <a href="#messages" data-toggle="tab" aria-expanded="false"> 
                <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                <span class="hidden-xs">Contact</span> 
            </a> 
        </li> 
        
    </ul> 
    <div class="tab-content"> 
        <div class="tab-pane" id="home"> 
            <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p> 
        </div> 
        <div class="tab-pane active" id="profile"> 
            <p>profil</p> 
        </div> 
        <div class="tab-pane" id="messages"> 
            <!------------------------------------------------------------------------------------------------- -->
          Contact
            <!------------------------------------------------------------------------------------------------- -->
        </div> 
        
    </div> --}}
    <div class="box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title"
            >
                {{ __('Tâches de ce mois') }}
            </h4>
            <div class="box-tools pull-right">
                <button type="button" id="collapse1" class="btn btn-box-tool" data-toggle="collapse"
                        data-target="#collapseOne"><i id="toggler1" class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div id="collapseOne" class="panel-collapse">
            <div class="box-body">
                <div>
                    <graphline class="chart" :labels="{{json_encode($createdTaskEachMonths)}}"
                               :values="{{json_encode($taskCreated)}}"
                               :valuesextra="{{json_encode($taskCompleted)}}"></graphline>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title"
            >
               {{ __('Rendez-vous ce mois') }}
            </h4>
            <div class="box-tools pull-right">
                <button type="button" id="collapse2" class="btn btn-box-tool" data-toggle="collapse"
                        data-target="#collapseTwo"><i id="toggler2" class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div id="collapseTwo" class="panel-collapse">
            <div class="box-body">
                <div>
                    <graphline class="chart" :labels="{{json_encode($createdLeadEachMonths)}}"
                               :values="{{json_encode($leadCreated)}}"
                               :valuesextra="{{json_encode($leadsCompleted)}}"></graphline>

                </div>
            </div>
        </div>
    </div> 
</div> 
<div class="col-sm-6">

    <div class="col-lg-12">
        <!-- Info Boxes Style 2 -->
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"> {{ __('Toutes les tâches') }} </span>
                <span class="info-box-number">{{$allCompletedTasks}} / {{$alltasks}}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: {{$totalPercentageTasks}}%"></div>
                </div>
                  <span class="progress-description">
                    {{number_format($totalPercentageTasks, 0)}}% {{ __('Completée') }}
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <div class="col-lg-12">
        <!-- /.info-box -->
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('Tous les rendez-vous') }}</span>
                <span class="info-box-number">{{$allCompletedLeads}} / {{$allleads}}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: {{$totalPercentageLeads}}%"></div>
                </div>
                  <span class="progress-description">
                    {{number_format($totalPercentageLeads, 0)}}% {{ __('Completé') }}
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>

    </div>
    <div class="col-sm-12">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title"
                >
                    {{ __('Utilisateurs') }}
                </h4>
                <div class="box-tools pull-right">

                </div>
            </div>
            <div id="collapseOne" class="panel-collapse">

                @foreach($users as $user)
                    <div class="col-lg-1">
                        @if($user->isOnline())
                            <i class="dot-online" data-toggle="tooltip" title="Online" data-placement="left"></i>
                        @else
                            <i class="dot-offline" data-toggle="tooltip" title="Offline" data-placement="left"></i>
                        @endif
                        <a href="{{route('users.show', $user->id)}}">
                            <img class="small-profile-picture" data-toggle="tooltip" title="{{$user->name}}"
                                 data-placement="left"
                                 @if($user->image_path != "")
                                 src="images/{{$companyname}}/{{$user->image_path}}"
                                 @else
                                 src="images/default_avatar.jpg"
                                    @endif />
                        </a>

                    </div>

                @endforeach

            </div>
        </div>
    </div>


</div> 
</div> 


<!-- Info boxes -->
{{-- <div class="row movedown">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('Tasks completed today') }}</span>
                <span class="info-box-number">{{$completedTasksToday}}
                    <small></small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('Tasks created today') }}</span>
                <span class="info-box-number">{{$createdTasksToday}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('Leads completed today') }}</span>
                <span class="info-box-number">{{$completedLeadsToday}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('Leads created today') }}</span>
                <span class="info-box-number">{{$createdLeadsToday}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
</div> --}}
<!-- /.info-box -->
