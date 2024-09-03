//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_usuario_constante,perfil_usuario_constante1} from '../util/perfil_usuario_constante.js';

class perfil_usuario_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/


//---------- Clic-Buscar ----------

	buscarOnClick() {
		this.procesarInicioBusqueda();
	}
	
	buscarOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
	buscarFksOnClick() {
		super.procesarInicioProceso(perfil_usuario_constante1);
	}
	
	buscarFkusuarioperfil_usuariosOnComplete() {
	perfil_usuarioFuncionGeneral.procesarFinalizacionProcesoperfil_usuario();
	document.getElementById("trFkusuarioBusqueda").style.display="none";
	document.getElementById("trusuarioTablaNavegacion").style.display="none";
	document.getElementById("trusuarioTablaDatos").style.display="none";
	document.getElementById("trusuarioPaginacion").style.display="none";
	document.getElementById("trperfil_usuarioCabeceraBusquedas").style.display="table-row";
	document.getElementById("trperfil_usuarioBusquedas").style.display="table-row";
	document.getElementById("trRecargarInformacionperfil_usuario").style.display="table-row";
	document.getElementById("trperfil_usuarioTablaDatos").style.display="table-row";
	document.getElementById("trperfil_usuarioPaginacion").style.display="table-row";
	document.getElementById("trperfil_usuarioElementosFormulario").style.display="table-row";
}

abrirBusquedaFkusuarioperfil_usuariosOnClick() {
	document.getElementById("trFkusuarioBusqueda").style.display="table-row";
	document.getElementById("trusuarioTablaNavegacion").style.display="table-row";
	document.getElementById("trusuarioTablaDatos").style.display="table-row";
	document.getElementById("trusuarioPaginacion").style.display="table-row";
	document.getElementById("trperfil_usuarioCabeceraBusquedas").style.display="none";
	document.getElementById("trperfil_usuarioBusquedas").style.display="none";
	document.getElementById("trRecargarInformacionperfil_usuario").style.display="none";
	document.getElementById("trperfil_usuarioTablaDatos").style.display="none";
	document.getElementById("trperfil_usuarioPaginacion").style.display="none";
	document.getElementById("trperfil_usuarioElementosFormulario").style.display="none";
}



//---------- Clic-Buscar-Auxiliar ----------
	
	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(perfil_usuario_constante1.STR_RELATIVE_PATH,"perfil_usuario");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(perfil_usuario_constante1.STR_RELATIVE_PATH,perfil_usuario_constante1.STR_NOMBRE_OPCION,"perfil_usuario");		
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
		super.resaltarRestaurarDivMantenimiento(true,"perfil_usuario");
		
		super.procesarInicioProceso(perfil_usuario_constante1);
	}
	
	seleccionarOnComplete() {
		super.procesarFinalizacionProceso(perfil_usuario_constante1,"perfil_usuario");
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
		funcionGeneral.generarReporteFinalizacion(perfil_usuario_constante1.STR_RELATIVE_PATH,perfil_usuario_constante1.STR_NOMBRE_OPCION);
	}
	
//---------- Clic-Generar-Html -----------

	generarHtmlReporteOnClick() {
		super.procesarInicioProceso(perfil_usuario_constante1);
	}		
	
	generarHtmlReporteOnComplete() {
		super.procesarFinalizacionProceso(perfil_usuario_constante1,"perfil_usuario");
	}

//------------- Clic-Actualizar -------------
	
	editarTablaDatosOnClick() {
		super.procesarInicioProceso(perfil_usuario_constante1);
	}		
	
	editarTablaDatosOnComplete() {
		super.procesarFinalizacionProceso(perfil_usuario_constante1,"perfil_usuario");
	}

//------------- Clic-Eliminar --------------

	eliminarTablaOnClick() {
		//super.resaltarRestaurarDivMantenimiento(true,"perfil_usuario");		
		super.procesarInicioProceso(perfil_usuario_constante1);
	}
		
	eliminarTablaOnComplete() {
		super.procesarFinalizacionProceso(perfil_usuario_constante1,"perfil_usuario");
	}
	
//------------ Clic-Guardar-Cambios --------------

	guardarCambiosOnClick() {
		super.procesarInicioProceso(perfil_usuario_constante1);
	}		
	
	guardarCambiosOnComplete() {
		super.procesarFinalizacionProceso(perfil_usuario_constante1,"perfil_usuario");
	}
	
//------------ Clic-Duplicar --------------------

	duplicarOnClick() {
		super.procesarInicioProceso(perfil_usuario_constante1);
	}
	
	duplicarOnComplete() {
		super.procesarFinalizacionProceso(perfil_usuario_constante1,"perfil_usuario");
	}
	
//-------------- Clic-Copiar -------------------

	copiarOnClick() {
		super.procesarInicioProceso(perfil_usuario_constante1);
	}
	
	copiarOnComplete() {
		super.procesarFinalizacionProceso(perfil_usuario_constante1,"perfil_usuario");
	}

	/*---------------------------------- AREA:TABLA ---------------------------*/

//------------- Tabla-Validacion -------------------

	registrarControlesTableValidacionEdition(perfil_usuario_control,perfil_usuario_webcontrol1,perfil_usuario_constante1) {
		
		var strSuf=perfil_usuario_constante1.STR_SUFIJO;
		
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

				if(perfil_usuario_control.idperfilDefaultForeignKey!=null && perfil_usuario_control.idperfilDefaultForeignKey>-1) {
					idActual=perfil_usuario_control.idperfilDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					perfil_usuario_webcontrol1.cargarComboEditarTablaperfilFK(perfil_usuario_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						perfil_usuario_webcontrol1.cargarComboEditarTablaperfilFK(perfil_usuario_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(perfil_usuario_control.idusuarioDefaultForeignKey!=null && perfil_usuario_control.idusuarioDefaultForeignKey>-1) {
					idActual=perfil_usuario_control.idusuarioDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					perfil_usuario_webcontrol1.cargarComboEditarTablausuarioFK(perfil_usuario_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						perfil_usuario_webcontrol1.cargarComboEditarTablausuarioFK(perfil_usuario_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosperfil_usuario").validate(json_rules);
		
		//VALIDACION	
	}
	
	//---------- Clic-Nuevo --------------

	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"perfil_usuario");
		
		super.procesarInicioProceso(perfil_usuario_constante1);
	}		
		
	nuevoPrepararOnComplete() {		
		super.procesarFinalizacionProceso(perfil_usuario_constante1,"perfil_usuario");
	}
	
	nuevoTablaPrepararOnClick() {
		super.procesarInicioProceso(perfil_usuario_constante1);
	}
	
	nuevoTablaPrepararOnComplete() {		
		super.procesarFinalizacionProceso(perfil_usuario_constante1,"perfil_usuario");
	}
	






	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(perfil_usuario_constante1.STR_RELATIVE_PATH,"perfil_usuario");		
	}
	
	eliminarOnComplete() {
		
		super.procesarFinalizacionProceso(perfil_usuario_constante1,"perfil_usuario");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(perfil_usuario_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(perfil_usuario_constante1,"perfil_usuario");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(perfil_usuario_constante1,"perfil_usuario");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"perfil_usuario");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(perfil_usuario_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(perfil_usuario_constante1,"perfil_usuario");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,perfil_usuario_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var perfil_usuario_funcion1=new perfil_usuario_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {perfil_usuario_funcion,perfil_usuario_funcion1};

//Para ser llamado desde window.opener
window.perfil_usuario_funcion1 = perfil_usuario_funcion1;



//</script>
