//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';
import {inventario_fisico_constante,inventario_fisico_constante1} from '../util/inventario_fisico_constante.js';


class inventario_fisico_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/
/*---------- Clic-Buscar ----------*/
	buscarOnClick() { 
		this.procesarInicioBusqueda(); 
	}
	
	buscarOnComplete() { 
		this.procesarFinalizacionBusqueda(); 
	}
	
	buscarFksOnClick() { 
		super.procesarInicioProceso(inventario_fisico_constante1); 
	}
	
	
/*---------- Clic-Buscar-Auxiliar ----------*/
	procesarInicioBusqueda() { 
		funcionGeneral.procesarInicioBusquedaPrincipal(inventario_fisico_constante1.STR_RELATIVE_PATH,"inventario_fisico"); 
	}
	
	procesarFinalizacionBusqueda() { 
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(inventario_fisico_constante1.STR_RELATIVE_PATH,inventario_fisico_constante1.STR_NOMBRE_OPCION,"inventario_fisico"); 
	}
/*---------- Clic-Siguiente ----------*/
	siguientesOnClick() { 
		this.procesarInicioBusqueda(); 
	}
	
	siguientesOnComplete() { 
		this.procesarFinalizacionBusqueda(); 
	}
/*----------- Clic-Anteriores ---------*/
	anterioresOnClick() { 
		this.procesarInicioBusqueda(); 
	}
	
	anterioresOnComplete() { 
		this.procesarFinalizacionBusqueda(); 
	}
/*---------- Clic-Seleccionar ----------*/
	seleccionarOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"inventario_fisico");		
		super.procesarInicioProceso(inventario_fisico_constante1);
	}
	
	seleccionarOnComplete() { 
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico"); 
	}
	
	
	seleccionarMostrarDivAccionesRelacionesActualOnClick() { 
		super.procesarInicioProceso(inventario_fisico_constante1); 
	}
	
	seleccionarMostrarDivAccionesRelacionesActualOnComplete() { 
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("inventario_fisico",this,inventario_fisico_constante1); 
	}
/*---------- Clic-Reporte ----------------*/
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
		funcionGeneral.generarReporteFinalizacion(inventario_fisico_constante1.STR_RELATIVE_PATH,inventario_fisico_constante1.STR_NOMBRE_OPCION); 
	}
/*---------- Clic-Generar-Html -----------*/
	generarHtmlReporteOnClick() { 
		super.procesarInicioProceso(inventario_fisico_constante1); 
	}
	
	generarHtmlReporteOnComplete() { 
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico"); 
	}
/*------------- Clic-Actualizar -------------	*/
	editarTablaDatosOnClick() { 
		super.procesarInicioProceso(inventario_fisico_constante1); 
	}
	
	editarTablaDatosOnComplete() { 
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico"); 
	}
/*------------- Clic-Eliminar --------------*/
	eliminarTablaOnClick() {
		/*super.resaltarRestaurarDivMantenimiento(true,"inventario_fisico");*/
		super.procesarInicioProceso(inventario_fisico_constante1);
	}
	
	eliminarTablaOnComplete() { 
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico"); 
	}
/*------------ Clic-Guardar-Cambios --------------*/
	guardarCambiosOnClick() { 
		super.procesarInicioProceso(inventario_fisico_constante1); 
	}
	
	guardarCambiosOnComplete() { 
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico"); 
	}
/*------------ Clic-Duplicar --------------------*/
	duplicarOnClick() { 
		super.procesarInicioProceso(inventario_fisico_constante1); 
	}
	
	duplicarOnComplete() { 
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico"); 
	}
