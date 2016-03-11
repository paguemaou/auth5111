<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
</head>
<body>
	<font face="verdana">
		<h3>{{ getenv('NOM_DU_SITE') }} : demande de changement du mot de passe</h3><br><br>

		<div>
		    Cliquez sur ce lien pour modifier le mot de passe :<br><br>
		     {{ url('password/reset/'.$token) }}<br><br>

			Ce lien exprirera automatiquement dans {{ config('auth.reminder.expire', 60) }} minutes.<br><br>

			Si vous n'avez pas demandé de changement de mot de passe, ne tenez pas compte de ce message et prévenez l'administrateur du site {{ getenv('NOM_DU_SITE') }}.<br><br>

			Le message vous a été adressé automatiquement, il est inutile d'y répondre.<br><br>

			L'équipe technique
		</div>
	</font> 
</body>
</html>
