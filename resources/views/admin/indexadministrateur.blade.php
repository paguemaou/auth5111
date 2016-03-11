@extends('template.layout')

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<h2>
	Administration<small> {{ getenv('NOM_DU_SITE') }}</small>
</h2>
@include('partial.erreurSaisie')
{{-- Row 1 --}}
<div class="row">

	<div class="col-md-6">  
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="panel-title">
				Informations techniques
				</h4>
			</div>
			<div class="panel-body">
			Editeur du logiciel :</br>
			Nom du logiciel :</br>
			Version de l'application :</br>
			<a href="/admin/administrateur/logs"target="_blank">Logs de l'application</a> (ouvre un nouvel onglet)</br>
			</div>
		</div>
	</div>

	<div class="col-md-6">  
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="panel-title">
				Contacter le support
				</h4>
			</div>
			<div class="panel-body">
			e-mail : support_technique@societe.com</br>
			tél : xx.xx.xx.xx (indiquer le n° de téléphone???)

			</div>
		</div>
	</div>

</div>
{{-- End Row 1 --}}
{{-- Row 2 --}}
<div class="row">

	<div class="col-md-6">  
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="panel-title">
				Panneau 3
				</h4>
			</div>
			<div class="panel-body">
			Contenu du panneau 3

			</div>
		</div>
	</div>

	<div class="col-md-6">  
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="panel-title">
				Panneau 4
				</h4>
			</div>
			<div class="panel-body">
			Contenu du panneau 4

			</div>
		</div>
	</div>

</div>
{{-- End Row 2 --}}
						{{-- Row 3 --}}
						<div class="row">
							<div class="col-md-4">  
								<div class="panel panel-default">
									<div class="panel-body">

										<span class="fa-stack fa-4x pull-left">
											<i class="fa fa-circle fa-stack-2x" style="color:#006699"></i>
											<i class="fa fa-paper-plane fa-stack-1x fa-inverse" ></i>
										</span>

										<h2> 123 Collèges</h2>
										<div class="in-bold">
											€0.00<br/>
										</div>
										<div class="in-thin">
											de bénéfice total
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="panel panel-default">
									<div class="panel-body">
										<img src="http://invoice-ninja:8000/images/clients.png" class="in-image"/>  
										<div class="in-bold">
											0        </div>
											<div class="in-thin">
												clients facturés 
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="panel panel-default">
										<div class="panel-body">
											<img src="http://invoice-ninja:8000/images/totalinvoices.png" class="in-image"/>  
											<div class="in-bold">
												0        </div>
												<div class="in-thin">
													Factures envoyé        </div>
												</div>
											</div>
										</div>
									</div>
{{-- End Row 3 --}}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop