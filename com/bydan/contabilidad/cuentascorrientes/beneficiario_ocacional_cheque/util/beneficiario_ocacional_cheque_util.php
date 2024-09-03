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

namespace com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity\beneficiario_ocacional_cheque;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK


//REL

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\entity\cheque_cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;

class beneficiario_ocacional_cheque_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='beneficiario_ocacional_cheque';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_corrientes.beneficiario_ocacional_cheques';
	/*'Mantenimientobeneficiario_ocacional_cheque.jsf';*/
	public static string $STR_MODULO_OPCION='cuentascorrientes';
	public static string $STR_NOMBRE_CLASE='Mantenimientobeneficiario_ocacional_cheque.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='beneficiario_ocacional_chequePersistenceName';
	/*.beneficiario_ocacional_cheque_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='beneficiario_ocacional_cheque_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='beneficiario_ocacional_cheque_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='beneficiario_ocacional_cheque_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Beneficiario Ocacionales';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Beneficiario Ocacional';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASCORRIENTES='cuentascorrientes';
	public static string $STR_PREFIJO_TABLE='cco_';
	public static string $STR_TABLE_NAME='beneficiario_ocacional_cheque';
	public static string $BENEFICIARIO_OCACIONAL_CHEQUE='cco_beneficiario_ocacional_cheque';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.beneficiario_ocacional_cheque';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion_1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion_2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion_3,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono_movil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.email,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.notas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.registro_ocacional,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.registro_tributario from '.beneficiario_ocacional_cheque_util::$SCHEMA.'.'.beneficiario_ocacional_cheque_util::$TABLENAME;*/
	
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
	//public $beneficiario_ocacional_chequeConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $CODIGO='codigo';
    public static string $NOMBRE='nombre';
    public static string $DIRECCION_1='direccion_1';
    public static string $DIRECCION_2='direccion_2';
    public static string $DIRECCION_3='direccion_3';
    public static string $TELEFONO='telefono';
    public static string $TELEFONO_MOVIL='telefono_movil';
    public static string $EMAIL='email';
    public static string $NOTAS='notas';
    public static string $REGISTRO_OCACIONAL='registro_ocacional';
    public static string $REGISTRO_TRIBUTARIO='registro_tributario';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_CODIGO='Codigo Beneficiario';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_DIRECCION_1='Direccion 1';
    public static string $LABEL_DIRECCION_2='Direccion 2';
    public static string $LABEL_DIRECCION_3='Direccion 3';
    public static string $LABEL_TELEFONO='Telefono';
    public static string $LABEL_TELEFONO_MOVIL='Telefono Movil';
    public static string $LABEL_EMAIL='Email';
    public static string $LABEL_NOTAS='Notas';
    public static string $LABEL_REGISTRO_OCACIONAL='Registro Ocacional';
    public static string $LABEL_REGISTRO_TRIBUTARIO='Registro Tributario';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->beneficiario_ocacional_chequeConstantesFuncionesAdditional=new $beneficiario_ocacional_chequeConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $beneficiario_ocacional_cheques,int $iIdNuevobeneficiario_ocacional_cheque) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($beneficiario_ocacional_cheques as $beneficiario_ocacional_chequeAux) {
			if($beneficiario_ocacional_chequeAux->getId()==$iIdNuevobeneficiario_ocacional_cheque) {
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
	
	public static function getIndiceActual(array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($beneficiario_ocacional_cheques as $beneficiario_ocacional_chequeAux) {
			if($beneficiario_ocacional_chequeAux->getId()==$beneficiario_ocacional_cheque->getId()) {
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
	public static function getbeneficiario_ocacional_chequeDescripcion(?beneficiario_ocacional_cheque $beneficiario_ocacional_cheque) : string {//beneficiario_ocacional_cheque NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($beneficiario_ocacional_cheque !=null) {
			/*&& beneficiario_ocacional_cheque->getId()!=0*/
			
			$sDescripcion=($beneficiario_ocacional_cheque->getnombre());
			
			/*beneficiario_ocacional_cheque;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setbeneficiario_ocacional_chequeDescripcion(?beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,string $sValor) {			
		if($beneficiario_ocacional_cheque !=null) {
			$beneficiario_ocacional_cheque->setnombre($sValor);;
			/*beneficiario_ocacional_cheque;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $beneficiario_ocacional_cheques) : array {
		$beneficiario_ocacional_chequesForeignKey=array();
		
		foreach ($beneficiario_ocacional_cheques as $beneficiario_ocacional_chequeLocal) {
			$beneficiario_ocacional_chequesForeignKey[$beneficiario_ocacional_chequeLocal->getId()]=beneficiario_ocacional_cheque_util::getbeneficiario_ocacional_chequeDescripcion($beneficiario_ocacional_chequeLocal);
		}
			
		return $beneficiario_ocacional_chequesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelcodigo() : string  { return 'Codigo Beneficiario'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabeldireccion_1() : string  { return 'Direccion 1'; }
    public static function getColumnLabeldireccion_2() : string  { return 'Direccion 2'; }
    public static function getColumnLabeldireccion_3() : string  { return 'Direccion 3'; }
    public static function getColumnLabeltelefono() : string  { return 'Telefono'; }
    public static function getColumnLabeltelefono_movil() : string  { return 'Telefono Movil'; }
    public static function getColumnLabelemail() : string  { return 'Email'; }
    public static function getColumnLabelnotas() : string  { return 'Notas'; }
    public static function getColumnLabelregistro_ocacional() : string  { return 'Registro Ocacional'; }
    public static function getColumnLabelregistro_tributario() : string  { return 'Registro Tributario'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $beneficiario_ocacional_cheques) {		
		try {
			
			$beneficiario_ocacional_cheque = new beneficiario_ocacional_cheque();
			
			foreach($beneficiario_ocacional_cheques as $beneficiario_ocacional_cheque) {
				
			}
			
			if($beneficiario_ocacional_cheque!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque) {		
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
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return beneficiario_ocacional_cheque_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return beneficiario_ocacional_cheque_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(beneficiario_ocacional_cheque_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(beneficiario_ocacional_cheque_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(beneficiario_ocacional_cheque_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(beneficiario_ocacional_cheque_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(beneficiario_ocacional_cheque_util::$LABEL_DIRECCION_1);
			$reporte->setsDescripcion(beneficiario_ocacional_cheque_util::$LABEL_DIRECCION_1);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(beneficiario_ocacional_cheque_util::$LABEL_DIRECCION_2);
			$reporte->setsDescripcion(beneficiario_ocacional_cheque_util::$LABEL_DIRECCION_2);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(beneficiario_ocacional_cheque_util::$LABEL_DIRECCION_3);
			$reporte->setsDescripcion(beneficiario_ocacional_cheque_util::$LABEL_DIRECCION_3);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(beneficiario_ocacional_cheque_util::$LABEL_TELEFONO);
			$reporte->setsDescripcion(beneficiario_ocacional_cheque_util::$LABEL_TELEFONO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(beneficiario_ocacional_cheque_util::$LABEL_TELEFONO_MOVIL);
			$reporte->setsDescripcion(beneficiario_ocacional_cheque_util::$LABEL_TELEFONO_MOVIL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(beneficiario_ocacional_cheque_util::$LABEL_EMAIL);
			$reporte->setsDescripcion(beneficiario_ocacional_cheque_util::$LABEL_EMAIL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(beneficiario_ocacional_cheque_util::$LABEL_NOTAS);
			$reporte->setsDescripcion(beneficiario_ocacional_cheque_util::$LABEL_NOTAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(beneficiario_ocacional_cheque_util::$LABEL_REGISTRO_OCACIONAL);
			$reporte->setsDescripcion(beneficiario_ocacional_cheque_util::$LABEL_REGISTRO_OCACIONAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(beneficiario_ocacional_cheque_util::$LABEL_REGISTRO_TRIBUTARIO);
			$reporte->setsDescripcion(beneficiario_ocacional_cheque_util::$LABEL_REGISTRO_TRIBUTARIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=beneficiario_ocacional_cheque_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(cheque_cuenta_corriente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==cheque_cuenta_corriente::$class) {
						$classes[]=new Classe(cheque_cuenta_corriente::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cheque_cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cheque_cuenta_corriente::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_ID, beneficiario_ocacional_cheque_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_CODIGO, beneficiario_ocacional_cheque_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_NOMBRE, beneficiario_ocacional_cheque_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_DIRECCION_1, beneficiario_ocacional_cheque_util::$DIRECCION_1,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_DIRECCION_2, beneficiario_ocacional_cheque_util::$DIRECCION_2,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_DIRECCION_3, beneficiario_ocacional_cheque_util::$DIRECCION_3,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_TELEFONO, beneficiario_ocacional_cheque_util::$TELEFONO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_TELEFONO_MOVIL, beneficiario_ocacional_cheque_util::$TELEFONO_MOVIL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_EMAIL, beneficiario_ocacional_cheque_util::$EMAIL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_NOTAS, beneficiario_ocacional_cheque_util::$NOTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_REGISTRO_OCACIONAL, beneficiario_ocacional_cheque_util::$REGISTRO_OCACIONAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,beneficiario_ocacional_cheque_util::$LABEL_REGISTRO_TRIBUTARIO, beneficiario_ocacional_cheque_util::$REGISTRO_TRIBUTARIO,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO, cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Codigo Beneficiario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Beneficiario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion 1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion 1',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion 2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion 2',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion 3',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion 3',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono Movil',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono Movil',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Email',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Email',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Notas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Notas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Registro Ocacional',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Registro Ocacional',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Registro Tributario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Registro Tributario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Codigo Beneficiario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion 1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getdireccion_1(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion 2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getdireccion_2(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion 3',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getdireccion_3(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->gettelefono(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono Movil',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->gettelefono_movil(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Email',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getemail(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Notas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getnotas(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Registro Ocacional',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getregistro_ocacional(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Registro Tributario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($beneficiario_ocacional_cheque->getregistro_tributario(),40,6,1); $row[]=$cellReport;
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
	
	interface beneficiario_ocacional_cheque_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $beneficiario_ocacional_cheques,int $iIdNuevobeneficiario_ocacional_cheque) : int;	
		public static function getIndiceActual(array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getbeneficiario_ocacional_chequeDescripcion(?beneficiario_ocacional_cheque $beneficiario_ocacional_cheque) : string {;	
		public static function setbeneficiario_ocacional_chequeDescripcion(?beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $beneficiario_ocacional_cheques) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $beneficiario_ocacional_cheques);	
		public static function refrescarFKDescripcion(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

