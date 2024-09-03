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

namespace com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\entity\pago_cuenta_cobrar;


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
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;
use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


class pago_cuenta_cobrar_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='pago_cuenta_cobrar';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_cobrar.pago_cuenta_cobrars';
	/*'Mantenimientopago_cuenta_cobrar.jsf';*/
	public static string $STR_MODULO_OPCION='cuentascobrar';
	public static string $STR_NOMBRE_CLASE='Mantenimientopago_cuenta_cobrar.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='pago_cuenta_cobrarPersistenceName';
	/*.pago_cuenta_cobrar_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='pago_cuenta_cobrar_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='pago_cuenta_cobrar_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='pago_cuenta_cobrar_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Pago Cuenta Cobrars';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Pago Cuenta Cobrar';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASCOBRAR='cuentascobrar';
	public static string $STR_PREFIJO_TABLE='cc_';
	public static string $STR_TABLE_NAME='pago_cuenta_cobrar';
	public static string $PAGO_CUENTA_COBRAR='cc_pago_cuenta_cobrar';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.pago_cuenta_cobrar';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_cobrar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_forma_pago_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.abono,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.saldo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.referencia,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.debito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.credito from '.pago_cuenta_cobrar_util::$SCHEMA.'.'.pago_cuenta_cobrar_util::$TABLENAME;*/
	
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
	//public $pago_cuenta_cobrarConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_SUCURSAL='id_sucursal';
    public static string $ID_EJERCICIO='id_ejercicio';
    public static string $ID_PERIODO='id_periodo';
    public static string $ID_USUARIO='id_usuario';
    public static string $ID_CUENTA_COBRAR='id_cuenta_cobrar';
    public static string $NUMERO='numero';
    public static string $ID_FORMA_PAGO_CLIENTE='id_forma_pago_cliente';
    public static string $FECHA_EMISION='fecha_emision';
    public static string $FECHA_VENCE='fecha_vence';
    public static string $ABONO='abono';
    public static string $SALDO='saldo';
    public static string $DESCRIPCION='descripcion';
    public static string $ID_ESTADO='id_estado';
    public static string $REFERENCIA='referencia';
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
    public static string $LABEL_ID_CUENTA_COBRAR=' Cuenta Cobrar';
    public static string $LABEL_NUMERO='Numero';
    public static string $LABEL_ID_FORMA_PAGO_CLIENTE=' Forma Pago Cliente';
    public static string $LABEL_FECHA_EMISION='Fecha Emision';
    public static string $LABEL_FECHA_VENCE='Fecha Vence';
    public static string $LABEL_ABONO='Abono';
    public static string $LABEL_SALDO='Saldo';
    public static string $LABEL_DESCRIPCION='Descripcion';
    public static string $LABEL_ID_ESTADO=' Estado';
    public static string $LABEL_REFERENCIA='Referencia';
    public static string $LABEL_DEBITO='Debito';
    public static string $LABEL_CREDITO='Credito';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->pago_cuenta_cobrarConstantesFuncionesAdditional=new $pago_cuenta_cobrarConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $pago_cuenta_cobrars,int $iIdNuevopago_cuenta_cobrar) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($pago_cuenta_cobrars as $pago_cuenta_cobrarAux) {
			if($pago_cuenta_cobrarAux->getId()==$iIdNuevopago_cuenta_cobrar) {
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
	
	public static function getIndiceActual(array $pago_cuenta_cobrars,pago_cuenta_cobrar $pago_cuenta_cobrar,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($pago_cuenta_cobrars as $pago_cuenta_cobrarAux) {
			if($pago_cuenta_cobrarAux->getId()==$pago_cuenta_cobrar->getId()) {
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
	public static function getpago_cuenta_cobrarDescripcion(?pago_cuenta_cobrar $pago_cuenta_cobrar) : string {//pago_cuenta_cobrar NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($pago_cuenta_cobrar !=null) {
			/*&& pago_cuenta_cobrar->getId()!=0*/
			
			if($pago_cuenta_cobrar->getId()!=null) {
				$sDescripcion=(string)$pago_cuenta_cobrar->getId();
			}
			
			/*pago_cuenta_cobrar;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setpago_cuenta_cobrarDescripcion(?pago_cuenta_cobrar $pago_cuenta_cobrar,string $sValor) {			
		if($pago_cuenta_cobrar !=null) {
			
			/*pago_cuenta_cobrar;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $pago_cuenta_cobrars) : array {
		$pago_cuenta_cobrarsForeignKey=array();
		
		foreach ($pago_cuenta_cobrars as $pago_cuenta_cobrarLocal) {
			$pago_cuenta_cobrarsForeignKey[$pago_cuenta_cobrarLocal->getId()]=pago_cuenta_cobrar_util::getpago_cuenta_cobrarDescripcion($pago_cuenta_cobrarLocal);
		}
			
		return $pago_cuenta_cobrarsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return ' Empresa'; }
    public static function getColumnLabelid_sucursal() : string  { return ' Sucursal'; }
    public static function getColumnLabelid_ejercicio() : string  { return ' Ejercicio'; }
    public static function getColumnLabelid_periodo() : string  { return ' Periodo'; }
    public static function getColumnLabelid_usuario() : string  { return ' Usuario'; }
    public static function getColumnLabelid_cuenta_cobrar() : string  { return ' Cuenta Cobrar'; }
    public static function getColumnLabelnumero() : string  { return 'Numero'; }
    public static function getColumnLabelid_forma_pago_cliente() : string  { return ' Forma Pago Cliente'; }
    public static function getColumnLabelfecha_emision() : string  { return 'Fecha Emision'; }
    public static function getColumnLabelfecha_vence() : string  { return 'Fecha Vence'; }
    public static function getColumnLabelabono() : string  { return 'Abono'; }
    public static function getColumnLabelsaldo() : string  { return 'Saldo'; }
    public static function getColumnLabeldescripcion() : string  { return 'Descripcion'; }
    public static function getColumnLabelid_estado() : string  { return ' Estado'; }
    public static function getColumnLabelreferencia() : string  { return 'Referencia'; }
    public static function getColumnLabeldebito() : string  { return 'Debito'; }
    public static function getColumnLabelcredito() : string  { return 'Credito'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $pago_cuenta_cobrars) {		
		try {
			
			$pago_cuenta_cobrar = new pago_cuenta_cobrar();
			
			foreach($pago_cuenta_cobrars as $pago_cuenta_cobrar) {
				
				$pago_cuenta_cobrar->setid_empresa_Descripcion(pago_cuenta_cobrar_util::getempresaDescripcion($pago_cuenta_cobrar->getempresa()));
				$pago_cuenta_cobrar->setid_sucursal_Descripcion(pago_cuenta_cobrar_util::getsucursalDescripcion($pago_cuenta_cobrar->getsucursal()));
				$pago_cuenta_cobrar->setid_ejercicio_Descripcion(pago_cuenta_cobrar_util::getejercicioDescripcion($pago_cuenta_cobrar->getejercicio()));
				$pago_cuenta_cobrar->setid_periodo_Descripcion(pago_cuenta_cobrar_util::getperiodoDescripcion($pago_cuenta_cobrar->getperiodo()));
				$pago_cuenta_cobrar->setid_usuario_Descripcion(pago_cuenta_cobrar_util::getusuarioDescripcion($pago_cuenta_cobrar->getusuario()));
				$pago_cuenta_cobrar->setid_cuenta_cobrar_Descripcion(pago_cuenta_cobrar_util::getcuenta_cobrarDescripcion($pago_cuenta_cobrar->getcuenta_cobrar()));
				$pago_cuenta_cobrar->setid_forma_pago_cliente_Descripcion(pago_cuenta_cobrar_util::getforma_pago_clienteDescripcion($pago_cuenta_cobrar->getforma_pago_cliente()));
				$pago_cuenta_cobrar->setid_estado_Descripcion(pago_cuenta_cobrar_util::getestadoDescripcion($pago_cuenta_cobrar->getestado()));
			}
			
			if($pago_cuenta_cobrar!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(pago_cuenta_cobrar $pago_cuenta_cobrar) {		
		try {
			
			
				$pago_cuenta_cobrar->setid_empresa_Descripcion(pago_cuenta_cobrar_util::getempresaDescripcion($pago_cuenta_cobrar->getempresa()));
				$pago_cuenta_cobrar->setid_sucursal_Descripcion(pago_cuenta_cobrar_util::getsucursalDescripcion($pago_cuenta_cobrar->getsucursal()));
				$pago_cuenta_cobrar->setid_ejercicio_Descripcion(pago_cuenta_cobrar_util::getejercicioDescripcion($pago_cuenta_cobrar->getejercicio()));
				$pago_cuenta_cobrar->setid_periodo_Descripcion(pago_cuenta_cobrar_util::getperiodoDescripcion($pago_cuenta_cobrar->getperiodo()));
				$pago_cuenta_cobrar->setid_usuario_Descripcion(pago_cuenta_cobrar_util::getusuarioDescripcion($pago_cuenta_cobrar->getusuario()));
				$pago_cuenta_cobrar->setid_cuenta_cobrar_Descripcion(pago_cuenta_cobrar_util::getcuenta_cobrarDescripcion($pago_cuenta_cobrar->getcuenta_cobrar()));
				$pago_cuenta_cobrar->setid_forma_pago_cliente_Descripcion(pago_cuenta_cobrar_util::getforma_pago_clienteDescripcion($pago_cuenta_cobrar->getforma_pago_cliente()));
				$pago_cuenta_cobrar->setid_estado_Descripcion(pago_cuenta_cobrar_util::getestadoDescripcion($pago_cuenta_cobrar->getestado()));
							
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
		} else if($sNombreIndice=='FK_Idcuenta_cobrar') {
			$sNombreIndice='Tipo=  Por  Cuenta Cobrar';
		} else if($sNombreIndice=='FK_Idejercicio') {
			$sNombreIndice='Tipo=  Por  Ejercicio';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por  Empresa';
		} else if($sNombreIndice=='FK_Idestado') {
			$sNombreIndice='Tipo=  Por  Estado';
		} else if($sNombreIndice=='FK_Idforma_pago_cliente') {
			$sNombreIndice='Tipo=  Por  Forma Pago Cliente';
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

	public static function getDetalleIndiceFK_Idcuenta_cobrar(int $id_cuenta_cobrar) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuenta Cobrar='+$id_cuenta_cobrar; 

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

	public static function getDetalleIndiceFK_Idestado(int $id_estado) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Estado='+$id_estado; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idforma_pago_cliente(int $id_forma_pago_cliente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Forma Pago Cliente='+$id_forma_pago_cliente; 

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
		return pago_cuenta_cobrar_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return pago_cuenta_cobrar_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_ID_SUCURSAL);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_ID_SUCURSAL.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_ID_EJERCICIO);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_ID_EJERCICIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_ID_PERIODO);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_ID_PERIODO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_ID_USUARIO);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_ID_USUARIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_ID_CUENTA_COBRAR);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_ID_CUENTA_COBRAR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_NUMERO);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_NUMERO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_ID_FORMA_PAGO_CLIENTE);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_ID_FORMA_PAGO_CLIENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_FECHA_EMISION);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_FECHA_EMISION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_FECHA_VENCE);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_FECHA_VENCE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_ABONO);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_ABONO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_SALDO);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_SALDO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_ID_ESTADO);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_ID_ESTADO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_REFERENCIA);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_REFERENCIA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_DEBITO);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_DEBITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(pago_cuenta_cobrar_util::$LABEL_CREDITO);
			$reporte->setsDescripcion(pago_cuenta_cobrar_util::$LABEL_CREDITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=pago_cuenta_cobrar_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==pago_cuenta_cobrar_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=pago_cuenta_cobrar_util::$ID_EMPRESA;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==pago_cuenta_cobrar_util::$ID_SUCURSAL) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=pago_cuenta_cobrar_util::$ID_SUCURSAL;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==pago_cuenta_cobrar_util::$ID_EJERCICIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=pago_cuenta_cobrar_util::$ID_EJERCICIO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==pago_cuenta_cobrar_util::$ID_PERIODO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=pago_cuenta_cobrar_util::$ID_PERIODO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==pago_cuenta_cobrar_util::$ID_USUARIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=pago_cuenta_cobrar_util::$ID_USUARIO;
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
				$classes[]=new Classe(cuenta_cobrar::$class);
				$classes[]=new Classe(forma_pago_cliente::$class);
				$classes[]=new Classe(estado::$class);
				
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
					if($clas==cuenta_cobrar::$class) {
						$classes[]=new Classe(cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==forma_pago_cliente::$class) {
						$classes[]=new Classe(forma_pago_cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==estado::$class) {
						$classes[]=new Classe(estado::$class);
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
					if($clas==cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==forma_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(forma_pago_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==estado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_ID, pago_cuenta_cobrar_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_ID_EMPRESA, pago_cuenta_cobrar_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_ID_SUCURSAL, pago_cuenta_cobrar_util::$ID_SUCURSAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_ID_EJERCICIO, pago_cuenta_cobrar_util::$ID_EJERCICIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_ID_PERIODO, pago_cuenta_cobrar_util::$ID_PERIODO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_ID_USUARIO, pago_cuenta_cobrar_util::$ID_USUARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_ID_CUENTA_COBRAR, pago_cuenta_cobrar_util::$ID_CUENTA_COBRAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_NUMERO, pago_cuenta_cobrar_util::$NUMERO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_ID_FORMA_PAGO_CLIENTE, pago_cuenta_cobrar_util::$ID_FORMA_PAGO_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_FECHA_EMISION, pago_cuenta_cobrar_util::$FECHA_EMISION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_FECHA_VENCE, pago_cuenta_cobrar_util::$FECHA_VENCE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_ABONO, pago_cuenta_cobrar_util::$ABONO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_SALDO, pago_cuenta_cobrar_util::$SALDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_DESCRIPCION, pago_cuenta_cobrar_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_ID_ESTADO, pago_cuenta_cobrar_util::$ID_ESTADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_REFERENCIA, pago_cuenta_cobrar_util::$REFERENCIA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_DEBITO, pago_cuenta_cobrar_util::$DEBITO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$LABEL_CREDITO, pago_cuenta_cobrar_util::$CREDITO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Cobrar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Cobrar',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Forma Pago Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Forma Pago Cliente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Vence',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vence',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Abono',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Abono',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Saldo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Saldo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Estado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',pago_cuenta_cobrar $pago_cuenta_cobrar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_sucursal_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_ejercicio_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_periodo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_usuario_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Cobrar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_cuenta_cobrar_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getnumero(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Forma Pago Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_forma_pago_cliente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getfecha_emision(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Vence',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getfecha_vence(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Abono',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getabono(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Saldo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getsaldo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getdescripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($pago_cuenta_cobrar->getid_estado_Descripcion(),40,6,1); $row[]=$cellReport;
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
	
	public static function getcuenta_cobrarDescripcion(?cuenta_cobrar $cuenta_cobrar) : string {
		$sDescripcion='none';
		if($cuenta_cobrar!==null) {
			$sDescripcion=cuenta_cobrar_util::getcuenta_cobrarDescripcion($cuenta_cobrar);
		}
		return $sDescripcion;
	}	
	
	public static function getforma_pago_clienteDescripcion(?forma_pago_cliente $forma_pago_cliente) : string {
		$sDescripcion='none';
		if($forma_pago_cliente!==null) {
			$sDescripcion=forma_pago_cliente_util::getforma_pago_clienteDescripcion($forma_pago_cliente);
		}
		return $sDescripcion;
	}	
	
	public static function getestadoDescripcion(?estado $estado) : string {
		$sDescripcion='none';
		if($estado!==null) {
			$sDescripcion=estado_util::getestadoDescripcion($estado);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface pago_cuenta_cobrar_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $pago_cuenta_cobrars,int $iIdNuevopago_cuenta_cobrar) : int;	
		public static function getIndiceActual(array $pago_cuenta_cobrars,pago_cuenta_cobrar $pago_cuenta_cobrar,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getpago_cuenta_cobrarDescripcion(?pago_cuenta_cobrar $pago_cuenta_cobrar) : string {;	
		public static function setpago_cuenta_cobrarDescripcion(?pago_cuenta_cobrar $pago_cuenta_cobrar,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $pago_cuenta_cobrars) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $pago_cuenta_cobrars);	
		public static function refrescarFKDescripcion(pago_cuenta_cobrar $pago_cuenta_cobrar);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',pago_cuenta_cobrar $pago_cuenta_cobrar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

