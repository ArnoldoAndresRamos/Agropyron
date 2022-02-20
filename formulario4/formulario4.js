function send_formulario4(){
    var dato = document.getElementById('dato').value;
    console.log(dato)
    let formulario4 = new XMLHttpRequest()
    let url='https://aara.duckdns.org/agronono/formulario4/formulario4.php'
    formulario4.open("POST",url);

    

    formulario4.onreadystatechange = function(){
        var data = formulario4.responseText;
        document.getElementById('respuesta4').innerHTML = data;
    }
    
    formulario4.send("dato="+dato);
}