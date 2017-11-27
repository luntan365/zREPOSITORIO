var radios = document.getElementsByName('pessoa');

for(var i = 0; i < radios.length; i++) {
  if (radios[i].value == "juridica" && radios[i].checked) {
    document.getElementById('fieldset_pessoa_fisica').style.display = "none";
    document.getElementById('fieldset_pessoa_juridica').style.display = "block";
  } else if (radios[i].value == "fisica" && radios[i].checked) {
    document.getElementById('fieldset_pessoa_fisica').style.display = "block";
    document.getElementById('fieldset_pessoa_juridica').style.display = "none";
  }
}

for(var i = 0; i < radios.length; i++) {
  radios[i].onclick = function() {
    if (this.value == "juridica") {
      document.getElementById('fieldset_pessoa_fisica').style.display = "none";
      document.getElementById('fieldset_pessoa_juridica').style.display = "block";
    } else if (this.value == "fisica") {
      document.getElementById('fieldset_pessoa_fisica').style.display = "block";
      document.getElementById('fieldset_pessoa_juridica').style.display = "none";
    }
  }
}
