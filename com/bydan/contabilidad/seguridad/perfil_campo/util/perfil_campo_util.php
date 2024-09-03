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

namespace com\bydan\contabilidad\seguridad\perfil_campo\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\seguridad\perfil_campo\business\entity\perfil_campo;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\campo\business\entity\campo;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;

//REL


class perfil_campo_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='perfil_campo';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='seguridad.perfil_campos';
	/*'Mantenimientoperfil_campo.jsf';*/
	public static string $STR_MODULO_OPCION='seguridad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoperfil_campo.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='perfil_campoPersistenceName';
	/*.perfil_campo_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='perfil_campo_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='perfil_campo_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='perfil_campo_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Perfil Campos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Perfil Campo';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $SEGURIDAD='seguridad';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $STR_TABLE_NAME='perfil_campo';
	public static string $PERFIL_CAMPO='seg_perfil_campo';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.perfil_campo';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_perfil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_campo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.todo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ingreso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modificacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.eliminacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.consulta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado from '.perfil_campo_util::$SCHEMA.'.'.perfil_campo_util::$TABLENAME;*/
	
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
	//public $perfil_campoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_PERFIL='id_perfil';
    public static string $ID_CAMPO='id_campo';
    public static string $TODO='todo';
    public static string $INGRESO='ingreso';
    public static string $MODIFICACION='modificacion';
    public static string $ELIMINACION='eliminacion';
    public static string $CONSULTA='consulta';
    public static string $ESTADO='estado';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='A';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_PERFIL='Perfil';
    public static string $LABEL_ID_CAMPO='Campo';
    public static string $LABEL_TODO='Todo';
    public static string $LABEL_INGRESO='Ingreso';
    public static string $LABEL_MODIFICACION='Modificacion';
    public static string $LABEL_ELIMINACION='Eliminacion';
    public static string $LABEL_CONSULTA='Consulta';
    public static string $LABEL_ESTADO='Estado';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfil_campoConstantesFuncionesAdditional=new $perfil_campoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $perfil_campos,int $iIdNuevoperfil_campo) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($perfil_campos as $perfil_campoAux) {
			if($perfil_campoAux->getId()==$iIdNuevoperfil_campo) {
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
	
	public static function getIndiceActual(array $perfil_campos,perfil_campo $perfil_campo,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($perfil_campos as $perfil_campoAux) {
			if($perfil_campoAux->getId()==$perfil_campo->getId()) {
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
	public static function getperfil_campoDescripcion(?perfil_campo $perfil_campo) : string {//perfil_campo NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($perfil_campo !=null) {
			/*&& perfil_campo->getId()!=0*/
			
			if($perfil_campo->getId()!=null) {
				$sDescripcion=(string)$perfil_campo->getId();
			}
			
			/*perfil_campo;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setperfil_campoDescripcion(?perfil_campo $perfil_campo,string $sValor) {			
		if($perfil_campo !=null) {
			
			/*perfil_campo;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $perfil_campos) : array {
		$perfil_camposForeignKey=array();
		
		foreach ($perfil_campos as $perfil_campoLocal) {
			$perfil_camposForeignKey[$perfil_campoLocal->getId()]=perfil_campo_util::getperfil_campoDescripcion($perfil_campoLocal);
		}
			
		return $perfil_camposForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_perfil() : string  { return 'Perfil'; }
    public static function getColumnLabelid_campo() : string  { return 'Campo'; }
    public static function getColumnLabeltodo() : string  { return 'Todo'; }
    public static function getColumnLabelingreso() : string  { return 'Ingreso'; }
    public static function getColumnLabelmodificacion() : string  { return 'Modificacion'; }
    public static function getColumnLabeleliminacion() : string  { return 'Eliminacion'; }
    public static function getColumnLabelconsulta() : string  { return 'Consulta'; }
    public static function getColumnLabelestado() : string  { return 'Estado'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function gettodoDescripcion($perfil_campo) {
		$sDescripcion='Verdadero';
		if(!$perfil_campo->gettodo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getingresoDescripcion($perfil_campo) {
		$sDescripcion='Verdadero';
		if(!$perfil_campo->getingreso()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getmodificacionDescripcion($perfil_campo) {
		$sDescripcion='Verdadero';
		if(!$perfil_campo->getmodificacion()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function geteliminacionDescripcion($perfil_campo) {
		$sDescripcion='Verdadero';
		if(!$perfil_campo->geteliminacion()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getconsultaDescripcion($perfil_campo) {
		$sDescripcion='Verdadero';
		if(!$perfil_campo->getconsulta()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getestadoDescripcion($perfil_campo) {
		$sDescripcion='Verdadero';
		if(!$perfil_campo->getestado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $perfil_campos) {		
		try {
			
			$perfil_campo = new perfil_campo();
			
			foreach($perfil_campos as $perfil_campo) {
				
				$perfil_campo->setid_perfil_Descripcion(perfil_campo_util::getperfilDescripcion($perfil_campo->getperfil()));
				$perfil_campo->setid_campo_Descripcion(perfil_campo_util::getcampoDescripcion($perfil_campo->getcampo()));
			}
			
			if($perfil_campo!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(perfil_campo $perfil_campo) {		
		try {
			
			
				$perfil_campo->setid_perfil_Descripcion(perfil_campo_util::getperfilDescripcion($perfil_campo->getperfil()));
				$perfil_campo->setid_campo_Descripcion(perfil_campo_util::getcampoDescripcion($perfil_campo->getcampo()));
							
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
		} else if($sNombreIndice=='FK_Idcampo') {
			$sNombreIndice='Tipo=  Por Campo';
		} else if($sNombreIndice=='FK_Idperfil') {
			$sNombreIndice='Tipo=  Por Perfil';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idcampo(int $id_campo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Campo='+$id_campo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idperfil(int $id_perfil) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Perfil='+$id_perfil; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return perfil_campo_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return perfil_campo_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_campo_util::$LABEL_ID_PERFIL);
			$reporte->setsDescripcion(perfil_campo_util::$LABEL_ID_PERFIL.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_campo_util::$LABEL_ID_CAMPO);
			$reporte->setsDescripcion(perfil_campo_util::$LABEL_ID_CAMPO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_campo_util::$LABEL_TODO);
			$reporte->setsDescripcion(perfil_campo_util::$LABEL_TODO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_campo_util::$LABEL_INGRESO);
			$reporte->setsDescripcion(perfil_campo_util::$LABEL_INGRESO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_campo_util::$LABEL_MODIFICACION);
			$reporte->setsDescripcion(perfil_campo_util::$LABEL_MODIFICACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_campo_util::$LABEL_ELIMINACION);
			$reporte->setsDescripcion(perfil_campo_util::$LABEL_ELIMINACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_campo_util::$LABEL_CONSULTA);
			$reporte->setsDescripcion(perfil_campo_util::$LABEL_CONSULTA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(perfil_campo_util::$LABEL_ESTADO);
			$reporte->setsDescripcion(perfil_campo_util::$LABEL_ESTADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=perfil_campo_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				$classes[]=new Classe(campo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==campo::$class) {
						$classes[]=new Classe(campo::$class);
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
					if($clas==campo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(campo::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,perfil_campo_util::$LABEL_ID, perfil_campo_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_campo_util::$LABEL_ID_PERFIL, perfil_campo_util::$ID_PERFIL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_campo_util::$LABEL_ID_CAMPO, perfil_campo_util::$ID_CAMPO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_campo_util::$LABEL_TODO, perfil_campo_util::$TODO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_campo_util::$LABEL_INGRESO, perfil_campo_util::$INGRESO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_campo_util::$LABEL_MODIFICACION, perfil_campo_util::$MODIFICACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_campo_util::$LABEL_ELIMINACION, perfil_campo_util::$ELIMINACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_campo_util::$LABEL_CONSULTA, perfil_campo_util::$CONSULTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_campo_util::$LABEL_ESTADO, perfil_campo_util::$ESTADO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Campo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Campo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Todo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Todo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ingreso',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modificacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modificacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Eliminacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Eliminacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Consulta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Consulta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',perfil_campo $perfil_campo,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Perfil',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($perfil_campo->getid_perfil_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Campo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($perfil_campo->getid_campo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Todo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_campo->gettodo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_campo->getingreso()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modificacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_campo->getmodificacion()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Eliminacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_campo->geteliminacion()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Consulta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_campo->getconsulta()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($perfil_campo->getestado()),40,6,1); $row[]=$cellReport;
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
	
	public static function getcampoDescripcion(?campo $campo) : string {
		$sDescripcion='none';
		if($campo!==null) {
			$sDescripcion=campo_util::getcampoDescripcion($campo);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface perfil_campo_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $perfil_campos,int $iIdNuevoperfil_campo) : int;	
		public static function getIndiceActual(array $perfil_campos,perfil_campo $perfil_campo,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getperfil_campoDescripcion(?perfil_campo $perfil_campo) : string {;	
		public static function setperfil_campoDescripcion(?perfil_campo $perfil_campo,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $perfil_campos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $perfil_campos);	
		public static function refrescarFKDescripcion(perfil_campo $perfil_campo);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',perfil_campo $perfil_campo,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

