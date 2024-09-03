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

namespace com\bydan\contabilidad\seguridad\usuario\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK


//REL

use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\entity\historial_cambio_clave;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_util;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;
use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_util;
use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;
use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_util;
use com\bydan\contabilidad\seguridad\perfil_usuario\business\entity\perfil_usuario;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;

class usuario_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='usuario';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='seguridad.usuarios';
	/*'Mantenimientousuario.jsf';*/
	public static string $STR_MODULO_OPCION='seguridad';
	public static string $STR_NOMBRE_CLASE='Mantenimientousuario.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='usuarioPersistenceName';
	/*.usuario_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='usuario_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='usuario_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='usuario_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Usuarios';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Usuario';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $SEGURIDAD='seguridad';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $STR_TABLE_NAME='usuario';
	public static string $USUARIO='seg_usuario';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.usuario';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.user_name,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.clave,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.confirmar_clave,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_alterno,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tipo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado from '.usuario_util::$SCHEMA.'.'.usuario_util::$TABLENAME;*/
	
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
	//public $usuarioConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $USER_NAME='user_name';
    public static string $CLAVE='clave';
    public static string $CONFIRMAR_CLAVE='confirmar_clave';
    public static string $NOMBRE='nombre';
    public static string $CODIGO_ALTERNO='codigo_alterno';
    public static string $TIPO='tipo';
    public static string $ESTADO='estado';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='A';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_USER_NAME='Nombre De Usuario';
    public static string $LABEL_CLAVE='Clave';
    public static string $LABEL_CONFIRMAR_CLAVE='Confirmar Clave';
    public static string $LABEL_NOMBRE='Nombre Completo';
    public static string $LABEL_CODIGO_ALTERNO='Código Alterno';
    public static string $LABEL_TIPO='Tipo';
    public static string $LABEL_ESTADO='Estado';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->usuarioConstantesFuncionesAdditional=new $usuarioConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $usuarios,int $iIdNuevousuario) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($usuarios as $usuarioAux) {
			if($usuarioAux->getId()==$iIdNuevousuario) {
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
	
	public static function getIndiceActual(array $usuarios,usuario $usuario,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($usuarios as $usuarioAux) {
			if($usuarioAux->getId()==$usuario->getId()) {
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
	public static function getusuarioDescripcion(?usuario $usuario) : string {//usuario NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($usuario !=null) {
			/*&& usuario->getId()!=0*/
			
			$sDescripcion=($usuario->getuser_name());
			
			/*usuario;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setusuarioDescripcion(?usuario $usuario,string $sValor) {			
		if($usuario !=null) {
			$usuario->setuser_name($sValor);;
			/*usuario;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $usuarios) : array {
		$usuariosForeignKey=array();
		
		foreach ($usuarios as $usuarioLocal) {
			$usuariosForeignKey[$usuarioLocal->getId()]=usuario_util::getusuarioDescripcion($usuarioLocal);
		}
			
		return $usuariosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabeluser_name() : string  { return 'Nombre De Usuario'; }
    public static function getColumnLabelclave() : string  { return 'Clave'; }
    public static function getColumnLabelconfirmar_clave() : string  { return 'Confirmar Clave'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre Completo'; }
    public static function getColumnLabelcodigo_alterno() : string  { return 'Código Alterno'; }
    public static function getColumnLabeltipo() : string  { return 'Tipo'; }
    public static function getColumnLabelestado() : string  { return 'Estado'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function gettipoDescripcion($usuario) {
		$sDescripcion='Verdadero';
		if(!$usuario->gettipo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getestadoDescripcion($usuario) {
		$sDescripcion='Verdadero';
		if(!$usuario->getestado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $usuarios) {		
		try {
			
			$usuario = new usuario();
			
			foreach($usuarios as $usuario) {
				
			}
			
			if($usuario!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(usuario $usuario) {		
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
		} else if($sNombreIndice=='BusquedaPorNombre') {
			$sNombreIndice='Tipo=  Por Nombre Completo';
		} else if($sNombreIndice=='BusquedaPorUserName') {
			$sNombreIndice='Tipo=  Por Nombre De Usuario';
		} else if($sNombreIndice=='PorCodigoAlterno') {
			$sNombreIndice='Tipo=  Por Código Alterno';
		} else if($sNombreIndice=='PorUserName') {
			$sNombreIndice='Tipo=  Por Nombre De Usuario';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceBusquedaPorNombre(string $nombre) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Nombre Completo='+$nombre; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceBusquedaPorUserName(string $user_name) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Nombre De Usuario='+$user_name; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndicePorCodigoAlterno(string $codigo_alterno) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Alterno='+$codigo_alterno; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndicePorUserName(string $user_name) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Nombre De Usuario='+$user_name; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return usuario_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return usuario_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(usuario_util::$LABEL_USER_NAME);
			$reporte->setsDescripcion(usuario_util::$LABEL_USER_NAME);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(usuario_util::$LABEL_CLAVE);
			$reporte->setsDescripcion(usuario_util::$LABEL_CLAVE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(usuario_util::$LABEL_CONFIRMAR_CLAVE);
			$reporte->setsDescripcion(usuario_util::$LABEL_CONFIRMAR_CLAVE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(usuario_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(usuario_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(usuario_util::$LABEL_CODIGO_ALTERNO);
			$reporte->setsDescripcion(usuario_util::$LABEL_CODIGO_ALTERNO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(usuario_util::$LABEL_TIPO);
			$reporte->setsDescripcion(usuario_util::$LABEL_TIPO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(usuario_util::$LABEL_ESTADO);
			$reporte->setsDescripcion(usuario_util::$LABEL_ESTADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=usuario_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(historial_cambio_clave::$class);
				$classes[]=new Classe(resumen_usuario::$class);
				$classes[]=new Classe(auditoria::$class);
				$classes[]=new Classe(perfil::$class);
				$classes[]=new Classe(parametro_general_usuario::$class);
				$classes[]=new Classe(perfil_usuario::$class);
				$classes[]=new Classe(dato_general_usuario::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==historial_cambio_clave::$class) {
						$classes[]=new Classe(historial_cambio_clave::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==resumen_usuario::$class) {
						$classes[]=new Classe(resumen_usuario::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==auditoria::$class) {
						$classes[]=new Classe(auditoria::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==parametro_general_usuario::$class) {
						$classes[]=new Classe(parametro_general_usuario::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==perfil_usuario::$class) {
						$classes[]=new Classe(perfil_usuario::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==dato_general_usuario::$class) {
						$classes[]=new Classe(dato_general_usuario::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==historial_cambio_clave::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(historial_cambio_clave::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==resumen_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(resumen_usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==auditoria::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(auditoria::$class);
				}

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
					if($clas==parametro_general_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(parametro_general_usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==perfil_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil_usuario::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==dato_general_usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(dato_general_usuario::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,usuario_util::$LABEL_ID, usuario_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,usuario_util::$LABEL_USER_NAME, usuario_util::$USER_NAME,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,usuario_util::$LABEL_CLAVE, usuario_util::$CLAVE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,usuario_util::$LABEL_CONFIRMAR_CLAVE, usuario_util::$CONFIRMAR_CLAVE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,usuario_util::$LABEL_NOMBRE, usuario_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,usuario_util::$LABEL_CODIGO_ALTERNO, usuario_util::$CODIGO_ALTERNO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,usuario_util::$LABEL_TIPO, usuario_util::$TIPO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,usuario_util::$LABEL_ESTADO, usuario_util::$ESTADO,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,historial_cambio_clave_util::$STR_CLASS_WEB_TITULO, historial_cambio_clave_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$STR_CLASS_WEB_TITULO, resumen_usuario_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_util::$STR_CLASS_WEB_TITULO, auditoria_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_usuario_util::$STR_CLASS_WEB_TITULO, perfil_usuario_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Nombre De Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre De Usuario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Clave',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Clave',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Confirmar Clave',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Confirmar Clave',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Completo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Completo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Código Alterno',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Código Alterno',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',usuario $usuario,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Nombre De Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->getuser_name(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Clave',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->getclave(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Confirmar Clave',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->getconfirmar_clave(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Completo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Código Alterno',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($usuario->getcodigo_alterno(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($usuario->gettipo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($usuario->getestado()),40,6,1); $row[]=$cellReport;
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
	
	interface usuario_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $usuarios,int $iIdNuevousuario) : int;	
		public static function getIndiceActual(array $usuarios,usuario $usuario,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getusuarioDescripcion(?usuario $usuario) : string {;	
		public static function setusuarioDescripcion(?usuario $usuario,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $usuarios) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $usuarios);	
		public static function refrescarFKDescripcion(usuario $usuario);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',usuario $usuario,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

