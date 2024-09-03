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

namespace com\bydan\contabilidad\general\empresa\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\general\empresa\business\entity\empresa;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

//REL


class empresa_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='empresa';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='general.empresas';
	/*'Mantenimientoempresa.jsf';*/
	public static string $STR_MODULO_OPCION='general';
	public static string $STR_NOMBRE_CLASE='Mantenimientoempresa.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='empresaPersistenceName';
	/*.empresa_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='empresa_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='empresa_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='empresa_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Empresas';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Empresa';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $GENERAL='general';
	public static string $STR_PREFIJO_TABLE='gen_';
	public static string $STR_TABLE_NAME='empresa';
	public static string $EMPRESA='gen_empresa';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.empresa';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pais,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ciudad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ruc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_comercial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sector,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion3,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.movil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mail,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sitio_web,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_postal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fax,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.logo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.icono from '.empresa_util::$SCHEMA.'.'.empresa_util::$TABLENAME;*/
	
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
	//public $empresaConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_PAIS='id_pais';
    public static string $ID_CIUDAD='id_ciudad';
    public static string $RUC='ruc';
    public static string $NOMBRE='nombre';
    public static string $NOMBRE_COMERCIAL='nombre_comercial';
    public static string $SECTOR='sector';
    public static string $DIRECCION1='direccion1';
    public static string $DIRECCION2='direccion2';
    public static string $DIRECCION3='direccion3';
    public static string $TELEFONO1='telefono1';
    public static string $MOVIL='movil';
    public static string $MAIL='mail';
    public static string $SITIO_WEB='sitio_web';
    public static string $CODIGO_POSTAL='codigo_postal';
    public static string $FAX='fax';
    public static string $LOGO='logo';
    public static string $ICONO='icono';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_PAIS='Pais';
    public static string $LABEL_ID_CIUDAD='Ciudad';
    public static string $LABEL_RUC='RUC';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_NOMBRE_COMERCIAL='Nombre Comercial';
    public static string $LABEL_SECTOR='Sector';
    public static string $LABEL_DIRECCION1='Direccion1';
    public static string $LABEL_DIRECCION2='Direccion2';
    public static string $LABEL_DIRECCION3='Direccion3';
    public static string $LABEL_TELEFONO1='Telefono1';
    public static string $LABEL_MOVIL='Telefono Movil';
    public static string $LABEL_MAIL='Mail';
    public static string $LABEL_SITIO_WEB='Sitio Web';
    public static string $LABEL_CODIGO_POSTAL='Codigo Postal';
    public static string $LABEL_FAX='Fax';
    public static string $LABEL_LOGO='Logo';
    public static string $LABEL_ICONO='Icono';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->empresaConstantesFuncionesAdditional=new $empresaConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $empresas,int $iIdNuevoempresa) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($empresas as $empresaAux) {
			if($empresaAux->getId()==$iIdNuevoempresa) {
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
	
	public static function getIndiceActual(array $empresas,empresa $empresa,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($empresas as $empresaAux) {
			if($empresaAux->getId()==$empresa->getId()) {
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
	public static function getempresaDescripcion(?empresa $empresa) : string {//empresa NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($empresa !=null) {
			/*&& empresa->getId()!=0*/
			
			$sDescripcion=($empresa->getnombre());
			
			/*empresa;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setempresaDescripcion(?empresa $empresa,string $sValor) {			
		if($empresa !=null) {
			$empresa->setnombre($sValor);;
			/*empresa;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $empresas) : array {
		$empresasForeignKey=array();
		
		foreach ($empresas as $empresaLocal) {
			$empresasForeignKey[$empresaLocal->getId()]=empresa_util::getempresaDescripcion($empresaLocal);
		}
			
		return $empresasForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_pais() : string  { return 'Pais'; }
    public static function getColumnLabelid_ciudad() : string  { return 'Ciudad'; }
    public static function getColumnLabelruc() : string  { return 'RUC'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelnombre_comercial() : string  { return 'Nombre Comercial'; }
    public static function getColumnLabelsector() : string  { return 'Sector'; }
    public static function getColumnLabeldireccion1() : string  { return 'Direccion1'; }
    public static function getColumnLabeldireccion2() : string  { return 'Direccion2'; }
    public static function getColumnLabeldireccion3() : string  { return 'Direccion3'; }
    public static function getColumnLabeltelefono1() : string  { return 'Telefono1'; }
    public static function getColumnLabelmovil() : string  { return 'Telefono Movil'; }
    public static function getColumnLabelmail() : string  { return 'Mail'; }
    public static function getColumnLabelsitio_web() : string  { return 'Sitio Web'; }
    public static function getColumnLabelcodigo_postal() : string  { return 'Codigo Postal'; }
    public static function getColumnLabelfax() : string  { return 'Fax'; }
    public static function getColumnLabellogo() : string  { return 'Logo'; }
    public static function getColumnLabelicono() : string  { return 'Icono'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $empresas) {		
		try {
			
			$empresa = new empresa();
			
			foreach($empresas as $empresa) {
				
				$empresa->setid_pais_Descripcion(empresa_util::getpaisDescripcion($empresa->getpais()));
				$empresa->setid_ciudad_Descripcion(empresa_util::getciudadDescripcion($empresa->getciudad()));
			}
			
			if($empresa!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(empresa $empresa) {		
		try {
			
			
				$empresa->setid_pais_Descripcion(empresa_util::getpaisDescripcion($empresa->getpais()));
				$empresa->setid_ciudad_Descripcion(empresa_util::getciudadDescripcion($empresa->getciudad()));
							
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
		} else if($sNombreIndice=='FK_Idciudad') {
			$sNombreIndice='Tipo=  Por Ciudad';
		} else if($sNombreIndice=='FK_Idpais') {
			$sNombreIndice='Tipo=  Por Pais';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idciudad(int $id_ciudad) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Ciudad='+$id_ciudad; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idpais(int $id_pais) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Pais='+$id_pais; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return empresa_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return empresa_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_ID_PAIS);
			$reporte->setsDescripcion(empresa_util::$LABEL_ID_PAIS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_ID_CIUDAD);
			$reporte->setsDescripcion(empresa_util::$LABEL_ID_CIUDAD.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_RUC);
			$reporte->setsDescripcion(empresa_util::$LABEL_RUC);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(empresa_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_NOMBRE_COMERCIAL);
			$reporte->setsDescripcion(empresa_util::$LABEL_NOMBRE_COMERCIAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_SECTOR);
			$reporte->setsDescripcion(empresa_util::$LABEL_SECTOR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_DIRECCION1);
			$reporte->setsDescripcion(empresa_util::$LABEL_DIRECCION1);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_DIRECCION2);
			$reporte->setsDescripcion(empresa_util::$LABEL_DIRECCION2);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_DIRECCION3);
			$reporte->setsDescripcion(empresa_util::$LABEL_DIRECCION3);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_TELEFONO1);
			$reporte->setsDescripcion(empresa_util::$LABEL_TELEFONO1);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_MOVIL);
			$reporte->setsDescripcion(empresa_util::$LABEL_MOVIL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_MAIL);
			$reporte->setsDescripcion(empresa_util::$LABEL_MAIL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_SITIO_WEB);
			$reporte->setsDescripcion(empresa_util::$LABEL_SITIO_WEB);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_CODIGO_POSTAL);
			$reporte->setsDescripcion(empresa_util::$LABEL_CODIGO_POSTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_FAX);
			$reporte->setsDescripcion(empresa_util::$LABEL_FAX);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_LOGO);
			$reporte->setsDescripcion(empresa_util::$LABEL_LOGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(empresa_util::$LABEL_ICONO);
			$reporte->setsDescripcion(empresa_util::$LABEL_ICONO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=empresa_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(pais::$class);
				$classes[]=new Classe(ciudad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==pais::$class) {
						$classes[]=new Classe(pais::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==ciudad::$class) {
						$classes[]=new Classe(ciudad::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==pais::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pais::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==ciudad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ciudad::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_ID, empresa_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_ID_PAIS, empresa_util::$ID_PAIS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_ID_CIUDAD, empresa_util::$ID_CIUDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_RUC, empresa_util::$RUC,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_NOMBRE, empresa_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_NOMBRE_COMERCIAL, empresa_util::$NOMBRE_COMERCIAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_SECTOR, empresa_util::$SECTOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_DIRECCION1, empresa_util::$DIRECCION1,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_DIRECCION2, empresa_util::$DIRECCION2,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_DIRECCION3, empresa_util::$DIRECCION3,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_TELEFONO1, empresa_util::$TELEFONO1,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_MOVIL, empresa_util::$MOVIL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_MAIL, empresa_util::$MAIL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_SITIO_WEB, empresa_util::$SITIO_WEB,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_CODIGO_POSTAL, empresa_util::$CODIGO_POSTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_FAX, empresa_util::$FAX,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_LOGO, empresa_util::$LOGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,empresa_util::$LABEL_ICONO, empresa_util::$ICONO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Pais',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Pais',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ciudad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ciudad',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('RUC',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('RUC',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Comercial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Comercial',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sector',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sector',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion1',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion2',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion3',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion3',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono1',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono Movil',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono Movil',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mail',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mail',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sitio Web',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sitio Web',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Postal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Postal',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fax',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fax',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Logo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Logo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',empresa $empresa,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Pais',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getid_pais_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ciudad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getid_ciudad_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('RUC',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getruc(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Comercial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getnombre_comercial(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sector',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getsector(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getdireccion1(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getdireccion2(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion3',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getdireccion3(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->gettelefono1(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono Movil',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getmovil(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mail',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getmail(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sitio Web',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getsitio_web(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Postal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getcodigo_postal(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fax',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getfax(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Logo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($empresa->getlogo(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getpaisDescripcion(?pais $pais) : string {
		$sDescripcion='none';
		if($pais!==null) {
			$sDescripcion=pais_util::getpaisDescripcion($pais);
		}
		return $sDescripcion;
	}	
	
	public static function getciudadDescripcion(?ciudad $ciudad) : string {
		$sDescripcion='none';
		if($ciudad!==null) {
			$sDescripcion=ciudad_util::getciudadDescripcion($ciudad);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface empresa_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $empresas,int $iIdNuevoempresa) : int;	
		public static function getIndiceActual(array $empresas,empresa $empresa,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getempresaDescripcion(?empresa $empresa) : string {;	
		public static function setempresaDescripcion(?empresa $empresa,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $empresas) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $empresas);	
		public static function refrescarFKDescripcion(empresa $empresa);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',empresa $empresa,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

