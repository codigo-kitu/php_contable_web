//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../General/Constantes.js';
import {FuncionGeneral,funcionGeneral} from '../General/FuncionGeneral.js';

class Login {

	validarLogginOnComplete() {	
		
		var strLogginValidado=document.getElementById("MensajeHdnAuxiliarUrlPagina").value;
		//alert(strLogginValidado);
		funcionGeneral.procesarFinalizacionProceso();
		
		//alert(strLogginValidado);	
		if(strLogginValidado!=null && strLogginValidado!="") {
			this.openMainPage(strLogginValidado);
		} else {
			alert("USUARIO O CLAVE INCORRECTOS");
		}	
	}
	//alert("here1");
	validarLogginOnClick() {
		funcionGeneral.procesarInicioProceso();
	}
	
	verificarEnter(e) {
		  //alert("here");
		  var tecla=(document.all) ? e.keyCode : e.which;
		  
		  //alert(tecla);
		  
		  if(tecla!=13) return;
		  
		  //alert(tecla);
		  
		  //document.images['esperar'].style.visibility = 'visible';
		  //validarAlumno(document.form1.txtUsuario.value,document.form1.txtClave.value);
		  
		  this.validarLogginOnComplete();
		  
		  return false;
	}
	
	
	
	openMainPage(strLogginValidado) {
	 
		 var params  = 'width='+window.screen.width;
		 params += ',height='+window.screen.height;
		 params += ',top=0, left=0';
		 //params += ',fullscreen=yes';
		 params += ',status=yes';
		 params += ',resizable=yes';
		 params += ',scrollbars=yes';
		 //params += ',toolbar=yes';
		 //alert(params);
		 
		
		 var newwin=window.open(strLogginValidado,'', params);//'default.jsf'
	
		 if (window.focus) {
			 if(newwin!=null) {			 			 
				 newwin.focus();
			 } else {
				 //alert('Por favor deshabilite el bloqueador de ventanas emergentes y vuelva a intentarlo".');
				 //alert('Por favor HABILITE el uso de ventanas emergentes y vuelva a intentarlo".');
				 constantes.STR_POPUP_URL=strLogginValidado;
				 
				 jQuery('#btnAuxiliarPopup').popupWindow({ 
					 	width:window.screen.width,
					 	height:window.screen.height,
					 	top:0,left:0,status:"yes",
					 	resizable:"yes",scrollbars:"yes",
						windowURL:constantes.STR_POPUP_URL, 
						windowName:'MEDICAL WEB'
						});
				 
				 login.resaltarRestaurarDivPopup(true);			 							 			 
			 }
		}
			 
		 //window.open('main.jsp','','width=0,height=0,left=0,top=0,resizable=yes,fullscreen=yes')
		
		 //var newwin=window.open('main.jsp','Sistema de Alcohol y Drogas', params);
		 //if (window.focus) {newwin.focus()}
		 
		 //window.open('main.jsp','Sistema de Alcohol y Drogas','width=0,height=0,left=0,top=0,resizable=yes,fullscreen=yes')
		 //alert("here");
		 //window.location.href="default.jsp";
	}
	
	resaltarRestaurarDivPopup(bitEsResaltar) {
		if(bitEsResaltar==true) {	
			document.getElementById("divUsuarioFormAjaxWebPart").style.filter='alpha(opacity=25)';
			document.getElementById("divUsuarioFormAjaxWebPart").style.opacity='0.25';
			
			document.getElementById("header").style.filter='alpha(opacity=25)';
			document.getElementById("header").style.opacity='0.25';
			
			jQuery("#divUsuarioPopupAjaxWebPart").dialog("open");
			
			jQuery("#divUsuarioPopupAjaxWebPart").css("position","absolute");
			jQuery("#divUsuarioPopupAjaxWebPart").css("top", "100px");
			jQuery("#divUsuarioPopupAjaxWebPart").css("left", "100px");
			
		} else {
			document.getElementById("divUsuarioFormAjaxWebPart").style.filter='alpha(opacity=100)';
			document.getElementById("divUsuarioFormAjaxWebPart").style.opacity='1';
			
			document.getElementById("header").style.filter='alpha(opacity=100)';
			document.getElementById("header").style.opacity='1';
			
			if(jQuery("#divUsuarioPopupAjaxWebPart").dialog("isOpen")==true) {		
				jQuery("#divUsuarioPopupAjaxWebPart").dialog("close");
			}
		}	
	}
	
