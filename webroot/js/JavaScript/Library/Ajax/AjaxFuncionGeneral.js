//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../General/Constantes.js';
import {FuncionGeneral,funcionGeneral} from '../General/FuncionGeneral.js';

class AjaxFuncionGeneral {
	contador=0;
	strRelativePath="";

	manejarSeleccionTree(argsTree,strRelativePath) {
		var strPaginaDefault="default.jsp";
		var strCarpetaPaginas="Paginas";

		funcionGeneral.mostrarOcultarProcesando(true);
		//alert(argsTree.message.targetId);
		//alert(strRelativePath+"Paginas/"+argsTree.message.targetId);
		document.location.href=strRelativePath+strCarpetaPaginas+"/"+argsTree.message.targetId;
		
	}

	mostrarReporte(strTipoReporte, strRelativePathParam) {	
		
		strRelativePath=strRelativePathParam;
		 
		var strParam="accion=generarReporte&tipoReporte="+strTipoReporte;

		var numAleatorio=Math.random();
		
		jmaki.doAjax({method: constantes.STR_POST,
        url: strRelativePath+"FuncionesServlet?"+strParam+"&aleatorio="+numAleatorio,
        callback : respuestaMostrarReporte
    	});   	
	}
	
	respuestaMostrarReporte(strResponseMostrarReporte) {
		var factory=undefined;
		//alert(strResponseMostrarReporte.responseText);	
		
		var jsonResponseMostrarReporte=eval('(' +strResponseMostrarReporte.responseText+ ')');

		//alert(jsonResponseMostrarReporte);	

		if(jsonResponseMostrarReporte.aplicacion!=null&&jsonResponseMostrarReporte.aplicacion==constantes.STR_MENSAJE_APLICACION_J2EE) {		
			window.open(jsonResponseMostrarReporte.mensajetecnico,"REPORTE",constantes.STR_REPORTE_CONFIGURACION_VENTANA);				

		}  else if(jsonResponseMostrarReporte.name!=null&&jsonResponseMostrarReporte.name==constantes.STR_CAPAS_DEFAULT_MENSAJE) {

			factory=jmaki.getExtension("widgetFactory");
			
			var divContent=document.getElementById("divMensaje");
									
			    factory.loadWidget({
			    widget : jsonResponseMostrarReporte,
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
	
	cargarDojoDijitTree(strRelativePathParam) {	
		/*
		funcionGeneral.mostrarOcultarProcesando(true,"leftSidebar");
		strRelativePath=strRelativePathParam;
		 
		var strParam="accionAdicional=TraerArbolTemasDesdeSession";

		var numAleatorio=Math.random();
		
		jmaki.doAjax({method: constantes.STRPOST,
        url: strRelativePath+"SistemaServlet?"+strParam+"&aleatorio="+numAleatorio,
        callback : respuestaCargarPaginaDefault
    	}); 
    	*/
    	//EN PAGINA WEB
    	//onload="ajaxFuncionGeneral.cargarDojoDijitTree('')"
	}
	
	respuestaCargarPaginaDefault(strResponseCargarPaginaDefault) {
		
		//alert(strResponseCargarPaginaDefault.responseText);	

		var strAuxResponseCargarPaginaDefault=strResponseCargarPaginaDefault.responseText;
		
		strAuxResponseCargarPaginaDefault=strResponseCargarPaginaDefault.responseText.replace("BYDANREPLACE", strRelativePath);

		//alert(strAuxResponseCargarPaginaDefault);	

		
		var jsonResponseCargarPaginaDefault=eval('(' +strAuxResponseCargarPaginaDefault+ ')');

		//alert(jsonResponseCargarPaginaDefault);	

		if(jsonResponseCargarPaginaDefault.name!=undefined&&jsonResponseCargarPaginaDefault.name!=null&&jsonResponseCargarPaginaDefault.name==constantes.STR_CAPAS_DEFAULT_TREE) {

			
				if(jmaki.config==undefined||jmaki.config==null) {
					jmaki.config='ocean';
				}
				
				var divTree = document.getElementById("divTree");

				var factory = jmaki.getExtension("widgetFactory");
						
				  factory.loadWidget({
				      widget :jsonResponseCargarPaginaDefault,
				      container : divTree
				  });  

				  funcionGeneral.mostrarOcultarProcesando(false,"leftSidebar");
		}
	}
	
	cargarComboReporte(strNombreCombo)  {
		var arrDataReporte = [];
		
//		var data={value:constantes.STR_HTML,label:constantes.STR_HTML}; arrDataReporte.push(data);
		data={value:constantes.STR_PDF,label:constantes.STR_PDF}; arrDataReporte.push(data);
		data={value:constantes.STR_WORD,label:constantes.STR_WORD}; arrDataReporte.push(data);
		data={value:constantes.STR_EXCEL,label:constantes.STR_EXCEL}; arrDataReporte.push(data);			  
		
		jmaki.attributes.get(strNombreCombo).setValues(arrDataReporte);
		
					  
	}
	
	validarFormularioSeleccionado(strNombreTabla,hdnCampoId) {
		var retorno =true;
		var strId=hdnCampoId.value;
		
		if(strId==""||strId==undefined) {
			retorno= false;
			createSimpleYahooDialogErrorValidacion(constantes.STR_DIALOG_TITULO_VALIDACION,constantes.STR_MENSAJE_DEBE_SELECCIONAR_UN+strNombreTabla,hdnCampoId);
		}
		
		return retorno;
	}
	
	procesarMensajeGuardar(itemMensaje,bitMostrarMensajeGuardar) {
		if(bitMostrarMensajeGuardar==true) {
			var strMensajeBusqueda="";
			var strJsonMensaje=crearMensajeGeneral('Datos '+itemMensaje,itemMensaje+' guardado correctamente',true,'INFO','OK',false,undefined);
			//alert(strJsonMensaje);
			var divContent=document.getElementById("divMensaje");
			var jsonMensaje=eval('(' +strJsonMensaje+ ')');
			//alert(jsonMensaje);	
			jmaki.resourcesRoot=constantes.strRelativePath+"resources"; 
						
			constantes.factory.loadWidget({
			    widget : jsonMensaje,
			    container :divContent
			});
			
			jmaki.resourcesRoot="resources";			
		}	 
	}
	
	procesarMensajeExcepcion(itemMensaje) {
		if(itemMensaje[0]!=null) {
			var mensajeusuario= itemMensaje[0].getElementsByTagName("mensajeusuario")[0].firstChild.nodeValue;
			var tipo= itemMensaje[0].getElementsByTagName("tipo")[0].firstChild.nodeValue;
			var nombremensaje= itemMensaje[0].getElementsByTagName("nombremensaje")[0].firstChild.nodeValue;
			var esopcional= itemMensaje[0].getElementsByTagName("esopcional")[0].firstChild.nodeValue;
			var titulo= itemMensaje[0].getElementsByTagName("titulo")[0].firstChild.nodeValue;
			
			var mensajetecnico; 
			
			if(itemMensaje[0].getElementsByTagName("mensajetecnico")[0].firstChild.nodeValue!=constantes.STR_NONE) {
				mensajetecnico=itemMensaje[0].getElementsByTagName("mensajetecnico")[0].firstChild.nodeValue;
			}
			
			if(mensajetecnico!=constantes.STR_NONE) {							
				createSimpleYahooDialogInfoInterno(titulo,mensajeusuario+ mensajetecnico,YAHOO.widget.SimpleDialog.ICON_BLOCK);
				return;
			}
		};
		
		top.topFrame.mostrarOcultarProcesando(false);
	}
	
	procesarMensajeBuscar(strTable,bitMostrarMensajeNoExistencia) {		
		
		if(bitMostrarMensajeNoExistencia==true) {
			var strMensajeBusqueda="";
			var strJsonMensaje=crearMensajeGeneral('Datos','No existen datos',true,'INFO','OK',false,undefined);
			//alert(strJsonMensaje);
			var divContent=document.getElementById("divMensaje");
			var jsonMensaje=eval('(' +strJsonMensaje+ ')');
			//alert(jsonMensaje);	
			jmaki.resourcesRoot=constantes.strRelativePath+"resources"; 
						
			constantes.factory.loadWidget({
			    widget : jsonMensaje,
			    container :divContent
			});
			
			jmaki.resourcesRoot="resources";			
		}	 
	}

	crearMensajeGeneralControl(strHeader,strText,bitFixedCenter,strIcon,strTipoBoton,bitModal,strId) {		
			var strMensajeBusqueda="";
			var strJsonMensaje=crearMensajeGeneral(strHeader,strText,bitFixedCenter,strIcon,strTipoBoton,bitModal,strId);
			//alert(strJsonMensaje);
			var divContent=document.getElementById("divMensaje");
			var jsonMensaje=eval('(' +strJsonMensaje+ ')');
			//alert(jsonMensaje);	
			jmaki.resourcesRoot=constantes.strRelativePath+"resources"; 
						
			constantes.factory.loadWidget({
			    widget : jsonMensaje,
			    container :divContent
			});
			
			jmaki.resourcesRoot="resources";				 
	}
	
	crearMensajeGeneralStringJson(strHeader,strText,bitFixedCenter,strIcon,strTipoBoton,bitModal,strId) {
		return crearMensajeGeneral(strHeader,strText,bitFixedCenter,strIcon,strTipoBoton,bitModal,strId);
	}
	
	crearMensajeGeneral(strHeader,strText,bitFixedCenter,strIcon,strTipoBoton,bitModal,strId) {
		var strIdControl="";
			
		if(strId!=undefined&&strId!=""){
			strIdControl="'uuid':'"+strId+"',";
		}
		
		var strMensajeInit="{"+strIdControl+"'name':'"+constantes.STR_CAPAS_DEFAULT_MENSAJE+"',";
		var strMensajeEnd="}";
		
        var strMensaje="";
        var strBotones="'buttons': [{ 'label':'ok', 'isDefault':true }]";
        
        if(strTipoBoton=="OK") {
        	strBotones="'buttons': [{ 'label':'ok', 'isDefault':true }]";
        } else if(strTipoBoton=="SINO") {
        	strBotones="'buttons': [{ 'label':'SI', 'isDefault':false },{ 'label':'NO', 'isDefault':true }]";
        }
        
        strMensaje="'value':{"+strBotones+"},'args':{'header':'"+strHeader+"','text':'"+strText+"','fixedcenter':"+bitFixedCenter+",'modal':"+bitModal+",'icon':'"+strIcon+"'}";

        strMensaje=strMensajeInit+strMensaje+strMensajeEnd;
        
        return strMensaje;
	}
	
	createSimpleYahooDialogErrorValidacionMensajes(header,text) {
		if(text==""||text==undefined) {
			return;
		}
		
		var cfg = {
	        width: "300px",
	        fixedcenter: true,
	        header: header,
	        text: text,
	        draggable: true,
	        close: true,
	        visible: true,
	        modal: false,
	        icon: YAHOO.widget.SimpleDialog.ICON_BLOCK,
	        constraintoviewport: true,
	        buttons: [ 
	        { label:"Yes" },
	        { label:'No', isDefault:true }
	        ]
	    };
		
		cfg.buttons = createDialogTempButtons();
		var dlg =  new YAHOO.widget.SimpleDialog("dialogTemp"+contador , cfg);
		
		contador=contador+1;
		
		dlg.setHeader(cfg.header);
	    dlg.render(document.body); 
		dlg.show(); 
	}
	
	createSimpleYahooDialogErrorValidacionMensajes2(id,header,text) {
		if(text==""||text==undefined) {
			return;
		}
		
		var cfg = {
	        width: "300px",
	        fixedcenter: true,
	        header: header,
	        text: text,
	        draggable: true,
	        close: true,
	        visible: true,
	        modal: false,
	        icon: YAHOO.widget.SimpleDialog.ICON_BLOCK,
	        constraintoviewport: true,
	        buttons: [ 
	        { label:"Yes" },
	        { label:'No', isDefault:true }
	        ]
	    };
		
		cfg.buttons = createDialogTempButtons();
		var dlg =  new YAHOO.widget.SimpleDialog("dialogTemp"+id , cfg);
		
		dlg.setHeader(cfg.header);
	    dlg.render(document.body); 
		dlg.show(); 
	
	}
	
	createSimpleYahooDialogErrorValidacion(header,text,newCampo) {
		if(text==""||text==undefined) {
			return;
		}
		
		campo=newCampo;
		var cfg = {
	        width: "300px",
	        fixedcenter: true,
	        header: header,
	        text: text,
	        draggable: true,
	        close: true,
	        visible: true,
	        modal: false,
	        icon: YAHOO.widget.SimpleDialog.ICON_BLOCK,
	        constraintoviewport: true,
	        buttons: [ 
	        { label:"Yes" },
	        { label:'No', isDefault:true }
	        ]
	    };
		
		cfg.buttons = createDialogTempButtonsValidacion();
		var dlg =  new YAHOO.widget.SimpleDialog("dialogTemp"+contador , cfg);
		
		contador=contador+1;
		
		dlg.setHeader(cfg.header);
	    dlg.render(document.body); 
		dlg.show(); 
	
	}
	
	createSimpleYahooDialogErrorValidacion2(id,header,text,newCampo) {	
		if(text==""||text==undefined) {
			return;
		}
		
		campo=newCampo;
		
		var cfg = {
	        width: "300px",
	        fixedcenter: true,
	        header: header,
	        text: text,
	        draggable: true,
	        close: true,
	        visible: true,
	        modal: false,
	        icon: YAHOO.widget.SimpleDialog.ICON_BLOCK,
	        constraintoviewport: true,
	        buttons: [ 
	        { label:"Yes" },
	        { label:'No', isDefault:true }
	        ]
	    };
		
		cfg.buttons = createDialogTempButtonsValidacion();
		var dlg =  new YAHOO.widget.SimpleDialog("dialogTemp"+id , cfg);
		
		dlg.setHeader(cfg.header);
	    dlg.render(document.body); 
		dlg.show(); 
	
	}
	
	createDialogTempButtonsValidacion() {
	        var ybs = [];	 
	        var yb = {};
	        yb.text = 'OK';
	        yb.handler = onClickDialogTempValidacion;            
	        ybs.push(yb); 
	        return ybs;
	}
	
	onClickDialogTempValidacion(evt) {      
		this.hide();
		
		if(campo!=null)	{ 
			//campo.select();
			//campo.focus();			
		}		
	}  
		
	onClickDialogTemp(evt) {      
	    this.hide();
	} 
		
	createDialogTempButtons() {
	   var ybs = [];	 
	   var yb = {};
	   yb.text = 'OK';
	   yb.handler = onClickDialogTemp;            
	   ybs.push(yb); 
	   return ybs;
	}
	
	createSimpleYahooDialogInfo(header,text) {
		
		var cfg = {
	        width: "300px",
	        fixedcenter: true,
	        header: header,
	        text: text,
	        draggable: true,
	        close: true,
	        visible: true,
	        modal: false,
	        icon: YAHOO.widget.SimpleDialog.ICON_INFO,
	        constraintoviewport: true,
	        buttons: [ 
	        { label:"Yes" },
	        { label:'No', isDefault:true }
	        ]
	    };
		
		cfg.buttons = createDialogTempButtons();
		var dlg =  new YAHOO.widget.SimpleDialog("dialogTemp"+1 , cfg);
		
		contador=contador+1;
		
		dlg.setHeader(cfg.header);
	    dlg.render(document.body); 
		dlg.show(); 	
	}
	
	createSimpleYahooDialogInfo(header,text,icon) {
		createSimpleYahooDialogInfoInterno(header,text,icon);	
	}
	
	createSimpleYahooDialogInfoInterno(header,text,icon) {
		var cfg = {
	        width: "300px",
	        fixedcenter: true,
	        header: header,
	        text: text,
	        draggable: true,
	        close: true,
	        visible: true,
	        modal: false,
	        icon: icon,
	        constraintoviewport: true,
	        buttons: [ 
	        { label:"Yes" },
	        { label:'No', isDefault:true }
	        ]
	    };
		
		cfg.buttons = createDialogTempButtons();
		var dlg =  new YAHOO.widget.SimpleDialog("dialogTemp"+contador , cfg);
		
		contador=contador+1;
		
		dlg.setHeader(cfg.header);
	    dlg.render(document.body); 
		dlg.show(); 	
	}
}

var ajaxFuncionGeneral=new AjaxFuncionGeneral();

export {AjaxFuncionGeneral,ajaxFuncionGeneral};

//</script>