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

namespace com\bydan\contabilidad\contabilidad\cuenta_predefinida\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_util;

//REL


class cuenta_predefinida_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='cuenta_predefinida';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='contabilidad.cuenta_predefinidas';
	/*'Mantenimientocuenta_predefinida.jsf';*/
	public static string $STR_MODULO_OPCION='contabilidad';
	public static string $STR_NOMBRE_CLASE='Mantenimientocuenta_predefinida.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='cuenta_predefinidaPersistenceName';
	/*.cuenta_predefinida_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='cuenta_predefinida_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='cuenta_predefinida_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='cuenta_predefinida_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Cuentas Predefinidases';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Cuentas Predefinidas';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CONTABILIDAD='contabilidad';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $STR_TABLE_NAME='cuenta_predefinida';
	public static string $CUENTA_PREDEFINIDA='con_cuenta_predefinida';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.cuenta_predefinida';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_cuenta_predefinida,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_nivel_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_tabla,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_minimo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor_retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.porcentaje_base,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.seleccionar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.centro_costos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.usa_base,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nit,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modifica,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ultima_transaccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comenta1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comenta2 from '.cuenta_predefinida_util::$SCHEMA.'.'.cuenta_predefinida_util::$TABLENAME;*/
	
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
	//public $cuenta_predefinidaConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_TIPO_CUENTA_PREDEFINIDA='id_tipo_cuenta_predefinida';
    public static string $ID_TIPO_CUENTA='id_tipo_cuenta';
    public static string $ID_TIPO_NIVEL_CUENTA='id_tipo_nivel_cuenta';
    public static string $CODIGO_TABLA='codigo_tabla';
    public static string $CODIGO_CUENTA='codigo_cuenta';
    public static string $NOMBRE_CUENTA='nombre_cuenta';
    public static string $MONTO_MINIMO='monto_minimo';
    public static string $VALOR_RETENCION='valor_retencion';
    public static string $BALANCE='balance';
    public static string $PORCENTAJE_BASE='porcentaje_base';
    public static string $SELECCIONAR='seleccionar';
    public static string $CENTRO_COSTOS='centro_costos';
    public static string $RETENCION='retencion';
    public static string $USA_BASE='usa_base';
    public static string $NIT='nit';
    public static string $MODIFICA='modifica';
    public static string $ULTIMA_TRANSACCION='ultima_transaccion';
    public static string $COMENTA1='comenta1';
    public static string $COMENTA2='comenta2';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_TIPO_CUENTA_PREDEFINIDA='Tipo Cuenta Predefinida';
    public static string $LABEL_ID_TIPO_CUENTA='Tipo Cuenta';
    public static string $LABEL_ID_TIPO_NIVEL_CUENTA='Tipo Nivel Cuenta';
    public static string $LABEL_CODIGO_TABLA='Codigo Tabla';
    public static string $LABEL_CODIGO_CUENTA='Codigo Cuenta';
    public static string $LABEL_NOMBRE_CUENTA='Nombre Cuenta';
    public static string $LABEL_MONTO_MINIMO='Monto Minimo';
    public static string $LABEL_VALOR_RETENCION='Valor Retencion';
    public static string $LABEL_BALANCE='Balance';
    public static string $LABEL_PORCENTAJE_BASE='Porcentaje Base';
    public static string $LABEL_SELECCIONAR='Seleccionar';
    public static string $LABEL_CENTRO_COSTOS='Centro Costos';
    public static string $LABEL_RETENCION='Retencion';
    public static string $LABEL_USA_BASE='Usa Base';
    public static string $LABEL_NIT='Nit';
    public static string $LABEL_MODIFICA='Modifica';
    public static string $LABEL_ULTIMA_TRANSACCION='Ultima Transaccion';
    public static string $LABEL_COMENTA1='Comenta1';
    public static string $LABEL_COMENTA2='Comenta2';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_predefinidaConstantesFuncionesAdditional=new $cuenta_predefinidaConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $cuenta_predefinidas,int $iIdNuevocuenta_predefinida) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($cuenta_predefinidas as $cuenta_predefinidaAux) {
			if($cuenta_predefinidaAux->getId()==$iIdNuevocuenta_predefinida) {
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
	
	public static function getIndiceActual(array $cuenta_predefinidas,cuenta_predefinida $cuenta_predefinida,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($cuenta_predefinidas as $cuenta_predefinidaAux) {
			if($cuenta_predefinidaAux->getId()==$cuenta_predefinida->getId()) {
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
	public static function getcuenta_predefinidaDescripcion(?cuenta_predefinida $cuenta_predefinida) : string {//cuenta_predefinida NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($cuenta_predefinida !=null) {
			/*&& cuenta_predefinida->getId()!=0*/
			
			if($cuenta_predefinida->getId()!=null) {
				$sDescripcion=(string)$cuenta_predefinida->getId();
			}
			
			/*cuenta_predefinida;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setcuenta_predefinidaDescripcion(?cuenta_predefinida $cuenta_predefinida,string $sValor) {			
		if($cuenta_predefinida !=null) {
			
			/*cuenta_predefinida;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $cuenta_predefinidas) : array {
		$cuenta_predefinidasForeignKey=array();
		
		foreach ($cuenta_predefinidas as $cuenta_predefinidaLocal) {
			$cuenta_predefinidasForeignKey[$cuenta_predefinidaLocal->getId()]=cuenta_predefinida_util::getcuenta_predefinidaDescripcion($cuenta_predefinidaLocal);
		}
			
		return $cuenta_predefinidasForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_tipo_cuenta_predefinida() : string  { return 'Tipo Cuenta Predefinida'; }
    public static function getColumnLabelid_tipo_cuenta() : string  { return 'Tipo Cuenta'; }
    public static function getColumnLabelid_tipo_nivel_cuenta() : string  { return 'Tipo Nivel Cuenta'; }
    public static function getColumnLabelcodigo_tabla() : string  { return 'Codigo Tabla'; }
    public static function getColumnLabelcodigo_cuenta() : string  { return 'Codigo Cuenta'; }
    public static function getColumnLabelnombre_cuenta() : string  { return 'Nombre Cuenta'; }
    public static function getColumnLabelmonto_minimo() : string  { return 'Monto Minimo'; }
    public static function getColumnLabelvalor_retencion() : string  { return 'Valor Retencion'; }
    public static function getColumnLabelbalance() : string  { return 'Balance'; }
    public static function getColumnLabelporcentaje_base() : string  { return 'Porcentaje Base'; }
    public static function getColumnLabelseleccionar() : string  { return 'Seleccionar'; }
    public static function getColumnLabelcentro_costos() : string  { return 'Centro Costos'; }
    public static function getColumnLabelretencion() : string  { return 'Retencion'; }
    public static function getColumnLabelusa_base() : string  { return 'Usa Base'; }
    public static function getColumnLabelnit() : string  { return 'Nit'; }
    public static function getColumnLabelmodifica() : string  { return 'Modifica'; }
    public static function getColumnLabelultima_transaccion() : string  { return 'Ultima Transaccion'; }
    public static function getColumnLabelcomenta1() : string  { return 'Comenta1'; }
    public static function getColumnLabelcomenta2() : string  { return 'Comenta2'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getcentro_costosDescripcion($cuenta_predefinida) {
		$sDescripcion='Verdadero';
		if(!$cuenta_predefinida->getcentro_costos()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getretencionDescripcion($cuenta_predefinida) {
		$sDescripcion='Verdadero';
		if(!$cuenta_predefinida->getretencion()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getusa_baseDescripcion($cuenta_predefinida) {
		$sDescripcion='Verdadero';
		if(!$cuenta_predefinida->getusa_base()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getnitDescripcion($cuenta_predefinida) {
		$sDescripcion='Verdadero';
		if(!$cuenta_predefinida->getnit()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getmodificaDescripcion($cuenta_predefinida) {
		$sDescripcion='Verdadero';
		if(!$cuenta_predefinida->getmodifica()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $cuenta_predefinidas) {		
		try {
			
			$cuenta_predefinida = new cuenta_predefinida();
			
			foreach($cuenta_predefinidas as $cuenta_predefinida) {
				
				$cuenta_predefinida->setid_empresa_Descripcion(cuenta_predefinida_util::getempresaDescripcion($cuenta_predefinida->getempresa()));
				$cuenta_predefinida->setid_tipo_cuenta_predefinida_Descripcion(cuenta_predefinida_util::gettipo_cuenta_predefinidaDescripcion($cuenta_predefinida->gettipo_cuenta_predefinida()));
				$cuenta_predefinida->setid_tipo_cuenta_Descripcion(cuenta_predefinida_util::gettipo_cuentaDescripcion($cuenta_predefinida->gettipo_cuenta()));
				$cuenta_predefinida->setid_tipo_nivel_cuenta_Descripcion(cuenta_predefinida_util::gettipo_nivel_cuentaDescripcion($cuenta_predefinida->gettipo_nivel_cuenta()));
			}
			
			if($cuenta_predefinida!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(cuenta_predefinida $cuenta_predefinida) {		
		try {
			
			
				$cuenta_predefinida->setid_empresa_Descripcion(cuenta_predefinida_util::getempresaDescripcion($cuenta_predefinida->getempresa()));
				$cuenta_predefinida->setid_tipo_cuenta_predefinida_Descripcion(cuenta_predefinida_util::gettipo_cuenta_predefinidaDescripcion($cuenta_predefinida->gettipo_cuenta_predefinida()));
				$cuenta_predefinida->setid_tipo_cuenta_Descripcion(cuenta_predefinida_util::gettipo_cuentaDescripcion($cuenta_predefinida->gettipo_cuenta()));
				$cuenta_predefinida->setid_tipo_nivel_cuenta_Descripcion(cuenta_predefinida_util::gettipo_nivel_cuentaDescripcion($cuenta_predefinida->gettipo_nivel_cuenta()));
							
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
		} else if($sNombreIndice=='FK_Idtipo_cuenta') {
			$sNombreIndice='Tipo=  Por Tipo Cuenta';
		} else if($sNombreIndice=='FK_Idtipo_cuenta_predefinida') {
			$sNombreIndice='Tipo=  Por Tipo Cuenta Predefinida';
		} else if($sNombreIndice=='FK_Idtipo_nivel_cuenta') {
			$sNombreIndice='Tipo=  Por Tipo Nivel Cuenta';
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

	public static function getDetalleIndiceFK_Idtipo_cuenta(int $id_tipo_cuenta) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Tipo Cuenta='+$id_tipo_cuenta; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_cuenta_predefinida(int $id_tipo_cuenta_predefinida) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Tipo Cuenta Predefinida='+$id_tipo_cuenta_predefinida; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_nivel_cuenta(int $id_tipo_nivel_cuenta) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Tipo Nivel Cuenta='+$id_tipo_nivel_cuenta; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return cuenta_predefinida_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return cuenta_predefinida_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_ID_TIPO_CUENTA_PREDEFINIDA);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_ID_TIPO_CUENTA_PREDEFINIDA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_ID_TIPO_CUENTA);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_ID_TIPO_CUENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_ID_TIPO_NIVEL_CUENTA);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_ID_TIPO_NIVEL_CUENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_CODIGO_TABLA);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_CODIGO_TABLA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_CODIGO_CUENTA);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_CODIGO_CUENTA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_NOMBRE_CUENTA);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_NOMBRE_CUENTA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_MONTO_MINIMO);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_MONTO_MINIMO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_VALOR_RETENCION);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_VALOR_RETENCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_BALANCE);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_BALANCE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_PORCENTAJE_BASE);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_PORCENTAJE_BASE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_SELECCIONAR);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_SELECCIONAR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_CENTRO_COSTOS);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_CENTRO_COSTOS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_RETENCION);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_RETENCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_USA_BASE);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_USA_BASE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_NIT);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_NIT);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_MODIFICA);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_MODIFICA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_ULTIMA_TRANSACCION);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_ULTIMA_TRANSACCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_COMENTA1);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_COMENTA1);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cuenta_predefinida_util::$LABEL_COMENTA2);
			$reporte->setsDescripcion(cuenta_predefinida_util::$LABEL_COMENTA2);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=cuenta_predefinida_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==cuenta_predefinida_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=cuenta_predefinida_util::$ID_EMPRESA;
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
				$classes[]=new Classe(tipo_cuenta_predefinida::$class);
				$classes[]=new Classe(tipo_cuenta::$class);
				$classes[]=new Classe(tipo_nivel_cuenta::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_cuenta_predefinida::$class) {
						$classes[]=new Classe(tipo_cuenta_predefinida::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_cuenta::$class) {
						$classes[]=new Classe(tipo_cuenta::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_nivel_cuenta::$class) {
						$classes[]=new Classe(tipo_nivel_cuenta::$class);
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

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==tipo_cuenta_predefinida::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_cuenta_predefinida::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==tipo_cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==tipo_nivel_cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_nivel_cuenta::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_ID, cuenta_predefinida_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_ID_EMPRESA, cuenta_predefinida_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_ID_TIPO_CUENTA_PREDEFINIDA, cuenta_predefinida_util::$ID_TIPO_CUENTA_PREDEFINIDA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_ID_TIPO_CUENTA, cuenta_predefinida_util::$ID_TIPO_CUENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_ID_TIPO_NIVEL_CUENTA, cuenta_predefinida_util::$ID_TIPO_NIVEL_CUENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_CODIGO_TABLA, cuenta_predefinida_util::$CODIGO_TABLA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_CODIGO_CUENTA, cuenta_predefinida_util::$CODIGO_CUENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_NOMBRE_CUENTA, cuenta_predefinida_util::$NOMBRE_CUENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_MONTO_MINIMO, cuenta_predefinida_util::$MONTO_MINIMO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_VALOR_RETENCION, cuenta_predefinida_util::$VALOR_RETENCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_BALANCE, cuenta_predefinida_util::$BALANCE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_PORCENTAJE_BASE, cuenta_predefinida_util::$PORCENTAJE_BASE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_SELECCIONAR, cuenta_predefinida_util::$SELECCIONAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_CENTRO_COSTOS, cuenta_predefinida_util::$CENTRO_COSTOS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_RETENCION, cuenta_predefinida_util::$RETENCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_USA_BASE, cuenta_predefinida_util::$USA_BASE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_NIT, cuenta_predefinida_util::$NIT,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_MODIFICA, cuenta_predefinida_util::$MODIFICA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_ULTIMA_TRANSACCION, cuenta_predefinida_util::$ULTIMA_TRANSACCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_COMENTA1, cuenta_predefinida_util::$COMENTA1,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$LABEL_COMENTA2, cuenta_predefinida_util::$COMENTA2,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Tipo Cuenta Predefinida',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Cuenta Predefinida',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Cuenta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Nivel Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Nivel Cuenta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Tabla',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Tabla',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Cuenta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Cuenta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto Minimo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Minimo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor Retencion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Valor Retencion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Balance',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Porcentaje Base',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Porcentaje Base',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Seleccionar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Seleccionar',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Centro Costos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Centro Costos',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Retencion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Usa Base',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usa Base',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nit',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nit',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modifica',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modifica',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ultima Transaccion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ultima Transaccion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comenta1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comenta1',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comenta2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comenta2',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',cuenta_predefinida $cuenta_predefinida,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Cuenta Predefinida',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getid_tipo_cuenta_predefinida_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getid_tipo_cuenta_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Nivel Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getid_tipo_nivel_cuenta_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Tabla',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getcodigo_tabla(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getcodigo_cuenta(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getnombre_cuenta(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto Minimo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getmonto_minimo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor Retencion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getvalor_retencion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Balance',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getbalance(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Porcentaje Base',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getporcentaje_base(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Seleccionar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getseleccionar(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Centro Costos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($cuenta_predefinida->getcentro_costos()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Retencion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($cuenta_predefinida->getretencion()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Usa Base',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($cuenta_predefinida->getusa_base()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nit',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($cuenta_predefinida->getnit()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modifica',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($cuenta_predefinida->getmodifica()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ultima Transaccion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getultima_transaccion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comenta1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getcomenta1(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comenta2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_predefinida->getcomenta2(),40,6,1); $row[]=$cellReport;
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
	
	public static function gettipo_cuenta_predefinidaDescripcion(?tipo_cuenta_predefinida $tipo_cuenta_predefinida) : string {
		$sDescripcion='none';
		if($tipo_cuenta_predefinida!==null) {
			$sDescripcion=tipo_cuenta_predefinida_util::gettipo_cuenta_predefinidaDescripcion($tipo_cuenta_predefinida);
		}
		return $sDescripcion;
	}	
	
	public static function gettipo_cuentaDescripcion(?tipo_cuenta $tipo_cuenta) : string {
		$sDescripcion='none';
		if($tipo_cuenta!==null) {
			$sDescripcion=tipo_cuenta_util::gettipo_cuentaDescripcion($tipo_cuenta);
		}
		return $sDescripcion;
	}	
	
	public static function gettipo_nivel_cuentaDescripcion(?tipo_nivel_cuenta $tipo_nivel_cuenta) : string {
		$sDescripcion='none';
		if($tipo_nivel_cuenta!==null) {
			$sDescripcion=tipo_nivel_cuenta_util::gettipo_nivel_cuentaDescripcion($tipo_nivel_cuenta);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface cuenta_predefinida_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $cuenta_predefinidas,int $iIdNuevocuenta_predefinida) : int;	
		public static function getIndiceActual(array $cuenta_predefinidas,cuenta_predefinida $cuenta_predefinida,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getcuenta_predefinidaDescripcion(?cuenta_predefinida $cuenta_predefinida) : string {;	
		public static function setcuenta_predefinidaDescripcion(?cuenta_predefinida $cuenta_predefinida,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $cuenta_predefinidas) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $cuenta_predefinidas);	
		public static function refrescarFKDescripcion(cuenta_predefinida $cuenta_predefinida);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',cuenta_predefinida $cuenta_predefinida,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

