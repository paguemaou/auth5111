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
                <div class="panel-heading">                
                    <h4 class="panel-title">Créer un utilisateur</h4>
                </div>
                <div class="panel-body">

                @include('partial.erreurSaisie')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/utilisateur/creer') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nom *</label>
                            <div class="col-md-6">
                                {!! Form::text('name',null, array('class'=> 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Adresse Mail *</label>
                            <div class="col-md-6">
                            {!! Form::text('email',null, array('class'=> 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Mot de passe *</label>
                            <div class="col-md-6">
                            {!! Form::password('password', array('class'=> 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirmer le mot de passe *</label>
                            <div class="col-md-6">
                            {!! Form::password('password_confirmation', array('class'=> 'form-control')) !!}
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
                            <label class="col-md-4 control-label">Rôle *</label>
                            <div class="col-md-6">
                                {!! Form::select('role', 
                                    $roles,
                                    'role_utilisateur', 
                                    array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <!-- end Select -->

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            {!! Form::submit('Valider', array('class'=> 'btn btn-success')) !!}
                            <a class="btn btn-default" href="/admin/utilisateur/liste">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- page level scripts --}}
@section('footer_scripts')
@stop