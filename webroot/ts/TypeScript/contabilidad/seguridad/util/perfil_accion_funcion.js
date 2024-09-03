//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_accion_constante,perfil_accion_constante1} from '../util/perfil_accion_constante.js';

class perfil_accion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/


//---------- Clic-Buscar ----------

	buscarOnClick() {
		this.procesarInicioBusqueda();
	}
	
	buscarOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
	buscarFksOnClick() {
		super.procesarInicioProceso(perfil_accion_constante1);
	}
	
	buscarFkperfilperfil_accionsOnComplete() {
	perfil_accionFuncionGeneral.procesarFinalizacionProcesoperfil_accion();
	document.getElementById("trFkperfilBusqueda").style.display="none";
	document.getElementById("trperfilTablaNavegacion").style.display="none";
	document.getElementById("trperfilTablaDatos").style.display="none";
	document.getElementById("trperfilPaginacion").style.display="none";
	document.getElementById("trperfil_accionCabeceraBusquedas").style.display="table-row";
	document.getElementById("trperfil_accionBusquedas").style.display="table-row";
	document.getElementById("trRecargarInformacionperfil_accion").style.display="table-row";
	document.getElementById("trperfil_accionTablaDatos").style.display="table-row";
	document.getElementById("trperfil_accionPaginacion").style.display="table-row";
	document.getElementById("trperfil_accionElementosFormulario").style.display="table-row";
}

abrirBusquedaFkperfilperfil_accionsOnClick() {
	document.getElementById("trFkperfilBusqueda").style.display="table-row";
	document.getElementById("trperfilTablaNavegacion").style.display="table-row";
	document.getElementById("trperfilTablaDatos").style.display="table-row";
	document.getElementById("trperfilPaginacion").style.display="table-row";
	document.getElementById("trperfil_accionCabeceraBusquedas").style.display="none";
	document.getElementById("trperfil_accionBusquedas").style.display="none";
	document.getElementById("trRecargarInformacionperfil_accion").style.display="none";
	document.getElementById("trperfil_accionTablaDatos").style.display="none";
	document.getElementById("trperfil_accionPaginacion").style.display="none";
	document.getElementById("trperfil_accionElementosFormulario").style.display="none";
}



//---------- Clic-Buscar-Auxiliar ----------
	
	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(perfil_accion_constante1.STR_RELATIVE_PATH,"perfil_accion");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(perfil_accion_constante1.STR_RELATIVE_PATH,perfil_accion_constante1.STR_NOMBRE_OPCION,"perfil_accion");		
	}	
	
//---------- Clic-Siguiente ----------

	siguientesOnClick() {
		this.procesarInicioBusqueda();
	}
		
	siguientesOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
//----------- Clic-Anteriores ---------

	anterioresOnClick() {
		this.procesarInicioBusqueda();
	}
	
	anterioresOnComplete() {
		this.procesarFinalizacionBusqueda();
	}

