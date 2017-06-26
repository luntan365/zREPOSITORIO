window.onload = function () {

  run_especies_pet('especie');

}

var especie;

function run_especies_pet(id_especie) {
  especie = document.getElementById('especie');
  popular_especie();
}

function popular_especie() {
  var option = document.createElement("option");
  option.value = '';
  option.appendChild(document.createTextNode('Selecione a espécie'));
  especie.appendChild(option);

  popular('Mamíferos', mamiferos);
  popular('Aves', aves);
  popular('Répteis', repteis);
  popular('Anfíbios', anfibios);
  popular('Peixes', peixes);
  popular('Invertebrados', invertebrados);
}

function popular(optgrouplabel, array) {
  var optgroup = document.createElement("optgroup");
  optgroup.label = optgrouplabel;
  for (var key in array) {
    var option = document.createElement("option");
    option.appendChild(document.createTextNode(array[key]));
    if (especie.getAttribute("value") == array[key]) { option.setAttribute('selected',''); }
    optgroup.appendChild(option);
  }
  especie.appendChild(optgroup);
}

mamiferos = ['Cachorro',
'Gato',
'Furão',
'Mico (Sagui)',
'Coelho',
'Hamster',
'Rato (Twister ou Mecol)',
'Camundongo (Topolino)',
'Porco da Índia (Cobaia ou Cávia)',
'Porco doméstico',
'Chinchila',
'Gerbil (Esquilo-da-Mongólia)',
'Esquilo',
'Cavalo'];

aves = ['Piriquitos',
'Canário',
'Caturra (Calopsita)',
'Cacatuas',
'Papagaios',
'Galinha (Galo)',
'Peru',
'Arara',
'Mandarim',
'Agapornis',
'Pardal doméstico',
'Galah',
'Calafate',
'Cardeal (ave)',
'Curió',
'Canário-da-terra'];

repteis = ['Cágados',
'Tartarugas',
'Jabutis',
'Lagartos (Teiú, Iguana, gecko, etc…)',
'Cobras'];

anfibios = ['Sapos',
'Perereca',
'Salamandras'];

peixes = [
'Poecilídeos (Platy, lebiste, etc...)',
'Betta',
'Kinguio',
'Carpa',
'Barbos',
'Peixe-palhaço',
'Tetras (néon, Matogrosso, rodóstomus, etc...)',
'Acarás',
'Oscar',
'Cirurgiões',
'Cascudos',
'Coridoras'];

invertebrados = ['Tarântulas (Caranguejeiras)',
'Caramujos',
'Caranguejos',];
