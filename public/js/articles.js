function editArticle(numero_ligne) {

	var request = getXMLHttpRequest();
	var url = document.location.pathname+'/';

	var cible = document.getElementById('div' + numero_ligne);

alert(cible.id);
	// cible.className = cible.className+' edit';

	request.onreadystatechange = function() {
		if (request.readyState == 4 && (request.status == 200 || request.status === 0)) {
			if (request.responseText) {
				response = request.responseText;
				cible.innerHTML = cible.innerHTML + response;
				// cible.contenteditable = true;
				cible.className = cible.className + "cke_editable cke_editable_inline cke_contents_ltr cke_show_borders";
				cible.id = "cible";
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
				// handleTetiere(numero_ligne, 'ôte');
			} else {
				alert('index pas OK');
			}
		}
	};

	request.open('GET', url + numero_ligne, true);
	request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	request.send(null);
}


