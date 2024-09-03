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

namespace com\bydan\contabilidad\facturacion\factura_lote\presentation\control;

use Exception;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;

include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\util\FuncionesWebArbol;

include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/PaqueteTipo.php');
use com\bydan\framework\contabilidad\util\PaqueteTipo;

use com\bydan\framework\contabilidad\util\ControlTipo;
use com\bydan\framework\contabilidad\util\DeepLoadType;
use com\bydan\framework\contabilidad\util\EventoTipo;
use com\bydan\framework\contabilidad\util\EventoSubTipo;
use com\bydan\framework\contabilidad\util\EventoGlobalTipo;
use com\bydan\framework\contabilidad\util\FuncionesObject;
use com\bydan\framework\contabilidad\util\Connexion;

use com\bydan\framework\contabilidad\util\excel\ExcelHelper;
use com\bydan\framework\contabilidad\util\pdf\FpdfHelper;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Mensajes;
use com\bydan\framework\contabilidad\business\entity\SelectItem;

//use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
//use com\bydan\framework\contabilidad\business\logic\DatosDeep;

use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\ConexionController;

use com\bydan\framework\contabilidad\business\data\ModelBase;

use com\bydan\framework\contabilidad\business\logic\DatosCliente;
use com\bydan\framework\contabilidad\business\logic\Pagination;

use com\bydan\framework\contabilidad\presentation\report\CellReport;
use com\bydan\framework\contabilidad\presentation\templating\Template;

use com\bydan\framework\contabilidad\presentation\web\control\ControllerBase;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;
use com\bydan\framework\contabilidad\presentation\web\PaginationLink;
use com\bydan\framework\contabilidad\presentation\web\HistoryWeb;

use com\bydan\framework\contabilidad\business\entity\MaintenanceType;
use com\bydan\framework\contabilidad\business\entity\ParameterDivSecciones;
//use com\bydan\framework\contabilidad\business\entity\Classe;
//use com\bydan\framework\contabilidad\presentation\web\SessionBase;

use com\bydan\framework\globales\seguridad\logic\GlobalSeguridad;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_param_return;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;

use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/factura_lote/util/factura_lote_carga.php');
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_param_return;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote\presentation\session\factura_lote_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

//REL


use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_util;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\presentation\session\factura_lote_detalle_session;

use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_util;
use com\bydan\contabilidad\facturacion\factura_modelo\presentation\session\factura_modelo_session;


