@extends('template.layout')

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">                
                    <h4 class="panel-title pull-left">
                        Modifier un utilisateur
                    </h4>
                    <!-- Bouton modifier le mot de passe -->
                    <div class="pull-right">
                    <a href="{{ action('Admin\UtilisateurController@pwdmodifier', $user->id) }}" class="btn btn-success btn-sm">
                    <span class="fa fa-key"></span> Modifier le mot de passe</a>
                    </div>
                </div>
                <div class="panel-body">

                @include('partial.erreurSaisie')

                    {!! Form::model($user, array(
                        'method' => 'post',
                        'route' => array('admin.utilisateur.modifier',  $user->id),
                        'class' => 'form-horizontal')) !!}

                        <input type="hidden" name="id" value="{{ $user->id }}">
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nom *</label>
                            <div class="col-md-6">
                            {!! Form::text('name',null, array('class'=> 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Addresse mail *</label>
                            <div class="col-md-6">
                            {!! Form::text('email',null, array('class'=> 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Téléphone</label>
                            <div class="col-md-6">
                            {!! Form::text('telephone',null, array('class'=> 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Fonction</label>
                            <div class="col-md-6">
                            {!! Form::text('fonction',null, array('class'=> 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Divers</label>
                            <div class="col-md-6">
                            {!! Form::text('divers',null, array('class'=> 'form-control')) !!}
                            </div>
                        </div>
                        <!-- Select -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Rôle</label>
                            <div class="col-md-6">
                                {!! Form::select('role', 
                                    $roles, 
                                    $user->roles()->first()->name, 
                                    array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <!-- end Select -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Valider', array('class'=> 'btn btn-success')) !!}
                            <a class="btn btn-default" href="/admin/utilisateur/liste">Annuler</a>
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- page level scripts --}}
@section('footer_scripts')
@stop