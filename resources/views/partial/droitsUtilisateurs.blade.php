  <!-- DROITS DES UTILISATEURS -->
<b>Vérification des Roles de l'utilisateur connecté</b></br>
@if (Auth::check())
role_administrateur : {{ Auth::user()->hasRole('role_administrateur') ? 1 : 0 }}</br>
role_gestionnaire   : {{ Auth::user()->hasRole('role_gestionnaire') ? 1 : 0 }}</br>
role_utilisateur    : {{ Auth::user()->hasRole('role_utilisateur') ? 1 : 0 }}</br>
@else 
Non connecté !!!<br>
@endif

<b>Permissions de l'utilisateur connecté</b></br>
@if (Auth::check())
perm_administrateur : {{ Auth::user()->can('perm_administrateur') ? 1 : 0 }}</br>
perm_gestionnaire   : {{ Auth::user()->can('perm_gestionnaire') ? 1 : 0 }}</br>
perm_utilisateur    : {{ Auth::user()->can('perm_utilisateur') ? 1 : 0 }}</br>
@else 
Non connecté !!!<br>
@endif

<b>Affichage de menus pour l'utilisateur connecté : </b>
@if (Auth::check())
{{ Auth::user()->can('perm_administrateur') ? 'Menu Administrateur ' : null}}  
{{ Auth::user()->can('perm_gestionnaire') ? '| Menu Gestionnaire ' : null }} 
{{ Auth::user()->can('perm_utilisateur') ? '| Menu Utilisateur ' : null}} 
@else 
</br>Non connecté !!!
@endif

</br>
<h3>Users, Roles, Permissions</h3>
@foreach ($users as $user)

<b>User :</b>{{ $user->name }} -- {{ $user->email }}</br>
<b>Roles:</b>
  @foreach($user->roles as $role) 
        {{ $role->name }} {{ $role->id }} </br>
  @endforeach
  </br>
@endforeach
</br>
  <!-- END DROITS DES UTILISATEURS -->
