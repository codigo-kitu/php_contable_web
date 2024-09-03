//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../General/Constantes.js';
import {FuncionGeneral,funcionGeneral} from '../General/FuncionGeneral.js';

class FuncionGeneralJQuery {
	
	getConfigDataTableJQuery3(paging,ordering,info,searching,pages) {	
		var config={   
			"paging":   paging,
	        "ordering": ordering,
	        "info":     info,
	        "searching":     searching,
	        "processing": true,
	        "lengthMenu": [[5,10,25,50,100,1000, -1], [5,10,25,50,100,1000, "All"]]
	    };		
		
		return config;
	}
	
	getConfigDataTableJQuery2(paging,ordering,info,pages) {	
		var config={   
			"paging":   paging,
	        "ordering": ordering,
	        "info":     info,
	        "searching":     false,
	        "processing": true,
	        "lengthMenu": [[5,10,25,50,100,1000, -1], [5,10,25,50,100,1000, "All"]]
	    };		
		
		return config;
	}
	
	getConfigDataTableJQuery() {	
		var config={   
			"paging":   false,
	        "ordering": false,
	        "info":     true
	    };		
		
		return config;
	}
	
	getConfigTabsJQuery() {	
		var config={ 
				show: { 
					effect: "blind", 
					duration: 800 				
				}
			}
		
		return config;
	}
	
	setDefaultComboBoxValuesJQuery(paginacion,reporte) {	
		jQuery("#ParamsBuscar-cmbPaginacion").val(paginacion).trigger("change");
		jQuery("#ParamsBuscar-cmbGenerarReporte").val(reporte).trigger("change");
		jQuery("#ParamsBuscar-cmbTiposReporte").val("NORMAL").trigger("change");
		jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
		jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");						
				
		if(jQuery("#ParamsPostAccion-cmbAccionesFormulario")!=null) {
			jQuery("#ParamsPostAccion-cmbAccionesFormulario").val(constantes.STR_ACCIONES).trigger("change");
			//console.log(jQuery("#ParamsPostAccion-cmbAccionesFormulario").val());
		}
		
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones")!=null) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
		
		if(jQuery("#ParamsPostAccion-cmbTiposRelacionesFormulario")!=null) {
			jQuery("#ParamsPostAccion-cmbTiposRelacionesFormulario").val(constantes.STR_RELACIONES).trigger("change");
		}
	}
	
	inicializarCombosBoxSelect2JQuery() {
		if(jQuery("#ParamsBuscar-cmbPaginacion")!=null) { 
			jQuery("#ParamsBuscar-cmbPaginacion").select2();
		}
		
		if(jQuery("#ParamsBuscar-cmbGenerarReporte")!=null) { 
			jQuery("#ParamsBuscar-cmbGenerarReporte").select2();
		}
		
		if(jQuery("#ParamsBuscar-cmbTiposReporte")!=null) { 
			jQuery("#ParamsBuscar-cmbTiposReporte").select2();
		}
		
		if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect")!=null) { 
			jQuery("#ParamsBuscar-cmbTiposColumnasSelect").select2();
		}
		
		if(jQuery("#ParamsBuscar-cmbAcciones")!=null) { 
			jQuery("#ParamsBuscar-cmbAcciones").select2();
		}
		
