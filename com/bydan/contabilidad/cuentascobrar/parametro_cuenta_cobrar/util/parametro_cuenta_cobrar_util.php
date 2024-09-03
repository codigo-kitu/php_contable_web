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

namespace com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\business\entity\parametro_cuenta_cobrar;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


class parametro_cuenta_cobrar_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='parametro_cuenta_cobrar';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_cobrar.parametro_cuenta_cobrars';
	/*'Mantenimientoparametro_cuenta_cobrar.jsf';*/
	public static string $STR_MODULO_OPCION='cuentascobrar';
	public static string $STR_NOMBRE_CLASE='Mantenimientoparametro_cuenta_cobrar.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='parametro_cuenta_cobrarPersistenceName';
	/*.parametro_cuenta_cobrar_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='parametro_cuenta_cobrar_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='parametro_cuenta_cobrar_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='parametro_cuenta_cobrar_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Parametro Cuentas Cobrars';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Parametro Cuentas Cobrar';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASCOBRAR='cuentascobrar';
	public static string $STR_PREFIJO_TABLE='cc_';
	public static string $STR_TABLE_NAME='parametro_cuenta_cobrar';
	public static string $PARAMETRO_CUENTA_COBRAR='cc_parametro_cuenta_cobrar';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.parametro_cuenta_cobrar';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_cuenta_cobrar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_debito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_credito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mostrar_anulado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_cliente_inactivo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_registro_tributario from '.parametro_cuenta_cobrar_util::$SCHEMA.'.'.parametro_cuenta_cobrar_util::$TABLENAME;*/
	
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
	//public $parametro_cuenta_cobrarConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $NUMERO_CUENTA_COBRAR='numero_cuenta_cobrar';
    public static string $NUMERO_DEBITO='numero_debito';
    public static string $NUMERO_CREDITO='numero_credito';
    public static string $NUMERO_PAGO='numero_pago';
    public static string $MOSTRAR_ANULADO='mostrar_anulado';
    public static string $NUMERO_CLIENTE='numero_cliente';
    public static string $CON_CLIENTE_INACTIVO='con_cliente_inactivo';
    public static string $NOMBRE_REGISTRO_UNICO='nombre_registro_tributario';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_NUMERO_CUENTA_COBRAR='Numero Cuenta Cobrar';
    public static string $LABEL_NUMERO_DEBITO='Numero Debito';
    public static string $LABEL_NUMERO_CREDITO='Numero Credito';
    public static string $LABEL_NUMERO_PAGO='Numero Pago';
    public static string $LABEL_MOSTRAR_ANULADO='Mostrar Anulado';
    public static string $LABEL_NUMERO_CLIENTE='Numero Cliente';
    public static string $LABEL_CON_CLIENTE_INACTIVO='Con Cliente Inactivo';
    public static string $LABEL_NOMBRE_REGISTRO_UNICO='Nombre Registro Tributario';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_cuenta_cobrarConstantesFuncionesAdditional=new $parametro_cuenta_cobrarConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $parametro_cuenta_cobrars,int $iIdNuevoparametro_cuenta_cobrar) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_cuenta_cobrars as $parametro_cuenta_cobrarAux) {
			if($parametro_cuenta_cobrarAux->getId()==$iIdNuevoparametro_cuenta_cobrar) {
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
	
	public static function getIndiceActual(array $parametro_cuenta_cobrars,parametro_cuenta_cobrar $parametro_cuenta_cobrar,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_cuenta_cobrars as $parametro_cuenta_cobrarAux) {
			if($parametro_cuenta_cobrarAux->getId()==$parametro_cuenta_cobrar->getId()) {
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
	public static function getparametro_cuenta_cobrarDescripcion(?parametro_cuenta_cobrar $parametro_cuenta_cobrar) : string {//parametro_cuenta_cobrar NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($parametro_cuenta_cobrar !=null) {
			/*&& parametro_cuenta_cobrar->getId()!=0*/
			
			if($parametro_cuenta_cobrar->getId()!=null) {
				$sDescripcion=(string)$parametro_cuenta_cobrar->getId();
			}
			
			/*parametro_cuenta_cobrar;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setparametro_cuenta_cobrarDescripcion(?parametro_cuenta_cobrar $parametro_cuenta_cobrar,string $sValor) {			
		if($parametro_cuenta_cobrar !=null) {
			
			/*parametro_cuenta_cobrar;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $parametro_cuenta_cobrars) : array {
		$parametro_cuenta_cobrarsForeignKey=array();
		
		foreach ($parametro_cuenta_cobrars as $parametro_cuenta_cobrarLocal) {
			$parametro_cuenta_cobrarsForeignKey[$parametro_cuenta_cobrarLocal->getId()]=parametro_cuenta_cobrar_util::getparametro_cuenta_cobrarDescripcion($parametro_cuenta_cobrarLocal);
		}
			
		return $parametro_cuenta_cobrarsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelnumero_cuenta_cobrar() : string  { return 'Numero Cuenta Cobrar'; }
    public static function getColumnLabelnumero_debito() : string  { return 'Numero Debito'; }
    public static function getColumnLabelnumero_credito() : string  { return 'Numero Credito'; }
    public static function getColumnLabelnumero_pago() : string  { return 'Numero Pago'; }
    public static function getColumnLabelmostrar_anulado() : string  { return 'Mostrar Anulado'; }
    public static function getColumnLabelnumero_cliente() : string  { return 'Numero Cliente'; }
    public static function getColumnLabelcon_cliente_inactivo() : string  { return 'Con Cliente Inactivo'; }
    public static function getColumnLabelnombre_registro_unico() : string  { return 'Nombre Registro Tributario'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getmostrar_anuladoDescripcion($parametro_cuenta_cobrar) {
		$sDescripcion='Verdadero';
		if(!$parametro_cuenta_cobrar->getmostrar_anulado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_cliente_inactivoDescripcion($parametro_cuenta_cobrar) {
		$sDescripcion='Verdadero';
		if(!$parametro_cuenta_cobrar->getcon_cliente_inactivo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $parametro_cuenta_cobrars) {		
		try {
			
			$parametro_cuenta_cobrar = new parametro_cuenta_cobrar();
			
			foreach($parametro_cuenta_cobrars as $parametro_cuenta_cobrar) {
				
				$parametro_cuenta_cobrar->setid_empresa_Descripcion(parametro_cuenta_cobrar_util::getempresaDescripcion($parametro_cuenta_cobrar->getempresa()));
			}
			
			if($parametro_cuenta_cobrar!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(parametro_cuenta_cobrar $parametro_cuenta_cobrar) {		
		try {
			
			
				$parametro_cuenta_cobrar->setid_empresa_Descripcion(parametro_cuenta_cobrar_util::getempresaDescripcion($parametro_cuenta_cobrar->getempresa()));
							
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

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return parametro_cuenta_cobrar_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return parametro_cuenta_cobrar_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_cobrar_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(parametro_cuenta_cobrar_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_cobrar_util::$LABEL_NUMERO_CUENTA_COBRAR);
			$reporte->setsDescripcion(parametro_cuenta_cobrar_util::$LABEL_NUMERO_CUENTA_COBRAR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_cobrar_util::$LABEL_NUMERO_DEBITO);
			$reporte->setsDescripcion(parametro_cuenta_cobrar_util::$LABEL_NUMERO_DEBITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_cobrar_util::$LABEL_NUMERO_CREDITO);
			$reporte->setsDescripcion(parametro_cuenta_cobrar_util::$LABEL_NUMERO_CREDITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_cobrar_util::$LABEL_NUMERO_PAGO);
			$reporte->setsDescripcion(parametro_cuenta_cobrar_util::$LABEL_NUMERO_PAGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_cobrar_util::$LABEL_MOSTRAR_ANULADO);
			$reporte->setsDescripcion(parametro_cuenta_cobrar_util::$LABEL_MOSTRAR_ANULADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_cobrar_util::$LABEL_NUMERO_CLIENTE);
			$reporte->setsDescripcion(parametro_cuenta_cobrar_util::$LABEL_NUMERO_CLIENTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_cobrar_util::$LABEL_CON_CLIENTE_INACTIVO);
			$reporte->setsDescripcion(parametro_cuenta_cobrar_util::$LABEL_CON_CLIENTE_INACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_cobrar_util::$LABEL_NOMBRE_REGISTRO_UNICO);
			$reporte->setsDescripcion(parametro_cuenta_cobrar_util::$LABEL_NOMBRE_REGISTRO_UNICO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=parametro_cuenta_cobrar_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==parametro_cuenta_cobrar_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=parametro_cuenta_cobrar_util::$ID_EMPRESA;
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
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_cobrar_util::$LABEL_ID, parametro_cuenta_cobrar_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_cobrar_util::$LABEL_ID_EMPRESA, parametro_cuenta_cobrar_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_cobrar_util::$LABEL_NUMERO_CUENTA_COBRAR, parametro_cuenta_cobrar_util::$NUMERO_CUENTA_COBRAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_cobrar_util::$LABEL_NUMERO_DEBITO, parametro_cuenta_cobrar_util::$NUMERO_DEBITO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_cobrar_util::$LABEL_NUMERO_CREDITO, parametro_cuenta_cobrar_util::$NUMERO_CREDITO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_cobrar_util::$LABEL_NUMERO_PAGO, parametro_cuenta_cobrar_util::$NUMERO_PAGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_cobrar_util::$LABEL_MOSTRAR_ANULADO, parametro_cuenta_cobrar_util::$MOSTRAR_ANULADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_cobrar_util::$LABEL_NUMERO_CLIENTE, parametro_cuenta_cobrar_util::$NUMERO_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_cobrar_util::$LABEL_CON_CLIENTE_INACTIVO, parametro_cuenta_cobrar_util::$CON_CLIENTE_INACTIVO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_cobrar_util::$LABEL_NOMBRE_REGISTRO_UNICO, parametro_cuenta_cobrar_util::$NOMBRE_REGISTRO_UNICO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Numero Cuenta Cobrar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Cuenta Cobrar',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Debito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Debito',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Credito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Credito',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Anulado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Anulado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Cliente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Cliente Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Cliente Inactivo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Registro Tributario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Registro Tributario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',parametro_cuenta_cobrar $parametro_cuenta_cobrar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Cuenta Cobrar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnumero_cuenta_cobrar(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Debito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnumero_debito(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Credito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnumero_credito(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnumero_pago(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Anulado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_cuenta_cobrar->getmostrar_anulado()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnumero_cliente(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Cliente Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_cuenta_cobrar->getcon_cliente_inactivo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Registro Tributario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_cobrar->getnombre_registro_tributario(),40,6,1); $row[]=$cellReport;
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
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface parametro_cuenta_cobrar_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $parametro_cuenta_cobrars,int $iIdNuevoparametro_cuenta_cobrar) : int;	
		public static function getIndiceActual(array $parametro_cuenta_cobrars,parametro_cuenta_cobrar $parametro_cuenta_cobrar,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getparametro_cuenta_cobrarDescripcion(?parametro_cuenta_cobrar $parametro_cuenta_cobrar) : string {;	
		public static function setparametro_cuenta_cobrarDescripcion(?parametro_cuenta_cobrar $parametro_cuenta_cobrar,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $parametro_cuenta_cobrars) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $parametro_cuenta_cobrars);	
		public static function refrescarFKDescripcion(parametro_cuenta_cobrar $parametro_cuenta_cobrar);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',parametro_cuenta_cobrar $parametro_cuenta_cobrar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