//---------- Clic-Seleccionar ----------

	seleccionarOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"perfil_accion");
		
		super.procesarInicioProceso(perfil_accion_constante1);
	}
	
	seleccionarOnComplete() {
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
	
	
//---------- Clic-Reporte ----------------

	generarReporteOnClick() {
		this.generarReporteInicio();
	}
		
	generarReporteOnComplete() {
		this.generarReporteFinalizacion();
	}
	
	generarReporteInicio() {
		funcionGeneral.mostrarOcultarProcesando(true,null);
	}	
	
	generarReporteFinalizacion() {
		funcionGeneral.generarReporteFinalizacion(perfil_accion_constante1.STR_RELATIVE_PATH,perfil_accion_constante1.STR_NOMBRE_OPCION);
	}
	
//---------- Clic-Generar-Html -----------

	generarHtmlReporteOnClick() {
		super.procesarInicioProceso(perfil_accion_constante1);
	}		
	
	generarHtmlReporteOnComplete() {
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}

//------------- Clic-Actualizar -------------
	
	editarTablaDatosOnClick() {
		super.procesarInicioProceso(perfil_accion_constante1);
	}		
	
	editarTablaDatosOnComplete() {
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}

//------------- Clic-Eliminar --------------

	eliminarTablaOnClick() {
		//super.resaltarRestaurarDivMantenimiento(true,"perfil_accion");		
		super.procesarInicioProceso(perfil_accion_constante1);
	}
		
	eliminarTablaOnComplete() {
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
//------------ Clic-Guardar-Cambios --------------

	guardarCambiosOnClick() {
		super.procesarInicioProceso(perfil_accion_constante1);
	}		
	
	guardarCambiosOnComplete() {
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
//------------ Clic-Duplicar --------------------

	duplicarOnClick() {
		super.procesarInicioProceso(perfil_accion_constante1);
	}
	
	duplicarOnComplete() {
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
//-------------- Clic-Copiar -------------------

	copiarOnClick() {
		super.procesarInicioProceso(perfil_accion_constante1);
	}
	
	copiarOnComplete() {
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}

	/*---------------------------------- AREA:TABLA ---------------------------*/

//------------- Tabla-Validacion -------------------

	registrarControlesTableValidacionEdition(perfil_accion_control,perfil_accion_webcontrol1,perfil_accion_constante1) {
		
		var strSuf=perfil_accion_constante1.STR_SUFIJO;
		
		var maxima_fila = jQuery("#t"+strSuf+"-maxima_fila").val();
		var control_name="";
		var control_name_id="";
		var idActual="";
		
		//VALIDACION
		var strRules="";
		var strRulesMessage="";
		var strRulesTotal="";
		
		strRules="{\r\nrules: {";
		strRulesMessage=",messages: {\r\n";
		
		var esPrimerRule=true;
		//VALIDACION
		
		if(maxima_fila!=null && maxima_fila > 0) {
			for (var i = 1; i <= maxima_fila; i++) { 
				/*		
				control_name="t-cel_"+i+"_8";							
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });							
				alert(jQuery("#"+control_name).val());
				*/
				
				//ADD CONTROLES FECHA-HORA
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_2";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_3";
					jQuery("#"+control_name).select2();
				}

				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				
			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(perfil_accion_control.idperfilDefaultForeignKey!=null && perfil_accion_control.idperfilDefaultForeignKey>-1) {
					idActual=perfil_accion_control.idperfilDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					perfil_accion_webcontrol1.cargarComboEditarTablaperfilFK(perfil_accion_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						perfil_accion_webcontrol1.cargarComboEditarTablaperfilFK(perfil_accion_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(perfil_accion_control.idaccionDefaultForeignKey!=null && perfil_accion_control.idaccionDefaultForeignKey>-1) {
					idActual=perfil_accion_control.idaccionDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					perfil_accion_webcontrol1.cargarComboEditarTablaaccionFK(perfil_accion_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						perfil_accion_webcontrol1.cargarComboEditarTablaaccionFK(perfil_accion_control,control_name,idActual,true);
					}
				});
				//FK CHECKBOX EVENTOS FIN
			}					
		}
		
		
		//VALIDACION
		strRules=strRules+'\r\n}\r\n';
		strRulesMessage=strRulesMessage+'\r\n}\r\n}';		
		strRulesTotal=strRules + strRulesMessage;
		
		var json_rules = {};
		
		//alert(strRulesTotal);		
		
		json_rules = eval ('(' + strRulesTotal + ')');				
						
		//alert(json_rules);
		
		jQuery("#frmTablaDatosperfil_accion").validate(json_rules);
		
		//VALIDACION	
	}
	
	//---------- Clic-Nuevo --------------

	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"perfil_accion");
		
		super.procesarInicioProceso(perfil_accion_constante1);
	}		
		
	nuevoPrepararOnComplete() {		
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
	nuevoTablaPrepararOnClick() {
		super.procesarInicioProceso(perfil_accion_constante1);
	}
	
	nuevoTablaPrepararOnComplete() {		
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	






	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(perfil_accion_constante1.STR_RELATIVE_PATH,"perfil_accion");		
	}
	
	eliminarOnComplete() {
		
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(perfil_accion_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(perfil_accion_constante1,"perfil_accion");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(perfil_accion_constante1,"perfil_accion");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"perfil_accion");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(perfil_accion_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(perfil_accion_constante1,"perfil_accion");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,perfil_accion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var perfil_accion_funcion1=new perfil_accion_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {perfil_accion_funcion,perfil_accion_funcion1};

//Para ser llamado desde window.opener
window.perfil_accion_funcion1 = perfil_accion_funcion1;



//</script>
