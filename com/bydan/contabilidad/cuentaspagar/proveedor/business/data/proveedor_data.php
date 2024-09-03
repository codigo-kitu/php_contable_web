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
namespace com\bydan\contabilidad\cuentaspagar\proveedor\business\data;

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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\tipo_persona\business\data\tipo_persona_data;
use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\data\categoria_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\entity\categoria_proveedor;

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\data\giro_negocio_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\entity\giro_negocio_proveedor;

use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;

use com\bydan\contabilidad\seguridad\provincia\business\data\provincia_data;
use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;

use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;

use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

use com\bydan\contabilidad\facturacion\impuesto\business\data\impuesto_data;
use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;

use com\bydan\contabilidad\facturacion\retencion\business\data\retencion_data;
use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;

use com\bydan\contabilidad\facturacion\retencion_fuente\business\data\retencion_fuente_data;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;

use com\bydan\contabilidad\facturacion\retencion_ica\business\data\retencion_ica_data;
use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\data\otro_impuesto_data;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;

//REL

use com\bydan\contabilidad\inventario\lista_precio\business\data\lista_precio_data;
use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\data\imagen_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\data\documento_proveedor_data;
use com\bydan\contabilidad\inventario\otro_suplidor\business\data\otro_suplidor_data;


class proveedor_data extends GetEntitiesDataAccessHelper implements proveedor_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $TABLE_NAME='cp_proveedor';			
	public static string $TABLE_NAME_proveedor='proveedor';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PROVEEDOR_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PROVEEDOR_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PROVEEDOR_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PROVEEDOR_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $proveedor_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'proveedor';
		
		proveedor_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASPAGAR');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->proveedor_DataAccessAdditional=new proveedorDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_tipo_persona,id_categoria_proveedor,id_giro_negocio_proveedor,codigo,ruc,primer_apellido,segundo_apellido,primer_nombre,segundo_nombre,nombre_completo,direccion,telefono,telefono_movil,e_mail,e_mail2,comentario,imagen,activo,id_pais,id_provincia,id_ciudad,codigo_postal,fax,contacto,id_vendedor,maximo_credito,maximo_descuento,interes_anual,balance,id_termino_pago_proveedor,id_cuenta,aplica_impuesto_compras,id_impuesto,aplica_retencion_impuesto,id_retencion,aplica_retencion_fuente,id_retencion_fuente,aplica_retencion_ica,id_retencion_ica,aplica_2do_impuesto,id_otro_impuesto,creado,monto_ultima_transaccion,fecha_ultima_transaccion,descripcion_ultima_transaccion) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%d\',%d,%d,%d,\'%s\',\'%s\',\'%s\',%d,%f,%f,%f,%f,%d,%s,\'%d\',%s,\'%d\',%s,\'%d\',%s,\'%d\',%s,\'%d\',%s,\'%s\',%f,\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_tipo_persona=%d,id_categoria_proveedor=%d,id_giro_negocio_proveedor=%d,codigo=\'%s\',ruc=\'%s\',primer_apellido=\'%s\',segundo_apellido=\'%s\',primer_nombre=\'%s\',segundo_nombre=\'%s\',nombre_completo=\'%s\',direccion=\'%s\',telefono=\'%s\',telefono_movil=\'%s\',e_mail=\'%s\',e_mail2=\'%s\',comentario=\'%s\',imagen=\'%s\',activo=\'%d\',id_pais=%d,id_provincia=%d,id_ciudad=%d,codigo_postal=\'%s\',fax=\'%s\',contacto=\'%s\',id_vendedor=%d,maximo_credito=%f,maximo_descuento=%f,interes_anual=%f,balance=%f,id_termino_pago_proveedor=%d,id_cuenta=%s,aplica_impuesto_compras=\'%d\',id_impuesto=%s,aplica_retencion_impuesto=\'%d\',id_retencion=%s,aplica_retencion_fuente=\'%d\',id_retencion_fuente=%s,aplica_retencion_ica=\'%d\',id_retencion_ica=%s,aplica_2do_impuesto=\'%d\',id_otro_impuesto=%s,creado=\'%s\',monto_ultima_transaccion=%f,fecha_ultima_transaccion=\'%s\',descripcion_ultima_transaccion=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_persona,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_categoria_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_giro_negocio_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ruc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.primer_apellido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.segundo_apellido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.primer_nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.segundo_nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_completo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono_movil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.e_mail,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.e_mail2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comentario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.activo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pais,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_provincia,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ciudad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_postal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fax,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.contacto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_vendedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.maximo_credito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.maximo_descuento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.interes_anual,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_impuesto_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_ica,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_ica,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_2do_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.creado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_ultima_transaccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultima_transaccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion_ultima_transaccion from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_completo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(proveedor $proveedor,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($proveedor->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=proveedor_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($proveedor->getId(),$connexion));				
				
			} else if ($proveedor->getIsChanged()) {
				if($proveedor->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=proveedor_data::$QUERY_INSERT;
					
					
					
					

					//$id_cuenta='null';
					//if($proveedor->getid_cuenta()!==null && $proveedor->getid_cuenta()>=0) {
						//$id_cuenta=$proveedor->getid_cuenta();
					//} else {
						//$id_cuenta='null';
					//}

					//$id_impuesto='null';
					//if($proveedor->getid_impuesto()!==null && $proveedor->getid_impuesto()>=0) {
						//$id_impuesto=$proveedor->getid_impuesto();
					//} else {
						//$id_impuesto='null';
					//}

					//$id_retencion='null';
					//if($proveedor->getid_retencion()!==null && $proveedor->getid_retencion()>=0) {
						//$id_retencion=$proveedor->getid_retencion();
					//} else {
						//$id_retencion='null';
					//}

					//$id_retencion_fuente='null';
					//if($proveedor->getid_retencion_fuente()!==null && $proveedor->getid_retencion_fuente()>=0) {
						//$id_retencion_fuente=$proveedor->getid_retencion_fuente();
					//} else {
						//$id_retencion_fuente='null';
					//}

					//$id_retencion_ica='null';
					//if($proveedor->getid_retencion_ica()!==null && $proveedor->getid_retencion_ica()>=0) {
						//$id_retencion_ica=$proveedor->getid_retencion_ica();
					//} else {
						//$id_retencion_ica='null';
					//}

					//$id_otro_impuesto='null';
					//if($proveedor->getid_otro_impuesto()!==null && $proveedor->getid_otro_impuesto()>=0) {
						//$id_otro_impuesto=$proveedor->getid_otro_impuesto();
					//} else {
						//$id_otro_impuesto='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$proveedor->getid_empresa(),$proveedor->getid_tipo_persona(),$proveedor->getid_categoria_proveedor(),$proveedor->getid_giro_negocio_proveedor(),Funciones::GetRealScapeString($proveedor->getcodigo(),$connexion),Funciones::GetRealScapeString($proveedor->getruc(),$connexion),Funciones::GetRealScapeString($proveedor->getprimer_apellido(),$connexion),Funciones::GetRealScapeString($proveedor->getsegundo_apellido(),$connexion),Funciones::GetRealScapeString($proveedor->getprimer_nombre(),$connexion),Funciones::GetRealScapeString($proveedor->getsegundo_nombre(),$connexion),Funciones::GetRealScapeString($proveedor->getnombre_completo(),$connexion),Funciones::GetRealScapeString($proveedor->getdireccion(),$connexion),Funciones::GetRealScapeString($proveedor->gettelefono(),$connexion),Funciones::GetRealScapeString($proveedor->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($proveedor->gete_mail(),$connexion),Funciones::GetRealScapeString($proveedor->gete_mail2(),$connexion),Funciones::GetRealScapeString($proveedor->getcomentario(),$connexion),Funciones::GetRealScapeString($proveedor->getimagen(),$connexion),$proveedor->getactivo(),$proveedor->getid_pais(),$proveedor->getid_provincia(),$proveedor->getid_ciudad(),Funciones::GetRealScapeString($proveedor->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($proveedor->getfax(),$connexion),Funciones::GetRealScapeString($proveedor->getcontacto(),$connexion),$proveedor->getid_vendedor(),$proveedor->getmaximo_credito(),$proveedor->getmaximo_descuento(),$proveedor->getinteres_anual(),$proveedor->getbalance(),$proveedor->getid_termino_pago_proveedor(),Funciones::GetNullString($proveedor->getid_cuenta()),$proveedor->getaplica_impuesto_compras(),$proveedor->getid_impuesto(),$proveedor->getaplica_retencion_impuesto(),Funciones::GetNullString($proveedor->getid_retencion()),$proveedor->getaplica_retencion_fuente(),Funciones::GetNullString($proveedor->getid_retencion_fuente()),$proveedor->getaplica_retencion_ica(),Funciones::GetNullString($proveedor->getid_retencion_ica()),$proveedor->getaplica_2do_impuesto(),Funciones::GetNullString($proveedor->getid_otro_impuesto()),Funciones::GetRealScapeString($proveedor->getcreado(),$connexion),$proveedor->getmonto_ultima_transaccion(),Funciones::GetRealScapeString($proveedor->getfecha_ultima_transaccion(),$connexion),Funciones::GetRealScapeString($proveedor->getdescripcion_ultima_transaccion(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=proveedor_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_cuenta='null';
					//if($proveedor->getid_cuenta()!==null && $proveedor->getid_cuenta()>=0) {
						//$id_cuenta=$proveedor->getid_cuenta();
					//} else {
						//$id_cuenta='null';
					//}

					//$id_impuesto='null';
					//if($proveedor->getid_impuesto()!==null && $proveedor->getid_impuesto()>=0) {
						//$id_impuesto=$proveedor->getid_impuesto();
					//} else {
						//$id_impuesto='null';
					//}

					//$id_retencion='null';
					//if($proveedor->getid_retencion()!==null && $proveedor->getid_retencion()>=0) {
						//$id_retencion=$proveedor->getid_retencion();
					//} else {
						//$id_retencion='null';
					//}

					//$id_retencion_fuente='null';
					//if($proveedor->getid_retencion_fuente()!==null && $proveedor->getid_retencion_fuente()>=0) {
						//$id_retencion_fuente=$proveedor->getid_retencion_fuente();
					//} else {
						//$id_retencion_fuente='null';
					//}

					//$id_retencion_ica='null';
					//if($proveedor->getid_retencion_ica()!==null && $proveedor->getid_retencion_ica()>=0) {
						//$id_retencion_ica=$proveedor->getid_retencion_ica();
					//} else {
						//$id_retencion_ica='null';
					//}

					//$id_otro_impuesto='null';
					//if($proveedor->getid_otro_impuesto()!==null && $proveedor->getid_otro_impuesto()>=0) {
						//$id_otro_impuesto=$proveedor->getid_otro_impuesto();
					//} else {
						//$id_otro_impuesto='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$proveedor->getid_empresa(),$proveedor->getid_tipo_persona(),$proveedor->getid_categoria_proveedor(),$proveedor->getid_giro_negocio_proveedor(),Funciones::GetRealScapeString($proveedor->getcodigo(),$connexion),Funciones::GetRealScapeString($proveedor->getruc(),$connexion),Funciones::GetRealScapeString($proveedor->getprimer_apellido(),$connexion),Funciones::GetRealScapeString($proveedor->getsegundo_apellido(),$connexion),Funciones::GetRealScapeString($proveedor->getprimer_nombre(),$connexion),Funciones::GetRealScapeString($proveedor->getsegundo_nombre(),$connexion),Funciones::GetRealScapeString($proveedor->getnombre_completo(),$connexion),Funciones::GetRealScapeString($proveedor->getdireccion(),$connexion),Funciones::GetRealScapeString($proveedor->gettelefono(),$connexion),Funciones::GetRealScapeString($proveedor->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($proveedor->gete_mail(),$connexion),Funciones::GetRealScapeString($proveedor->gete_mail2(),$connexion),Funciones::GetRealScapeString($proveedor->getcomentario(),$connexion),Funciones::GetRealScapeString($proveedor->getimagen(),$connexion),$proveedor->getactivo(),$proveedor->getid_pais(),$proveedor->getid_provincia(),$proveedor->getid_ciudad(),Funciones::GetRealScapeString($proveedor->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($proveedor->getfax(),$connexion),Funciones::GetRealScapeString($proveedor->getcontacto(),$connexion),$proveedor->getid_vendedor(),$proveedor->getmaximo_credito(),$proveedor->getmaximo_descuento(),$proveedor->getinteres_anual(),$proveedor->getbalance(),$proveedor->getid_termino_pago_proveedor(),Funciones::GetNullString($proveedor->getid_cuenta()),$proveedor->getaplica_impuesto_compras(),$proveedor->getid_impuesto(),$proveedor->getaplica_retencion_impuesto(),Funciones::GetNullString($proveedor->getid_retencion()),$proveedor->getaplica_retencion_fuente(),Funciones::GetNullString($proveedor->getid_retencion_fuente()),$proveedor->getaplica_retencion_ica(),Funciones::GetNullString($proveedor->getid_retencion_ica()),$proveedor->getaplica_2do_impuesto(),Funciones::GetNullString($proveedor->getid_otro_impuesto()),Funciones::GetRealScapeString($proveedor->getcreado(),$connexion),$proveedor->getmonto_ultima_transaccion(),Funciones::GetRealScapeString($proveedor->getfecha_ultima_transaccion(),$connexion),Funciones::GetRealScapeString($proveedor->getdescripcion_ultima_transaccion(),$connexion), Funciones::GetRealScapeString($proveedor->getId(),$connexion), Funciones::GetRealScapeString($proveedor->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($proveedor, $connexion,$strQuerySaveComplete,proveedor_data::$TABLE_NAME,proveedor_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				proveedor_data::savePrepared($proveedor, $connexion,$strQuerySave,proveedor_data::$TABLE_NAME,proveedor_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			proveedor_data::setproveedor_OriginalStatic($proveedor);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				proveedor_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					proveedor_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					proveedor_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					proveedor_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					proveedor_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					proveedor_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?proveedor {		
		$entity = new proveedor();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=proveedor_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=proveedor_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasPagar.proveedor.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setproveedor_Original(new proveedor());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,proveedor_data::$IS_WITH_SCHEMA);         	    
				/*$entity=proveedor_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setproveedor_Original(parent::getEntityPrefijoEntityResult("",$entity->getproveedor_Original(),$resultSet,proveedor_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setproveedor_Original(proveedor_data::getEntityBaseResult("",$entity->getproveedor_Original(),$resultSet));
				//$entity->setproveedor_Original($this->getEntityBaseResult("",$entity->getproveedor_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?proveedor {
		$entity = new proveedor();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=proveedor_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=proveedor_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,proveedor_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasPagar.proveedor.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setproveedor_Original(new proveedor());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,proveedor_data::$IS_WITH_SCHEMA);         	    
				/*$entity=proveedor_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setproveedor_Original(parent::getEntityPrefijoEntityResult("",$entity->getproveedor_Original(),$resultSet,proveedor_data::$IS_WITH_SCHEMA));         		
				////$entity->setproveedor_Original(proveedor_data::getEntityBaseResult("",$entity->getproveedor_Original(),$resultSet));
				//$entity->setproveedor_Original($this->getEntityBaseResult("",$entity->getproveedor_Original(),$resultSet));
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
		$entity = new proveedor();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=proveedor_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=proveedor_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,proveedor_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new proveedor();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,proveedor_data::$IS_WITH_SCHEMA);         		
				/*$entity=proveedor_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setproveedor_Original( new proveedor());
				
				//$entity->setproveedor_Original(parent::getEntityPrefijoEntityResult("",$entity->getproveedor_Original(),$resultSet,proveedor_data::$IS_WITH_SCHEMA));         		
				////$entity->setproveedor_Original(proveedor_data::getEntityBaseResult("",$entity->getproveedor_Original(),$resultSet));
				//$entity->setproveedor_Original($this->getEntityBaseResult("",$entity->getproveedor_Original(),$resultSet));
								
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
		$entity = new proveedor();		  
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
      	    	$entity = new proveedor();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,proveedor_data::$IS_WITH_SCHEMA);         		
				/*$entity=proveedor_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setproveedor_Original( new proveedor());
				
				//$entity->setproveedor_Original(parent::getEntityPrefijoEntityResult("",$entity->getproveedor_Original(),$resultSet,proveedor_data::$IS_WITH_SCHEMA));         		
				////$entity->setproveedor_Original(proveedor_data::getEntityBaseResult("",$entity->getproveedor_Original(),$resultSet));
				//$entity->setproveedor_Original($this->getEntityBaseResult("",$entity->getproveedor_Original(),$resultSet));
				
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
		$entity = new proveedor();		  
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
      	    	$entity = new proveedor();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,proveedor_data::$IS_WITH_SCHEMA);         		
				/*$entity=proveedor_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setproveedor_Original( new proveedor());				
				//$entity->setproveedor_Original(parent::getEntityPrefijoEntityResult("",$entity->getproveedor_Original(),$resultSet,proveedor_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setproveedor_Original(proveedor_data::getEntityBaseResult("",$entity->getproveedor_Original(),$resultSet));
				//$entity->setproveedor_Original($this->getEntityBaseResult("",$entity->getproveedor_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=proveedor_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,proveedor $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,proveedor_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,proveedor_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relproveedor) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relproveedor->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  gettipo_persona(Connexion $connexion,$relproveedor) : ?tipo_persona{

		$tipo_persona= new tipo_persona();

		try {
			$tipo_personaDataAccess=new tipo_persona_data();
			$tipo_personaDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_persona=$tipo_personaDataAccess->getEntity($connexion,$relproveedor->getid_tipo_persona());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_persona;
	}


	public function  getcategoria_proveedor(Connexion $connexion,$relproveedor) : ?categoria_proveedor{

		$categoria_proveedor= new categoria_proveedor();

		try {
			$categoria_proveedorDataAccess=new categoria_proveedor_data();
			$categoria_proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$categoria_proveedor=$categoria_proveedorDataAccess->getEntity($connexion,$relproveedor->getid_categoria_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $categoria_proveedor;
	}


	public function  getgiro_negocio_proveedor(Connexion $connexion,$relproveedor) : ?giro_negocio_proveedor{

		$giro_negocio_proveedor= new giro_negocio_proveedor();

		try {
			$giro_negocio_proveedorDataAccess=new giro_negocio_proveedor_data();
			$giro_negocio_proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$giro_negocio_proveedor=$giro_negocio_proveedorDataAccess->getEntity($connexion,$relproveedor->getid_giro_negocio_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $giro_negocio_proveedor;
	}


	public function  getpais(Connexion $connexion,$relproveedor) : ?pais{

		$pais= new pais();

		try {
			$paisDataAccess=new pais_data();
			$paisDataAccess->isForFKData=$this->isForFKDataRels;
			$pais=$paisDataAccess->getEntity($connexion,$relproveedor->getid_pais());

		} catch(Exception $e) {
			throw $e;
		}

		return $pais;
	}


	public function  getprovincia(Connexion $connexion,$relproveedor) : ?provincia{

		$provincia= new provincia();

		try {
			$provinciaDataAccess=new provincia_data();
			$provinciaDataAccess->isForFKData=$this->isForFKDataRels;
			$provincia=$provinciaDataAccess->getEntity($connexion,$relproveedor->getid_provincia());

		} catch(Exception $e) {
			throw $e;
		}

		return $provincia;
	}


	public function  getciudad(Connexion $connexion,$relproveedor) : ?ciudad{

		$ciudad= new ciudad();

		try {
			$ciudadDataAccess=new ciudad_data();
			$ciudadDataAccess->isForFKData=$this->isForFKDataRels;
			$ciudad=$ciudadDataAccess->getEntity($connexion,$relproveedor->getid_ciudad());

		} catch(Exception $e) {
			throw $e;
		}

		return $ciudad;
	}


	public function  getvendedor(Connexion $connexion,$relproveedor) : ?vendedor{

		$vendedor= new vendedor();

		try {
			$vendedorDataAccess=new vendedor_data();
			$vendedorDataAccess->isForFKData=$this->isForFKDataRels;
			$vendedor=$vendedorDataAccess->getEntity($connexion,$relproveedor->getid_vendedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $vendedor;
	}


	public function  gettermino_pago_proveedor(Connexion $connexion,$relproveedor) : ?termino_pago_proveedor{

		$termino_pago_proveedor= new termino_pago_proveedor();

		try {
			$termino_pago_proveedorDataAccess=new termino_pago_proveedor_data();
			$termino_pago_proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$termino_pago_proveedor=$termino_pago_proveedorDataAccess->getEntity($connexion,$relproveedor->getid_termino_pago_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $termino_pago_proveedor;
	}


	public function  getcuenta(Connexion $connexion,$relproveedor) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relproveedor->getid_cuenta());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getimpuesto(Connexion $connexion,$relproveedor) : ?impuesto{

		$impuesto= new impuesto();

		try {
			$impuestoDataAccess=new impuesto_data();
			$impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$impuesto=$impuestoDataAccess->getEntity($connexion,$relproveedor->getid_impuesto());

		} catch(Exception $e) {
			throw $e;
		}

		return $impuesto;
	}


	public function  getretencion(Connexion $connexion,$relproveedor) : ?retencion{

		$retencion= new retencion();

		try {
			$retencionDataAccess=new retencion_data();
			$retencionDataAccess->isForFKData=$this->isForFKDataRels;
			$retencion=$retencionDataAccess->getEntity($connexion,$relproveedor->getid_retencion());

		} catch(Exception $e) {
			throw $e;
		}

		return $retencion;
	}


	public function  getretencion_fuente(Connexion $connexion,$relproveedor) : ?retencion_fuente{

		$retencion_fuente= new retencion_fuente();

		try {
			$retencion_fuenteDataAccess=new retencion_fuente_data();
			$retencion_fuenteDataAccess->isForFKData=$this->isForFKDataRels;
			$retencion_fuente=$retencion_fuenteDataAccess->getEntity($connexion,$relproveedor->getid_retencion_fuente());

		} catch(Exception $e) {
			throw $e;
		}

		return $retencion_fuente;
	}


	public function  getretencion_ica(Connexion $connexion,$relproveedor) : ?retencion_ica{

		$retencion_ica= new retencion_ica();

		try {
			$retencion_icaDataAccess=new retencion_ica_data();
			$retencion_icaDataAccess->isForFKData=$this->isForFKDataRels;
			$retencion_ica=$retencion_icaDataAccess->getEntity($connexion,$relproveedor->getid_retencion_ica());

		} catch(Exception $e) {
			throw $e;
		}

		return $retencion_ica;
	}


	public function  getotro_impuesto(Connexion $connexion,$relproveedor) : ?otro_impuesto{

		$otro_impuesto= new otro_impuesto();

		try {
			$otro_impuestoDataAccess=new otro_impuesto_data();
			$otro_impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$otro_impuesto=$otro_impuestoDataAccess->getEntity($connexion,$relproveedor->getid_otro_impuesto());

		} catch(Exception $e) {
			throw $e;
		}

		return $otro_impuesto;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getlista_precios(Connexion $connexion,proveedor $proveedor) : array {

		$listaprecios=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.lista_precio_data::$SCHEMA.".".lista_precio_data::$TABLE_NAME.".id_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$listaprecioDataAccess=new lista_precio_data();

			$listaprecios=$listaprecioDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $listaprecios;
	}


	public function  getorden_compras(Connexion $connexion,proveedor $proveedor) : array {

		$ordencompras=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.orden_compra_data::$SCHEMA.".".orden_compra_data::$TABLE_NAME.".id_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$ordencompraDataAccess=new orden_compra_data();

			$ordencompras=$ordencompraDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $ordencompras;
	}


	public function  getcuenta_pagars(Connexion $connexion,proveedor $proveedor) : array {

		$cuentapagars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.cuenta_pagar_data::$SCHEMA.".".cuenta_pagar_data::$TABLE_NAME.".id_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$cuentapagarDataAccess=new cuenta_pagar_data();

			$cuentapagars=$cuentapagarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $cuentapagars;
	}


	public function  getimagen_proveedors(Connexion $connexion,proveedor $proveedor) : array {

		$imagenproveedors=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.imagen_proveedor_data::$SCHEMA.".".imagen_proveedor_data::$TABLE_NAME.".id_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$imagenproveedorDataAccess=new imagen_proveedor_data();

			$imagenproveedors=$imagenproveedorDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $imagenproveedors;
	}


	public function  getdocumento_proveedors(Connexion $connexion,proveedor $proveedor) : array {

		$documentoproveedors=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.documento_proveedor_data::$SCHEMA.".".documento_proveedor_data::$TABLE_NAME.".id_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$documentoproveedorDataAccess=new documento_proveedor_data();

			$documentoproveedors=$documentoproveedorDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $documentoproveedors;
	}


	public function  getotro_suplidors(Connexion $connexion,proveedor $proveedor) : array {

		$otrosuplidors=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.otro_suplidor_data::$SCHEMA.".".otro_suplidor_data::$TABLE_NAME.".id_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$otrosuplidorDataAccess=new otro_suplidor_data();

			$otrosuplidors=$otrosuplidorDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $otrosuplidors;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,proveedor $entity,$resultSet) : proveedor {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_tipo_persona((int)$resultSet[$strPrefijo.'id_tipo_persona']);
				$entity->setid_categoria_proveedor((int)$resultSet[$strPrefijo.'id_categoria_proveedor']);
				$entity->setid_giro_negocio_proveedor((int)$resultSet[$strPrefijo.'id_giro_negocio_proveedor']);
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setruc(utf8_encode($resultSet[$strPrefijo.'ruc']));
				$entity->setprimer_apellido(utf8_encode($resultSet[$strPrefijo.'primer_apellido']));
				$entity->setsegundo_apellido(utf8_encode($resultSet[$strPrefijo.'segundo_apellido']));
				$entity->setprimer_nombre(utf8_encode($resultSet[$strPrefijo.'primer_nombre']));
				$entity->setsegundo_nombre(utf8_encode($resultSet[$strPrefijo.'segundo_nombre']));
				$entity->setnombre_completo(utf8_encode($resultSet[$strPrefijo.'nombre_completo']));
				$entity->setdireccion(utf8_encode($resultSet[$strPrefijo.'direccion']));
				$entity->settelefono(utf8_encode($resultSet[$strPrefijo.'telefono']));
				$entity->settelefono_movil(utf8_encode($resultSet[$strPrefijo.'telefono_movil']));
				$entity->sete_mail(utf8_encode($resultSet[$strPrefijo.'e_mail']));
				$entity->sete_mail2(utf8_encode($resultSet[$strPrefijo.'e_mail2']));
				$entity->setcomentario(utf8_encode($resultSet[$strPrefijo.'comentario']));
				$entity->setimagen(utf8_encode($resultSet[$strPrefijo.'imagen']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setactivo($resultSet[$strPrefijo.'activo']=='f'? false:true );
				} else {
					$entity->setactivo((bool)$resultSet[$strPrefijo.'activo']);
				}
				$entity->setid_pais((int)$resultSet[$strPrefijo.'id_pais']);
				$entity->setid_provincia((int)$resultSet[$strPrefijo.'id_provincia']);
				$entity->setid_ciudad((int)$resultSet[$strPrefijo.'id_ciudad']);
				$entity->setcodigo_postal(utf8_encode($resultSet[$strPrefijo.'codigo_postal']));
				$entity->setfax(utf8_encode($resultSet[$strPrefijo.'fax']));
				$entity->setcontacto(utf8_encode($resultSet[$strPrefijo.'contacto']));
				$entity->setid_vendedor((int)$resultSet[$strPrefijo.'id_vendedor']);
				$entity->setmaximo_credito((float)$resultSet[$strPrefijo.'maximo_credito']);
				$entity->setmaximo_descuento((float)$resultSet[$strPrefijo.'maximo_descuento']);
				$entity->setinteres_anual((float)$resultSet[$strPrefijo.'interes_anual']);
				$entity->setbalance((float)$resultSet[$strPrefijo.'balance']);
				$entity->setid_termino_pago_proveedor((int)$resultSet[$strPrefijo.'id_termino_pago_proveedor']);
				$entity->setid_cuenta((int)$resultSet[$strPrefijo.'id_cuenta']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setaplica_impuesto_compras($resultSet[$strPrefijo.'aplica_impuesto_compras']=='f'? false:true );
				} else {
					$entity->setaplica_impuesto_compras((bool)$resultSet[$strPrefijo.'aplica_impuesto_compras']);
				}
				$entity->setid_impuesto((int)$resultSet[$strPrefijo.'id_impuesto']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setaplica_retencion_impuesto($resultSet[$strPrefijo.'aplica_retencion_impuesto']=='f'? false:true );
				} else {
					$entity->setaplica_retencion_impuesto((bool)$resultSet[$strPrefijo.'aplica_retencion_impuesto']);
				}
				$entity->setid_retencion((int)$resultSet[$strPrefijo.'id_retencion']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setaplica_retencion_fuente($resultSet[$strPrefijo.'aplica_retencion_fuente']=='f'? false:true );
				} else {
					$entity->setaplica_retencion_fuente((bool)$resultSet[$strPrefijo.'aplica_retencion_fuente']);
				}
				$entity->setid_retencion_fuente((int)$resultSet[$strPrefijo.'id_retencion_fuente']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setaplica_retencion_ica($resultSet[$strPrefijo.'aplica_retencion_ica']=='f'? false:true );
				} else {
					$entity->setaplica_retencion_ica((bool)$resultSet[$strPrefijo.'aplica_retencion_ica']);
				}
				$entity->setid_retencion_ica((int)$resultSet[$strPrefijo.'id_retencion_ica']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setaplica_2do_impuesto($resultSet[$strPrefijo.'aplica_2do_impuesto']=='f'? false:true );
				} else {
					$entity->setaplica_2do_impuesto((bool)$resultSet[$strPrefijo.'aplica_2do_impuesto']);
				}
				$entity->setid_otro_impuesto((int)$resultSet[$strPrefijo.'id_otro_impuesto']);
				$entity->setcreado($resultSet[$strPrefijo.'creado']);
				$entity->setmonto_ultima_transaccion((float)$resultSet[$strPrefijo.'monto_ultima_transaccion']);
				$entity->setfecha_ultima_transaccion($resultSet[$strPrefijo.'fecha_ultima_transaccion']);
				$entity->setdescripcion_ultima_transaccion(utf8_encode($resultSet[$strPrefijo.'descripcion_ultima_transaccion']));
			} else {
				$entity->setnombre_completo(utf8_encode($resultSet[$strPrefijo.'nombre_completo']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,proveedor $proveedor,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $proveedor->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiissssssssssssssiiiisssiddddiiiiiiiiiiiisdss', $proveedor->getid_empresa(),$proveedor->getid_tipo_persona(),$proveedor->getid_categoria_proveedor(),$proveedor->getid_giro_negocio_proveedor(),$proveedor->getcodigo(),$proveedor->getruc(),$proveedor->getprimer_apellido(),$proveedor->getsegundo_apellido(),$proveedor->getprimer_nombre(),$proveedor->getsegundo_nombre(),$proveedor->getnombre_completo(),$proveedor->getdireccion(),$proveedor->gettelefono(),$proveedor->gettelefono_movil(),$proveedor->gete_mail(),$proveedor->gete_mail2(),$proveedor->getcomentario(),$proveedor->getimagen(),$proveedor->getactivo(),$proveedor->getid_pais(),$proveedor->getid_provincia(),$proveedor->getid_ciudad(),$proveedor->getcodigo_postal(),$proveedor->getfax(),$proveedor->getcontacto(),$proveedor->getid_vendedor(),$proveedor->getmaximo_credito(),$proveedor->getmaximo_descuento(),$proveedor->getinteres_anual(),$proveedor->getbalance(),$proveedor->getid_termino_pago_proveedor(),$proveedor->getid_cuenta(),$proveedor->getaplica_impuesto_compras(),$proveedor->getid_impuesto(),$proveedor->getaplica_retencion_impuesto(),$proveedor->getid_retencion(),$proveedor->getaplica_retencion_fuente(),$proveedor->getid_retencion_fuente(),$proveedor->getaplica_retencion_ica(),$proveedor->getid_retencion_ica(),$proveedor->getaplica_2do_impuesto(),$proveedor->getid_otro_impuesto(),$proveedor->getcreado(),$proveedor->getmonto_ultima_transaccion(),$proveedor->getfecha_ultima_transaccion(),$proveedor->getdescripcion_ultima_transaccion());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiissssssssssssssiiiisssiddddiiiiiiiiiiiisdssis', $proveedor->getid_empresa(),$proveedor->getid_tipo_persona(),$proveedor->getid_categoria_proveedor(),$proveedor->getid_giro_negocio_proveedor(),$proveedor->getcodigo(),$proveedor->getruc(),$proveedor->getprimer_apellido(),$proveedor->getsegundo_apellido(),$proveedor->getprimer_nombre(),$proveedor->getsegundo_nombre(),$proveedor->getnombre_completo(),$proveedor->getdireccion(),$proveedor->gettelefono(),$proveedor->gettelefono_movil(),$proveedor->gete_mail(),$proveedor->gete_mail2(),$proveedor->getcomentario(),$proveedor->getimagen(),$proveedor->getactivo(),$proveedor->getid_pais(),$proveedor->getid_provincia(),$proveedor->getid_ciudad(),$proveedor->getcodigo_postal(),$proveedor->getfax(),$proveedor->getcontacto(),$proveedor->getid_vendedor(),$proveedor->getmaximo_credito(),$proveedor->getmaximo_descuento(),$proveedor->getinteres_anual(),$proveedor->getbalance(),$proveedor->getid_termino_pago_proveedor(),$proveedor->getid_cuenta(),$proveedor->getaplica_impuesto_compras(),$proveedor->getid_impuesto(),$proveedor->getaplica_retencion_impuesto(),$proveedor->getid_retencion(),$proveedor->getaplica_retencion_fuente(),$proveedor->getid_retencion_fuente(),$proveedor->getaplica_retencion_ica(),$proveedor->getid_retencion_ica(),$proveedor->getaplica_2do_impuesto(),$proveedor->getid_otro_impuesto(),$proveedor->getcreado(),$proveedor->getmonto_ultima_transaccion(),$proveedor->getfecha_ultima_transaccion(),$proveedor->getdescripcion_ultima_transaccion(), $proveedor->getId(), Funciones::GetRealScapeString($proveedor->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,proveedor $proveedor,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($proveedor->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($proveedor->getid_empresa(),$proveedor->getid_tipo_persona(),$proveedor->getid_categoria_proveedor(),$proveedor->getid_giro_negocio_proveedor(),Funciones::GetRealScapeString($proveedor->getcodigo(),$connexion),Funciones::GetRealScapeString($proveedor->getruc(),$connexion),Funciones::GetRealScapeString($proveedor->getprimer_apellido(),$connexion),Funciones::GetRealScapeString($proveedor->getsegundo_apellido(),$connexion),Funciones::GetRealScapeString($proveedor->getprimer_nombre(),$connexion),Funciones::GetRealScapeString($proveedor->getsegundo_nombre(),$connexion),Funciones::GetRealScapeString($proveedor->getnombre_completo(),$connexion),Funciones::GetRealScapeString($proveedor->getdireccion(),$connexion),Funciones::GetRealScapeString($proveedor->gettelefono(),$connexion),Funciones::GetRealScapeString($proveedor->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($proveedor->gete_mail(),$connexion),Funciones::GetRealScapeString($proveedor->gete_mail2(),$connexion),Funciones::GetRealScapeString($proveedor->getcomentario(),$connexion),Funciones::GetRealScapeString($proveedor->getimagen(),$connexion),$proveedor->getactivo(),$proveedor->getid_pais(),$proveedor->getid_provincia(),$proveedor->getid_ciudad(),Funciones::GetRealScapeString($proveedor->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($proveedor->getfax(),$connexion),Funciones::GetRealScapeString($proveedor->getcontacto(),$connexion),$proveedor->getid_vendedor(),$proveedor->getmaximo_credito(),$proveedor->getmaximo_descuento(),$proveedor->getinteres_anual(),$proveedor->getbalance(),$proveedor->getid_termino_pago_proveedor(),Funciones::GetNullString($proveedor->getid_cuenta()),$proveedor->getaplica_impuesto_compras(),$proveedor->getid_impuesto(),$proveedor->getaplica_retencion_impuesto(),Funciones::GetNullString($proveedor->getid_retencion()),$proveedor->getaplica_retencion_fuente(),Funciones::GetNullString($proveedor->getid_retencion_fuente()),$proveedor->getaplica_retencion_ica(),Funciones::GetNullString($proveedor->getid_retencion_ica()),$proveedor->getaplica_2do_impuesto(),Funciones::GetNullString($proveedor->getid_otro_impuesto()),Funciones::GetRealScapeString($proveedor->getcreado(),$connexion),$proveedor->getmonto_ultima_transaccion(),Funciones::GetRealScapeString($proveedor->getfecha_ultima_transaccion(),$connexion),Funciones::GetRealScapeString($proveedor->getdescripcion_ultima_transaccion(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($proveedor->getid_empresa(),$proveedor->getid_tipo_persona(),$proveedor->getid_categoria_proveedor(),$proveedor->getid_giro_negocio_proveedor(),Funciones::GetRealScapeString($proveedor->getcodigo(),$connexion),Funciones::GetRealScapeString($proveedor->getruc(),$connexion),Funciones::GetRealScapeString($proveedor->getprimer_apellido(),$connexion),Funciones::GetRealScapeString($proveedor->getsegundo_apellido(),$connexion),Funciones::GetRealScapeString($proveedor->getprimer_nombre(),$connexion),Funciones::GetRealScapeString($proveedor->getsegundo_nombre(),$connexion),Funciones::GetRealScapeString($proveedor->getnombre_completo(),$connexion),Funciones::GetRealScapeString($proveedor->getdireccion(),$connexion),Funciones::GetRealScapeString($proveedor->gettelefono(),$connexion),Funciones::GetRealScapeString($proveedor->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($proveedor->gete_mail(),$connexion),Funciones::GetRealScapeString($proveedor->gete_mail2(),$connexion),Funciones::GetRealScapeString($proveedor->getcomentario(),$connexion),Funciones::GetRealScapeString($proveedor->getimagen(),$connexion),$proveedor->getactivo(),$proveedor->getid_pais(),$proveedor->getid_provincia(),$proveedor->getid_ciudad(),Funciones::GetRealScapeString($proveedor->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($proveedor->getfax(),$connexion),Funciones::GetRealScapeString($proveedor->getcontacto(),$connexion),$proveedor->getid_vendedor(),$proveedor->getmaximo_credito(),$proveedor->getmaximo_descuento(),$proveedor->getinteres_anual(),$proveedor->getbalance(),$proveedor->getid_termino_pago_proveedor(),Funciones::GetNullString($proveedor->getid_cuenta()),$proveedor->getaplica_impuesto_compras(),$proveedor->getid_impuesto(),$proveedor->getaplica_retencion_impuesto(),Funciones::GetNullString($proveedor->getid_retencion()),$proveedor->getaplica_retencion_fuente(),Funciones::GetNullString($proveedor->getid_retencion_fuente()),$proveedor->getaplica_retencion_ica(),Funciones::GetNullString($proveedor->getid_retencion_ica()),$proveedor->getaplica_2do_impuesto(),Funciones::GetNullString($proveedor->getid_otro_impuesto()),Funciones::GetRealScapeString($proveedor->getcreado(),$connexion),$proveedor->getmonto_ultima_transaccion(),Funciones::GetRealScapeString($proveedor->getfecha_ultima_transaccion(),$connexion),Funciones::GetRealScapeString($proveedor->getdescripcion_ultima_transaccion(),$connexion), $proveedor->getId(), Funciones::GetRealScapeString($proveedor->getVersionRow(),$connexion));
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
	
	public function setproveedor_Original(proveedor $proveedor) {
		$proveedor->setproveedor_Original(clone $proveedor);		
	}
	
	public function setproveedors_Original(array $proveedors) {
		foreach($proveedors as $proveedor){
			$proveedor->setproveedor_Original(clone $proveedor);
		}
	}
	
	public static function setproveedor_OriginalStatic(proveedor $proveedor) {
		$proveedor->setproveedor_Original(clone $proveedor);		
	}
	
	public static function setproveedors_OriginalStatic(array $proveedors) {		
		foreach($proveedors as $proveedor){
			$proveedor->setproveedor_Original(clone $proveedor);
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
