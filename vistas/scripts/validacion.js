 

/********************************************************************************************************************************* */


//solo letras
function OnLchr(e) {
  var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
    especiales = [8, 37, 39, 46],
    tecla_especial = false;

  for (var i in especiales) {
    if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
  }

  if (letras.indexOf(tecla) == -1 && !tecla_especial) {
    return false;
  }
}



//solo numeros 
function OnLnum(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  num = " 0123456789";
  especiales = [8, 37, 39, 46];

  tecla_especial = false
  for(var i in especiales) {
      if(key == especiales[i]) {
          tecla_especial = true;
          break;
      }
  }

  if(num.indexOf(tecla) == -1 && !tecla_especial)
      return false;
}




function cln() {
  var val = document.getElementById("miInput").value;
  var tam = val.length;
  for(i = 0; i < tam; i++) {
      if(!isNaN(val[i]))
          document.getElementById("miInput").value = '';
  }
}
