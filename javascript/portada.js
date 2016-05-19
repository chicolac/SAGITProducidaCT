/*****************************************************************************
			Presentación de Imágenes (SlideShow) por Tunait!
			Si quieres usar este script en tu sitio eres libre de hacerlo con la condición de que permanezcan intactas estas líneas, osea, los créditos.
			Actualizado el 28/12/2003 - 10/2011

			http://javascript.tunait.com
			tunait@yahoo.com 
			******************************************************************************/
			var segundos = 4; //cada cuantos segundos cambia la imagen
			var dire = "fotos"; //directorio o ruta donde están las imágenes

			var imagenes = new Array()
			imagenes[0]="foto1.jpg"
			imagenes[1]="foto2.jpg"
			imagenes[2]="foto3.jpg"
			imagenes[3]="foto4.jpg"
			imagenes[4]="foto5.jpg"
			imagenes[5]="foto6.jpg"
			imagenes[6]="foto7.jpg"
			imagenes[7]="foto8.jpg"
			imagenes[8]="foto9.jpg"
			imagenes[9]="foto10.jpg"
			imagenes[10]="foto11.jpg"
			imagenes[11]="foto12.jpg"
			imagenes[12]="foto13.jpg"
			imagenes[13]="foto14.jpg"
			imagenes[14]="foto15.jpg"
			
			if(dire != "" && dire.charAt(dire.length-1) != "/")
			{
			    dire = dire + "/"
			}

			var preImagenes = new Array()
			
			for (pre = 0; pre < imagenes.length; pre++){
				preImagenes[pre] = new Image();
				preImagenes[pre].src = dire + imagenes[pre];
			}
			
			cont=0
			function presImagen(){
				document.img_central.src= dire + imagenes[cont];
				subeOpacidad();
				if (cont < imagenes.length-1)
					{cont ++}
				else
					{cont=0}
				tiempo=window.setTimeout('bajaOpacidad()',segundos*1000);
			}
			
			//pagina 158 javascript step by step
			var iex = navigator.appName=="Microsoft Internet Explorer" ? true : false;
			var fi = iex ? 'filters.alpha.opacity':'style.opacity';
			var opa = iex ? 100 : 1;
			
			function bajaOpacidad(){
				eval(opa);
				if(opa >= 0){
					cambia();
					opa -= iex?50:0.1;
					setTimeout('bajaOpacidad()',50);
				}
				else{presImagen()}
			}

			function subeOpacidad(){
				opaci = iex?100:1;
				if(opa <= opaci){
					cambia();
					opa += iex?10: 0.1;
					setTimeout('subeOpacidad()',10);
				}
			}
			
			function cambia(){
				eval('document.img_central.' + fi + ' = opa')
			}
			
			var tiempo;
			
			function inicio(){
				clearTimeout(tiempo);
				bajaOpacidad();
			}
