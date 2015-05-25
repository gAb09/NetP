<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Imap</h2>

		<div>
			<h3>imap_list — Lit la liste des boîtes aux lettres</h3>
		{{{var_dump($list)}}}
		</div>

		<div>
			<h3>imap_check — Vérifie la boîte aux lettres courante</h3>
		{{{var_dump($check)}}}
		</div>

		<div>
			<h3>imap_getmailboxes — Liste les boîtes aux lettres, et retourne les détails de chacune</h3>
		{{{var_dump($getmailboxes)}}}
		</div>

		<div>
			<h3>imap_headers — Retourne les en-têtes de tous les messages d'une boîte aux lettres</h3>
		{{{var_dump($headers)}}}
		</div>

		<div>
			<h3>imap_num_msg — Retourne le nombre de messages dans la boîte aux lettres courante</h3>
		{{{var_dump($num_msg)}}}
		</div>

		<div>
			<h3>imap_status — Retourne les informations de statut sur une boîte aux lettres</h3>
		{{{var_dump($status)}}}
		</div>

		<div>
			<h3>imap_errors — Retourne toutes les erreurs IMAP survenues</h3>
		{{{var_dump($errors)}}}
		</div>

		<div>
			<h3>imap_fetch_overview — Lit le sommaire des en-têtes de messages</h3>
			@foreach($messages as $message)
		{{{var_dump($message)}}}
		@endforeach
		</div>

		<div>
			<h3>imap_body — Lit le corps d'un message</h3>
		{{{var_dump($body)}}}
		</div>

		<div>
			<h3>imap_fetchstructure — Lit la structure d'un message</h3>
		{{{var_dump($structure)}}}
		</div>

	</body>
</html>