		if(jQuery("#ParamsBuscar-cmbAccionesFormulario")!=null) { 
			jQuery("#ParamsPostAccion-cmbAccionesFormulario").select2();	
		}
	}
	
	inicializarBotonesCancelarCerrarJQuery(nombreAuxiliarClase) {	
		jQuery("#btnCancelarArchivoActual"+nombreAuxiliarClase).button();
		
		jQuery("#btnCerrarPagina"+nombreAuxiliarClase).button();
		
		jQuery("#btnCancelarAccionesRelaciones"+nombreAuxiliarClase).button();
	}
	
	inicializarBotonesImprimirJQuery(nombreAuxiliarClase) {	
		/*
		jQuery("#btnImprimirPagina"+nombreAuxiliarClase).click(function(){
			funcionGeneral.printWebPage();	
		});
		*/
		
		jQuery("#btnImprimirPagina"+nombreAuxiliarClase).button();
		
		/*
		jQuery("#btnImprimir"+nombreAuxiliarClase).click(function(){
			funcionGeneral.printWebPage();								
		});
		*/
		
		jQuery("#btnImprimir"+nombreAuxiliarClase).button();
	}
	
	cargarCombosBoxSelect2JQuery(tiposReportes,tiposReporte,tiposPaginacion,tiposAcciones,tiposColumnasSelect,tiposAccionesFormulario) {
		
		if(tiposReportes!=null && jQuery('#ParamsBuscar-cmbGenerarReporte')!=null) {
			jQuery.each(tiposReportes, function(key, value) {
				jQuery('#ParamsBuscar-cmbGenerarReporte')
					.append(jQuery('<option>', { value : key })
					.text(value)); 	
			});
		}
		
		if(tiposReporte!=null && jQuery('#ParamsBuscar-cmbTiposReporte')!=null) {
			jQuery.each(tiposReporte, function(key, value) {
				jQuery('#ParamsBuscar-cmbTiposReporte')
					.append(jQuery('<option>', { value : key })
					.text(value)); 	
			});
		}
		
		if(tiposPaginacion!=null && jQuery('#ParamsBuscar-cmbPaginacion')!=null) {
			jQuery.each(tiposPaginacion, function(key, value) {
				jQuery('#ParamsBuscar-cmbPaginacion')
					.append(jQuery('<option>', { value : key })
					.text(value)); 	
			});
		}
		
		//SELECCIONA POR INDICE
		//jQuery('#ParamsBuscar-cmbPaginacion option:eq(1)').prop('selected', true);
		
		if(tiposAcciones!=null && jQuery('#ParamsBuscar-cmbAcciones')!=null) {
			jQuery.each(tiposAcciones, function(key, value) {
				jQuery('#ParamsBuscar-cmbAcciones')
					.append(jQuery('<option>', { value : key })
					.text(value)); 	
			});
		}
		
		if(tiposColumnasSelect!=null && jQuery('#ParamsBuscar-cmbTiposColumnasSelect')!=null) {
			jQuery.each(tiposColumnasSelect, function(key, value) {
				jQuery('#ParamsBuscar-cmbTiposColumnasSelect')
					.append(jQuery('<option>', { value : value.sCodigo })
					.text(value.sDescripcion)); 	
			});
		}
		
		if(tiposAccionesFormulario!=null && jQuery('#ParamsPostAccion-cmbAccionesFormulario')!=null) {
			jQuery.each(tiposAccionesFormulario, function(key, value) {
				jQuery('#ParamsPostAccion-cmbAccionesFormulario')
					.append(jQuery('<option>', { value : key })
					.text(value)); 	
			});
		}
	}
	
	getConfigDivOrdenJQuery() {	
		var config={
			    title: "ORDEN",
				autoOpen: false,
			    resizable: false,
			    height: 300,
			    modal: false,
			    position: [{
			    	  of: jQuery('#outerBorder'),// jQuery('#divMensajePageDialog').parent(),
			    	  my: 'center',
			    	  at: 'center',
			    	  offset: '0 0'
			    	}],
			    buttons: {
			        "CERRAR" : function () {
			        	jQuery(this).dialog("close");
			        }
			    }
			}
		
		return config;
	}
	
	getConfigDivMensajePageDialogJQuery() {	
		var config={
			    title: "Mensaje",
				autoOpen: false,
			    resizable: false,
			    height: 160,
			    modal: false,
			    position: [{
			    	  of: jQuery('#outerBorder'),// jQuery('#divMensajePageDialog').parent(),
			    	  my: 'center',
			    	  at: 'center',
			    	  offset: '0 0'
			    	}],
			    buttons: {
			        "Ok" : function () {
			        	jQuery(this).dialog("close");
			        }
			    }
			}
		
		return config;
	}
	
	getConfigDivPopupAjaxWebPartJQuery() {	
		var config={
				autoOpen: false,
				width: constantes.INT_POPUP_WIDTH,
				height: constantes.INT_POPUP_HEIGHT,
				modal: true,
				draggable: true,
				resizable: true,
				show: constantes.STR_POPUP_EFFECT,					
				hide: constantes.STR_POPUP_EFFECT_HIDE,
				title: '',
				position: 'top,left'/*,
				buttons: [
						{
							text: "Cerrar",
							click: function() { login.resaltarRestaurarDivPopup(false);}//jQuery(this).dialog("close");
						}
					]*/
		}
		
		return config;
	}
	
	getConfigDivMantenimientoAjaxWebPartJQuery() {	
		var config={
				autoOpen: false,
				width: window.screen.width*0.80,//0.75
				height:window.screen.height*0.93,//0.75
				top:window.screen.height*0.13,
				left:window.screen.width*0.13,
				closeText:'',
				modal: true,
				draggable: true,
				resizable: true,
				show: "slide",					
				hide: "blind",
				title: '',
				position: 'center'
			}
		
		return config;
	}
	
	cambiarAltoMaximoTabla(nombreAuxiliarClase,tamanio) {	
		if(jQuery("#ParamsBuscar-chbConAltoMaximoTabla").prop("checked")==true) {
			jQuery("#divTablaDatosAuxiliar"+nombreAuxiliarClase+"AjaxWebPart").css({"height": "100%"});
			
		} else {
			jQuery("#divTablaDatosAuxiliar"+nombreAuxiliarClase+"AjaxWebPart").css({"height": tamanio});	
		}	
	}
	
	seleccionarTodos(nombreAuxiliarClase,tamanio) {	
		var strValueTipoColumnaSelect=jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val();
		
		if(strValueTipoColumnaSelect==constantes.STR_COLUMNAS) {
			var checkboxs_id=jQuery(".chkb_id");
			
			if(jQuery("#ParamsBuscar-chbSelTodos").prop('checked')==true) {
				checkboxs_id.prop('checked', true);
			} else {
				checkboxs_id.prop('checked', false);
			}
			
			//alert(strValueTipoColumnaSelect);									
		}
	}
	
	ocultarControlesExpandirImagenesInvitado() {	
		jQuery("#imgAtras").css("visibility","hidden");
		jQuery("#imgExpandirColapsar").css("visibility","hidden");
		jQuery("#imgExpandirColapsarSubHeader").css("visibility","hidden");
	}
	
	actualizarStyleDivsPrincipales(strStyleDivArbol,strStyleDivContent,strStyleDivOpcionesBanner,strStyleDivExpandirColapsar,strStyleDivHeader) {	
		
		if(jQuery("#leftSidebar").attr("style")!=strStyleDivArbol) {
			jQuery("#leftSidebar").attr("style",strStyleDivArbol);
		}
		
		if(jQuery("#content").attr("style")!=strStyleDivContent) {
			jQuery("#content").attr("style",strStyleDivContent);
		}
		
		if(jQuery("#divOpcionesBanner").attr("style")!=strStyleDivOpcionesBanner) {
			jQuery("#divOpcionesBanner").attr("style",strStyleDivOpcionesBanner);
		}
		
		if(jQuery("#subheaderImageTree").attr("style")!=strStyleDivExpandirColapsar) {
			jQuery("#subheaderImageTree").attr("style",strStyleDivExpandirColapsar);
		}
		
		if(jQuery("#header").attr("style")!=strStyleDivHeader) {
			jQuery("#header").attr("style",strStyleDivHeader);
		}
	}
	
	getSettingsUpload(strTipo,strModulo,strTabla,strColumna,strNombreCampo) {
		var strTipoArchivos=funcionGeneral.getTipoArchivosUpload(strTipo);
		var id=jQuery("#form-id").val();
		
		var settings_upload = {
			url: 'http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+'UploadController.php',
			dragDrop:false,
			showDelete:true,
			fileName: "myfile",
			allowedTypes:strTipoArchivos,	
			returnType:"json",   
			formData: {"modulo":strModulo,"tabla":strTabla,"columna":strColumna,"id":id},
				
			dynamicFormData: function()
			{
			    var data ={ location:"ECUADOR"}
				
			    return data;
			},
			    
			onSuccess:function(files,data,xhr)
			{
				var strPath=constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE+"/"+constantes.STR_CARPETA_UPLOADS+"/"+strModulo+"/"+strTabla+"/"+strColumna+"/"+data;
				
				jQuery("#"+strNombreCampo).val(strPath);
				
			    alert("Archivo Cargado");
												
				/*
				for(var i=0;i<data.length;i++) {
					alert("Archivo Cargado:"+data[i]);
				}
				*/
			},
						    
			deleteCallback: function(data,pd)
			{
				for(var i=0;i<data.length;i++) {
					jQuery.post('http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+'UploadDeleteController.php',{op:"delete",name:data[i]},
					function(resp, textStatus, jqXHR)
					{
						//Show Message  
						jQuery("#status").append("<div>Archivo Eliminado</div>");      
					});
				}
					
				pd.statusbar.hide(); //You choice to hide/not.	
			}
		}
		
		return settings_upload;
	}
	
	//OPTIMIZACION CAPA FUNCION_GENERAL
	
	resaltarRestaurarDivMensajePopup(bitEsResaltar,sNombreClase) {
		//PUEDE QUEDARSE DESHABILITADO, SOLO MUESTRO EL MENSAJE
		//this.resaltarRestaurarDivsPagina(bitEsResaltar);
		
		if(bitEsResaltar==true) {
			funcionGeneral.irAreaDePagina('Campos');
			
			jQuery("#div"+sNombreClase+"PopupAjaxWebPart").dialog( "open" );
			
			//jQuery("#div"+sNombreClase+"PopupAjaxWebPart").css("position","absolute");
			jQuery("#div"+sNombreClase+"PopupAjaxWebPart").css("top", "100px");
			jQuery("#div"+sNombreClase+"PopupAjaxWebPart").css("left", "100px");
		} else {	
			if(jQuery("#div"+sNombreClase+"PopupAjaxWebPart").dialog( "isOpen" )==true) {		
				jQuery("#div"+sNombreClase+"PopupAjaxWebPart").dialog( "close" );
			}
		}
		
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,sNombreClase) {
		if(strTipo=="POPUP") {
			if(strLink!=null && strLink!="") {
					//window.open (strLink,"TipoGuiaRemisions");
					var params  = funcionGeneral.getParamsNewPopupPage(strLink);		 			
					var strWindowName=sNombreClase+"s";
					
					var newwin=funcionGeneral.openNewPopupPage(strLink,strWindowName, params);
					
					if (window.focus) {
						if(newwin!=null) {
							newwin.focus();
							
						} else {
							constantes.STR_POPUP_URL=strLink;
			 				
							params = funcionGeneral.getParamsNewPopupPageJQuery(strLink,strWindowName);
							
							jQuery("#btn"+sNombreClase+"AuxiliarPopup").popupWindow(params);
							
							this.resaltarRestaurarDivMensajePopup(true,sNombreClase);	
						}
					}
				}
		} else {
			document.location.href=strLink;
		}
	}
	
	
	procesarFinalizacionProcesoAbrirLink(strRelativePath,sNombreClase) {
		var strLink=null;
		var strTipo='POPUP';
		var blnProcesarReporte=null;
		
		if(document.getElementById("MensajeHdnAuxiliarUrlPagina")!=null) {
			strLink=document.getElementById("MensajeHdnAuxiliarUrlPagina").value;
		}
		
		if(document.getElementById("MensajeHdnAuxiliarTipo")!=null) {
			strTipo=document.getElementById("MensajeHdnAuxiliarTipo").value;
		}
		
		funcionGeneral.procesarFinalizacionProceso(strRelativePath);	
		
		//this.resaltarRestaurarDivsPagina(false);
		
		this.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,sNombreClase);		
	}
	
	
	procesarFinalizacionProcesoSimple(strRelativePath,sNombreClase) {
		
		if(document.getElementById("leftSidebar")!=null 
			&& document.getElementById("leftSidebar").style.opacity!=null 
			&& document.getElementById("leftSidebar").style.opacity!="1"){
				
			funcionGeneral.resaltarRestaurarDivsPagina(false,sNombreClase);
		}
		
		funcionGeneral.procesarFinalizacionProcesoSimple(strRelativePath);	
			
		//return bitRetorno;
	}	
	
	procesarFinalizacionProceso(strRelativePath,sNombreClase) {
		
		if(document.getElementById("leftSidebar")!=null 
			&& document.getElementById("leftSidebar").style.opacity!=null 
			&& document.getElementById("leftSidebar").style.opacity!="1"){
				
			//funcionGeneral.resaltarRestaurarDivsPagina(false,sNombreClase);
		}
		
		funcionGeneral.resaltarRestaurarDivsPagina(false,sNombreClase);
		
		funcionGeneral.procesarFinalizacionProceso(strRelativePath);	
	}
	
	
	resaltarRestaurarDivMantenimiento(bitEsResaltar,sNombreClase) {
		
		funcionGeneral.resaltarRestaurarDivsPagina(bitEsResaltar,sNombreClase);
		
		if(bitEsResaltar==true) {
			funcionGeneral.irAreaDePagina("Campos");
			
			jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").dialog("open");
			
			jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").position({
				   my: "center top",
				   at: "center top",
				   of: window,
				   within: window
				});
			//jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").offset({ top: 20, left: 10});
						
		} else {							
			if(jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").dialog("isOpen")==true) {		
				jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").dialog("close");
			}
		}
	}
	
	actualizarOnComplete(strESRELACIONES,strESRELACIONADO,strRelativePath,sNombreClase) {
		if(strESRELACIONES=="true"
		   || strESRELACIONADO=="true"
		   || (jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false)
		) {
							
			this.resaltarRestaurarDivMantenimiento(false,sNombreClase);
		}
				
		this.procesarFinalizacionProceso(strRelativePath,sNombreClase);
		
		if(document.getElementById("frmMantenimiento"+sNombreClase+":maximumSeverity")!=null && document.getElementById("frmMantenimiento"+sNombreClase+":maximumSeverity").value!=-1&&document.getElementById("frmMantenimiento"+sNombreClase+":maximumSeverity").value!=2) {	

		}
	}
	
	//OPTIMIZACION CAPA FUNCION_GENERAL FIN
	
	
	
	
	
	//OPTIMIZACION CAPA PAGINA_WEB_INTERACCION
	
	setConfigDataTableJQuery(sNombreClase,configDataTable) {
		//var tblTablaDatos=jQuery("#tblTablaDatos"+sNombreClase+"s").dataTable(configDataTable);
		
		jQuery("#tblTablaDatos"+sNombreClase+"s tbody").on("click", "tr", function () {
		    if (jQuery(this).hasClass("selected") ) {
		       	jQuery(this).removeClass("selected");
		       	
		    } else {
		       	//tblTablaDatosTipos.jQuery('tr.selected').removeClass('selected');
				
				jQuery("tr.selected").removeClass("selected");
		        jQuery(this).addClass("selected");
		    }
		});
	}
	
	cargarCombosRelaciones(tiposRelaciones,tiposRelacionesFormulario) {
		if(tiposRelaciones!=null && jQuery("#ParamsBuscar-cmbTiposRelaciones")!=null) {
			jQuery.each(tiposRelaciones, function(key, value) {
				jQuery("#ParamsBuscar-cmbTiposRelaciones")
				.append(jQuery("<option>", { value : value.sCodigo })
				.text(value.sDescripcion)); 
			});
		}
		
		if(tiposRelacionesFormulario!=null && jQuery("#ParamsPostAccion-cmbTiposRelacionesFormulario")!=null) {
			jQuery.each(tiposRelacionesFormulario, function(key, value) {
				jQuery("#ParamsPostAccion-cmbTiposRelacionesFormulario")
				.append(jQuery("<option>", { value : value.sCodigo })
				.text(value.sDescripcion)); 
			});
		}
	}
	
	cargarCombosForeignKeyIndices(sNombre,objetosForeignKey) {
		jQuery(sNombre)
		.find('option')
		.remove()
		.end();

		jQuery.each(objetosForeignKey, function(key, value) {
			jQuery(sNombre)
				.append(jQuery("<option>", { value : key })
				.text(value));	
		});
	
		jQuery(sNombre).append(jQuery("<option>", {
			value: constantes.INT_VALOR_ESCOJA_OPCION,
			text: constantes.STR_ESCOJA_OPCION
		}));
	
		if(constantes.STR_TIPO_COMBO=="select2") {
			jQuery(sNombre).select2();
		}
	}
	
	cargarCombosForeignKeyEditar(control_name,para_evento,idActual,objetoFuncionGeneral,objetosForeignKey) {
		if(para_evento==true) {
			objetoFuncionGeneral.procesarInicioProcesoSimple();
		}
		
		jQuery("#"+control_name)
			.find('option')
			.remove()
			.end();

		jQuery.each(objetosForeignKey, function(key, value) {
			jQuery("#"+control_name)
			.append(jQuery("<option>", { value : key })
			.text(value));
		});

		jQuery("#"+control_name).append(jQuery("<option>", {
			value: constantes.INT_VALOR_ESCOJA_OPCION,
			text: constantes.STR_ESCOJA_OPCION
		}));

		if(constantes.STR_TIPO_COMBO=="select2") {
			jQuery("#"+control_name).select2();

			if(idActual!=null && idActual>-1) {
				if(jQuery("#"+control_name).val(idActual)) {
					jQuery("#"+control_name).val(idActual).trigger("change");
				}
			} else {
				jQuery("#"+control_name).select2("val", null);
				jQuery("#"+control_name).val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}

		}

		if(para_evento==true) {
			objetoFuncionGeneral.procesarFinalizacionProcesoSimple();
		}
	}
	//OPTIMIZACION CAPA PAGINA_WEB_INTERACCION FIN
	
	//VALIDACIONES
	addValidacionesFuncionesGenerales() {
		
		jQuery.validator.addMethod(
			"regexpStringMethod",
			function(value, element) {
				return value.match(constantes.STR_REGEX_STRING_GENERAL);
			},
			"Valor Incorrecto"
		);
		
		jQuery.validator.addMethod(
				"regexpTelefonoMethod",
				function(value, element) {
					return value.match(constantes.STR_REGEX_TELEFONO_GENERAL);
				},
				"Telefono Incorrecto"
		);
		
		jQuery.validator.addMethod(
				"regexpFaxMethod",
				function(value, element) {
					return value.match(constantes.STR_REGEX_FAX_GENERAL);
				},
				"Fax Incorrecto"
			);
		
		jQuery.validator.addMethod(
				"regexpPostalMethod",
				function(value, element) {
					return value.match(constantes.STR_REGEX_POSTAL_GENERAL);
				},
				"Codigo Postal Incorrecto"
			);
		
		jQuery.validator.addMethod(
				"regexpDirMethod",
				function(value, element) {
					return value.match(constantes.STR_REGEX_STRING_GENERAL);
				},
				"Codigo Postal Incorrecto"
			);
	}
	//VALIDACIONES-FIN
	
	//HANDLEBARS_FUNCIONES
	addHandleBarsFuncionesGenerales() {
		
		//HTML FORM REPORTE
		
		Handlebars.registerHelper('strtoupper', function (variable1) {
		    return funcionGeneral.changeUpper(variable1);
		});
		
		Handlebars.registerHelper('trim', function (variable1) {
		    return funcionGeneral.changeTrim(variable1);
		});
		
		Handlebars.registerHelper('existeCadenaArrayOrderBy', function (variable1,arrOrderBy,bitParaReporteOrderBy) {
			return funcionGeneral.existeCadenaArrayOrderBy(variable1,arrOrderBy,bitParaReporteOrderBy);
		});
		
		Handlebars.registerHelper('getCheckBox', function (value,nombre,paraReporte) {
			return funcionGeneral.getCheckBox(value,nombre,paraReporte);
		});
		
		//TABLA DATOS
		
		Handlebars.registerHelper('count', function (lista) {
		    return funcionGeneral.count(lista);
		});
		
		Handlebars.registerHelper('ValCol', function (columna,paraReporte) {
		    return funcionGeneral.ValCol(columna,paraReporte);
		});
		
		Handlebars.registerHelper('getClassRowTableHtml', function (i) {
			return funcionGeneral.getClassRowTableHtml(i);
		});
		
		Handlebars.registerHelper('getOnMouseOverHtml', function (STR_TIPO_TABLA,i) {
			return funcionGeneral.getOnMouseOverHtml(STR_TIPO_TABLA,i);
		});
		
		Handlebars.registerHelper('getOnMouseOverHtmlReporte', function (paraReporte,STR_TIPO_TABLA,i) {
			return funcionGeneral.getOnMouseOverHtmlReporte(paraReporte,STR_TIPO_TABLA,i);
		});
		
		Handlebars.registerHelper('If_Not', function (value) {
			return funcionGeneral.If_Not(value);
		});
		
		Handlebars.registerHelper('If_Yes_AND_Not', function (value1,value2) {
			return funcionGeneral.If_Yes_AND_Not(value1,value2);
		});
		
		Handlebars.registerHelper('If_Not_AND_Not_AND_Not', function (value1,value2,value3) {
			return funcionGeneral.If_Not_AND_Not_AND_Not(value1,value2,value3);
		});
		
		Handlebars.registerHelper('If_Not_AND_Not', function (value1,value2) {
			return funcionGeneral.If_Not_AND_Not(value1,value2);
		});
		
		Handlebars.registerHelper('Is_List_Exist', function (list) {
			return funcionGeneral.Is_List_Exist(list);
		});
		
		Handlebars.registerHelper('If_NotText_AND_Not', function (value1,text,value2) {
			return funcionGeneral.If_NotText_AND_Not(value1,text,value2);
		});
		
		Handlebars.registerHelper('If_NotText', function (value1,text) {
			return funcionGeneral.If_NotText(value1,text);
		});
		
	}
	
	//HANDLEBARS_FUNCIONES-FIN
}

var funcionGeneralJQuery=new FuncionGeneralJQuery();

export {FuncionGeneralJQuery,funcionGeneralJQuery};

/*
var isLoaded=false;

function onLoadPage(){	
	funcionGeneral.procesarFinalizacionProceso();
	isLoaded=true;
}

window.onload=onLoadPage; 
*/

//</script>