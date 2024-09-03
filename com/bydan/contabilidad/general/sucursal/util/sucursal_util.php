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

namespace com\bydan\contabilidad\general\sucursal\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

//REL


class sucursal_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='sucursal';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='general.sucursals';
	/*'Mantenimientosucursal.jsf';*/
	public static string $STR_MODULO_OPCION='general';
	public static string $STR_NOMBRE_CLASE='Mantenimientosucursal.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='sucursalPersistenceName';
	/*.sucursal_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='sucursal_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='sucursal_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='sucursal_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Sucursals';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Sucursal';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $GENERAL='general';
	public static string $STR_PREFIJO_TABLE='gen_';
	public static string $STR_TABLE_NAME='sucursal';
	public static string $SUCURSAL='gen_sucursal';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.sucursal';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pais,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ciudad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.registro_tributario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.registro_sucursalrial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion3,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.celular,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.correo_electronico,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sitio_web,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_postal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fax,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.barrio_distrito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.logo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.base_de_datos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.condicion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.icono_asociado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.folder_sucursal from '.sucursal_util::$SCHEMA.'.'.sucursal_util::$TABLENAME;*/
	
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
	//public $sucursalConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_PAIS='id_pais';
    public static string $ID_CIUDAD='id_ciudad';
    public static string $NOMBRE='nombre';
    public static string $REGISTRO_TRIBUTARIO='registro_tributario';
    public static string $REGISTRO_SUCURSALRIAL='registro_sucursalrial';
    public static string $DIRECCION1='direccion1';
    public static string $DIRECCION2='direccion2';
    public static string $DIRECCION3='direccion3';
    public static string $TELEFONO1='telefono1';
    public static string $CELULAR='celular';
    public static string $CORREO_ELECTRONICO='correo_electronico';
    public static string $SITIO_WEB='sitio_web';
    public static string $CODIGO_POSTAL='codigo_postal';
    public static string $FAX='fax';
    public static string $BARRIO_DISTRITO='barrio_distrito';
    public static string $LOGO='logo';
    public static string $BASE_DE_DATOS='base_de_datos';
    public static string $CONDICION='condicion';
    public static string $ICONO_ASOCIADO='icono_asociado';
    public static string $FOLDER_SUCURSAL='folder_sucursal';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_PAIS='Pais';
    public static string $LABEL_ID_CIUDAD='Ciudad';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_REGISTRO_TRIBUTARIO='Registro Tributario (RUC)';
    public static string $LABEL_REGISTRO_SUCURSALRIAL='Registro Empresarial';
    public static string $LABEL_DIRECCION1='Direccion1';
    public static string $LABEL_DIRECCION2='Direccion2';
    public static string $LABEL_DIRECCION3='Direccion3';
    public static string $LABEL_TELEFONO1='Telefono1';
    public static string $LABEL_CELULAR='Celular';
    public static string $LABEL_CORREO_ELECTRONICO='Correo Electronico';
    public static string $LABEL_SITIO_WEB='Sitio Web';
    public static string $LABEL_CODIGO_POSTAL='Codigo Postal';
    public static string $LABEL_FAX='Fax';
    public static string $LABEL_BARRIO_DISTRITO='Barrio Distrito';
    public static string $LABEL_LOGO='Logo';
    public static string $LABEL_BASE_DE_DATOS='Base De Datos';
    public static string $LABEL_CONDICION='Condicion';
    public static string $LABEL_ICONO_ASOCIADO='Icono Asociado';
    public static string $LABEL_FOLDER_SUCURSAL='Folder';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->sucursalConstantesFuncionesAdditional=new $sucursalConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $sucursals,int $iIdNuevosucursal) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($sucursals as $sucursalAux) {
			if($sucursalAux->getId()==$iIdNuevosucursal) {
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
	
	public static function getIndiceActual(array $sucursals,sucursal $sucursal,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($sucursals as $sucursalAux) {
			if($sucursalAux->getId()==$sucursal->getId()) {
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
	public static function getsucursalDescripcion(?sucursal $sucursal) : string {//sucursal NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($sucursal !=null) {
			/*&& sucursal->getId()!=0*/
			
			$sDescripcion=($sucursal->getnombre());
			
			/*sucursal;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setsucursalDescripcion(?sucursal $sucursal,string $sValor) {			
		if($sucursal !=null) {
			$sucursal->setnombre($sValor);;
			/*sucursal;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $sucursals) : array {
		$sucursalsForeignKey=array();
		
		foreach ($sucursals as $sucursalLocal) {
			$sucursalsForeignKey[$sucursalLocal->getId()]=sucursal_util::getsucursalDescripcion($sucursalLocal);
		}
			
		return $sucursalsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_pais() : string  { return 'Pais'; }
    public static function getColumnLabelid_ciudad() : string  { return 'Ciudad'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelregistro_tributario() : string  { return 'Registro Tributario (RUC)'; }
    public static function getColumnLabelregistro_sucursalrial() : string  { return 'Registro Empresarial'; }
    public static function getColumnLabeldireccion1() : string  { return 'Direccion1'; }
    public static function getColumnLabeldireccion2() : string  { return 'Direccion2'; }
    public static function getColumnLabeldireccion3() : string  { return 'Direccion3'; }
    public static function getColumnLabeltelefono1() : string  { return 'Telefono1'; }
    public static function getColumnLabelcelular() : string  { return 'Celular'; }
    public static function getColumnLabelcorreo_electronico() : string  { return 'Correo Electronico'; }
    public static function getColumnLabelsitio_web() : string  { return 'Sitio Web'; }
    public static function getColumnLabelcodigo_postal() : string  { return 'Codigo Postal'; }
    public static function getColumnLabelfax() : string  { return 'Fax'; }
    public static function getColumnLabelbarrio_distrito() : string  { return 'Barrio Distrito'; }
    public static function getColumnLabellogo() : string  { return 'Logo'; }
    public static function getColumnLabelbase_de_datos() : string  { return 'Base De Datos'; }
    public static function getColumnLabelcondicion() : string  { return 'Condicion'; }
    public static function getColumnLabelicono_asociado() : string  { return 'Icono Asociado'; }
    public static function getColumnLabelfolder_sucursal() : string  { return 'Folder'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $sucursals) {		
		try {
			
			$sucursal = new sucursal();
			
			foreach($sucursals as $sucursal) {
				
				$sucursal->setid_empresa_Descripcion(sucursal_util::getempresaDescripcion($sucursal->getempresa()));
				$sucursal->setid_pais_Descripcion(sucursal_util::getpaisDescripcion($sucursal->getpais()));
				$sucursal->setid_ciudad_Descripcion(sucursal_util::getciudadDescripcion($sucursal->getciudad()));
			}
			
			if($sucursal!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(sucursal $sucursal) {		
		try {
			
			
				$sucursal->setid_empresa_Descripcion(sucursal_util::getempresaDescripcion($sucursal->getempresa()));
				$sucursal->setid_pais_Descripcion(sucursal_util::getpaisDescripcion($sucursal->getpais()));
				$sucursal->setid_ciudad_Descripcion(sucursal_util::getciudadDescripcion($sucursal->getciudad()));
							
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
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
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

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

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
		return sucursal_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return sucursal_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(sucursal_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_ID_PAIS);
			$reporte->setsDescripcion(sucursal_util::$LABEL_ID_PAIS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_ID_CIUDAD);
			$reporte->setsDescripcion(sucursal_util::$LABEL_ID_CIUDAD.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(sucursal_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_REGISTRO_TRIBUTARIO);
			$reporte->setsDescripcion(sucursal_util::$LABEL_REGISTRO_TRIBUTARIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_REGISTRO_SUCURSALRIAL);
			$reporte->setsDescripcion(sucursal_util::$LABEL_REGISTRO_SUCURSALRIAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_DIRECCION1);
			$reporte->setsDescripcion(sucursal_util::$LABEL_DIRECCION1);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_DIRECCION2);
			$reporte->setsDescripcion(sucursal_util::$LABEL_DIRECCION2);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_DIRECCION3);
			$reporte->setsDescripcion(sucursal_util::$LABEL_DIRECCION3);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_TELEFONO1);
			$reporte->setsDescripcion(sucursal_util::$LABEL_TELEFONO1);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_CELULAR);
			$reporte->setsDescripcion(sucursal_util::$LABEL_CELULAR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_CORREO_ELECTRONICO);
			$reporte->setsDescripcion(sucursal_util::$LABEL_CORREO_ELECTRONICO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_SITIO_WEB);
			$reporte->setsDescripcion(sucursal_util::$LABEL_SITIO_WEB);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_CODIGO_POSTAL);
			$reporte->setsDescripcion(sucursal_util::$LABEL_CODIGO_POSTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_FAX);
			$reporte->setsDescripcion(sucursal_util::$LABEL_FAX);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_BARRIO_DISTRITO);
			$reporte->setsDescripcion(sucursal_util::$LABEL_BARRIO_DISTRITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_LOGO);
			$reporte->setsDescripcion(sucursal_util::$LABEL_LOGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_BASE_DE_DATOS);
			$reporte->setsDescripcion(sucursal_util::$LABEL_BASE_DE_DATOS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_CONDICION);
			$reporte->setsDescripcion(sucursal_util::$LABEL_CONDICION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_ICONO_ASOCIADO);
			$reporte->setsDescripcion(sucursal_util::$LABEL_ICONO_ASOCIADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sucursal_util::$LABEL_FOLDER_SUCURSAL);
			$reporte->setsDescripcion(sucursal_util::$LABEL_FOLDER_SUCURSAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==sucursal_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=sucursal_util::$ID_EMPRESA;
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
				$classes[]=new Classe(pais::$class);
				$classes[]=new Classe(ciudad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

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
		
		
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_ID, sucursal_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_ID_EMPRESA, sucursal_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_ID_PAIS, sucursal_util::$ID_PAIS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_ID_CIUDAD, sucursal_util::$ID_CIUDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_NOMBRE, sucursal_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_REGISTRO_TRIBUTARIO, sucursal_util::$REGISTRO_TRIBUTARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_REGISTRO_SUCURSALRIAL, sucursal_util::$REGISTRO_SUCURSALRIAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_DIRECCION1, sucursal_util::$DIRECCION1,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_DIRECCION2, sucursal_util::$DIRECCION2,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_DIRECCION3, sucursal_util::$DIRECCION3,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_TELEFONO1, sucursal_util::$TELEFONO1,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_CELULAR, sucursal_util::$CELULAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_CORREO_ELECTRONICO, sucursal_util::$CORREO_ELECTRONICO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_SITIO_WEB, sucursal_util::$SITIO_WEB,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_CODIGO_POSTAL, sucursal_util::$CODIGO_POSTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_FAX, sucursal_util::$FAX,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_BARRIO_DISTRITO, sucursal_util::$BARRIO_DISTRITO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_LOGO, sucursal_util::$LOGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_BASE_DE_DATOS, sucursal_util::$BASE_DE_DATOS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_CONDICION, sucursal_util::$CONDICION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_ICONO_ASOCIADO, sucursal_util::$ICONO_ASOCIADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sucursal_util::$LABEL_FOLDER_SUCURSAL, sucursal_util::$FOLDER_SUCURSAL,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Pais',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Pais',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ciudad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ciudad',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Registro Tributario (RUC)',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Registro Tributario (RUC)',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Registro Empresarial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Registro Empresarial',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
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

		if(Funciones::existeCadenaArrayOrderBy('Celular',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Celular',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Correo Electronico',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Correo Electronico',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
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

		if(Funciones::existeCadenaArrayOrderBy('Barrio Distrito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Barrio Distrito',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Logo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Logo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',sucursal $sucursal,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Pais',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getid_pais_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ciudad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getid_ciudad_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Registro Tributario (RUC)',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getregistro_tributario(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Registro Empresarial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getregistro_sucursalrial(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getdireccion1(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getdireccion2(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion3',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getdireccion3(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->gettelefono1(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Celular',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getcelular(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Correo Electronico',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getcorreo_electronico(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sitio Web',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getsitio_web(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Postal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getcodigo_postal(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fax',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getfax(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Barrio Distrito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getbarrio_distrito(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Logo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sucursal->getlogo(),40,6,1); $row[]=$cellReport;
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
	
	interface sucursal_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $sucursals,int $iIdNuevosucursal) : int;	
		public static function getIndiceActual(array $sucursals,sucursal $sucursal,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getsucursalDescripcion(?sucursal $sucursal) : string {;	
		public static function setsucursalDescripcion(?sucursal $sucursal,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $sucursals) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $sucursals);	
		public static function refrescarFKDescripcion(sucursal $sucursal);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',sucursal $sucursal,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

