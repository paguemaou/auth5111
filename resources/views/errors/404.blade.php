@extends('template.layout')

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')
<!-- accesrestreint -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">                
                    <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="9" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Erreur 404
                    </h4>
                </div>
                <div class="panel-body">

                @include('partial.erreurSaisie')
 
          <h2 class="page-header">
           <span class="fa-stack fa-2x"><i class="fa fa-thumbs-o-up fa-stack-1x"></i>
            <!-- il faut forcer text-danger par le style -->
            <i class="fa fa-ban fa-stack-2x text-danger" style="color:red"></i></span>
            Page inconnue <br><small>La page à laquelle vous souhaitez accéder est inconnue.</small>
          </h2>

          <a href="{!! URL::previous() !!}" class="btn btn-primary">Retour page précédente</a>


  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END accesrestreint -->
@endsection

{{-- page level scripts --}}
@section('footer_scripts')
@stop



