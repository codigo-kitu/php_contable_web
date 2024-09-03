//<script type="text/javascript" language="javascript">



//var productoJQueryPaginaWebInteraccion= function (producto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {producto_constante,producto_constante1} from '../util/producto_constante.js';

import {producto_funcion,producto_funcion1} from '../util/producto_form_funcion.js';


class producto_webcontrol extends GeneralEntityWebControl {
	
	producto_control=null;
	producto_controlInicial=null;
	producto_controlAuxiliar=null;
		
	//if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(producto_control) {
		super();
		
		this.producto_control=producto_control;
	}
		
	actualizarVariablesPagina(producto_control) {
		
		if(producto_control.action=="index" || producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(producto_control);
			
		} 
		
		
		
	
		else if(producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(producto_control);	
		
		} else if(producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(producto_control);		
		}
	
		else if(producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(producto_control);		
		}
	
		else if(producto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(producto_control);
		}
		
		
		else if(producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(producto_control);
		
		} else if(producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(producto_control);
		
		} else if(producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(producto_control);
		
		} else if(producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(producto_control);
		
		} else if(producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(producto_control);
		
		} else if(producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(producto_control);		
		
		} else if(producto_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(producto_control);		
		
		} 
		//else if(producto_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(producto_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(producto_control) {
		this.actualizarPaginaAccionesGenerales(producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(producto_control) {
		
		this.actualizarPaginaCargaGeneral(producto_control);
		this.actualizarPaginaOrderBy(producto_control);
		this.actualizarPaginaTablaDatos(producto_control);
		this.actualizarPaginaCargaGeneralControles(producto_control);
		//this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(producto_control);
		this.actualizarPaginaAreaBusquedas(producto_control);
		this.actualizarPaginaCargaCombosFK(producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(producto_control) {
		//this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(producto_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_control);		
		this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_control);		
		this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_control);		
		this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		this.actualizarPaginaAreaMantenimiento(producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(producto_control) {
		this.actualizarPaginaCargaGeneralControles(producto_control);
		this.actualizarPaginaCargaCombosFK(producto_control);
		this.actualizarPaginaFormulario(producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		this.actualizarPaginaAreaMantenimiento(producto_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(producto_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(producto_control) {
		this.actualizarPaginaCargaGeneralControles(producto_control);
		this.actualizarPaginaCargaCombosFK(producto_control);
		this.actualizarPaginaFormulario(producto_control);
		this.onLoadCombosDefectoFK(producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		this.actualizarPaginaAreaMantenimiento(producto_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(producto_control) {
		//FORMULARIO
		if(producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);		
		
		//COMBOS FK
		if(producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(producto_control) {
		//FORMULARIO
		if(producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);	
		
		//COMBOS FK
		if(producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(producto_control) {
		//FORMULARIO
		if(producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_control);	
		//COMBOS FK
		if(producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(producto_control) {
		
		if(producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(producto_control);
		}
		
		if(producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(producto_control) {
		if(producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("productoReturnGeneral",JSON.stringify(producto_control.productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(producto_control) {
		if(producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(producto_control, mostrar) {
		
		if(mostrar==true) {
			producto_funcion1.resaltarRestaurarDivsPagina(false,"producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				producto_funcion1.resaltarRestaurarDivMantenimiento(false,"producto");
			}			
			
			producto_funcion1.mostrarDivMensaje(true,producto_control.strAuxiliarMensaje,producto_control.strAuxiliarCssMensaje);
		
		} else {
			producto_funcion1.mostrarDivMensaje(false,producto_control.strAuxiliarMensaje,producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(producto_control) {
		if(producto_funcion1.esPaginaForm(producto_constante1)==true) {
			window.opener.producto_webcontrol1.actualizarPaginaTablaDatos(producto_control);
		} else {
			this.actualizarPaginaTablaDatos(producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(producto_control) {
		producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(producto_control.strAuxiliarUrlPagina);
				
		producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(producto_control.strAuxiliarTipo,producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(producto_control) {
		producto_funcion1.resaltarRestaurarDivMensaje(true,producto_control.strAuxiliarMensajeAlert,producto_control.strAuxiliarCssMensaje);
			
		if(producto_funcion1.esPaginaForm(producto_constante1)==true) {
			window.opener.producto_funcion1.resaltarRestaurarDivMensaje(true,producto_control.strAuxiliarMensajeAlert,producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(producto_control) {
		this.producto_controlInicial=producto_control;
			
		if(producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(producto_control.strStyleDivArbol,producto_control.strStyleDivContent
																,producto_control.strStyleDivOpcionesBanner,producto_control.strStyleDivExpandirColapsar
																,producto_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(producto_control) {
		this.actualizarCssBotonesPagina(producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(producto_control.tiposReportes,producto_control.tiposReporte
															 	,producto_control.tiposPaginacion,producto_control.tiposAcciones
																,producto_control.tiposColumnasSelect,producto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(producto_control.tiposRelaciones,producto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(producto_control) {
	
		var indexPosition=producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosempresasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosproveedorsFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombostipo_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosimpuestosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosotro_impuestosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarComboscategoria_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombossub_categoria_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega_defecto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosbodega_defectosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosunidad_comprasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosunidad_ventasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarComboscuenta_ventasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarComboscuenta_comprasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_costo",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarComboscuenta_costosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.cargarCombosretencionsFK(producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(producto_control.strRecargarFkTiposNinguno!=null && producto_control.strRecargarFkTiposNinguno!='NINGUNO' && producto_control.strRecargarFkTiposNinguno!='') {
			
				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosempresasFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosproveedorsFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_producto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombostipo_productosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosimpuestosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosotro_impuestosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_producto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarComboscategoria_productosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombossub_categoria_productosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega_defecto",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosbodega_defectosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad_compra",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosunidad_comprasFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad_venta",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosunidad_ventasFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_venta",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarComboscuenta_ventasFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compra",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarComboscuenta_comprasFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_costo",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarComboscuenta_costosFK(producto_control);
				}

				if(producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion",producto_control.strRecargarFkTiposNinguno,",")) { 
					producto_webcontrol1.cargarCombosretencionsFK(producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.empresasFK);
	}

	cargarComboEditarTablaproveedorFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.proveedorsFK);
	}

	cargarComboEditarTablatipo_productoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.tipo_productosFK);
	}

	cargarComboEditarTablaimpuestoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.impuestosFK);
	}

	cargarComboEditarTablaotro_impuestoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.otro_impuestosFK);
	}

	cargarComboEditarTablacategoria_productoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.categoria_productosFK);
	}

	cargarComboEditarTablasub_categoria_productoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.sub_categoria_productosFK);
	}

	cargarComboEditarTablabodega_defectoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.bodega_defectosFK);
	}

	cargarComboEditarTablaunidad_compraFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.unidad_comprasFK);
	}

	cargarComboEditarTablaunidad_ventaFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.unidad_ventasFK);
	}

	cargarComboEditarTablacuenta_ventaFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.cuenta_ventasFK);
	}

	cargarComboEditarTablacuenta_compraFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.cuenta_comprasFK);
	}

	cargarComboEditarTablacuenta_costoFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.cuenta_costosFK);
	}

	cargarComboEditarTablaretencionFK(producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_funcion1,producto_control.retencionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(producto_control) {
		jQuery("#tdproductoNuevo").css("display",producto_control.strPermisoNuevo);
		jQuery("#trproductoElementos").css("display",producto_control.strVisibleTablaElementos);
		jQuery("#trproductoAcciones").css("display",producto_control.strVisibleTablaAcciones);
		jQuery("#trproductoParametrosAcciones").css("display",producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(producto_control) {
	
		this.actualizarCssBotonesMantenimiento(producto_control);
				
		if(producto_control.productoActual!=null) {//form
			
			this.actualizarCamposFormulario(producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(producto_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(producto_control) {
	
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-id").val(producto_control.productoActual.id);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-created_at").val(producto_control.productoActual.versionRow);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-updated_at").val(producto_control.productoActual.versionRow);
		
		if(producto_control.productoActual.id_empresa!=null && producto_control.productoActual.id_empresa>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_empresa").val() != producto_control.productoActual.id_empresa) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_empresa").val(producto_control.productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_proveedor!=null && producto_control.productoActual.id_proveedor>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor").val() != producto_control.productoActual.id_proveedor) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor").val(producto_control.productoActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-codigo").val(producto_control.productoActual.codigo);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-nombre").val(producto_control.productoActual.nombre);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-costo").val(producto_control.productoActual.costo);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-activo").prop('checked',producto_control.productoActual.activo);
		
		if(producto_control.productoActual.id_tipo_producto!=null && producto_control.productoActual.id_tipo_producto>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto").val() != producto_control.productoActual.id_tipo_producto) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto").val(producto_control.productoActual.id_tipo_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto").select2("val", null);
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-cantidad_inicial").val(producto_control.productoActual.cantidad_inicial);
		
		if(producto_control.productoActual.id_impuesto!=null && producto_control.productoActual.id_impuesto>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto").val() != producto_control.productoActual.id_impuesto) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto").val(producto_control.productoActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto").select2("val", null);
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_otro_impuesto!=null && producto_control.productoActual.id_otro_impuesto>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != producto_control.productoActual.id_otro_impuesto) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val(producto_control.productoActual.id_otro_impuesto).trigger("change");
			}
		} else { 
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-impuesto_ventas").prop('checked',producto_control.productoActual.impuesto_ventas);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-otro_impuesto_ventas").prop('checked',producto_control.productoActual.otro_impuesto_ventas);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-impuesto_compras").prop('checked',producto_control.productoActual.impuesto_compras);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-otro_impuesto_compras").prop('checked',producto_control.productoActual.otro_impuesto_compras);
		
		if(producto_control.productoActual.id_categoria_producto!=null && producto_control.productoActual.id_categoria_producto>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != producto_control.productoActual.id_categoria_producto) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(producto_control.productoActual.id_categoria_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto").select2("val", null);
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_sub_categoria_producto!=null && producto_control.productoActual.id_sub_categoria_producto>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val() != producto_control.productoActual.id_sub_categoria_producto) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val(producto_control.productoActual.id_sub_categoria_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").select2("val", null);
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_bodega_defecto!=null && producto_control.productoActual.id_bodega_defecto>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto").val() != producto_control.productoActual.id_bodega_defecto) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto").val(producto_control.productoActual.id_bodega_defecto).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto").select2("val", null);
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_unidad_compra!=null && producto_control.productoActual.id_unidad_compra>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra").val() != producto_control.productoActual.id_unidad_compra) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra").val(producto_control.productoActual.id_unidad_compra).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra").select2("val", null);
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-equivalencia_compra").val(producto_control.productoActual.equivalencia_compra);
		
		if(producto_control.productoActual.id_unidad_venta!=null && producto_control.productoActual.id_unidad_venta>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta").val() != producto_control.productoActual.id_unidad_venta) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta").val(producto_control.productoActual.id_unidad_venta).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta").select2("val", null);
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-equivalencia_venta").val(producto_control.productoActual.equivalencia_venta);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-descripcion").val(producto_control.productoActual.descripcion);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-imagen").val(producto_control.productoActual.imagen);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-observacion").val(producto_control.productoActual.observacion);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-comenta_factura").prop('checked',producto_control.productoActual.comenta_factura);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-codigo_fabricante").val(producto_control.productoActual.codigo_fabricante);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-cantidad").val(producto_control.productoActual.cantidad);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-cantidad_minima").val(producto_control.productoActual.cantidad_minima);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-cantidad_maxima").val(producto_control.productoActual.cantidad_maxima);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-factura_sin_stock").prop('checked',producto_control.productoActual.factura_sin_stock);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-mostrar_componente").prop('checked',producto_control.productoActual.mostrar_componente);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-producto_equivalente").prop('checked',producto_control.productoActual.producto_equivalente);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-avisa_expiracion").prop('checked',producto_control.productoActual.avisa_expiracion);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-requiere_serie").prop('checked',producto_control.productoActual.requiere_serie);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-acepta_lote").prop('checked',producto_control.productoActual.acepta_lote);
		
		if(producto_control.productoActual.id_cuenta_venta!=null && producto_control.productoActual.id_cuenta_venta>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val() != producto_control.productoActual.id_cuenta_venta) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val(producto_control.productoActual.id_cuenta_venta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_cuenta_compra!=null && producto_control.productoActual.id_cuenta_compra>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val() != producto_control.productoActual.id_cuenta_compra) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val(producto_control.productoActual.id_cuenta_compra).trigger("change");
			}
		} else { 
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_control.productoActual.id_cuenta_costo!=null && producto_control.productoActual.id_cuenta_costo>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo").val() != producto_control.productoActual.id_cuenta_costo) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo").val(producto_control.productoActual.id_cuenta_costo).trigger("change");
			}
		} else { 
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-valor_inventario").val(producto_control.productoActual.valor_inventario);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-producto_fisico").val(producto_control.productoActual.producto_fisico);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-ultima_venta").val(producto_control.productoActual.ultima_venta);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-precio_actualizado").val(producto_control.productoActual.precio_actualizado);
		
		if(producto_control.productoActual.id_retencion!=null && producto_control.productoActual.id_retencion>-1){
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_retencion").val() != producto_control.productoActual.id_retencion) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_retencion").val(producto_control.productoActual.id_retencion).trigger("change");
			}
		} else { 
			if(jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_retencion").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-retencion_ventas").prop('checked',producto_control.productoActual.retencion_ventas);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-retencion_compras").prop('checked',producto_control.productoActual.retencion_compras);
		jQuery("#form"+producto_constante1.STR_SUFIJO+"-factura_con_precio").val(producto_control.productoActual.factura_con_precio);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("producto","inventario","","form_producto",formulario,"","",paraEventoTabla,idFilaTabla,producto_funcion1,producto_webcontrol1,producto_constante1);
	}
	
	actualizarSpanMensajesCampos(producto_control) {
		jQuery("#spanstrMensajeid").text(producto_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(producto_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(producto_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(producto_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_proveedor").text(producto_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajecodigo").text(producto_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(producto_control.strMensajenombre);		
		jQuery("#spanstrMensajecosto").text(producto_control.strMensajecosto);		
		jQuery("#spanstrMensajeactivo").text(producto_control.strMensajeactivo);		
		jQuery("#spanstrMensajeid_tipo_producto").text(producto_control.strMensajeid_tipo_producto);		
		jQuery("#spanstrMensajecantidad_inicial").text(producto_control.strMensajecantidad_inicial);		
		jQuery("#spanstrMensajeid_impuesto").text(producto_control.strMensajeid_impuesto);		
		jQuery("#spanstrMensajeid_otro_impuesto").text(producto_control.strMensajeid_otro_impuesto);		
		jQuery("#spanstrMensajeimpuesto_ventas").text(producto_control.strMensajeimpuesto_ventas);		
		jQuery("#spanstrMensajeotro_impuesto_ventas").text(producto_control.strMensajeotro_impuesto_ventas);		
		jQuery("#spanstrMensajeimpuesto_compras").text(producto_control.strMensajeimpuesto_compras);		
		jQuery("#spanstrMensajeotro_impuesto_compras").text(producto_control.strMensajeotro_impuesto_compras);		
		jQuery("#spanstrMensajeid_categoria_producto").text(producto_control.strMensajeid_categoria_producto);		
		jQuery("#spanstrMensajeid_sub_categoria_producto").text(producto_control.strMensajeid_sub_categoria_producto);		
		jQuery("#spanstrMensajeid_bodega_defecto").text(producto_control.strMensajeid_bodega_defecto);		
		jQuery("#spanstrMensajeid_unidad_compra").text(producto_control.strMensajeid_unidad_compra);		
		jQuery("#spanstrMensajeequivalencia_compra").text(producto_control.strMensajeequivalencia_compra);		
		jQuery("#spanstrMensajeid_unidad_venta").text(producto_control.strMensajeid_unidad_venta);		
		jQuery("#spanstrMensajeequivalencia_venta").text(producto_control.strMensajeequivalencia_venta);		
		jQuery("#spanstrMensajedescripcion").text(producto_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeimagen").text(producto_control.strMensajeimagen);		
		jQuery("#spanstrMensajeobservacion").text(producto_control.strMensajeobservacion);		
		jQuery("#spanstrMensajecomenta_factura").text(producto_control.strMensajecomenta_factura);		
		jQuery("#spanstrMensajecodigo_fabricante").text(producto_control.strMensajecodigo_fabricante);		
		jQuery("#spanstrMensajecantidad").text(producto_control.strMensajecantidad);		
		jQuery("#spanstrMensajecantidad_minima").text(producto_control.strMensajecantidad_minima);		
		jQuery("#spanstrMensajecantidad_maxima").text(producto_control.strMensajecantidad_maxima);		
		jQuery("#spanstrMensajefactura_sin_stock").text(producto_control.strMensajefactura_sin_stock);		
		jQuery("#spanstrMensajemostrar_componente").text(producto_control.strMensajemostrar_componente);		
		jQuery("#spanstrMensajeproducto_equivalente").text(producto_control.strMensajeproducto_equivalente);		
		jQuery("#spanstrMensajeavisa_expiracion").text(producto_control.strMensajeavisa_expiracion);		
		jQuery("#spanstrMensajerequiere_serie").text(producto_control.strMensajerequiere_serie);		
		jQuery("#spanstrMensajeacepta_lote").text(producto_control.strMensajeacepta_lote);		
		jQuery("#spanstrMensajeid_cuenta_venta").text(producto_control.strMensajeid_cuenta_venta);		
		jQuery("#spanstrMensajeid_cuenta_compra").text(producto_control.strMensajeid_cuenta_compra);		
		jQuery("#spanstrMensajeid_cuenta_costo").text(producto_control.strMensajeid_cuenta_costo);		
		jQuery("#spanstrMensajevalor_inventario").text(producto_control.strMensajevalor_inventario);		
		jQuery("#spanstrMensajeproducto_fisico").text(producto_control.strMensajeproducto_fisico);		
		jQuery("#spanstrMensajeultima_venta").text(producto_control.strMensajeultima_venta);		
		jQuery("#spanstrMensajeprecio_actualizado").text(producto_control.strMensajeprecio_actualizado);		
		jQuery("#spanstrMensajeid_retencion").text(producto_control.strMensajeid_retencion);		
		jQuery("#spanstrMensajeretencion_ventas").text(producto_control.strMensajeretencion_ventas);		
		jQuery("#spanstrMensajeretencion_compras").text(producto_control.strMensajeretencion_compras);		
		jQuery("#spanstrMensajefactura_con_precio").text(producto_control.strMensajefactura_con_precio);		
	}
	
	actualizarCssBotonesMantenimiento(producto_control) {
		jQuery("#tdbtnNuevoproducto").css("visibility",producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoproducto").css("display",producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarproducto").css("visibility",producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarproducto").css("display",producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarproducto").css("visibility",producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarproducto").css("display",producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarproducto").css("visibility",producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosproducto").css("visibility",producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosproducto").css("display",producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarproducto").css("visibility",producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarproducto").css("visibility",producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarproducto").css("visibility",producto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_empresa",producto_control.empresasFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_3",producto_control.empresasFK);
		}
	};

	cargarCombosproveedorsFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor",producto_control.proveedorsFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_4",producto_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",producto_control.proveedorsFK);

	};

	cargarCombostipo_productosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto",producto_control.tipo_productosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_9",producto_control.tipo_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto",producto_control.tipo_productosFK);

	};

	cargarCombosimpuestosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto",producto_control.impuestosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_11",producto_control.impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto",producto_control.impuestosFK);

	};

	cargarCombosotro_impuestosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto",producto_control.otro_impuestosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_12",producto_control.otro_impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto",producto_control.otro_impuestosFK);

	};

	cargarComboscategoria_productosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto",producto_control.categoria_productosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_17",producto_control.categoria_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto",producto_control.categoria_productosFK);

	};

	cargarCombossub_categoria_productosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto",producto_control.sub_categoria_productosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_18",producto_control.sub_categoria_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto",producto_control.sub_categoria_productosFK);

	};

	cargarCombosbodega_defectosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto",producto_control.bodega_defectosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_19",producto_control.bodega_defectosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega_defecto",producto_control.bodega_defectosFK);

	};

	cargarCombosunidad_comprasFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra",producto_control.unidad_comprasFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_20",producto_control.unidad_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra",producto_control.unidad_comprasFK);

	};

	cargarCombosunidad_ventasFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta",producto_control.unidad_ventasFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_22",producto_control.unidad_ventasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta",producto_control.unidad_ventasFK);

	};

	cargarComboscuenta_ventasFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta",producto_control.cuenta_ventasFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_38",producto_control.cuenta_ventasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta",producto_control.cuenta_ventasFK);

	};

	cargarComboscuenta_comprasFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra",producto_control.cuenta_comprasFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_39",producto_control.cuenta_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra",producto_control.cuenta_comprasFK);

	};

	cargarComboscuenta_costosFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo",producto_control.cuenta_costosFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_40",producto_control.cuenta_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_costo",producto_control.cuenta_costosFK);

	};

	cargarCombosretencionsFK(producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_constante1.STR_SUFIJO+"-id_retencion",producto_control.retencionsFK);

		if(producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_control.idFilaTablaActual+"_45",producto_control.retencionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion",producto_control.retencionsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(producto_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(producto_control) {

	};

	registrarComboActionChangeCombostipo_productosFK(producto_control) {

	};

	registrarComboActionChangeCombosimpuestosFK(producto_control) {

	};

	registrarComboActionChangeCombosotro_impuestosFK(producto_control) {

	};

	registrarComboActionChangeComboscategoria_productosFK(producto_control) {

	};

	registrarComboActionChangeCombossub_categoria_productosFK(producto_control) {

	};

	registrarComboActionChangeCombosbodega_defectosFK(producto_control) {

	};

	registrarComboActionChangeCombosunidad_comprasFK(producto_control) {

	};

	registrarComboActionChangeCombosunidad_ventasFK(producto_control) {

	};

	registrarComboActionChangeComboscuenta_ventasFK(producto_control) {

	};

	registrarComboActionChangeComboscuenta_comprasFK(producto_control) {

	};

	registrarComboActionChangeComboscuenta_costosFK(producto_control) {

	};

	registrarComboActionChangeCombosretencionsFK(producto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idempresaDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_empresa").val() != producto_control.idempresaDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_empresa").val(producto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idproveedorDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor").val() != producto_control.idproveedorDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor").val(producto_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(producto_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_productosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idtipo_productoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto").val() != producto_control.idtipo_productoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto").val(producto_control.idtipo_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val(producto_control.idtipo_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuestosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idimpuestoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto").val() != producto_control.idimpuestoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto").val(producto_control.idimpuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(producto_control.idimpuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuestosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idotro_impuestoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != producto_control.idotro_impuestoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val(producto_control.idotro_impuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(producto_control.idotro_impuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_productosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idcategoria_productoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != producto_control.idcategoria_productoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(producto_control.idcategoria_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(producto_control.idcategoria_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombossub_categoria_productosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idsub_categoria_productoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val() != producto_control.idsub_categoria_productoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val(producto_control.idsub_categoria_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val(producto_control.idsub_categoria_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodega_defectosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idbodega_defectoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto").val() != producto_control.idbodega_defectoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto").val(producto_control.idbodega_defectoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega_defecto").val(producto_control.idbodega_defectoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega_defecto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega_defecto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidad_comprasFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idunidad_compraDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra").val() != producto_control.idunidad_compraDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra").val(producto_control.idunidad_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val(producto_control.idunidad_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidad_ventasFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idunidad_ventaDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta").val() != producto_control.idunidad_ventaDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta").val(producto_control.idunidad_ventaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val(producto_control.idunidad_ventaDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventasFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idcuenta_ventaDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val() != producto_control.idcuenta_ventaDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val(producto_control.idcuenta_ventaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val(producto_control.idcuenta_ventaDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprasFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idcuenta_compraDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val() != producto_control.idcuenta_compraDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val(producto_control.idcuenta_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val(producto_control.idcuenta_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_costosFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idcuenta_costoDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo").val() != producto_control.idcuenta_costoDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo").val(producto_control.idcuenta_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_costo").val(producto_control.idcuenta_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencionsFK(producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_control.idretencionDefaultFK>-1 && jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_retencion").val() != producto_control.idretencionDefaultFK) {
				jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_retencion").val(producto_control.idretencionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(producto_control.idretencionDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//producto_control
		
	
	}
	
	onLoadCombosDefectoFK(producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosempresasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosproveedorsFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombostipo_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosimpuestosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosotro_impuestosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorComboscategoria_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombossub_categoria_productosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega_defecto",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosbodega_defectosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosunidad_comprasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosunidad_ventasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorComboscuenta_ventasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorComboscuenta_comprasFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_costo",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorComboscuenta_costosFK(producto_control);
			}

			if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",producto_control.strRecargarFkTipos,",")) { 
				producto_webcontrol1.setDefectoValorCombosretencionsFK(producto_control);
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
	onLoadCombosEventosFK(producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosempresasFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosproveedorsFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombostipo_productosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosimpuestosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosotro_impuestosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeComboscategoria_productosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombossub_categoria_productosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega_defecto",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosbodega_defectosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosunidad_comprasFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosunidad_ventasFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeComboscuenta_ventasFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeComboscuenta_comprasFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_costo",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeComboscuenta_costosFK(producto_control);
			//}

			//if(producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_webcontrol1.registrarComboActionChangeCombosretencionsFK(producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("producto","inventario","",producto_funcion1,producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(producto_constante1.BIT_ES_PAGINA_FORM==true) {
				producto_funcion1.validarFormularioJQuery(producto_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("producto");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("producto","inventario","",producto_funcion1,producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(producto_funcion1,producto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(producto_funcion1,producto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("producto","inventario","",producto_funcion1,producto_webcontrol1,"producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_producto","id_tipo_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_tipo_producto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParatipo_producto("id_tipo_producto");
				//alert(jQuery('#form-id_tipo_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto","facturacion","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_impuesto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto");
				//alert(jQuery('#form-id_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto","facturacion","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_otro_impuesto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto");
				//alert(jQuery('#form-id_otro_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_producto","id_categoria_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_categoria_producto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParacategoria_producto("id_categoria_producto");
				//alert(jQuery('#form-id_categoria_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sub_categoria_producto","id_sub_categoria_producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParasub_categoria_producto("id_sub_categoria_producto");
				//alert(jQuery('#form-id_sub_categoria_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega_defecto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_bodega_defecto_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParabodega("id_bodega_defecto");
				//alert(jQuery('#form-id_bodega_defecto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad_compra","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_compra_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaunidad("id_unidad_compra");
				//alert(jQuery('#form-id_unidad_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad_venta","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_unidad_venta_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParaunidad("id_unidad_venta");
				//alert(jQuery('#form-id_unidad_venta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_venta","contabilidad","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_venta_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_venta");
				//alert(jQuery('#form-id_cuenta_venta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compra","contabilidad","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_compra_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compra");
				//alert(jQuery('#form-id_cuenta_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_costo","contabilidad","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_cuenta_costo_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_costo");
				//alert(jQuery('#form-id_cuenta_costo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion","facturacion","",producto_funcion1,producto_webcontrol1,producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_constante1.STR_SUFIJO+"-id_retencion_img_busqueda").click(function(){
				producto_webcontrol1.abrirBusquedaPararetencion("id_retencion");
				//alert(jQuery('#form-id_retencion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("producto","inventario","",producto_funcion1,producto_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("producto");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(producto_control) {
		
		
		
		if(producto_control.strPermisoActualizar!=null) {
			jQuery("#tdproductoActualizarToolBar").css("display",producto_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdproductoEliminarToolBar").css("display",producto_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trproductoElementos").css("display",producto_control.strVisibleTablaElementos);
		
		jQuery("#trproductoAcciones").css("display",producto_control.strVisibleTablaAcciones);
		jQuery("#trproductoParametrosAcciones").css("display",producto_control.strVisibleTablaAcciones);
		
		jQuery("#tdproductoCerrarPagina").css("display",producto_control.strPermisoPopup);		
		jQuery("#tdproductoCerrarPaginaToolBar").css("display",producto_control.strPermisoPopup);
		//jQuery("#trproductoAccionesRelaciones").css("display",producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Productos";
		sTituloBanner+=" - " + producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdproductoRelacionesToolBar").css("display",producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosproducto").css("display",producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("producto","inventario","",producto_funcion1,producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		producto_webcontrol1.registrarEventosControles();
		
		if(producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(producto_constante1.STR_ES_RELACIONADO=="false") {
			producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(producto_constante1.STR_ES_RELACIONES=="true") {
			if(producto_constante1.BIT_ES_PAGINA_FORM==true) {
				producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
						//producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(producto_constante1.BIG_ID_ACTUAL,"producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);
						//producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("producto","inventario","",producto_funcion1,producto_webcontrol1,producto_constante1);	
	}
	
	/*
		Variables-Pagina: actualizarVariablesPagina
		Variables-Pagina:actualizarVariablesPagina(AccionIndex,AccionCancelar,AccionMostrarEjecutar,AccionesGenerales)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevo,AccionActualizar,AccionEliminar,AccionSeleccionar)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevoPreparar,AccionRecargarFomulario,AccionManejarEventos)
		Pagina: actualizarPagina(AccionesGenerales,GuardarReturnSession,MensajePantallaAuxiliar,MensajePantalla)
		Pagina: actualizarPagina(TablaDatos,AbrirLink,MensajeAlert,CargaGeneral,CargaGeneralControles)
		Pagina: actualizarPagina(CargaCombosFK,UsuarioInvitado)
		Pagina: actualizarPagina(AreaMantenimiento,Formulario)
		Combos-Fk: cargarCombosFK,cargarComboEditarTablaempresaFK,cargarComboEditarTablasucursalFK
		Combos-Fk: cargarCombosempresasFK,cargarCombossucursalsFK
		Combos-Fk: setDefectoValorCombosempresasFK,setDefectoValorCombossucursalsFK
		Combos-Fk: onLoadCombosEventosFK,onLoadCombosDefectoPaginaGeneralControles
		Campos-Recargar: actualizarCamposFormulario,recargarFormularioGeneral
		SpanMensajes-CssBotones: actualizarSpanMensajesCampos,actualizarCssBotonesMantenimiento
		Eventos-CombosFk: onLoadRecargarRelacionado,registrarEventosControles,onLoadCombosDefectoFK
		AccioesEventos-CssBotones: registrarAccionesEventos,actualizarCssBotonesPagina
		PropiedadesPagina-FuncionesPagina: registrarPropiedadesPagina, registrarFuncionesPagina
		Load-Unload-Pagina: onLoad, onUnLoadWindow, onLoadWindow
		Eventos-OnLoad: registrarEventosOnLoadGlobal
	*/
}

var producto_webcontrol1 = new producto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {producto_webcontrol,producto_webcontrol1};

//Para ser llamado desde window.opener
window.producto_webcontrol1 = producto_webcontrol1;


if(producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = producto_webcontrol1.onLoadWindow; 
}

//</script>