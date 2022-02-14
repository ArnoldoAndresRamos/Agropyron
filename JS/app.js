
var formulario = document.getElementById('swc');
var respuesta  = document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    console.log(JSON.parse(datos))

    fetch('PHP/post.php', {
        method:'POST',
        body:datos
        })  
    
    .then(res=>res.json())
    .then(data=>{
        respuesta.innerHTML= `
        <div class="alert alert-primary" role="alert">
            ${data}
        </div>
        `
        }
      }),
 }),
 
/*
function SWC(){
    fetch('PHP/post.php')
    .then(function(res){
        console.log(res);
        return res.json();
    })
    .then(function(data){
        data=JSON.parse(data);
        console.log(data);
        
        document.getElementById('respuesta').innerHTML=data['cc'];
    })
}
*/