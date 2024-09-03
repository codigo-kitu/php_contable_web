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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\entity\asiento_predefinido_detalle;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;
use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL


class asiento_predefinido_detalle_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='asiento_predefinido_detalle';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='contabilidad.asiento_predefinido_detalles';
	/*'Mantenimientoasiento_predefinido_detalle.jsf';*/
	public static string $STR_MODULO_OPCION='contabilidad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoasiento_predefinido_detalle.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='asiento_predefinido_detallePersistenceName';
	/*.asiento_predefinido_detalle_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='asiento_predefinido_detalle_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='asiento_predefinido_detalle_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='asiento_predefinido_detalle_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Detalle Asiento Predefinidos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Detalle Asiento Predefinido';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CONTABILIDAD='contabilidad';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $STR_TABLE_NAME='asiento_predefinido_detalle';
	public static string $ASIENTO_PREDEFINIDO_DETALLE='con_asiento_predefinido_detalle';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.asiento_predefinido_detalle';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_asiento_predefinido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_centro_costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.orden,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable from '.asiento_predefinido_detalle_util::$SCHEMA.'.'.asiento_predefinido_detalle_util::$TABLENAME;*/
	
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
	//public $asiento_predefinido_detalleConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_ASIENTO_PREDEFINIDO='id_asiento_predefinido';
    public static string $ID_CUENTA='id_cuenta';
    public static string $ID_CENTRO_COSTO='id_centro_costo';
    public static string $ORDEN='orden';
    public static string $CUENTA_CONTABLE='cuenta_contable';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_ASIENTO_PREDEFINIDO=' Asiento Predefinido';
    public static string $LABEL_ID_CUENTA=' Cuenta';
    public static string $LABEL_ID_CENTRO_COSTO='Centro Costo';
    public static string $LABEL_ORDEN='Orden';
    public static string $LABEL_CUENTA_CONTABLE='Cuenta Contable';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_predefinido_detalleConstantesFuncionesAdditional=new $asiento_predefinido_detalleConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $asiento_predefinido_detalles,int $iIdNuevoasiento_predefinido_detalle) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($asiento_predefinido_detalles as $asiento_predefinido_detalleAux) {
			if($asiento_predefinido_detalleAux->getId()==$iIdNuevoasiento_predefinido_detalle) {
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
	
	public static function getIndiceActual(array $asiento_predefinido_detalles,asiento_predefinido_detalle $asiento_predefinido_detalle,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($asiento_predefinido_detalles as $asiento_predefinido_detalleAux) {
			if($asiento_predefinido_detalleAux->getId()==$asiento_predefinido_detalle->getId()) {
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
	public static function getasiento_predefinido_detalleDescripcion(?asiento_predefinido_detalle $asiento_predefinido_detalle) : string {//asiento_predefinido_detalle NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($asiento_predefinido_detalle !=null) {
			/*&& asiento_predefinido_detalle->getId()!=0*/
			
			if($asiento_predefinido_detalle->getId()!=null) {
				$sDescripcion=(string)$asiento_predefinido_detalle->getId();
			}
			
			/*asiento_predefinido_detalle;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setasiento_predefinido_detalleDescripcion(?asiento_predefinido_detalle $asiento_predefinido_detalle,string $sValor) {			
		if($asiento_predefinido_detalle !=null) {
			
			/*asiento_predefinido_detalle;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $asiento_predefinido_detalles) : array {
		$asiento_predefinido_detallesForeignKey=array();
		
		foreach ($asiento_predefinido_detalles as $asiento_predefinido_detalleLocal) {
			$asiento_predefinido_detallesForeignKey[$asiento_predefinido_detalleLocal->getId()]=asiento_predefinido_detalle_util::getasiento_predefinido_detalleDescripcion($asiento_predefinido_detalleLocal);
		}
			
		return $asiento_predefinido_detallesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_asiento_predefinido() : string  { return ' Asiento Predefinido'; }
    public static function getColumnLabelid_cuenta() : string  { return ' Cuenta'; }
    public static function getColumnLabelid_centro_costo() : string  { return 'Centro Costo'; }
    public static function getColumnLabelorden() : string  { return 'Orden'; }
    public static function getColumnLabelcuenta_contable() : string  { return 'Cuenta Contable'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $asiento_predefinido_detalles) {		
		try {
			
			$asiento_predefinido_detalle = new asiento_predefinido_detalle();
			
			foreach($asiento_predefinido_detalles as $asiento_predefinido_detalle) {
				
				$asiento_predefinido_detalle->setid_asiento_predefinido_Descripcion(asiento_predefinido_detalle_util::getasiento_predefinidoDescripcion($asiento_predefinido_detalle->getasiento_predefinido()));
				$asiento_predefinido_detalle->setid_cuenta_Descripcion(asiento_predefinido_detalle_util::getcuentaDescripcion($asiento_predefinido_detalle->getcuenta()));
				$asiento_predefinido_detalle->setid_centro_costo_Descripcion(asiento_predefinido_detalle_util::getcentro_costoDescripcion($asiento_predefinido_detalle->getcentro_costo()));
			}
			
			if($asiento_predefinido_detalle!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(asiento_predefinido_detalle $asiento_predefinido_detalle) {		
		try {
			
			
				$asiento_predefinido_detalle->setid_asiento_predefinido_Descripcion(asiento_predefinido_detalle_util::getasiento_predefinidoDescripcion($asiento_predefinido_detalle->getasiento_predefinido()));
				$asiento_predefinido_detalle->setid_cuenta_Descripcion(asiento_predefinido_detalle_util::getcuentaDescripcion($asiento_predefinido_detalle->getcuenta()));
				$asiento_predefinido_detalle->setid_centro_costo_Descripcion(asiento_predefinido_detalle_util::getcentro_costoDescripcion($asiento_predefinido_detalle->getcentro_costo()));
							
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
		} else if($sNombreIndice=='FK_Idasiento_predefinido') {
			$sNombreIndice='Tipo=  Por  Asiento Predefinido';
		} else if($sNombreIndice=='FK_Idcentro_costo') {
			$sNombreIndice='Tipo=  Por Centro Costo';
		} else if($sNombreIndice=='FK_Idcuenta') {
			$sNombreIndice='Tipo=  Por  Cuenta';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idasiento_predefinido(int $id_asiento_predefinido) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Asiento Predefinido='+$id_asiento_predefinido; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcentro_costo(int $id_centro_costo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Centro Costo='+$id_centro_costo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta(int $id_cuenta) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuenta='+$id_cuenta; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return asiento_predefinido_detalle_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return asiento_predefinido_detalle_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_detalle_util::$LABEL_ID_ASIENTO_PREDEFINIDO);
			$reporte->setsDescripcion(asiento_predefinido_detalle_util::$LABEL_ID_ASIENTO_PREDEFINIDO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_detalle_util::$LABEL_ID_CUENTA);
			$reporte->setsDescripcion(asiento_predefinido_detalle_util::$LABEL_ID_CUENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_detalle_util::$LABEL_ID_CENTRO_COSTO);
			$reporte->setsDescripcion(asiento_predefinido_detalle_util::$LABEL_ID_CENTRO_COSTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_detalle_util::$LABEL_ORDEN);
			$reporte->setsDescripcion(asiento_predefinido_detalle_util::$LABEL_ORDEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_predefinido_detalle_util::$LABEL_CUENTA_CONTABLE);
			$reporte->setsDescripcion(asiento_predefinido_detalle_util::$LABEL_CUENTA_CONTABLE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=asiento_predefinido_detalle_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		
		
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
				
				$classes[]=new Classe(asiento_predefinido::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(centro_costo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==asiento_predefinido::$class) {
						$classes[]=new Classe(asiento_predefinido::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==centro_costo::$class) {
						$classes[]=new Classe(centro_costo::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==asiento_predefinido::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_predefinido::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_detalle_util::$LABEL_ID, asiento_predefinido_detalle_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_detalle_util::$LABEL_ID_ASIENTO_PREDEFINIDO, asiento_predefinido_detalle_util::$ID_ASIENTO_PREDEFINIDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_detalle_util::$LABEL_ID_CUENTA, asiento_predefinido_detalle_util::$ID_CUENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_detalle_util::$LABEL_ID_CENTRO_COSTO, asiento_predefinido_detalle_util::$ID_CENTRO_COSTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_detalle_util::$LABEL_ORDEN, asiento_predefinido_detalle_util::$ORDEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_detalle_util::$LABEL_CUENTA_CONTABLE, asiento_predefinido_detalle_util::$CUENTA_CONTABLE,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Asiento Predefinido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Asiento Predefinido',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Centro Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Centro Costo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',asiento_predefinido_detalle $asiento_predefinido_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Asiento Predefinido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido_detalle->getid_asiento_predefinido_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido_detalle->getid_cuenta_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Centro Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_predefinido_detalle->getid_centro_costo_Descripcion(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getasiento_predefinidoDescripcion(?asiento_predefinido $asiento_predefinido) : string {
		$sDescripcion='none';
		if($asiento_predefinido!==null) {
			$sDescripcion=asiento_predefinido_util::getasiento_predefinidoDescripcion($asiento_predefinido);
		}
		return $sDescripcion;
	}	
	
	public static function getcuentaDescripcion(?cuenta $cuenta) : string {
		$sDescripcion='none';
		if($cuenta!==null) {
			$sDescripcion=cuenta_util::getcuentaDescripcion($cuenta);
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
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface asiento_predefinido_detalle_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $asiento_predefinido_detalles,int $iIdNuevoasiento_predefinido_detalle) : int;	
		public static function getIndiceActual(array $asiento_predefinido_detalles,asiento_predefinido_detalle $asiento_predefinido_detalle,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getasiento_predefinido_detalleDescripcion(?asiento_predefinido_detalle $asiento_predefinido_detalle) : string {;	
		public static function setasiento_predefinido_detalleDescripcion(?asiento_predefinido_detalle $asiento_predefinido_detalle,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $asiento_predefinido_detalles) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $asiento_predefinido_detalles);	
		public static function refrescarFKDescripcion(asiento_predefinido_detalle $asiento_predefinido_detalle);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',asiento_predefinido_detalle $asiento_predefinido_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

