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
namespace com\bydan\contabilidad\cuentascobrar\cliente\business\data;

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

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\tipo_persona\business\data\tipo_persona_data;
use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\data\categoria_cliente_data;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\entity\categoria_cliente;

use com\bydan\contabilidad\inventario\tipo_precio\business\data\tipo_precio_data;
use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\data\giro_negocio_cliente_data;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\entity\giro_negocio_cliente;

use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;

use com\bydan\contabilidad\seguridad\provincia\business\data\provincia_data;
use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;

use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;

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

use com\bydan\contabilidad\facturacion\devolucion_factura\business\data\devolucion_factura_data;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\data\cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\data\documento_cliente_data;
use com\bydan\contabilidad\estimados\estimado\business\data\estimado_data;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\data\imagen_cliente_data;
use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;
use com\bydan\contabilidad\estimados\consignacion\business\data\consignacion_data;
use com\bydan\contabilidad\inventario\lista_cliente\business\data\lista_cliente_data;


class cliente_data extends GetEntitiesDataAccessHelper implements cliente_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cc_';
	public static string $TABLE_NAME='cc_cliente';			
	public static string $TABLE_NAME_cliente='cliente';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_CLIENTE_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_CLIENTE_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_CLIENTE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_CLIENTE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $cliente_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'cliente';
		
		cliente_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASCOBRAR');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cliente_DataAccessAdditional=new clienteDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_tipo_persona,id_categoria_cliente,id_tipo_precio,id_giro_negocio_cliente,codigo,ruc,primer_apellido,segundo_apellido,primer_nombre,segundo_nombre,nombre_completo,direccion,telefono,telefono_movil,e_mail,e_mail2,comentario,imagen,activo,id_pais,id_provincia,id_ciudad,codigo_postal,fax,contacto,id_vendedor,maximo_credito,maximo_descuento,interes_anual,balance,id_termino_pago_cliente,id_cuenta,facturar_con,aplica_impuesto_ventas,id_impuesto,aplica_retencion_impuesto,id_retencion,aplica_retencion_fuente,id_retencion_fuente,aplica_retencion_ica,id_retencion_ica,aplica_2do_impuesto,id_otro_impuesto,creado,monto_ultima_transaccion,fecha_ultima_transaccion,descripcion_ultima_transaccion) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%d\',%d,%d,%d,\'%s\',\'%s\',\'%s\',%d,%f,%f,%f,%f,%d,%s,%d,\'%d\',%d,\'%d\',%s,\'%d\',%s,\'%d\',%s,\'%d\',%s,\'%s\',%f,\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_tipo_persona=%d,id_categoria_cliente=%d,id_tipo_precio=%d,id_giro_negocio_cliente=%d,codigo=\'%s\',ruc=\'%s\',primer_apellido=\'%s\',segundo_apellido=\'%s\',primer_nombre=\'%s\',segundo_nombre=\'%s\',nombre_completo=\'%s\',direccion=\'%s\',telefono=\'%s\',telefono_movil=\'%s\',e_mail=\'%s\',e_mail2=\'%s\',comentario=\'%s\',imagen=\'%s\',activo=\'%d\',id_pais=%d,id_provincia=%d,id_ciudad=%d,codigo_postal=\'%s\',fax=\'%s\',contacto=\'%s\',id_vendedor=%d,maximo_credito=%f,maximo_descuento=%f,interes_anual=%f,balance=%f,id_termino_pago_cliente=%d,id_cuenta=%s,facturar_con=%d,aplica_impuesto_ventas=\'%d\',id_impuesto=%d,aplica_retencion_impuesto=\'%d\',id_retencion=%s,aplica_retencion_fuente=\'%d\',id_retencion_fuente=%s,aplica_retencion_ica=\'%d\',id_retencion_ica=%s,aplica_2do_impuesto=\'%d\',id_otro_impuesto=%s,creado=\'%s\',monto_ultima_transaccion=%f,fecha_ultima_transaccion=\'%s\',descripcion_ultima_transaccion=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_persona,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_categoria_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_giro_negocio_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ruc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.primer_apellido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.segundo_apellido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.primer_nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.segundo_nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_completo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono_movil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.e_mail,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.e_mail2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comentario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.activo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pais,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_provincia,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ciudad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_postal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fax,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.contacto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_vendedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.maximo_credito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.maximo_descuento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.interes_anual,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.facturar_con,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_impuesto_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_ica,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_ica,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_2do_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.creado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_ultima_transaccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultima_transaccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion_ultima_transaccion from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.primer_apellido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.primer_nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_completo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(cliente $cliente,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($cliente->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=cliente_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($cliente->getId(),$connexion));				
				
			} else if ($cliente->getIsChanged()) {
				if($cliente->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=cliente_data::$QUERY_INSERT;
					
					
					
					

					//$id_cuenta='null';
					//if($cliente->getid_cuenta()!==null && $cliente->getid_cuenta()>=0) {
						//$id_cuenta=$cliente->getid_cuenta();
					//} else {
						//$id_cuenta='null';
					//}

					//$id_retencion='null';
					//if($cliente->getid_retencion()!==null && $cliente->getid_retencion()>=0) {
						//$id_retencion=$cliente->getid_retencion();
					//} else {
						//$id_retencion='null';
					//}

					//$id_retencion_fuente='null';
					//if($cliente->getid_retencion_fuente()!==null && $cliente->getid_retencion_fuente()>=0) {
						//$id_retencion_fuente=$cliente->getid_retencion_fuente();
					//} else {
						//$id_retencion_fuente='null';
					//}

					//$id_retencion_ica='null';
					//if($cliente->getid_retencion_ica()!==null && $cliente->getid_retencion_ica()>=0) {
						//$id_retencion_ica=$cliente->getid_retencion_ica();
					//} else {
						//$id_retencion_ica='null';
					//}

					//$id_otro_impuesto='null';
					//if($cliente->getid_otro_impuesto()!==null && $cliente->getid_otro_impuesto()>=0) {
						//$id_otro_impuesto=$cliente->getid_otro_impuesto();
					//} else {
						//$id_otro_impuesto='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cliente->getid_empresa(),$cliente->getid_tipo_persona(),$cliente->getid_categoria_cliente(),$cliente->getid_tipo_precio(),$cliente->getid_giro_negocio_cliente(),Funciones::GetRealScapeString($cliente->getcodigo(),$connexion),Funciones::GetRealScapeString($cliente->getruc(),$connexion),Funciones::GetRealScapeString($cliente->getprimer_apellido(),$connexion),Funciones::GetRealScapeString($cliente->getsegundo_apellido(),$connexion),Funciones::GetRealScapeString($cliente->getprimer_nombre(),$connexion),Funciones::GetRealScapeString($cliente->getsegundo_nombre(),$connexion),Funciones::GetRealScapeString($cliente->getnombre_completo(),$connexion),Funciones::GetRealScapeString($cliente->getdireccion(),$connexion),Funciones::GetRealScapeString($cliente->gettelefono(),$connexion),Funciones::GetRealScapeString($cliente->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($cliente->gete_mail(),$connexion),Funciones::GetRealScapeString($cliente->gete_mail2(),$connexion),Funciones::GetRealScapeString($cliente->getcomentario(),$connexion),Funciones::GetRealScapeString($cliente->getimagen(),$connexion),$cliente->getactivo(),$cliente->getid_pais(),$cliente->getid_provincia(),$cliente->getid_ciudad(),Funciones::GetRealScapeString($cliente->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($cliente->getfax(),$connexion),Funciones::GetRealScapeString($cliente->getcontacto(),$connexion),$cliente->getid_vendedor(),$cliente->getmaximo_credito(),$cliente->getmaximo_descuento(),$cliente->getinteres_anual(),$cliente->getbalance(),$cliente->getid_termino_pago_cliente(),Funciones::GetNullString($cliente->getid_cuenta()),$cliente->getfacturar_con(),$cliente->getaplica_impuesto_ventas(),$cliente->getid_impuesto(),$cliente->getaplica_retencion_impuesto(),Funciones::GetNullString($cliente->getid_retencion()),$cliente->getaplica_retencion_fuente(),Funciones::GetNullString($cliente->getid_retencion_fuente()),$cliente->getaplica_retencion_ica(),Funciones::GetNullString($cliente->getid_retencion_ica()),$cliente->getaplica_2do_impuesto(),Funciones::GetNullString($cliente->getid_otro_impuesto()),Funciones::GetRealScapeString($cliente->getcreado(),$connexion),$cliente->getmonto_ultima_transaccion(),Funciones::GetRealScapeString($cliente->getfecha_ultima_transaccion(),$connexion),Funciones::GetRealScapeString($cliente->getdescripcion_ultima_transaccion(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=cliente_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_cuenta='null';
					//if($cliente->getid_cuenta()!==null && $cliente->getid_cuenta()>=0) {
						//$id_cuenta=$cliente->getid_cuenta();
					//} else {
						//$id_cuenta='null';
					//}

					//$id_retencion='null';
					//if($cliente->getid_retencion()!==null && $cliente->getid_retencion()>=0) {
						//$id_retencion=$cliente->getid_retencion();
					//} else {
						//$id_retencion='null';
					//}

					//$id_retencion_fuente='null';
					//if($cliente->getid_retencion_fuente()!==null && $cliente->getid_retencion_fuente()>=0) {
						//$id_retencion_fuente=$cliente->getid_retencion_fuente();
					//} else {
						//$id_retencion_fuente='null';
					//}

					//$id_retencion_ica='null';
					//if($cliente->getid_retencion_ica()!==null && $cliente->getid_retencion_ica()>=0) {
						//$id_retencion_ica=$cliente->getid_retencion_ica();
					//} else {
						//$id_retencion_ica='null';
					//}

					//$id_otro_impuesto='null';
					//if($cliente->getid_otro_impuesto()!==null && $cliente->getid_otro_impuesto()>=0) {
						//$id_otro_impuesto=$cliente->getid_otro_impuesto();
					//} else {
						//$id_otro_impuesto='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cliente->getid_empresa(),$cliente->getid_tipo_persona(),$cliente->getid_categoria_cliente(),$cliente->getid_tipo_precio(),$cliente->getid_giro_negocio_cliente(),Funciones::GetRealScapeString($cliente->getcodigo(),$connexion),Funciones::GetRealScapeString($cliente->getruc(),$connexion),Funciones::GetRealScapeString($cliente->getprimer_apellido(),$connexion),Funciones::GetRealScapeString($cliente->getsegundo_apellido(),$connexion),Funciones::GetRealScapeString($cliente->getprimer_nombre(),$connexion),Funciones::GetRealScapeString($cliente->getsegundo_nombre(),$connexion),Funciones::GetRealScapeString($cliente->getnombre_completo(),$connexion),Funciones::GetRealScapeString($cliente->getdireccion(),$connexion),Funciones::GetRealScapeString($cliente->gettelefono(),$connexion),Funciones::GetRealScapeString($cliente->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($cliente->gete_mail(),$connexion),Funciones::GetRealScapeString($cliente->gete_mail2(),$connexion),Funciones::GetRealScapeString($cliente->getcomentario(),$connexion),Funciones::GetRealScapeString($cliente->getimagen(),$connexion),$cliente->getactivo(),$cliente->getid_pais(),$cliente->getid_provincia(),$cliente->getid_ciudad(),Funciones::GetRealScapeString($cliente->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($cliente->getfax(),$connexion),Funciones::GetRealScapeString($cliente->getcontacto(),$connexion),$cliente->getid_vendedor(),$cliente->getmaximo_credito(),$cliente->getmaximo_descuento(),$cliente->getinteres_anual(),$cliente->getbalance(),$cliente->getid_termino_pago_cliente(),Funciones::GetNullString($cliente->getid_cuenta()),$cliente->getfacturar_con(),$cliente->getaplica_impuesto_ventas(),$cliente->getid_impuesto(),$cliente->getaplica_retencion_impuesto(),Funciones::GetNullString($cliente->getid_retencion()),$cliente->getaplica_retencion_fuente(),Funciones::GetNullString($cliente->getid_retencion_fuente()),$cliente->getaplica_retencion_ica(),Funciones::GetNullString($cliente->getid_retencion_ica()),$cliente->getaplica_2do_impuesto(),Funciones::GetNullString($cliente->getid_otro_impuesto()),Funciones::GetRealScapeString($cliente->getcreado(),$connexion),$cliente->getmonto_ultima_transaccion(),Funciones::GetRealScapeString($cliente->getfecha_ultima_transaccion(),$connexion),Funciones::GetRealScapeString($cliente->getdescripcion_ultima_transaccion(),$connexion), Funciones::GetRealScapeString($cliente->getId(),$connexion), Funciones::GetRealScapeString($cliente->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($cliente, $connexion,$strQuerySaveComplete,cliente_data::$TABLE_NAME,cliente_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				cliente_data::savePrepared($cliente, $connexion,$strQuerySave,cliente_data::$TABLE_NAME,cliente_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			cliente_data::setcliente_OriginalStatic($cliente);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				cliente_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					cliente_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					cliente_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cliente_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					cliente_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cliente_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?cliente {		
		$entity = new cliente();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=cliente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cliente_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasCobrar.cliente.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setcliente_Original(new cliente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cliente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setcliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getcliente_Original(),$resultSet,cliente_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setcliente_Original(cliente_data::getEntityBaseResult("",$entity->getcliente_Original(),$resultSet));
				//$entity->setcliente_Original($this->getEntityBaseResult("",$entity->getcliente_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cliente {
		$entity = new cliente();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=cliente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cliente_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cliente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasCobrar.cliente.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setcliente_Original(new cliente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cliente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setcliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getcliente_Original(),$resultSet,cliente_data::$IS_WITH_SCHEMA));         		
				////$entity->setcliente_Original(cliente_data::getEntityBaseResult("",$entity->getcliente_Original(),$resultSet));
				//$entity->setcliente_Original($this->getEntityBaseResult("",$entity->getcliente_Original(),$resultSet));
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
		$entity = new cliente();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=cliente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cliente_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cliente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new cliente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cliente_data::$IS_WITH_SCHEMA);         		
				/*$entity=cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcliente_Original( new cliente());
				
				//$entity->setcliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getcliente_Original(),$resultSet,cliente_data::$IS_WITH_SCHEMA));         		
				////$entity->setcliente_Original(cliente_data::getEntityBaseResult("",$entity->getcliente_Original(),$resultSet));
				//$entity->setcliente_Original($this->getEntityBaseResult("",$entity->getcliente_Original(),$resultSet));
								
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
		$entity = new cliente();		  
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
      	    	$entity = new cliente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cliente_data::$IS_WITH_SCHEMA);         		
				/*$entity=cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcliente_Original( new cliente());
				
				//$entity->setcliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getcliente_Original(),$resultSet,cliente_data::$IS_WITH_SCHEMA));         		
				////$entity->setcliente_Original(cliente_data::getEntityBaseResult("",$entity->getcliente_Original(),$resultSet));
				//$entity->setcliente_Original($this->getEntityBaseResult("",$entity->getcliente_Original(),$resultSet));
				
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
		$entity = new cliente();		  
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
      	    	$entity = new cliente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cliente_data::$IS_WITH_SCHEMA);         		
				/*$entity=cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcliente_Original( new cliente());				
				//$entity->setcliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getcliente_Original(),$resultSet,cliente_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setcliente_Original(cliente_data::getEntityBaseResult("",$entity->getcliente_Original(),$resultSet));
				//$entity->setcliente_Original($this->getEntityBaseResult("",$entity->getcliente_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=cliente_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cliente $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cliente_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,cliente_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relcliente) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relcliente->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  gettipo_persona(Connexion $connexion,$relcliente) : ?tipo_persona{

		$tipo_persona= new tipo_persona();

		try {
			$tipo_personaDataAccess=new tipo_persona_data();
			$tipo_personaDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_persona=$tipo_personaDataAccess->getEntity($connexion,$relcliente->getid_tipo_persona());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_persona;
	}


	public function  getcategoria_cliente(Connexion $connexion,$relcliente) : ?categoria_cliente{

		$categoria_cliente= new categoria_cliente();

		try {
			$categoria_clienteDataAccess=new categoria_cliente_data();
			$categoria_clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$categoria_cliente=$categoria_clienteDataAccess->getEntity($connexion,$relcliente->getid_categoria_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $categoria_cliente;
	}


	public function  gettipo_precio(Connexion $connexion,$relcliente) : ?tipo_precio{

		$tipo_precio= new tipo_precio();

		try {
			$tipo_precioDataAccess=new tipo_precio_data();
			$tipo_precioDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_precio=$tipo_precioDataAccess->getEntity($connexion,$relcliente->getid_tipo_precio());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_precio;
	}


	public function  getgiro_negocio_cliente(Connexion $connexion,$relcliente) : ?giro_negocio_cliente{

		$giro_negocio_cliente= new giro_negocio_cliente();

		try {
			$giro_negocio_clienteDataAccess=new giro_negocio_cliente_data();
			$giro_negocio_clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$giro_negocio_cliente=$giro_negocio_clienteDataAccess->getEntity($connexion,$relcliente->getid_giro_negocio_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $giro_negocio_cliente;
	}


	public function  getpais(Connexion $connexion,$relcliente) : ?pais{

		$pais= new pais();

		try {
			$paisDataAccess=new pais_data();
			$paisDataAccess->isForFKData=$this->isForFKDataRels;
			$pais=$paisDataAccess->getEntity($connexion,$relcliente->getid_pais());

		} catch(Exception $e) {
			throw $e;
		}

		return $pais;
	}


	public function  getprovincia(Connexion $connexion,$relcliente) : ?provincia{

		$provincia= new provincia();

		try {
			$provinciaDataAccess=new provincia_data();
			$provinciaDataAccess->isForFKData=$this->isForFKDataRels;
			$provincia=$provinciaDataAccess->getEntity($connexion,$relcliente->getid_provincia());

		} catch(Exception $e) {
			throw $e;
		}

		return $provincia;
	}


	public function  getciudad(Connexion $connexion,$relcliente) : ?ciudad{

		$ciudad= new ciudad();

		try {
			$ciudadDataAccess=new ciudad_data();
			$ciudadDataAccess->isForFKData=$this->isForFKDataRels;
			$ciudad=$ciudadDataAccess->getEntity($connexion,$relcliente->getid_ciudad());

		} catch(Exception $e) {
			throw $e;
		}

		return $ciudad;
	}


	public function  getvendedor(Connexion $connexion,$relcliente) : ?vendedor{

		$vendedor= new vendedor();

		try {
			$vendedorDataAccess=new vendedor_data();
			$vendedorDataAccess->isForFKData=$this->isForFKDataRels;
			$vendedor=$vendedorDataAccess->getEntity($connexion,$relcliente->getid_vendedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $vendedor;
	}


	public function  gettermino_pago_cliente(Connexion $connexion,$relcliente) : ?termino_pago_cliente{

		$termino_pago_cliente= new termino_pago_cliente();

		try {
			$termino_pago_clienteDataAccess=new termino_pago_cliente_data();
			$termino_pago_clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$termino_pago_cliente=$termino_pago_clienteDataAccess->getEntity($connexion,$relcliente->getid_termino_pago_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $termino_pago_cliente;
	}


	public function  getcuenta(Connexion $connexion,$relcliente) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relcliente->getid_cuenta());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getimpuesto(Connexion $connexion,$relcliente) : ?impuesto{

		$impuesto= new impuesto();

		try {
			$impuestoDataAccess=new impuesto_data();
			$impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$impuesto=$impuestoDataAccess->getEntity($connexion,$relcliente->getid_impuesto());

		} catch(Exception $e) {
			throw $e;
		}

		return $impuesto;
	}


	public function  getretencion(Connexion $connexion,$relcliente) : ?retencion{

		$retencion= new retencion();

		try {
			$retencionDataAccess=new retencion_data();
			$retencionDataAccess->isForFKData=$this->isForFKDataRels;
			$retencion=$retencionDataAccess->getEntity($connexion,$relcliente->getid_retencion());

		} catch(Exception $e) {
			throw $e;
		}

		return $retencion;
	}


	public function  getretencion_fuente(Connexion $connexion,$relcliente) : ?retencion_fuente{

		$retencion_fuente= new retencion_fuente();

		try {
			$retencion_fuenteDataAccess=new retencion_fuente_data();
			$retencion_fuenteDataAccess->isForFKData=$this->isForFKDataRels;
			$retencion_fuente=$retencion_fuenteDataAccess->getEntity($connexion,$relcliente->getid_retencion_fuente());

		} catch(Exception $e) {
			throw $e;
		}

		return $retencion_fuente;
	}


	public function  getretencion_ica(Connexion $connexion,$relcliente) : ?retencion_ica{

		$retencion_ica= new retencion_ica();

		try {
			$retencion_icaDataAccess=new retencion_ica_data();
			$retencion_icaDataAccess->isForFKData=$this->isForFKDataRels;
			$retencion_ica=$retencion_icaDataAccess->getEntity($connexion,$relcliente->getid_retencion_ica());

		} catch(Exception $e) {
			throw $e;
		}

		return $retencion_ica;
	}


	public function  getotro_impuesto(Connexion $connexion,$relcliente) : ?otro_impuesto{

		$otro_impuesto= new otro_impuesto();

		try {
			$otro_impuestoDataAccess=new otro_impuesto_data();
			$otro_impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$otro_impuesto=$otro_impuestoDataAccess->getEntity($connexion,$relcliente->getid_otro_impuesto());

		} catch(Exception $e) {
			throw $e;
		}

		return $otro_impuesto;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getdevolucion_facturas(Connexion $connexion,cliente $cliente) : array {

		$devolucionfacturas=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.devolucion_factura_data::$SCHEMA.".".devolucion_factura_data::$TABLE_NAME.".id_cliente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cliente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$devolucionfacturaDataAccess=new devolucion_factura_data();

			$devolucionfacturas=$devolucionfacturaDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $devolucionfacturas;
	}


	public function  getcuenta_cobrars(Connexion $connexion,cliente $cliente) : array {

		$cuentacobrars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.cuenta_cobrar_data::$SCHEMA.".".cuenta_cobrar_data::$TABLE_NAME.".id_cliente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cliente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$cuentacobrarDataAccess=new cuenta_cobrar_data();

			$cuentacobrars=$cuentacobrarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $cuentacobrars;
	}


	public function  getdocumento_clientes(Connexion $connexion,cliente $cliente) : array {

		$documentoclientes=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.documento_cliente_data::$SCHEMA.".".documento_cliente_data::$TABLE_NAME.".id_cliente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cliente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$documentoclienteDataAccess=new documento_cliente_data();

			$documentoclientes=$documentoclienteDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $documentoclientes;
	}


	public function  getestimados(Connexion $connexion,cliente $cliente) : array {

		$estimados=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.estimado_data::$SCHEMA.".".estimado_data::$TABLE_NAME.".id_cliente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cliente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$estimadoDataAccess=new estimado_data();

			$estimados=$estimadoDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $estimados;
	}


	public function  getimagen_clientes(Connexion $connexion,cliente $cliente) : array {

		$imagenclientes=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.imagen_cliente_data::$SCHEMA.".".imagen_cliente_data::$TABLE_NAME.".id_cliente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cliente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$imagenclienteDataAccess=new imagen_cliente_data();

			$imagenclientes=$imagenclienteDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $imagenclientes;
	}


	public function  getfacturas(Connexion $connexion,cliente $cliente) : array {

		$facturas=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.factura_data::$SCHEMA.".".factura_data::$TABLE_NAME.".id_cliente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cliente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$facturaDataAccess=new factura_data();

			$facturas=$facturaDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $facturas;
	}


	public function  getconsignacions(Connexion $connexion,cliente $cliente) : array {

		$consignacions=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.consignacion_data::$SCHEMA.".".consignacion_data::$TABLE_NAME.".id_cliente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cliente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$consignacionDataAccess=new consignacion_data();

			$consignacions=$consignacionDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $consignacions;
	}


	public function  getlista_clientes(Connexion $connexion,cliente $cliente) : array {

		$listaclientes=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.lista_cliente_data::$SCHEMA.".".lista_cliente_data::$TABLE_NAME.".id_cliente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cliente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$listaclienteDataAccess=new lista_cliente_data();

			$listaclientes=$listaclienteDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $listaclientes;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,cliente $entity,$resultSet) : cliente {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_tipo_persona((int)$resultSet[$strPrefijo.'id_tipo_persona']);
				$entity->setid_categoria_cliente((int)$resultSet[$strPrefijo.'id_categoria_cliente']);
				$entity->setid_tipo_precio((int)$resultSet[$strPrefijo.'id_tipo_precio']);
				$entity->setid_giro_negocio_cliente((int)$resultSet[$strPrefijo.'id_giro_negocio_cliente']);
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
				$entity->setid_termino_pago_cliente((int)$resultSet[$strPrefijo.'id_termino_pago_cliente']);
				$entity->setid_cuenta((int)$resultSet[$strPrefijo.'id_cuenta']);
				$entity->setfacturar_con((int)$resultSet[$strPrefijo.'facturar_con']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setaplica_impuesto_ventas($resultSet[$strPrefijo.'aplica_impuesto_ventas']=='f'? false:true );
				} else {
					$entity->setaplica_impuesto_ventas((bool)$resultSet[$strPrefijo.'aplica_impuesto_ventas']);
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
				$entity->setprimer_apellido(utf8_encode($resultSet[$strPrefijo.'primer_apellido']));$entity->setprimer_nombre(utf8_encode($resultSet[$strPrefijo.'primer_nombre']));$entity->setnombre_completo(utf8_encode($resultSet[$strPrefijo.'nombre_completo']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,cliente $cliente,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $cliente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiissssssssssssssiiiisssiddddiiiiiiiiiiiiisdss', $cliente->getid_empresa(),$cliente->getid_tipo_persona(),$cliente->getid_categoria_cliente(),$cliente->getid_tipo_precio(),$cliente->getid_giro_negocio_cliente(),$cliente->getcodigo(),$cliente->getruc(),$cliente->getprimer_apellido(),$cliente->getsegundo_apellido(),$cliente->getprimer_nombre(),$cliente->getsegundo_nombre(),$cliente->getnombre_completo(),$cliente->getdireccion(),$cliente->gettelefono(),$cliente->gettelefono_movil(),$cliente->gete_mail(),$cliente->gete_mail2(),$cliente->getcomentario(),$cliente->getimagen(),$cliente->getactivo(),$cliente->getid_pais(),$cliente->getid_provincia(),$cliente->getid_ciudad(),$cliente->getcodigo_postal(),$cliente->getfax(),$cliente->getcontacto(),$cliente->getid_vendedor(),$cliente->getmaximo_credito(),$cliente->getmaximo_descuento(),$cliente->getinteres_anual(),$cliente->getbalance(),$cliente->getid_termino_pago_cliente(),$cliente->getid_cuenta(),$cliente->getfacturar_con(),$cliente->getaplica_impuesto_ventas(),$cliente->getid_impuesto(),$cliente->getaplica_retencion_impuesto(),$cliente->getid_retencion(),$cliente->getaplica_retencion_fuente(),$cliente->getid_retencion_fuente(),$cliente->getaplica_retencion_ica(),$cliente->getid_retencion_ica(),$cliente->getaplica_2do_impuesto(),$cliente->getid_otro_impuesto(),$cliente->getcreado(),$cliente->getmonto_ultima_transaccion(),$cliente->getfecha_ultima_transaccion(),$cliente->getdescripcion_ultima_transaccion());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiissssssssssssssiiiisssiddddiiiiiiiiiiiiisdssis', $cliente->getid_empresa(),$cliente->getid_tipo_persona(),$cliente->getid_categoria_cliente(),$cliente->getid_tipo_precio(),$cliente->getid_giro_negocio_cliente(),$cliente->getcodigo(),$cliente->getruc(),$cliente->getprimer_apellido(),$cliente->getsegundo_apellido(),$cliente->getprimer_nombre(),$cliente->getsegundo_nombre(),$cliente->getnombre_completo(),$cliente->getdireccion(),$cliente->gettelefono(),$cliente->gettelefono_movil(),$cliente->gete_mail(),$cliente->gete_mail2(),$cliente->getcomentario(),$cliente->getimagen(),$cliente->getactivo(),$cliente->getid_pais(),$cliente->getid_provincia(),$cliente->getid_ciudad(),$cliente->getcodigo_postal(),$cliente->getfax(),$cliente->getcontacto(),$cliente->getid_vendedor(),$cliente->getmaximo_credito(),$cliente->getmaximo_descuento(),$cliente->getinteres_anual(),$cliente->getbalance(),$cliente->getid_termino_pago_cliente(),$cliente->getid_cuenta(),$cliente->getfacturar_con(),$cliente->getaplica_impuesto_ventas(),$cliente->getid_impuesto(),$cliente->getaplica_retencion_impuesto(),$cliente->getid_retencion(),$cliente->getaplica_retencion_fuente(),$cliente->getid_retencion_fuente(),$cliente->getaplica_retencion_ica(),$cliente->getid_retencion_ica(),$cliente->getaplica_2do_impuesto(),$cliente->getid_otro_impuesto(),$cliente->getcreado(),$cliente->getmonto_ultima_transaccion(),$cliente->getfecha_ultima_transaccion(),$cliente->getdescripcion_ultima_transaccion(), $cliente->getId(), Funciones::GetRealScapeString($cliente->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,cliente $cliente,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($cliente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($cliente->getid_empresa(),$cliente->getid_tipo_persona(),$cliente->getid_categoria_cliente(),$cliente->getid_tipo_precio(),$cliente->getid_giro_negocio_cliente(),Funciones::GetRealScapeString($cliente->getcodigo(),$connexion),Funciones::GetRealScapeString($cliente->getruc(),$connexion),Funciones::GetRealScapeString($cliente->getprimer_apellido(),$connexion),Funciones::GetRealScapeString($cliente->getsegundo_apellido(),$connexion),Funciones::GetRealScapeString($cliente->getprimer_nombre(),$connexion),Funciones::GetRealScapeString($cliente->getsegundo_nombre(),$connexion),Funciones::GetRealScapeString($cliente->getnombre_completo(),$connexion),Funciones::GetRealScapeString($cliente->getdireccion(),$connexion),Funciones::GetRealScapeString($cliente->gettelefono(),$connexion),Funciones::GetRealScapeString($cliente->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($cliente->gete_mail(),$connexion),Funciones::GetRealScapeString($cliente->gete_mail2(),$connexion),Funciones::GetRealScapeString($cliente->getcomentario(),$connexion),Funciones::GetRealScapeString($cliente->getimagen(),$connexion),$cliente->getactivo(),$cliente->getid_pais(),$cliente->getid_provincia(),$cliente->getid_ciudad(),Funciones::GetRealScapeString($cliente->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($cliente->getfax(),$connexion),Funciones::GetRealScapeString($cliente->getcontacto(),$connexion),$cliente->getid_vendedor(),$cliente->getmaximo_credito(),$cliente->getmaximo_descuento(),$cliente->getinteres_anual(),$cliente->getbalance(),$cliente->getid_termino_pago_cliente(),Funciones::GetNullString($cliente->getid_cuenta()),$cliente->getfacturar_con(),$cliente->getaplica_impuesto_ventas(),$cliente->getid_impuesto(),$cliente->getaplica_retencion_impuesto(),Funciones::GetNullString($cliente->getid_retencion()),$cliente->getaplica_retencion_fuente(),Funciones::GetNullString($cliente->getid_retencion_fuente()),$cliente->getaplica_retencion_ica(),Funciones::GetNullString($cliente->getid_retencion_ica()),$cliente->getaplica_2do_impuesto(),Funciones::GetNullString($cliente->getid_otro_impuesto()),Funciones::GetRealScapeString($cliente->getcreado(),$connexion),$cliente->getmonto_ultima_transaccion(),Funciones::GetRealScapeString($cliente->getfecha_ultima_transaccion(),$connexion),Funciones::GetRealScapeString($cliente->getdescripcion_ultima_transaccion(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($cliente->getid_empresa(),$cliente->getid_tipo_persona(),$cliente->getid_categoria_cliente(),$cliente->getid_tipo_precio(),$cliente->getid_giro_negocio_cliente(),Funciones::GetRealScapeString($cliente->getcodigo(),$connexion),Funciones::GetRealScapeString($cliente->getruc(),$connexion),Funciones::GetRealScapeString($cliente->getprimer_apellido(),$connexion),Funciones::GetRealScapeString($cliente->getsegundo_apellido(),$connexion),Funciones::GetRealScapeString($cliente->getprimer_nombre(),$connexion),Funciones::GetRealScapeString($cliente->getsegundo_nombre(),$connexion),Funciones::GetRealScapeString($cliente->getnombre_completo(),$connexion),Funciones::GetRealScapeString($cliente->getdireccion(),$connexion),Funciones::GetRealScapeString($cliente->gettelefono(),$connexion),Funciones::GetRealScapeString($cliente->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($cliente->gete_mail(),$connexion),Funciones::GetRealScapeString($cliente->gete_mail2(),$connexion),Funciones::GetRealScapeString($cliente->getcomentario(),$connexion),Funciones::GetRealScapeString($cliente->getimagen(),$connexion),$cliente->getactivo(),$cliente->getid_pais(),$cliente->getid_provincia(),$cliente->getid_ciudad(),Funciones::GetRealScapeString($cliente->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($cliente->getfax(),$connexion),Funciones::GetRealScapeString($cliente->getcontacto(),$connexion),$cliente->getid_vendedor(),$cliente->getmaximo_credito(),$cliente->getmaximo_descuento(),$cliente->getinteres_anual(),$cliente->getbalance(),$cliente->getid_termino_pago_cliente(),Funciones::GetNullString($cliente->getid_cuenta()),$cliente->getfacturar_con(),$cliente->getaplica_impuesto_ventas(),$cliente->getid_impuesto(),$cliente->getaplica_retencion_impuesto(),Funciones::GetNullString($cliente->getid_retencion()),$cliente->getaplica_retencion_fuente(),Funciones::GetNullString($cliente->getid_retencion_fuente()),$cliente->getaplica_retencion_ica(),Funciones::GetNullString($cliente->getid_retencion_ica()),$cliente->getaplica_2do_impuesto(),Funciones::GetNullString($cliente->getid_otro_impuesto()),Funciones::GetRealScapeString($cliente->getcreado(),$connexion),$cliente->getmonto_ultima_transaccion(),Funciones::GetRealScapeString($cliente->getfecha_ultima_transaccion(),$connexion),Funciones::GetRealScapeString($cliente->getdescripcion_ultima_transaccion(),$connexion), $cliente->getId(), Funciones::GetRealScapeString($cliente->getVersionRow(),$connexion));
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
	
	public function setcliente_Original(cliente $cliente) {
		$cliente->setcliente_Original(clone $cliente);		
	}
	
	public function setclientes_Original(array $clientes) {
		foreach($clientes as $cliente){
			$cliente->setcliente_Original(clone $cliente);
		}
	}
	
	public static function setcliente_OriginalStatic(cliente $cliente) {
		$cliente->setcliente_Original(clone $cliente);		
	}
	
	public static function setclientes_OriginalStatic(array $clientes) {		
		foreach($clientes as $cliente){
			$cliente->setcliente_Original(clone $cliente);
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
