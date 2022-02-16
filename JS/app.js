
/*
var formulario = document.getElementById('formulario');
var respuesta  = document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);

    fetch('PHP/post.php', {
        method:'POST',
        body:datos
        })  
    
    .then(res=>res.json())
    .then(data=>{
        if(data ==='error'){ 
            respuesta.innerHTML= `
            <div class="alert alert-danger" role="alert">
                A simple danger alert—check it out!
            </div
            `
        }else{
            respuesta.innerHTML= `
            <div class="alert alert-primary" role="alert">
                ${data['capacidad de campo']}
            </div
            `
        }
      })
 })

 */
 formulario.addEventListener('submit', function(e){
	let i =document.getElementById('input').value;
    let arena = document.getElementsByName('arena').value;
    let arcilla = document.getElementsByName('arcilla').value;
    let m_organica = document.getElementsByName('m_organica').value;
	let e = 10;
	
 	let b = new XMLHttpRequest()
    let url='https://aara.duckdns.org/agronono/PHP/post.php'
 	b.open('POST',url,true);
 	b.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  	b.onreadystatechange = function(){
        var datos=JSON.parse(b.responseText);
        console.log(datos);
        var res = document.getElementById('respuesta');
        res.innerHTML='';
        for (const property in datos) {
            //console.log(`${property} ${datos[property]}`);
            res.innerHTML+=`
            <tr>
                <td>${datos[property]}</td>
                <td>${property}</td>
            </tr>
            `
          }
	}    
 	b.send("arena="+arena+"&arcilla="+arcilla+"&m_organica="+m_organica);
 }