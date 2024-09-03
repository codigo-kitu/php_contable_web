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

namespace com\bydan\contabilidad\inventario\kardex\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;


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
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;
use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL

use com\bydan\contabilidad\inventario\kardex_detalle\business\entity\kardex_detalle;
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_util;

class kardex_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='kardex';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='inventario.kardexs';
	/*'Mantenimientokardex.jsf';*/
	public static string $STR_MODULO_OPCION='inventario';
	public static string $STR_NOMBRE_CLASE='Mantenimientokardex.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='kardexPersistenceName';
	/*.kardex_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='kardex_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='kardex_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='kardex_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Kardexes';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Kardex';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $INVENTARIO='inventario';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $STR_TABLE_NAME='kardex';
	public static string $KARDEX='inv_kardex';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.kardex';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_modulo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_kardex,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_documento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo from '.kardex_util::$SCHEMA.'.'.kardex_util::$TABLENAME;*/
	
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
	//public $kardexConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_SUCURSAL='id_sucursal';
    public static string $ID_EJERCICIO='id_ejercicio';
    public static string $ID_PERIODO='id_periodo';
    public static string $ID_USUARIO='id_usuario';
    public static string $ID_MODULO='id_modulo';
    public static string $ID_TIPO_KARDEX='id_tipo_kardex';
    public static string $NUMERO='numero';
    public static string $NUMERO_DOCUMENTO='numero_documento';
    public static string $ID_PROVEEDOR='id_proveedor';
    public static string $ID_CLIENTE='id_cliente';
    public static string $TOTAL='total';
    public static string $DESCRIPCION='descripcion';
    public static string $ID_ESTADO='id_estado';
    public static string $COSTO='costo';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_SUCURSAL='Sucursal';
    public static string $LABEL_ID_EJERCICIO='Ejercicio';
    public static string $LABEL_ID_PERIODO='Periodo';
    public static string $LABEL_ID_USUARIO='Usuario';
    public static string $LABEL_ID_MODULO='Modulo';
    public static string $LABEL_ID_TIPO_KARDEX='Tipo Kardex';
    public static string $LABEL_NUMERO='Numero';
    public static string $LABEL_NUMERO_DOCUMENTO='Nro Documento Soporte';
    public static string $LABEL_ID_PROVEEDOR=' Proveedores';
    public static string $LABEL_ID_CLIENTE=' Clientes';
    public static string $LABEL_TOTAL='Total';
    public static string $LABEL_DESCRIPCION='Descripcion';
    public static string $LABEL_ID_ESTADO='Estado';
    public static string $LABEL_COSTO='Costo';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->kardexConstantesFuncionesAdditional=new $kardexConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $kardexs,int $iIdNuevokardex) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($kardexs as $kardexAux) {
			if($kardexAux->getId()==$iIdNuevokardex) {
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
	
	public static function getIndiceActual(array $kardexs,kardex $kardex,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($kardexs as $kardexAux) {
			if($kardexAux->getId()==$kardex->getId()) {
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
	public static function getkardexDescripcion(?kardex $kardex) : string {//kardex NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($kardex !=null) {
			/*&& kardex->getId()!=0*/
			
			if($kardex->getId()!=null) {
				$sDescripcion=(string)$kardex->getId();
			}
			
			/*kardex;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setkardexDescripcion(?kardex $kardex,string $sValor) {			
		if($kardex !=null) {
			
			/*kardex;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $kardexs) : array {
		$kardexsForeignKey=array();
		
		foreach ($kardexs as $kardexLocal) {
			$kardexsForeignKey[$kardexLocal->getId()]=kardex_util::getkardexDescripcion($kardexLocal);
		}
			
		return $kardexsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_sucursal() : string  { return 'Sucursal'; }
    public static function getColumnLabelid_ejercicio() : string  { return 'Ejercicio'; }
    public static function getColumnLabelid_periodo() : string  { return 'Periodo'; }
    public static function getColumnLabelid_usuario() : string  { return 'Usuario'; }
    public static function getColumnLabelid_modulo() : string  { return 'Modulo'; }
    public static function getColumnLabelid_tipo_kardex() : string  { return 'Tipo Kardex'; }
    public static function getColumnLabelnumero() : string  { return 'Numero'; }
    public static function getColumnLabelnumero_documento() : string  { return 'Nro Documento Soporte'; }
    public static function getColumnLabelid_proveedor() : string  { return ' Proveedores'; }
    public static function getColumnLabelid_cliente() : string  { return ' Clientes'; }
    public static function getColumnLabeltotal() : string  { return 'Total'; }
    public static function getColumnLabeldescripcion() : string  { return 'Descripcion'; }
    public static function getColumnLabelid_estado() : string  { return 'Estado'; }
    public static function getColumnLabelcosto() : string  { return 'Costo'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $kardexs) {		
		try {
			
			$kardex = new kardex();
			
			foreach($kardexs as $kardex) {
				
				$kardex->setid_empresa_Descripcion(kardex_util::getempresaDescripcion($kardex->getempresa()));
				$kardex->setid_sucursal_Descripcion(kardex_util::getsucursalDescripcion($kardex->getsucursal()));
				$kardex->setid_ejercicio_Descripcion(kardex_util::getejercicioDescripcion($kardex->getejercicio()));
				$kardex->setid_periodo_Descripcion(kardex_util::getperiodoDescripcion($kardex->getperiodo()));
				$kardex->setid_usuario_Descripcion(kardex_util::getusuarioDescripcion($kardex->getusuario()));
				$kardex->setid_modulo_Descripcion(kardex_util::getmoduloDescripcion($kardex->getmodulo()));
				$kardex->setid_tipo_kardex_Descripcion(kardex_util::gettipo_kardexDescripcion($kardex->gettipo_kardex()));
				$kardex->setid_proveedor_Descripcion(kardex_util::getproveedorDescripcion($kardex->getproveedor()));
				$kardex->setid_cliente_Descripcion(kardex_util::getclienteDescripcion($kardex->getcliente()));
				$kardex->setid_estado_Descripcion(kardex_util::getestadoDescripcion($kardex->getestado()));
			}
			
			if($kardex!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(kardex $kardex) {		
		try {
			
			
				$kardex->setid_empresa_Descripcion(kardex_util::getempresaDescripcion($kardex->getempresa()));
				$kardex->setid_sucursal_Descripcion(kardex_util::getsucursalDescripcion($kardex->getsucursal()));
				$kardex->setid_ejercicio_Descripcion(kardex_util::getejercicioDescripcion($kardex->getejercicio()));
				$kardex->setid_periodo_Descripcion(kardex_util::getperiodoDescripcion($kardex->getperiodo()));
				$kardex->setid_usuario_Descripcion(kardex_util::getusuarioDescripcion($kardex->getusuario()));
				$kardex->setid_modulo_Descripcion(kardex_util::getmoduloDescripcion($kardex->getmodulo()));
				$kardex->setid_tipo_kardex_Descripcion(kardex_util::gettipo_kardexDescripcion($kardex->gettipo_kardex()));
				$kardex->setid_proveedor_Descripcion(kardex_util::getproveedorDescripcion($kardex->getproveedor()));
				$kardex->setid_cliente_Descripcion(kardex_util::getclienteDescripcion($kardex->getcliente()));
				$kardex->setid_estado_Descripcion(kardex_util::getestadoDescripcion($kardex->getestado()));
							
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
		} else if($sNombreIndice=='FK_Idcliente') {
			$sNombreIndice='Tipo=  Por  Clientes';
		} else if($sNombreIndice=='FK_Idejercicio') {
			$sNombreIndice='Tipo=  Por Ejercicio';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idestado') {
			$sNombreIndice='Tipo=  Por Estado';
		} else if($sNombreIndice=='FK_Idmodulo') {
			$sNombreIndice='Tipo=  Por Modulo';
		} else if($sNombreIndice=='FK_Idperiodo') {
			$sNombreIndice='Tipo=  Por Periodo';
		} else if($sNombreIndice=='FK_Idproveedor') {
			$sNombreIndice='Tipo=  Por  Proveedores';
		} else if($sNombreIndice=='FK_Idsucursal') {
			$sNombreIndice='Tipo=  Por Sucursal';
		} else if($sNombreIndice=='FK_Idtipo_kardex') {
			$sNombreIndice='Tipo=  Por Tipo Kardex';
		} else if($sNombreIndice=='FK_Idusuario') {
			$sNombreIndice='Tipo=  Por Usuario';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idcliente(?int $id_cliente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Clientes='+$id_cliente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idejercicio(int $id_ejercicio) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Ejercicio='+$id_ejercicio; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idestado(int $id_estado) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Estado='+$id_estado; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idmodulo(int $id_modulo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Modulo='+$id_modulo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idperiodo(int $id_periodo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Periodo='+$id_periodo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idproveedor(?int $id_proveedor) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Proveedores='+$id_proveedor; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idsucursal(int $id_sucursal) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Sucursal='+$id_sucursal; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_kardex(int $id_tipo_kardex) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Tipo Kardex='+$id_tipo_kardex; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idusuario(int $id_usuario) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Usuario='+$id_usuario; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return kardex_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return kardex_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(kardex_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_ID_SUCURSAL);
			$reporte->setsDescripcion(kardex_util::$LABEL_ID_SUCURSAL.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_ID_EJERCICIO);
			$reporte->setsDescripcion(kardex_util::$LABEL_ID_EJERCICIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_ID_PERIODO);
			$reporte->setsDescripcion(kardex_util::$LABEL_ID_PERIODO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_ID_USUARIO);
			$reporte->setsDescripcion(kardex_util::$LABEL_ID_USUARIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_ID_MODULO);
			$reporte->setsDescripcion(kardex_util::$LABEL_ID_MODULO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_ID_TIPO_KARDEX);
			$reporte->setsDescripcion(kardex_util::$LABEL_ID_TIPO_KARDEX.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_NUMERO);
			$reporte->setsDescripcion(kardex_util::$LABEL_NUMERO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_NUMERO_DOCUMENTO);
			$reporte->setsDescripcion(kardex_util::$LABEL_NUMERO_DOCUMENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_ID_PROVEEDOR);
			$reporte->setsDescripcion(kardex_util::$LABEL_ID_PROVEEDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_ID_CLIENTE);
			$reporte->setsDescripcion(kardex_util::$LABEL_ID_CLIENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_TOTAL);
			$reporte->setsDescripcion(kardex_util::$LABEL_TOTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(kardex_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_ID_ESTADO);
			$reporte->setsDescripcion(kardex_util::$LABEL_ID_ESTADO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(kardex_util::$LABEL_COSTO);
			$reporte->setsDescripcion(kardex_util::$LABEL_COSTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=kardex_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==kardex_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=kardex_util::$ID_EMPRESA;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==kardex_util::$ID_SUCURSAL) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=kardex_util::$ID_SUCURSAL;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==kardex_util::$ID_EJERCICIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=kardex_util::$ID_EJERCICIO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==kardex_util::$ID_PERIODO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=kardex_util::$ID_PERIODO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==kardex_util::$ID_USUARIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=kardex_util::$ID_USUARIO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==kardex_util::$ID_MODULO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=kardex_util::$ID_MODULO;
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
				$classes[]=new Classe(modulo::$class);
				$classes[]=new Classe(tipo_kardex::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(cliente::$class);
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
					if($clas==modulo::$class) {
						$classes[]=new Classe(modulo::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_kardex::$class) {
						$classes[]=new Classe(tipo_kardex::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
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
					if($clas==modulo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(modulo::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==tipo_kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_kardex::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
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
				
				$classes[]=new Classe(kardex_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==kardex_detalle::$class) {
						$classes[]=new Classe(kardex_detalle::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==kardex_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(kardex_detalle::$class);
				}

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
		
		
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_ID, kardex_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_ID_EMPRESA, kardex_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_ID_SUCURSAL, kardex_util::$ID_SUCURSAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_ID_EJERCICIO, kardex_util::$ID_EJERCICIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_ID_PERIODO, kardex_util::$ID_PERIODO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_ID_USUARIO, kardex_util::$ID_USUARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_ID_MODULO, kardex_util::$ID_MODULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_ID_TIPO_KARDEX, kardex_util::$ID_TIPO_KARDEX,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_NUMERO, kardex_util::$NUMERO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_NUMERO_DOCUMENTO, kardex_util::$NUMERO_DOCUMENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_ID_PROVEEDOR, kardex_util::$ID_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_ID_CLIENTE, kardex_util::$ID_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_TOTAL, kardex_util::$TOTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_DESCRIPCION, kardex_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_ID_ESTADO, kardex_util::$ID_ESTADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$LABEL_COSTO, kardex_util::$COSTO,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,kardex_detalle_util::$STR_CLASS_WEB_TITULO, kardex_detalle_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sucursal',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ejercicio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Periodo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usuario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Kardex',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Kardex',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento Soporte',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Documento Soporte',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Proveedores',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Proveedores',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Clientes',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Clientes',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Total',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',kardex $kardex,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getid_sucursal_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getid_ejercicio_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getid_periodo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getid_usuario_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getid_modulo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Kardex',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getid_tipo_kardex_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getnumero(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento Soporte',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getnumero_documento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Proveedores',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getid_proveedor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Clientes',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getid_cliente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->gettotal(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getdescripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($kardex->getid_estado_Descripcion(),40,6,1); $row[]=$cellReport;
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
	
	public static function getmoduloDescripcion(?modulo $modulo) : string {
		$sDescripcion='none';
		if($modulo!==null) {
			$sDescripcion=modulo_util::getmoduloDescripcion($modulo);
		}
		return $sDescripcion;
	}	
	
	public static function gettipo_kardexDescripcion(?tipo_kardex $tipo_kardex) : string {
		$sDescripcion='none';
		if($tipo_kardex!==null) {
			$sDescripcion=tipo_kardex_util::gettipo_kardexDescripcion($tipo_kardex);
		}
		return $sDescripcion;
	}	
	
	public static function getproveedorDescripcion(?proveedor $proveedor) : string {
		$sDescripcion='none';
		if($proveedor!==null) {
			$sDescripcion=proveedor_util::getproveedorDescripcion($proveedor);
		}
		return $sDescripcion;
	}	
	
	public static function getclienteDescripcion(?cliente $cliente) : string {
		$sDescripcion='none';
		if($cliente!==null) {
			$sDescripcion=cliente_util::getclienteDescripcion($cliente);
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
	
	interface kardex_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $kardexs,int $iIdNuevokardex) : int;	
		public static function getIndiceActual(array $kardexs,kardex $kardex,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getkardexDescripcion(?kardex $kardex) : string {;	
		public static function setkardexDescripcion(?kardex $kardex,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $kardexs) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $kardexs);	
		public static function refrescarFKDescripcion(kardex $kardex);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',kardex $kardex,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

