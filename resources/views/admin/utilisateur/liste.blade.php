@extends('template.layout')

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" type="text/css" href="{{ asset('datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('datatables/css/dataTables.searchHighlight.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />

@stop

{{-- content --}}
@section('content')

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left">Liste des utilisateurs
                </h4>
                <div class="pull-right">
                <a href="{{ action('Admin\UtilisateurController@creer') }}" class="btn btn-sm btn-success"><span class="fa fa-user-plus"></span>      Créer un utilisateur</a>
                </div>
            </div>
            
            <div class="panel-body">
                <table id="{{ $randomTableId }}" class="table table-bordered table-hover table-condensed dataTable no-footer" >
                    <thead>
                        <tr role="row">
                            <th>id</th>
                            <th>Nom</th>
                            <th>E-mail</th>
                            <th>Téléphone</th>
                            <th>Fonction</th>
                            <th>Divers</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="#" class="btn btn-default btn-xs">{{ $user->id }}</a> 
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telephone }}</td>
                            <td>{{ $user->fonction }}</td>
                            <td>{{ $user->divers }}</td>
                            <td>
                            @foreach($user->roles as $role) 
                                {{ $role->display_name }}</br>
                            @endforeach
                            </td>
                            <td>
                              <a href="{{ action('Admin\UtilisateurController@modifier', $user->id) }}" class="btn btn-success btn-xs">Modifier</a>     
                             <a href="{{ action('Admin\UtilisateurController@supprimer', $user->id) }}" class="btn btn-danger btn-xs">Supprimer</a></td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>    <!-- row-->
</section>
{{-- end content --}}
@stop

{{-- footer_scripts --}}
@section('footer_scripts')
 <script type="text/javascript" charset="utf8" src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables/js/jquery.highlight.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables/js/dataTables.searchHighlight.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('{{ '#' . $randomTableId }}').DataTable({
        "searchHighlight": true,
        "language": {
            "url": "/datatables/localisation/FR_fr.json"
            }
        });
});
</script>
{{-- end footer_scripts --}}
@stop