/*CARGA ARCHIVOS FRAMEWORK*/
factura_lote_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
factura_lote_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class factura_lote_init_control extends ControllerBase {	
	
	public $factura_loteClase=null;	
	public $factura_lotesModel=null;	
	public $factura_lotesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idfactura_lote=0;	
	public ?int $idfactura_loteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $factura_loteLogic=null;
	
	public $factura_loteActual=null;	
	
	public $factura_lote=null;
	public $factura_lotes=null;
	public $factura_lotesEliminados=array();
	public $factura_lotesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $factura_lotesLocal=array();
	public ?array $factura_lotesReporte=null;
	public ?array $factura_lotesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadfactura_lote='onload';
	public string $strTipoPaginaAuxiliarfactura_lote='none';
	public string $strTipoUsuarioAuxiliarfactura_lote='none';
		
	public $factura_loteReturnGeneral=null;
	public $factura_loteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $factura_loteModel=null;
	public $factura_loteControllerAdditional=null;
	
	
	

	public $facturalotedetalleLogic=null;

	public function  getfactura_lote_detalleLogic() {
		return $this->facturalotedetalleLogic;
	}

	public function setfactura_lote_detalleLogic($facturalotedetalleLogic) {
		$this->facturalotedetalleLogic =$facturalotedetalleLogic;
	}


	public $facturamodeloLogic=null;

	public function  getfactura_modeloLogic() {
		return $this->facturamodeloLogic;
	}

	public function setfactura_modeloLogic($facturamodeloLogic) {
		$this->facturamodeloLogic =$facturamodeloLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajenumero='';
	public string $strMensajeid_cliente='';
	public string $strMensajeruc='';
	public string $strMensajereferencia_cliente='';
	public string $strMensajefecha_emision='';
	public string $strMensajeid_vendedor='';
	public string $strMensajeid_termino_pago='';
	public string $strMensajefecha_vence='';
	public string $strMensajecotizacion='';
	public string $strMensajeid_moneda='';
	public string $strMensajeid_estado='';
	public string $strMensajedireccion='';
	public string $strMensajeenviar_a='';
	public string $strMensajeobservacion='';
	public string $strMensajeimpuesto_en_precio='';
	public string $strMensajesub_total='';
	public string $strMensajedescuento_monto='';
	public string $strMensajedescuento_porciento='';
	public string $strMensajeiva_monto='';
	public string $strMensajeiva_porciento='';
	public string $strMensajeretencion_fuente_monto='';
	public string $strMensajeretencion_fuente_porciento='';
	public string $strMensajeretencion_iva_monto='';
	public string $strMensajeretencion_iva_porciento='';
	public string $strMensajetotal='';
	public string $strMensajeotro_monto='';
	public string $strMensajeotro_porciento='';
	public string $strMensajehora='';
	public string $strMensajeretencion_ica_monto='';
	public string $strMensajeretencion_ica_porciento='';
	public string $strMensajeid_asiento='';
	public string $strMensajeid_documento_cuenta_cobrar='';
	public string $strMensajeid_kardex='';
	
	
	public string $strVisibleFK_Idasiento='display:table-row';
	public string $strVisibleFK_Idcliente='display:table-row';
	public string $strVisibleFK_Iddocumento_cuenta_cobrar='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idkardex='display:table-row';
	public string $strVisibleFK_Idmoneda='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
	public string $strVisibleFK_Idtermino_pago='display:table-row';
	public string $strVisibleFK_Idusuario='display:table-row';
	public string $strVisibleFK_Idvendedor='display:table-row';

	
	public array $empresasFK=array();

	public function getempresasFK():array {
		return $this->empresasFK;
	}

	public function setempresasFK(array $empresasFK) {
		$this->empresasFK = $empresasFK;
	}

	public int $idempresaDefaultFK=-1;

	public function getIdempresaDefaultFK():int {
		return $this->idempresaDefaultFK;
	}

	public function setIdempresaDefaultFK(int $idempresaDefaultFK) {
		$this->idempresaDefaultFK = $idempresaDefaultFK;
	}

	public array $sucursalsFK=array();

	public function getsucursalsFK():array {
		return $this->sucursalsFK;
	}

	public function setsucursalsFK(array $sucursalsFK) {
		$this->sucursalsFK = $sucursalsFK;
	}

	public int $idsucursalDefaultFK=-1;

	public function getIdsucursalDefaultFK():int {
		return $this->idsucursalDefaultFK;
	}

	public function setIdsucursalDefaultFK(int $idsucursalDefaultFK) {
		$this->idsucursalDefaultFK = $idsucursalDefaultFK;
	}

	public array $ejerciciosFK=array();

	public function getejerciciosFK():array {
		return $this->ejerciciosFK;
	}

	public function setejerciciosFK(array $ejerciciosFK) {
		$this->ejerciciosFK = $ejerciciosFK;
	}

	public int $idejercicioDefaultFK=-1;

	public function getIdejercicioDefaultFK():int {
		return $this->idejercicioDefaultFK;
	}

	public function setIdejercicioDefaultFK(int $idejercicioDefaultFK) {
		$this->idejercicioDefaultFK = $idejercicioDefaultFK;
	}

	public array $periodosFK=array();

	public function getperiodosFK():array {
		return $this->periodosFK;
	}

	public function setperiodosFK(array $periodosFK) {
		$this->periodosFK = $periodosFK;
	}

	public int $idperiodoDefaultFK=-1;

	public function getIdperiodoDefaultFK():int {
		return $this->idperiodoDefaultFK;
	}

	public function setIdperiodoDefaultFK(int $idperiodoDefaultFK) {
		$this->idperiodoDefaultFK = $idperiodoDefaultFK;
	}

	public array $usuariosFK=array();

	public function getusuariosFK():array {
		return $this->usuariosFK;
	}

	public function setusuariosFK(array $usuariosFK) {
		$this->usuariosFK = $usuariosFK;
	}

	public int $idusuarioDefaultFK=-1;

	public function getIdusuarioDefaultFK():int {
		return $this->idusuarioDefaultFK;
	}

	public function setIdusuarioDefaultFK(int $idusuarioDefaultFK) {
		$this->idusuarioDefaultFK = $idusuarioDefaultFK;
	}

	public array $clientesFK=array();

	public function getclientesFK():array {
		return $this->clientesFK;
	}

	public function setclientesFK(array $clientesFK) {
		$this->clientesFK = $clientesFK;
	}

	public int $idclienteDefaultFK=-1;

	public function getIdclienteDefaultFK():int {
		return $this->idclienteDefaultFK;
	}

	public function setIdclienteDefaultFK(int $idclienteDefaultFK) {
		$this->idclienteDefaultFK = $idclienteDefaultFK;
	}

	public array $vendedorsFK=array();

	public function getvendedorsFK():array {
		return $this->vendedorsFK;
	}

	public function setvendedorsFK(array $vendedorsFK) {
		$this->vendedorsFK = $vendedorsFK;
	}

	public int $idvendedorDefaultFK=-1;

	public function getIdvendedorDefaultFK():int {
		return $this->idvendedorDefaultFK;
	}

	public function setIdvendedorDefaultFK(int $idvendedorDefaultFK) {
		$this->idvendedorDefaultFK = $idvendedorDefaultFK;
	}

	public array $termino_pagosFK=array();

	public function gettermino_pagosFK():array {
		return $this->termino_pagosFK;
	}

	public function settermino_pagosFK(array $termino_pagosFK) {
		$this->termino_pagosFK = $termino_pagosFK;
	}

	public int $idtermino_pagoDefaultFK=-1;

	public function getIdtermino_pagoDefaultFK():int {
		return $this->idtermino_pagoDefaultFK;
	}

	public function setIdtermino_pagoDefaultFK(int $idtermino_pagoDefaultFK) {
		$this->idtermino_pagoDefaultFK = $idtermino_pagoDefaultFK;
	}

	public array $monedasFK=array();

	public function getmonedasFK():array {
		return $this->monedasFK;
	}

	public function setmonedasFK(array $monedasFK) {
		$this->monedasFK = $monedasFK;
	}

	public int $idmonedaDefaultFK=-1;

	public function getIdmonedaDefaultFK():int {
		return $this->idmonedaDefaultFK;
	}

	public function setIdmonedaDefaultFK(int $idmonedaDefaultFK) {
		$this->idmonedaDefaultFK = $idmonedaDefaultFK;
	}

	public array $estadosFK=array();

	public function getestadosFK():array {
		return $this->estadosFK;
	}

	public function setestadosFK(array $estadosFK) {
		$this->estadosFK = $estadosFK;
	}

	public int $idestadoDefaultFK=-1;

	public function getIdestadoDefaultFK():int {
		return $this->idestadoDefaultFK;
	}

	public function setIdestadoDefaultFK(int $idestadoDefaultFK) {
		$this->idestadoDefaultFK = $idestadoDefaultFK;
	}

	public array $asientosFK=array();

	public function getasientosFK():array {
		return $this->asientosFK;
	}

	public function setasientosFK(array $asientosFK) {
		$this->asientosFK = $asientosFK;
	}

	public int $idasientoDefaultFK=-1;

	public function getIdasientoDefaultFK():int {
		return $this->idasientoDefaultFK;
	}

	public function setIdasientoDefaultFK(int $idasientoDefaultFK) {
		$this->idasientoDefaultFK = $idasientoDefaultFK;
	}

	public array $documento_cuenta_cobrarsFK=array();

	public function getdocumento_cuenta_cobrarsFK():array {
		return $this->documento_cuenta_cobrarsFK;
	}

	public function setdocumento_cuenta_cobrarsFK(array $documento_cuenta_cobrarsFK) {
		$this->documento_cuenta_cobrarsFK = $documento_cuenta_cobrarsFK;
	}

	public int $iddocumento_cuenta_cobrarDefaultFK=-1;

	public function getIddocumento_cuenta_cobrarDefaultFK():int {
		return $this->iddocumento_cuenta_cobrarDefaultFK;
	}

	public function setIddocumento_cuenta_cobrarDefaultFK(int $iddocumento_cuenta_cobrarDefaultFK) {
		$this->iddocumento_cuenta_cobrarDefaultFK = $iddocumento_cuenta_cobrarDefaultFK;
	}

	public array $kardexsFK=array();

	public function getkardexsFK():array {
		return $this->kardexsFK;
	}

	public function setkardexsFK(array $kardexsFK) {
		$this->kardexsFK = $kardexsFK;
	}

	public int $idkardexDefaultFK=-1;

	public function getIdkardexDefaultFK():int {
		return $this->idkardexDefaultFK;
	}

	public function setIdkardexDefaultFK(int $idkardexDefaultFK) {
		$this->idkardexDefaultFK = $idkardexDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosfactura_lote_detalle='none';
	public $strTienePermisosfactura_modelo='none';
	
	
	public  $id_asientoFK_Idasiento=null;

	public  $id_clienteFK_Idcliente=null;

	public  $id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estadoFK_Idestado=null;

	public  $id_kardexFK_Idkardex=null;

	public  $id_monedaFK_Idmoneda=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_termino_pagoFK_Idtermino_pago=null;

	public  $id_usuarioFK_Idusuario=null;

	public  $id_vendedorFK_Idvendedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->factura_loteLogic==null) {
				$this->factura_loteLogic=new factura_lote_logic();
			}
			
		} else {
			if($this->factura_loteLogic==null) {
				$this->factura_loteLogic=new factura_lote_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->factura_loteClase==null) {
				$this->factura_loteClase=new factura_lote();
			}
			
			$this->factura_loteClase->setId(0);	
				
				
			$this->factura_loteClase->setid_empresa(-1);	
			$this->factura_loteClase->setid_sucursal(-1);	
			$this->factura_loteClase->setid_ejercicio(-1);	
			$this->factura_loteClase->setid_periodo(-1);	
			$this->factura_loteClase->setid_usuario(-1);	
			$this->factura_loteClase->setnumero('');	
			$this->factura_loteClase->setid_cliente(-1);	
			$this->factura_loteClase->setruc('');	
			$this->factura_loteClase->setreferencia_cliente('');	
			$this->factura_loteClase->setfecha_emision(date('Y-m-d'));	
			$this->factura_loteClase->setid_vendedor(-1);	
			$this->factura_loteClase->setid_termino_pago(-1);	
			$this->factura_loteClase->setfecha_vence(date('Y-m-d'));	
			$this->factura_loteClase->setcotizacion(0.0);	
			$this->factura_loteClase->setid_moneda(-1);	
			$this->factura_loteClase->setid_estado(-1);	
			$this->factura_loteClase->setdireccion('');	
			$this->factura_loteClase->setenviar_a('');	
			$this->factura_loteClase->setobservacion('');	
			$this->factura_loteClase->setimpuesto_en_precio(false);	
			$this->factura_loteClase->setsub_total(0.0);	
			$this->factura_loteClase->setdescuento_monto(0.0);	
			$this->factura_loteClase->setdescuento_porciento(0.0);	
			$this->factura_loteClase->setiva_monto(0.0);	
			$this->factura_loteClase->setiva_porciento(0.0);	
			$this->factura_loteClase->setretencion_fuente_monto(0.0);	
			$this->factura_loteClase->setretencion_fuente_porciento(0.0);	
			$this->factura_loteClase->setretencion_iva_monto(0.0);	
			$this->factura_loteClase->setretencion_iva_porciento(0.0);	
			$this->factura_loteClase->settotal(0.0);	
			$this->factura_loteClase->setotro_monto(0.0);	
			$this->factura_loteClase->setotro_porciento(0.0);	
			$this->factura_loteClase->sethora(date('Y-m-d'));	
			$this->factura_loteClase->setretencion_ica_monto(0.0);	
			$this->factura_loteClase->setretencion_ica_porciento(0.0);	
			$this->factura_loteClase->setid_asiento(null);	
			$this->factura_loteClase->setid_documento_cuenta_cobrar(null);	
			$this->factura_loteClase->setid_kardex(null);	
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function actualizarEstadoCeldasBotones(string $strAccion,bool $bitGuardarCambiosEnLote=false,bool $bitEsMantenimientoRelacionado=false){
		$this->actualizarEstadoCeldasBotonesBase($strAccion,$bitGuardarCambiosEnLote,$bitEsMantenimientoRelacionado);
	}
	
	public function manejarRetornarExcepcion(Exception $e) {
		$this->manejarRetornarExcepcionBase($e);
	}
	
	public function cancelarControles() {			
		$this->cancelarControlesBase();
	}
	
	public function inicializarAuxiliares() {
		$this->inicializarAuxiliaresBase();				
	}
	
	public function inicializarMensajesTipo(string $tipo,$e=null) {
		$this->inicializarMensajesTipoBase($tipo,$e);
	}			
	
	public function prepararEjecutarMantenimiento() {
		$this->prepararEjecutarMantenimientoBase('factura_lote');
	}
	
	public function setTipoAction(string $action='INDEX') {		
		$this->setTipoActionBase($action);
	}
	
	public function cargarDatosCliente() {
		$this->cargarDatosClienteBase();
	}
	
	public function cargarParametrosPagina() {		
		$this->cargarParametrosPaginaBase();
	}
	
	public function cargarParametrosEventosTabla() {
		$this->cargarParametrosEventosTablaBase();
	}
	
	public function cargarParametrosReporte() {
		$this->cargarParametrosReporteBase('factura_lote');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('factura_lote');
	}
	
	public function actualizarControllerConReturnGeneral(factura_lote_param_return $factura_loteReturnGeneral) {
		if($factura_loteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesfactura_lotesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$factura_loteReturnGeneral->getsMensajeProceso();
		}
		
		if($factura_loteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$factura_loteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($factura_loteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$factura_loteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$factura_loteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($factura_loteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($factura_loteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$factura_loteReturnGeneral->getsFuncionJs();
		}
		
		if($factura_loteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(factura_lote_session $factura_lote_session){
		$this->strStyleDivArbol=$factura_lote_session->strStyleDivArbol;	
		$this->strStyleDivContent=$factura_lote_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$factura_lote_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$factura_lote_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$factura_lote_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$factura_lote_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$factura_lote_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(factura_lote_session $factura_lote_session){
		$factura_lote_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$factura_lote_session->strStyleDivHeader='display:none';			
		$factura_lote_session->strStyleDivContent='width:93%;height:100%';	
		$factura_lote_session->strStyleDivOpcionesBanner='display:none';	
		$factura_lote_session->strStyleDivExpandirColapsar='display:none';	
		$factura_lote_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(factura_lote_control $factura_lote_control_session){
		$this->idNuevo=$factura_lote_control_session->idNuevo;
		$this->factura_loteActual=$factura_lote_control_session->factura_loteActual;
		$this->factura_lote=$factura_lote_control_session->factura_lote;
		$this->factura_loteClase=$factura_lote_control_session->factura_loteClase;
		$this->factura_lotes=$factura_lote_control_session->factura_lotes;
		$this->factura_lotesEliminados=$factura_lote_control_session->factura_lotesEliminados;
		$this->factura_lote=$factura_lote_control_session->factura_lote;
		$this->factura_lotesReporte=$factura_lote_control_session->factura_lotesReporte;
		$this->factura_lotesSeleccionados=$factura_lote_control_session->factura_lotesSeleccionados;
		$this->arrOrderBy=$factura_lote_control_session->arrOrderBy;
		$this->arrOrderByRel=$factura_lote_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$factura_lote_control_session->arrHistoryWebs;
		$this->arrSessionBases=$factura_lote_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadfactura_lote=$factura_lote_control_session->strTypeOnLoadfactura_lote;
		$this->strTipoPaginaAuxiliarfactura_lote=$factura_lote_control_session->strTipoPaginaAuxiliarfactura_lote;
		$this->strTipoUsuarioAuxiliarfactura_lote=$factura_lote_control_session->strTipoUsuarioAuxiliarfactura_lote;	
		
		$this->bitEsPopup=$factura_lote_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$factura_lote_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$factura_lote_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$factura_lote_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$factura_lote_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$factura_lote_control_session->strSufijo;
		$this->bitEsRelaciones=$factura_lote_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$factura_lote_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$factura_lote_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$factura_lote_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$factura_lote_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$factura_lote_control_session->strTituloTabla;
		$this->strTituloPathPagina=$factura_lote_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$factura_lote_control_session->strTituloPathElementoActual;
		
		if($this->factura_loteLogic==null) {			
			$this->factura_loteLogic=new factura_lote_logic();
		}
		
		
		if($this->factura_loteClase==null) {
			$this->factura_loteClase=new factura_lote();	
		}
		
		$this->factura_loteLogic->setfactura_lote($this->factura_loteClase);
		
		
		if($this->factura_lotes==null) {
			$this->factura_lotes=array();	
		}
		
		$this->factura_loteLogic->setfactura_lotes($this->factura_lotes);
		
		
		$this->strTipoView=$factura_lote_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$factura_lote_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$factura_lote_control_session->datosCliente;
		$this->strAccionBusqueda=$factura_lote_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$factura_lote_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$factura_lote_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$factura_lote_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$factura_lote_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$factura_lote_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$factura_lote_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$factura_lote_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$factura_lote_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$factura_lote_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$factura_lote_control_session->strTipoPaginacion;
		$this->strTipoAccion=$factura_lote_control_session->strTipoAccion;
		$this->tiposReportes=$factura_lote_control_session->tiposReportes;
		$this->tiposReporte=$factura_lote_control_session->tiposReporte;
		$this->tiposAcciones=$factura_lote_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$factura_lote_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$factura_lote_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$factura_lote_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$factura_lote_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$factura_lote_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$factura_lote_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$factura_lote_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$factura_lote_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$factura_lote_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$factura_lote_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$factura_lote_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$factura_lote_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$factura_lote_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$factura_lote_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$factura_lote_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$factura_lote_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$factura_lote_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$factura_lote_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$factura_lote_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$factura_lote_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$factura_lote_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$factura_lote_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$factura_lote_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$factura_lote_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$factura_lote_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$factura_lote_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$factura_lote_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$factura_lote_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$factura_lote_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$factura_lote_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$factura_lote_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$factura_lote_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$factura_lote_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$factura_lote_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$factura_lote_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$factura_lote_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$factura_lote_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$factura_lote_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$factura_lote_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$factura_lote_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$factura_lote_control_session->resumenUsuarioActual;	
		$this->moduloActual=$factura_lote_control_session->moduloActual;	
		$this->opcionActual=$factura_lote_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$factura_lote_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$factura_lote_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
				
		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		$this->strStyleDivArbol=$factura_lote_session->strStyleDivArbol;	
		$this->strStyleDivContent=$factura_lote_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$factura_lote_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$factura_lote_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$factura_lote_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$factura_lote_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$factura_lote_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$factura_lote_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$factura_lote_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$factura_lote_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$factura_lote_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$factura_lote_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$factura_lote_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$factura_lote_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$factura_lote_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$factura_lote_control_session->strMensajeid_usuario;
		$this->strMensajenumero=$factura_lote_control_session->strMensajenumero;
		$this->strMensajeid_cliente=$factura_lote_control_session->strMensajeid_cliente;
		$this->strMensajeruc=$factura_lote_control_session->strMensajeruc;
		$this->strMensajereferencia_cliente=$factura_lote_control_session->strMensajereferencia_cliente;
		$this->strMensajefecha_emision=$factura_lote_control_session->strMensajefecha_emision;
		$this->strMensajeid_vendedor=$factura_lote_control_session->strMensajeid_vendedor;
		$this->strMensajeid_termino_pago=$factura_lote_control_session->strMensajeid_termino_pago;
		$this->strMensajefecha_vence=$factura_lote_control_session->strMensajefecha_vence;
		$this->strMensajecotizacion=$factura_lote_control_session->strMensajecotizacion;
		$this->strMensajeid_moneda=$factura_lote_control_session->strMensajeid_moneda;
		$this->strMensajeid_estado=$factura_lote_control_session->strMensajeid_estado;
		$this->strMensajedireccion=$factura_lote_control_session->strMensajedireccion;
		$this->strMensajeenviar_a=$factura_lote_control_session->strMensajeenviar_a;
		$this->strMensajeobservacion=$factura_lote_control_session->strMensajeobservacion;
		$this->strMensajeimpuesto_en_precio=$factura_lote_control_session->strMensajeimpuesto_en_precio;
		$this->strMensajesub_total=$factura_lote_control_session->strMensajesub_total;
		$this->strMensajedescuento_monto=$factura_lote_control_session->strMensajedescuento_monto;
		$this->strMensajedescuento_porciento=$factura_lote_control_session->strMensajedescuento_porciento;
		$this->strMensajeiva_monto=$factura_lote_control_session->strMensajeiva_monto;
		$this->strMensajeiva_porciento=$factura_lote_control_session->strMensajeiva_porciento;
		$this->strMensajeretencion_fuente_monto=$factura_lote_control_session->strMensajeretencion_fuente_monto;
		$this->strMensajeretencion_fuente_porciento=$factura_lote_control_session->strMensajeretencion_fuente_porciento;
		$this->strMensajeretencion_iva_monto=$factura_lote_control_session->strMensajeretencion_iva_monto;
		$this->strMensajeretencion_iva_porciento=$factura_lote_control_session->strMensajeretencion_iva_porciento;
		$this->strMensajetotal=$factura_lote_control_session->strMensajetotal;
		$this->strMensajeotro_monto=$factura_lote_control_session->strMensajeotro_monto;
		$this->strMensajeotro_porciento=$factura_lote_control_session->strMensajeotro_porciento;
		$this->strMensajehora=$factura_lote_control_session->strMensajehora;
		$this->strMensajeretencion_ica_monto=$factura_lote_control_session->strMensajeretencion_ica_monto;
		$this->strMensajeretencion_ica_porciento=$factura_lote_control_session->strMensajeretencion_ica_porciento;
		$this->strMensajeid_asiento=$factura_lote_control_session->strMensajeid_asiento;
		$this->strMensajeid_documento_cuenta_cobrar=$factura_lote_control_session->strMensajeid_documento_cuenta_cobrar;
		$this->strMensajeid_kardex=$factura_lote_control_session->strMensajeid_kardex;
			
		
		$this->empresasFK=$factura_lote_control_session->empresasFK;
		$this->idempresaDefaultFK=$factura_lote_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$factura_lote_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$factura_lote_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$factura_lote_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$factura_lote_control_session->idejercicioDefaultFK;
		$this->periodosFK=$factura_lote_control_session->periodosFK;
		$this->idperiodoDefaultFK=$factura_lote_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$factura_lote_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$factura_lote_control_session->idusuarioDefaultFK;
		$this->clientesFK=$factura_lote_control_session->clientesFK;
		$this->idclienteDefaultFK=$factura_lote_control_session->idclienteDefaultFK;
		$this->vendedorsFK=$factura_lote_control_session->vendedorsFK;
		$this->idvendedorDefaultFK=$factura_lote_control_session->idvendedorDefaultFK;
		$this->termino_pagosFK=$factura_lote_control_session->termino_pagosFK;
		$this->idtermino_pagoDefaultFK=$factura_lote_control_session->idtermino_pagoDefaultFK;
		$this->monedasFK=$factura_lote_control_session->monedasFK;
		$this->idmonedaDefaultFK=$factura_lote_control_session->idmonedaDefaultFK;
		$this->estadosFK=$factura_lote_control_session->estadosFK;
		$this->idestadoDefaultFK=$factura_lote_control_session->idestadoDefaultFK;
		$this->asientosFK=$factura_lote_control_session->asientosFK;
		$this->idasientoDefaultFK=$factura_lote_control_session->idasientoDefaultFK;
		$this->documento_cuenta_cobrarsFK=$factura_lote_control_session->documento_cuenta_cobrarsFK;
		$this->iddocumento_cuenta_cobrarDefaultFK=$factura_lote_control_session->iddocumento_cuenta_cobrarDefaultFK;
		$this->kardexsFK=$factura_lote_control_session->kardexsFK;
		$this->idkardexDefaultFK=$factura_lote_control_session->idkardexDefaultFK;
		
		
		$this->strVisibleFK_Idasiento=$factura_lote_control_session->strVisibleFK_Idasiento;
		$this->strVisibleFK_Idcliente=$factura_lote_control_session->strVisibleFK_Idcliente;
		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$factura_lote_control_session->strVisibleFK_Iddocumento_cuenta_cobrar;
		$this->strVisibleFK_Idejercicio=$factura_lote_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$factura_lote_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$factura_lote_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idkardex=$factura_lote_control_session->strVisibleFK_Idkardex;
		$this->strVisibleFK_Idmoneda=$factura_lote_control_session->strVisibleFK_Idmoneda;
		$this->strVisibleFK_Idperiodo=$factura_lote_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$factura_lote_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtermino_pago=$factura_lote_control_session->strVisibleFK_Idtermino_pago;
		$this->strVisibleFK_Idusuario=$factura_lote_control_session->strVisibleFK_Idusuario;
		$this->strVisibleFK_Idvendedor=$factura_lote_control_session->strVisibleFK_Idvendedor;
		
		
		$this->strTienePermisosfactura_lote_detalle=$factura_lote_control_session->strTienePermisosfactura_lote_detalle;
		$this->strTienePermisosfactura_modelo=$factura_lote_control_session->strTienePermisosfactura_modelo;
		
		
		$this->id_asientoFK_Idasiento=$factura_lote_control_session->id_asientoFK_Idasiento;
		$this->id_clienteFK_Idcliente=$factura_lote_control_session->id_clienteFK_Idcliente;
		$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=$factura_lote_control_session->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar;
		$this->id_ejercicioFK_Idejercicio=$factura_lote_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$factura_lote_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$factura_lote_control_session->id_estadoFK_Idestado;
		$this->id_kardexFK_Idkardex=$factura_lote_control_session->id_kardexFK_Idkardex;
		$this->id_monedaFK_Idmoneda=$factura_lote_control_session->id_monedaFK_Idmoneda;
		$this->id_periodoFK_Idperiodo=$factura_lote_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$factura_lote_control_session->id_sucursalFK_Idsucursal;
		$this->id_termino_pagoFK_Idtermino_pago=$factura_lote_control_session->id_termino_pagoFK_Idtermino_pago;
		$this->id_usuarioFK_Idusuario=$factura_lote_control_session->id_usuarioFK_Idusuario;
		$this->id_vendedorFK_Idvendedor=$factura_lote_control_session->id_vendedorFK_Idvendedor;

		
		
		
		/*ACTUALIZA CON PARAMETROS ACTUALES*/
		$this->cargarParamsPostAccion();
		
		$this->cargarParametrosReporte();
		/*ACTUALIZA CON PARAMETROS ACTUALES*/
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function getidNuevo() : int {
		return $this->idNuevo;
	}

	public function setidNuevo(int $idNuevo) {
		$this->idNuevo = $idNuevo;
	}
	
	public function getfactura_loteControllerAdditional() {
		return $this->factura_loteControllerAdditional;
	}

	public function setfactura_loteControllerAdditional($factura_loteControllerAdditional) {
		$this->factura_loteControllerAdditional = $factura_loteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getfactura_loteActual() : factura_lote {
		return $this->factura_loteActual;
	}

	public function setfactura_loteActual(factura_lote $factura_loteActual) {
		$this->factura_loteActual = $factura_loteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidfactura_lote() : int {
		return $this->idfactura_lote;
	}

	public function setidfactura_lote(int $idfactura_lote) {
		$this->idfactura_lote = $idfactura_lote;
	}
	
	public function getfactura_lote() : factura_lote {
		return $this->factura_lote;
	}

	public function setfactura_lote(factura_lote $factura_lote) {
		$this->factura_lote = $factura_lote;
	}
		
	public function getfactura_loteLogic() : factura_lote_logic {		
		return $this->factura_loteLogic;
	}

	public function setfactura_loteLogic(factura_lote_logic $factura_loteLogic) {
		$this->factura_loteLogic = $factura_loteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getfactura_lotesModel() {		
		try {						
			/*factura_lotesModel.setWrappedData(factura_loteLogic->getfactura_lotes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->factura_lotesModel;
	}
	
	public function setfactura_lotesModel($factura_lotesModel) {
		$this->factura_lotesModel = $factura_lotesModel;
	}
	
	public function getfactura_lotes() : array {		
		return $this->factura_lotes;
	}
	
	public function setfactura_lotes(array $factura_lotes) {
		$this->factura_lotes= $factura_lotes;
	}
	
	public function getfactura_lotesEliminados() : array {		
		return $this->factura_lotesEliminados;
	}
	
	public function setfactura_lotesEliminados(array $factura_lotesEliminados) {
		$this->factura_lotesEliminados= $factura_lotesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getfactura_loteActualFromListDataModel() {
		try {
			/*$factura_loteClase= $this->factura_lotesModel->getRowData();*/
			
			/*return $factura_lote;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
