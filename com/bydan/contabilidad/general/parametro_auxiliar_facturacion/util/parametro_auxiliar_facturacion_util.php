<?php declare(strict_types = 1);
 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/

namespace com\bydan\contabilidad\general\parametro_auxiliar_facturacion\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\business\entity\parametro_auxiliar_facturacion;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


class parametro_auxiliar_facturacion_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='parametro_auxiliar_facturacion';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='general.parametro_auxiliar_facturacions';
	/*'Mantenimientoparametro_auxiliar_facturacion.jsf';*/
	public static string $STR_MODULO_OPCION='general';
	public static string $STR_NOMBRE_CLASE='Mantenimientoparametro_auxiliar_facturacion.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='parametro_auxiliar_facturacionPersistenceName';
	/*.parametro_auxiliar_facturacion_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='parametro_auxiliar_facturacion_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='parametro_auxiliar_facturacion_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='parametro_auxiliar_facturacion_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Parametro AuxiliarNOUSO Facturaciones';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Parametro AuxiliarNOUSO Facturacion';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $GENERAL='general';
	public static string $STR_PREFIJO_TABLE='gen_';
	public static string $STR_TABLE_NAME='parametro_auxiliar_facturacion';
	public static string $PARAMETRO_AUXILIAR_FACTURACION='gen_parametro_auxiliar_facturacion';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.parametro_auxiliar_facturacion';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_tipo_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_creacion_rapida_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_busqueda_producto_fabricante,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_solo_costo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_tipo_factura_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_impuesto_final_boleta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_ticket,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_tipo_factura_ticket,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo_ticket,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_ticket,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_impuesto_final_ticket from '.parametro_auxiliar_facturacion_util::$SCHEMA.'.'.parametro_auxiliar_facturacion_util::$TABLENAME;*/
	
	/*PARAMETROS
	AUDITORIA*/
	public static bool $BIT_CON_AUDITORIA=false;	
	public static bool $BIT_CON_AUDITORIA_DETALLE=true;	
	
	/*WEB PAGINA FORMULARIO*/
	public static bool $CON_PAGINA_FORM=true;		
	
	/*GLOBAL*/
	public static string $ID='id';
	public static string $VERSIONROW='updated_at';
	
	/*AUXILIAR*/
	//public $parametro_auxiliar_facturacionConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $NOMBRE_TIPO_FACTURA='nombre_tipo_factura';
    public static string $SIGUIENTE_NUMERO_CORRELATIVO='siguiente_numero_correlativo';
    public static string $INCREMENTO='incremento';
    public static string $CON_CREACION_RAPIDA_PRODUCTO='con_creacion_rapida_producto';
    public static string $CON_BUSQUEDA_PRODUCTO_FABRICANTE='con_busqueda_producto_fabricante';
    public static string $CON_SOLO_COSTO_PRODUCTO='con_solo_costo_producto';
    public static string $CON_RECIBO='con_recibo';
    public static string $NOMBRE_TIPO_FACTURA_RECIBO='nombre_tipo_factura_recibo';
    public static string $SIGUIENTE_NUMERO_CORRELATIVO_RECIBO='siguiente_numero_correlativo_recibo';
    public static string $INCREMENTO_RECIBO='incremento_recibo';
    public static string $CON_IMPUESTO_FINAL_BOLETA='con_impuesto_final_boleta';
    public static string $CON_TICKET='con_ticket';
    public static string $NOMBRE_TIPO_FACTURA_TICKETS='nombre_tipo_factura_ticket';
    public static string $SIGUIENTE_NUMERO_CORRELATIVO_TICKET='siguiente_numero_correlativo_ticket';
    public static string $INCREMENTO_TICKET='incremento_ticket';
    public static string $CON_IMPUESTO_FINAL_TICKET='con_impuesto_final_ticket';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_NOMBRE_TIPO_FACTURA='Nombre Tipo Factura';
    public static string $LABEL_SIGUIENTE_NUMERO_CORRELATIVO='Siguiente Numero Correlativo';
    public static string $LABEL_INCREMENTO='Incremento';
    public static string $LABEL_CON_CREACION_RAPIDA_PRODUCTO='Con Creacion Rapida Producto';
    public static string $LABEL_CON_BUSQUEDA_PRODUCTO_FABRICANTE='Con Busqueda Producto Fabricante';
    public static string $LABEL_CON_SOLO_COSTO_PRODUCTO='Con Solo Costo Producto';
    public static string $LABEL_CON_RECIBO='Con Recibo';
    public static string $LABEL_NOMBRE_TIPO_FACTURA_RECIBO='Nombre Tipo Factura Recibo';
    public static string $LABEL_SIGUIENTE_NUMERO_CORRELATIVO_RECIBO='Siguiente Numero Correlativo Recibo';
    public static string $LABEL_INCREMENTO_RECIBO='Incremento Recibo';
    public static string $LABEL_CON_IMPUESTO_FINAL_BOLETA='Con Impuesto Final Boleta';
    public static string $LABEL_CON_TICKET='Con Ticket';
    public static string $LABEL_NOMBRE_TIPO_FACTURA_TICKETS='Nombre Tipo Factura Ticket';
    public static string $LABEL_SIGUIENTE_NUMERO_CORRELATIVO_TICKET='Siguiente Numero Correlativo Ticket';
    public static string $LABEL_INCREMENTO_TICKET='Incremento Ticket';
    public static string $LABEL_CON_IMPUESTO_FINAL_TICKET='Con Impuesto Final Ticket';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_auxiliar_facturacionConstantesFuncionesAdditional=new $parametro_auxiliar_facturacionConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $parametro_auxiliar_facturacions,int $iIdNuevoparametro_auxiliar_facturacion) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_auxiliar_facturacions as $parametro_auxiliar_facturacionAux) {
			if($parametro_auxiliar_facturacionAux->getId()==$iIdNuevoparametro_auxiliar_facturacion) {
				$existe=true;
				break;
			}
				
			$iIndice++;
		}

		if(!$existe) {
			/*SI NO EXISTE TOMA LA ULTIMA FILA*/
			$iIndice=$iIndice-1;
		}
		
		return $iIndice;
	}
	
	public static function getIndiceActual(array $parametro_auxiliar_facturacions,parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_auxiliar_facturacions as $parametro_auxiliar_facturacionAux) {
			if($parametro_auxiliar_facturacionAux->getId()==$parametro_auxiliar_facturacion->getId()) {
				$existe=true;
				break;
			}
				
			$iIndice++;
		}		
	
		if(!$existe) {
			/*SI NO EXISTE TOMA LA ULTIMA FILA*/
			$iIndice=$iIndiceActual;
		}
		
		return $iIndice;
	}
	
	/*DESCRIPCION*/
	public static function getparametro_auxiliar_facturacionDescripcion(?parametro_auxiliar_facturacion $parametro_auxiliar_facturacion) : string {//parametro_auxiliar_facturacion NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($parametro_auxiliar_facturacion !=null) {
			/*&& parametro_auxiliar_facturacion->getId()!=0*/
			
			$sDescripcion=$parametro_auxiliar_facturacion->getnombre_tipo_factura();
			
			/*parametro_auxiliar_facturacion;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setparametro_auxiliar_facturacionDescripcion(?parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,string $sValor) {			
		if($parametro_auxiliar_facturacion !=null) {
			$parametro_auxiliar_facturacion->setnombre_tipo_factura($sValor);
			/*parametro_auxiliar_facturacion;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $parametro_auxiliar_facturacions) : array {
		$parametro_auxiliar_facturacionsForeignKey=array();
		
		foreach ($parametro_auxiliar_facturacions as $parametro_auxiliar_facturacionLocal) {
			$parametro_auxiliar_facturacionsForeignKey[$parametro_auxiliar_facturacionLocal->getId()]=parametro_auxiliar_facturacion_util::getparametro_auxiliar_facturacionDescripcion($parametro_auxiliar_facturacionLocal);
		}
			
		return $parametro_auxiliar_facturacionsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelnombre_tipo_factura() : string  { return 'Nombre Tipo Factura'; }
    public static function getColumnLabelsiguiente_numero_correlativo() : string  { return 'Siguiente Numero Correlativo'; }
    public static function getColumnLabelincremento() : string  { return 'Incremento'; }
    public static function getColumnLabelcon_creacion_rapida_producto() : string  { return 'Con Creacion Rapida Producto'; }
    public static function getColumnLabelcon_busqueda_producto_fabricante() : string  { return 'Con Busqueda Producto Fabricante'; }
    public static function getColumnLabelcon_solo_costo_producto() : string  { return 'Con Solo Costo Producto'; }
    public static function getColumnLabelcon_recibo() : string  { return 'Con Recibo'; }
    public static function getColumnLabelnombre_tipo_factura_recibo() : string  { return 'Nombre Tipo Factura Recibo'; }
    public static function getColumnLabelsiguiente_numero_correlativo_recibo() : string  { return 'Siguiente Numero Correlativo Recibo'; }
    public static function getColumnLabelincremento_recibo() : string  { return 'Incremento Recibo'; }
    public static function getColumnLabelcon_impuesto_final_boleta() : string  { return 'Con Impuesto Final Boleta'; }
    public static function getColumnLabelcon_ticket() : string  { return 'Con Ticket'; }
    public static function getColumnLabelnombre_tipo_factura_tickets() : string  { return 'Nombre Tipo Factura Ticket'; }
    public static function getColumnLabelsiguiente_numero_correlativo_ticket() : string  { return 'Siguiente Numero Correlativo Ticket'; }
    public static function getColumnLabelincremento_ticket() : string  { return 'Incremento Ticket'; }
    public static function getColumnLabelcon_impuesto_final_ticket() : string  { return 'Con Impuesto Final Ticket'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getcon_creacion_rapida_productoDescripcion($parametro_auxiliar_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar_facturacion->getcon_creacion_rapida_producto()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_busqueda_producto_fabricanteDescripcion($parametro_auxiliar_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar_facturacion->getcon_busqueda_producto_fabricante()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_solo_costo_productoDescripcion($parametro_auxiliar_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar_facturacion->getcon_solo_costo_producto()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_reciboDescripcion($parametro_auxiliar_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar_facturacion->getcon_recibo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_impuesto_final_boletaDescripcion($parametro_auxiliar_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar_facturacion->getcon_impuesto_final_boleta()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_ticketDescripcion($parametro_auxiliar_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar_facturacion->getcon_ticket()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_impuesto_final_ticketDescripcion($parametro_auxiliar_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar_facturacion->getcon_impuesto_final_ticket()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $parametro_auxiliar_facturacions) {		
		try {
			
			$parametro_auxiliar_facturacion = new parametro_auxiliar_facturacion();
			
			foreach($parametro_auxiliar_facturacions as $parametro_auxiliar_facturacion) {
				
				$parametro_auxiliar_facturacion->setid_empresa_Descripcion(parametro_auxiliar_facturacion_util::getempresaDescripcion($parametro_auxiliar_facturacion->getempresa()));
			}
			
			if($parametro_auxiliar_facturacion!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion) {		
		try {
			
			
				$parametro_auxiliar_facturacion->setid_empresa_Descripcion(parametro_auxiliar_facturacion_util::getempresaDescripcion($parametro_auxiliar_facturacion->getempresa()));
							
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}		 
	
	/*FKs LISTA*/
			
	
	/*INDICES LABEL*/
	
	public static function getNombreIndice(string $sNombreIndice) : string {
		if($sNombreIndice=='Todos') {
			$sNombreIndice='Tipo=Todos';
		} else if($sNombreIndice=='PorId') {
			$sNombreIndice='Tipo=Por Id';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return parametro_auxiliar_facturacion_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return parametro_auxiliar_facturacion_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_NOMBRE_TIPO_FACTURA);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_NOMBRE_TIPO_FACTURA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_INCREMENTO);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_INCREMENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_CON_CREACION_RAPIDA_PRODUCTO);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_CON_CREACION_RAPIDA_PRODUCTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_CON_BUSQUEDA_PRODUCTO_FABRICANTE);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_CON_BUSQUEDA_PRODUCTO_FABRICANTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_CON_SOLO_COSTO_PRODUCTO);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_CON_SOLO_COSTO_PRODUCTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_CON_RECIBO);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_CON_RECIBO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_NOMBRE_TIPO_FACTURA_RECIBO);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_NOMBRE_TIPO_FACTURA_RECIBO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_RECIBO);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_RECIBO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_INCREMENTO_RECIBO);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_INCREMENTO_RECIBO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_CON_IMPUESTO_FINAL_BOLETA);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_CON_IMPUESTO_FINAL_BOLETA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_CON_TICKET);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_CON_TICKET);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_NOMBRE_TIPO_FACTURA_TICKETS);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_NOMBRE_TIPO_FACTURA_TICKETS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_TICKET);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_TICKET);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_INCREMENTO_TICKET);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_INCREMENTO_TICKET);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_facturacion_util::$LABEL_CON_IMPUESTO_FINAL_TICKET);
			$reporte->setsDescripcion(parametro_auxiliar_facturacion_util::$LABEL_CON_IMPUESTO_FINAL_TICKET);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=parametro_auxiliar_facturacion_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==parametro_auxiliar_facturacion_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=parametro_auxiliar_facturacion_util::$ID_EMPRESA;
		}
		
		return $arrColumnasGlobales;
	}
	
	public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		
		
		return $arrColumnasGlobales;
	}
	
	/*DEEP CLASSES*/
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();	
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(empresa::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(empresa::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();			
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
			}
			
			return $classes;
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	/*ORDER*/
	public static function getOrderByLista() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_ID, parametro_auxiliar_facturacion_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_ID_EMPRESA, parametro_auxiliar_facturacion_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_NOMBRE_TIPO_FACTURA, parametro_auxiliar_facturacion_util::$NOMBRE_TIPO_FACTURA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO, parametro_auxiliar_facturacion_util::$SIGUIENTE_NUMERO_CORRELATIVO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_INCREMENTO, parametro_auxiliar_facturacion_util::$INCREMENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_CON_CREACION_RAPIDA_PRODUCTO, parametro_auxiliar_facturacion_util::$CON_CREACION_RAPIDA_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_CON_BUSQUEDA_PRODUCTO_FABRICANTE, parametro_auxiliar_facturacion_util::$CON_BUSQUEDA_PRODUCTO_FABRICANTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_CON_SOLO_COSTO_PRODUCTO, parametro_auxiliar_facturacion_util::$CON_SOLO_COSTO_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_CON_RECIBO, parametro_auxiliar_facturacion_util::$CON_RECIBO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_NOMBRE_TIPO_FACTURA_RECIBO, parametro_auxiliar_facturacion_util::$NOMBRE_TIPO_FACTURA_RECIBO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_RECIBO, parametro_auxiliar_facturacion_util::$SIGUIENTE_NUMERO_CORRELATIVO_RECIBO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_INCREMENTO_RECIBO, parametro_auxiliar_facturacion_util::$INCREMENTO_RECIBO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_CON_IMPUESTO_FINAL_BOLETA, parametro_auxiliar_facturacion_util::$CON_IMPUESTO_FINAL_BOLETA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_CON_TICKET, parametro_auxiliar_facturacion_util::$CON_TICKET,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_NOMBRE_TIPO_FACTURA_TICKETS, parametro_auxiliar_facturacion_util::$NOMBRE_TIPO_FACTURA_TICKETS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_TICKET, parametro_auxiliar_facturacion_util::$SIGUIENTE_NUMERO_CORRELATIVO_TICKET,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_INCREMENTO_TICKET, parametro_auxiliar_facturacion_util::$INCREMENTO_TICKET,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_facturacion_util::$LABEL_CON_IMPUESTO_FINAL_TICKET, parametro_auxiliar_facturacion_util::$CON_IMPUESTO_FINAL_TICKET,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		if($orderBy!=null);
		
		return $arrOrderBy;
	}
	
	/*REPORTES*/
		
	
	/*REPORTES CODIGO*/
	public static function getHeaderReportRow(string $tipo='NORMAL',array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$header=array();
		$cellReport=new CellReport();
		$blnFill=false;
		
		if($tipo=='RELACIONADO') {
			$blnFill=true;
			
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,7,1); $cellReport->setblnFill($blnFill); $header[]=$cellReport;			
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Tipo Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Tipo Factura',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Creacion Rapida Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Creacion Rapida Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Busqueda Producto Fabricante',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Busqueda Producto Fabricante',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Solo Costo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Solo Costo Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Recibo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Tipo Factura Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Tipo Factura Recibo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo Recibo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Recibo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Impuesto Final Boleta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Impuesto Final Boleta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Ticket',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Ticket',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Tipo Factura Ticket',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Tipo Factura Ticket',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Ticket',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo Ticket',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Ticket',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Ticket',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Impuesto Final Ticket',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Impuesto Final Ticket',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Tipo Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getnombre_tipo_factura(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getsiguiente_numero_correlativo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getincremento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Creacion Rapida Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar_facturacion->getcon_creacion_rapida_producto()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Busqueda Producto Fabricante',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar_facturacion->getcon_busqueda_producto_fabricante()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Solo Costo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar_facturacion->getcon_solo_costo_producto()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar_facturacion->getcon_recibo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Tipo Factura Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getnombre_tipo_factura_recibo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_recibo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getincremento_recibo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Impuesto Final Boleta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar_facturacion->getcon_impuesto_final_boleta()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Ticket',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar_facturacion->getcon_ticket()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Tipo Factura Ticket',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getnombre_tipo_factura_ticket(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Ticket',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_ticket(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Ticket',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar_facturacion->getincremento_ticket(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Impuesto Final Ticket',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar_facturacion->getcon_impuesto_final_ticket()),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getempresaDescripcion(?empresa $empresa) : string {
		$sDescripcion='none';
		if($empresa!==null) {
			$sDescripcion=empresa_util::getempresaDescripcion($empresa);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface parametro_auxiliar_facturacion_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $parametro_auxiliar_facturacions,int $iIdNuevoparametro_auxiliar_facturacion) : int;	
		public static function getIndiceActual(array $parametro_auxiliar_facturacions,parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getparametro_auxiliar_facturacionDescripcion(?parametro_auxiliar_facturacion $parametro_auxiliar_facturacion) : string {;	
		public static function setparametro_auxiliar_facturacionDescripcion(?parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $parametro_auxiliar_facturacions) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $parametro_auxiliar_facturacions);	
		public static function refrescarFKDescripcion(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion);
				
		//SELECCIONAR
		public static function getTiposSeleccionar(bool $conFk) : array;	
		public static function getTiposSeleccionar2() : array;	
		public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array;
		
		//GLOBAL
		public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array;	
		public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array;	
		public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array;
		
		//DEEP CLASSES
		public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array;
		
		
		public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array;
		
		
		//ORDER
		public static function getOrderByLista() : array;	
		public static function getOrderByListaRel() : array;	
		
		//REPORTES CODIGO
		public static function getHeaderReportRow(string $tipo='NORMAL',array $arrOrderBy,bool $bitParaReporteOrderBy) : array;	
		public static function getDataReportRow(string $tipo='NORMAL',parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

