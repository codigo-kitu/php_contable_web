//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../../../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_precio_constante,tipo_precio_constante1} from '../../../util/tipo_precio_constante.js';
import {tipo_precio_funcion,tipo_precio_funcion1} from '../../../util/form/tipo_precio_form_funcion.js';
import {tipo_precio_form_evento_webcontrol} from '../../../webcontrol/form/tipo_precio_form_evento_webcontrol.js'; /*evento*/
import {tipo_precio_toolbar_webcontrol} from '../../../webcontrol/form/component/tipo_precio_toolbar_webcontrol.js';


class tipo_precio_form_webcontrol extends tipo_precio_toolbar_webcontrol {
	
	constructor() {	
		super();
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	cargarCombosFK(tipo_precio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 
				tipo_precio_webcontrol1.cargarCombosempresasFK(tipo_precio_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_precio_control.strRecargarFkTiposNinguno!=null && tipo_precio_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_precio_control.strRecargarFkTiposNinguno!='') {
			
				if(tipo_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTiposNinguno,",")) { 
					tipo_precio_webcontrol1.cargarCombosempresasFK(tipo_precio_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(tipo_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,tipo_precio_funcion1,tipo_precio_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_precio_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_precio","inventario","","form_tipo_precio",formulario,"","",paraEventoTabla,idFilaTabla,tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(tipo_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa",tipo_precio_control.empresasFK);

		if(tipo_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+tipo_precio_control.idFilaTablaActual+"_3",tipo_precio_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(tipo_precio_control) {

	};

	
	
	setDefectoValorCombosempresasFK(tipo_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(tipo_precio_control.idempresaDefaultFK>-1 && jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val() != tipo_precio_control.idempresaDefaultFK) {
				jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val(tipo_precio_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.getThis().onLoadCombosEventosFK(null);//tipo_precio_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 
				tipo_precio_webcontrol1.setDefectoValorCombosempresasFK(tipo_precio_control);
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
	onLoadCombosEventosFK(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				tipo_precio_webcontrol1.registrarComboActionChangeCombosempresasFK(tipo_precio_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_precio_control) {
		//FORMULARIO
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.getThis().actualizarPaginaFormulario(tipo_precio_control);			
		}
		
		//FORMULARIO ADD
		this.getThis().actualizarPaginaFormularioAdd(tipo_precio_control);
		
		//MENSAJE		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		
		//COMBOS FK
		if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.getThis().actualizarPaginaCargaCombosFK(tipo_precio_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(tipo_precio_control) {
		//FORMULARIO
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.getThis().actualizarPaginaFormulario(tipo_precio_control);			
		}
		
		//FORMULARIO ADD
		this.getThis().actualizarPaginaFormularioAdd(tipo_precio_control);
		
		//MENSAJE		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);	
		
		//COMBOS FK
		if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.getThis().actualizarPaginaCargaCombosFK(tipo_precio_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_precio_control) {
		//FORMULARIO
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.getThis().actualizarPaginaFormulario(tipo_precio_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);	
		//COMBOS FK
		if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.getThis().actualizarPaginaCargaCombosFK(tipo_precio_control);
		}
	}
	
	actualizarPaginaCargaCombosFK(tipo_precio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.getThis().cargarCombosFK(tipo_precio_control);			
	}
	
	actualizarPaginaFormulario(tipo_precio_control) {
	
		this.getThis().actualizarCssBotonesMantenimiento(tipo_precio_control);
				
		if(tipo_precio_control.tipo_precioActual!=null) {//form
			
			this.getThis().actualizarCamposFormulario(tipo_precio_control);			
		}
						
		this.getThis().actualizarSpanMensajesCampos(tipo_precio_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_precio_control) {
	
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id").val(tipo_precio_control.tipo_precioActual.id);
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-created_at").val(tipo_precio_control.tipo_precioActual.versionRow);
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-updated_at").val(tipo_precio_control.tipo_precioActual.versionRow);
		
		if(tipo_precio_control.tipo_precioActual.id_empresa!=null && tipo_precio_control.tipo_precioActual.id_empresa>-1){
			if(jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val() != tipo_precio_control.tipo_precioActual.id_empresa) {
				jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val(tipo_precio_control.tipo_precioActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-codigo").val(tipo_precio_control.tipo_precioActual.codigo);
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-nombre").val(tipo_precio_control.tipo_precioActual.nombre);
	}
	
	actualizarSpanMensajesCampos(tipo_precio_control) {
		jQuery("#spanstrMensajeid").text(tipo_precio_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(tipo_precio_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(tipo_precio_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(tipo_precio_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(tipo_precio_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_precio_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_precio_control) {
		jQuery("#tdbtnNuevotipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_precio").css("display",tipo_precio_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_precio").css("display",tipo_precio_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_precio").css("display",tipo_precio_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_precio").css("display",tipo_precio_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}		
}

export {tipo_precio_form_webcontrol};

//</script>
