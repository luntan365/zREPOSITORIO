var botaomenu = document.getElementById('botaomenumobile');
var menu = document.getElementById('menu');
var statusmenu = false;

var botaomenuentidade = document.getElementById('botaomenuentidade');
var menuentidade = document.getElementById('meam');
var statusmenuentidade = false;

var inputpesquisatop = document.getElementById('pesquisa-top');
var resultadopesquisatop = document.getElementById('resultado-pesquisa-top');

botaomenu.onclick = function(){
  if (statusmenu) statusmenu = false; else statusmenu = true;
  if (statusmenu) {
    resultadopesquisatop.innerHTML = "";
    if (botaomenuentidade) {
      menuentidade.setAttribute('style', 'left: 100%;');
      statusmenuentidade = false;
    }
    menu.setAttribute('style', 'left: 0px;');
    inputpesquisatop.value = "";
  } else {
    menu.setAttribute('style', 'left: -100%;');
  }
}

if (botaomenuentidade) {
  botaomenuentidade.onclick = function(){
    if (statusmenuentidade) statusmenuentidade = false; else statusmenuentidade = true;
    if (statusmenuentidade) {
      resultadopesquisatop.innerHTML = "";
      menu.setAttribute('style', 'left: -100%;');
      statusmenu = false;
      menuentidade.setAttribute('style', 'left: 0px;');
      inputpesquisatop.value = "";
    } else {
      menuentidade.setAttribute('style', 'left: 100%;');
    }
  }
}


inputpesquisatop.onkeyup = pesquisar_top;

function pesquisar_top(){

  menu.setAttribute('style', 'left: -100%;');
  statusmenu = false;
  if (botaomenuentidade) {
    menuentidade.setAttribute('style', 'left: 100%;');
    statusmenuentidade = false;
  }

	pesquisa = document.getElementById('pesquisa-top').value.trim()
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
    a.href = "__ativarentidade/ativar/"+resultados[i].id;
    a.appendChild(document.createTextNode(resultados[i].nome));
		div_resultado.appendChild(a);
	}
}