	/*
	 * Returns a function that waits for the specified XMLHttpRequest
	 * to complete, then passes its XML response
	 * to the given handler function.
	 * req - The XMLHttpRequest whose state is changing
	 * responseXmlHandler - Function to pass the XML response to
	 */
	getReadyStateHandler(req, responseXmlHandler) {
	  return function () {
	    if (req.readyState == 4) {
	      if (req.status == 200) {
	        responseXmlHandler(req.responseXML);
	      } else {
	        alert("HTTP error: "+req.status);
	      }
	    }
	  };
	}
	
	newXMLHttpRequest() {
	  var xmlreq = false;
	  
	  if (window.XMLHttpRequest) {
	    xmlreq = new XMLHttpRequest();
	  } else if (window.ActiveXObject) {
	    
		try {
	      xmlreq = new ActiveXObject("Msxml2.XMLHTTP");
	    } catch (e1) {
	      try {
	        xmlreq = new ActiveXObject("Microsoft.XMLHTTP");
	      } catch (e2) {
			alert('Imposible generar AJAX en su browser');
	      }
	    }
	  }
	  
	  return xmlreq;
	}
	
	validarUsuario(usuario,clave) {

		funcionGeneral.mostrarOcultarProcesando(true);
		//req.open("POST", "SistemaServlet", true);
		//req.open("POST", "AlumnoServlet", true);
		var strParam="accionAdicional=ValidarUsuario&txtUsuario=" + usuario + "&txtClave=" + clave+"&idSistema=1";

		var numAleatorio=Math.random();
		
		jmaki.doAjax({method: constantes.STR_POST,
        url: "UsuarioServlet?"+strParam+"&aleatorio="+numAleatorio,
        callback : respuestaLoginUsuario
    	}); 
    	
		//req.send("accionAdicional=ValidarUsuario&txtUsuario=" + usuario + "&txtClave=" + clave+"&idSistema=1&aleatorio="+Math.random());
	}
	
	respuestaLoginUsuario(strResponseUsuario) {
		var factory=undefined;
		
		funcionGeneral.mostrarOcultarProcesando(false);
		//alert(strResponseUsuario.responseText);	
		var jsonResponseUsuario=eval('(' +strResponseUsuario.responseText+ ')');
		
		if(jsonResponseUsuario.aplicacion!=null&&jsonResponseUsuario.aplicacion==constantes.STR_MENSAJE_APLICACION_J2EE) {
							
				if(jsonResponseUsuario.mensajetecnico=="default.jsp") {
					openMainPage(); 
					//document.images['esperar'].style.visibility = 'hidden';
					window.close();
				} else {
					alert("Usuario o clave no validos");
					//document.images['esperar'].style.visibility = 'hidden';
				}
				
		} else if(jsonResponseUsuario.name!=null&&jsonResponseUsuario.name==constantes.STR_CAPAS_DEFAULT_MENSAJE) {

			factory=jmaki.getExtension("widgetFactory");
			
			var divContent=document.getElementById("divMensaje");
									
			    factory.loadWidget({
			    widget : jsonResponseUsuario,
			    container :divContent
			});
			
		} else {
			//crearMensajeGeneral('Datos '+itemMensaje,itemMensaje+' guardado correctamente',true,'INFO','OK',false,undefined);
			//crearMensajeGeneralControl(strHeader,strText,bitFixedCenter,strIcon,strTipoBoton,bitModal,strId)
			factory=jmaki.getExtension("widgetFactory");
			constantes.factory=factory;
			
			ajaxFuncionGeneral.crearMensajeGeneralControl(constantes.STR_MENSAJE_TITULO_EXCEPCION,constantes.STR_MENSAJE_TITULO_EXCEPCION_NOCONTROLADA,true,"BLOCK","OK",true,undefined);
		}	 
	}
	
