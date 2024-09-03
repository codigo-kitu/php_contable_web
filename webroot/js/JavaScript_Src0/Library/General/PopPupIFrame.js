//<script type="text/javascript" language="javascript">

/*Empresa:com/bydan
 *Programador: ByDan
 *Descripcion: Clase que contiene todos los Accesos a BDD de tabla Medico
 * Fecha Creacion: domingo, 14 de agosto de 2011
 **CAMBIOS***** 
 * Motivo Cambio:
 * Nombre Programador:
 * Fecha Cambio:
 **************
 */

class PopPupIFrame {
	
	dragapproved=false;
	minrestore=0;
	initialwidth,initialheight;
	ie5=document.all&&document.getElementById;
	ns6=document.getElementById&&!document.all;
	
	iecompattest() {
		return (!window.opera && document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body;
	}
	
	drag_drop(e) {
		if (ie5&&dragapproved&&event.button==1){
			document.getElementById("dwindow").style.left=tempx+event.clientX-offsetx+"px";
			document.getElementById("dwindow").style.top=tempy+event.clientY-offsety+"px";
		} else if (ns6&&dragapproved){
			document.getElementById("dwindow").style.left=tempx+e.clientX-offsetx+"px";
			document.getElementById("dwindow").style.top=tempy+e.clientY-offsety+"px";
		}
	}
	
	initializedrag(e) {
		offsetx=ie5? event.clientX : e.clientX;
		offsety=ie5? event.clientY : e.clientY;
		document.getElementById("dwindowcontent").style.display="none"; //extra
		tempx=parseInt(document.getElementById("dwindow").style.left);
		tempy=parseInt(document.getElementById("dwindow").style.top);
		
		dragapproved=true;
		document.getElementById("dwindow").onmousemove=drag_drop;
	}
	
	loadwindow(url,width,height) {
		if (!ie5&&!ns6) {
			window.open(url,"","width=width,height=height,scrollbars=1")
		} else{
			document.getElementById("dwindow").style.display='';
			document.getElementById("dwindow").style.width=initialwidth=width+"px";
			document.getElementById("dwindow").style.height=initialheight=height+"px";
			document.getElementById("dwindow").style.left="30px";
			document.getElementById("dwindow").style.top=ns6? window.pageYOffset*1+30+"px" : iecompattest().scrollTop*1+30+"px";
			document.getElementById("cframe").src=url;
		}
	}
	
	maximize(){
		if (minrestore==0){
			minrestore=1; //maximize window
			document.getElementById("maxname").setAttribute("src","insertar.gif");//"restore.gif"
			document.getElementById("dwindow").style.width=ns6? window.innerWidth-20+"px" : iecompattest().clientWidth+"px";
			document.getElementById("dwindow").style.height=ns6? window.innerHeight-20+"px" : iecompattest().clientHeight+"px";
		} else{
			minrestore=0; //restore window
			document.getElementById("maxname").setAttribute("src","insertar.gif");//"max.gif"
			document.getElementById("dwindow").style.width=initialwidth;
			document.getElementById("dwindow").style.height=initialheight;
		}
		
		document.getElementById("dwindow").style.left=ns6? window.pageXOffset+"px" : iecompattest().scrollLeft+"px";
		document.getElementById("dwindow").style.top=ns6? window.pageYOffset+"px" : iecompattest().scrollTop+"px";
	}
	
	closeit() {
		document.getElementById("dwindow").style.display="none";
	}
	
	stopdrag() {
		dragapproved=false;
		document.getElementById("dwindow").onmousemove=null;
		document.getElementById("dwindowcontent").style.display=""; //extra
	}
}

var popPupIFrame=new PopPupIFrame();

//CODIGO HTML PARA QUE FUNCIONE
/*
 <div id="dwindow" style="position:absolute;background-color:#EBEBEB;cursor:hand;left:0px;top:0px;display:none" onMousedown="initializedrag(event)" onMouseup="stopdrag()" onSelectStart="return false">
		<div align="right" style="background-color:navy"><img src="/medical/app/webroot/img/insertar.gif" id="maxname" onClick="maximize()"><img src="/medical/app/webroot/img/insertar.gif" onClick="closeit()"></div>
		<div id="dwindowcontent" style="height:100%">
			<iframe id="cframe" src="" width=100% height=100%></iframe>
		</div>
	</div>

<script>	
if(document.getElementById("dwindowcontent")!=null){new Draggable("dwindowcontent");}
alert(document.getElementById("dwindowcontent"));
</script>  
*/

//</script>
