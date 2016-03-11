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
                    <h4 class="panel-title"> 
                    Modifier le mot de passe
                    </h4>
                </div>
                <div class="panel-body">

                @include('partial.erreurSaisie')

                    {!! Form::model($user, array(
                        'method' => 'post',
                        'route' => array('admin.userprofile.pwdmodifier',  $user->id),
                        'class' => 'form-horizontal')) !!}

                        <input type="hidden" name="id" value="{{ $user->id }}">
                        
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
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Valider
                                </button>
                            </div>
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