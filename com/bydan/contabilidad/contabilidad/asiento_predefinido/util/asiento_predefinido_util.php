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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;


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
use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;
use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;
use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_util;

//REL

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\entity\asiento_predefinido_detalle;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

class asiento_predefinido_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='asiento_predefinido';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='contabilidad.asiento_predefinidos';
	/*'Mantenimientoasiento_predefinido.jsf';*/
	public static string $STR_MODULO_OPCION='contabilidad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoasiento_predefinido.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='asiento_predefinidoPersistenceName';
	/*.asiento_predefinido_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='asiento_predefinido_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='asiento_predefinido_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='asiento_predefinido_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Asiento Predefinidos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Asiento Predefinido';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CONTABILIDAD='contabilidad';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $STR_TABLE_NAME='asiento_predefinido';
	public static string $ASIENTO_PREDEFINIDO='con_asiento_predefinido';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.asiento_predefinido';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_modulo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_libro_auxiliar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_centro_costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_documento_contable,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_nit,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.referencia from '.asiento_predefinido_util::$SCHEMA.'.'.asiento_predefinido_util::$TABLENAME;*/
	
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
	//public $asiento_predefinidoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_SUCURSAL='id_sucursal';
    public static string $ID_EJERCICIO='id_ejercicio';
    public static string $ID_PERIODO='id_periodo';
    public static string $ID_USUARIO='id_usuario';
    public static string $ID_MODULO='id_modulo';
    public static string $CODIGO='codigo';
    public static string $NOMBRE='nombre';
    public static string $ID_FUENTE='id_fuente';
    public static string $ID_LIBRO_AUXILIAR='id_libro_auxiliar';
    public static string $ID_CENTRO_COSTO='id_centro_costo';
    public static string $ID_DOCUMENTO_CONTABLE='id_documento_contable';
    public static string $DESCRIPCION='descripcion';
    public static string $NRO_NIT='nro_nit';
    public static string $REFERENCIA='referencia';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_SUCURSAL=' Sucursal';
    public static string $LABEL_ID_EJERCICIO=' Ejercicio';
    public static string $LABEL_ID_PERIODO=' Periodo';
    public static string $LABEL_ID_USUARIO=' Usuario';
    public static string $LABEL_ID_MODULO='Modulo';
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_ID_FUENTE='Fuente';
    public static string $LABEL_ID_LIBRO_AUXILIAR='Libro Auxiliar';
    public static string $LABEL_ID_CENTRO_COSTO='Centro Costo';
    public static string $LABEL_ID_DOCUMENTO_CONTABLE='Dcto Contable';
    public static string $LABEL_DESCRIPCION='Descripcion';
    public static string $LABEL_NRO_NIT='Nro Nit';
    public static string $LABEL_REFERENCIA='Referencia';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_predefinidoConstantesFuncionesAdditional=new $asiento_predefinidoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $asiento_predefinidos,int $iIdNuevoasiento_predefinido) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($asiento_predefinidos as $asiento_predefinidoAux) {
			if($asiento_predefinidoAux->getId()==$iIdNuevoasiento_predefinido) {
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
	
	public static function getIndiceActual(array $asiento_predefinidos,asiento_predefinido $asiento_predefinido,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($asiento_predefinidos as $asiento_predefinidoAux) {
			if($asiento_predefinidoAux->getId()==$asiento_predefinido->getId()) {
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
	public static function getasiento_predefinidoDescripcion(?asiento_predefinido $asiento_predefinido) : string {//asiento_predefinido NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($asiento_predefinido !=null) {
			/*&& asiento_predefinido->getId()!=0*/
			
			$sDescripcion=($asiento_predefinido->getcodigo());
			
			/*asiento_predefinido;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setasiento_predefinidoDescripcion(?asiento_predefinido $asiento_predefinido,string $sValor) {			
		if($asiento_predefinido !=null) {
			$asiento_predefinido->setcodigo($sValor);;
			/*asiento_predefinido;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $asiento_predefinidos) : array {
		$asiento_predefinidosForeignKey=array();
		
		foreach ($asiento_predefinidos as $asiento_predefinidoLocal) {
			$asiento_predefinidosForeignKey[$asiento_predefinidoLocal->getId()]=asiento_predefinido_util::getasiento_predefinidoDescripcion($asiento_predefinidoLocal);
		}
			
		return $asiento_predefinidosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_sucursal() : string  { return ' Sucursal'; }
    public static function getColumnLabelid_ejercicio() : string  { return ' Ejercicio'; }
    public static function getColumnLabelid_periodo() : string  { return ' Periodo'; }
    public static function getColumnLabelid_usuario() : string  { return ' Usuario'; }
    public static function getColumnLabelid_modulo() : string  { return 'Modulo'; }
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelid_fuente() : string  { return 'Fuente'; }
    public static function getColumnLabelid_libro_auxiliar() : string  { return 'Libro Auxiliar'; }
    public static function getColumnLabelid_centro_costo() : string  { return 'Centro Costo'; }
    public static function getColumnLabelid_documento_contable() : string  { return 'Dcto Contable'; }
    public static function getColumnLabeldescripcion() : string  { return 'Descripcion'; }
    public static function getColumnLabelnro_nit() : string  { return 'Nro Nit'; }
    public static function getColumnLabelreferencia() : string  { return 'Referencia'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $asiento_predefinidos) {		
		try {
			
			$asiento_predefinido = new asiento_predefinido();
			
			foreach($asiento_predefinidos as $asiento_predefinido) {
				
				$asiento_predefinido->setid_empresa_Descripcion(asiento_predefinido_util::getempresaDescripcion($asiento_predefinido->getempresa()));
				$asiento_predefinido->setid_sucursal_Descripcion(asiento_predefinido_util::getsucursalDescripcion($asiento_predefinido->getsucursal()));
				$asiento_predefinido->setid_ejercicio_Descripcion(asiento_predefinido_util::getejercicioDescripcion($asiento_predefinido->getejercicio()));
				$asiento_predefinido->setid_periodo_Descripcion(asiento_predefinido_util::getperiodoDescripcion($asiento_predefinido->getperiodo()));
				$asiento_predefinido->setid_usuario_Descripcion(asiento_predefinido_util::getusuarioDescripcion($asiento_predefinido->getusuario()));
				$asiento_predefinido->setid_modulo_Descripcion(asiento_predefinido_util::getmoduloDescripcion($asiento_predefinido->getmodulo()));
				$asiento_predefinido->setid_fuente_Descripcion(asiento_predefinido_util::getfuenteDescripcion($asiento_predefinido->getfuente()));
				$asiento_predefinido->setid_libro_auxiliar_Descripcion(asiento_predefinido_util::getlibro_auxiliarDescripcion($asiento_predefinido->getlibro_auxiliar()));
				$asiento_predefinido->setid_centro_costo_Descripcion(asiento_predefinido_util::getcentro_costoDescripcion($asiento_predefinido->getcentro_costo()));
				$asiento_predefinido->setid_documento_contable_Descripcion(asiento_predefinido_util::getdocumento_contableDescripcion($asiento_predefinido->getdocumento_contable()));
			}
			
			if($asiento_predefinido!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(asiento_predefinido $asiento_predefinido) {		
		try {
			
			
				$asiento_predefinido->setid_empresa_Descripcion(asiento_predefinido_util::getempresaDescripcion($asiento_predefinido->getempresa()));
				$asiento_predefinido->setid_sucursal_Descripcion(asiento_predefinido_util::getsucursalDescripcion($asiento_predefinido->getsucursal()));
				$asiento_predefinido->setid_ejercicio_Descripcion(asiento_predefinido_util::getejercicioDescripcion($asiento_predefinido->getejercicio()));
				$asiento_predefinido->setid_periodo_Descripcion(asiento_predefinido_util::getperiodoDescripcion($asiento_predefinido->getperiodo()));
				$asiento_predefinido->setid_usuario_Descripcion(asiento_predefinido_util::getusuarioDescripcion($asiento_predefinido->getusuario()));
				$asiento_predefinido->setid_modulo_Descripcion(asiento_predefinido_util::getmoduloDescripcion($asiento_predefinido->getmodulo()));
				$asiento_predefinido->setid_fuente_Descripcion(asiento_predefinido_util::getfuenteDescripcion($asiento_predefinido->getfuente()));
				$asiento_predefinido->setid_libro_auxiliar_Descripcion(asiento_predefinido_util::getlibro_auxiliarDescripcion($asiento_predefinido->getlibro_auxiliar()));
				$asiento_predefinido->setid_centro_costo_Descripcion(asiento_predefinido_util::getcentro_costoDescripcion($asiento_predefinido->getcentro_costo()));
				$asiento_predefinido->setid_documento_contable_Descripcion(asiento_predefinido_util::getdocumento_contableDescripcion($asiento_predefinido->getdocumento_contable()));
							
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
		} else if($sNombreIndice=='FK_Idcentro_costo') {
			$sNombreIndice='Tipo=  Por Centro Costo';
		} else if($sNombreIndice=='FK_Iddocumento_contable') {
			$sNombreIndice='Tipo=  Por Dcto Contable';
		} else if($sNombreIndice=='FK_Idejercicio') {
			$sNombreIndice='Tipo=  Por  Ejercicio';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idfuente') {
			$sNombreIndice='Tipo=  Por Fuente';
		} else if($sNombreIndice=='FK_Idlibro_auxiliar') {
			$sNombreIndice='Tipo=  Por Libro Auxiliar';
		} else if($sNombreIndice=='FK_Idmodulo') {
			$sNombreIndice='Tipo=  Por Modulo';
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

	public static function getDetalleIndiceFK_Idcentro_costo(int $id_centro_costo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Centro Costo='+$id_centro_costo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Iddocumento_contable(int $id_documento_contable) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Dcto Contable='+$id_documento_contable; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idejercicio(int $id_ejercicio) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Ejercicio='+$id_ejercicio; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idfuente(int $id_fuente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Fuente='+$id_fuente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idlibro_auxiliar(int $id_libro_auxiliar) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Libro Auxiliar='+$id_libro_auxiliar; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idmodulo(int $id_modulo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Modulo='+$id_modulo; 

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
		return asiento_predefinido_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return asiento_predefinido_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_ID_SUCURSAL);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_ID_SUCURSAL.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_ID_EJERCICIO);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_ID_EJERCICIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_ID_PERIODO);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_ID_PERIODO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_ID_USUARIO);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_ID_USUARIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_ID_MODULO);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_ID_MODULO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_ID_FUENTE);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_ID_FUENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_ID_LIBRO_AUXILIAR);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_ID_LIBRO_AUXILIAR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_ID_CENTRO_COSTO);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_ID_CENTRO_COSTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_ID_DOCUMENTO_CONTABLE);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_ID_DOCUMENTO_CONTABLE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_NRO_NIT);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_NRO_NIT);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_util::$LABEL_REFERENCIA);
			$reporte->setsDescripcion(asiento_predefinido_util::$LABEL_REFERENCIA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=asiento_predefinido_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==asiento_predefinido_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=asiento_predefinido_util::$ID_EMPRESA;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==asiento_predefinido_util::$ID_SUCURSAL) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=asiento_predefinido_util::$ID_SUCURSAL;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==asiento_predefinido_util::$ID_EJERCICIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=asiento_predefinido_util::$ID_EJERCICIO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==asiento_predefinido_util::$ID_PERIODO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=asiento_predefinido_util::$ID_PERIODO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==asiento_predefinido_util::$ID_USUARIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=asiento_predefinido_util::$ID_USUARIO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==asiento_predefinido_util::$ID_MODULO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=asiento_predefinido_util::$ID_MODULO;
		}
		
		return $arrColumnasGlobales;
	}
	
	public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		
		$arrColumnasGlobales[]=asiento_predefinido_util::$ID_MODULO;
		
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
				$classes[]=new Classe(fuente::$class);
				$classes[]=new Classe(libro_auxiliar::$class);
				$classes[]=new Classe(centro_costo::$class);
				$classes[]=new Classe(documento_contable::$class);
				
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
					if($clas==fuente::$class) {
						$classes[]=new Classe(fuente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==libro_auxiliar::$class) {
						$classes[]=new Classe(libro_auxiliar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==centro_costo::$class) {
						$classes[]=new Classe(centro_costo::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==documento_contable::$class) {
						$classes[]=new Classe(documento_contable::$class);
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
					if($clas==fuente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(fuente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==libro_auxiliar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(libro_auxiliar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==centro_costo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(centro_costo::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==documento_contable::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_contable::$class);
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
				
				$classes[]=new Classe(asiento_predefinido_detalle::$class);
				$classes[]=new Classe(asiento::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==asiento_predefinido_detalle::$class) {
						$classes[]=new Classe(asiento_predefinido_detalle::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==asiento_predefinido_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_predefinido_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==asiento::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_ID, asiento_predefinido_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_ID_EMPRESA, asiento_predefinido_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_ID_SUCURSAL, asiento_predefinido_util::$ID_SUCURSAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_ID_EJERCICIO, asiento_predefinido_util::$ID_EJERCICIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_ID_PERIODO, asiento_predefinido_util::$ID_PERIODO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_ID_USUARIO, asiento_predefinido_util::$ID_USUARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_ID_MODULO, asiento_predefinido_util::$ID_MODULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_CODIGO, asiento_predefinido_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_NOMBRE, asiento_predefinido_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_ID_FUENTE, asiento_predefinido_util::$ID_FUENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_ID_LIBRO_AUXILIAR, asiento_predefinido_util::$ID_LIBRO_AUXILIAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_ID_CENTRO_COSTO, asiento_predefinido_util::$ID_CENTRO_COSTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_ID_DOCUMENTO_CONTABLE, asiento_predefinido_util::$ID_DOCUMENTO_CONTABLE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_DESCRIPCION, asiento_predefinido_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_NRO_NIT, asiento_predefinido_util::$NRO_NIT,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$LABEL_REFERENCIA, asiento_predefinido_util::$REFERENCIA,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_detalle_util::$STR_CLASS_WEB_TITULO, asiento_predefinido_detalle_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_util::$STR_CLASS_WEB_TITULO, asiento_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Modulo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fuente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fuente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Libro Auxiliar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Libro Auxiliar',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Centro Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Centro Costo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Dcto Contable',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Dcto Contable',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',asiento_predefinido $asiento_predefinido,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_sucursal_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_ejercicio_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_periodo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_usuario_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_modulo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fuente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_fuente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Libro Auxiliar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_libro_auxiliar_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Centro Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_centro_costo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Dcto Contable',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getid_documento_contable_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido->getdescripcion(),40,6,1); $row[]=$cellReport;
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
	
	public static function getfuenteDescripcion(?fuente $fuente) : string {
		$sDescripcion='none';
		if($fuente!==null) {
			$sDescripcion=fuente_util::getfuenteDescripcion($fuente);
		}
		return $sDescripcion;
	}	
	
	public static function getlibro_auxiliarDescripcion(?libro_auxiliar $libro_auxiliar) : string {
		$sDescripcion='none';
		if($libro_auxiliar!==null) {
			$sDescripcion=libro_auxiliar_util::getlibro_auxiliarDescripcion($libro_auxiliar);
		}
		return $sDescripcion;
	}	
	
	public static function getcentro_costoDescripcion(?centro_costo $centro_costo) : string {
		$sDescripcion='none';
		if($centro_costo!==null) {
			$sDescripcion=centro_costo_util::getcentro_costoDescripcion($centro_costo);
		}
		return $sDescripcion;
	}	
	
	public static function getdocumento_contableDescripcion(?documento_contable $documento_contable) : string {
		$sDescripcion='none';
		if($documento_contable!==null) {
			$sDescripcion=documento_contable_util::getdocumento_contableDescripcion($documento_contable);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface asiento_predefinido_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $asiento_predefinidos,int $iIdNuevoasiento_predefinido) : int;	
		public static function getIndiceActual(array $asiento_predefinidos,asiento_predefinido $asiento_predefinido,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getasiento_predefinidoDescripcion(?asiento_predefinido $asiento_predefinido) : string {;	
		public static function setasiento_predefinidoDescripcion(?asiento_predefinido $asiento_predefinido,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $asiento_predefinidos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $asiento_predefinidos);	
		public static function refrescarFKDescripcion(asiento_predefinido $asiento_predefinido);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',asiento_predefinido $asiento_predefinido,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

