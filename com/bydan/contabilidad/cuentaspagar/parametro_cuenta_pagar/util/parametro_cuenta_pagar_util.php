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

namespace com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\entity\parametro_cuenta_pagar;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


class parametro_cuenta_pagar_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='parametro_cuenta_pagar';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_pagar.parametro_cuenta_pagars';
	/*'Mantenimientoparametro_cuenta_pagar.jsf';*/
	public static string $STR_MODULO_OPCION='cuentaspagar';
	public static string $STR_NOMBRE_CLASE='Mantenimientoparametro_cuenta_pagar.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='parametro_cuenta_pagarPersistenceName';
	/*.parametro_cuenta_pagar_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='parametro_cuenta_pagar_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='parametro_cuenta_pagar_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='parametro_cuenta_pagar_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Parametro Cuentas Pagars';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Parametro Cuentas Pagar';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASPAGAR='cuentaspagar';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $STR_TABLE_NAME='parametro_cuenta_pagar';
	public static string $PARAMETRO_CUENTA_PAGAR='cp_parametro_cuenta_pagar';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.parametro_cuenta_pagar';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_cuenta_pagar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_credito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_debito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mostrar_anulado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_proveedor_inactivo from '.parametro_cuenta_pagar_util::$SCHEMA.'.'.parametro_cuenta_pagar_util::$TABLENAME;*/
	
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
	//public $parametro_cuenta_pagarConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $NUMERO_CUENTA_PAGAR='numero_cuenta_pagar';
    public static string $NUMERO_CREDITO='numero_credito';
    public static string $NUMERO_DEBITO='numero_debito';
    public static string $NUMERO_PAGO='numero_pago';
    public static string $MOSTRAR_ANULADO='mostrar_anulado';
    public static string $NUMERO_PROVEEDOR='numero_proveedor';
    public static string $CON_PROVEEDOR_INACTIVO='con_proveedor_inactivo';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_NUMERO_CUENTA_PAGAR='Numero Cuenta Pagar';
    public static string $LABEL_NUMERO_CREDITO='Numero Credito';
    public static string $LABEL_NUMERO_DEBITO='Numero Debito';
    public static string $LABEL_NUMERO_PAGO='Numero Pago';
    public static string $LABEL_MOSTRAR_ANULADO='Mostrar Anulado';
    public static string $LABEL_NUMERO_PROVEEDOR='Numero Proveedor';
    public static string $LABEL_CON_PROVEEDOR_INACTIVO='Con Proveedor Inactivo';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_cuenta_pagarConstantesFuncionesAdditional=new $parametro_cuenta_pagarConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $parametro_cuenta_pagars,int $iIdNuevoparametro_cuenta_pagar) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_cuenta_pagars as $parametro_cuenta_pagarAux) {
			if($parametro_cuenta_pagarAux->getId()==$iIdNuevoparametro_cuenta_pagar) {
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
	
	public static function getIndiceActual(array $parametro_cuenta_pagars,parametro_cuenta_pagar $parametro_cuenta_pagar,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_cuenta_pagars as $parametro_cuenta_pagarAux) {
			if($parametro_cuenta_pagarAux->getId()==$parametro_cuenta_pagar->getId()) {
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
	public static function getparametro_cuenta_pagarDescripcion(?parametro_cuenta_pagar $parametro_cuenta_pagar) : string {//parametro_cuenta_pagar NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($parametro_cuenta_pagar !=null) {
			/*&& parametro_cuenta_pagar->getId()!=0*/
			
			if($parametro_cuenta_pagar->getId()!=null) {
				$sDescripcion=(string)$parametro_cuenta_pagar->getId();
			}
			
			/*parametro_cuenta_pagar;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setparametro_cuenta_pagarDescripcion(?parametro_cuenta_pagar $parametro_cuenta_pagar,string $sValor) {			
		if($parametro_cuenta_pagar !=null) {
			
			/*parametro_cuenta_pagar;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $parametro_cuenta_pagars) : array {
		$parametro_cuenta_pagarsForeignKey=array();
		
		foreach ($parametro_cuenta_pagars as $parametro_cuenta_pagarLocal) {
			$parametro_cuenta_pagarsForeignKey[$parametro_cuenta_pagarLocal->getId()]=parametro_cuenta_pagar_util::getparametro_cuenta_pagarDescripcion($parametro_cuenta_pagarLocal);
		}
			
		return $parametro_cuenta_pagarsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelnumero_cuenta_pagar() : string  { return 'Numero Cuenta Pagar'; }
    public static function getColumnLabelnumero_credito() : string  { return 'Numero Credito'; }
    public static function getColumnLabelnumero_debito() : string  { return 'Numero Debito'; }
    public static function getColumnLabelnumero_pago() : string  { return 'Numero Pago'; }
    public static function getColumnLabelmostrar_anulado() : string  { return 'Mostrar Anulado'; }
    public static function getColumnLabelnumero_proveedor() : string  { return 'Numero Proveedor'; }
    public static function getColumnLabelcon_proveedor_inactivo() : string  { return 'Con Proveedor Inactivo'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getmostrar_anuladoDescripcion($parametro_cuenta_pagar) {
		$sDescripcion='Verdadero';
		if(!$parametro_cuenta_pagar->getmostrar_anulado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_proveedor_inactivoDescripcion($parametro_cuenta_pagar) {
		$sDescripcion='Verdadero';
		if(!$parametro_cuenta_pagar->getcon_proveedor_inactivo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $parametro_cuenta_pagars) {		
		try {
			
			$parametro_cuenta_pagar = new parametro_cuenta_pagar();
			
			foreach($parametro_cuenta_pagars as $parametro_cuenta_pagar) {
				
				$parametro_cuenta_pagar->setid_empresa_Descripcion(parametro_cuenta_pagar_util::getempresaDescripcion($parametro_cuenta_pagar->getempresa()));
			}
			
			if($parametro_cuenta_pagar!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(parametro_cuenta_pagar $parametro_cuenta_pagar) {		
		try {
			
			
				$parametro_cuenta_pagar->setid_empresa_Descripcion(parametro_cuenta_pagar_util::getempresaDescripcion($parametro_cuenta_pagar->getempresa()));
							
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
		return parametro_cuenta_pagar_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return parametro_cuenta_pagar_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_pagar_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(parametro_cuenta_pagar_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_pagar_util::$LABEL_NUMERO_CUENTA_PAGAR);
			$reporte->setsDescripcion(parametro_cuenta_pagar_util::$LABEL_NUMERO_CUENTA_PAGAR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_pagar_util::$LABEL_NUMERO_CREDITO);
			$reporte->setsDescripcion(parametro_cuenta_pagar_util::$LABEL_NUMERO_CREDITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_pagar_util::$LABEL_NUMERO_DEBITO);
			$reporte->setsDescripcion(parametro_cuenta_pagar_util::$LABEL_NUMERO_DEBITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_pagar_util::$LABEL_NUMERO_PAGO);
			$reporte->setsDescripcion(parametro_cuenta_pagar_util::$LABEL_NUMERO_PAGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_pagar_util::$LABEL_MOSTRAR_ANULADO);
			$reporte->setsDescripcion(parametro_cuenta_pagar_util::$LABEL_MOSTRAR_ANULADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_pagar_util::$LABEL_NUMERO_PROVEEDOR);
			$reporte->setsDescripcion(parametro_cuenta_pagar_util::$LABEL_NUMERO_PROVEEDOR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_cuenta_pagar_util::$LABEL_CON_PROVEEDOR_INACTIVO);
			$reporte->setsDescripcion(parametro_cuenta_pagar_util::$LABEL_CON_PROVEEDOR_INACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=parametro_cuenta_pagar_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==parametro_cuenta_pagar_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=parametro_cuenta_pagar_util::$ID_EMPRESA;
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_pagar_util::$LABEL_ID, parametro_cuenta_pagar_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_pagar_util::$LABEL_ID_EMPRESA, parametro_cuenta_pagar_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_pagar_util::$LABEL_NUMERO_CUENTA_PAGAR, parametro_cuenta_pagar_util::$NUMERO_CUENTA_PAGAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_pagar_util::$LABEL_NUMERO_CREDITO, parametro_cuenta_pagar_util::$NUMERO_CREDITO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_pagar_util::$LABEL_NUMERO_DEBITO, parametro_cuenta_pagar_util::$NUMERO_DEBITO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_pagar_util::$LABEL_NUMERO_PAGO, parametro_cuenta_pagar_util::$NUMERO_PAGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_pagar_util::$LABEL_MOSTRAR_ANULADO, parametro_cuenta_pagar_util::$MOSTRAR_ANULADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_pagar_util::$LABEL_NUMERO_PROVEEDOR, parametro_cuenta_pagar_util::$NUMERO_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_cuenta_pagar_util::$LABEL_CON_PROVEEDOR_INACTIVO, parametro_cuenta_pagar_util::$CON_PROVEEDOR_INACTIVO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Numero Cuenta Pagar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Cuenta Pagar',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Credito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Credito',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Debito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Debito',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Anulado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Anulado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Proveedor',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Proveedor Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Proveedor Inactivo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',parametro_cuenta_pagar $parametro_cuenta_pagar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_pagar->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Cuenta Pagar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_pagar->getnumero_cuenta_pagar(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Credito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_pagar->getnumero_credito(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Debito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_pagar->getnumero_debito(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_pagar->getnumero_pago(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Anulado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_cuenta_pagar->getmostrar_anulado()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_cuenta_pagar->getnumero_proveedor(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Proveedor Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_cuenta_pagar->getcon_proveedor_inactivo()),40,6,1); $row[]=$cellReport;
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
	
	interface parametro_cuenta_pagar_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $parametro_cuenta_pagars,int $iIdNuevoparametro_cuenta_pagar) : int;	
		public static function getIndiceActual(array $parametro_cuenta_pagars,parametro_cuenta_pagar $parametro_cuenta_pagar,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getparametro_cuenta_pagarDescripcion(?parametro_cuenta_pagar $parametro_cuenta_pagar) : string {;	
		public static function setparametro_cuenta_pagarDescripcion(?parametro_cuenta_pagar $parametro_cuenta_pagar,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $parametro_cuenta_pagars) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $parametro_cuenta_pagars);	
		public static function refrescarFKDescripcion(parametro_cuenta_pagar $parametro_cuenta_pagar);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',parametro_cuenta_pagar $parametro_cuenta_pagar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

