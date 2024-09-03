//<script type="text/javascript" language="javascript">



//var lista_productoJQueryPaginaWebInteraccion= function (lista_producto_control) {
//this.,this.,this.

import {lista_producto_constante,lista_producto_constante1} from '../util/lista_producto_constante.js';

import {lista_producto_funcion,lista_producto_funcion1} from '../util/lista_producto_form_funcion.js';


class lista_producto_webcontrol extends GeneralEntityWebControl {
	
	lista_producto_control=null;
	lista_producto_controlInicial=null;
	lista_producto_controlAuxiliar=null;
		
	//if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(lista_producto_control) {
		super();
		
		this.lista_producto_control=lista_producto_control;
	}
		
	actualizarVariablesPagina(lista_producto_control) {
		
		if(lista_producto_control.action=="index" || lista_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(lista_producto_control);
			
		} 
		
		
		
	
		else if(lista_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(lista_producto_control);	
		
		} else if(lista_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(lista_producto_control);		
		}
	
	
		
		
		else if(lista_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(lista_producto_control);
		
		} else if(lista_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(lista_producto_control);
		
		} else if(lista_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(lista_producto_control);
		
		} else if(lista_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(lista_producto_control);
		
		} else if(lista_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(lista_producto_control);
		
		} else if(lista_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(lista_producto_control);		
		
		} else if(lista_producto_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(lista_producto_control);		
		
		} 
		//else if(lista_producto_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(lista_producto_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + lista_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(lista_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(lista_producto_control) {
		this.actualizarPaginaAccionesGenerales(lista_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(lista_producto_control) {
		
		this.actualizarPaginaCargaGeneral(lista_producto_control);
		this.actualizarPaginaOrderBy(lista_producto_control);
		this.actualizarPaginaTablaDatos(lista_producto_control);
		this.actualizarPaginaCargaGeneralControles(lista_producto_control);
		//this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lista_producto_control);
		this.actualizarPaginaAreaBusquedas(lista_producto_control);
		this.actualizarPaginaCargaCombosFK(lista_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(lista_producto_control) {
		//this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(lista_producto_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(lista_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lista_producto_control);		
		this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(lista_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lista_producto_control);		
		this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(lista_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lista_producto_control);		
		this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(lista_producto_control) {
		this.actualizarPaginaCargaGeneralControles(lista_producto_control);
		this.actualizarPaginaCargaCombosFK(lista_producto_control);
		this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lista_producto_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(lista_producto_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(lista_producto_control) {
		this.actualizarPaginaCargaGeneralControles(lista_producto_control);
		this.actualizarPaginaCargaCombosFK(lista_producto_control);
		this.actualizarPaginaFormulario(lista_producto_control);
		this.onLoadCombosDefectoFK(lista_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lista_producto_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(lista_producto_control) {
		//FORMULARIO
		if(lista_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lista_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(lista_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		
		//COMBOS FK
		if(lista_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lista_producto_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(lista_producto_control) {
		//FORMULARIO
		if(lista_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lista_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(lista_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);	
		
		//COMBOS FK
		if(lista_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lista_producto_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(lista_producto_control) {
		//FORMULARIO
		if(lista_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lista_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);	
		//COMBOS FK
		if(lista_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lista_producto_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(lista_producto_control) {
		
		if(lista_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(lista_producto_control);
		}
		
		if(lista_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(lista_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(lista_producto_control) {
		if(lista_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("lista_productoReturnGeneral",JSON.stringify(lista_producto_control.lista_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(lista_producto_control) {
		if(lista_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && lista_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(lista_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(lista_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(lista_producto_control, mostrar) {
		
		if(mostrar==true) {
			lista_producto_funcion1.resaltarRestaurarDivsPagina(false,"lista_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				lista_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"lista_producto");
			}			
			
			lista_producto_funcion1.mostrarDivMensaje(true,lista_producto_control.strAuxiliarMensaje,lista_producto_control.strAuxiliarCssMensaje);
		
		} else {
			lista_producto_funcion1.mostrarDivMensaje(false,lista_producto_control.strAuxiliarMensaje,lista_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(lista_producto_control) {
		if(lista_producto_funcion1.esPaginaForm(lista_producto_constante1)==true) {
			window.opener.lista_producto_webcontrol1.actualizarPaginaTablaDatos(lista_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(lista_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(lista_producto_control) {
		lista_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(lista_producto_control.strAuxiliarUrlPagina);
				
		lista_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(lista_producto_control.strAuxiliarTipo,lista_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(lista_producto_control) {
		lista_producto_funcion1.resaltarRestaurarDivMensaje(true,lista_producto_control.strAuxiliarMensajeAlert,lista_producto_control.strAuxiliarCssMensaje);
			
		if(lista_producto_funcion1.esPaginaForm(lista_producto_constante1)==true) {
			window.opener.lista_producto_funcion1.resaltarRestaurarDivMensaje(true,lista_producto_control.strAuxiliarMensajeAlert,lista_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(lista_producto_control) {
		this.lista_producto_controlInicial=lista_producto_control;
			
		if(lista_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(lista_producto_control.strStyleDivArbol,lista_producto_control.strStyleDivContent
																,lista_producto_control.strStyleDivOpcionesBanner,lista_producto_control.strStyleDivExpandirColapsar
																,lista_producto_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(lista_producto_control) {
		this.actualizarCssBotonesPagina(lista_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(lista_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(lista_producto_control.tiposReportes,lista_producto_control.tiposReporte
															 	,lista_producto_control.tiposPaginacion,lista_producto_control.tiposAcciones
																,lista_producto_control.tiposColumnasSelect,lista_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(lista_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(lista_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(lista_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(lista_producto_control) {
	
		var indexPosition=lista_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=lista_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(lista_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosproductosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosunidad_comprasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosunidad_ventasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarComboscategoria_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombossub_categoria_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombostipo_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosbodegasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarComboscuenta_comprasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarComboscuenta_ventasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_inventario",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarComboscuenta_inventariosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosotro_suplidorsFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosimpuestosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosimpuesto_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosimpuesto_comprassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosotro_impuestosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosotro_impuesto_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosotro_impuesto_comprassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosretencionsFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosretencion_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosretencion_comprassFK(lista_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(lista_producto_control.strRecargarFkTiposNinguno!=null && lista_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && lista_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosproductosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad_compra",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosunidad_comprasFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad_venta",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosunidad_ventasFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_producto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarComboscategoria_productosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombossub_categoria_productosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_producto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombostipo_productosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosbodegasFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compra",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarComboscuenta_comprasFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_venta",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarComboscuenta_ventasFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_inventario",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarComboscuenta_inventariosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_suplidor",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosotro_suplidorsFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosimpuestosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto_ventas",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosimpuesto_ventassFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto_compras",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosimpuesto_comprassFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosotro_impuestosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto_ventas",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosotro_impuesto_ventassFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto_compras",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosotro_impuesto_comprassFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosretencionsFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_ventas",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosretencion_ventassFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_compras",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosretencion_comprassFK(lista_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproductoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.productosFK);
	}

	cargarComboEditarTablaunidad_compraFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.unidad_comprasFK);
	}

	cargarComboEditarTablaunidad_ventaFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.unidad_ventasFK);
	}

	cargarComboEditarTablacategoria_productoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.categoria_productosFK);
	}

	cargarComboEditarTablasub_categoria_productoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.sub_categoria_productosFK);
	}

	cargarComboEditarTablatipo_productoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.tipo_productosFK);
	}

	cargarComboEditarTablabodegaFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.bodegasFK);
	}

	cargarComboEditarTablacuenta_compraFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.cuenta_comprasFK);
	}

	cargarComboEditarTablacuenta_ventaFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.cuenta_ventasFK);
	}

	cargarComboEditarTablacuenta_inventarioFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.cuenta_inventariosFK);
	}

	cargarComboEditarTablaotro_suplidorFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.otro_suplidorsFK);
	}

	cargarComboEditarTablaimpuestoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.impuestosFK);
	}

	cargarComboEditarTablaimpuesto_ventasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.impuesto_ventassFK);
	}

	cargarComboEditarTablaimpuesto_comprasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.impuesto_comprassFK);
	}

	cargarComboEditarTablaotro_impuestoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.otro_impuestosFK);
	}

	cargarComboEditarTablaotro_impuesto_ventasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.otro_impuesto_ventassFK);
	}

	cargarComboEditarTablaotro_impuesto_comprasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.otro_impuesto_comprassFK);
	}

	cargarComboEditarTablaretencionFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.retencionsFK);
	}

	cargarComboEditarTablaretencion_ventasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.retencion_ventassFK);
	}

	cargarComboEditarTablaretencion_comprasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.retencion_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(lista_producto_control) {
		jQuery("#tdlista_productoNuevo").css("display",lista_producto_control.strPermisoNuevo);
		jQuery("#trlista_productoElementos").css("display",lista_producto_control.strVisibleTablaElementos);
		jQuery("#trlista_productoAcciones").css("display",lista_producto_control.strVisibleTablaAcciones);
		jQuery("#trlista_productoParametrosAcciones").css("display",lista_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(lista_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(lista_producto_control);
				
		if(lista_producto_control.lista_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(lista_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(lista_producto_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(lista_producto_control) {
	
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id").val(lista_producto_control.lista_productoActual.id);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-version_row").val(lista_producto_control.lista_productoActual.versionRow);
		
		if(lista_producto_control.lista_productoActual.id_producto!=null && lista_producto_control.lista_productoActual.id_producto>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto").val() != lista_producto_control.lista_productoActual.id_producto) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto").val(lista_producto_control.lista_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-codigo_producto").val(lista_producto_control.lista_productoActual.codigo_producto);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-descripcion_producto").val(lista_producto_control.lista_productoActual.descripcion_producto);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-precio1").val(lista_producto_control.lista_productoActual.precio1);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-precio2").val(lista_producto_control.lista_productoActual.precio2);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-precio3").val(lista_producto_control.lista_productoActual.precio3);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-precio4").val(lista_producto_control.lista_productoActual.precio4);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-costo").val(lista_producto_control.lista_productoActual.costo);
		
		if(lista_producto_control.lista_productoActual.id_unidad_compra!=null && lista_producto_control.lista_productoActual.id_unidad_compra>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra").val() != lista_producto_control.lista_productoActual.id_unidad_compra) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra").val(lista_producto_control.lista_productoActual.id_unidad_compra).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-unidad_en_compra").val(lista_producto_control.lista_productoActual.unidad_en_compra);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-equivalencia_en_compra").val(lista_producto_control.lista_productoActual.equivalencia_en_compra);
		
		if(lista_producto_control.lista_productoActual.id_unidad_venta!=null && lista_producto_control.lista_productoActual.id_unidad_venta>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta").val() != lista_producto_control.lista_productoActual.id_unidad_venta) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta").val(lista_producto_control.lista_productoActual.id_unidad_venta).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-unidad_en_venta").val(lista_producto_control.lista_productoActual.unidad_en_venta);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-equivalencia_en_venta").val(lista_producto_control.lista_productoActual.equivalencia_en_venta);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-cantidad_total").val(lista_producto_control.lista_productoActual.cantidad_total);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-cantidad_minima").val(lista_producto_control.lista_productoActual.cantidad_minima);
		
		if(lista_producto_control.lista_productoActual.id_categoria_producto!=null && lista_producto_control.lista_productoActual.id_categoria_producto>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != lista_producto_control.lista_productoActual.id_categoria_producto) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(lista_producto_control.lista_productoActual.id_categoria_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_sub_categoria_producto!=null && lista_producto_control.lista_productoActual.id_sub_categoria_producto>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val() != lista_producto_control.lista_productoActual.id_sub_categoria_producto) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val(lista_producto_control.lista_productoActual.id_sub_categoria_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-acepta_lote").val(lista_producto_control.lista_productoActual.acepta_lote);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-valor_inventario").val(lista_producto_control.lista_productoActual.valor_inventario);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-imagen").val(lista_producto_control.lista_productoActual.imagen);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-incremento1").val(lista_producto_control.lista_productoActual.incremento1);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-incremento2").val(lista_producto_control.lista_productoActual.incremento2);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-incremento3").val(lista_producto_control.lista_productoActual.incremento3);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-incremento4").val(lista_producto_control.lista_productoActual.incremento4);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-codigo_fabricante").val(lista_producto_control.lista_productoActual.codigo_fabricante);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-producto_fisico").val(lista_producto_control.lista_productoActual.producto_fisico);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-situacion_producto").val(lista_producto_control.lista_productoActual.situacion_producto);
		
		if(lista_producto_control.lista_productoActual.id_tipo_producto!=null && lista_producto_control.lista_productoActual.id_tipo_producto>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto").val() != lista_producto_control.lista_productoActual.id_tipo_producto) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto").val(lista_producto_control.lista_productoActual.id_tipo_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-tipo_producto_codigo").val(lista_producto_control.lista_productoActual.tipo_producto_codigo);
		
		if(lista_producto_control.lista_productoActual.id_bodega!=null && lista_producto_control.lista_productoActual.id_bodega>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega").val() != lista_producto_control.lista_productoActual.id_bodega) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega").val(lista_producto_control.lista_productoActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-mostrar_componente").val(lista_producto_control.lista_productoActual.mostrar_componente);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-factura_sin_stock").val(lista_producto_control.lista_productoActual.factura_sin_stock);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-avisa_expiracion").val(lista_producto_control.lista_productoActual.avisa_expiracion);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-factura_con_precio").val(lista_producto_control.lista_productoActual.factura_con_precio);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-producto_equivalente").val(lista_producto_control.lista_productoActual.producto_equivalente);
		
		if(lista_producto_control.lista_productoActual.id_cuenta_compra!=null && lista_producto_control.lista_productoActual.id_cuenta_compra>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val() != lista_producto_control.lista_productoActual.id_cuenta_compra) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val(lista_producto_control.lista_productoActual.id_cuenta_compra).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_cuenta_venta!=null && lista_producto_control.lista_productoActual.id_cuenta_venta>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val() != lista_producto_control.lista_productoActual.id_cuenta_venta) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val(lista_producto_control.lista_productoActual.id_cuenta_venta).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_cuenta_inventario!=null && lista_producto_control.lista_productoActual.id_cuenta_inventario>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario").val() != lista_producto_control.lista_productoActual.id_cuenta_inventario) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario").val(lista_producto_control.lista_productoActual.id_cuenta_inventario).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-cuenta_compra_codigo").val(lista_producto_control.lista_productoActual.cuenta_compra_codigo);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-cuenta_venta_codigo").val(lista_producto_control.lista_productoActual.cuenta_venta_codigo);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-cuenta_inventario_codigo").val(lista_producto_control.lista_productoActual.cuenta_inventario_codigo);
		
		if(lista_producto_control.lista_productoActual.id_otro_suplidor!=null && lista_producto_control.lista_productoActual.id_otro_suplidor>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor").val() != lista_producto_control.lista_productoActual.id_otro_suplidor) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor").val(lista_producto_control.lista_productoActual.id_otro_suplidor).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_impuesto!=null && lista_producto_control.lista_productoActual.id_impuesto>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto").val() != lista_producto_control.lista_productoActual.id_impuesto) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto").val(lista_producto_control.lista_productoActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_impuesto_ventas!=null && lista_producto_control.lista_productoActual.id_impuesto_ventas>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas").val() != lista_producto_control.lista_productoActual.id_impuesto_ventas) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas").val(lista_producto_control.lista_productoActual.id_impuesto_ventas).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_impuesto_compras!=null && lista_producto_control.lista_productoActual.id_impuesto_compras>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras").val() != lista_producto_control.lista_productoActual.id_impuesto_compras) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras").val(lista_producto_control.lista_productoActual.id_impuesto_compras).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-impuesto1_en_ventas").val(lista_producto_control.lista_productoActual.impuesto1_en_ventas);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-impuesto1_en_compras").val(lista_producto_control.lista_productoActual.impuesto1_en_compras);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-ultima_venta").val(lista_producto_control.lista_productoActual.ultima_venta);
		
		if(lista_producto_control.lista_productoActual.id_otro_impuesto!=null && lista_producto_control.lista_productoActual.id_otro_impuesto>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != lista_producto_control.lista_productoActual.id_otro_impuesto) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val(lista_producto_control.lista_productoActual.id_otro_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_otro_impuesto_ventas!=null && lista_producto_control.lista_productoActual.id_otro_impuesto_ventas>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas").val() != lista_producto_control.lista_productoActual.id_otro_impuesto_ventas) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas").val(lista_producto_control.lista_productoActual.id_otro_impuesto_ventas).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_otro_impuesto_compras!=null && lista_producto_control.lista_productoActual.id_otro_impuesto_compras>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras").val() != lista_producto_control.lista_productoActual.id_otro_impuesto_compras) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras").val(lista_producto_control.lista_productoActual.id_otro_impuesto_compras).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-otro_impuesto_ventas_codigo").val(lista_producto_control.lista_productoActual.otro_impuesto_ventas_codigo);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-otro_impuesto_compras_codigo").val(lista_producto_control.lista_productoActual.otro_impuesto_compras_codigo);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-precio_de_compra_0").val(lista_producto_control.lista_productoActual.precio_de_compra_0);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-precio_actualizado").val(lista_producto_control.lista_productoActual.precio_actualizado);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-requiere_nro_serie").val(lista_producto_control.lista_productoActual.requiere_nro_serie);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-costo_dolar").val(lista_producto_control.lista_productoActual.costo_dolar);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-comentario").val(lista_producto_control.lista_productoActual.comentario);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-comenta_factura").val(lista_producto_control.lista_productoActual.comenta_factura);
		
		if(lista_producto_control.lista_productoActual.id_retencion!=null && lista_producto_control.lista_productoActual.id_retencion>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion").val() != lista_producto_control.lista_productoActual.id_retencion) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion").val(lista_producto_control.lista_productoActual.id_retencion).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_retencion_ventas!=null && lista_producto_control.lista_productoActual.id_retencion_ventas>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas").val() != lista_producto_control.lista_productoActual.id_retencion_ventas) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas").val(lista_producto_control.lista_productoActual.id_retencion_ventas).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_retencion_compras!=null && lista_producto_control.lista_productoActual.id_retencion_compras>-1){
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras").val() != lista_producto_control.lista_productoActual.id_retencion_compras) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras").val(lista_producto_control.lista_productoActual.id_retencion_compras).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras").select2("val", null);
			if(jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-retencion_ventas_codigo").val(lista_producto_control.lista_productoActual.retencion_ventas_codigo);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-retencion_compras_codigo").val(lista_producto_control.lista_productoActual.retencion_compras_codigo);
		jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-notas").val(lista_producto_control.lista_productoActual.notas);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+lista_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("lista_producto","inventario","","form_lista_producto",formulario,"","",paraEventoTabla,idFilaTabla,lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}
	
	actualizarSpanMensajesCampos(lista_producto_control) {
		jQuery("#spanstrMensajeid").text(lista_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(lista_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_producto").text(lista_producto_control.strMensajeid_producto);		
		jQuery("#spanstrMensajecodigo_producto").text(lista_producto_control.strMensajecodigo_producto);		
		jQuery("#spanstrMensajedescripcion_producto").text(lista_producto_control.strMensajedescripcion_producto);		
		jQuery("#spanstrMensajeprecio1").text(lista_producto_control.strMensajeprecio1);		
		jQuery("#spanstrMensajeprecio2").text(lista_producto_control.strMensajeprecio2);		
		jQuery("#spanstrMensajeprecio3").text(lista_producto_control.strMensajeprecio3);		
		jQuery("#spanstrMensajeprecio4").text(lista_producto_control.strMensajeprecio4);		
		jQuery("#spanstrMensajecosto").text(lista_producto_control.strMensajecosto);		
		jQuery("#spanstrMensajeid_unidad_compra").text(lista_producto_control.strMensajeid_unidad_compra);		
		jQuery("#spanstrMensajeunidad_en_compra").text(lista_producto_control.strMensajeunidad_en_compra);		
		jQuery("#spanstrMensajeequivalencia_en_compra").text(lista_producto_control.strMensajeequivalencia_en_compra);		
		jQuery("#spanstrMensajeid_unidad_venta").text(lista_producto_control.strMensajeid_unidad_venta);		
		jQuery("#spanstrMensajeunidad_en_venta").text(lista_producto_control.strMensajeunidad_en_venta);		
		jQuery("#spanstrMensajeequivalencia_en_venta").text(lista_producto_control.strMensajeequivalencia_en_venta);		
		jQuery("#spanstrMensajecantidad_total").text(lista_producto_control.strMensajecantidad_total);		
		jQuery("#spanstrMensajecantidad_minima").text(lista_producto_control.strMensajecantidad_minima);		
		jQuery("#spanstrMensajeid_categoria_producto").text(lista_producto_control.strMensajeid_categoria_producto);		
		jQuery("#spanstrMensajeid_sub_categoria_producto").text(lista_producto_control.strMensajeid_sub_categoria_producto);		
		jQuery("#spanstrMensajeacepta_lote").text(lista_producto_control.strMensajeacepta_lote);		
		jQuery("#spanstrMensajevalor_inventario").text(lista_producto_control.strMensajevalor_inventario);		
		jQuery("#spanstrMensajeimagen").text(lista_producto_control.strMensajeimagen);		
		jQuery("#spanstrMensajeincremento1").text(lista_producto_control.strMensajeincremento1);		
		jQuery("#spanstrMensajeincremento2").text(lista_producto_control.strMensajeincremento2);		
		jQuery("#spanstrMensajeincremento3").text(lista_producto_control.strMensajeincremento3);		
		jQuery("#spanstrMensajeincremento4").text(lista_producto_control.strMensajeincremento4);		
		jQuery("#spanstrMensajecodigo_fabricante").text(lista_producto_control.strMensajecodigo_fabricante);		
		jQuery("#spanstrMensajeproducto_fisico").text(lista_producto_control.strMensajeproducto_fisico);		
		jQuery("#spanstrMensajesituacion_producto").text(lista_producto_control.strMensajesituacion_producto);		
		jQuery("#spanstrMensajeid_tipo_producto").text(lista_producto_control.strMensajeid_tipo_producto);		
		jQuery("#spanstrMensajetipo_producto_codigo").text(lista_producto_control.strMensajetipo_producto_codigo);		
		jQuery("#spanstrMensajeid_bodega").text(lista_producto_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajemostrar_componente").text(lista_producto_control.strMensajemostrar_componente);		
		jQuery("#spanstrMensajefactura_sin_stock").text(lista_producto_control.strMensajefactura_sin_stock);		
		jQuery("#spanstrMensajeavisa_expiracion").text(lista_producto_control.strMensajeavisa_expiracion);		
		jQuery("#spanstrMensajefactura_con_precio").text(lista_producto_control.strMensajefactura_con_precio);		
		jQuery("#spanstrMensajeproducto_equivalente").text(lista_producto_control.strMensajeproducto_equivalente);		
		jQuery("#spanstrMensajeid_cuenta_compra").text(lista_producto_control.strMensajeid_cuenta_compra);		
		jQuery("#spanstrMensajeid_cuenta_venta").text(lista_producto_control.strMensajeid_cuenta_venta);		
		jQuery("#spanstrMensajeid_cuenta_inventario").text(lista_producto_control.strMensajeid_cuenta_inventario);		
		jQuery("#spanstrMensajecuenta_compra_codigo").text(lista_producto_control.strMensajecuenta_compra_codigo);		
		jQuery("#spanstrMensajecuenta_venta_codigo").text(lista_producto_control.strMensajecuenta_venta_codigo);		
		jQuery("#spanstrMensajecuenta_inventario_codigo").text(lista_producto_control.strMensajecuenta_inventario_codigo);		
		jQuery("#spanstrMensajeid_otro_suplidor").text(lista_producto_control.strMensajeid_otro_suplidor);		
		jQuery("#spanstrMensajeid_impuesto").text(lista_producto_control.strMensajeid_impuesto);		
		jQuery("#spanstrMensajeid_impuesto_ventas").text(lista_producto_control.strMensajeid_impuesto_ventas);		
		jQuery("#spanstrMensajeid_impuesto_compras").text(lista_producto_control.strMensajeid_impuesto_compras);		
		jQuery("#spanstrMensajeimpuesto1_en_ventas").text(lista_producto_control.strMensajeimpuesto1_en_ventas);		
		jQuery("#spanstrMensajeimpuesto1_en_compras").text(lista_producto_control.strMensajeimpuesto1_en_compras);		
		jQuery("#spanstrMensajeultima_venta").text(lista_producto_control.strMensajeultima_venta);		
		jQuery("#spanstrMensajeid_otro_impuesto").text(lista_producto_control.strMensajeid_otro_impuesto);		
		jQuery("#spanstrMensajeid_otro_impuesto_ventas").text(lista_producto_control.strMensajeid_otro_impuesto_ventas);		
		jQuery("#spanstrMensajeid_otro_impuesto_compras").text(lista_producto_control.strMensajeid_otro_impuesto_compras);		
		jQuery("#spanstrMensajeotro_impuesto_ventas_codigo").text(lista_producto_control.strMensajeotro_impuesto_ventas_codigo);		
		jQuery("#spanstrMensajeotro_impuesto_compras_codigo").text(lista_producto_control.strMensajeotro_impuesto_compras_codigo);		
		jQuery("#spanstrMensajeprecio_de_compra_0").text(lista_producto_control.strMensajeprecio_de_compra_0);		
		jQuery("#spanstrMensajeprecio_actualizado").text(lista_producto_control.strMensajeprecio_actualizado);		
		jQuery("#spanstrMensajerequiere_nro_serie").text(lista_producto_control.strMensajerequiere_nro_serie);		
		jQuery("#spanstrMensajecosto_dolar").text(lista_producto_control.strMensajecosto_dolar);		
		jQuery("#spanstrMensajecomentario").text(lista_producto_control.strMensajecomentario);		
		jQuery("#spanstrMensajecomenta_factura").text(lista_producto_control.strMensajecomenta_factura);		
		jQuery("#spanstrMensajeid_retencion").text(lista_producto_control.strMensajeid_retencion);		
		jQuery("#spanstrMensajeid_retencion_ventas").text(lista_producto_control.strMensajeid_retencion_ventas);		
		jQuery("#spanstrMensajeid_retencion_compras").text(lista_producto_control.strMensajeid_retencion_compras);		
		jQuery("#spanstrMensajeretencion_ventas_codigo").text(lista_producto_control.strMensajeretencion_ventas_codigo);		
		jQuery("#spanstrMensajeretencion_compras_codigo").text(lista_producto_control.strMensajeretencion_compras_codigo);		
		jQuery("#spanstrMensajenotas").text(lista_producto_control.strMensajenotas);		
	}
	
	actualizarCssBotonesMantenimiento(lista_producto_control) {
		jQuery("#tdbtnNuevolista_producto").css("visibility",lista_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevolista_producto").css("display",lista_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarlista_producto").css("visibility",lista_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarlista_producto").css("display",lista_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarlista_producto").css("visibility",lista_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarlista_producto").css("display",lista_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarlista_producto").css("visibility",lista_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioslista_producto").css("visibility",lista_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioslista_producto").css("display",lista_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarlista_producto").css("visibility",lista_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarlista_producto").css("visibility",lista_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarlista_producto").css("visibility",lista_producto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproductosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto",lista_producto_control.productosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_2",lista_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",lista_producto_control.productosFK);

	};

	cargarCombosunidad_comprasFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra",lista_producto_control.unidad_comprasFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_10",lista_producto_control.unidad_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra",lista_producto_control.unidad_comprasFK);

	};

	cargarCombosunidad_ventasFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta",lista_producto_control.unidad_ventasFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_13",lista_producto_control.unidad_ventasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta",lista_producto_control.unidad_ventasFK);

	};

	cargarComboscategoria_productosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto",lista_producto_control.categoria_productosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_18",lista_producto_control.categoria_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto",lista_producto_control.categoria_productosFK);

	};

	cargarCombossub_categoria_productosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto",lista_producto_control.sub_categoria_productosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_19",lista_producto_control.sub_categoria_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto",lista_producto_control.sub_categoria_productosFK);

	};

	cargarCombostipo_productosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto",lista_producto_control.tipo_productosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_30",lista_producto_control.tipo_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto",lista_producto_control.tipo_productosFK);

	};

	cargarCombosbodegasFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega",lista_producto_control.bodegasFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_32",lista_producto_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",lista_producto_control.bodegasFK);

	};

	cargarComboscuenta_comprasFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra",lista_producto_control.cuenta_comprasFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_38",lista_producto_control.cuenta_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra",lista_producto_control.cuenta_comprasFK);

	};

	cargarComboscuenta_ventasFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta",lista_producto_control.cuenta_ventasFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_39",lista_producto_control.cuenta_ventasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta",lista_producto_control.cuenta_ventasFK);

	};

	cargarComboscuenta_inventariosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario",lista_producto_control.cuenta_inventariosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_40",lista_producto_control.cuenta_inventariosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_inventario",lista_producto_control.cuenta_inventariosFK);

	};

	cargarCombosotro_suplidorsFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor",lista_producto_control.otro_suplidorsFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_44",lista_producto_control.otro_suplidorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor",lista_producto_control.otro_suplidorsFK);

	};

	cargarCombosimpuestosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto",lista_producto_control.impuestosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_45",lista_producto_control.impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto",lista_producto_control.impuestosFK);

	};

	cargarCombosimpuesto_ventassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas",lista_producto_control.impuesto_ventassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_46",lista_producto_control.impuesto_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_ventas-cmbid_impuesto_ventas",lista_producto_control.impuesto_ventassFK);

	};

	cargarCombosimpuesto_comprassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras",lista_producto_control.impuesto_comprassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_47",lista_producto_control.impuesto_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_compras-cmbid_impuesto_compras",lista_producto_control.impuesto_comprassFK);

	};

	cargarCombosotro_impuestosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto",lista_producto_control.otro_impuestosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_51",lista_producto_control.otro_impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto",lista_producto_control.otro_impuestosFK);

	};

	cargarCombosotro_impuesto_ventassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas",lista_producto_control.otro_impuesto_ventassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_52",lista_producto_control.otro_impuesto_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_ventas-cmbid_otro_impuesto_ventas",lista_producto_control.otro_impuesto_ventassFK);

	};

	cargarCombosotro_impuesto_comprassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras",lista_producto_control.otro_impuesto_comprassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_53",lista_producto_control.otro_impuesto_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_compras-cmbid_otro_impuesto_compras",lista_producto_control.otro_impuesto_comprassFK);

	};

	cargarCombosretencionsFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion",lista_producto_control.retencionsFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_62",lista_producto_control.retencionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion",lista_producto_control.retencionsFK);

	};

	cargarCombosretencion_ventassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas",lista_producto_control.retencion_ventassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_63",lista_producto_control.retencion_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_ventas-cmbid_retencion_ventas",lista_producto_control.retencion_ventassFK);

	};

	cargarCombosretencion_comprassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras",lista_producto_control.retencion_comprassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_64",lista_producto_control.retencion_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_compras-cmbid_retencion_compras",lista_producto_control.retencion_comprassFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosunidad_comprasFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosunidad_ventasFK(lista_producto_control) {

	};

	registrarComboActionChangeComboscategoria_productosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombossub_categoria_productosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombostipo_productosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosbodegasFK(lista_producto_control) {

	};

	registrarComboActionChangeComboscuenta_comprasFK(lista_producto_control) {

	};

	registrarComboActionChangeComboscuenta_ventasFK(lista_producto_control) {

	};

	registrarComboActionChangeComboscuenta_inventariosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosotro_suplidorsFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosimpuestosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosimpuesto_ventassFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosimpuesto_comprassFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosotro_impuestosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosotro_impuesto_ventassFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosotro_impuesto_comprassFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosretencionsFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosretencion_ventassFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosretencion_comprassFK(lista_producto_control) {

	};

	
	
	setDefectoValorCombosproductosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto").val() != lista_producto_control.idproductoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto").val(lista_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(lista_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidad_comprasFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idunidad_compraDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra").val() != lista_producto_control.idunidad_compraDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra").val(lista_producto_control.idunidad_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val(lista_producto_control.idunidad_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidad_ventasFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idunidad_ventaDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta").val() != lista_producto_control.idunidad_ventaDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta").val(lista_producto_control.idunidad_ventaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val(lista_producto_control.idunidad_ventaDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_productosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idcategoria_productoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != lista_producto_control.idcategoria_productoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(lista_producto_control.idcategoria_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(lista_producto_control.idcategoria_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombossub_categoria_productosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idsub_categoria_productoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val() != lista_producto_control.idsub_categoria_productoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val(lista_producto_control.idsub_categoria_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val(lista_producto_control.idsub_categoria_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_productosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idtipo_productoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto").val() != lista_producto_control.idtipo_productoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto").val(lista_producto_control.idtipo_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val(lista_producto_control.idtipo_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idbodegaDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega").val() != lista_producto_control.idbodegaDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega").val(lista_producto_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(lista_producto_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprasFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idcuenta_compraDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val() != lista_producto_control.idcuenta_compraDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val(lista_producto_control.idcuenta_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val(lista_producto_control.idcuenta_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventasFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idcuenta_ventaDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val() != lista_producto_control.idcuenta_ventaDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val(lista_producto_control.idcuenta_ventaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val(lista_producto_control.idcuenta_ventaDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_inventariosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idcuenta_inventarioDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario").val() != lista_producto_control.idcuenta_inventarioDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario").val(lista_producto_control.idcuenta_inventarioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_inventario").val(lista_producto_control.idcuenta_inventarioDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_inventario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_inventario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_suplidorsFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idotro_suplidorDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor").val() != lista_producto_control.idotro_suplidorDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor").val(lista_producto_control.idotro_suplidorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val(lista_producto_control.idotro_suplidorDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuestosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idimpuestoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto").val() != lista_producto_control.idimpuestoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto").val(lista_producto_control.idimpuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(lista_producto_control.idimpuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuesto_ventassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idimpuesto_ventasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas").val() != lista_producto_control.idimpuesto_ventasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas").val(lista_producto_control.idimpuesto_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_ventas-cmbid_impuesto_ventas").val(lista_producto_control.idimpuesto_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_ventas-cmbid_impuesto_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_ventas-cmbid_impuesto_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuesto_comprassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idimpuesto_comprasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras").val() != lista_producto_control.idimpuesto_comprasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras").val(lista_producto_control.idimpuesto_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_compras-cmbid_impuesto_compras").val(lista_producto_control.idimpuesto_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_compras-cmbid_impuesto_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_compras-cmbid_impuesto_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuestosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idotro_impuestoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != lista_producto_control.idotro_impuestoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val(lista_producto_control.idotro_impuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(lista_producto_control.idotro_impuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuesto_ventassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idotro_impuesto_ventasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas").val() != lista_producto_control.idotro_impuesto_ventasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas").val(lista_producto_control.idotro_impuesto_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_ventas-cmbid_otro_impuesto_ventas").val(lista_producto_control.idotro_impuesto_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_ventas-cmbid_otro_impuesto_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_ventas-cmbid_otro_impuesto_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuesto_comprassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idotro_impuesto_comprasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras").val() != lista_producto_control.idotro_impuesto_comprasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras").val(lista_producto_control.idotro_impuesto_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_compras-cmbid_otro_impuesto_compras").val(lista_producto_control.idotro_impuesto_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_compras-cmbid_otro_impuesto_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_compras-cmbid_otro_impuesto_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencionsFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idretencionDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion").val() != lista_producto_control.idretencionDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion").val(lista_producto_control.idretencionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(lista_producto_control.idretencionDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_ventassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idretencion_ventasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas").val() != lista_producto_control.idretencion_ventasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas").val(lista_producto_control.idretencion_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_ventas-cmbid_retencion_ventas").val(lista_producto_control.idretencion_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_ventas-cmbid_retencion_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_ventas-cmbid_retencion_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_comprassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idretencion_comprasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras").val() != lista_producto_control.idretencion_comprasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras").val(lista_producto_control.idretencion_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_compras-cmbid_retencion_compras").val(lista_producto_control.idretencion_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_compras-cmbid_retencion_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_compras-cmbid_retencion_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




















	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//lista_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(lista_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosproductosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosunidad_comprasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosunidad_ventasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorComboscategoria_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombossub_categoria_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombostipo_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosbodegasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorComboscuenta_comprasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorComboscuenta_ventasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_inventario",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorComboscuenta_inventariosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosotro_suplidorsFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosimpuestosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosimpuesto_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosimpuesto_comprassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosotro_impuestosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosotro_impuesto_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosotro_impuesto_comprassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosretencionsFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosretencion_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosretencion_comprassFK(lista_producto_control);
			}

			
			//CODIGO PARA TOMAR PRIMER VALOR
			/*
			var strPrimerValor='0';
			jQuery("#ParamsBuscar-cmbPaginacion").each(function() {
				//console.log(jQuery(this).val());
				//console.log(jQuery(this).text());
				strPrimerValor=jQuery(this).val();
				return false;
			});
			
			alert(strPrimerValor);
			*/
		}
	}
	
	//VERIFICAR: Creo no se necesita Controller
	onLoadCombosEventosFK(lista_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosunidad_comprasFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosunidad_ventasFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeComboscategoria_productosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombossub_categoria_productosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombostipo_productosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosbodegasFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeComboscuenta_comprasFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeComboscuenta_ventasFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_inventario",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeComboscuenta_inventariosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosotro_suplidorsFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosimpuestosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosimpuesto_ventassFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosimpuesto_comprassFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosotro_impuestosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosotro_impuesto_ventassFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosotro_impuesto_comprassFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosretencionsFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ventas",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosretencion_ventassFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_compras",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosretencion_comprassFK(lista_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(lista_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(lista_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				lista_producto_funcion1.validarFormularioJQuery(lista_producto_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("lista_producto");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("lista_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(lista_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,"lista_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad_compra","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaunidad("id_unidad_compra");
				//alert(jQuery('#form-id_unidad_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad_venta","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaunidad("id_unidad_venta");
				//alert(jQuery('#form-id_unidad_venta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_producto","id_categoria_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParacategoria_producto("id_categoria_producto");
				//alert(jQuery('#form-id_categoria_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sub_categoria_producto","id_sub_categoria_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParasub_categoria_producto("id_sub_categoria_producto");
				//alert(jQuery('#form-id_sub_categoria_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_producto","id_tipo_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParatipo_producto("id_tipo_producto");
				//alert(jQuery('#form-id_tipo_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compra","contabilidad","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compra");
				//alert(jQuery('#form-id_cuenta_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_venta","contabilidad","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_venta");
				//alert(jQuery('#form-id_cuenta_venta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_inventario","contabilidad","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_inventario");
				//alert(jQuery('#form-id_cuenta_inventario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_suplidor","id_otro_suplidor","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaotro_suplidor("id_otro_suplidor");
				//alert(jQuery('#form-id_otro_suplidor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto");
				//alert(jQuery('#form-id_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto_ventas","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto_ventas");
				//alert(jQuery('#form-id_impuesto_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto_compras","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto_compras");
				//alert(jQuery('#form-id_impuesto_compras_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto");
				//alert(jQuery('#form-id_otro_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto_ventas","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto_ventas");
				//alert(jQuery('#form-id_otro_impuesto_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto_compras","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto_compras");
				//alert(jQuery('#form-id_otro_impuesto_compras_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaPararetencion("id_retencion");
				//alert(jQuery('#form-id_retencion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion_ventas","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaPararetencion("id_retencion_ventas");
				//alert(jQuery('#form-id_retencion_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion_compras","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaPararetencion("id_retencion_compras");
				//alert(jQuery('#form-id_retencion_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(lista_producto_control) {
		
		
		
		if(lista_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdlista_productoActualizarToolBar").css("display",lista_producto_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdlista_productoEliminarToolBar").css("display",lista_producto_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trlista_productoElementos").css("display",lista_producto_control.strVisibleTablaElementos);
		
		jQuery("#trlista_productoAcciones").css("display",lista_producto_control.strVisibleTablaAcciones);
		jQuery("#trlista_productoParametrosAcciones").css("display",lista_producto_control.strVisibleTablaAcciones);
		
		jQuery("#tdlista_productoCerrarPagina").css("display",lista_producto_control.strPermisoPopup);		
		jQuery("#tdlista_productoCerrarPaginaToolBar").css("display",lista_producto_control.strPermisoPopup);
		//jQuery("#trlista_productoAccionesRelaciones").css("display",lista_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=lista_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + lista_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Lista Productoses";
		sTituloBanner+=" - " + lista_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdlista_productoRelacionesToolBar").css("display",lista_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoslista_producto").css("display",lista_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		lista_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		lista_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		lista_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		lista_producto_webcontrol1.registrarEventosControles();
		
		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(lista_producto_constante1.STR_ES_RELACIONADO=="false") {
			lista_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(lista_producto_constante1.STR_ES_RELACIONES=="true") {
			if(lista_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				lista_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(lista_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(lista_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(lista_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(lista_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
						//lista_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(lista_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(lista_producto_constante1.BIG_ID_ACTUAL,"lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
						//lista_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			lista_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);	
	}
}

var lista_producto_webcontrol1 = new lista_producto_webcontrol();

export {lista_producto_webcontrol,lista_producto_webcontrol1};

//Para ser llamado desde window.opener
window.lista_producto_webcontrol1 = lista_producto_webcontrol1;


if(lista_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = lista_producto_webcontrol1.onLoadWindow; 
}

//</script>