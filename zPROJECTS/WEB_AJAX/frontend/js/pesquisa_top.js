
document.getElementById('pesquisa-top').onkeyup = pesquisar_top;

function pesquisar_top(){
	pesquisa = document.getElementById('pesquisa-top').value.trim();
	if (pesquisa) {
		try {
			var ajax = Ajax()
			ajax.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200) {
					var resultados = JSON.parse(this.responseText);
					if(resultados!=false){
						criarElementoResultadoPesquisa(resultados);
					} else {
						document.getElementById('resultado-pesquisa-top').innerHTML = "";
					}
				}
			}
			ajax.open("POST", "__json/pesquisa_top", true);
			ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			ajax.send("json="+JSON.stringify({'pesquisa':pesquisa}));
			return false;
		} catch (e) {
			console.log("ERRO: "+ e.message);
		}
	} else {
		document.getElementById('resultado-pesquisa-top').innerHTML = "";
	}
}


function criarElementoResultadoPesquisa(resultados) {
	var div_resultado = document.getElementById('resultado-pesquisa-top');
	div_resultado.innerHTML = "";
	for (var i = 0; i < resultados.length; i++) {
		var a = document.createElement("a");
		a.href = "__pesquisatop/selecionar/"+resultados[i].id;
    a.appendChild(document.createTextNode(resultados[i].nome));
		div_resultado.appendChild(a);
	}
}
