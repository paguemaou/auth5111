@extends('template.layout')

@section('content')
<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
    <!-- breadcrumbs -->        
    <ol class="breadcrumb" style="margin-bottom: 5px;">
        <li>
            <a href="http://josh:8000/admin">Home</a>
        </li>
        <li>
            <a href="#">DataTables</a>
        </li>
        <li class="active">Advanced Datatables</li>
    </ol>
    <!-- end breadcrumbs -->

        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="9" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Titre à afficher
                </h4>
            </div>
            <br />
            <div class="panel-body">
                Contenu de la fenêtre
            </div>
        </div>
    </div>    <!-- row-->
</section>
@stop