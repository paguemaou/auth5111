  <!-- BARRE DE NAVIGATION -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header"><!-- navbar-header -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><span class="fa fa-lg fa-cogs "></span><b> {{ getenv('NOM_DU_SITE') }}</b></a>
        </div>
        <!-- End Brand -->

        <!-- collapse Everything you want hidden at 940px or less, place within here -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1"><!-- l'id est mentionné dans le tag <button> -->
          <!-- .nav, .navbar-search, .navbar-form, etc -->

          <ul class="nav navbar-nav"><!-- nav cadré à gauche -->
            <li><a href="/"><span class="fa fa-home"></span> Accueil</a></li>
            <li><a href="#">Link1</a></li>

            @if ( Auth::check())
             @if ( Auth::user()->can('perm_gestionnaire') )
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Utilisateurs<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/admin/utilisateur/liste">Liste des utilisateurs</a></li>
                  <li><a href="/admin/utilisateur/creer">Créer un utilisateur</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="navbar-header">navbar-header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
              @endif
            @endif

            @if ( Auth::check())
             @if ( Auth::user()->can('perm_administrateur') )
                <li><a href="/admin/administrateur/index">Administration</a></li>
              @endif
            @endif
            
          </ul><!-- END nav cadré à gauche -->

          <ul class="nav navbar-nav navbar-right"><!-- nav pull right -->
            <!-- utilisateur -->
            @if (Auth::check()) 

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i></span> {{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/admin/userprofile/pwdmodifier/{{ Auth::user()->id }}"><span class="fa fa-fw fa-flip-vertical fa-key"></span> Mot de passe</a></li>
                <li><a href="/admin/userprofile/modifier/{{ Auth::user()->id }}"><span class="fa fa-fw fa-wrench"></span> Profil</a></li>        
                <li class="divider"></li>
                <li><a href="/auth/logout"><span class="fa fa-fw fa-sign-out"></span> Quitter</a></li>
              </ul>
            </li>

            @else 

            <li><a href="/auth/login"><span class="fa fa-sign-in"></span> Connexion</a></li>

            @endif
            <!-- END utilisateur -->
          </ul><!-- END nav pull right -->

        </div><!-- navbar collapse -->
      </div><!-- end container-fluid -->
    </nav><!-- end container -->
  </nav><!-- end navbar -->
  <!-- END BARRE DE NAVIGATION -->
