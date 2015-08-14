function edit(ligne, numero_ligne) {

	var request = getXMLHttpRequest();
	var url = document.location.pathname+'/';

	ligne.className = ligne.className+' edit';

	request.onreadystatechange = function() {
		if (request.readyState == 4 && (request.status == 200 || request.status === 0)) {
			if (request.responseText) {
				response = request.responseText;
				ligne.innerHTML = response;
			} else {
				alert('pas OK');
			}
		}
	};

	request.open('GET', url + numero_ligne + '/edit', true);
	request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	request.send(null);
}


function index(numero_ligne, update) {

	var ligne = document.getElementById('ligne_' + numero_ligne);
	var url = document.location.pathname+'/';

	ligne.className = ligne.className.replace(' edit', '');

	var formulaire = document.getElementById('formulaire');

	var request = getXMLHttpRequest();

	if (update === true)
	{
		formulaire.submit();
	}


	request.onreadystatechange = function () {
		if (request.readyState == 4 && (request.status == 200 || request.status === 0)) {
			if (request.responseText) {
				ligne.innerHTML = request.responseText;
				handleTetiere(numero_ligne, 'ôte');
			} else {
				alert('index pas OK');
			}
		}
	};

	request.open('GET', url + numero_ligne, true);
	request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	request.send(null);
}


function ToggleIsPayed(numero_ligne, input) {
	var legende = document.getElementById('span_is_payed' + numero_ligne);

	if (input.checked) {
		legende.innerHTML = 'Payée';

	} else {
		legende.innerHTML = 'Non payée';
	}
}


function ToggleIsForced(numero_ligne, input) {
	var legende = document.getElementById('span_is_forced' + numero_ligne);

	if (input.value === '-1') {
		legende.innerHTML = 'Forcée Invalide';
	}
	if (input.value === '0') {
		legende.innerHTML = 'Auto';
	}
	if (input.value === '1') {
		legende.innerHTML = 'Forcée Valide';
	}
}

function deleteAdhesion(id, msg){
	confirmation(msg);
}

function editNote(id, note){
	alert(note);
}