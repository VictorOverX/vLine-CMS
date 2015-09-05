<!-- top navbar-->
<header class="topnavbar-wrapper">
   <!-- START Top Navbar-->
   <nav role="navigation" class="navbar topnavbar">
      <!-- START navbar header-->
      <div class="navbar-header">
         <a href="#/" class="navbar-brand">
            <div class="brand-logo">
               <img src="{{ URL::to('app/img/logo.png') }}" alt="App Logo" class="img-responsive">
            </div>
            <div class="brand-logo-collapsed">
               <img src="{{ URL::to('app/img/logo-single.png') }}" alt="App Logo" class="img-responsive">
            </div>
         </a>
      </div>
      <!-- END navbar header-->
      <!-- START Nav wrapper-->
      <div class="nav-wrapper">
         <!-- START Left navbar-->
         <ul class="nav navbar-nav">
            <li>
               <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
               <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                  <em class="fa fa-navicon"></em>
               </a>
               <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
               <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
                  <em class="fa fa-navicon"></em>
               </a>
            </li>
            <!-- START User avatar toggle-->
            <li>
               <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
               <a href="#user-block" data-toggle="collapse">
                  <em class="fa fa-user"></em>
               </a>
            </li>
            <!-- END User avatar toggle-->
            <!-- START lock screen-->
            <li>
               <a href="" title="Lock screen">
                  <em class="fa fa-lock"></em>
               </a>
            </li>
            <!-- END lock screen-->
         </ul>
         <!-- END Left navbar-->
         <!-- START Right Navbar-->
         <ul class="nav navbar-nav navbar-right">
            <!-- Search icon-->
            <li>
               <a href="#" data-search-open="">
                  <em class="fa fa-search"></em>
               </a>
            </li>
            <!-- Fullscreen (only desktops)-->
            <li class="">
               <a href="{{ URL::to('/') }}" target="_blank">
                  <em class="fa fa-home"></em>
               </a>
            </li>
            <!-- START Alert menu-->
            <li class="dropdown dropdown-list">
               <a href="#" data-toggle="dropdown">
                  <em class="fa fa-bell"></em>
                  <div class="label label-danger">11</div>
               </a>
               <!-- START Dropdown menu-->
               <ul class="dropdown-menu animated flipInX">
                  <li>
                     <!-- START list group-->
                     <div class="list-group">
                        <!-- list item-->
                        <a href="#" class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <em class="fa fa-twitter fa-2x text-info"></em>
                              </div>
                              <div class="media-box-body clearfix">
                                 <p class="m0">Novos Seguidores</p>
                                 <p class="m0 text-muted">
                                    <small>1 novo seguidor</small>
                                 </p>
                              </div>
                           </div>
                        </a>
                        <!-- list item-->
                        <a href="#" class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <em class="fa fa-envelope fa-2x text-warning"></em>
                              </div>
                              <div class="media-box-body clearfix">
                                 <p class="m0">Novo e-mails</p>
                                 <p class="m0 text-muted">
                                    <small>Você tem novos 10 e-mails</small>
                                 </p>
                              </div>
                           </div>
                        </a>
                        <!-- list item-->
                        <a href="#" class="list-group-item">
                           <div class="media-box">
                              <div class="pull-left">
                                 <em class="fa fa-tasks fa-2x text-success"></em>
                              </div>
                              <div class="media-box-body clearfix">
                                 <p class="m0">Tarefas pendentes</p>
                                 <p class="m0 text-muted">
                                    <small>11 tarefas pendentes</small>
                                 </p>
                              </div>
                           </div>
                        </a>
                        <!-- last list item -->
                        <a href="#" class="list-group-item">
                           <small>Mais notificações</small>
                           <span class="label label-danger pull-right">14</span>
                        </a>
                     </div>
                     <!-- END list group-->
                  </li>
               </ul>
               <!-- END Dropdown menu-->
            </li>
            <!-- END Alert menu-->
            <!-- START Contacts button-->
            <li>
               <a href="{{ URL::to('logout') }}">
                  <em class="fa fa-unlock"></em>
               </a>
            </li>
            <!-- END Contacts menu-->
         </ul>
         <!-- END Right Navbar-->
      </div>
      <!-- END Nav wrapper-->
      <!-- START Search form-->
      <form role="search" action="search.html" class="navbar-form">
         <div class="form-group has-feedback">
            <input type="text" placeholder="Buscar no site..." class="form-control">
            <div data-search-dismiss="" class="fa fa-times form-control-feedback"></div>
         </div>
         <button type="submit" class="hidden btn btn-default">Enviar</button>
      </form>
      <!-- END Search form-->
   </nav>
   <!-- END Top Navbar-->
</header>