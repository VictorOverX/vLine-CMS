
<!-- sidebar-->
<aside class="aside">
   <div class="aside-inner">
      <nav class="sidebar">
         <ul class="nav">
            <li class="has-user-block">
               <div id="user-block">
                  <div class="item user-block">
                     <div class="user-block-picture">
                        <div class="user-block-status">
                           <img src="{{ URL::to('app/img/user/02.jpg')}}" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
                           <div class="circle circle-success circle-lg"></div>
                        </div>
                     </div>
                     <div class="user-block-info">
                        <span class="user-block-name">Olá {{ \Auth::user()->name }}</span>
                        <span class="user-block-role">Administrador</span>
                     </div>
                  </div>
               </div>
            </li>

            <li class="nav-heading ">
               <span>Navegação</span>
            </li>
            <li class="{{ \App\library\CoreHelpers::Ativate("admin/painel", "active") }}">
               <a href="{{ URL::to('admin/painel') }}" title="Dashboard">
                  <em class="icon-home2"></em>
                  <span>Dashboard</span>
               </a>               
            </li> 

            <li class="nav-heading ">
               <span>Blog</span>
            </li>
            <li class="">
               <a href="#blog" title="Blog de Notícias" data-toggle="collapse">
                  <em class="icon-note"></em>
                  <span>Blog de Notícias</span>
               </a>
               <ul id="blog" class="nav sidebar-subnav collapse">
                  <li class="{{ \App\library\CoreHelpers::Ativate(['admin/posts', 'admin/novo-post'], 'active') }}">
                     <a href="{{ URL::to('admin/posts') }}" title="Posts">
                        <em></em>
                        <span>Posts</span>
                     </a>
                  </li>   

                  <li class="{{ \App\library\CoreHelpers::Ativate('admin/tags', 'active') }}">
                     <a href="{{ URL::to('admin/tags') }}" title="Tags">
                        <em></em>
                        <span>Tags</span>
                     </a>
                  </li>                  

                  <li class="{{ \App\library\CoreHelpers::Ativate('admin/categorias', 'active') }}">
                     <a href="{{ URL::to('admin/categorias') }}" title="Categorias">
                        <em></em>
                        <span>Categorias</span>
                     </a>
                  </li>  

                  <li class="{{ \App\library\CoreHelpers::Ativate('admin/comentarios', 'active') }}">
                     <a href="{{ URL::to('admin/comentarios') }}" title="Posts">
                        <em></em>
                        <span>Comentários</span>
                     </a>
                  </li>                  
               </ul>
            </li> 

            <li class="nav-heading ">
               <span>Layout Studio</span>
            </li>
            <li class="">
               <a href="#layout" title="Gerenciador (CMS)" data-toggle="collapse">
                  <em class="icon-folder-alt"></em>
                  <span>Gerenciador (CMS)</span>
               </a>
               <ul id="layout" class="nav sidebar-subnav collapse">
                  <li class="sidebar-subnav-header">Editor de Arquivos</li>
                  <li class="{{ \App\library\CoreHelpers::Ativate('admin/editor-layout', 'active') }}">
                     <a href="{{ URL::to('admin/editor-layout') }}" title="Layout">
                        <em></em>
                        <span>Layout</span>
                     </a>
                  </li>                 
                  <li class="{{ \App\library\CoreHelpers::Ativate('admin/editor-arquivo', 'active') }}">
                     <a href="{{ URL::to('admin/editor-arquivo') }}" title="Páginas">
                        <em></em>
                        <span>Páginas</span>
                     </a>
                  </li>                        
               </ul>
            </li> 

            <li class="nav-heading ">
               <span>Configurações</span>
            </li>
            <li class="">
               <a href="#usuarios" title="Gestão de Usuários" data-toggle="collapse">
                  <em class="icon-users"></em>
                  <span>Gestão de Usuários</span>
               </a>
               <ul id="usuarios" class="nav sidebar-subnav collapse">
                  <li class="{{ \App\library\CoreHelpers::Ativate('admin/usuarios', 'active') }}">
                     <a href="{{ URL::to('admin/usuarios') }}" title="Layout">
                        <em></em>
                        <span>Usuários</span>
                     </a>
                  </li>                 
                                     
               </ul>
            </li> 

         </ul>
      </nav>
   </div>
</aside>