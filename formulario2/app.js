 function swc(){
	
    let arena = document.getElementById('arena').value;
    let arcilla = document.getElementById('arcilla').value;
    let m_organica = document.getElementById('m_organica').value;

	console.log(arena+arcilla+m_organica)
 	let b = new XMLHttpRequest()
    let url='../agronono/formulario2/post.php'
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
                <td>${property}</td>
                <td>${datos[property][0]} en ${datos[property][1]}</td>               
                
            </tr>
            `
          }
	}    
 	b.send("arena="+arena+"&arcilla="+arcilla+"&m_organica="+m_organica);
    
 };



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