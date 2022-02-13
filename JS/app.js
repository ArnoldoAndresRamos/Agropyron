var formulario = document.getElementById('swc');
var respuesta  = document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    console.log(JSON.stringify(datos))

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
            </div>
            `
        }else{
            respuesta.innerHTML= `
            <div class="alert alert-primary" role="alert">
                ${data}
            </div>
            `
        }
      })
 })

 function SWC(){
    fetch('PHP/post.php')
    .then(function(res){
        console.log(res);
        return res.json();
    })
}
