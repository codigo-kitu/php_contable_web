//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {accion_constante,accion_constante1} from '../util/accion_constante.js';

class accion_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/


//---------- Clic-Buscar ----------

	buscarOnClick() {
		this.procesarInicioBusqueda();
	}
	
	buscarOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
	buscarFksOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}
	
	

//---------- Clic-Buscar-Auxiliar ----------
	
	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(accion_constante1.STR_RELATIVE_PATH,"accion");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(accion_constante1.STR_RELATIVE_PATH,accion_constante1.STR_NOMBRE_OPCION,"accion");		
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
		super.resaltarRestaurarDivMantenimiento(true,"accion");
		
		super.procesarInicioProceso(accion_constante1);
	}
	
	seleccionarOnComplete() {
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
	
	seleccionarMostrarDivAccionesRelacionesActualOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}
		
	seleccionarMostrarDivAccionesRelacionesActualOnComplete() {
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("accion",this,accion_constante1);
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
		funcionGeneral.generarReporteFinalizacion(accion_constante1.STR_RELATIVE_PATH,accion_constante1.STR_NOMBRE_OPCION);
	}
	
//---------- Clic-Generar-Html -----------

	generarHtmlReporteOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}		
	
	generarHtmlReporteOnComplete() {
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}

//------------- Clic-Actualizar -------------
	
	editarTablaDatosOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}		
	
	editarTablaDatosOnComplete() {
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}

//------------- Clic-Eliminar --------------

	eliminarTablaOnClick() {
		//super.resaltarRestaurarDivMantenimiento(true,"accion");		
		super.procesarInicioProceso(accion_constante1);
	}
		
	eliminarTablaOnComplete() {
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
//------------ Clic-Guardar-Cambios --------------

	guardarCambiosOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}		
	
	guardarCambiosOnComplete() {
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
//------------ Clic-Duplicar --------------------

	duplicarOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}
	
	duplicarOnComplete() {
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
//-------------- Clic-Copiar -------------------

	copiarOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}
	
	copiarOnComplete() {
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}

	/*---------------------------------- AREA:TABLA ---------------------------*/

//------------- Tabla-Validacion -------------------

	registrarControlesTableValidacionEdition(accion_control,accion_webcontrol1,accion_constante1) {
		
		var strSuf=accion_constante1.STR_SUFIJO;
		
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
					strRules=strRules+'\r\nmaxlength:50';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:150';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:250';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(accion_control.idopcionDefaultForeignKey!=null && accion_control.idopcionDefaultForeignKey>-1) {
					idActual=accion_control.idopcionDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					accion_webcontrol1.cargarComboEditarTablaopcionFK(accion_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						accion_webcontrol1.cargarComboEditarTablaopcionFK(accion_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosaccion").validate(json_rules);
		
		//VALIDACION	
	}
	
	//---------- Clic-Nuevo --------------

	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"accion");
		
		super.procesarInicioProceso(accion_constante1);
	}		
		
	nuevoPrepararOnComplete() {		
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
	nuevoTablaPrepararOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}
	
	nuevoTablaPrepararOnComplete() {		
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	






	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(accion_constante1.STR_RELATIVE_PATH,"accion");		
	}
	
	eliminarOnComplete() {
		
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(accion_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(accion_constante1,"accion");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(accion_constante1,"accion");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"accion");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(accion_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(accion_constante1,"accion");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="A") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="A") {
				jQuery(".col_version_row").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Opcion") {
				jQuery(".col_id_opcion").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_opcion_img').trigger("click" );
				} else {
					jQuery('#form-id_opcion_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Estado") {
				jQuery(".col_estado").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,accion_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="perfil_accion" || strValueTipoRelacion=="Perfil Accion") {
			accion_webcontrol1.registrarSesionParaperfil_acciones(idActual);
		}
	}
	
	
	
}

var accion_funcion1=new accion_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {accion_funcion,accion_funcion1};

//Para ser llamado desde window.opener
window.accion_funcion1 = accion_funcion1;



//</script>
