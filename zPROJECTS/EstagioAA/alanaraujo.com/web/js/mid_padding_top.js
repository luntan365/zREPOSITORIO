function resizeWindow() {
  var altura = document.getElementById('top').offsetHeight;  
  document.getElementById('mid').setAttribute("style", "padding-top: "+(altura+10)+"px;");
  document.getElementById('resultado-pesquisa-top').setAttribute("style", "top: "+altura+"px;");
}
resizeWindow();
window.addEventListener('resize', resizeWindow);
