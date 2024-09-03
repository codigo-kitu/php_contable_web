//<script type="text/javascript" language="javascript">



//var clienteJQueryPaginaWebInteraccion= function (cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cliente_constante,cliente_constante1} from '../util/cliente_constante.js';

import {cliente_funcion,cliente_funcion1} from '../util/cliente_form_funcion.js';


class cliente_webcontrol extends GeneralEntityWebControl {
	
	cliente_control=null;
	cliente_controlInicial=null;
	cliente_controlAuxiliar=null;
		
	//if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cliente_control) {
		super();
		
		this.cliente_control=cliente_control;
	}
		
	actualizarVariablesPagina(cliente_control) {
		
		if(cliente_control.action=="index" || cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cliente_control);
			
		} 
		
		
		
	
		else if(cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cliente_control);	
		
		} else if(cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cliente_control);		
		}
	
		else if(cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cliente_control);		
		}
	
		else if(cliente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cliente_control);
		}
		
		
		else if(cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cliente_control);
		
		} else if(cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cliente_control);
		
		} else if(cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cliente_control);
		
		} else if(cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cliente_control);
		
		} else if(cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cliente_control);
		
		} else if(cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cliente_control);		
		
		} else if(cliente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cliente_control);		
		
		} 
		//else if(cliente_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cliente_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cliente_control) {
		this.actualizarPaginaAccionesGenerales(cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cliente_control) {
		
		this.actualizarPaginaCargaGeneral(cliente_control);
		this.actualizarPaginaOrderBy(cliente_control);
		this.actualizarPaginaTablaDatos(cliente_control);
		this.actualizarPaginaCargaGeneralControles(cliente_control);
		//this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cliente_control);
		this.actualizarPaginaAreaBusquedas(cliente_control);
		this.actualizarPaginaCargaCombosFK(cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cliente_control) {
		//this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cliente_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cliente_control);		
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cliente_control);		
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cliente_control);		
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cliente_control) {
		this.actualizarPaginaCargaGeneralControles(cliente_control);
		this.actualizarPaginaCargaCombosFK(cliente_control);
		this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cliente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cliente_control) {
		this.actualizarPaginaCargaGeneralControles(cliente_control);
		this.actualizarPaginaCargaCombosFK(cliente_control);
		this.actualizarPaginaFormulario(cliente_control);
		this.onLoadCombosDefectoFK(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cliente_control) {
		//FORMULARIO
		if(cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		
		//COMBOS FK
		if(cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cliente_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cliente_control) {
		//FORMULARIO
		if(cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);	
		
		//COMBOS FK
		if(cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cliente_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cliente_control) {
		//FORMULARIO
		if(cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);	
		//COMBOS FK
		if(cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cliente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cliente_control) {
		
		if(cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cliente_control);
		}
		
		if(cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cliente_control) {
		if(cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("clienteReturnGeneral",JSON.stringify(cliente_control.clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cliente_control) {
		if(cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cliente_control, mostrar) {
		
		if(mostrar==true) {
			cliente_funcion1.resaltarRestaurarDivsPagina(false,"cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"cliente");
			}			
			
			cliente_funcion1.mostrarDivMensaje(true,cliente_control.strAuxiliarMensaje,cliente_control.strAuxiliarCssMensaje);
		
		} else {
			cliente_funcion1.mostrarDivMensaje(false,cliente_control.strAuxiliarMensaje,cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cliente_control) {
		if(cliente_funcion1.esPaginaForm(cliente_constante1)==true) {
			window.opener.cliente_webcontrol1.actualizarPaginaTablaDatos(cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(cliente_control) {
		cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cliente_control.strAuxiliarUrlPagina);
				
		cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cliente_control.strAuxiliarTipo,cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cliente_control) {
		cliente_funcion1.resaltarRestaurarDivMensaje(true,cliente_control.strAuxiliarMensajeAlert,cliente_control.strAuxiliarCssMensaje);
			
		if(cliente_funcion1.esPaginaForm(cliente_constante1)==true) {
			window.opener.cliente_funcion1.resaltarRestaurarDivMensaje(true,cliente_control.strAuxiliarMensajeAlert,cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cliente_control) {
		this.cliente_controlInicial=cliente_control;
			
		if(cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cliente_control.strStyleDivArbol,cliente_control.strStyleDivContent
																,cliente_control.strStyleDivOpcionesBanner,cliente_control.strStyleDivExpandirColapsar
																,cliente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cliente_control) {
		this.actualizarCssBotonesPagina(cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cliente_control.tiposReportes,cliente_control.tiposReporte
															 	,cliente_control.tiposPaginacion,cliente_control.tiposAcciones
																,cliente_control.tiposColumnasSelect,cliente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cliente_control.tiposRelaciones,cliente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cliente_control) {
	
		var indexPosition=cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosempresasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombostipo_personasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarComboscategoria_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombostipo_preciosFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosgiro_negocio_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombospaissFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosprovinciasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosciudadsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosvendedorsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombostermino_pago_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarComboscuentasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosimpuestosFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosretencionsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosretencion_fuentesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosretencion_icasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosotro_impuestosFK(cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cliente_control.strRecargarFkTiposNinguno!=null && cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosempresasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_persona",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombostipo_personasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarComboscategoria_clientesFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombostipo_preciosFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosgiro_negocio_clientesFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombospaissFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosprovinciasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosciudadsFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosvendedorsFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombostermino_pago_clientesFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarComboscuentasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosimpuestosFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosretencionsFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_fuente",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosretencion_fuentesFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_ica",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosretencion_icasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosotro_impuestosFK(cliente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.empresasFK);
	}

	cargarComboEditarTablatipo_personaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.tipo_personasFK);
	}

	cargarComboEditarTablacategoria_clienteFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.categoria_clientesFK);
	}

	cargarComboEditarTablatipo_precioFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.tipo_preciosFK);
	}

	cargarComboEditarTablagiro_negocio_clienteFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.giro_negocio_clientesFK);
	}

	cargarComboEditarTablapaisFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.paissFK);
	}

	cargarComboEditarTablaprovinciaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.provinciasFK);
	}

	cargarComboEditarTablaciudadFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.ciudadsFK);
	}

	cargarComboEditarTablavendedorFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablacuentaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.cuentasFK);
	}

	cargarComboEditarTablaimpuestoFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.impuestosFK);
	}

	cargarComboEditarTablaretencionFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.retencionsFK);
	}

	cargarComboEditarTablaretencion_fuenteFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.retencion_fuentesFK);
	}

	cargarComboEditarTablaretencion_icaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.retencion_icasFK);
	}

	cargarComboEditarTablaotro_impuestoFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.otro_impuestosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cliente_control) {
		jQuery("#tdclienteNuevo").css("display",cliente_control.strPermisoNuevo);
		jQuery("#trclienteElementos").css("display",cliente_control.strVisibleTablaElementos);
		jQuery("#trclienteAcciones").css("display",cliente_control.strVisibleTablaAcciones);
		jQuery("#trclienteParametrosAcciones").css("display",cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(cliente_control);
				
		if(cliente_control.clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(cliente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cliente_control) {
	
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id").val(cliente_control.clienteActual.id);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-version_row").val(cliente_control.clienteActual.versionRow);
		
		if(cliente_control.clienteActual.id_empresa!=null && cliente_control.clienteActual.id_empresa>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val() != cliente_control.clienteActual.id_empresa) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val(cliente_control.clienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_tipo_persona!=null && cliente_control.clienteActual.id_tipo_persona>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona").val() != cliente_control.clienteActual.id_tipo_persona) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona").val(cliente_control.clienteActual.id_tipo_persona).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_categoria_cliente!=null && cliente_control.clienteActual.id_categoria_cliente>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val() != cliente_control.clienteActual.id_categoria_cliente) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val(cliente_control.clienteActual.id_categoria_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_tipo_precio!=null && cliente_control.clienteActual.id_tipo_precio>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val() != cliente_control.clienteActual.id_tipo_precio) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val(cliente_control.clienteActual.id_tipo_precio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_giro_negocio_cliente!=null && cliente_control.clienteActual.id_giro_negocio_cliente>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val() != cliente_control.clienteActual.id_giro_negocio_cliente) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val(cliente_control.clienteActual.id_giro_negocio_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-codigo").val(cliente_control.clienteActual.codigo);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-ruc").val(cliente_control.clienteActual.ruc);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-primer_apellido").val(cliente_control.clienteActual.primer_apellido);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-segundo_apellido").val(cliente_control.clienteActual.segundo_apellido);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-primer_nombre").val(cliente_control.clienteActual.primer_nombre);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-segundo_nombre").val(cliente_control.clienteActual.segundo_nombre);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-nombre_completo").val(cliente_control.clienteActual.nombre_completo);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-direccion").val(cliente_control.clienteActual.direccion);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-telefono").val(cliente_control.clienteActual.telefono);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-telefono_movil").val(cliente_control.clienteActual.telefono_movil);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-e_mail").val(cliente_control.clienteActual.e_mail);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-e_mail2").val(cliente_control.clienteActual.e_mail2);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-comentario").val(cliente_control.clienteActual.comentario);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-imagen").val(cliente_control.clienteActual.imagen);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-activo").prop('checked',cliente_control.clienteActual.activo);
		
		if(cliente_control.clienteActual.id_pais!=null && cliente_control.clienteActual.id_pais>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val() != cliente_control.clienteActual.id_pais) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val(cliente_control.clienteActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_provincia!=null && cliente_control.clienteActual.id_provincia>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val() != cliente_control.clienteActual.id_provincia) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val(cliente_control.clienteActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_ciudad!=null && cliente_control.clienteActual.id_ciudad>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val() != cliente_control.clienteActual.id_ciudad) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val(cliente_control.clienteActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-codigo_postal").val(cliente_control.clienteActual.codigo_postal);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-fax").val(cliente_control.clienteActual.fax);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-contacto").val(cliente_control.clienteActual.contacto);
		
		if(cliente_control.clienteActual.id_vendedor!=null && cliente_control.clienteActual.id_vendedor>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val() != cliente_control.clienteActual.id_vendedor) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val(cliente_control.clienteActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-maximo_credito").val(cliente_control.clienteActual.maximo_credito);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-maximo_descuento").val(cliente_control.clienteActual.maximo_descuento);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-interes_anual").val(cliente_control.clienteActual.interes_anual);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-balance").val(cliente_control.clienteActual.balance);
		
		if(cliente_control.clienteActual.id_termino_pago_cliente!=null && cliente_control.clienteActual.id_termino_pago_cliente>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != cliente_control.clienteActual.id_termino_pago_cliente) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(cliente_control.clienteActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_cuenta!=null && cliente_control.clienteActual.id_cuenta>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != cliente_control.clienteActual.id_cuenta) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val(cliente_control.clienteActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-facturar_con").val(cliente_control.clienteActual.facturar_con);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-aplica_impuesto_ventas").prop('checked',cliente_control.clienteActual.aplica_impuesto_ventas);
		
		if(cliente_control.clienteActual.id_impuesto!=null && cliente_control.clienteActual.id_impuesto>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val() != cliente_control.clienteActual.id_impuesto) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val(cliente_control.clienteActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").select2("val", null);
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-aplica_retencion_impuesto").prop('checked',cliente_control.clienteActual.aplica_retencion_impuesto);
		
		if(cliente_control.clienteActual.id_retencion!=null && cliente_control.clienteActual.id_retencion>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion").val() != cliente_control.clienteActual.id_retencion) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion").val(cliente_control.clienteActual.id_retencion).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-aplica_retencion_fuente").prop('checked',cliente_control.clienteActual.aplica_retencion_fuente);
		
		if(cliente_control.clienteActual.id_retencion_fuente!=null && cliente_control.clienteActual.id_retencion_fuente>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente").val() != cliente_control.clienteActual.id_retencion_fuente) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente").val(cliente_control.clienteActual.id_retencion_fuente).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-aplica_retencion_ica").prop('checked',cliente_control.clienteActual.aplica_retencion_ica);
		
		if(cliente_control.clienteActual.id_retencion_ica!=null && cliente_control.clienteActual.id_retencion_ica>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica").val() != cliente_control.clienteActual.id_retencion_ica) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica").val(cliente_control.clienteActual.id_retencion_ica).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-aplica_2do_impuesto").prop('checked',cliente_control.clienteActual.aplica_2do_impuesto);
		
		if(cliente_control.clienteActual.id_otro_impuesto!=null && cliente_control.clienteActual.id_otro_impuesto>-1){
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != cliente_control.clienteActual.id_otro_impuesto) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto").val(cliente_control.clienteActual.id_otro_impuesto).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-creado").val(cliente_control.clienteActual.creado);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-monto_ultima_transaccion").val(cliente_control.clienteActual.monto_ultima_transaccion);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-fecha_ultima_transaccion").val(cliente_control.clienteActual.fecha_ultima_transaccion);
		jQuery("#form"+cliente_constante1.STR_SUFIJO+"-descripcion_ultima_transaccion").val(cliente_control.clienteActual.descripcion_ultima_transaccion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cliente","cuentascobrar","","form_cliente",formulario,"","",paraEventoTabla,idFilaTabla,cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}
	
	actualizarSpanMensajesCampos(cliente_control) {
		jQuery("#spanstrMensajeid").text(cliente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cliente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cliente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_persona").text(cliente_control.strMensajeid_tipo_persona);		
		jQuery("#spanstrMensajeid_categoria_cliente").text(cliente_control.strMensajeid_categoria_cliente);		
		jQuery("#spanstrMensajeid_tipo_precio").text(cliente_control.strMensajeid_tipo_precio);		
		jQuery("#spanstrMensajeid_giro_negocio_cliente").text(cliente_control.strMensajeid_giro_negocio_cliente);		
		jQuery("#spanstrMensajecodigo").text(cliente_control.strMensajecodigo);		
		jQuery("#spanstrMensajeruc").text(cliente_control.strMensajeruc);		
		jQuery("#spanstrMensajeprimer_apellido").text(cliente_control.strMensajeprimer_apellido);		
		jQuery("#spanstrMensajesegundo_apellido").text(cliente_control.strMensajesegundo_apellido);		
		jQuery("#spanstrMensajeprimer_nombre").text(cliente_control.strMensajeprimer_nombre);		
		jQuery("#spanstrMensajesegundo_nombre").text(cliente_control.strMensajesegundo_nombre);		
		jQuery("#spanstrMensajenombre_completo").text(cliente_control.strMensajenombre_completo);		
		jQuery("#spanstrMensajedireccion").text(cliente_control.strMensajedireccion);		
		jQuery("#spanstrMensajetelefono").text(cliente_control.strMensajetelefono);		
		jQuery("#spanstrMensajetelefono_movil").text(cliente_control.strMensajetelefono_movil);		
		jQuery("#spanstrMensajee_mail").text(cliente_control.strMensajee_mail);		
		jQuery("#spanstrMensajee_mail2").text(cliente_control.strMensajee_mail2);		
		jQuery("#spanstrMensajecomentario").text(cliente_control.strMensajecomentario);		
		jQuery("#spanstrMensajeimagen").text(cliente_control.strMensajeimagen);		
		jQuery("#spanstrMensajeactivo").text(cliente_control.strMensajeactivo);		
		jQuery("#spanstrMensajeid_pais").text(cliente_control.strMensajeid_pais);		
		jQuery("#spanstrMensajeid_provincia").text(cliente_control.strMensajeid_provincia);		
		jQuery("#spanstrMensajeid_ciudad").text(cliente_control.strMensajeid_ciudad);		
		jQuery("#spanstrMensajecodigo_postal").text(cliente_control.strMensajecodigo_postal);		
		jQuery("#spanstrMensajefax").text(cliente_control.strMensajefax);		
		jQuery("#spanstrMensajecontacto").text(cliente_control.strMensajecontacto);		
		jQuery("#spanstrMensajeid_vendedor").text(cliente_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajemaximo_credito").text(cliente_control.strMensajemaximo_credito);		
		jQuery("#spanstrMensajemaximo_descuento").text(cliente_control.strMensajemaximo_descuento);		
		jQuery("#spanstrMensajeinteres_anual").text(cliente_control.strMensajeinteres_anual);		
		jQuery("#spanstrMensajebalance").text(cliente_control.strMensajebalance);		
		jQuery("#spanstrMensajeid_termino_pago_cliente").text(cliente_control.strMensajeid_termino_pago_cliente);		
		jQuery("#spanstrMensajeid_cuenta").text(cliente_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajefacturar_con").text(cliente_control.strMensajefacturar_con);		
		jQuery("#spanstrMensajeaplica_impuesto_ventas").text(cliente_control.strMensajeaplica_impuesto_ventas);		
		jQuery("#spanstrMensajeid_impuesto").text(cliente_control.strMensajeid_impuesto);		
		jQuery("#spanstrMensajeaplica_retencion_impuesto").text(cliente_control.strMensajeaplica_retencion_impuesto);		
		jQuery("#spanstrMensajeid_retencion").text(cliente_control.strMensajeid_retencion);		
		jQuery("#spanstrMensajeaplica_retencion_fuente").text(cliente_control.strMensajeaplica_retencion_fuente);		
		jQuery("#spanstrMensajeid_retencion_fuente").text(cliente_control.strMensajeid_retencion_fuente);		
		jQuery("#spanstrMensajeaplica_retencion_ica").text(cliente_control.strMensajeaplica_retencion_ica);		
		jQuery("#spanstrMensajeid_retencion_ica").text(cliente_control.strMensajeid_retencion_ica);		
		jQuery("#spanstrMensajeaplica_2do_impuesto").text(cliente_control.strMensajeaplica_2do_impuesto);		
		jQuery("#spanstrMensajeid_otro_impuesto").text(cliente_control.strMensajeid_otro_impuesto);		
		jQuery("#spanstrMensajecreado").text(cliente_control.strMensajecreado);		
		jQuery("#spanstrMensajemonto_ultima_transaccion").text(cliente_control.strMensajemonto_ultima_transaccion);		
		jQuery("#spanstrMensajefecha_ultima_transaccion").text(cliente_control.strMensajefecha_ultima_transaccion);		
		jQuery("#spanstrMensajedescripcion_ultima_transaccion").text(cliente_control.strMensajedescripcion_ultima_transaccion);		
	}
	
	actualizarCssBotonesMantenimiento(cliente_control) {
		jQuery("#tdbtnNuevocliente").css("visibility",cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocliente").css("display",cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcliente").css("visibility",cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcliente").css("display",cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcliente").css("visibility",cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcliente").css("display",cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcliente").css("visibility",cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscliente").css("visibility",cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscliente").css("display",cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcliente").css("visibility",cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcliente").css("visibility",cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcliente").css("visibility",cliente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa",cliente_control.empresasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_2",cliente_control.empresasFK);
		}
	};

	cargarCombostipo_personasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona",cliente_control.tipo_personasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_3",cliente_control.tipo_personasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona",cliente_control.tipo_personasFK);

	};

	cargarComboscategoria_clientesFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente",cliente_control.categoria_clientesFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_4",cliente_control.categoria_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente",cliente_control.categoria_clientesFK);

	};

	cargarCombostipo_preciosFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio",cliente_control.tipo_preciosFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_5",cliente_control.tipo_preciosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio",cliente_control.tipo_preciosFK);

	};

	cargarCombosgiro_negocio_clientesFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente",cliente_control.giro_negocio_clientesFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_6",cliente_control.giro_negocio_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente",cliente_control.giro_negocio_clientesFK);

	};

	cargarCombospaissFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_pais",cliente_control.paissFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_22",cliente_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",cliente_control.paissFK);

	};

	cargarCombosprovinciasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia",cliente_control.provinciasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_23",cliente_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",cliente_control.provinciasFK);

	};

	cargarCombosciudadsFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad",cliente_control.ciudadsFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_24",cliente_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",cliente_control.ciudadsFK);

	};

	cargarCombosvendedorsFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor",cliente_control.vendedorsFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_28",cliente_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",cliente_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente",cliente_control.termino_pago_clientesFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_33",cliente_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",cliente_control.termino_pago_clientesFK);

	};

	cargarComboscuentasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta",cliente_control.cuentasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_34",cliente_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",cliente_control.cuentasFK);

	};

	cargarCombosimpuestosFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto",cliente_control.impuestosFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_37",cliente_control.impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto",cliente_control.impuestosFK);

	};

	cargarCombosretencionsFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion",cliente_control.retencionsFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_39",cliente_control.retencionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion",cliente_control.retencionsFK);

	};

	cargarCombosretencion_fuentesFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente",cliente_control.retencion_fuentesFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_41",cliente_control.retencion_fuentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente",cliente_control.retencion_fuentesFK);

	};

	cargarCombosretencion_icasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica",cliente_control.retencion_icasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_43",cliente_control.retencion_icasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica",cliente_control.retencion_icasFK);

	};

	cargarCombosotro_impuestosFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto",cliente_control.otro_impuestosFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_45",cliente_control.otro_impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto",cliente_control.otro_impuestosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cliente_control) {

	};

	registrarComboActionChangeCombostipo_personasFK(cliente_control) {

	};

	registrarComboActionChangeComboscategoria_clientesFK(cliente_control) {

	};

	registrarComboActionChangeCombostipo_preciosFK(cliente_control) {

	};

	registrarComboActionChangeCombosgiro_negocio_clientesFK(cliente_control) {

	};

	registrarComboActionChangeCombospaissFK(cliente_control) {

	};

	registrarComboActionChangeCombosprovinciasFK(cliente_control) {

	};

	registrarComboActionChangeCombosciudadsFK(cliente_control) {

	};

	registrarComboActionChangeCombosvendedorsFK(cliente_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(cliente_control) {

	};

	registrarComboActionChangeComboscuentasFK(cliente_control) {

	};

	registrarComboActionChangeCombosimpuestosFK(cliente_control) {

	};

	registrarComboActionChangeCombosretencionsFK(cliente_control) {

	};

	registrarComboActionChangeCombosretencion_fuentesFK(cliente_control) {

	};

	registrarComboActionChangeCombosretencion_icasFK(cliente_control) {

	};

	registrarComboActionChangeCombosotro_impuestosFK(cliente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idempresaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val() != cliente_control.idempresaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val(cliente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_personasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idtipo_personaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona").val() != cliente_control.idtipo_personaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona").val(cliente_control.idtipo_personaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val(cliente_control.idtipo_personaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_clientesFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idcategoria_clienteDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val() != cliente_control.idcategoria_clienteDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val(cliente_control.idcategoria_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente").val(cliente_control.idcategoria_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_preciosFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idtipo_precioDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val() != cliente_control.idtipo_precioDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val(cliente_control.idtipo_precioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(cliente_control.idtipo_precioDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosgiro_negocio_clientesFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idgiro_negocio_clienteDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val() != cliente_control.idgiro_negocio_clienteDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val(cliente_control.idgiro_negocio_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente").val(cliente_control.idgiro_negocio_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idpaisDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val() != cliente_control.idpaisDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val(cliente_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(cliente_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosprovinciasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idprovinciaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val() != cliente_control.idprovinciaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val(cliente_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(cliente_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idciudadDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val() != cliente_control.idciudadDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val(cliente_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(cliente_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idvendedorDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val() != cliente_control.idvendedorDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val(cliente_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(cliente_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != cliente_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(cliente_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(cliente_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idcuentaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != cliente_control.idcuentaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val(cliente_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(cliente_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuestosFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idimpuestoDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val() != cliente_control.idimpuestoDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val(cliente_control.idimpuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(cliente_control.idimpuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencionsFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idretencionDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion").val() != cliente_control.idretencionDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion").val(cliente_control.idretencionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(cliente_control.idretencionDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_fuentesFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idretencion_fuenteDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente").val() != cliente_control.idretencion_fuenteDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente").val(cliente_control.idretencion_fuenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val(cliente_control.idretencion_fuenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_icasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idretencion_icaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica").val() != cliente_control.idretencion_icaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica").val(cliente_control.idretencion_icaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val(cliente_control.idretencion_icaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuestosFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idotro_impuestoDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != cliente_control.idotro_impuestoDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto").val(cliente_control.idotro_impuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(cliente_control.idotro_impuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosempresasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombostipo_personasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorComboscategoria_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombostipo_preciosFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosgiro_negocio_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombospaissFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosprovinciasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosciudadsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosvendedorsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorComboscuentasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosimpuestosFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosretencionsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosretencion_fuentesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosretencion_icasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosotro_impuestosFK(cliente_control);
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
	onLoadCombosEventosFK(cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosempresasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombostipo_personasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeComboscategoria_clientesFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombostipo_preciosFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosgiro_negocio_clientesFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombospaissFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosprovinciasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosciudadsFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosvendedorsFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeComboscuentasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosimpuestosFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosretencionsFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosretencion_fuentesFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosretencion_icasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosotro_impuestosFK(cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				cliente_funcion1.validarFormularioJQuery(cliente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cliente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cliente_funcion1,cliente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cliente_funcion1,cliente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,"cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_persona","id_tipo_persona","general","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParatipo_persona("id_tipo_persona");
				//alert(jQuery('#form-id_tipo_persona_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_cliente","id_categoria_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParacategoria_cliente("id_categoria_cliente");
				//alert(jQuery('#form-id_categoria_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_precio","id_tipo_precio","inventario","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParatipo_precio("id_tipo_precio");
				//alert(jQuery('#form-id_tipo_precio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("giro_negocio_cliente","id_giro_negocio_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParagiro_negocio_cliente("id_giro_negocio_cliente");
				//alert(jQuery('#form-id_giro_negocio_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto");
				//alert(jQuery('#form-id_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaPararetencion("id_retencion");
				//alert(jQuery('#form-id_retencion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion_fuente","id_retencion_fuente","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaPararetencion_fuente("id_retencion_fuente");
				//alert(jQuery('#form-id_retencion_fuente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion_ica","id_retencion_ica","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaPararetencion_ica("id_retencion_ica");
				//alert(jQuery('#form-id_retencion_ica_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto");
				//alert(jQuery('#form-id_otro_impuesto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cliente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cliente_control) {
		
		
		
		if(cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdclienteActualizarToolBar").css("display",cliente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdclienteEliminarToolBar").css("display",cliente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trclienteElementos").css("display",cliente_control.strVisibleTablaElementos);
		
		jQuery("#trclienteAcciones").css("display",cliente_control.strVisibleTablaAcciones);
		jQuery("#trclienteParametrosAcciones").css("display",cliente_control.strVisibleTablaAcciones);
		
		jQuery("#tdclienteCerrarPagina").css("display",cliente_control.strPermisoPopup);		
		jQuery("#tdclienteCerrarPaginaToolBar").css("display",cliente_control.strPermisoPopup);
		//jQuery("#trclienteAccionesRelaciones").css("display",cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Clientes";
		sTituloBanner+=" - " + cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdclienteRelacionesToolBar").css("display",cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscliente").css("display",cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cliente_webcontrol1.registrarEventosControles();
		
		if(cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cliente_constante1.STR_ES_RELACIONADO=="false") {
			cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cliente_constante1.STR_ES_RELACIONES=="true") {
			if(cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
						//cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cliente_constante1.BIG_ID_ACTUAL,"cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
						//cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);	
	}
}

var cliente_webcontrol1 = new cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cliente_webcontrol,cliente_webcontrol1};

//Para ser llamado desde window.opener
window.cliente_webcontrol1 = cliente_webcontrol1;


if(cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cliente_webcontrol1.onLoadWindow; 
}

//</script>