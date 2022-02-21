function sendRequest1(){
    
    let arena = document.getElementById('are').value;
    let arcilla = document.getElementById('arc').value;
    let m_organica = document.getElementById('m_o').value;
	
    let i =document.getElementById('input').value;
	let e = 10;
    
	
 	let b = new XMLHttpRequest()
    let url='../agronono/formulario3/formulario3.php'
 	b.open('POST',url,true);
 	b.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  	b.onreadystatechange = function(){
        var datos=JSON.parse(b.responseText);
        console.log(datos);
        var res = document.getElementById('respuesta3');
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
    console.log(are,arc,m_o);
 	b.send("s="+i+"&m="+e+"&arena="+arena+"&arcilla="+arcilla+"&m_o="+m_organica);
    
};


function sendRequest2(){
    fetch('formulario3/output.json')
    .then(function(res){
        console.log(res);
        return res.json();
    })
    .then(function(data){
        console.log(data);
        
        document.getElementById('respuesta3').innerHTML=data[''];
    })
}
