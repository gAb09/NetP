	function edit(numero) {
		// alert(raw);

		var ligne = document.getElementById('raw'+numero);
		ligne.className = ligne.className+' edit'
		// alert(ligne);

		var xhr = getXMLHttpRequest();

		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status === 0)) {

				if (xhr.responseText) {
					ligne.innerHTML = xhr.responseText;
					// alert('OK');
			}else{
					alert('pas OK');
			}
		}
	};
	xhr.open("GET", "adhesion/"+numero+"/edit", true);
	xhr.send(null);

}

	function index() {
}

		// var div = document.getElementById("div_compte_activation");
		// var nota = document.getElementById("span_compte_activation");

		// if (div.className === "")
		// {
		// 	nota.className = "invisible";
		// 	div.className = "invisible";
		// 	bouton.className = "invisible";
		// }
		// else
		// {
		// 	nota.className = "";
		// 	div.className = "";
		// 	bouton.className = "btn btn-small btn-danger";
		// }