	validarAlumno(cedula,clave) {
		var req = newXMLHttpRequest();
		
		req.onreadystatechange = getReadyStateHandler(req,respuestaLogin);// respuestaLoginAlumno);
		req.open("POST", "AlumnoServlet", true);
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		//alert("accionAdicional=ValidarUsuario&txtUsuario=" + cedula + "&txtClave=" + clave+"&idSistema=1&blnEsAlumno=true&aleatorio="+Math.random());
		req.send("accionAdicional=ValidarUsuario&txtUsuario=" + cedula + "&txtClave=" + clave+"&idSistema=1&blnEsAlumno=true&aleatorio="+Math.random());
	}
	
	respuestaLoginAlumno(xmlAlumno) {	
		if(xmlAlumno.getElementsByTagName("mensaje")[0]!=null) {
			var mensaje = xmlAlumno.getElementsByTagName("mensaje")[0];	
			var itemMensaje = mensaje.getElementsByTagName("itemMensaje");
			var mensajetecnico="";
			
			if(itemMensaje[0].getElementsByTagName("mensajetecnico")[0].firstChild.nodeValue!="NONE") {
				mensajetecnico=itemMensaje[0].getElementsByTagName("mensajetecnico")[0].firstChild.nodeValue;
				//alert("X"+mensajetecnico+"X");
				if(mensajetecnico=="MantenimientoCursoATomar.jsp") {
					OpenMainPageAlumno(mensajetecnico); 
					//document.images['esperar'].style.visibility = 'hidden';
					//window.close();
				} else {
					alert("Usuario o clave no validos");
					//document.images['esperar'].style.visibility = 'hidden';
				}
			} else {
				alert("Usuario o clave no validos");
				//document.images['esperar'].style.visibility = 'hidden';
			}		
		} else {
			alert("Error de Aplicacion");
		}	 
	}
	
	openMainPageAlumno(strPage) {
		 var params  = 'width='+window.screen.width;
		 params += ',height='+window.screen.height;
		 params += ',top=0, left=0';
		 //params += ',fullscreen=yes';
		 params += ',status=yes';
		 params += ',resizable=yes';
		 params += ',scrollbars=yes';
		 //alert(params);
		
		// var newwin=window.open(strPage,'', params);
		// if (window.focus) {newwin.focus()}
		 window.location.href="default.jsp";
	}
	
	irAdministracion() {
		window.location.href="index1.jsp";
	}
	
	irIndice() {
		window.location.href="index.jsp";
	}
	
	verificarEnterUsuario(e) {
		  //alert("here");
		  var tecla=(document.all) ? e.keyCode : e.which;
		  
		  //alert(tecla);
		  
		  if(tecla!=13) return;
		  
		  //alert(tecla);
		  
		  //document.images['esperar'].style.visibility = 'visible';
		  login.validarUsuario(document.form1.txtUsuario.value,document.form1.txtClave.value);
		  
		  return false;
	}

	verificarEnterAlumno(e) {
	  //alert("here");
	  var tecla=(document.all) ? e.keyCode : e.which;
	  
	  //alert(tecla);
	  
	  if(tecla!=13) return;
	  
	  //alert(tecla);
	  
	  //document.images['esperar'].style.visibility = 'visible';
	  login.validarAlumno(document.form1.txtUsuario.value,document.form1.txtClave.value);
	  
	  return false;
	}
}

var login=new Login();

export {Login,login};

/*
function verificarEnterUsuario(e) {
	  //alert("here");
	  var tecla=(document.all) ? e.keyCode : e.which;
	  
	  //alert(tecla);
	  
	  if(tecla!=13) return;
	  
	  //alert(tecla);
	  
	  //document.images['esperar'].style.visibility = 'visible';
	  login.validarUsuario(document.form1.txtUsuario.value,document.form1.txtClave.value);
	  
	  return false;
}

function verificarEnterAlumno(e) {
  //alert("here");
  var tecla=(document.all) ? e.keyCode : e.which;
  
  //alert(tecla);
  
  if(tecla!=13) return;
  
  //alert(tecla);
  
  //document.images['esperar'].style.visibility = 'visible';
  login.validarAlumno(document.form1.txtUsuario.value,document.form1.txtClave.value);
  
  return false;
}
*/
//let login=new Login();

//</script>