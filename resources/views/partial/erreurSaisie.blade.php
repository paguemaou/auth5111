 @if (count($errors) > 0)
 <div class="alert alert-danger">
 	<strong>Erreur(s) rencontrée(s) </strong> Veuillez les corriger :<br>
 	<ul>
 		@foreach ($errors->all() as $error)
 		<li>{{ $error }}</li>
 		@endforeach
 	</ul>
 </div>
 @endif