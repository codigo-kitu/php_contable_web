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

namespace com\bydan\contabilidad\seguridad\perfil_opcion\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

//REL


class perfil_opcion_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='perfil_opcion';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='seguridad.perfil_opcions';
	/*'Mantenimientoperfil_opcion.jsf';*/
	public static string $STR_MODULO_OPCION='seguridad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoperfil_opcion.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='perfil_opcionPersistenceName';
	/*.perfil_opcion_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='perfil_opcion_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='perfil_opcion_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='perfil_opcion_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Perfil Opciones';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Perfil Opcion';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $SEGURIDAD='seguridad';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $STR_TABLE_NAME='perfil_opcion';
	public static string $PERFIL_OPCION='seg_perfil_opcion';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.perfil_opcion';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_perfil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_opcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.todo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ingreso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modificacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.eliminacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.consulta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.busqueda,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.reporte,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado from '.perfil_opcion_util::$SCHEMA.'.'.perfil_opcion_util::$TABLENAME;*/
	
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
	//public $perfil_opcionConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_PERFIL='id_perfil';
    public static string $ID_OPCION='id_opcion';
    public static string $TODO='todo';
    public static string $INGRESO='ingreso';
    public static string $MODIFICACION='modificacion';
    public static string $ELIMINACION='eliminacion';
    public static string $CONSULTA='consulta';
    public static string $BUSQUEDA='busqueda';
    public static string $REPORTE='reporte';
    public static string $ESTADO='estado';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='A';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_PERFIL='Perfil';
    public static string $LABEL_ID_OPCION='Opcion';
    public static string $LABEL_TODO='Todo';
    public static string $LABEL_INGRESO='Ingreso';
    public static string $LABEL_MODIFICACION='Modificación';
    public static string $LABEL_ELIMINACION='Eliminación';
    public static string $LABEL_CONSULTA='Consulta';
    public static string $LABEL_BUSQUEDA='Busqueda';
    public static string $LABEL_REPORTE='Reporte';
    public static string $LABEL_ESTADO='Estado';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfil_opcionConstantesFuncionesAdditional=new $perfil_opcionConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $perfil_opcions,int $iIdNuevoperfil_opcion) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($perfil_opcions as $perfil_opcionAux) {
			if($perfil_opcionAux->getId()==$iIdNuevoperfil_opcion) {
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
	
	public static function getIndiceActual(array $perfil_opcions,perfil_opcion $perfil_opcion,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($perfil_opcions as $perfil_opcionAux) {
			if($perfil_opcionAux->getId()==$perfil_opcion->getId()) {
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
	public static function getperfil_opcionDescripcion(?perfil_opcion $perfil_opcion) : string {//perfil_opcion NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($perfil_opcion !=null) {
			/*&& perfil_opcion->getId()!=0*/
			
			if($perfil_opcion->getId()!=null) {
				$sDescripcion=(string)$perfil_opcion->getId();
			}
			
			/*perfil_opcion;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setperfil_opcionDescripcion(?perfil_opcion $perfil_opcion,string $sValor) {			
		if($perfil_opcion !=null) {
			
			/*perfil_opcion;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $perfil_opcions) : array {
		$perfil_opcionsForeignKey=array();
		
		foreach ($perfil_opcions as $perfil_opcionLocal) {
			$perfil_opcionsForeignKey[$perfil_opcionLocal->getId()]=perfil_opcion_util::getperfil_opcionDescripcion($perfil_opcionLocal);
		}
			
		return $perfil_opcionsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_perfil() : string  { return 'Perfil'; }
    public static function getColumnLabelid_opcion() : string  { return 'Opcion'; }
    public static function getColumnLabeltodo() : string  { return 'Todo'; }
    public static function getColumnLabelingreso() : string  { return 'Ingreso'; }
    public static function getColumnLabelmodificacion() : string  { return 'Modificación'; }
    public static function getColumnLabeleliminacion() : string  { return 'Eliminación'; }
    public static function getColumnLabelconsulta() : string  { return 'Consulta'; }
    public static function getColumnLabelbusqueda() : string  { return 'Busqueda'; }
    public static function getColumnLabelreporte() : string  { return 'Reporte'; }
    public static function getColumnLabelestado() : string  { return 'Estado'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function gettodoDescripcion($perfil_opcion) {
		$sDescripcion='Verdadero';
		if(!$perfil_opcion->gettodo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getingresoDescripcion($perfil_opcion) {
		$sDescripcion='Verdadero';
		if(!$perfil_opcion->getingreso()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getmodificacionDescripcion($perfil_opcion) {
		$sDescripcion='Verdadero';
		if(!$perfil_opcion->getmodificacion()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function geteliminacionDescripcion($perfil_opcion) {
		$sDescripcion='Verdadero';
		if(!$perfil_opcion->geteliminacion()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getconsultaDescripcion($perfil_opcion) {
		$sDescripcion='Verdadero';
		if(!$perfil_opcion->getconsulta()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getbusquedaDescripcion($perfil_opcion) {
		$sDescripcion='Verdadero';
		if(!$perfil_opcion->getbusqueda()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getreporteDescripcion($perfil_opcion) {
		$sDescripcion='Verdadero';
		if(!$perfil_opcion->getreporte()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getestadoDescripcion($perfil_opcion) {
		$sDescripcion='Verdadero';
		if(!$perfil_opcion->getestado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $perfil_opcions) {		
		try {
			
			$perfil_opcion = new perfil_opcion();
			
			foreach($perfil_opcions as $perfil_opcion) {
				
				$perfil_opcion->setid_perfil_Descripcion(perfil_opcion_util::getperfilDescripcion($perfil_opcion->getperfil()));
				$perfil_opcion->setid_opcion_Descripcion(perfil_opcion_util::getopcionDescripcion($perfil_opcion->getopcion()));
			}
			
			if($perfil_opcion!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(perfil_opcion $perfil_opcion) {		
		try {
			
			
				$perfil_opcion->setid_perfil_Descripcion(perfil_opcion_util::getperfilDescripcion($perfil_opcion->getperfil()));
				$perfil_opcion->setid_opcion_Descripcion(perfil_opcion_util::getopcionDescripcion($perfil_opcion->getopcion()));
							
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
		} else if($sNombreIndice=='BusquedaPorIdPerfilPorIdOpcion') {
			$sNombreIndice='Tipo=  Por Perfil Por Opcion';
		} else if($sNombreIndice=='FK_Idopcion') {
			$sNombreIndice='Tipo=  Por Opcion';
		} else if($sNombreIndice=='FK_Idperfil') {
			$sNombreIndice='Tipo=  Por Perfil';
		} else if($sNombreIndice=='PorIdPerfilPorIdOpcion') {
			$sNombreIndice='Tipo=  Por Perfil Por Opcion';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceBusquedaPorIdPerfilPorIdOpcion(int $id_perfil,int $id_opcion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Perfil='+$id_perfil;
		$sDetalleIndice.=' Código Único de Opcion='+$id_opcion; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idopcion(int $id_opcion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Opcion='+$id_opcion; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idperfil(int $id_perfil) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Perfil='+$id_perfil; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndicePorIdPerfilPorIdOpcion(int $id_perfil,int $id_opcion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Perfil='+$id_perfil;
		$sDetalleIndice.=' Código Único de Opcion='+$id_opcion; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return perfil_opcion_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return perfil_opcion_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_opcion_util::$LABEL_ID_PERFIL);
			$reporte->setsDescripcion(perfil_opcion_util::$LABEL_ID_PERFIL.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_opcion_util::$LABEL_ID_OPCION);
			$reporte->setsDescripcion(perfil_opcion_util::$LABEL_ID_OPCION.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_opcion_util::$LABEL_TODO);
			$reporte->setsDescripcion(perfil_opcion_util::$LABEL_TODO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_opcion_util::$LABEL_INGRESO);
			$reporte->setsDescripcion(perfil_opcion_util::$LABEL_INGRESO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_opcion_util::$LABEL_MODIFICACION);
			$reporte->setsDescripcion(perfil_opcion_util::$LABEL_MODIFICACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_opcion_util::$LABEL_ELIMINACION);
			$reporte->setsDescripcion(perfil_opcion_util::$LABEL_ELIMINACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_opcion_util::$LABEL_CONSULTA);
			$reporte->setsDescripcion(perfil_opcion_util::$LABEL_CONSULTA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_opcion_util::$LABEL_BUSQUEDA);
			$reporte->setsDescripcion(perfil_opcion_util::$LABEL_BUSQUEDA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_opcion_util::$LABEL_REPORTE);
			$reporte->setsDescripcion(perfil_opcion_util::$LABEL_REPORTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_opcion_util::$LABEL_ESTADO);
			$reporte->setsDescripcion(perfil_opcion_util::$LABEL_ESTADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=perfil_opcion_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(perfil::$class);
				$classes[]=new Classe(opcion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==opcion::$class) {
						$classes[]=new Classe(opcion::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$LABEL_ID, perfil_opcion_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$LABEL_ID_PERFIL, perfil_opcion_util::$ID_PERFIL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$LABEL_ID_OPCION, perfil_opcion_util::$ID_OPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$LABEL_TODO, perfil_opcion_util::$TODO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$LABEL_INGRESO, perfil_opcion_util::$INGRESO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$LABEL_MODIFICACION, perfil_opcion_util::$MODIFICACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$LABEL_ELIMINACION, perfil_opcion_util::$ELIMINACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$LABEL_CONSULTA, perfil_opcion_util::$CONSULTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$LABEL_BUSQUEDA, perfil_opcion_util::$BUSQUEDA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$LABEL_REPORTE, perfil_opcion_util::$REPORTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$LABEL_ESTADO, perfil_opcion_util::$ESTADO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Perfil',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Perfil',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Opcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Opcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Todo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Todo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ingreso',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modificación',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modificación',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Eliminación',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Eliminación',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Consulta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Consulta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Busqueda',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Busqueda',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Reporte',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Reporte',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',perfil_opcion $perfil_opcion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Perfil',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($perfil_opcion->getid_perfil_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Opcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($perfil_opcion->getid_opcion_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Todo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_opcion->gettodo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_opcion->getingreso()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modificación',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_opcion->getmodificacion()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Eliminación',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_opcion->geteliminacion()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Consulta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_opcion->getconsulta()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Busqueda',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_opcion->getbusqueda()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Reporte',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_opcion->getreporte()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_opcion->getestado()),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getperfilDescripcion(?perfil $perfil) : string {
		$sDescripcion='none';
		if($perfil!==null) {
			$sDescripcion=perfil_util::getperfilDescripcion($perfil);
		}
		return $sDescripcion;
	}	
	
	public static function getopcionDescripcion(?opcion $opcion) : string {
		$sDescripcion='none';
		if($opcion!==null) {
			$sDescripcion=opcion_util::getopcionDescripcion($opcion);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface perfil_opcion_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $perfil_opcions,int $iIdNuevoperfil_opcion) : int;	
		public static function getIndiceActual(array $perfil_opcions,perfil_opcion $perfil_opcion,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getperfil_opcionDescripcion(?perfil_opcion $perfil_opcion) : string {;	
		public static function setperfil_opcionDescripcion(?perfil_opcion $perfil_opcion,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $perfil_opcions) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $perfil_opcions);	
		public static function refrescarFKDescripcion(perfil_opcion $perfil_opcion);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',perfil_opcion $perfil_opcion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

