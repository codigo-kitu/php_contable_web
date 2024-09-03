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

namespace com\bydan\contabilidad\seguridad\modulo\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;
use com\bydan\contabilidad\seguridad\paquete\business\entity\paquete;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_util;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\entity\tipo_tecla_mascara;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_util;

//REL


class modulo_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='modulo';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='seguridad.modulos';
	/*'Mantenimientomodulo.jsf';*/
	public static string $STR_MODULO_OPCION='seguridad';
	public static string $STR_NOMBRE_CLASE='Mantenimientomodulo.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='moduloPersistenceName';
	/*.modulo_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='modulo_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='modulo_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='modulo_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Modulos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Modulo';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $SEGURIDAD='seguridad';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $STR_TABLE_NAME='modulo';
	public static string $MODULO='seg_modulo';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.modulo';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_paquete,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_tecla_mascara,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tecla,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.orden,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion from '.modulo_util::$SCHEMA.'.'.modulo_util::$TABLENAME;*/
	
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
	//public $moduloConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_SISTEMA='id_sistema';
    public static string $ID_PAQUETE='id_paquete';
    public static string $CODIGO='codigo';
    public static string $NOMBRE='nombre';
    public static string $ID_TIPO_TECLA_MASCARA='id_tipo_tecla_mascara';
    public static string $TECLA='tecla';
    public static string $ESTADO='estado';
    public static string $ORDEN='orden';
    public static string $DESCRIPCION='descripcion';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_SISTEMA='Sistema';
    public static string $LABEL_ID_PAQUETE='Paquete';
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_ID_TIPO_TECLA_MASCARA='Tipo Tecla Mascara';
    public static string $LABEL_TECLA='Tecla';
    public static string $LABEL_ESTADO='Estado';
    public static string $LABEL_ORDEN='Orden';
    public static string $LABEL_DESCRIPCION='Descripcion';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->moduloConstantesFuncionesAdditional=new $moduloConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $modulos,int $iIdNuevomodulo) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($modulos as $moduloAux) {
			if($moduloAux->getId()==$iIdNuevomodulo) {
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
	
	public static function getIndiceActual(array $modulos,modulo $modulo,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($modulos as $moduloAux) {
			if($moduloAux->getId()==$modulo->getId()) {
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
	public static function getmoduloDescripcion(?modulo $modulo) : string {//modulo NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($modulo !=null) {
			/*&& modulo->getId()!=0*/
			
			$sDescripcion=($modulo->getnombre());
			
			/*modulo;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setmoduloDescripcion(?modulo $modulo,string $sValor) {			
		if($modulo !=null) {
			$modulo->setnombre($sValor);;
			/*modulo;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $modulos) : array {
		$modulosForeignKey=array();
		
		foreach ($modulos as $moduloLocal) {
			$modulosForeignKey[$moduloLocal->getId()]=modulo_util::getmoduloDescripcion($moduloLocal);
		}
			
		return $modulosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_sistema() : string  { return 'Sistema'; }
    public static function getColumnLabelid_paquete() : string  { return 'Paquete'; }
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelid_tipo_tecla_mascara() : string  { return 'Tipo Tecla Mascara'; }
    public static function getColumnLabeltecla() : string  { return 'Tecla'; }
    public static function getColumnLabelestado() : string  { return 'Estado'; }
    public static function getColumnLabelorden() : string  { return 'Orden'; }
    public static function getColumnLabeldescripcion() : string  { return 'Descripcion'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getestadoDescripcion($modulo) {
		$sDescripcion='Verdadero';
		if(!$modulo->getestado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $modulos) {		
		try {
			
			$modulo = new modulo();
			
			foreach($modulos as $modulo) {
				
				$modulo->setid_sistema_Descripcion(modulo_util::getsistemaDescripcion($modulo->getsistema()));
				$modulo->setid_paquete_Descripcion(modulo_util::getpaqueteDescripcion($modulo->getpaquete()));
				$modulo->setid_tipo_tecla_mascara_Descripcion(modulo_util::gettipo_tecla_mascaraDescripcion($modulo->gettipo_tecla_mascara()));
			}
			
			if($modulo!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(modulo $modulo) {		
		try {
			
			
				$modulo->setid_sistema_Descripcion(modulo_util::getsistemaDescripcion($modulo->getsistema()));
				$modulo->setid_paquete_Descripcion(modulo_util::getpaqueteDescripcion($modulo->getpaquete()));
				$modulo->setid_tipo_tecla_mascara_Descripcion(modulo_util::gettipo_tecla_mascaraDescripcion($modulo->gettipo_tecla_mascara()));
							
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
		} else if($sNombreIndice=='FK_Idpaquete') {
			$sNombreIndice='Tipo=  Por Paquete';
		} else if($sNombreIndice=='FK_Idsistema') {
			$sNombreIndice='Tipo=  Por Sistema';
		} else if($sNombreIndice=='FK_Idtipo_tecla_mascara') {
			$sNombreIndice='Tipo=  Por Tipo Tecla Mascara';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idpaquete(int $id_paquete) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Paquete='+$id_paquete; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idsistema(int $id_sistema) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Sistema='+$id_sistema; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_tecla_mascara(int $id_tipo_tecla_mascara) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Tipo Tecla Mascara='+$id_tipo_tecla_mascara; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return modulo_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return modulo_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(modulo_util::$LABEL_ID_SISTEMA);
			$reporte->setsDescripcion(modulo_util::$LABEL_ID_SISTEMA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(modulo_util::$LABEL_ID_PAQUETE);
			$reporte->setsDescripcion(modulo_util::$LABEL_ID_PAQUETE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(modulo_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(modulo_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(modulo_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(modulo_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(modulo_util::$LABEL_ID_TIPO_TECLA_MASCARA);
			$reporte->setsDescripcion(modulo_util::$LABEL_ID_TIPO_TECLA_MASCARA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(modulo_util::$LABEL_TECLA);
			$reporte->setsDescripcion(modulo_util::$LABEL_TECLA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(modulo_util::$LABEL_ESTADO);
			$reporte->setsDescripcion(modulo_util::$LABEL_ESTADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(modulo_util::$LABEL_ORDEN);
			$reporte->setsDescripcion(modulo_util::$LABEL_ORDEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(modulo_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(modulo_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=modulo_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(sistema::$class);
				$classes[]=new Classe(paquete::$class);
				$classes[]=new Classe(tipo_tecla_mascara::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==sistema::$class) {
						$classes[]=new Classe(sistema::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==paquete::$class) {
						$classes[]=new Classe(paquete::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_tecla_mascara::$class) {
						$classes[]=new Classe(tipo_tecla_mascara::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==sistema::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sistema::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==paquete::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(paquete::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==tipo_tecla_mascara::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_tecla_mascara::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,modulo_util::$LABEL_ID, modulo_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,modulo_util::$LABEL_ID_SISTEMA, modulo_util::$ID_SISTEMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,modulo_util::$LABEL_ID_PAQUETE, modulo_util::$ID_PAQUETE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,modulo_util::$LABEL_CODIGO, modulo_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,modulo_util::$LABEL_NOMBRE, modulo_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,modulo_util::$LABEL_ID_TIPO_TECLA_MASCARA, modulo_util::$ID_TIPO_TECLA_MASCARA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,modulo_util::$LABEL_TECLA, modulo_util::$TECLA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,modulo_util::$LABEL_ESTADO, modulo_util::$ESTADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,modulo_util::$LABEL_ORDEN, modulo_util::$ORDEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,modulo_util::$LABEL_DESCRIPCION, modulo_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sistema',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Paquete',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Paquete',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Tecla Mascara',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Tecla Mascara',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tecla',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tecla',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Orden',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Orden',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',modulo $modulo,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($modulo->getid_sistema_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Paquete',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($modulo->getid_paquete_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($modulo->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($modulo->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Tecla Mascara',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($modulo->getid_tipo_tecla_mascara_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tecla',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($modulo->gettecla(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($modulo->getestado()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Orden',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($modulo->getorden(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($modulo->getdescripcion(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getsistemaDescripcion(?sistema $sistema) : string {
		$sDescripcion='none';
		if($sistema!==null) {
			$sDescripcion=sistema_util::getsistemaDescripcion($sistema);
		}
		return $sDescripcion;
	}	
	
	public static function getpaqueteDescripcion(?paquete $paquete) : string {
		$sDescripcion='none';
		if($paquete!==null) {
			$sDescripcion=paquete_util::getpaqueteDescripcion($paquete);
		}
		return $sDescripcion;
	}	
	
	public static function gettipo_tecla_mascaraDescripcion(?tipo_tecla_mascara $tipo_tecla_mascara) : string {
		$sDescripcion='none';
		if($tipo_tecla_mascara!==null) {
			$sDescripcion=tipo_tecla_mascara_util::gettipo_tecla_mascaraDescripcion($tipo_tecla_mascara);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface modulo_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $modulos,int $iIdNuevomodulo) : int;	
		public static function getIndiceActual(array $modulos,modulo $modulo,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getmoduloDescripcion(?modulo $modulo) : string {;	
		public static function setmoduloDescripcion(?modulo $modulo,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $modulos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $modulos);	
		public static function refrescarFKDescripcion(modulo $modulo);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',modulo $modulo,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

