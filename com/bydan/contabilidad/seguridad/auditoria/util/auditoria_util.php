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

namespace com\bydan\contabilidad\seguridad\auditoria\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL

use com\bydan\contabilidad\seguridad\auditoria_detalle\business\entity\auditoria_detalle;
use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_util;

class auditoria_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='auditoria';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='seguridad.auditorias';
	/*'Mantenimientoauditoria.jsf';*/
	public static string $STR_MODULO_OPCION='seguridad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoauditoria.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='auditoriaPersistenceName';
	/*.auditoria_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='auditoria_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='auditoria_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='auditoria_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Auditorias';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Auditoria';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $SEGURIDAD='seguridad';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $STR_TABLE_NAME='auditoria';
	public static string $AUDITORIA='seg_auditoria';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.auditoria';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_tabla,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_fila,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.accion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.proceso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_pc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ip_pc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.usuario_pc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_hora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion from '.auditoria_util::$SCHEMA.'.'.auditoria_util::$TABLENAME;*/
	
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
	//public $auditoriaConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_USUARIO='id_usuario';
    public static string $NOMBRE_TABLA='nombre_tabla';
    public static string $ID_FILA='id_fila';
    public static string $ACCION='accion';
    public static string $PROCESO='proceso';
    public static string $NOMBRE_PC='nombre_pc';
    public static string $IP_PC='ip_pc';
    public static string $USUARIO_PC='usuario_pc';
    public static string $FECHA_HORA='fecha_hora';
    public static string $OBSERVACION='observacion';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='A';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_USUARIO='Usuario';
    public static string $LABEL_NOMBRE_TABLA='Nombre De La Tabla';
    public static string $LABEL_ID_FILA='Fila';
    public static string $LABEL_ACCION='Accion';
    public static string $LABEL_PROCESO='Proceso';
    public static string $LABEL_NOMBRE_PC='Nombre De Pc';
    public static string $LABEL_IP_PC='Ip Del Pc';
    public static string $LABEL_USUARIO_PC='Usuario Del Pc';
    public static string $LABEL_FECHA_HORA='Fecha Y Hora';
    public static string $LABEL_OBSERVACION='Observacion';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->auditoriaConstantesFuncionesAdditional=new $auditoriaConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $auditorias,int $iIdNuevoauditoria) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($auditorias as $auditoriaAux) {
			if($auditoriaAux->getId()==$iIdNuevoauditoria) {
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
	
	public static function getIndiceActual(array $auditorias,auditoria $auditoria,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($auditorias as $auditoriaAux) {
			if($auditoriaAux->getId()==$auditoria->getId()) {
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
	public static function getauditoriaDescripcion(?auditoria $auditoria) : string {//auditoria NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($auditoria !=null) {
			/*&& auditoria->getId()!=0*/
			
			$sDescripcion=((string)$auditoria->getId());
			
			/*auditoria;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setauditoriaDescripcion(?auditoria $auditoria,string $sValor) {			
		if($auditoria !=null) {
			;
			/*auditoria;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $auditorias) : array {
		$auditoriasForeignKey=array();
		
		foreach ($auditorias as $auditoriaLocal) {
			$auditoriasForeignKey[$auditoriaLocal->getId()]=auditoria_util::getauditoriaDescripcion($auditoriaLocal);
		}
			
		return $auditoriasForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_usuario() : string  { return 'Usuario'; }
    public static function getColumnLabelnombre_tabla() : string  { return 'Nombre De La Tabla'; }
    public static function getColumnLabelid_fila() : string  { return 'Fila'; }
    public static function getColumnLabelaccion() : string  { return 'Accion'; }
    public static function getColumnLabelproceso() : string  { return 'Proceso'; }
    public static function getColumnLabelnombre_pc() : string  { return 'Nombre De Pc'; }
    public static function getColumnLabelip_pc() : string  { return 'Ip Del Pc'; }
    public static function getColumnLabelusuario_pc() : string  { return 'Usuario Del Pc'; }
    public static function getColumnLabelfecha_hora() : string  { return 'Fecha Y Hora'; }
    public static function getColumnLabelobservacion() : string  { return 'Observacion'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $auditorias) {		
		try {
			
			$auditoria = new auditoria();
			
			foreach($auditorias as $auditoria) {
				
				$auditoria->setid_usuario_Descripcion(auditoria_util::getusuarioDescripcion($auditoria->getusuario()));
			}
			
			if($auditoria!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(auditoria $auditoria) {		
		try {
			
			
				$auditoria->setid_usuario_Descripcion(auditoria_util::getusuarioDescripcion($auditoria->getusuario()));
							
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
		} else if($sNombreIndice=='BusquedaPorIdUsuarioPorFechaHora') {
			$sNombreIndice='Tipo=  Por Usuario Por Fecha Y Hora';
		} else if($sNombreIndice=='BusquedaPorIPPCPorFechaHora') {
			$sNombreIndice='Tipo=  Por Ip Del Pc Por Fecha Y Hora';
		} else if($sNombreIndice=='BusquedaPorNombrePCPorFechaHora') {
			$sNombreIndice='Tipo=  Por Nombre De Pc Por Fecha Y Hora';
		} else if($sNombreIndice=='BusquedaPorNombreTablaPorFechaHora') {
			$sNombreIndice='Tipo=  Por Nombre De La Tabla Por Fecha Y Hora';
		} else if($sNombreIndice=='BusquedaPorObservacionesPorFechaHora') {
			$sNombreIndice='Tipo=  Por Fecha Y Hora Por Observacion';
		} else if($sNombreIndice=='BusquedaPorProcesoPorFechaHora') {
			$sNombreIndice='Tipo=  Por Proceso Por Fecha Y Hora';
		} else if($sNombreIndice=='BusquedaPorUsuarioPCPorFechaHora') {
			$sNombreIndice='Tipo=  Por Usuario Del Pc Por Fecha Y Hora';
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

	public static function getDetalleIndiceBusquedaPorIdUsuarioPorFechaHora(int $id_usuario,string $fecha_hora) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Usuario='+$id_usuario;
		$sDetalleIndice.=' Fecha Y Hora='+$fecha_hora; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceBusquedaPorIPPCPorFechaHora(string $ip_pc,string $fecha_hora) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Ip Del Pc='+$ip_pc;
		$sDetalleIndice.=' Fecha Y Hora='+$fecha_hora; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceBusquedaPorNombrePCPorFechaHora(string $nombre_pc,string $fecha_hora) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Nombre De Pc='+$nombre_pc;
		$sDetalleIndice.=' Fecha Y Hora='+$fecha_hora; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceBusquedaPorNombreTablaPorFechaHora(string $nombre_tabla,string $fecha_hora) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Nombre De La Tabla='+$nombre_tabla;
		$sDetalleIndice.=' Fecha Y Hora='+$fecha_hora; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceBusquedaPorObservacionesPorFechaHora(string $fecha_hora,string $observacion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Fecha Y Hora='+$fecha_hora;
		$sDetalleIndice.=' Observacion='+$observacion; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceBusquedaPorProcesoPorFechaHora(string $proceso,string $fecha_hora) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Proceso='+$proceso;
		$sDetalleIndice.=' Fecha Y Hora='+$fecha_hora; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceBusquedaPorUsuarioPCPorFechaHora(string $usuario_pc,string $fecha_hora) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Usuario Del Pc='+$usuario_pc;
		$sDetalleIndice.=' Fecha Y Hora='+$fecha_hora; 

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
		return auditoria_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return auditoria_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_util::$LABEL_ID_USUARIO);
			$reporte->setsDescripcion(auditoria_util::$LABEL_ID_USUARIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_util::$LABEL_NOMBRE_TABLA);
			$reporte->setsDescripcion(auditoria_util::$LABEL_NOMBRE_TABLA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_util::$LABEL_ID_FILA);
			$reporte->setsDescripcion(auditoria_util::$LABEL_ID_FILA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_util::$LABEL_ACCION);
			$reporte->setsDescripcion(auditoria_util::$LABEL_ACCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_util::$LABEL_PROCESO);
			$reporte->setsDescripcion(auditoria_util::$LABEL_PROCESO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_util::$LABEL_NOMBRE_PC);
			$reporte->setsDescripcion(auditoria_util::$LABEL_NOMBRE_PC);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_util::$LABEL_IP_PC);
			$reporte->setsDescripcion(auditoria_util::$LABEL_IP_PC);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_util::$LABEL_USUARIO_PC);
			$reporte->setsDescripcion(auditoria_util::$LABEL_USUARIO_PC);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_util::$LABEL_FECHA_HORA);
			$reporte->setsDescripcion(auditoria_util::$LABEL_FECHA_HORA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_util::$LABEL_OBSERVACION);
			$reporte->setsDescripcion(auditoria_util::$LABEL_OBSERVACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=auditoria_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==auditoria_util::$ID_USUARIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=auditoria_util::$ID_USUARIO;
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
				
				$classes[]=new Classe(usuario::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

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
				
				$classes[]=new Classe(auditoria_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==auditoria_detalle::$class) {
						$classes[]=new Classe(auditoria_detalle::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==auditoria_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(auditoria_detalle::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$LABEL_ID, auditoria_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$LABEL_ID_USUARIO, auditoria_util::$ID_USUARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$LABEL_NOMBRE_TABLA, auditoria_util::$NOMBRE_TABLA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$LABEL_ID_FILA, auditoria_util::$ID_FILA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$LABEL_ACCION, auditoria_util::$ACCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$LABEL_PROCESO, auditoria_util::$PROCESO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$LABEL_NOMBRE_PC, auditoria_util::$NOMBRE_PC,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$LABEL_IP_PC, auditoria_util::$IP_PC,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$LABEL_USUARIO_PC, auditoria_util::$USUARIO_PC,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$LABEL_FECHA_HORA, auditoria_util::$FECHA_HORA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$LABEL_OBSERVACION, auditoria_util::$OBSERVACION,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,auditoria_detalle_util::$STR_CLASS_WEB_TITULO, auditoria_detalle_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usuario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre De La Tabla',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre De La Tabla',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fila',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fila',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Accion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Accion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Proceso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Proceso',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre De Pc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre De Pc',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ip Del Pc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ip Del Pc',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Usuario Del Pc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usuario Del Pc',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Y Hora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Y Hora',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',auditoria $auditoria,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria->getid_usuario_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre De La Tabla',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria->getnombre_tabla(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fila',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria->getid_fila(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Accion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria->getaccion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Proceso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria->getproceso(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre De Pc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria->getnombre_pc(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ip Del Pc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria->getip_pc(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Usuario Del Pc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria->getusuario_pc(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Y Hora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria->getfecha_hora(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria->getobservacion(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getusuarioDescripcion(?usuario $usuario) : string {
		$sDescripcion='none';
		if($usuario!==null) {
			$sDescripcion=usuario_util::getusuarioDescripcion($usuario);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface auditoria_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $auditorias,int $iIdNuevoauditoria) : int;	
		public static function getIndiceActual(array $auditorias,auditoria $auditoria,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getauditoriaDescripcion(?auditoria $auditoria) : string {;	
		public static function setauditoriaDescripcion(?auditoria $auditoria,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $auditorias) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $auditorias);	
		public static function refrescarFKDescripcion(auditoria $auditoria);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',auditoria $auditoria,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

