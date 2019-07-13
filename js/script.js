//array para los identificadores o numero en este caso.
var ids = Array();
//array que contiene las palabras.
var palabras = Array();
$(document).ready(function(){

    //Se carga un texto desde un txt como prueba de ajax.
    //La ruta la toma automaticamente de la carpeta raíz.
    $("#title").load("titulo.txt");

    //LLamamos un archivo php que escribe un string con 
    //formato JSON
    $.getJSON("Palabras.php", function (data) {
        //cursamos el array del JSON.
        //data siendo el array que contiene a los objetos
        for (var i = 0; i < data.length; i++) {
            //extraemos los 'id'
            ids.push(data[i].id);
            //extraemos los textos
            palabras.push(data[i].texto);
        }
    });

    //El evento se dispara después que el usuario suelta la tecla.
    $("input[name='id']").keyup(function() {
        //Se captura el valor de 'id'
        var valor = $(this).val();
        //Solo se revisa cuando sea igual a cierto valor. en este cuatro caracteres.
        if(valor.length==4){
            //Se revisa si el id ingresado existe en el array de 'id'
            if(ids.includes(valor)){
                //Sacamos el index del id con el valor ingresado y se utiliza
                //para encontrar la palabra correspondiente en el array de palabras
                $("input[name='texto']").val(palabras[ids.indexOf(valor)]);
            }
        }else{
            //Borramos la palabra si no se cumplen ninguna de las condiciones.
            $("input[name='texto'").val("");
        }
    });

    

    

});