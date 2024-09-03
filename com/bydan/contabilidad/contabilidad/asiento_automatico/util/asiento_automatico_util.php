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

namespace com\bydan\contabilidad\contabilidad\asiento_automatico\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity\asiento_automatico;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;
use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;
use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\entity\asiento_automatico_detalle;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_util;

class asiento_automatico_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='asiento_automatico';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='contabilidad.asiento_automaticos';
	/*'Mantenimientoasiento_automatico.jsf';*/
	public static string $STR_MODULO_OPCION='contabilidad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoasiento_automatico.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='asiento_automaticoPersistenceName';
	/*.asiento_automatico_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='asiento_automatico_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='asiento_automatico_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='asiento_automatico_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Asiento Automaticos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Asiento Automatico';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CONTABILIDAD='contabilidad';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $STR_TABLE_NAME='asiento_automatico';
	public static string $ASIENTO_AUTOMATICO='con_asiento_automatico';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.asiento_automatico';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_modulo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_libro_auxiliar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_centro_costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.activo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.asignada from '.asiento_automatico_util::$SCHEMA.'.'.asiento_automatico_util::$TABLENAME;*/
	
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
	//public $asiento_automaticoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_MODULO='id_modulo';
    public static string $CODIGO='codigo';
    public static string $NOMBRE='nombre';
    public static string $ID_FUENTE='id_fuente';
    public static string $ID_LIBRO_AUXILIAR='id_libro_auxiliar';
    public static string $ID_CENTRO_COSTO='id_centro_costo';
    public static string $DESCIPCION='descripcion';
    public static string $ACTIVO='activo';
    public static string $ASIGNADA='asignada';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_MODULO=' Modulo';
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_ID_FUENTE='Fuente';
    public static string $LABEL_ID_LIBRO_AUXILIAR='Libro Auxiliar';
    public static string $LABEL_ID_CENTRO_COSTO='Centro Costo';
    public static string $LABEL_DESCIPCION='Descripcion';
    public static string $LABEL_ACTIVO='Activo';
    public static string $LABEL_ASIGNADA='Asignada';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_automaticoConstantesFuncionesAdditional=new $asiento_automaticoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $asiento_automaticos,int $iIdNuevoasiento_automatico) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($asiento_automaticos as $asiento_automaticoAux) {
			if($asiento_automaticoAux->getId()==$iIdNuevoasiento_automatico) {
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
	
	public static function getIndiceActual(array $asiento_automaticos,asiento_automatico $asiento_automatico,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($asiento_automaticos as $asiento_automaticoAux) {
			if($asiento_automaticoAux->getId()==$asiento_automatico->getId()) {
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
	public static function getasiento_automaticoDescripcion(?asiento_automatico $asiento_automatico) : string {//asiento_automatico NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($asiento_automatico !=null) {
			/*&& asiento_automatico->getId()!=0*/
			
			$sDescripcion=($asiento_automatico->getcodigo());
			
			/*asiento_automatico;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setasiento_automaticoDescripcion(?asiento_automatico $asiento_automatico,string $sValor) {			
		if($asiento_automatico !=null) {
			$asiento_automatico->setcodigo($sValor);;
			/*asiento_automatico;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $asiento_automaticos) : array {
		$asiento_automaticosForeignKey=array();
		
		foreach ($asiento_automaticos as $asiento_automaticoLocal) {
			$asiento_automaticosForeignKey[$asiento_automaticoLocal->getId()]=asiento_automatico_util::getasiento_automaticoDescripcion($asiento_automaticoLocal);
		}
			
		return $asiento_automaticosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_modulo() : string  { return ' Modulo'; }
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelid_fuente() : string  { return 'Fuente'; }
    public static function getColumnLabelid_libro_auxiliar() : string  { return 'Libro Auxiliar'; }
    public static function getColumnLabelid_centro_costo() : string  { return 'Centro Costo'; }
    public static function getColumnLabeldescipcion() : string  { return 'Descripcion'; }
    public static function getColumnLabelactivo() : string  { return 'Activo'; }
    public static function getColumnLabelasignada() : string  { return 'Asignada'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getactivoDescripcion($asiento_automatico) {
		$sDescripcion='Verdadero';
		if(!$asiento_automatico->getactivo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $asiento_automaticos) {		
		try {
			
			$asiento_automatico = new asiento_automatico();
			
			foreach($asiento_automaticos as $asiento_automatico) {
				
				$asiento_automatico->setid_empresa_Descripcion(asiento_automatico_util::getempresaDescripcion($asiento_automatico->getempresa()));
				$asiento_automatico->setid_modulo_Descripcion(asiento_automatico_util::getmoduloDescripcion($asiento_automatico->getmodulo()));
				$asiento_automatico->setid_fuente_Descripcion(asiento_automatico_util::getfuenteDescripcion($asiento_automatico->getfuente()));
				$asiento_automatico->setid_libro_auxiliar_Descripcion(asiento_automatico_util::getlibro_auxiliarDescripcion($asiento_automatico->getlibro_auxiliar()));
				$asiento_automatico->setid_centro_costo_Descripcion(asiento_automatico_util::getcentro_costoDescripcion($asiento_automatico->getcentro_costo()));
			}
			
			if($asiento_automatico!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(asiento_automatico $asiento_automatico) {		
		try {
			
			
				$asiento_automatico->setid_empresa_Descripcion(asiento_automatico_util::getempresaDescripcion($asiento_automatico->getempresa()));
				$asiento_automatico->setid_modulo_Descripcion(asiento_automatico_util::getmoduloDescripcion($asiento_automatico->getmodulo()));
				$asiento_automatico->setid_fuente_Descripcion(asiento_automatico_util::getfuenteDescripcion($asiento_automatico->getfuente()));
				$asiento_automatico->setid_libro_auxiliar_Descripcion(asiento_automatico_util::getlibro_auxiliarDescripcion($asiento_automatico->getlibro_auxiliar()));
				$asiento_automatico->setid_centro_costo_Descripcion(asiento_automatico_util::getcentro_costoDescripcion($asiento_automatico->getcentro_costo()));
							
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
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idfuente') {
			$sNombreIndice='Tipo=  Por Fuente';
		} else if($sNombreIndice=='FK_Idlibro_auxiliar') {
			$sNombreIndice='Tipo=  Por Libro Auxiliar';
		} else if($sNombreIndice=='FK_Idmodulo') {
			$sNombreIndice='Tipo=  Por  Modulo';
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
		$sDetalleIndice.=' Código Único de  Modulo='+$id_modulo; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return asiento_automatico_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return asiento_automatico_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(asiento_automatico_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_util::$LABEL_ID_MODULO);
			$reporte->setsDescripcion(asiento_automatico_util::$LABEL_ID_MODULO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(asiento_automatico_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(asiento_automatico_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_util::$LABEL_ID_FUENTE);
			$reporte->setsDescripcion(asiento_automatico_util::$LABEL_ID_FUENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_util::$LABEL_ID_LIBRO_AUXILIAR);
			$reporte->setsDescripcion(asiento_automatico_util::$LABEL_ID_LIBRO_AUXILIAR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_util::$LABEL_ID_CENTRO_COSTO);
			$reporte->setsDescripcion(asiento_automatico_util::$LABEL_ID_CENTRO_COSTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_util::$LABEL_DESCIPCION);
			$reporte->setsDescripcion(asiento_automatico_util::$LABEL_DESCIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_util::$LABEL_ACTIVO);
			$reporte->setsDescripcion(asiento_automatico_util::$LABEL_ACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(asiento_automatico_util::$LABEL_ASIGNADA);
			$reporte->setsDescripcion(asiento_automatico_util::$LABEL_ASIGNADA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=asiento_automatico_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==asiento_automatico_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=asiento_automatico_util::$ID_EMPRESA;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==asiento_automatico_util::$ID_MODULO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=asiento_automatico_util::$ID_MODULO;
		}
		
		return $arrColumnasGlobales;
	}
	
	public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		
		$arrColumnasGlobales[]=asiento_automatico_util::$ID_MODULO;
		
		return $arrColumnasGlobales;
	}
	
	/*DEEP CLASSES*/
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();	
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(empresa::$class);
				$classes[]=new Classe(modulo::$class);
				$classes[]=new Classe(fuente::$class);
				$classes[]=new Classe(libro_auxiliar::$class);
				$classes[]=new Classe(centro_costo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
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
				
				$classes[]=new Classe(asiento_automatico_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==asiento_automatico_detalle::$class) {
						$classes[]=new Classe(asiento_automatico_detalle::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==asiento_automatico_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_automatico_detalle::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_util::$LABEL_ID, asiento_automatico_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_util::$LABEL_ID_EMPRESA, asiento_automatico_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_util::$LABEL_ID_MODULO, asiento_automatico_util::$ID_MODULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_util::$LABEL_CODIGO, asiento_automatico_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_util::$LABEL_NOMBRE, asiento_automatico_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_util::$LABEL_ID_FUENTE, asiento_automatico_util::$ID_FUENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_util::$LABEL_ID_LIBRO_AUXILIAR, asiento_automatico_util::$ID_LIBRO_AUXILIAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_util::$LABEL_ID_CENTRO_COSTO, asiento_automatico_util::$ID_CENTRO_COSTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_util::$LABEL_DESCIPCION, asiento_automatico_util::$DESCIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_util::$LABEL_ACTIVO, asiento_automatico_util::$ACTIVO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_util::$LABEL_ASIGNADA, asiento_automatico_util::$ASIGNADA,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO, asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy(' Modulo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Modulo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
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

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Activo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Activo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',asiento_automatico $asiento_automatico,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Modulo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico->getid_modulo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fuente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico->getid_fuente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Libro Auxiliar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico->getid_libro_auxiliar_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Centro Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico->getid_centro_costo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($asiento_automatico->getdescripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Activo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($asiento_automatico->getactivo()),40,6,1); $row[]=$cellReport;
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
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface asiento_automatico_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $asiento_automaticos,int $iIdNuevoasiento_automatico) : int;	
		public static function getIndiceActual(array $asiento_automaticos,asiento_automatico $asiento_automatico,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getasiento_automaticoDescripcion(?asiento_automatico $asiento_automatico) : string {;	
		public static function setasiento_automaticoDescripcion(?asiento_automatico $asiento_automatico,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $asiento_automaticos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $asiento_automaticos);	
		public static function refrescarFKDescripcion(asiento_automatico $asiento_automatico);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',asiento_automatico $asiento_automatico,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

