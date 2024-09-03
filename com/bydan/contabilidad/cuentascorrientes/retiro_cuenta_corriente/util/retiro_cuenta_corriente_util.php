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

namespace com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\entity\retiro_cuenta_corriente;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_util;

//REL


class retiro_cuenta_corriente_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='retiro_cuenta_corriente';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_corrientes.retiro_cuenta_corrientes';
	/*'Mantenimientoretiro_cuenta_corriente.jsf';*/
	public static string $STR_MODULO_OPCION='cuentascorrientes';
	public static string $STR_NOMBRE_CLASE='Mantenimientoretiro_cuenta_corriente.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='retiro_cuenta_corrientePersistenceName';
	/*.retiro_cuenta_corriente_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='retiro_cuenta_corriente_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='retiro_cuenta_corriente_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='retiro_cuenta_corriente_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Retiro Cta Corrientes';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Retiro Cta Corriente';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASCORRIENTES='cuentascorrientes';
	public static string $STR_PREFIJO_TABLE='cco_';
	public static string $STR_TABLE_NAME='retiro_cuenta_corriente';
	public static string $RETIRO_CUENTA_CORRIENTE='cco_retiro_cuenta_corriente';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.retiro_cuenta_corriente';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_corriente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_texto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.saldo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado_deposito_retiro,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.debito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.credito from '.retiro_cuenta_corriente_util::$SCHEMA.'.'.retiro_cuenta_corriente_util::$TABLENAME;*/
	
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
	//public $retiro_cuenta_corrienteConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_SUCURSAL='id_sucursal';
    public static string $ID_EJERCICIO='id_ejercicio';
    public static string $ID_PERIODO='id_periodo';
    public static string $ID_USUARIO='id_usuario';
    public static string $ID_CUENTA_CORRIENTE='id_cuenta_corriente';
    public static string $FECHA_EMISION='fecha_emision';
    public static string $MONTO='monto';
    public static string $MONTO_TEXTO='monto_texto';
    public static string $SALDO='saldo';
    public static string $DESCRIPCION='descripcion';
    public static string $ID_ESTADO_DEPOSITO_RETIRO='id_estado_deposito_retiro';
    public static string $DEBITO='debito';
    public static string $CREDITO='credito';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA=' Empresa';
    public static string $LABEL_ID_SUCURSAL=' Sucursal';
    public static string $LABEL_ID_EJERCICIO=' Ejercicio';
    public static string $LABEL_ID_PERIODO=' Periodo';
    public static string $LABEL_ID_USUARIO=' Usuario';
    public static string $LABEL_ID_CUENTA_CORRIENTE=' Cuenta Corriente';
    public static string $LABEL_FECHA_EMISION='Fecha Emision';
    public static string $LABEL_MONTO='Monto';
    public static string $LABEL_MONTO_TEXTO='Monto Texto';
    public static string $LABEL_SALDO='Saldo Actual';
    public static string $LABEL_DESCRIPCION='Descripcion';
    public static string $LABEL_ID_ESTADO_DEPOSITO_RETIRO=' Estado Deposito Retiro';
    public static string $LABEL_DEBITO='Debito';
    public static string $LABEL_CREDITO='Credito';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->retiro_cuenta_corrienteConstantesFuncionesAdditional=new $retiro_cuenta_corrienteConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $retiro_cuenta_corrientes,int $iIdNuevoretiro_cuenta_corriente) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($retiro_cuenta_corrientes as $retiro_cuenta_corrienteAux) {
			if($retiro_cuenta_corrienteAux->getId()==$iIdNuevoretiro_cuenta_corriente) {
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
	
	public static function getIndiceActual(array $retiro_cuenta_corrientes,retiro_cuenta_corriente $retiro_cuenta_corriente,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($retiro_cuenta_corrientes as $retiro_cuenta_corrienteAux) {
			if($retiro_cuenta_corrienteAux->getId()==$retiro_cuenta_corriente->getId()) {
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
	public static function getretiro_cuenta_corrienteDescripcion(?retiro_cuenta_corriente $retiro_cuenta_corriente) : string {//retiro_cuenta_corriente NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($retiro_cuenta_corriente !=null) {
			/*&& retiro_cuenta_corriente->getId()!=0*/
			
			if($retiro_cuenta_corriente->getId()!=null) {
				$sDescripcion=(string)$retiro_cuenta_corriente->getId();
			}
			
			/*retiro_cuenta_corriente;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setretiro_cuenta_corrienteDescripcion(?retiro_cuenta_corriente $retiro_cuenta_corriente,string $sValor) {			
		if($retiro_cuenta_corriente !=null) {
			
			/*retiro_cuenta_corriente;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $retiro_cuenta_corrientes) : array {
		$retiro_cuenta_corrientesForeignKey=array();
		
		foreach ($retiro_cuenta_corrientes as $retiro_cuenta_corrienteLocal) {
			$retiro_cuenta_corrientesForeignKey[$retiro_cuenta_corrienteLocal->getId()]=retiro_cuenta_corriente_util::getretiro_cuenta_corrienteDescripcion($retiro_cuenta_corrienteLocal);
		}
			
		return $retiro_cuenta_corrientesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return ' Empresa'; }
    public static function getColumnLabelid_sucursal() : string  { return ' Sucursal'; }
    public static function getColumnLabelid_ejercicio() : string  { return ' Ejercicio'; }
    public static function getColumnLabelid_periodo() : string  { return ' Periodo'; }
    public static function getColumnLabelid_usuario() : string  { return ' Usuario'; }
    public static function getColumnLabelid_cuenta_corriente() : string  { return ' Cuenta Corriente'; }
    public static function getColumnLabelfecha_emision() : string  { return 'Fecha Emision'; }
    public static function getColumnLabelmonto() : string  { return 'Monto'; }
    public static function getColumnLabelmonto_texto() : string  { return 'Monto Texto'; }
    public static function getColumnLabelsaldo() : string  { return 'Saldo Actual'; }
    public static function getColumnLabeldescripcion() : string  { return 'Descripcion'; }
    public static function getColumnLabelid_estado_deposito_retiro() : string  { return ' Estado Deposito Retiro'; }
    public static function getColumnLabeldebito() : string  { return 'Debito'; }
    public static function getColumnLabelcredito() : string  { return 'Credito'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $retiro_cuenta_corrientes) {		
		try {
			
			$retiro_cuenta_corriente = new retiro_cuenta_corriente();
			
			foreach($retiro_cuenta_corrientes as $retiro_cuenta_corriente) {
				
				$retiro_cuenta_corriente->setid_empresa_Descripcion(retiro_cuenta_corriente_util::getempresaDescripcion($retiro_cuenta_corriente->getempresa()));
				$retiro_cuenta_corriente->setid_sucursal_Descripcion(retiro_cuenta_corriente_util::getsucursalDescripcion($retiro_cuenta_corriente->getsucursal()));
				$retiro_cuenta_corriente->setid_ejercicio_Descripcion(retiro_cuenta_corriente_util::getejercicioDescripcion($retiro_cuenta_corriente->getejercicio()));
				$retiro_cuenta_corriente->setid_periodo_Descripcion(retiro_cuenta_corriente_util::getperiodoDescripcion($retiro_cuenta_corriente->getperiodo()));
				$retiro_cuenta_corriente->setid_usuario_Descripcion(retiro_cuenta_corriente_util::getusuarioDescripcion($retiro_cuenta_corriente->getusuario()));
				$retiro_cuenta_corriente->setid_cuenta_corriente_Descripcion(retiro_cuenta_corriente_util::getcuenta_corrienteDescripcion($retiro_cuenta_corriente->getcuenta_corriente()));
				$retiro_cuenta_corriente->setid_estado_deposito_retiro_Descripcion(retiro_cuenta_corriente_util::getestado_deposito_retiroDescripcion($retiro_cuenta_corriente->getestado_deposito_retiro()));
			}
			
			if($retiro_cuenta_corriente!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(retiro_cuenta_corriente $retiro_cuenta_corriente) {		
		try {
			
			
				$retiro_cuenta_corriente->setid_empresa_Descripcion(retiro_cuenta_corriente_util::getempresaDescripcion($retiro_cuenta_corriente->getempresa()));
				$retiro_cuenta_corriente->setid_sucursal_Descripcion(retiro_cuenta_corriente_util::getsucursalDescripcion($retiro_cuenta_corriente->getsucursal()));
				$retiro_cuenta_corriente->setid_ejercicio_Descripcion(retiro_cuenta_corriente_util::getejercicioDescripcion($retiro_cuenta_corriente->getejercicio()));
				$retiro_cuenta_corriente->setid_periodo_Descripcion(retiro_cuenta_corriente_util::getperiodoDescripcion($retiro_cuenta_corriente->getperiodo()));
				$retiro_cuenta_corriente->setid_usuario_Descripcion(retiro_cuenta_corriente_util::getusuarioDescripcion($retiro_cuenta_corriente->getusuario()));
				$retiro_cuenta_corriente->setid_cuenta_corriente_Descripcion(retiro_cuenta_corriente_util::getcuenta_corrienteDescripcion($retiro_cuenta_corriente->getcuenta_corriente()));
				$retiro_cuenta_corriente->setid_estado_deposito_retiro_Descripcion(retiro_cuenta_corriente_util::getestado_deposito_retiroDescripcion($retiro_cuenta_corriente->getestado_deposito_retiro()));
							
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
		} else if($sNombreIndice=='FK_Idcuenta_corriente') {
			$sNombreIndice='Tipo=  Por  Cuenta Corriente';
		} else if($sNombreIndice=='FK_Idejercicio') {
			$sNombreIndice='Tipo=  Por  Ejercicio';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por  Empresa';
		} else if($sNombreIndice=='FK_Idestado_deposito_retiro') {
			$sNombreIndice='Tipo=  Por  Estado Deposito Retiro';
		} else if($sNombreIndice=='FK_Idperiodo') {
			$sNombreIndice='Tipo=  Por  Periodo';
		} else if($sNombreIndice=='FK_Idsucursal') {
			$sNombreIndice='Tipo=  Por  Sucursal';
		} else if($sNombreIndice=='FK_Idusuario') {
			$sNombreIndice='Tipo=  Por  Usuario';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idcuenta_corriente(int $id_cuenta_corriente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuenta Corriente='+$id_cuenta_corriente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idejercicio(int $id_ejercicio) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Ejercicio='+$id_ejercicio; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idestado_deposito_retiro(int $id_estado_deposito_retiro) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Estado Deposito Retiro='+$id_estado_deposito_retiro; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idperiodo(int $id_periodo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Periodo='+$id_periodo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idsucursal(int $id_sucursal) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Sucursal='+$id_sucursal; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idusuario(int $id_usuario) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Usuario='+$id_usuario; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return retiro_cuenta_corriente_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return retiro_cuenta_corriente_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_ID_SUCURSAL);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_ID_SUCURSAL.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_ID_EJERCICIO);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_ID_EJERCICIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_ID_PERIODO);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_ID_PERIODO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_ID_USUARIO);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_ID_USUARIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_ID_CUENTA_CORRIENTE);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_ID_CUENTA_CORRIENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_FECHA_EMISION);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_FECHA_EMISION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_MONTO);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_MONTO_TEXTO);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_MONTO_TEXTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_SALDO);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_SALDO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_ID_ESTADO_DEPOSITO_RETIRO);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_ID_ESTADO_DEPOSITO_RETIRO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_DEBITO);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_DEBITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(retiro_cuenta_corriente_util::$LABEL_CREDITO);
			$reporte->setsDescripcion(retiro_cuenta_corriente_util::$LABEL_CREDITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=retiro_cuenta_corriente_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==retiro_cuenta_corriente_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=retiro_cuenta_corriente_util::$ID_EMPRESA;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==retiro_cuenta_corriente_util::$ID_SUCURSAL) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=retiro_cuenta_corriente_util::$ID_SUCURSAL;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==retiro_cuenta_corriente_util::$ID_EJERCICIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=retiro_cuenta_corriente_util::$ID_EJERCICIO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==retiro_cuenta_corriente_util::$ID_PERIODO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=retiro_cuenta_corriente_util::$ID_PERIODO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==retiro_cuenta_corriente_util::$ID_USUARIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=retiro_cuenta_corriente_util::$ID_USUARIO;
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
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(cuenta_corriente::$class);
				$classes[]=new Classe(estado_deposito_retiro::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==ejercicio::$class) {
						$classes[]=new Classe(ejercicio::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==periodo::$class) {
						$classes[]=new Classe(periodo::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta_corriente::$class) {
						$classes[]=new Classe(cuenta_corriente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==estado_deposito_retiro::$class) {
						$classes[]=new Classe(estado_deposito_retiro::$class);
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
					if($clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==ejercicio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ejercicio::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==periodo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(periodo::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_corriente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==estado_deposito_retiro::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado_deposito_retiro::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_ID, retiro_cuenta_corriente_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_ID_EMPRESA, retiro_cuenta_corriente_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_ID_SUCURSAL, retiro_cuenta_corriente_util::$ID_SUCURSAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_ID_EJERCICIO, retiro_cuenta_corriente_util::$ID_EJERCICIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_ID_PERIODO, retiro_cuenta_corriente_util::$ID_PERIODO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_ID_USUARIO, retiro_cuenta_corriente_util::$ID_USUARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_ID_CUENTA_CORRIENTE, retiro_cuenta_corriente_util::$ID_CUENTA_CORRIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_FECHA_EMISION, retiro_cuenta_corriente_util::$FECHA_EMISION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_MONTO, retiro_cuenta_corriente_util::$MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_MONTO_TEXTO, retiro_cuenta_corriente_util::$MONTO_TEXTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_SALDO, retiro_cuenta_corriente_util::$SALDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_DESCRIPCION, retiro_cuenta_corriente_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_ID_ESTADO_DEPOSITO_RETIRO, retiro_cuenta_corriente_util::$ID_ESTADO_DEPOSITO_RETIRO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_DEBITO, retiro_cuenta_corriente_util::$DEBITO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,retiro_cuenta_corriente_util::$LABEL_CREDITO, retiro_cuenta_corriente_util::$CREDITO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Empresa',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Sucursal',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Ejercicio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Periodo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Usuario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Corriente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Corriente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto Texto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Texto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Saldo Actual',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Saldo Actual',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Estado Deposito Retiro',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Estado Deposito Retiro',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',retiro_cuenta_corriente $retiro_cuenta_corriente,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_sucursal_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_ejercicio_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_periodo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_usuario_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Corriente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_cuenta_corriente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getfecha_emision(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getmonto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto Texto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getmonto_texto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Saldo Actual',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getsaldo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getdescripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Estado Deposito Retiro',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($retiro_cuenta_corriente->getid_estado_deposito_retiro_Descripcion(),40,6,1); $row[]=$cellReport;
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
	
	public static function getsucursalDescripcion(?sucursal $sucursal) : string {
		$sDescripcion='none';
		if($sucursal!==null) {
			$sDescripcion=sucursal_util::getsucursalDescripcion($sucursal);
		}
		return $sDescripcion;
	}	
	
	public static function getejercicioDescripcion(?ejercicio $ejercicio) : string {
		$sDescripcion='none';
		if($ejercicio!==null) {
			$sDescripcion=ejercicio_util::getejercicioDescripcion($ejercicio);
		}
		return $sDescripcion;
	}	
	
	public static function getperiodoDescripcion(?periodo $periodo) : string {
		$sDescripcion='none';
		if($periodo!==null) {
			$sDescripcion=periodo_util::getperiodoDescripcion($periodo);
		}
		return $sDescripcion;
	}	
	
	public static function getusuarioDescripcion(?usuario $usuario) : string {
		$sDescripcion='none';
		if($usuario!==null) {
			$sDescripcion=usuario_util::getusuarioDescripcion($usuario);
		}
		return $sDescripcion;
	}	
	
	public static function getcuenta_corrienteDescripcion(?cuenta_corriente $cuenta_corriente) : string {
		$sDescripcion='none';
		if($cuenta_corriente!==null) {
			$sDescripcion=cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corriente);
		}
		return $sDescripcion;
	}	
	
	public static function getestado_deposito_retiroDescripcion(?estado_deposito_retiro $estado_deposito_retiro) : string {
		$sDescripcion='none';
		if($estado_deposito_retiro!==null) {
			$sDescripcion=estado_deposito_retiro_util::getestado_deposito_retiroDescripcion($estado_deposito_retiro);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface retiro_cuenta_corriente_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $retiro_cuenta_corrientes,int $iIdNuevoretiro_cuenta_corriente) : int;	
		public static function getIndiceActual(array $retiro_cuenta_corrientes,retiro_cuenta_corriente $retiro_cuenta_corriente,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getretiro_cuenta_corrienteDescripcion(?retiro_cuenta_corriente $retiro_cuenta_corriente) : string {;	
		public static function setretiro_cuenta_corrienteDescripcion(?retiro_cuenta_corriente $retiro_cuenta_corriente,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $retiro_cuenta_corrientes) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $retiro_cuenta_corrientes);	
		public static function refrescarFKDescripcion(retiro_cuenta_corriente $retiro_cuenta_corriente);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',retiro_cuenta_corriente $retiro_cuenta_corriente,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

