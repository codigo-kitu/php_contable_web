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
namespace com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\data;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\FuncionesSql;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\data\GetEntitiesDataAccessHelper;

/*use com\bydan\framework\contabilidad\business\entity\GeneralEntity;*/
use com\bydan\framework\contabilidad\business\entity\DatoGeneral;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMaximo;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\data\DataAccessHelper;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\ParametersType;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;

use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;

use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\data\forma_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;

//REL

use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\data\imagen_documento_cuenta_pagar_data;
use com\bydan\contabilidad\inventario\devolucion\business\data\devolucion_data;


class documento_cuenta_pagar_data extends GetEntitiesDataAccessHelper implements documento_cuenta_pagar_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $TABLE_NAME='cp_documento_cuenta_pagar';			
	public static string $TABLE_NAME_documento_cuenta_pagar='documento_cuenta_pagar';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_DOCUMENTO_CUENTA_PAGAR_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_DOCUMENTO_CUENTA_PAGAR_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_DOCUMENTO_CUENTA_PAGAR_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_DOCUMENTO_CUENTA_PAGAR_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $documento_cuenta_pagar_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'documento_cuenta_pagar';
		
		documento_cuenta_pagar_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASPAGAR');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->documento_cuenta_pagar_DataAccessAdditional=new documento_cuenta_pagarDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,numero,id_proveedor,tipo,fecha_emision,descripcion,monto,monto_parcial,moneda,fecha_vence,numero_de_pagos,balance,balance_mon,numero_pagado,id_pagado,modulo_origen,id_origen,modulo_destino,id_destino,nombre_pc,hora,monto_mora,interes_mora,dias_gracia_mora,instrumento_pago,tipo_cambio,nro_documento_proveedor,clase_registro,estado_registro,motivo_anulacion,impuesto_1,impuesto_2,impuesto_incluido,observaciones,grupo_pago,termino_idpv,id_forma_pago_proveedor,nro_pago,referencia_pago,fecha_hora,id_base,id_cuenta_corriente) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,\'%s\',%d,\'%s\',\'%s\',\'%s\',%f,%f,\'%s\',\'%s\',%d,%f,%f,\'%s\',%d,\'%s\',%d,\'%s\',%d,\'%s\',\'%s\',%f,%f,%d,\'%s\',%f,\'%s\',\'%s\',\'%s\',\'%s\',%f,%f,\'%d\',\'%s\',\'%s\',%d,%d,\'%s\',\'%s\',\'%s\',%d,%d)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,numero=\'%s\',id_proveedor=%d,tipo=\'%s\',fecha_emision=\'%s\',descripcion=\'%s\',monto=%f,monto_parcial=%f,moneda=\'%s\',fecha_vence=\'%s\',numero_de_pagos=%d,balance=%f,balance_mon=%f,numero_pagado=\'%s\',id_pagado=%d,modulo_origen=\'%s\',id_origen=%d,modulo_destino=\'%s\',id_destino=%d,nombre_pc=\'%s\',hora=\'%s\',monto_mora=%f,interes_mora=%f,dias_gracia_mora=%d,instrumento_pago=\'%s\',tipo_cambio=%f,nro_documento_proveedor=\'%s\',clase_registro=\'%s\',estado_registro=\'%s\',motivo_anulacion=\'%s\',impuesto_1=%f,impuesto_2=%f,impuesto_incluido=\'%d\',observaciones=\'%s\',grupo_pago=\'%s\',termino_idpv=%d,id_forma_pago_proveedor=%d,nro_pago=\'%s\',referencia_pago=\'%s\',fecha_hora=\'%s\',id_base=%d,id_cuenta_corriente=%d where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tipo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_parcial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.moneda,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_de_pagos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance_mon,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_pagado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pagado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modulo_origen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_origen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modulo_destino,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_destino,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_pc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.hora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_mora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.interes_mora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.dias_gracia_mora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.instrumento_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tipo_cambio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_documento_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.clase_registro,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado_registro,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.motivo_anulacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_incluido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observaciones,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.grupo_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.termino_idpv,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_forma_pago_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.referencia_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_hora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_base,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_corriente from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(documento_cuenta_pagar $documento_cuenta_pagar,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($documento_cuenta_pagar->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=documento_cuenta_pagar_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($documento_cuenta_pagar->getId(),$connexion));				
				
			} else if ($documento_cuenta_pagar->getIsChanged()) {
				if($documento_cuenta_pagar->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=documento_cuenta_pagar_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$documento_cuenta_pagar->getid_empresa(),$documento_cuenta_pagar->getid_sucursal(),$documento_cuenta_pagar->getid_ejercicio(),$documento_cuenta_pagar->getid_periodo(),$documento_cuenta_pagar->getid_usuario(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnumero(),$connexion),$documento_cuenta_pagar->getid_proveedor(),Funciones::GetRealScapeString($documento_cuenta_pagar->gettipo(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getdescripcion(),$connexion),$documento_cuenta_pagar->getmonto(),$documento_cuenta_pagar->getmonto_parcial(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmoneda(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_vence(),$connexion),$documento_cuenta_pagar->getnumero_de_pagos(),$documento_cuenta_pagar->getbalance(),$documento_cuenta_pagar->getbalance_mon(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnumero_pagado(),$connexion),$documento_cuenta_pagar->getid_pagado(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmodulo_origen(),$connexion),$documento_cuenta_pagar->getid_origen(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmodulo_destino(),$connexion),$documento_cuenta_pagar->getid_destino(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnombre_pc(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->gethora(),$connexion),$documento_cuenta_pagar->getmonto_mora(),$documento_cuenta_pagar->getinteres_mora(),$documento_cuenta_pagar->getdias_gracia_mora(),Funciones::GetRealScapeString($documento_cuenta_pagar->getinstrumento_pago(),$connexion),$documento_cuenta_pagar->gettipo_cambio(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnro_documento_proveedor(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getclase_registro(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getestado_registro(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getmotivo_anulacion(),$connexion),$documento_cuenta_pagar->getimpuesto_1(),$documento_cuenta_pagar->getimpuesto_2(),$documento_cuenta_pagar->getimpuesto_incluido(),Funciones::GetRealScapeString($documento_cuenta_pagar->getobservaciones(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getgrupo_pago(),$connexion),$documento_cuenta_pagar->gettermino_idpv(),$documento_cuenta_pagar->getid_forma_pago_proveedor(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnro_pago(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getreferencia_pago(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_hora(),$connexion),$documento_cuenta_pagar->getid_base(),$documento_cuenta_pagar->getid_cuenta_corriente() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=documento_cuenta_pagar_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$documento_cuenta_pagar->getid_empresa(),$documento_cuenta_pagar->getid_sucursal(),$documento_cuenta_pagar->getid_ejercicio(),$documento_cuenta_pagar->getid_periodo(),$documento_cuenta_pagar->getid_usuario(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnumero(),$connexion),$documento_cuenta_pagar->getid_proveedor(),Funciones::GetRealScapeString($documento_cuenta_pagar->gettipo(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getdescripcion(),$connexion),$documento_cuenta_pagar->getmonto(),$documento_cuenta_pagar->getmonto_parcial(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmoneda(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_vence(),$connexion),$documento_cuenta_pagar->getnumero_de_pagos(),$documento_cuenta_pagar->getbalance(),$documento_cuenta_pagar->getbalance_mon(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnumero_pagado(),$connexion),$documento_cuenta_pagar->getid_pagado(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmodulo_origen(),$connexion),$documento_cuenta_pagar->getid_origen(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmodulo_destino(),$connexion),$documento_cuenta_pagar->getid_destino(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnombre_pc(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->gethora(),$connexion),$documento_cuenta_pagar->getmonto_mora(),$documento_cuenta_pagar->getinteres_mora(),$documento_cuenta_pagar->getdias_gracia_mora(),Funciones::GetRealScapeString($documento_cuenta_pagar->getinstrumento_pago(),$connexion),$documento_cuenta_pagar->gettipo_cambio(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnro_documento_proveedor(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getclase_registro(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getestado_registro(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getmotivo_anulacion(),$connexion),$documento_cuenta_pagar->getimpuesto_1(),$documento_cuenta_pagar->getimpuesto_2(),$documento_cuenta_pagar->getimpuesto_incluido(),Funciones::GetRealScapeString($documento_cuenta_pagar->getobservaciones(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getgrupo_pago(),$connexion),$documento_cuenta_pagar->gettermino_idpv(),$documento_cuenta_pagar->getid_forma_pago_proveedor(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnro_pago(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getreferencia_pago(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_hora(),$connexion),$documento_cuenta_pagar->getid_base(),$documento_cuenta_pagar->getid_cuenta_corriente(), Funciones::GetRealScapeString($documento_cuenta_pagar->getId(),$connexion), Funciones::GetRealScapeString($documento_cuenta_pagar->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($documento_cuenta_pagar, $connexion,$strQuerySaveComplete,documento_cuenta_pagar_data::$TABLE_NAME,documento_cuenta_pagar_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				documento_cuenta_pagar_data::savePrepared($documento_cuenta_pagar, $connexion,$strQuerySave,documento_cuenta_pagar_data::$TABLE_NAME,documento_cuenta_pagar_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			documento_cuenta_pagar_data::setdocumento_cuenta_pagar_OriginalStatic($documento_cuenta_pagar);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(documento_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				documento_cuenta_pagar_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					documento_cuenta_pagar_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					documento_cuenta_pagar_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(documento_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					documento_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
					mysqli_stmt_execute($prepare_statement);
											
				} else {
					/*PARA POSTGRES*/
				}
	
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$numeroRegistroModificado=mysqli_stmt_affected_rows($prepare_statement);													
					
				} else {
					/*PARA POSTGRES*/
				}
	
				if($numeroRegistroModificado<=0) {
					throw new Exception("No se actualizo los datos,intentelo nuevamente");
				}
	
				if(Constantes::$BIT_ES_POSTGRES==false) {
					if($entity->getIsWithIdentity()) {
						$id=mysqli_stmt_insert_id($prepare_statement);															
					}
					
					mysqli_stmt_close($prepare_statement);
					
				} else {
					/*PAARA POSTGRES*/
				}
					
				if($entity->getIsWithIdentity()) {
					$entity->setId($id);
				}
				
			} else {
				Funciones::writeQueryFile($sQuerySave);
			}		
	
		} catch(Exception $ex) {
			throw $ex;
		}		
	}
	
	public static function update(documento_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					documento_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
					mysqli_stmt_execute($prepare_statement);						
					
				} else {
					/*PARA POSTGRES*/
				}
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$numeroRegistroModificado=mysqli_stmt_affected_rows($prepare_statement);
								
					mysqli_stmt_close($prepare_statement);						
					
				} else {
					/*PARA POSTGRES*/
				}
					
				if($numeroRegistroModificado<=0) {
					throw new Exception('No se actualizo los datos,intentelo nuevamente');
				}
	
			} else {
				Funciones::writeQueryFile($sQuerySave);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function delete(documento_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					documento_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
					mysqli_stmt_execute($prepare_statement);						
					
				} else {
					/*PARA POSTGRES*/
				}
	
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$numeroRegistroModificado=mysqli_stmt_affected_rows($prepare_statement);
								
					mysqli_stmt_close($prepare_statement);						
					
				} else {
					/*PARA POSTGRES*/
				}
	
				if($numeroRegistroModificado<=0) {
					throw new Exception("No se actualizo los datos,intentelo nuevamente");
				}
	
			} else {
				Funciones::writeQueryFile($sQuerySave);
			}			
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute) {	
        try {		
			$connexion->ejecutarQuerySimple($sQueryExecute);
			
      	} catch(Exception $e) {
			throw $e;
      	}		    	
    }
	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo) {	
		$value=null;
			
        try {		
			
			$resultValor=null;
			$resultSetValor=null;			
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQueryExecuteValor);
        	}
						
			$resultValor = $connexion->ejecutarQuery($sQueryExecuteValor);
        	
			$resultSetValor =Connexion::getResultSet($resultValor);
					
			if($resultSetValor) {
				$value=$resultSetValor[$sNombreCampo];
			}
			Connexion::liberarResult($resultValor);	
			
      	} catch(Exception $e) {
			throw $e;
      	}
		
		return $value;
    }	
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?documento_cuenta_pagar {		
		$entity = new documento_cuenta_pagar();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=documento_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=documento_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasPagar.documento_cuenta_pagar.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setdocumento_cuenta_pagar_Original(new documento_cuenta_pagar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,documento_cuenta_pagar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=documento_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setdocumento_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet,documento_cuenta_pagar_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setdocumento_cuenta_pagar_Original(documento_cuenta_pagar_data::getEntityBaseResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet));
				//$entity->setdocumento_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet));
      	    } else {
				$entity =null;
			}
			
			if($entity!=null) {
				parent::setGeneralEntityIsNewFalseIsChangedFalse($entity);
			}
			
			Connexion::liberarResult($result); 

       	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?documento_cuenta_pagar {
		$entity = new documento_cuenta_pagar();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=documento_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=documento_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,documento_cuenta_pagar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasPagar.documento_cuenta_pagar.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setdocumento_cuenta_pagar_Original(new documento_cuenta_pagar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,documento_cuenta_pagar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=documento_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setdocumento_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet,documento_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setdocumento_cuenta_pagar_Original(documento_cuenta_pagar_data::getEntityBaseResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet));
				//$entity->setdocumento_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet));
      	    } else {
				$entity =null;
			}
			
			if($entity !=null) {
				parent::setGeneralEntityIsNewFalseIsChangedFalse($entity);
			}
			
			Connexion::liberarResult($result); 

      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array {
		$entities = array();
		$entity = new documento_cuenta_pagar();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=documento_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=documento_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,documento_cuenta_pagar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new documento_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,documento_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=documento_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdocumento_cuenta_pagar_Original( new documento_cuenta_pagar());
				
				//$entity->setdocumento_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet,documento_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setdocumento_cuenta_pagar_Original(documento_cuenta_pagar_data::getEntityBaseResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet));
				//$entity->setdocumento_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet));
								
      	    	$entities[]=$entity;
				
				$i++;
				
				$resultSet =Connexion::getResultSet($result);
      	    }
    		
			parent::setGeneralEntitiesIsNewFalseIsChangedFalse($entities);
      	   
			Connexion::liberarResult($result);  
			
			if($queryWhereSelectParameters->getPagination()->getBlnConNumeroMaximo() && !$this->isForFKData) {
				$this->setCountSelect($queryWhereSelectParameters,$entity,$connexion);
			}
			
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entities;	
    }	
	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array {
		$entities = array();
		$entity = new documento_cuenta_pagar();		  
		$sQuery='';
	
        try {     	   
        	
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityQueryWhereSelect($entity,$queryWhereSelectParameters,$strQuerySelect);
				
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new documento_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,documento_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=documento_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdocumento_cuenta_pagar_Original( new documento_cuenta_pagar());
				
				//$entity->setdocumento_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet,documento_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setdocumento_cuenta_pagar_Original(documento_cuenta_pagar_data::getEntityBaseResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet));
				//$entity->setdocumento_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet));
				
      	    	$entities[]=$entity;
				
				$i++;
				
				$resultSet =Connexion::getResultSet($result);
      	    }
			
			parent::setGeneralEntitiesIsNewFalseIsChangedFalse($entities);
			
			Connexion::liberarResult($result); 
 			
			if($queryWhereSelectParameters->getPagination()->getBlnConNumeroMaximo() && !$this->isForFKData) {
				$this->setCountSelect($queryWhereSelectParameters,$entity,$connexion);
			}
			
      	} catch(Exception $e) {
			throw $e;
      	}		
    	
		return $entities;	
    }
	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array {
		$entities = array();
		$entity = new documento_cuenta_pagar();		  
		$sQuery='';
	
        try {     	   
        					
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesSimpleQueryBuild($queryWhereSelectParameters,$strQuerySelect);
							
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new documento_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,documento_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=documento_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdocumento_cuenta_pagar_Original( new documento_cuenta_pagar());				
				//$entity->setdocumento_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet,documento_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setdocumento_cuenta_pagar_Original(documento_cuenta_pagar_data::getEntityBaseResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet));
				//$entity->setdocumento_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getdocumento_cuenta_pagar_Original(),$resultSet));
				
      	    	$entities[]=$entity;
				
				$i++;
				
				$resultSet =Connexion::getResultSet($result);
      	    }
			
			parent::setGeneralEntitiesIsNewFalseIsChangedFalse($entities);
			
			Connexion::liberarResult($result); 
			
			if($queryWhereSelectParameters->getPagination()->getBlnConNumeroMaximo() && !$this->isForFKData) {
				$this->setCountSelect($queryWhereSelectParameters,$entity,$connexion);
			}
       	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entities;	
    }
	
	/*----------------------- SELECT COUNT ------------------------*/
	
	public function getCountSelect(Connexion $connexion) : int {
		$count=0;
		
		$sQueryExecuteValor=documento_cuenta_pagar_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,documento_cuenta_pagar $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,documento_cuenta_pagar_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,documento_cuenta_pagar_data::$QUERY_SELECT_COUNT);
				
		if(Constantes::$IS_DEVELOPING_SQL)  {
            Funciones::mostrarMensajeDeveloping($sQueryCount);
        }
			
		$resultCount = $connexion->ejecutarQuery($sQueryCount);
        	
		$resultSetCount =Connexion::getResultSet($resultCount);
				
	    if($resultSetCount) {
	       	$count=$resultSetCount['value'];
	       	$paginationAux->setIntNumeroMaximo($count);
	    }
				
		$queryWhereSelectParameters->setPagination($paginationAux);
				
		Connexion::liberarResult($resultCount);				
	}
	
	/*--------------------------- TRAER FKs --------------------------*/
	
	public function  getempresa(Connexion $connexion,$reldocumento_cuenta_pagar) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$reldocumento_cuenta_pagar->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$reldocumento_cuenta_pagar) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$reldocumento_cuenta_pagar->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$reldocumento_cuenta_pagar) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$reldocumento_cuenta_pagar->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$reldocumento_cuenta_pagar) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$reldocumento_cuenta_pagar->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$reldocumento_cuenta_pagar) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$reldocumento_cuenta_pagar->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getproveedor(Connexion $connexion,$reldocumento_cuenta_pagar) : ?proveedor{

		$proveedor= new proveedor();

		try {
			$proveedorDataAccess=new proveedor_data();
			$proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$proveedor=$proveedorDataAccess->getEntity($connexion,$reldocumento_cuenta_pagar->getid_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $proveedor;
	}


	public function  getforma_pago_proveedor(Connexion $connexion,$reldocumento_cuenta_pagar) : ?forma_pago_proveedor{

		$forma_pago_proveedor= new forma_pago_proveedor();

		try {
			$forma_pago_proveedorDataAccess=new forma_pago_proveedor_data();
			$forma_pago_proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$forma_pago_proveedor=$forma_pago_proveedorDataAccess->getEntity($connexion,$reldocumento_cuenta_pagar->getid_forma_pago_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $forma_pago_proveedor;
	}


	public function  getcuenta_corriente(Connexion $connexion,$reldocumento_cuenta_pagar) : ?cuenta_corriente{

		$cuenta_corriente= new cuenta_corriente();

		try {
			$cuenta_corrienteDataAccess=new cuenta_corriente_data();
			$cuenta_corrienteDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta_corriente=$cuenta_corrienteDataAccess->getEntity($connexion,$reldocumento_cuenta_pagar->getid_cuenta_corriente());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta_corriente;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getorden_compras(Connexion $connexion,documento_cuenta_pagar $documento_cuenta_pagar) : array {

		$ordencompras=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.orden_compra_data::$SCHEMA.".".orden_compra_data::$TABLE_NAME.".id_documento_cuenta_pagar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$documento_cuenta_pagar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$ordencompraDataAccess=new orden_compra_data();

			$ordencompras=$ordencompraDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $ordencompras;
	}


	public function  getimagen_documento_cuenta_pagars(Connexion $connexion,documento_cuenta_pagar $documento_cuenta_pagar) : array {

		$imagendocumentocuentapagars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.imagen_documento_cuenta_pagar_data::$SCHEMA.".".imagen_documento_cuenta_pagar_data::$TABLE_NAME.".id_documento_cuenta_pagar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$documento_cuenta_pagar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$imagendocumentocuentapagarDataAccess=new imagen_documento_cuenta_pagar_data();

			$imagendocumentocuentapagars=$imagendocumentocuentapagarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $imagendocumentocuentapagars;
	}


	public function  getdevolucions(Connexion $connexion,documento_cuenta_pagar $documento_cuenta_pagar) : array {

		$devolucions=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.devolucion_data::$SCHEMA.".".devolucion_data::$TABLE_NAME.".id_documento_cuenta_pagar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$documento_cuenta_pagar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$devolucionDataAccess=new devolucion_data();

			$devolucions=$devolucionDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $devolucions;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,documento_cuenta_pagar $entity,$resultSet) : documento_cuenta_pagar {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));
				$entity->setid_proveedor((int)$resultSet[$strPrefijo.'id_proveedor']);
				$entity->settipo(utf8_encode($resultSet[$strPrefijo.'tipo']));
				$entity->setfecha_emision($resultSet[$strPrefijo.'fecha_emision']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setmonto((float)$resultSet[$strPrefijo.'monto']);
				$entity->setmonto_parcial((float)$resultSet[$strPrefijo.'monto_parcial']);
				$entity->setmoneda(utf8_encode($resultSet[$strPrefijo.'moneda']));
				$entity->setfecha_vence($resultSet[$strPrefijo.'fecha_vence']);
				$entity->setnumero_de_pagos((int)$resultSet[$strPrefijo.'numero_de_pagos']);
				$entity->setbalance((float)$resultSet[$strPrefijo.'balance']);
				$entity->setbalance_mon((float)$resultSet[$strPrefijo.'balance_mon']);
				$entity->setnumero_pagado(utf8_encode($resultSet[$strPrefijo.'numero_pagado']));
				$entity->setid_pagado((int)$resultSet[$strPrefijo.'id_pagado']);
				$entity->setmodulo_origen(utf8_encode($resultSet[$strPrefijo.'modulo_origen']));
				$entity->setid_origen((int)$resultSet[$strPrefijo.'id_origen']);
				$entity->setmodulo_destino(utf8_encode($resultSet[$strPrefijo.'modulo_destino']));
				$entity->setid_destino((int)$resultSet[$strPrefijo.'id_destino']);
				$entity->setnombre_pc(utf8_encode($resultSet[$strPrefijo.'nombre_pc']));
				$entity->sethora($resultSet[$strPrefijo.'hora']);
				$entity->setmonto_mora((float)$resultSet[$strPrefijo.'monto_mora']);
				$entity->setinteres_mora((float)$resultSet[$strPrefijo.'interes_mora']);
				$entity->setdias_gracia_mora((int)$resultSet[$strPrefijo.'dias_gracia_mora']);
				$entity->setinstrumento_pago(utf8_encode($resultSet[$strPrefijo.'instrumento_pago']));
				$entity->settipo_cambio((float)$resultSet[$strPrefijo.'tipo_cambio']);
				$entity->setnro_documento_proveedor(utf8_encode($resultSet[$strPrefijo.'nro_documento_proveedor']));
				$entity->setclase_registro(utf8_encode($resultSet[$strPrefijo.'clase_registro']));
				$entity->setestado_registro(utf8_encode($resultSet[$strPrefijo.'estado_registro']));
				$entity->setmotivo_anulacion(utf8_encode($resultSet[$strPrefijo.'motivo_anulacion']));
				$entity->setimpuesto_1((float)$resultSet[$strPrefijo.'impuesto_1']);
				$entity->setimpuesto_2((float)$resultSet[$strPrefijo.'impuesto_2']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setimpuesto_incluido($resultSet[$strPrefijo.'impuesto_incluido']=='f'? false:true );
				} else {
					$entity->setimpuesto_incluido((bool)$resultSet[$strPrefijo.'impuesto_incluido']);
				}
				$entity->setobservaciones(utf8_encode($resultSet[$strPrefijo.'observaciones']));
				$entity->setgrupo_pago(utf8_encode($resultSet[$strPrefijo.'grupo_pago']));
				$entity->settermino_idpv((int)$resultSet[$strPrefijo.'termino_idpv']);
				$entity->setid_forma_pago_proveedor((int)$resultSet[$strPrefijo.'id_forma_pago_proveedor']);
				$entity->setnro_pago(utf8_encode($resultSet[$strPrefijo.'nro_pago']));
				$entity->setreferencia_pago(utf8_encode($resultSet[$strPrefijo.'referencia_pago']));
				$entity->setfecha_hora($resultSet[$strPrefijo.'fecha_hora']);
				$entity->setid_base((int)$resultSet[$strPrefijo.'id_base']);
				$entity->setid_cuenta_corriente((int)$resultSet[$strPrefijo.'id_cuenta_corriente']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,documento_cuenta_pagar $documento_cuenta_pagar,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $documento_cuenta_pagar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiisisssddssiddsisisissddisdssssddissiisssii', $documento_cuenta_pagar->getid_empresa(),$documento_cuenta_pagar->getid_sucursal(),$documento_cuenta_pagar->getid_ejercicio(),$documento_cuenta_pagar->getid_periodo(),$documento_cuenta_pagar->getid_usuario(),$documento_cuenta_pagar->getnumero(),$documento_cuenta_pagar->getid_proveedor(),$documento_cuenta_pagar->gettipo(),$documento_cuenta_pagar->getfecha_emision(),$documento_cuenta_pagar->getdescripcion(),$documento_cuenta_pagar->getmonto(),$documento_cuenta_pagar->getmonto_parcial(),$documento_cuenta_pagar->getmoneda(),$documento_cuenta_pagar->getfecha_vence(),$documento_cuenta_pagar->getnumero_de_pagos(),$documento_cuenta_pagar->getbalance(),$documento_cuenta_pagar->getbalance_mon(),$documento_cuenta_pagar->getnumero_pagado(),$documento_cuenta_pagar->getid_pagado(),$documento_cuenta_pagar->getmodulo_origen(),$documento_cuenta_pagar->getid_origen(),$documento_cuenta_pagar->getmodulo_destino(),$documento_cuenta_pagar->getid_destino(),$documento_cuenta_pagar->getnombre_pc(),$documento_cuenta_pagar->gethora(),$documento_cuenta_pagar->getmonto_mora(),$documento_cuenta_pagar->getinteres_mora(),$documento_cuenta_pagar->getdias_gracia_mora(),$documento_cuenta_pagar->getinstrumento_pago(),$documento_cuenta_pagar->gettipo_cambio(),$documento_cuenta_pagar->getnro_documento_proveedor(),$documento_cuenta_pagar->getclase_registro(),$documento_cuenta_pagar->getestado_registro(),$documento_cuenta_pagar->getmotivo_anulacion(),$documento_cuenta_pagar->getimpuesto_1(),$documento_cuenta_pagar->getimpuesto_2(),$documento_cuenta_pagar->getimpuesto_incluido(),$documento_cuenta_pagar->getobservaciones(),$documento_cuenta_pagar->getgrupo_pago(),$documento_cuenta_pagar->gettermino_idpv(),$documento_cuenta_pagar->getid_forma_pago_proveedor(),$documento_cuenta_pagar->getnro_pago(),$documento_cuenta_pagar->getreferencia_pago(),$documento_cuenta_pagar->getfecha_hora(),$documento_cuenta_pagar->getid_base(),$documento_cuenta_pagar->getid_cuenta_corriente());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiisisssddssiddsisisissddisdssssddissiisssiiis', $documento_cuenta_pagar->getid_empresa(),$documento_cuenta_pagar->getid_sucursal(),$documento_cuenta_pagar->getid_ejercicio(),$documento_cuenta_pagar->getid_periodo(),$documento_cuenta_pagar->getid_usuario(),$documento_cuenta_pagar->getnumero(),$documento_cuenta_pagar->getid_proveedor(),$documento_cuenta_pagar->gettipo(),$documento_cuenta_pagar->getfecha_emision(),$documento_cuenta_pagar->getdescripcion(),$documento_cuenta_pagar->getmonto(),$documento_cuenta_pagar->getmonto_parcial(),$documento_cuenta_pagar->getmoneda(),$documento_cuenta_pagar->getfecha_vence(),$documento_cuenta_pagar->getnumero_de_pagos(),$documento_cuenta_pagar->getbalance(),$documento_cuenta_pagar->getbalance_mon(),$documento_cuenta_pagar->getnumero_pagado(),$documento_cuenta_pagar->getid_pagado(),$documento_cuenta_pagar->getmodulo_origen(),$documento_cuenta_pagar->getid_origen(),$documento_cuenta_pagar->getmodulo_destino(),$documento_cuenta_pagar->getid_destino(),$documento_cuenta_pagar->getnombre_pc(),$documento_cuenta_pagar->gethora(),$documento_cuenta_pagar->getmonto_mora(),$documento_cuenta_pagar->getinteres_mora(),$documento_cuenta_pagar->getdias_gracia_mora(),$documento_cuenta_pagar->getinstrumento_pago(),$documento_cuenta_pagar->gettipo_cambio(),$documento_cuenta_pagar->getnro_documento_proveedor(),$documento_cuenta_pagar->getclase_registro(),$documento_cuenta_pagar->getestado_registro(),$documento_cuenta_pagar->getmotivo_anulacion(),$documento_cuenta_pagar->getimpuesto_1(),$documento_cuenta_pagar->getimpuesto_2(),$documento_cuenta_pagar->getimpuesto_incluido(),$documento_cuenta_pagar->getobservaciones(),$documento_cuenta_pagar->getgrupo_pago(),$documento_cuenta_pagar->gettermino_idpv(),$documento_cuenta_pagar->getid_forma_pago_proveedor(),$documento_cuenta_pagar->getnro_pago(),$documento_cuenta_pagar->getreferencia_pago(),$documento_cuenta_pagar->getfecha_hora(),$documento_cuenta_pagar->getid_base(),$documento_cuenta_pagar->getid_cuenta_corriente(), $documento_cuenta_pagar->getId(), Funciones::GetRealScapeString($documento_cuenta_pagar->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,documento_cuenta_pagar $documento_cuenta_pagar,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($documento_cuenta_pagar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($documento_cuenta_pagar->getid_empresa(),$documento_cuenta_pagar->getid_sucursal(),$documento_cuenta_pagar->getid_ejercicio(),$documento_cuenta_pagar->getid_periodo(),$documento_cuenta_pagar->getid_usuario(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnumero(),$connexion),$documento_cuenta_pagar->getid_proveedor(),Funciones::GetRealScapeString($documento_cuenta_pagar->gettipo(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getdescripcion(),$connexion),$documento_cuenta_pagar->getmonto(),$documento_cuenta_pagar->getmonto_parcial(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmoneda(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_vence(),$connexion),$documento_cuenta_pagar->getnumero_de_pagos(),$documento_cuenta_pagar->getbalance(),$documento_cuenta_pagar->getbalance_mon(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnumero_pagado(),$connexion),$documento_cuenta_pagar->getid_pagado(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmodulo_origen(),$connexion),$documento_cuenta_pagar->getid_origen(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmodulo_destino(),$connexion),$documento_cuenta_pagar->getid_destino(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnombre_pc(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->gethora(),$connexion),$documento_cuenta_pagar->getmonto_mora(),$documento_cuenta_pagar->getinteres_mora(),$documento_cuenta_pagar->getdias_gracia_mora(),Funciones::GetRealScapeString($documento_cuenta_pagar->getinstrumento_pago(),$connexion),$documento_cuenta_pagar->gettipo_cambio(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnro_documento_proveedor(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getclase_registro(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getestado_registro(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getmotivo_anulacion(),$connexion),$documento_cuenta_pagar->getimpuesto_1(),$documento_cuenta_pagar->getimpuesto_2(),$documento_cuenta_pagar->getimpuesto_incluido(),Funciones::GetRealScapeString($documento_cuenta_pagar->getobservaciones(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getgrupo_pago(),$connexion),$documento_cuenta_pagar->gettermino_idpv(),$documento_cuenta_pagar->getid_forma_pago_proveedor(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnro_pago(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getreferencia_pago(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_hora(),$connexion),$documento_cuenta_pagar->getid_base(),$documento_cuenta_pagar->getid_cuenta_corriente());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($documento_cuenta_pagar->getid_empresa(),$documento_cuenta_pagar->getid_sucursal(),$documento_cuenta_pagar->getid_ejercicio(),$documento_cuenta_pagar->getid_periodo(),$documento_cuenta_pagar->getid_usuario(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnumero(),$connexion),$documento_cuenta_pagar->getid_proveedor(),Funciones::GetRealScapeString($documento_cuenta_pagar->gettipo(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getdescripcion(),$connexion),$documento_cuenta_pagar->getmonto(),$documento_cuenta_pagar->getmonto_parcial(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmoneda(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_vence(),$connexion),$documento_cuenta_pagar->getnumero_de_pagos(),$documento_cuenta_pagar->getbalance(),$documento_cuenta_pagar->getbalance_mon(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnumero_pagado(),$connexion),$documento_cuenta_pagar->getid_pagado(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmodulo_origen(),$connexion),$documento_cuenta_pagar->getid_origen(),Funciones::GetRealScapeString($documento_cuenta_pagar->getmodulo_destino(),$connexion),$documento_cuenta_pagar->getid_destino(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnombre_pc(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->gethora(),$connexion),$documento_cuenta_pagar->getmonto_mora(),$documento_cuenta_pagar->getinteres_mora(),$documento_cuenta_pagar->getdias_gracia_mora(),Funciones::GetRealScapeString($documento_cuenta_pagar->getinstrumento_pago(),$connexion),$documento_cuenta_pagar->gettipo_cambio(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnro_documento_proveedor(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getclase_registro(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getestado_registro(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getmotivo_anulacion(),$connexion),$documento_cuenta_pagar->getimpuesto_1(),$documento_cuenta_pagar->getimpuesto_2(),$documento_cuenta_pagar->getimpuesto_incluido(),Funciones::GetRealScapeString($documento_cuenta_pagar->getobservaciones(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getgrupo_pago(),$connexion),$documento_cuenta_pagar->gettermino_idpv(),$documento_cuenta_pagar->getid_forma_pago_proveedor(),Funciones::GetRealScapeString($documento_cuenta_pagar->getnro_pago(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getreferencia_pago(),$connexion),Funciones::GetRealScapeString($documento_cuenta_pagar->getfecha_hora(),$connexion),$documento_cuenta_pagar->getid_base(),$documento_cuenta_pagar->getid_cuenta_corriente(), $documento_cuenta_pagar->getId(), Funciones::GetRealScapeString($documento_cuenta_pagar->getVersionRow(),$connexion));
		}
		
		return $params;
	}
	
	public static function preparedQuery(string $sql,array $params) : string {
		for ($i=0; $i<count($params); $i++) {
			$sql = preg_replace('/\?/','\''.$params[$i].'\'',$sql,1);
		}
		
		return $sql;
	}
	
		

	public function getIsForFKData() : bool {
		return $this->isForFKData;
	}

	public function setIsForFKData(bool $isForFKData) {
		$this->isForFKData = $isForFKData;
	}
			
	public function getIsForFKDataRels() : bool {
		return $this->isForFKDataRels;
	}

	public function setIsForFKDataRels(bool $isForFKDataRels) {
		$this->isForFKDataRels = $isForFKDataRels;
	}
	
	public function setdocumento_cuenta_pagar_Original(documento_cuenta_pagar $documento_cuenta_pagar) {
		$documento_cuenta_pagar->setdocumento_cuenta_pagar_Original(clone $documento_cuenta_pagar);		
	}
	
	public function setdocumento_cuenta_pagars_Original(array $documento_cuenta_pagars) {
		foreach($documento_cuenta_pagars as $documento_cuenta_pagar){
			$documento_cuenta_pagar->setdocumento_cuenta_pagar_Original(clone $documento_cuenta_pagar);
		}
	}
	
	public static function setdocumento_cuenta_pagar_OriginalStatic(documento_cuenta_pagar $documento_cuenta_pagar) {
		$documento_cuenta_pagar->setdocumento_cuenta_pagar_Original(clone $documento_cuenta_pagar);		
	}
	
	public static function setdocumento_cuenta_pagars_OriginalStatic(array $documento_cuenta_pagars) {		
		foreach($documento_cuenta_pagars as $documento_cuenta_pagar){
			$documento_cuenta_pagar->setdocumento_cuenta_pagar_Original(clone $documento_cuenta_pagar);
		}
	}
	
	/*
		QUERY_INSERT,UPDATE,DELETE,SELECT
		save,savePrepared
		insert,update,delete
		getEntity,getEntityConnexionWhereSelect
		getEntities,getEntitiesConnexionQuerySelectQueryWhere
		getEntitiesSimpleQueryBuild
		executeQuery,executeQueryValor
		getCountSelect,setCountSelect
		gettabla1,gettabla2,gettablas1,gettablas2
		getEntityBaseResult,addPrepareStatementParams,getPrepareStatementParamsArray
	*/
}
?>
