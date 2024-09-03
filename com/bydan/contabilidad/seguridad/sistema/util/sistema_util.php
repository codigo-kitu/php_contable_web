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

namespace com\bydan\contabilidad\seguridad\sistema\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK


//REL

use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;
use com\bydan\contabilidad\seguridad\paquete\business\entity\paquete;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_util;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

class sistema_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='sistema';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='seguridad.sistemas';
	/*'Mantenimientosistema.jsf';*/
	public static string $STR_MODULO_OPCION='seguridad';
	public static string $STR_NOMBRE_CLASE='Mantenimientosistema.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='sistemaPersistenceName';
	/*.sistema_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='sistema_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='sistema_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='sistema_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Sistemas';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Sistema';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $SEGURIDAD='seguridad';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $STR_TABLE_NAME='sistema';
	public static string $SISTEMA='seg_sistema';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.sistema';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_principal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_secundario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado from '.sistema_util::$SCHEMA.'.'.sistema_util::$TABLENAME;*/
	
	/*PARAMETROS
	AUDITORIA*/
	public static bool $BIT_CON_AUDITORIA=true;	
	public static bool $BIT_CON_AUDITORIA_DETALLE=true;	
	
	/*WEB PAGINA FORMULARIO*/
	public static bool $CON_PAGINA_FORM=true;		
	
	/*GLOBAL*/
	public static string $ID='id';
	public static string $VERSIONROW='updated_at';
	
	/*AUXILIAR*/
	//public $sistemaConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $CODIGO='codigo';
    public static string $NOMBRE_PRINCIPAL='nombre_principal';
    public static string $NOMBRE_SECUNDARIO='nombre_secundario';
    public static string $ESTADO='estado';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='A';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_NOMBRE_PRINCIPAL='Nombre Principal';
    public static string $LABEL_NOMBRE_SECUNDARIO='Nombre Secundario';
    public static string $LABEL_ESTADO='Estado';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->sistemaConstantesFuncionesAdditional=new $sistemaConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $sistemas,int $iIdNuevosistema) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($sistemas as $sistemaAux) {
			if($sistemaAux->getId()==$iIdNuevosistema) {
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
	
	public static function getIndiceActual(array $sistemas,sistema $sistema,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($sistemas as $sistemaAux) {
			if($sistemaAux->getId()==$sistema->getId()) {
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
	public static function getsistemaDescripcion(?sistema $sistema) : string {//sistema NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($sistema !=null) {
			/*&& sistema->getId()!=0*/
			
			$sDescripcion=($sistema->getnombre_principal());
			
			/*sistema;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setsistemaDescripcion(?sistema $sistema,string $sValor) {			
		if($sistema !=null) {
			$sistema->setnombre_principal($sValor);;
			/*sistema;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $sistemas) : array {
		$sistemasForeignKey=array();
		
		foreach ($sistemas as $sistemaLocal) {
			$sistemasForeignKey[$sistemaLocal->getId()]=sistema_util::getsistemaDescripcion($sistemaLocal);
		}
			
		return $sistemasForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelnombre_principal() : string  { return 'Nombre Principal'; }
    public static function getColumnLabelnombre_secundario() : string  { return 'Nombre Secundario'; }
    public static function getColumnLabelestado() : string  { return 'Estado'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getestadoDescripcion($sistema) {
		$sDescripcion='Verdadero';
		if(!$sistema->getestado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $sistemas) {		
		try {
			
			$sistema = new sistema();
			
			foreach($sistemas as $sistema) {
				
			}
			
			if($sistema!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(sistema $sistema) {		
		try {
			
			
							
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
		} else if($sNombreIndice=='BusquedaPorNombrePrincipal') {
			$sNombreIndice='Tipo=  Por Nombre Principal';
		} else if($sNombreIndice=='PorCodigo') {
			$sNombreIndice='Tipo=  Por Codigo';
		} else if($sNombreIndice=='PorNombrePrincipal') {
			$sNombreIndice='Tipo=  Por Nombre Principal';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceBusquedaPorNombrePrincipal(string $nombre_principal) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Nombre Principal='+$nombre_principal; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndicePorCodigo(string $codigo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Codigo='+$codigo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndicePorNombrePrincipal(string $nombre_principal) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Nombre Principal='+$nombre_principal; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return sistema_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return sistema_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sistema_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(sistema_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sistema_util::$LABEL_NOMBRE_PRINCIPAL);
			$reporte->setsDescripcion(sistema_util::$LABEL_NOMBRE_PRINCIPAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sistema_util::$LABEL_NOMBRE_SECUNDARIO);
			$reporte->setsDescripcion(sistema_util::$LABEL_NOMBRE_SECUNDARIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sistema_util::$LABEL_ESTADO);
			$reporte->setsDescripcion(sistema_util::$LABEL_ESTADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=sistema_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
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
				
				$classes[]=new Classe(perfil::$class);
				$classes[]=new Classe(opcion::$class);
				$classes[]=new Classe(paquete::$class);
				$classes[]=new Classe(modulo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==opcion::$class) {
						$classes[]=new Classe(opcion::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==paquete::$class) {
						$classes[]=new Classe(paquete::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==modulo::$class) {
						$classes[]=new Classe(modulo::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==perfil::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(opcion::$class);
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
					if($clas==modulo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(modulo::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,sistema_util::$LABEL_ID, sistema_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sistema_util::$LABEL_CODIGO, sistema_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sistema_util::$LABEL_NOMBRE_PRINCIPAL, sistema_util::$NOMBRE_PRINCIPAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sistema_util::$LABEL_NOMBRE_SECUNDARIO, sistema_util::$NOMBRE_SECUNDARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sistema_util::$LABEL_ESTADO, sistema_util::$ESTADO,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,perfil_util::$STR_CLASS_WEB_TITULO, perfil_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$STR_CLASS_WEB_TITULO, opcion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,paquete_util::$STR_CLASS_WEB_TITULO, paquete_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,modulo_util::$STR_CLASS_WEB_TITULO, modulo_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Principal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Principal',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Secundario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Secundario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',sistema $sistema,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sistema->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Principal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sistema->getnombre_principal(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Secundario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sistema->getnombre_secundario(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($sistema->getestado()),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface sistema_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $sistemas,int $iIdNuevosistema) : int;	
		public static function getIndiceActual(array $sistemas,sistema $sistema,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getsistemaDescripcion(?sistema $sistema) : string {;	
		public static function setsistemaDescripcion(?sistema $sistema,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $sistemas) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $sistemas);	
		public static function refrescarFKDescripcion(sistema $sistema);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',sistema $sistema,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

