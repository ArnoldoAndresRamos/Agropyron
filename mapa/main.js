//window.onload = function(){
	
var contenedor = document.getElementById('popup');
var contenido  = document.getElementById('popup-content');
var cerrar	   = document.getElementById('popup-closer');



var overlay = new ol.Overlay({
  	element:contenedor,
	autoPan:true,
	autoPanAnimation:{
		duration: 250
	}
});

cerrar.onclick = function(){
	overlay.setPosition(undefined);
	cerrar.blur();
	return false;
};

var coordenadas_mouse = new ol.control.MousePosition({
	coordinateFormat:ol.coordinate.createStringXY(20),
	projection:'EPSG:4326',
	//target:document.getElementById('coord')	

})




// modifity
		const iconFeature = new ol.Feature({
			geometry: new ol.geom.Point([0,0]),
			name: 'Null Island',
			population: 4000,
			rainfall: 500,
		});

		const iconStyle = new ol.style.Style({
			image: new ol.style.Icon({
			anchor: [1,1],
			imgSize:[5,5],
			anchorXUnits: 'fraction',
			anchorYUnits: 'pixels',
			
			//corssOrigin:'anonymous',
			
			src:'https://sites.google.com/site/figuritasgeometricas/_/rsrc/1339206194345/circulo/circulo.jpg?height=344&width=375',
			}),
		});

		iconFeature.setStyle(iconStyle);
			
		const vectorSource = new ol.source.Vector({
			features: [iconFeature],
		})

		const vectorLayer= new ol.layer.Vector({
			source:vectorSource,
		})

		const modify = new ol.interaction.Modify({
			hitDetection: vectorLayer,
			source: vectorSource,
		});

		modify.on(['modifystart', 'modifyend'], function (evt) {
			target.style.cursor = evt.type === 'modifystart' ? 'grabbing' : 'pointer';
		});

		const overlaySource = modify.getOverlay().getSource();

		overlaySource.on(['addfeature', 'removefeature'], function (evt) {
			target.style.cursor = evt.type === 'addfeature' ? 'pointer' : '';
		});
		





var map = new ol.Map({
	controls: ol.control.defaults().extend([coordenadas_mouse]),
	overlays: [overlay],
	target:'map',
	layers:[
		new ol.layer.Tile({
			source: new ol.source.OSM()
		})
	, vectorLayer],
	view: new ol.View({
		center: ol.proj.fromLonLat([-71.223970, -33.68105860]),
		zoom:14
	})
});

const target = document.getElementById('map');


var guardar    = document.getElementById('bot');
var puntosGuardados = [] // guarda los valores del punto marcado 

map.on('singleclick', function(evt){

	map.addInteraction(modify);

	var coordenada = evt.coordinate;
	var hdms = ol.proj.transform(coordenada,'EPSG:3857', 'EPSG:4326');
	
	//contenido.innerHTML = hdms[1]+"<br>"+hdms[0];
	overlay.setPosition(coordenada);
	
	//document.getElementById('coordenadas').innerHTML = hdms[1]+","+hdms[0];
	document.getElementById('latitud_popup').value = hdms[0];
	document.getElementById('latitud').value =  hdms[0];
	
	var valor=document.getElementById('valor').value
	
	


	
	/*
	 al hacer click en Guardar se añade el marcador al mapa	
	 se ejecuta la funcion j() que se encuntra dentro del popup 				
	*/
	guardar.onclick = function j(){

		// guardar en un array
		// ultimo elemento
		var ultimoElemento = puntosGuardados.length;
		console.log(ultimoElemento+" index:"+puntosGuardados[ultimoElemento-1])
		
		puntosGuardados.push([hdms[0],hdms[1],valor])


		var a = new ol.Feature({
			geometry:new ol.geom.Point(ol.proj.fromLonLat(
				[hdms[0],hdms[1]]
				)),
			}); 
		
		
		
		// estilos del marcador
		var color = document.getElementById('colorMarcador').value

		a.setStyle(new ol.style.Style ({
			image: new ol.style.Icon({
				color:color,//'rgba(20,130,10,1)',
				corssOrigin:'anonymous',
				imgSize:[5,5],
				src:'https://sites.google.com/site/figuritasgeometricas/_/rsrc/1339206194345/circulo/circulo.jpg?height=344&width=375',
			})
		}));
						
		//var puntos=[a]
	
	
		// crea capa 
		
		var capa = new ol.layer.Vector({
			source: new ol.source.Vector({
				features:[a],
			})
		});
		console.log("a"+a+", capa"+capa)
		
		map.addLayer(capa);	
		
	};

})