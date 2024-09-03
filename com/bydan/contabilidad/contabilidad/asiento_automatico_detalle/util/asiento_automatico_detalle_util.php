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

namespace com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\entity\asiento_automatico_detalle;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity\asiento_automatico;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;
use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL


class asiento_automatico_detalle_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='asiento_automatico_detalle';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='contabilidad.asiento_automatico_detalles';
	/*'Mantenimientoasiento_automatico_detalle.jsf';*/
	public static string $STR_MODULO_OPCION='contabilidad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoasiento_automatico_detalle.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='asiento_automatico_detallePersistenceName';
	/*.asiento_automatico_detalle_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='asiento_automatico_detalle_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='asiento_automatico_detalle_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='asiento_automatico_detalle_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Detalle Asiento Automaticos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Detalle Asiento Automatico';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CONTABILIDAD='contabilidad';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $STR_TABLE_NAME='asiento_automatico_detalle';
	public static string $ASIENTO_AUTOMATICO_DETALLE='con_asiento_automatico_detalle';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.asiento_automatico_detalle';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_asiento_automatico,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_centro_costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.es_credito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable from '.asiento_automatico_detalle_util::$SCHEMA.'.'.asiento_automatico_detalle_util::$TABLENAME;*/
	
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
	//public $asiento_automatico_detalleConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_ASIENTO_AUTOMATICO='id_asiento_automatico';
    public static string $ID_CUENTA='id_cuenta';
    public static string $ID_CENTRO_COSTO='id_centro_costo';
    public static string $ES_CREDITO='es_credito';
    public static string $CUENTA_CONTABLE='cuenta_contable';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_ASIENTO_AUTOMATICO=' Asiento Automatico';
    public static string $LABEL_ID_CUENTA=' Cuenta';
    public static string $LABEL_ID_CENTRO_COSTO='Centro Costo';
    public static string $LABEL_ES_CREDITO='Es Credito';
    public static string $LABEL_CUENTA_CONTABLE='Cuenta Contable';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_automatico_detalleConstantesFuncionesAdditional=new $asiento_automatico_detalleConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $asiento_automatico_detalles,int $iIdNuevoasiento_automatico_detalle) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($asiento_automatico_detalles as $asiento_automatico_detalleAux) {
			if($asiento_automatico_detalleAux->getId()==$iIdNuevoasiento_automatico_detalle) {
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
	
	public static function getIndiceActual(array $asiento_automatico_detalles,asiento_automatico_detalle $asiento_automatico_detalle,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($asiento_automatico_detalles as $asiento_automatico_detalleAux) {
			if($asiento_automatico_detalleAux->getId()==$asiento_automatico_detalle->getId()) {
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
	public static function getasiento_automatico_detalleDescripcion(?asiento_automatico_detalle $asiento_automatico_detalle) : string {//asiento_automatico_detalle NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($asiento_automatico_detalle !=null) {
			/*&& asiento_automatico_detalle->getId()!=0*/
			
			if($asiento_automatico_detalle->getId()!=null) {
				$sDescripcion=(string)$asiento_automatico_detalle->getId();
			}
			
			/*asiento_automatico_detalle;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setasiento_automatico_detalleDescripcion(?asiento_automatico_detalle $asiento_automatico_detalle,string $sValor) {			
		if($asiento_automatico_detalle !=null) {
			
			/*asiento_automatico_detalle;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $asiento_automatico_detalles) : array {
		$asiento_automatico_detallesForeignKey=array();
		
		foreach ($asiento_automatico_detalles as $asiento_automatico_detalleLocal) {
			$asiento_automatico_detallesForeignKey[$asiento_automatico_detalleLocal->getId()]=asiento_automatico_detalle_util::getasiento_automatico_detalleDescripcion($asiento_automatico_detalleLocal);
		}
			
		return $asiento_automatico_detallesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_asiento_automatico() : string  { return ' Asiento Automatico'; }
    public static function getColumnLabelid_cuenta() : string  { return ' Cuenta'; }
    public static function getColumnLabelid_centro_costo() : string  { return 'Centro Costo'; }
    public static function getColumnLabeles_credito() : string  { return 'Es Credito'; }
    public static function getColumnLabelcuenta_contable() : string  { return 'Cuenta Contable'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getes_creditoDescripcion($asiento_automatico_detalle) {
		$sDescripcion='Verdadero';
		if(!$asiento_automatico_detalle->getes_credito()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $asiento_automatico_detalles) {		
		try {
			
			$asiento_automatico_detalle = new asiento_automatico_detalle();
			
			foreach($asiento_automatico_detalles as $asiento_automatico_detalle) {
				
				$asiento_automatico_detalle->setid_empresa_Descripcion(asiento_automatico_detalle_util::getempresaDescripcion($asiento_automatico_detalle->getempresa()));
				$asiento_automatico_detalle->setid_asiento_automatico_Descripcion(asiento_automatico_detalle_util::getasiento_automaticoDescripcion($asiento_automatico_detalle->getasiento_automatico()));
				$asiento_automatico_detalle->setid_cuenta_Descripcion(asiento_automatico_detalle_util::getcuentaDescripcion($asiento_automatico_detalle->getcuenta()));
				$asiento_automatico_detalle->setid_centro_costo_Descripcion(asiento_automatico_detalle_util::getcentro_costoDescripcion($asiento_automatico_detalle->getcentro_costo()));
			}
			
			if($asiento_automatico_detalle!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(asiento_automatico_detalle $asiento_automatico_detalle) {		
		try {
			
			
				$asiento_automatico_detalle->setid_empresa_Descripcion(asiento_automatico_detalle_util::getempresaDescripcion($asiento_automatico_detalle->getempresa()));
				$asiento_automatico_detalle->setid_asiento_automatico_Descripcion(asiento_automatico_detalle_util::getasiento_automaticoDescripcion($asiento_automatico_detalle->getasiento_automatico()));
				$asiento_automatico_detalle->setid_cuenta_Descripcion(asiento_automatico_detalle_util::getcuentaDescripcion($asiento_automatico_detalle->getcuenta()));
				$asiento_automatico_detalle->setid_centro_costo_Descripcion(asiento_automatico_detalle_util::getcentro_costoDescripcion($asiento_automatico_detalle->getcentro_costo()));
							
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
		} else if($sNombreIndice=='FK_Idasiento_automatico') {
			$sNombreIndice='Tipo=  Por  Asiento Automatico';
		} else if($sNombreIndice=='FK_Idcentro_costo') {
			$sNombreIndice='Tipo=  Por Centro Costo';
		} else if($sNombreIndice=='FK_Idcuenta') {
			$sNombreIndice='Tipo=  Por  Cuenta';
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

	public static function getDetalleIndiceFK_Idasiento_automatico(int $id_asiento_automatico) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Asiento Automatico='+$id_asiento_automatico; 

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

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return asiento_automatico_detalle_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return asiento_automatico_detalle_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_detalle_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(asiento_automatico_detalle_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_detalle_util::$LABEL_ID_ASIENTO_AUTOMATICO);
			$reporte->setsDescripcion(asiento_automatico_detalle_util::$LABEL_ID_ASIENTO_AUTOMATICO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_detalle_util::$LABEL_ID_CUENTA);
			$reporte->setsDescripcion(asiento_automatico_detalle_util::$LABEL_ID_CUENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_detalle_util::$LABEL_ID_CENTRO_COSTO);
			$reporte->setsDescripcion(asiento_automatico_detalle_util::$LABEL_ID_CENTRO_COSTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_detalle_util::$LABEL_ES_CREDITO);
			$reporte->setsDescripcion(asiento_automatico_detalle_util::$LABEL_ES_CREDITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_detalle_util::$LABEL_CUENTA_CONTABLE);
			$reporte->setsDescripcion(asiento_automatico_detalle_util::$LABEL_CUENTA_CONTABLE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=asiento_automatico_detalle_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==asiento_automatico_detalle_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=asiento_automatico_detalle_util::$ID_EMPRESA;
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
				$classes[]=new Classe(asiento_automatico::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(centro_costo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==asiento_automatico::$class) {
						$classes[]=new Classe(asiento_automatico::$class);
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
					if($clas==asiento_automatico::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_automatico::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_detalle_util::$LABEL_ID, asiento_automatico_detalle_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_detalle_util::$LABEL_ID_EMPRESA, asiento_automatico_detalle_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_detalle_util::$LABEL_ID_ASIENTO_AUTOMATICO, asiento_automatico_detalle_util::$ID_ASIENTO_AUTOMATICO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_detalle_util::$LABEL_ID_CUENTA, asiento_automatico_detalle_util::$ID_CUENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_detalle_util::$LABEL_ID_CENTRO_COSTO, asiento_automatico_detalle_util::$ID_CENTRO_COSTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_detalle_util::$LABEL_ES_CREDITO, asiento_automatico_detalle_util::$ES_CREDITO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_detalle_util::$LABEL_CUENTA_CONTABLE, asiento_automatico_detalle_util::$CUENTA_CONTABLE,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy(' Asiento Automatico',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Asiento Automatico',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Centro Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Centro Costo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Es Credito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Es Credito',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',asiento_automatico_detalle $asiento_automatico_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico_detalle->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Asiento Automatico',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico_detalle->getid_asiento_automatico_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico_detalle->getid_cuenta_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Centro Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico_detalle->getid_centro_costo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Es Credito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($asiento_automatico_detalle->getes_credito()),40,6,1); $row[]=$cellReport;
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
	
	public static function getasiento_automaticoDescripcion(?asiento_automatico $asiento_automatico) : string {
		$sDescripcion='none';
		if($asiento_automatico!==null) {
			$sDescripcion=asiento_automatico_util::getasiento_automaticoDescripcion($asiento_automatico);
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
	
	interface asiento_automatico_detalle_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $asiento_automatico_detalles,int $iIdNuevoasiento_automatico_detalle) : int;	
		public static function getIndiceActual(array $asiento_automatico_detalles,asiento_automatico_detalle $asiento_automatico_detalle,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getasiento_automatico_detalleDescripcion(?asiento_automatico_detalle $asiento_automatico_detalle) : string {;	
		public static function setasiento_automatico_detalleDescripcion(?asiento_automatico_detalle $asiento_automatico_detalle,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $asiento_automatico_detalles) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $asiento_automatico_detalles);	
		public static function refrescarFKDescripcion(asiento_automatico_detalle $asiento_automatico_detalle);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',asiento_automatico_detalle $asiento_automatico_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

