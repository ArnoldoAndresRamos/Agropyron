function sendRequest(){
	let i =document.getElementById('input').value;
	let e = 10;
	
 	let b = new XMLHttpRequest()
    let url='https://aara.duckdns.org/agronono/formulario3/formulario3.php'
 	b.open('POST',url,true);
 	b.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  	b.onreadystatechange = function(){
  		console.log(b.responseText,);
 		document.getElementById('respuesta3').innerHTML = b.responseText;
	}
 	b.send("s="+i+"&m="+e);
};


/*
function l(){
    var arrayData = new Array(); //permite crear un array estableciendo número de posiciones e indicando sus elementos
    var archivoTXT = new XMLHttpRequest(); //constructor crea un nuevo XMLHttpRequest.
  
    archivoTXT.open("GET", 'formulario3/soilWater.json',false); // XMLHttpRequest.open(method, url[, async[, user[, password]]])
    
    archivoTXT.send(null)// El XMLHttpRequestmétodo send()envía la solicitud al servidor.
    var txt = archivoTXT.responseText;
    
    c=[]
    for (var i = 0; i < txt.length; i++) {
            // arrayData.push(parseInt(txt[i]));
            c.push(archivoTXT.responseText[i])
            p=arrayData[i]+arrayData[i+1]
            document.getElementById('l').innerHTML=txt
        }
    };
    
    
    
    
    function m(){
    b=new XMLHttpRequest()
    z=b.open("GET","formulario3/index.txt",false);
    b.send(null);
    n=b.responseText;
    document.getElementById('l').innerHTML = n;
    }
    
    var eS = new EventSource('index.txt');
    var eventlist = document.querySelector('div');
    */