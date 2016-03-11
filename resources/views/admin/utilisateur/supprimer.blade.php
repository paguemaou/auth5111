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
                    Supprimer un utilisateur
                    </h4>
                </div>
                <div class="panel-body">

                @include('partial.erreurSaisie')
 
                    <div class="page-header">
 <h2>Supprimer l'utilisateur "{{ $user->name }}" <small> Etes-vous sûr ?</small></h2>
 </div>
 <form action="{{ action('Admin\UtilisateurController@handlesupprimer') }}" method="post" role="form">
    {!! Form::token() !!}
 <input type="hidden" name="user" value="{{ $user->id }}" />
<input type="submit" class="btn btn-danger" value="Supprimer" />
 <a href="{{ action('Admin\UtilisateurController@liste') }}" class="btn btn-default">Ne pas supprimer</a>
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