/*-------------- Clic-Copiar -------------------*/
	copiarOnClick() { 
		super.procesarInicioProceso(inventario_fisico_constante1); 
	}
	
	copiarOnComplete() { 
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico"); 
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
/*------------- Tabla-Validacion -------------------*/
	registrarControlesTableValidacionEdition(inventario_fisico_control,inventario_fisico_webcontrol1,inventario_fisico_constante1) {
		
		var strSuf=inventario_fisico_constante1.STR_SUFIJO;
		
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
		
		funcionGeneralJQuery.addValidacionesFuncionesGenerales();
		
		if(maxima_fila!=null && maxima_fila > 0) {
			for (var i = 1; i <= maxima_fila; i++) { 
				/*		
				control_name="t-cel_"+i+"_8";							
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });							
				alert(jQuery("#"+control_name).val());
				*/
				
				//ADD CONTROLES FECHA-HORA
				

				control_name="t"+strSuf+"-cel_"+i+"_5";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_3";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_4";
					jQuery("#"+control_name).select2();
				}

				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:200';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:100';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(inventario_fisico_control.idinventario_fisicoDefaultForeignKey!=null && inventario_fisico_control.idinventario_fisicoDefaultForeignKey>-1) {
					idActual=inventario_fisico_control.idinventario_fisicoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					inventario_fisico_webcontrol1.cargarComboEditarTablainventario_fisicoFK(inventario_fisico_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						inventario_fisico_webcontrol1.cargarComboEditarTablainventario_fisicoFK(inventario_fisico_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_4";
				idActual=jQuery("#"+control_name).val();

				if(inventario_fisico_control.idbodegaDefaultForeignKey!=null && inventario_fisico_control.idbodegaDefaultForeignKey>-1) {
					idActual=inventario_fisico_control.idbodegaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					inventario_fisico_webcontrol1.cargarComboEditarTablabodegaFK(inventario_fisico_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						inventario_fisico_webcontrol1.cargarComboEditarTablabodegaFK(inventario_fisico_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosinventario_fisico").validate(json_rules);
		
		//VALIDACION	
	}
	
/*---------- Clic-Nuevo --------------*/
	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"inventario_fisico");		
		super.procesarInicioProceso(inventario_fisico_constante1);
	}
	
	nuevoPrepararOnComplete() { 
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico"); 
	}
	
	nuevoTablaPrepararOnClick() { 
		super.procesarInicioProceso(inventario_fisico_constante1); 
	}
	
	nuevoTablaPrepararOnComplete() { 
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico"); 
	}
	




		
/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/	
	
/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(inventario_fisico_constante1.STR_RELATIVE_PATH,"inventario_fisico"); 
	}
	
	eliminarOnComplete() {
	
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico");
	}	
/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		super.procesarInicioProceso(inventario_fisico_constante1); 
	}
	
	procesarOnComplete() {		
		super.procesarFinalizacionProceso(inventario_fisico_constante1,"inventario_fisico"); 
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		super.procesarFinalizacionProcesoAbrirLink(inventario_fisico_constante1,"inventario_fisico"); 
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"inventario_fisico"); 
	}
	
	procesarInicioProcesoSimple() { 
		super.procesarInicioProcesoSimple(inventario_fisico_constante1); 
	}
	
	procesarFinalizacionProcesoSimple() { 
		super.procesarFinalizacionProcesoSimple(inventario_fisico_constante1,"inventario_fisico");	
	}	
/*------------- Formulario-Combo-Accion -------------------*/
	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="Id") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Created At") {
				jQuery(".col_created_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Updated At") {
				jQuery(".col_updated_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Inventario Fisico") {
				jQuery(".col_id_inventario_fisico").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_inventario_fisico_img').trigger("click" );
				} else {
					jQuery('#form-id_inventario_fisico_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna==" Bodega") {
				jQuery(".col_id_bodega").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_bodega_img').trigger("click" );
				} else {
					jQuery('#form-id_bodega_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Fecha") {
				jQuery(".col_fecha").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Id Almacen") {
				jQuery(".col_id_almacen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Prod Cont Almacen") {
				jQuery(".col_prod_cont_almacen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Total Productos Almacen") {
				jQuery(".col_total_productos_almacen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Campo1") {
				jQuery(".col_campo1").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Campo2") {
				jQuery(".col_campo2").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Campo3") {
				jQuery(".col_campo3").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,inventario_fisico_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="inventario_fisico_detalle" || strValueTipoRelacion=="Inventario Fisico Detalle") {
			inventario_fisico_webcontrol1.registrarSesionParainventario_fisico_detalles(idActual);
		}
		else if(strValueTipoRelacion=="inventario_fisico" || strValueTipoRelacion=="Inventario Fisico") {
			inventario_fisico_webcontrol1.registrarSesionParainventario_fisicos(idActual);
		}
	}
	
		
	
	
	/*
		Buscar: buscarOnClick,buscarOnComplete,buscarFksOnClick
		Buscar: procesarInicioBusqueda,procesarFinalizacionBusqueda
		Siguientes: siguientesOnClick,siguientesOnComplete
		Anteriores: anterioresOnClick,anterioresOnComplete
		Seleccionar: seleccionarOnClick,seleccionarOnComplete
		Seleccionar: seleccionarMostrarDivAccionesRelacionesActualOnClick
		Seleccionar: seleccionarMostrarDivAccionesRelacionesActualOnComplete
		Reporte: generarReporteOnClick,generarReporteOnComplete,generarReporteInicio
		Reporte: generarHtmlReporteOnClick,generarHtmlReporteOnComplete
		Editar-Tabla: editarTablaDatosOnClick,editarTablaDatosOnComplete
		Eliminar-Tabla: eliminarTablaOnClick,eliminarTablaOnComplete
		Guardar-Cambios: guardarCambiosOnClick,guardarCambiosOnComplete
		Duplicar: duplicarOnClick,duplicarOnComplete,copiarOnClick,copiarOnComplete
		Tabla-Validacion: registrarControlesTableValidacionEdition
		Nuevo-Preparar: nuevoPrepararOnClick,nuevoPrepararOnComplete,nuevoTablaPrepararOnClick
		Eliminar: eliminarOnClick,eliminarOnComplete
		Procesar: procesarOnClick,procesarOnComplete,procesarFinalizacionProcesoAbrirLink
		Procesar: procesarInicioProcesoSimple,procesarFinalizacionProcesoSimple
		Relaciones: setTipoColumnaAccion,setTipoRelacionAccion
	*/
	
}

var inventario_fisico_funcion1=new inventario_fisico_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {inventario_fisico_funcion,inventario_fisico_funcion1};

/*Para ser llamado desde window.opener*/
window.inventario_fisico_funcion1 = inventario_fisico_funcion1;



//</script>
