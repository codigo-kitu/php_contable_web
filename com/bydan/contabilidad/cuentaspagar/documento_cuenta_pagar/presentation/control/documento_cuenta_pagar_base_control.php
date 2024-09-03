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

namespace com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/documento_cuenta_pagar/util/documento_cuenta_pagar_carga.php');
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_param_return;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\logic\documento_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\session\documento_cuenta_pagar_session;


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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic\forma_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL


use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\presentation\session\imagen_documento_cuenta_pagar_session;

use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;
use com\bydan\contabilidad\inventario\devolucion\presentation\session\devolucion_session;


/*CARGA ARCHIVOS FRAMEWORK*/
documento_cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
documento_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class documento_cuenta_pagar_base_control extends documento_cuenta_pagar_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->documento_cuenta_pagarClase==null) {		
				$this->documento_cuenta_pagarClase=new documento_cuenta_pagar();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_sucursal',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ejercicio',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_periodo',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_usuario',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_forma_pago_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_forma_pago_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_corriente',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->documento_cuenta_pagarClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->documento_cuenta_pagarClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->documento_cuenta_pagarClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->documento_cuenta_pagarClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->documento_cuenta_pagarClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->documento_cuenta_pagarClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->documento_cuenta_pagarClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->documento_cuenta_pagarClase->setnumero($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero'));
				
				$this->documento_cuenta_pagarClase->setid_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor'));
				
				$this->documento_cuenta_pagarClase->settipo($this->getDataCampoFormTabla('form'.$this->strSufijo,'tipo'));
				
				$this->documento_cuenta_pagarClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->documento_cuenta_pagarClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->documento_cuenta_pagarClase->setmonto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto'));
				
				$this->documento_cuenta_pagarClase->setmonto_parcial((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto_parcial'));
				
				$this->documento_cuenta_pagarClase->setmoneda($this->getDataCampoFormTabla('form'.$this->strSufijo,'moneda'));
				
				$this->documento_cuenta_pagarClase->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_vence')));
				
				$this->documento_cuenta_pagarClase->setnumero_de_pagos((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_de_pagos'));
				
				$this->documento_cuenta_pagarClase->setbalance((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'balance'));
				
				$this->documento_cuenta_pagarClase->setbalance_mon((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'balance_mon'));
				
				$this->documento_cuenta_pagarClase->setnumero_pagado($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_pagado'));
				
				$this->documento_cuenta_pagarClase->setid_pagado((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_pagado'));
				
				$this->documento_cuenta_pagarClase->setmodulo_origen($this->getDataCampoFormTabla('form'.$this->strSufijo,'modulo_origen'));
				
				$this->documento_cuenta_pagarClase->setid_origen((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_origen'));
				
				$this->documento_cuenta_pagarClase->setmodulo_destino($this->getDataCampoFormTabla('form'.$this->strSufijo,'modulo_destino'));
				
				$this->documento_cuenta_pagarClase->setid_destino((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_destino'));
				
				$this->documento_cuenta_pagarClase->setnombre_pc($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_pc'));
				
				$this->documento_cuenta_pagarClase->sethora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'hora')));
				
				$this->documento_cuenta_pagarClase->setmonto_mora((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto_mora'));
				
				$this->documento_cuenta_pagarClase->setinteres_mora((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'interes_mora'));
				
				$this->documento_cuenta_pagarClase->setdias_gracia_mora((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'dias_gracia_mora'));
				
				$this->documento_cuenta_pagarClase->setinstrumento_pago($this->getDataCampoFormTabla('form'.$this->strSufijo,'instrumento_pago'));
				
				$this->documento_cuenta_pagarClase->settipo_cambio((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'tipo_cambio'));
				
				$this->documento_cuenta_pagarClase->setnro_documento_proveedor($this->getDataCampoFormTabla('form'.$this->strSufijo,'nro_documento_proveedor'));
				
				$this->documento_cuenta_pagarClase->setclase_registro($this->getDataCampoFormTabla('form'.$this->strSufijo,'clase_registro'));
				
				$this->documento_cuenta_pagarClase->setestado_registro($this->getDataCampoFormTabla('form'.$this->strSufijo,'estado_registro'));
				
				$this->documento_cuenta_pagarClase->setmotivo_anulacion($this->getDataCampoFormTabla('form'.$this->strSufijo,'motivo_anulacion'));
				
				$this->documento_cuenta_pagarClase->setimpuesto_1((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto_1'));
				
				$this->documento_cuenta_pagarClase->setimpuesto_2((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto_2'));
				
				$this->documento_cuenta_pagarClase->setimpuesto_incluido(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto_incluido')));
				
				$this->documento_cuenta_pagarClase->setobservaciones($this->getDataCampoFormTabla('form'.$this->strSufijo,'observaciones'));
				
				$this->documento_cuenta_pagarClase->setgrupo_pago($this->getDataCampoFormTabla('form'.$this->strSufijo,'grupo_pago'));
				
				$this->documento_cuenta_pagarClase->settermino_idpv((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'termino_idpv'));
				
				$this->documento_cuenta_pagarClase->setid_forma_pago_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_forma_pago_proveedor'));
				
				$this->documento_cuenta_pagarClase->setnro_pago($this->getDataCampoFormTabla('form'.$this->strSufijo,'nro_pago'));
				
				$this->documento_cuenta_pagarClase->setreferencia_pago($this->getDataCampoFormTabla('form'.$this->strSufijo,'referencia_pago'));
				
				$this->documento_cuenta_pagarClase->setfecha_hora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_hora')));
				
				$this->documento_cuenta_pagarClase->setid_base((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_base'));
				
				$this->documento_cuenta_pagarClase->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->documento_cuenta_pagarModel->set($this->documento_cuenta_pagarClase);
				
				/*$this->documento_cuenta_pagarModel->set($this->migrarModeldocumento_cuenta_pagar($this->documento_cuenta_pagarClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setId($this->documento_cuenta_pagarClase->getId());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setVersionRow($this->documento_cuenta_pagarClase->getVersionRow());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setVersionRow($this->documento_cuenta_pagarClase->getVersionRow());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_empresa($this->documento_cuenta_pagarClase->getid_empresa());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_sucursal($this->documento_cuenta_pagarClase->getid_sucursal());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_ejercicio($this->documento_cuenta_pagarClase->getid_ejercicio());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_periodo($this->documento_cuenta_pagarClase->getid_periodo());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_usuario($this->documento_cuenta_pagarClase->getid_usuario());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setnumero($this->documento_cuenta_pagarClase->getnumero());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_proveedor($this->documento_cuenta_pagarClase->getid_proveedor());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->settipo($this->documento_cuenta_pagarClase->gettipo());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setfecha_emision($this->documento_cuenta_pagarClase->getfecha_emision());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setdescripcion($this->documento_cuenta_pagarClase->getdescripcion());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setmonto($this->documento_cuenta_pagarClase->getmonto());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setmonto_parcial($this->documento_cuenta_pagarClase->getmonto_parcial());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setmoneda($this->documento_cuenta_pagarClase->getmoneda());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setfecha_vence($this->documento_cuenta_pagarClase->getfecha_vence());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setnumero_de_pagos($this->documento_cuenta_pagarClase->getnumero_de_pagos());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setbalance($this->documento_cuenta_pagarClase->getbalance());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setbalance_mon($this->documento_cuenta_pagarClase->getbalance_mon());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setnumero_pagado($this->documento_cuenta_pagarClase->getnumero_pagado());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_pagado($this->documento_cuenta_pagarClase->getid_pagado());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setmodulo_origen($this->documento_cuenta_pagarClase->getmodulo_origen());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_origen($this->documento_cuenta_pagarClase->getid_origen());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setmodulo_destino($this->documento_cuenta_pagarClase->getmodulo_destino());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_destino($this->documento_cuenta_pagarClase->getid_destino());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setnombre_pc($this->documento_cuenta_pagarClase->getnombre_pc());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->sethora($this->documento_cuenta_pagarClase->gethora());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setmonto_mora($this->documento_cuenta_pagarClase->getmonto_mora());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setinteres_mora($this->documento_cuenta_pagarClase->getinteres_mora());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setdias_gracia_mora($this->documento_cuenta_pagarClase->getdias_gracia_mora());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setinstrumento_pago($this->documento_cuenta_pagarClase->getinstrumento_pago());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->settipo_cambio($this->documento_cuenta_pagarClase->gettipo_cambio());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setnro_documento_proveedor($this->documento_cuenta_pagarClase->getnro_documento_proveedor());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setclase_registro($this->documento_cuenta_pagarClase->getclase_registro());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setestado_registro($this->documento_cuenta_pagarClase->getestado_registro());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setmotivo_anulacion($this->documento_cuenta_pagarClase->getmotivo_anulacion());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setimpuesto_1($this->documento_cuenta_pagarClase->getimpuesto_1());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setimpuesto_2($this->documento_cuenta_pagarClase->getimpuesto_2());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setimpuesto_incluido($this->documento_cuenta_pagarClase->getimpuesto_incluido());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setobservaciones($this->documento_cuenta_pagarClase->getobservaciones());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setgrupo_pago($this->documento_cuenta_pagarClase->getgrupo_pago());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->settermino_idpv($this->documento_cuenta_pagarClase->gettermino_idpv());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_forma_pago_proveedor($this->documento_cuenta_pagarClase->getid_forma_pago_proveedor());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setnro_pago($this->documento_cuenta_pagarClase->getnro_pago());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setreferencia_pago($this->documento_cuenta_pagarClase->getreferencia_pago());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setfecha_hora($this->documento_cuenta_pagarClase->getfecha_hora());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_base($this->documento_cuenta_pagarClase->getid_base());	
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setid_cuenta_corriente($this->documento_cuenta_pagarClase->getid_cuenta_corriente());	
		} else {
			$this->documento_cuenta_pagarClase->setId($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getId());	
			$this->documento_cuenta_pagarClase->setVersionRow($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getVersionRow());	
			$this->documento_cuenta_pagarClase->setVersionRow($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getVersionRow());	
			$this->documento_cuenta_pagarClase->setid_empresa($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_empresa());	
			$this->documento_cuenta_pagarClase->setid_sucursal($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_sucursal());	
			$this->documento_cuenta_pagarClase->setid_ejercicio($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_ejercicio());	
			$this->documento_cuenta_pagarClase->setid_periodo($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_periodo());	
			$this->documento_cuenta_pagarClase->setid_usuario($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_usuario());	
			$this->documento_cuenta_pagarClase->setnumero($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getnumero());	
			$this->documento_cuenta_pagarClase->setid_proveedor($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_proveedor());	
			$this->documento_cuenta_pagarClase->settipo($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->gettipo());	
			$this->documento_cuenta_pagarClase->setfecha_emision($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getfecha_emision());	
			$this->documento_cuenta_pagarClase->setdescripcion($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getdescripcion());	
			$this->documento_cuenta_pagarClase->setmonto($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getmonto());	
			$this->documento_cuenta_pagarClase->setmonto_parcial($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getmonto_parcial());	
			$this->documento_cuenta_pagarClase->setmoneda($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getmoneda());	
			$this->documento_cuenta_pagarClase->setfecha_vence($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getfecha_vence());	
			$this->documento_cuenta_pagarClase->setnumero_de_pagos($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getnumero_de_pagos());	
			$this->documento_cuenta_pagarClase->setbalance($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getbalance());	
			$this->documento_cuenta_pagarClase->setbalance_mon($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getbalance_mon());	
			$this->documento_cuenta_pagarClase->setnumero_pagado($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getnumero_pagado());	
			$this->documento_cuenta_pagarClase->setid_pagado($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_pagado());	
			$this->documento_cuenta_pagarClase->setmodulo_origen($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getmodulo_origen());	
			$this->documento_cuenta_pagarClase->setid_origen($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_origen());	
			$this->documento_cuenta_pagarClase->setmodulo_destino($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getmodulo_destino());	
			$this->documento_cuenta_pagarClase->setid_destino($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_destino());	
			$this->documento_cuenta_pagarClase->setnombre_pc($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getnombre_pc());	
			$this->documento_cuenta_pagarClase->sethora($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->gethora());	
			$this->documento_cuenta_pagarClase->setmonto_mora($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getmonto_mora());	
			$this->documento_cuenta_pagarClase->setinteres_mora($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getinteres_mora());	
			$this->documento_cuenta_pagarClase->setdias_gracia_mora($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getdias_gracia_mora());	
			$this->documento_cuenta_pagarClase->setinstrumento_pago($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getinstrumento_pago());	
			$this->documento_cuenta_pagarClase->settipo_cambio($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->gettipo_cambio());	
			$this->documento_cuenta_pagarClase->setnro_documento_proveedor($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getnro_documento_proveedor());	
			$this->documento_cuenta_pagarClase->setclase_registro($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getclase_registro());	
			$this->documento_cuenta_pagarClase->setestado_registro($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getestado_registro());	
			$this->documento_cuenta_pagarClase->setmotivo_anulacion($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getmotivo_anulacion());	
			$this->documento_cuenta_pagarClase->setimpuesto_1($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getimpuesto_1());	
			$this->documento_cuenta_pagarClase->setimpuesto_2($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getimpuesto_2());	
			$this->documento_cuenta_pagarClase->setimpuesto_incluido($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getimpuesto_incluido());	
			$this->documento_cuenta_pagarClase->setobservaciones($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getobservaciones());	
			$this->documento_cuenta_pagarClase->setgrupo_pago($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getgrupo_pago());	
			$this->documento_cuenta_pagarClase->settermino_idpv($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->gettermino_idpv());	
			$this->documento_cuenta_pagarClase->setid_forma_pago_proveedor($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_forma_pago_proveedor());	
			$this->documento_cuenta_pagarClase->setnro_pago($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getnro_pago());	
			$this->documento_cuenta_pagarClase->setreferencia_pago($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getreferencia_pago());	
			$this->documento_cuenta_pagarClase->setfecha_hora($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getfecha_hora());	
			$this->documento_cuenta_pagarClase->setid_base($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_base());	
			$this->documento_cuenta_pagarClase->setid_cuenta_corriente($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getid_cuenta_corriente());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->documento_cuenta_pagarModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_sucursal') {$this->strMensajeid_sucursal=$strMensajeCampo;}
		if($strNombreCampo=='id_ejercicio') {$this->strMensajeid_ejercicio=$strMensajeCampo;}
		if($strNombreCampo=='id_periodo') {$this->strMensajeid_periodo=$strMensajeCampo;}
		if($strNombreCampo=='id_usuario') {$this->strMensajeid_usuario=$strMensajeCampo;}
		if($strNombreCampo=='numero') {$this->strMensajenumero=$strMensajeCampo;}
		if($strNombreCampo=='id_proveedor') {$this->strMensajeid_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='tipo') {$this->strMensajetipo=$strMensajeCampo;}
		if($strNombreCampo=='fecha_emision') {$this->strMensajefecha_emision=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='monto') {$this->strMensajemonto=$strMensajeCampo;}
		if($strNombreCampo=='monto_parcial') {$this->strMensajemonto_parcial=$strMensajeCampo;}
		if($strNombreCampo=='moneda') {$this->strMensajemoneda=$strMensajeCampo;}
		if($strNombreCampo=='fecha_vence') {$this->strMensajefecha_vence=$strMensajeCampo;}
		if($strNombreCampo=='numero_de_pagos') {$this->strMensajenumero_de_pagos=$strMensajeCampo;}
		if($strNombreCampo=='balance') {$this->strMensajebalance=$strMensajeCampo;}
		if($strNombreCampo=='balance_mon') {$this->strMensajebalance_mon=$strMensajeCampo;}
		if($strNombreCampo=='numero_pagado') {$this->strMensajenumero_pagado=$strMensajeCampo;}
		if($strNombreCampo=='id_pagado') {$this->strMensajeid_pagado=$strMensajeCampo;}
		if($strNombreCampo=='modulo_origen') {$this->strMensajemodulo_origen=$strMensajeCampo;}
		if($strNombreCampo=='id_origen') {$this->strMensajeid_origen=$strMensajeCampo;}
		if($strNombreCampo=='modulo_destino') {$this->strMensajemodulo_destino=$strMensajeCampo;}
		if($strNombreCampo=='id_destino') {$this->strMensajeid_destino=$strMensajeCampo;}
		if($strNombreCampo=='nombre_pc') {$this->strMensajenombre_pc=$strMensajeCampo;}
		if($strNombreCampo=='hora') {$this->strMensajehora=$strMensajeCampo;}
		if($strNombreCampo=='monto_mora') {$this->strMensajemonto_mora=$strMensajeCampo;}
		if($strNombreCampo=='interes_mora') {$this->strMensajeinteres_mora=$strMensajeCampo;}
		if($strNombreCampo=='dias_gracia_mora') {$this->strMensajedias_gracia_mora=$strMensajeCampo;}
		if($strNombreCampo=='instrumento_pago') {$this->strMensajeinstrumento_pago=$strMensajeCampo;}
		if($strNombreCampo=='tipo_cambio') {$this->strMensajetipo_cambio=$strMensajeCampo;}
		if($strNombreCampo=='nro_documento_proveedor') {$this->strMensajenro_documento_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='clase_registro') {$this->strMensajeclase_registro=$strMensajeCampo;}
		if($strNombreCampo=='estado_registro') {$this->strMensajeestado_registro=$strMensajeCampo;}
		if($strNombreCampo=='motivo_anulacion') {$this->strMensajemotivo_anulacion=$strMensajeCampo;}
		if($strNombreCampo=='impuesto_1') {$this->strMensajeimpuesto_1=$strMensajeCampo;}
		if($strNombreCampo=='impuesto_2') {$this->strMensajeimpuesto_2=$strMensajeCampo;}
		if($strNombreCampo=='impuesto_incluido') {$this->strMensajeimpuesto_incluido=$strMensajeCampo;}
		if($strNombreCampo=='observaciones') {$this->strMensajeobservaciones=$strMensajeCampo;}
		if($strNombreCampo=='grupo_pago') {$this->strMensajegrupo_pago=$strMensajeCampo;}
		if($strNombreCampo=='termino_idpv') {$this->strMensajetermino_idpv=$strMensajeCampo;}
		if($strNombreCampo=='id_forma_pago_proveedor') {$this->strMensajeid_forma_pago_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='nro_pago') {$this->strMensajenro_pago=$strMensajeCampo;}
		if($strNombreCampo=='referencia_pago') {$this->strMensajereferencia_pago=$strMensajeCampo;}
		if($strNombreCampo=='fecha_hora') {$this->strMensajefecha_hora=$strMensajeCampo;}
		if($strNombreCampo=='id_base') {$this->strMensajeid_base=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_corriente') {$this->strMensajeid_cuenta_corriente=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajenumero='';
		$this->strMensajeid_proveedor='';
		$this->strMensajetipo='';
		$this->strMensajefecha_emision='';
		$this->strMensajedescripcion='';
		$this->strMensajemonto='';
		$this->strMensajemonto_parcial='';
		$this->strMensajemoneda='';
		$this->strMensajefecha_vence='';
		$this->strMensajenumero_de_pagos='';
		$this->strMensajebalance='';
		$this->strMensajebalance_mon='';
		$this->strMensajenumero_pagado='';
		$this->strMensajeid_pagado='';
		$this->strMensajemodulo_origen='';
		$this->strMensajeid_origen='';
		$this->strMensajemodulo_destino='';
		$this->strMensajeid_destino='';
		$this->strMensajenombre_pc='';
		$this->strMensajehora='';
		$this->strMensajemonto_mora='';
		$this->strMensajeinteres_mora='';
		$this->strMensajedias_gracia_mora='';
		$this->strMensajeinstrumento_pago='';
		$this->strMensajetipo_cambio='';
		$this->strMensajenro_documento_proveedor='';
		$this->strMensajeclase_registro='';
		$this->strMensajeestado_registro='';
		$this->strMensajemotivo_anulacion='';
		$this->strMensajeimpuesto_1='';
		$this->strMensajeimpuesto_2='';
		$this->strMensajeimpuesto_incluido='';
		$this->strMensajeobservaciones='';
		$this->strMensajegrupo_pago='';
		$this->strMensajetermino_idpv='';
		$this->strMensajeid_forma_pago_proveedor='';
		$this->strMensajenro_pago='';
		$this->strMensajereferencia_pago='';
		$this->strMensajefecha_hora='';
		$this->strMensajeid_base='';
		$this->strMensajeid_cuenta_corriente='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			*/
			
			$this->manejarRetornarExcepcion($e);
			throw $e;
		}
	}
	
	public function actualizar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$documento_cuenta_pagar_session=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME));
						
			if($documento_cuenta_pagar_session==null) {
				$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
			}
			
			if(!$this->bitEsnuevo){ 
				$this->ejecutarMantenimiento(MaintenanceType::$ACTUALIZAR);
				
				if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {
					$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);					
					
				} else {
					$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
				}
				
			} else { 
				$this->nuevo();
				
				if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {
					$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);					
					
					if($this->bitPostAccionNuevo) {
						$this->bitEsnuevo=true;
					}
				} else {
					$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
				}
			}						
					
			
			
			if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {				
				$this->strVisibleTablaElementos='table-row';
				$this->strVisibleTablaAcciones='table-row';	
				
			} else {
				/*OCULTA CAMPOS Y ACCIONES*/
				$this->cancelarControles();
			}
			
			
			if($this->bitPostAccionSinCerrar) {
				$id=$this->getDataFormId();
					
				if($id!=null && $id>0) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->documento_cuenta_pagarLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->documento_cuenta_pagarActual =$this->documento_cuenta_pagarClase;
			
			/*$this->documento_cuenta_pagarActual =$this->migrarModeldocumento_cuenta_pagar($this->documento_cuenta_pagarClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars(),$this->documento_cuenta_pagarActual);
			
			$this->actualizarControllerConReturnGeneral($this->documento_cuenta_pagarReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->getNewConnexionToDeep();
			}


			if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
				$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR);
			
			} else {
				$this->eliminarTabla($idActual);
			}
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR',null);			
		
			$this->procesarPostAccion("form",MaintenanceType::$ELIMINAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$documento_cuenta_pagarsLocal=$this->getListaActual();
		
		$iIndice=documento_cuenta_pagar_util::getIndiceNuevo($documento_cuenta_pagarsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(documento_cuenta_pagar $documento_cuenta_pagar,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$documento_cuenta_pagarsLocal=$this->getListaActual();
		
		$iIndice=documento_cuenta_pagar_util::getIndiceActual($documento_cuenta_pagarsLocal,$documento_cuenta_pagar,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevodocumento_cuenta_pagar')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->documento_cuenta_pagarActual =$this->documento_cuenta_pagarClase;
			
			/*$this->documento_cuenta_pagarActual =$this->migrarModeldocumento_cuenta_pagar($this->documento_cuenta_pagarClase);*/
			
			$this->cancelarControles();
			
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function ejecutarMantenimiento(string $maintenanceType){
		
		try {
			
			$this->cargarDatosCliente();		
			
			$this->documento_cuenta_pagarLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('forma_pago_proveedor');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
			
			$this->documento_cuenta_pagarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->documento_cuenta_pagarLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->documento_cuenta_pagarLogic->setdocumento_cuenta_pagar(new documento_cuenta_pagar());
				
				$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setIsNew(true);
				$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setIsChanged(true);
				$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->documento_cuenta_pagarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->documento_cuenta_pagarLogic->documento_cuenta_pagars[]=$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->documento_cuenta_pagarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagendocumentocuentapagars=unserialize($this->Session->read(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$imagendocumentocuentapagarsEliminados=unserialize($this->Session->read(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagendocumentocuentapagars=array_merge($imagendocumentocuentapagars,$imagendocumentocuentapagarsEliminados);
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);
							
							$this->documento_cuenta_pagarLogic->saveRelaciones($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar(),$ordencompras,$imagendocumentocuentapagars,$devolucions);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setIsChanged(true);
				$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setIsNew(false);
				$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->documento_cuenta_pagarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar(),$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->documento_cuenta_pagarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagendocumentocuentapagars=unserialize($this->Session->read(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$imagendocumentocuentapagarsEliminados=unserialize($this->Session->read(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagendocumentocuentapagars=array_merge($imagendocumentocuentapagars,$imagendocumentocuentapagarsEliminados);
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);
							
							$this->documento_cuenta_pagarLogic->saveRelaciones($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar(),$ordencompras,$imagendocumentocuentapagars,$devolucions);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setIsDeleted(true);
				$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setIsNew(false);
				$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setIsChanged(false);				
				
				$this->actualizarLista($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar(),$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->documento_cuenta_pagarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);

							foreach($ordencompras as $ordencompra1) {
								$ordencompra1->setIsDeleted(true);
							}
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagendocumentocuentapagars=unserialize($this->Session->read(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$imagendocumentocuentapagarsEliminados=unserialize($this->Session->read(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagendocumentocuentapagars=array_merge($imagendocumentocuentapagars,$imagendocumentocuentapagarsEliminados);

							foreach($imagendocumentocuentapagars as $imagendocumentocuentapagar1) {
								$imagendocumentocuentapagar1->setIsDeleted(true);
							}
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);

							foreach($devolucions as $devolucion1) {
								$devolucion1->setIsDeleted(true);
							}
							
						$this->documento_cuenta_pagarLogic->saveRelaciones($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar(),$ordencompras,$imagendocumentocuentapagars,$devolucions);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->documento_cuenta_pagarsEliminados[]=$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->documento_cuenta_pagarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagendocumentocuentapagars=unserialize($this->Session->read(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$imagendocumentocuentapagarsEliminados=unserialize($this->Session->read(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagendocumentocuentapagars=array_merge($imagendocumentocuentapagars,$imagendocumentocuentapagarsEliminados);
							documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);
							
						$this->documento_cuenta_pagarLogic->saveRelaciones($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar(),$ordencompras,$imagendocumentocuentapagars,$devolucions);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->documento_cuenta_pagarsEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->documento_cuenta_pagarLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->documento_cuenta_pagarLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->documento_cuenta_pagarsEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('forma_pago_proveedor');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->documento_cuenta_pagarLogic->setdocumento_cuenta_pagars();*/
					
					$this->documento_cuenta_pagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->documento_cuenta_pagarLogic->setIsConDeepLoad(false);
			
			$this->documento_cuenta_pagars=$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(documento_cuenta_pagar_util::$STR_SESSION_NAME.'Lista',serialize($this->documento_cuenta_pagars));
				$this->Session->write(documento_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->documento_cuenta_pagarsEliminados));
			}
			
			if($class!=null);
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function eliminarTabla(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);			
		}
	}
	
	public function eliminarTablaBase(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			/*
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginaldocumento_cuenta_pagar;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->documento_cuenta_pagarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->documento_cuenta_pagars as $documento_cuenta_pagarLocal) {
				if($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->getId()==$documento_cuenta_pagarLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar()->setIsDeleted(true);
			$this->documento_cuenta_pagarsEliminados[]=$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->documento_cuenta_pagars[$indice]);
				
				$this->documento_cuenta_pagars = array_values($this->documento_cuenta_pagars);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModeldocumento_cuenta_pagar($this->documento_cuenta_pagarClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(documento_cuenta_pagar $documento_cuenta_pagar,array $documento_cuenta_pagars) {
		try {
			foreach($documento_cuenta_pagars as $documento_cuenta_pagarLocal){ 
				if($documento_cuenta_pagarLocal->getId()==$documento_cuenta_pagar->getId()) {
					$documento_cuenta_pagarLocal->setIsChanged($documento_cuenta_pagar->getIsChanged());
					$documento_cuenta_pagarLocal->setIsNew($documento_cuenta_pagar->getIsNew());
					$documento_cuenta_pagarLocal->setIsDeleted($documento_cuenta_pagar->getIsDeleted());
					//$documento_cuenta_pagarLocal->setbitExpired($documento_cuenta_pagar->getbitExpired());
					
					$documento_cuenta_pagarLocal->setId($documento_cuenta_pagar->getId());	
					$documento_cuenta_pagarLocal->setVersionRow($documento_cuenta_pagar->getVersionRow());	
					$documento_cuenta_pagarLocal->setVersionRow($documento_cuenta_pagar->getVersionRow());	
					$documento_cuenta_pagarLocal->setid_empresa($documento_cuenta_pagar->getid_empresa());	
					$documento_cuenta_pagarLocal->setid_sucursal($documento_cuenta_pagar->getid_sucursal());	
					$documento_cuenta_pagarLocal->setid_ejercicio($documento_cuenta_pagar->getid_ejercicio());	
					$documento_cuenta_pagarLocal->setid_periodo($documento_cuenta_pagar->getid_periodo());	
					$documento_cuenta_pagarLocal->setid_usuario($documento_cuenta_pagar->getid_usuario());	
					$documento_cuenta_pagarLocal->setnumero($documento_cuenta_pagar->getnumero());	
					$documento_cuenta_pagarLocal->setid_proveedor($documento_cuenta_pagar->getid_proveedor());	
					$documento_cuenta_pagarLocal->settipo($documento_cuenta_pagar->gettipo());	
					$documento_cuenta_pagarLocal->setfecha_emision($documento_cuenta_pagar->getfecha_emision());	
					$documento_cuenta_pagarLocal->setdescripcion($documento_cuenta_pagar->getdescripcion());	
					$documento_cuenta_pagarLocal->setmonto($documento_cuenta_pagar->getmonto());	
					$documento_cuenta_pagarLocal->setmonto_parcial($documento_cuenta_pagar->getmonto_parcial());	
					$documento_cuenta_pagarLocal->setmoneda($documento_cuenta_pagar->getmoneda());	
					$documento_cuenta_pagarLocal->setfecha_vence($documento_cuenta_pagar->getfecha_vence());	
					$documento_cuenta_pagarLocal->setnumero_de_pagos($documento_cuenta_pagar->getnumero_de_pagos());	
					$documento_cuenta_pagarLocal->setbalance($documento_cuenta_pagar->getbalance());	
					$documento_cuenta_pagarLocal->setbalance_mon($documento_cuenta_pagar->getbalance_mon());	
					$documento_cuenta_pagarLocal->setnumero_pagado($documento_cuenta_pagar->getnumero_pagado());	
					$documento_cuenta_pagarLocal->setid_pagado($documento_cuenta_pagar->getid_pagado());	
					$documento_cuenta_pagarLocal->setmodulo_origen($documento_cuenta_pagar->getmodulo_origen());	
					$documento_cuenta_pagarLocal->setid_origen($documento_cuenta_pagar->getid_origen());	
					$documento_cuenta_pagarLocal->setmodulo_destino($documento_cuenta_pagar->getmodulo_destino());	
					$documento_cuenta_pagarLocal->setid_destino($documento_cuenta_pagar->getid_destino());	
					$documento_cuenta_pagarLocal->setnombre_pc($documento_cuenta_pagar->getnombre_pc());	
					$documento_cuenta_pagarLocal->sethora($documento_cuenta_pagar->gethora());	
					$documento_cuenta_pagarLocal->setmonto_mora($documento_cuenta_pagar->getmonto_mora());	
					$documento_cuenta_pagarLocal->setinteres_mora($documento_cuenta_pagar->getinteres_mora());	
					$documento_cuenta_pagarLocal->setdias_gracia_mora($documento_cuenta_pagar->getdias_gracia_mora());	
					$documento_cuenta_pagarLocal->setinstrumento_pago($documento_cuenta_pagar->getinstrumento_pago());	
					$documento_cuenta_pagarLocal->settipo_cambio($documento_cuenta_pagar->gettipo_cambio());	
					$documento_cuenta_pagarLocal->setnro_documento_proveedor($documento_cuenta_pagar->getnro_documento_proveedor());	
					$documento_cuenta_pagarLocal->setclase_registro($documento_cuenta_pagar->getclase_registro());	
					$documento_cuenta_pagarLocal->setestado_registro($documento_cuenta_pagar->getestado_registro());	
					$documento_cuenta_pagarLocal->setmotivo_anulacion($documento_cuenta_pagar->getmotivo_anulacion());	
					$documento_cuenta_pagarLocal->setimpuesto_1($documento_cuenta_pagar->getimpuesto_1());	
					$documento_cuenta_pagarLocal->setimpuesto_2($documento_cuenta_pagar->getimpuesto_2());	
					$documento_cuenta_pagarLocal->setimpuesto_incluido($documento_cuenta_pagar->getimpuesto_incluido());	
					$documento_cuenta_pagarLocal->setobservaciones($documento_cuenta_pagar->getobservaciones());	
					$documento_cuenta_pagarLocal->setgrupo_pago($documento_cuenta_pagar->getgrupo_pago());	
					$documento_cuenta_pagarLocal->settermino_idpv($documento_cuenta_pagar->gettermino_idpv());	
					$documento_cuenta_pagarLocal->setid_forma_pago_proveedor($documento_cuenta_pagar->getid_forma_pago_proveedor());	
					$documento_cuenta_pagarLocal->setnro_pago($documento_cuenta_pagar->getnro_pago());	
					$documento_cuenta_pagarLocal->setreferencia_pago($documento_cuenta_pagar->getreferencia_pago());	
					$documento_cuenta_pagarLocal->setfecha_hora($documento_cuenta_pagar->getfecha_hora());	
					$documento_cuenta_pagarLocal->setid_base($documento_cuenta_pagar->getid_base());	
					$documento_cuenta_pagarLocal->setid_cuenta_corriente($documento_cuenta_pagar->getid_cuenta_corriente());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$documento_cuenta_pagarsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$documento_cuenta_pagarsLocal=$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$documento_cuenta_pagarsLocal=$this->documento_cuenta_pagars;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $documento_cuenta_pagarsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars() as $documento_cuenta_pagar) {
				if($documento_cuenta_pagar->getId()==$id) {
					$this->documento_cuenta_pagarLogic->setdocumento_cuenta_pagar($documento_cuenta_pagar);
					
					break;
				}
			}				
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
		}
	}
	
	public function seleccionarActualAuxiliar(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*NO FUNCIONA AQUI, SINO EN search.php
			$this->strFuncionBusquedaRapida=str_replace('TO_REPLACE',$id,$this->strFuncionBusquedaRapida);*/
			
					
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setSeleccionars(int $maxima_fila) {
		/*$documento_cuenta_pagarsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->documento_cuenta_pagars as $documento_cuenta_pagar) {
			$documento_cuenta_pagar->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->documento_cuenta_pagars[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : documento_cuenta_pagar_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$documento_cuenta_pagar_session=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME));
						
		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
		
		
		$this->documento_cuenta_pagarReturnGeneral=new documento_cuenta_pagar_param_return();
		$this->documento_cuenta_pagarParameterGeneral=new documento_cuenta_pagar_param_return();
			
		$this->documento_cuenta_pagarParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualdocumento_cuenta_pagar(this.documento_cuenta_pagar,true);
			this.setVariablesFormularioToObjetoActualForeignKeysdocumento_cuenta_pagar(this.documento_cuenta_pagar);*/
			
			if($documento_cuenta_pagar_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualdocumento_cuenta_pagar(this.documento_cuenta_pagar,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->documento_cuenta_pagarActual=$this->documento_cuenta_pagarClase;
				
				$this->setCopiarVariablesObjetos($this->documento_cuenta_pagarActual,$this->documento_cuenta_pagar,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->documento_cuenta_pagarReturnGeneral=$this->documento_cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars(),$this->documento_cuenta_pagar,$this->documento_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($documento_cuenta_pagar_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeandocumento_cuenta_pagar($classes,$this->documento_cuenta_pagarReturnGeneral,$this->documento_cuenta_pagarBean,false);*/
				}
					
				if($this->documento_cuenta_pagarReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->documento_cuenta_pagarReturnGeneral->getdocumento_cuenta_pagar(),$this->documento_cuenta_pagarActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeydocumento_cuenta_pagar($this->documento_cuenta_pagarReturnGeneral->getdocumento_cuenta_pagar());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariodocumento_cuenta_pagar($this->documento_cuenta_pagarReturnGeneral->getdocumento_cuenta_pagar());*/
				}
					
				if($this->documento_cuenta_pagarReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->documento_cuenta_pagarReturnGeneral->getdocumento_cuenta_pagar(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->documento_cuenta_pagar,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(documento_cuenta_pagarJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualdocumento_cuenta_pagar(this.documento_cuenta_pagar,true);
				this.setVariablesFormularioToObjetoActualForeignKeysdocumento_cuenta_pagar(this.documento_cuenta_pagar);				
			}
			*/
		} else {
			/*
			//AUN_NO
			//MANEJAR EN TABLA
			
			if((($controlTipo==ControlTipo::$TEXTBOX || $controlTipo==ControlTipo::$DATE
				|| $controlTipo==ControlTipo::$TEXTAREA || $controlTipo==ControlTipo::$COMBOBOX
				)				
				&& $eventoTipo==EventoTipo::$CHANGE
				)
				
				|| ($controlTipo==ControlTipo::$CHECKBOX && $eventoTipo==EventoTipo::$CLIC)
				
			) { // && sTipoGeneral.equals("TEXTBOX")
				
				if($this->documento_cuenta_pagarAnterior!=null) {
					$this->documento_cuenta_pagar=$this->documento_cuenta_pagarAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->documento_cuenta_pagarReturnGeneral=$this->documento_cuenta_pagarLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars(),$this->documento_cuenta_pagar,$this->documento_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->documento_cuenta_pagarReturnGeneral->getdocumento_cuenta_pagar(),$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars());
			*/
		}
		
		return $this->documento_cuenta_pagarReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$this->documento_cuenta_pagarReturnGeneral=new documento_cuenta_pagar_param_return();			
			$this->documento_cuenta_pagarParameterGeneral=new documento_cuenta_pagar_param_return();
			
			$this->documento_cuenta_pagarParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->documento_cuenta_pagarReturnGeneral=$this->documento_cuenta_pagarLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->documento_cuenta_pagars,$this->documento_cuenta_pagarParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->documento_cuenta_pagarReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->documento_cuenta_pagarReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->documento_cuenta_pagarReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
			
			/*throw $e;*/
      	}
		
		return $return_json;
	}
	
	public function manejarEventos(string $sTipoControl,string $sTipoEvento) {		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		$this->documento_cuenta_pagarReturnGeneral=new documento_cuenta_pagar_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_documento_cuenta_pagar') {
		    $sDominio='documento_cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->documento_cuenta_pagarReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->documento_cuenta_pagarReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='documento_cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='documento_cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='documento_cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->documento_cuenta_pagarReturnGeneral=new documento_cuenta_pagar_param_return();
		$this->documento_cuenta_pagarParameterGeneral=new documento_cuenta_pagar_param_return();
			
		$this->documento_cuenta_pagarParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->documento_cuenta_pagarReturnGeneral=$this->documento_cuenta_pagarLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars(),$this->documento_cuenta_pagar,$this->documento_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->documento_cuenta_pagarReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->documento_cuenta_pagarReturnGeneral->getdocumento_cuenta_pagar(),$classes);*/
		}									
	
		if($this->documento_cuenta_pagarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->documento_cuenta_pagarReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->documento_cuenta_pagarReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $documento_cuenta_pagars,documento_cuenta_pagar $documento_cuenta_pagar) {
		
		$documento_cuenta_pagar_session=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME));
						
		if($documento_cuenta_pagar_session==null) {
			$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(documento_cuenta_pagar_util::$CLASSNAME);
			}	
			*/
			
			$this->documento_cuenta_pagarReturnGeneral=new documento_cuenta_pagar_param_return();
			$this->documento_cuenta_pagarParameterGeneral=new documento_cuenta_pagar_param_return();
			
			$this->documento_cuenta_pagarParameterGeneral->setdata($this->data);
		
		
			
		if($documento_cuenta_pagar_session->conGuardarRelaciones) {
			$classes=documento_cuenta_pagar_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->documento_cuenta_pagarActual,$this->documento_cuenta_pagar,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->documento_cuenta_pagarReturnGeneral=$this->documento_cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars(),$this->documento_cuenta_pagarActual,$this->documento_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->documento_cuenta_pagarReturnGeneral=$this->documento_cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$documento_cuenta_pagars,$documento_cuenta_pagar,$this->documento_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModeldocumento_cuenta_pagar($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar());*/
			
			$this->documento_cuenta_pagar=$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagar();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->documento_cuenta_pagar);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$documento_cuenta_pagarActual=new documento_cuenta_pagar();
			
			if($this->documento_cuenta_pagarClase==null) {		
				$this->documento_cuenta_pagarClase=new documento_cuenta_pagar();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$documento_cuenta_pagarActual=$this->documento_cuenta_pagars[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->settipo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setmonto_parcial((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setmoneda($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setnumero_de_pagos((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setbalance_mon((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setnumero_pagado($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_pagado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setmodulo_origen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_origen((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setmodulo_destino($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_destino((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setnombre_pc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->sethora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setmonto_mora((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setinteres_mora((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setdias_gracia_mora((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setinstrumento_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->settipo_cambio((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setnro_documento_proveedor($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setclase_registro($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setestado_registro($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_35'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setmotivo_anulacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setimpuesto_1((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_37'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setimpuesto_2((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setimpuesto_incluido(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_39')));  } else { $documento_cuenta_pagarActual->setimpuesto_incluido(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setobservaciones($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setgrupo_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_41'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_42','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->settermino_idpv((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_42'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_43','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_forma_pago_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_43'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_44','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setnro_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_44'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_45','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setreferencia_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_45'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_46','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setfecha_hora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_46')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_47','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_base((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_47'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_48','t'.$this->strSufijo)) {  $documento_cuenta_pagarActual->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_48'));  }

				$this->documento_cuenta_pagarClase=$documento_cuenta_pagarActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->documento_cuenta_pagarModel->set($this->documento_cuenta_pagarClase);
				
				/*$this->documento_cuenta_pagarModel->set($this->migrarModeldocumento_cuenta_pagar($this->documento_cuenta_pagarClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->documento_cuenta_pagars=$this->migrarModeldocumento_cuenta_pagar($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars());							
		$this->documento_cuenta_pagars=$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars();*/
		
			if(!$this->bitEsBusqueda) {
				$this->htmlTabla=$this->setHtmlTablaDatos();
			} else {
				$this->htmlTabla=$this->setHtmlTablaDatosParaBusqueda();
			}
		
		if($bitConRetrurnAjax==true) {			
			//$this->returnAjax();
		}		
	}
	
	public function returnAjax() {
		$this->returnAjaxBase();
	}
	
	public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession) {								
		/*$this->activarSession();*/
		
		if($bitSaveSession==true) {			
			$this->Session->write(documento_cuenta_pagar_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$documento_cuenta_pagar_control_session=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($documento_cuenta_pagar_control_session==null) {
				$documento_cuenta_pagar_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($documento_cuenta_pagar_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(documento_cuenta_pagar_util::$STR_SESSION_NAME,$this);*/
		} else {
			$documento_cuenta_pagar_session=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME));
			
			if($documento_cuenta_pagar_session==null) {
				$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
			}
			
			$this->set(documento_cuenta_pagar_util::$STR_SESSION_NAME, $documento_cuenta_pagar_session);
		}
	}
	
	public function setCopiarVariablesObjetos(documento_cuenta_pagar $documento_cuenta_pagarOrigen,documento_cuenta_pagar $documento_cuenta_pagar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($documento_cuenta_pagar==null) {
				$documento_cuenta_pagar=new documento_cuenta_pagar();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getId()!=null && $documento_cuenta_pagarOrigen->getId()!=0)) {$documento_cuenta_pagar->setId($documento_cuenta_pagarOrigen->getId());}}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getnumero()!=null && $documento_cuenta_pagarOrigen->getnumero()!='')) {$documento_cuenta_pagar->setnumero($documento_cuenta_pagarOrigen->getnumero());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getid_proveedor()!=null && $documento_cuenta_pagarOrigen->getid_proveedor()!=-1)) {$documento_cuenta_pagar->setid_proveedor($documento_cuenta_pagarOrigen->getid_proveedor());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->gettipo()!=null && $documento_cuenta_pagarOrigen->gettipo()!='')) {$documento_cuenta_pagar->settipo($documento_cuenta_pagarOrigen->gettipo());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getfecha_emision()!=null && $documento_cuenta_pagarOrigen->getfecha_emision()!=date('Y-m-d'))) {$documento_cuenta_pagar->setfecha_emision($documento_cuenta_pagarOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getdescripcion()!=null && $documento_cuenta_pagarOrigen->getdescripcion()!='')) {$documento_cuenta_pagar->setdescripcion($documento_cuenta_pagarOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getmonto()!=null && $documento_cuenta_pagarOrigen->getmonto()!=0.0)) {$documento_cuenta_pagar->setmonto($documento_cuenta_pagarOrigen->getmonto());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getmonto_parcial()!=null && $documento_cuenta_pagarOrigen->getmonto_parcial()!=0.0)) {$documento_cuenta_pagar->setmonto_parcial($documento_cuenta_pagarOrigen->getmonto_parcial());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getmoneda()!=null && $documento_cuenta_pagarOrigen->getmoneda()!='')) {$documento_cuenta_pagar->setmoneda($documento_cuenta_pagarOrigen->getmoneda());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getfecha_vence()!=null && $documento_cuenta_pagarOrigen->getfecha_vence()!=date('Y-m-d'))) {$documento_cuenta_pagar->setfecha_vence($documento_cuenta_pagarOrigen->getfecha_vence());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getnumero_de_pagos()!=null && $documento_cuenta_pagarOrigen->getnumero_de_pagos()!=0)) {$documento_cuenta_pagar->setnumero_de_pagos($documento_cuenta_pagarOrigen->getnumero_de_pagos());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getbalance()!=null && $documento_cuenta_pagarOrigen->getbalance()!=0.0)) {$documento_cuenta_pagar->setbalance($documento_cuenta_pagarOrigen->getbalance());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getbalance_mon()!=null && $documento_cuenta_pagarOrigen->getbalance_mon()!=0.0)) {$documento_cuenta_pagar->setbalance_mon($documento_cuenta_pagarOrigen->getbalance_mon());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getnumero_pagado()!=null && $documento_cuenta_pagarOrigen->getnumero_pagado()!='')) {$documento_cuenta_pagar->setnumero_pagado($documento_cuenta_pagarOrigen->getnumero_pagado());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getid_pagado()!=null && $documento_cuenta_pagarOrigen->getid_pagado()!=0)) {$documento_cuenta_pagar->setid_pagado($documento_cuenta_pagarOrigen->getid_pagado());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getmodulo_origen()!=null && $documento_cuenta_pagarOrigen->getmodulo_origen()!='')) {$documento_cuenta_pagar->setmodulo_origen($documento_cuenta_pagarOrigen->getmodulo_origen());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getid_origen()!=null && $documento_cuenta_pagarOrigen->getid_origen()!=0)) {$documento_cuenta_pagar->setid_origen($documento_cuenta_pagarOrigen->getid_origen());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getmodulo_destino()!=null && $documento_cuenta_pagarOrigen->getmodulo_destino()!='')) {$documento_cuenta_pagar->setmodulo_destino($documento_cuenta_pagarOrigen->getmodulo_destino());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getid_destino()!=null && $documento_cuenta_pagarOrigen->getid_destino()!=0)) {$documento_cuenta_pagar->setid_destino($documento_cuenta_pagarOrigen->getid_destino());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getnombre_pc()!=null && $documento_cuenta_pagarOrigen->getnombre_pc()!='')) {$documento_cuenta_pagar->setnombre_pc($documento_cuenta_pagarOrigen->getnombre_pc());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->gethora()!=null && $documento_cuenta_pagarOrigen->gethora()!=date('Y-m-d'))) {$documento_cuenta_pagar->sethora($documento_cuenta_pagarOrigen->gethora());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getmonto_mora()!=null && $documento_cuenta_pagarOrigen->getmonto_mora()!=0.0)) {$documento_cuenta_pagar->setmonto_mora($documento_cuenta_pagarOrigen->getmonto_mora());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getinteres_mora()!=null && $documento_cuenta_pagarOrigen->getinteres_mora()!=0.0)) {$documento_cuenta_pagar->setinteres_mora($documento_cuenta_pagarOrigen->getinteres_mora());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getdias_gracia_mora()!=null && $documento_cuenta_pagarOrigen->getdias_gracia_mora()!=0)) {$documento_cuenta_pagar->setdias_gracia_mora($documento_cuenta_pagarOrigen->getdias_gracia_mora());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getinstrumento_pago()!=null && $documento_cuenta_pagarOrigen->getinstrumento_pago()!='')) {$documento_cuenta_pagar->setinstrumento_pago($documento_cuenta_pagarOrigen->getinstrumento_pago());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->gettipo_cambio()!=null && $documento_cuenta_pagarOrigen->gettipo_cambio()!=0.0)) {$documento_cuenta_pagar->settipo_cambio($documento_cuenta_pagarOrigen->gettipo_cambio());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getnro_documento_proveedor()!=null && $documento_cuenta_pagarOrigen->getnro_documento_proveedor()!='')) {$documento_cuenta_pagar->setnro_documento_proveedor($documento_cuenta_pagarOrigen->getnro_documento_proveedor());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getclase_registro()!=null && $documento_cuenta_pagarOrigen->getclase_registro()!='')) {$documento_cuenta_pagar->setclase_registro($documento_cuenta_pagarOrigen->getclase_registro());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getestado_registro()!=null && $documento_cuenta_pagarOrigen->getestado_registro()!='')) {$documento_cuenta_pagar->setestado_registro($documento_cuenta_pagarOrigen->getestado_registro());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getmotivo_anulacion()!=null && $documento_cuenta_pagarOrigen->getmotivo_anulacion()!='')) {$documento_cuenta_pagar->setmotivo_anulacion($documento_cuenta_pagarOrigen->getmotivo_anulacion());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getimpuesto_1()!=null && $documento_cuenta_pagarOrigen->getimpuesto_1()!=0.0)) {$documento_cuenta_pagar->setimpuesto_1($documento_cuenta_pagarOrigen->getimpuesto_1());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getimpuesto_2()!=null && $documento_cuenta_pagarOrigen->getimpuesto_2()!=0.0)) {$documento_cuenta_pagar->setimpuesto_2($documento_cuenta_pagarOrigen->getimpuesto_2());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getimpuesto_incluido()!=null && $documento_cuenta_pagarOrigen->getimpuesto_incluido()!=false)) {$documento_cuenta_pagar->setimpuesto_incluido($documento_cuenta_pagarOrigen->getimpuesto_incluido());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getobservaciones()!=null && $documento_cuenta_pagarOrigen->getobservaciones()!='')) {$documento_cuenta_pagar->setobservaciones($documento_cuenta_pagarOrigen->getobservaciones());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getgrupo_pago()!=null && $documento_cuenta_pagarOrigen->getgrupo_pago()!='')) {$documento_cuenta_pagar->setgrupo_pago($documento_cuenta_pagarOrigen->getgrupo_pago());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->gettermino_idpv()!=null && $documento_cuenta_pagarOrigen->gettermino_idpv()!=0)) {$documento_cuenta_pagar->settermino_idpv($documento_cuenta_pagarOrigen->gettermino_idpv());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getid_forma_pago_proveedor()!=null && $documento_cuenta_pagarOrigen->getid_forma_pago_proveedor()!=-1)) {$documento_cuenta_pagar->setid_forma_pago_proveedor($documento_cuenta_pagarOrigen->getid_forma_pago_proveedor());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getnro_pago()!=null && $documento_cuenta_pagarOrigen->getnro_pago()!='')) {$documento_cuenta_pagar->setnro_pago($documento_cuenta_pagarOrigen->getnro_pago());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getreferencia_pago()!=null && $documento_cuenta_pagarOrigen->getreferencia_pago()!='')) {$documento_cuenta_pagar->setreferencia_pago($documento_cuenta_pagarOrigen->getreferencia_pago());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getfecha_hora()!=null && $documento_cuenta_pagarOrigen->getfecha_hora()!=date('Y-m-d'))) {$documento_cuenta_pagar->setfecha_hora($documento_cuenta_pagarOrigen->getfecha_hora());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getid_base()!=null && $documento_cuenta_pagarOrigen->getid_base()!=0)) {$documento_cuenta_pagar->setid_base($documento_cuenta_pagarOrigen->getid_base());}
			if($conDefault || ($conDefault==false && $documento_cuenta_pagarOrigen->getid_cuenta_corriente()!=null && $documento_cuenta_pagarOrigen->getid_cuenta_corriente()!=-1)) {$documento_cuenta_pagar->setid_cuenta_corriente($documento_cuenta_pagarOrigen->getid_cuenta_corriente());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$documento_cuenta_pagarsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$documento_cuenta_pagarsSeleccionados[]=$this->documento_cuenta_pagars[$indice];
			}
		}
		
		return $documento_cuenta_pagarsSeleccionados;
	}
	
	public function getIdsFksSeleccionados(int $maxima_fila) : array {
		$IdsFksSeleccionados=array();
		$checkbox_id=0;
		//$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			//$indice=$i-1;
			
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$IdsFksSeleccionados[]=$checkbox_id;
			}
		}
		
		return $IdsFksSeleccionados;
	}
	
	public function quitarRelaciones() {	
		$documento_cuenta_pagar= new documento_cuenta_pagar();
		
		foreach($this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars() as $documento_cuenta_pagar) {
			
		$documento_cuenta_pagar->ordencompras=array();
		$documento_cuenta_pagar->imagendocumentocuentapagars=array();
		$documento_cuenta_pagar->devolucions=array();
		}		
		
		if($documento_cuenta_pagar!=null);
	}
	
	public function cargarRelaciones(array $documento_cuenta_pagars=array()) : array {	
		
		$documento_cuenta_pagarsRespaldo = array();
		$documento_cuenta_pagarsLocal = array();
		
		documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$documento_cuenta_pagarsResp=array();
		$classes=array();
			
		
				$class=new Classe('orden_compra'); 	$classes[]=$class;
				$class=new Classe('imagen_documento_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('devolucion'); 	$classes[]=$class;
			
			
		$documento_cuenta_pagarsRespaldo=$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars();
			
		$this->documento_cuenta_pagarLogic->setIsConDeep(true);
		
		$this->documento_cuenta_pagarLogic->setdocumento_cuenta_pagars($documento_cuenta_pagars);
			
		$this->documento_cuenta_pagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$documento_cuenta_pagarsLocal=$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars();
			
		/*RESPALDO*/
		$this->documento_cuenta_pagarLogic->setdocumento_cuenta_pagars($documento_cuenta_pagarsRespaldo);
			
		$this->documento_cuenta_pagarLogic->setIsConDeep(false);
		
		if($documento_cuenta_pagarsResp!=null);
		
		return $documento_cuenta_pagarsLocal;
	}
	
	public function quitarRelacionesReporte() {
		try {			
			
			//PARA QUE NO GENERE ERROR EN SESSION
			$this->cargarRelaciones(array());
			
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->quitarRelaciones();
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(documento_cuenta_pagar_session $documento_cuenta_pagar_session) {
		$documento_cuenta_pagar_session->strTypeOnLoad=$this->strTypeOnLoaddocumento_cuenta_pagar;
		$documento_cuenta_pagar_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliardocumento_cuenta_pagar;
		$documento_cuenta_pagar_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliardocumento_cuenta_pagar;
		$documento_cuenta_pagar_session->bitEsPopup=$this->bitEsPopup;
		$documento_cuenta_pagar_session->bitEsBusqueda=$this->bitEsBusqueda;
		$documento_cuenta_pagar_session->strFuncionJs=$this->strFuncionJs;
		/*$documento_cuenta_pagar_session->strSufijo=$this->strSufijo;*/
		$documento_cuenta_pagar_session->bitEsRelaciones=$this->bitEsRelaciones;
		$documento_cuenta_pagar_session->bitEsRelacionado=$this->bitEsRelacionado;
	}
	
	public function setPermisosUsuarioConPermiso(string $strPermiso) {
		$this->setPermisosUsuarioConPermisoBase($strPermiso);
	}
	
	public function setPermisosMantenimientoUsuarioConPermiso(string $strPermiso) {
		$this->setPermisosMantenimientoUsuarioConPermisoBase($strPermiso);
	}
	
	public function setPermisosUsuario() {
		$perfilOpcionUsuario=null;
		$perfilOpcionUsuario=new perfil_opcion();		
					
		if(Constantes::$CON_LLAMADA_SIMPLE) {
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, documento_cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false);				
		} else {
			$perfilOpcionUsuario=$this->sistemaReturnGeneral->getPerfilOpcionUsuario();
		}
		
		if($perfilOpcionUsuario!=null && $perfilOpcionUsuario->getId()>0) {
			$this->strPermisoNuevo=(($perfilOpcionUsuario->getingreso() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoActualizar=(($perfilOpcionUsuario->getmodificacion() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoActualizarOriginal=$this->strPermisoActualizar;
			$this->strPermisoEliminar=(($perfilOpcionUsuario->geteliminacion() || $perfilOpcionUsuario->gettodo()) ? 'table-cell':'none'  );//con table-row en tabla se descuadra
			$this->strPermisoConsulta=(($perfilOpcionUsuario->getconsulta() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 			
			$this->strPermisoTodo=(($perfilOpcionUsuario->gettodo() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoReporte=(($perfilOpcionUsuario->getreporte() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			
			if($perfilOpcionUsuario->getingreso() || $perfilOpcionUsuario->getmodificacion() || $perfilOpcionUsuario->geteliminacion() || $perfilOpcionUsuario->gettodo()) {
				$this->strPermisoGuardar='table-row';
			} else {
				$this->strPermisoGuardar='none';
			}
			
			if(!$this->bitEsRelacionado) {
				$this->strPermisoBusqueda=(($perfilOpcionUsuario->getbusqueda() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			} else {
				$this->strPermisoBusqueda='none';
			}
			
		} else {
			$this->setPermisosUsuarioConPermiso('none');
		}
		
		/*SI SE NECESITA PONER TODOS LOS PERMISOS POR DEFECTO*/
		//$this->setPermisosUsuarioConPermiso('table-row');		
	}
	
	public function setAccionesUsuario() {
		//$accionUsuario=null;
		$accionesUsuario=array();		
					
		if(Constantes::$CON_LLAMADA_SIMPLE) {
			$accionesUsuario=$this->sistemaLogicAdditional->traerAccionesPaginaWebPerfilOpcion($this->usuarioActual, 0 ,false);				
		} else {
			$accionesUsuario=$this->sistemaReturnGeneral->getAccionesUsuario();
		}
		
		if($accionesUsuario!=null) {
			foreach($accionesUsuario as $accion)	{
				$this->tiposAcciones[]=$accion->getnombre();
			}
		}				
	}
	
	/*Todo,ActualizarOriginal,Consulta,Busqueda,Reporte*/
	public function inicializarPermisos() {
		$this->inicializarPermisosBase();
	}
	
	public function inicializarSetPermisosUsuarioClasesRelacionadas() {
		if(!Constantes::$CON_LLAMADA_SIMPLE) {
			

			$this->strTienePermisosorden_compra='none';
			$this->strTienePermisosorden_compra=((Funciones::existeCadenaArray(orden_compra_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosorden_compra='table-cell';

			$this->strTienePermisosimagen_documento_cuenta_pagar='none';
			$this->strTienePermisosimagen_documento_cuenta_pagar=((Funciones::existeCadenaArray(imagen_documento_cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosimagen_documento_cuenta_pagar='table-cell';

			$this->strTienePermisosdevolucion='none';
			$this->strTienePermisosdevolucion=((Funciones::existeCadenaArray(devolucion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdevolucion='table-cell';
		} else {
			

			$this->strTienePermisosorden_compra='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosorden_compra=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, orden_compra_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosorden_compra='table-cell';

			$this->strTienePermisosimagen_documento_cuenta_pagar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosimagen_documento_cuenta_pagar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, imagen_documento_cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosimagen_documento_cuenta_pagar='table-cell';

			$this->strTienePermisosdevolucion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdevolucion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, devolucion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdevolucion='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$documento_cuenta_pagarViewAdditional=new documento_cuenta_pagarView_add();
		$documento_cuenta_pagarViewAdditional->documento_cuenta_pagars=$this->documento_cuenta_pagars;
		$documento_cuenta_pagarViewAdditional->Session=$this->Session;
		
		return $documento_cuenta_pagarViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$documento_cuenta_pagarsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$documento_cuenta_pagarsLocal=$this->documento_cuenta_pagars;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$documento_cuenta_pagarsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($documento_cuenta_pagarsLocal)<=0) {
					$documento_cuenta_pagarsLocal=$this->documento_cuenta_pagars;
				}
			} else {
				$documento_cuenta_pagarsLocal=$this->documento_cuenta_pagars;
			}
		}
						
		
		$classes=array();
		$style_tabla='width:100%;margin: 0 0 0 0px;';//height: 100%;
		/*overflow:auto;*/
		$style_div='width:100%;height: 300px; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;
		
		$class_cabecera='';
		$class_table=Constantes::$CSS_CLASS_TABLE;
		//$class_table=' class="'.Constantes::$CSS_CLASS_TABLE.'" ';
		
		
		if(!$paraReporte) {
			
			if(Constantes::$STR_TIPO_TABLA=='normal') {
				$class_cabecera='cabeceratabla';
				$class_table='';
			}
			
			if($this->bitConAltoMaximoTabla==true) {
				$style_div='width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;			
			}
			
		} else {			
			$class_cabecera='cabeceratabla';
			$class_table='reporte';
			$style_tabla='';
			$style_div='width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;	
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$documento_cuenta_pagarLogic=new documento_cuenta_pagar_logic();
		$documento_cuenta_pagarLogic->setdocumento_cuenta_pagars($this->documento_cuenta_pagars);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}

		$imagen_documento_cuenta_pagar_session=unserialize($this->Session->read(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME));

		if($imagen_documento_cuenta_pagar_session==null) {
			$imagen_documento_cuenta_pagar_session=new imagen_documento_cuenta_pagar_session();
		}

		$devolucion_session=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME));

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('forma_pago_proveedor');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$documento_cuenta_pagarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->documento_cuenta_pagars=$documento_cuenta_pagarLogic->getdocumento_cuenta_pagars();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->documento_cuenta_pagarsLocal=$this->documento_cuenta_pagars;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=documento_cuenta_pagar_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=documento_cuenta_pagar_util::$STR_TABLE_NAME;		
			
		$this->classes=$classes;
		$this->style_tabla=$style_tabla;
		$this->style_div=$style_div;
		$this->class_cabecera=$class_cabecera;
		$this->class_table=$class_table;		
		$this->proceso_print=$proceso_print;
		
		//PARA TEMPLATE JS
		

		if($this->bitConEditar==false || $paraReporte) {
			/*|| $this->bitConEditar==true*/


		} else {
			
		
			//TEMPLATING
			$funciones = new FuncionesObject();
			
			$funciones->arrOrderBy = $this->arrOrderBy;
			$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
			
			$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
			$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
			$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
			$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
			
			$documento_cuenta_pagars = $this->documento_cuenta_pagars;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = documento_cuenta_pagar_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = documento_cuenta_pagar_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/documento_cuenta_pagar_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->documento_cuenta_pagars=$documento_cuenta_pagars;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->documento_cuenta_pagarsLocal=$documento_cuenta_pagarsLocal;
			$template->classes=$classes;
			$template->style_tabla=$style_tabla;
			$template->style_div=$style_div;
			$template->class_cabecera=$class_cabecera;
			$template->class_table=$class_table;		
			$template->proceso_print=$proceso_print;
			
			$htmlTablaLocal=$template->render_html();
			
			//TEMPLATING
		
		
		
			
			if($this->strSufijo!='') {
				$htmlTablaLocal=str_replace('id="t-','id="t'.$this->strSufijo.'-',$htmlTablaLocal);
				$htmlTablaLocal=str_replace('name="t-','name="t'.$this->strSufijo.'-',$htmlTablaLocal);
				
				$htmlTablaLocal=str_replace('id="chb_t-cel','id="chb_t'.$this->strSufijo.'-cel',$htmlTablaLocal);
				$htmlTablaLocal=str_replace('name="chb_t-cel','name="chb_t'.$this->strSufijo.'-cel',$htmlTablaLocal);
			}
		}
		
		if(!$paraReporte) {
			$this->htmlTabla=$htmlTablaLocal;
		
		} else {
			
			/*
			$this->htmlTablaReporteAuxiliars=$htmlTablaLocal;
			*/
			
			/*
			$this->htmlTablaReporteAuxiliars.='<!DOCTYPE html>';
			$this->htmlTablaReporteAuxiliars.='<html>';
			$this->htmlTablaReporteAuxiliars.='<head>';
			$this->htmlTablaReporteAuxiliars.='<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
			$this->htmlTablaReporteAuxiliars.='</head>';
			$this->htmlTablaReporteAuxiliars.='<body>';
			*/
			
			$this->htmlTablaReporteAuxiliars.=$htmlTablaLocal;
			
			/*
			$this->htmlTablaReporteAuxiliars.='</body>';
			$this->htmlTablaReporteAuxiliars.='</html>';
			*/
		}

		return $htmlTablaLocal;
	}	
	
	public function setHtmlTablaDatosParaBusqueda() : string {
		return $this->getHtmlTablaDatosParaBusqueda(false);
	}
	
	public function getHtmlTablaDatosParaBusqueda(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		$documento_cuenta_pagarsLocal=array();
		
		$documento_cuenta_pagarsLocal=$this->documento_cuenta_pagars;
				
		$classes=array();		
		
		$style_tabla=' style=" width:100%;height: 100%; margin: 0 0 0 0px;" ';
		/*overflow:auto;*/
		$style_div=' style=" width:100%;height: 300px; overflow:auto; margin: 0 0 0 0px;" ';
		
		$class_cabecera='';
		$class_table=' class="'.Constantes::$CSS_CLASS_TABLE.'" ';
		

		if(!$paraReporte) {
			
			if(Constantes::$STR_TIPO_TABLA=='normal') {
				$class_cabecera=' class="cabeceratabla" ';
				$class_table='';
			}
			
			if($this->bitConAltoMaximoTabla==true) {
				$style_div=' style=" width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;" ';			
			}
		} else {			
			$class_cabecera=' class="cabeceratabla" ';
			$class_table='';
			$style_div=' style=" width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;" ';	
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$documento_cuenta_pagarLogic=new documento_cuenta_pagar_logic();
		$documento_cuenta_pagarLogic->setdocumento_cuenta_pagars($this->documento_cuenta_pagars);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}

		$imagen_documento_cuenta_pagar_session=unserialize($this->Session->read(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME));

		if($imagen_documento_cuenta_pagar_session==null) {
			$imagen_documento_cuenta_pagar_session=new imagen_documento_cuenta_pagar_session();
		}

		$devolucion_session=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME));

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('forma_pago_proveedor');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$documento_cuenta_pagarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->documento_cuenta_pagars=$documento_cuenta_pagarLogic->getdocumento_cuenta_pagars();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$documento_cuenta_pagars = $this->documento_cuenta_pagars;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = documento_cuenta_pagar_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = documento_cuenta_pagar_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/documento_cuenta_pagar_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->documento_cuenta_pagars=$documento_cuenta_pagars;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->documento_cuenta_pagarsLocal=$documento_cuenta_pagarsLocal;
		$template->classes=$classes;
		$template->style_tabla=$style_tabla;
		$template->style_div=$style_div;
		$template->class_cabecera=$class_cabecera;
		$template->class_table=$class_table;		
		$template->proceso_print=$proceso_print;
		
		$htmlTablaLocal=$template->render_html();
		
		//TEMPLATING
		
		
		
		
		
		$this->htmlTabla=$htmlTablaLocal;
			
		return $htmlTablaLocal;
	}	
	
	public function getHtmlTablaDatosResumen(array $documento_cuenta_pagars=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->documento_cuenta_pagarsReporte = $documento_cuenta_pagars;		
		$bitParaReporteOrderBy = $paraReporte; //$this->bitParaReporteOrderBy;
		
		$strAuxStyleBackgroundTablaPrincipal='';
		$strAuxStyleBackgroundTitulo='';
		$strAuxStyleBackgroundContenido='';
			$strAuxStyleBackgroundContenidoCabecera='';
			$strAuxStyleBackgroundContenidoDetalle='';		
		$strAuxStyleBackgroundIzquierda='';
		$strAuxStyleBackgroundDerecha='';
		
		
		
		if(!$paraReporte) {
			$strAuxStyleBackgroundTablaPrincipal=' class="tablaficha" ';
			$strAuxStyleBackgroundContenido=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-contenido-resumen.jpg);background-repeat:repeat;"';
				$strAuxStyleBackgroundContenidoCabecera='';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundTitulo=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-titulo-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundIzquierda=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-izquierda-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundDerecha=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-derecha-resumen.gif);background-repeat:repeat;"';
			
			
		} else {
			$strAuxStyleBackgroundTablaPrincipal='';
			$strAuxStyleBackgroundTitulo=' class="cabeceraformulario" ';
			$strAuxStyleBackgroundContenido='';			
				$strAuxStyleBackgroundContenidoCabecera=' class="filazebra" ';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundIzquierda='';
			$strAuxStyleBackgroundDerecha='';						
		}
		
		$strAuxColumnRowSpan='
			<td rowspan="#rowspan" '.$strAuxStyleBackgroundIzquierda.'>
				<pre> 
				</pre>
			</td>';
						
		$strTamanioTablaPrincipal="500px";
		
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';
		}
	
		//TEMPLATING CONTROLLER BASE
		
		$this->paraReporte=$paraReporte;
		$this->proceso_print=$proceso_print;
		$this->strAuxStyleBackgroundTablaPrincipal=$strAuxStyleBackgroundTablaPrincipal;
		$this->borderValue=$borderValue;
		$this->strTamanioTablaPrincipal=$strTamanioTablaPrincipal;
		$this->strAuxStyleBackgroundTitulo=$strAuxStyleBackgroundTitulo;
		
		$this->strAuxStyleBackgroundContenido=$strAuxStyleBackgroundContenido;
		$this->strAuxStyleBackgroundContenidoCabecera=$strAuxStyleBackgroundContenidoCabecera;
		$this->bitParaReporteOrderBy=$bitParaReporteOrderBy;
		
		
		if($rowSpanValue!=null);
		if($blnTieneCampo!=null);
		
		return $htmlTablaLocal;
	}	
	
	public function getHtmlTablaDatosRelaciones(array $documento_cuenta_pagars=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->documento_cuenta_pagarsReporte = $documento_cuenta_pagars;		
		$bitParaReporteOrderBy = $paraReporte; //$this->bitParaReporteOrderBy;
		
		$strAuxStyleBackgroundTablaPrincipal='';
		$strAuxStyleBackgroundTitulo='';
		$strAuxStyleBackgroundContenido='';
			$strAuxStyleBackgroundContenidoCabecera='';
			$strAuxStyleBackgroundContenidoDetalle='';		
		$strAuxStyleBackgroundIzquierda='';
		$strAuxStyleBackgroundDerecha='';
		
		
		
		if(!$paraReporte) {
			$strAuxStyleBackgroundTablaPrincipal=' class="tablaficha" ';
			$strAuxStyleBackgroundContenido=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-contenido-resumen.jpg);background-repeat:repeat;"';
				$strAuxStyleBackgroundContenidoCabecera='';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundTitulo=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-titulo-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundIzquierda=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-izquierda-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundDerecha=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-derecha-resumen.gif);background-repeat:repeat;"';
			
			
		} else {
			$strAuxStyleBackgroundTablaPrincipal='';
			$strAuxStyleBackgroundTitulo=' class="cabeceraformulario" ';
			$strAuxStyleBackgroundContenido='';			
				$strAuxStyleBackgroundContenidoCabecera=' class="filazebra" ';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundIzquierda='';
			$strAuxStyleBackgroundDerecha='';	
		}
		
		$strAuxColumnRowSpan='
			<td rowspan="#rowspan" '.$strAuxStyleBackgroundIzquierda.'>
				<pre> 
				</pre>
			</td>';
						
		$strTamanioTablaPrincipal="500px";
		
		
		$this->documento_cuenta_pagarsReporte=$this->cargarRelaciones($documento_cuenta_pagars);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardocumento_cuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';			
		}
		
	
		//TEMPLATING CONTROLLER BASE
		
		$this->paraReporte=$paraReporte;
		$this->proceso_print=$proceso_print;
		$this->strAuxStyleBackgroundTablaPrincipal=$strAuxStyleBackgroundTablaPrincipal;
		$this->borderValue=$borderValue;
		$this->strTamanioTablaPrincipal=$strTamanioTablaPrincipal;
		$this->strAuxStyleBackgroundTitulo=$strAuxStyleBackgroundTitulo;
		
		$this->strAuxStyleBackgroundContenido=$strAuxStyleBackgroundContenido;
		$this->strAuxStyleBackgroundContenidoCabecera=$strAuxStyleBackgroundContenidoCabecera;
		$this->bitParaReporteOrderBy=$bitParaReporteOrderBy;
		
		if($rowSpanValue!=null);
		if($blnTieneCampo!=null);
		
		return $htmlTablaLocal;
	}
	
	public function getHtmlTablaAccionesRelaciones(documento_cuenta_pagar $documento_cuenta_pagar=null) : string {	
		$htmlTablaLocal='';
		$PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		
	
		if($PATH_IMAGEN!=null);
		
		return $htmlTablaLocal;
	}
	
	public function generarHtmlReporte() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*
			if($this->bitConEditar) {
				$this->bitConAltoMaximoTabla=true;
			}
			*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			/*$checkbox_parareporte=null;*/
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			
			
			$this->getHtmlTablaDatos(true);
			
									
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS, SE REPITE
			//$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarHtmlFormReporte() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			$documento_cuenta_pagarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$documento_cuenta_pagarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($documento_cuenta_pagarsLocal)<=0) {
					/*//DEBE ESCOGER
					$documento_cuenta_pagarsLocal=$this->documento_cuenta_pagars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$documento_cuenta_pagarsLocal=$this->documento_cuenta_pagars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($documento_cuenta_pagarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($documento_cuenta_pagarsLocal,true);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarHtmlRelacionesReporte() {
		
		try {			
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->getNewConnexionToDeep();
			}
					
			$documento_cuenta_pagarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$documento_cuenta_pagarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($documento_cuenta_pagarsLocal)<=0) {
					/*//DEBE ESCOGER
					$documento_cuenta_pagarsLocal=$this->documento_cuenta_pagars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$documento_cuenta_pagarsLocal=$this->documento_cuenta_pagars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($documento_cuenta_pagarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($documento_cuenta_pagarsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarReporteAuxiliar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function generarFpdf() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->layout = 'fpdf';
			
			$titulo=Constantes::getstrAreaDepartamento();
			$subtitulo='Reporte de  Documentos Cuentas por Pagares';
			
			$header=array();
			$data=array();
			//$row=array();
			//$cellReport=new CellReport();
					
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderByFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(false,'NORMAL');						
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			$fpdf_helper=new FpdfHelper();
			
			$font='Arial';
			$sizefont=12;
			$fileName='documento_cuenta_pagar';
			
			header("Content-type: application/pdf"); 
			header('Content-Disposition: attachment;filename="'.$fileName.'.pdf"'); 
			header('Cache-Control: max-age=0'); 
		
			$fpdf_helper->SetFont($font,'',$sizefont);
			$fpdf_helper->title=$titulo; 
			$fpdf_helper->subtitle=$subtitulo;
			$fpdf_helper->AddPage();
			$fpdf_helper->basicTable($header,$data);
			
						
			echo $fpdf_helper->fpdfOutput();  
			
		} catch(Exception $e) {
			
			throw $e;
		}
	}
	
	public function generarReporteConPhpExcel(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
			
						
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
		
		
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
									
			$header=array();
			$data=array();
						
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(false,'NORMAL');
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Documentos Cuentas por Pagares';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
		} catch(Exception $e) {
			throw $e;
		}
    } 
	
	public function generarReporteConPhpExcelVertical(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderByFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
	
			$header=array();
			$data=array();
						
			/*$header=$this->getHeadersReportVertical();*/
			
			$data=$this->getDataReportVertical();
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Documentos Cuentas por Pagares';
			$tipo=$strTipoReporte;
			
			$excel_helper->generateVertical($header,$data, $title,$tipo,'webroot');
			
		} catch(Exception $e) {
			throw $e;
		}
    } 
	
	public function generarReporteConPhpExcelRelaciones(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->getNewConnexionToDeep();
			}
					
			/*$this->inicializarVariables('NORMAL');
			
			//PARA COLUMNAS DINAMICAS*/
			
			$orderByQueryRelAux=Funciones::getCargarOrderByQueryRel($this->arrOrderByRel,$this->data,'REPORTE');
			$orderByQueryRelAux=trim($orderByQueryRelAux);
			
			$this->bitParaReporteOrderByRel=false;
			$checkbox_parareporte_rel=null;
				
			$this->getDataParaReporteOrderByRelFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
		
		
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
									
			$header=array();
			$data=array();
						
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(true,'NORMAL');
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Documentos Cuentas por Pagares';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=documento_cuenta_pagar_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
		return $header;
	}
	
	public function ValCol(string $sColName,bool $paraReporte) {
		$valido=true;
		
		if($paraReporte) {
			$valido=Funciones::existeCadenaArrayOrderBy($sColName,$this->arrOrderBy,$this->bitParaReporteOrderBy);
		}
		
		return $valido;
	}
	
	
	
	public function getDataReport(bool $paraRelaciones=false,string $tipo='NORMAL') : array {	
		$data=array();
		$row=array();
		$cellReport=new CellReport();
		$this->documento_cuenta_pagarsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->documento_cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->documento_cuenta_pagarsAuxiliar)<=0) {
					$this->documento_cuenta_pagarsAuxiliar=$this->documento_cuenta_pagars;
				}
			} else {
				$this->documento_cuenta_pagarsAuxiliar=$this->documento_cuenta_pagars;
			}
		/*} else {
			$this->documento_cuenta_pagarsAuxiliar=$this->documento_cuenta_pagarsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->documento_cuenta_pagarsAuxiliar as $documento_cuenta_pagar) {
				$row=array();
				
				$row=documento_cuenta_pagar_util::getDataReportRow($tipo,$documento_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			documento_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			imagen_documento_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$documento_cuenta_pagarsResp=array();
			$classes=array();
			
			
				$class=new Classe('orden_compra'); 	$classes[]=$class;
				$class=new Classe('imagen_documento_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('devolucion'); 	$classes[]=$class;
			
			
			$documento_cuenta_pagarsResp=$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars();
			
			$this->documento_cuenta_pagarLogic->setIsConDeep(true);
			
			$this->documento_cuenta_pagarLogic->setdocumento_cuenta_pagars($this->documento_cuenta_pagarsAuxiliar);
			
			$this->documento_cuenta_pagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->documento_cuenta_pagarsAuxiliar=$this->documento_cuenta_pagarLogic->getdocumento_cuenta_pagars();
			
			//RESPALDO
			$this->documento_cuenta_pagarLogic->setdocumento_cuenta_pagars($documento_cuenta_pagarsResp);
			
			$this->documento_cuenta_pagarLogic->setIsConDeep(false);
			*/
			
			$this->documento_cuenta_pagarsAuxiliar=$this->cargarRelaciones($this->documento_cuenta_pagarsAuxiliar);
			
			$i=0;
			
			foreach ($this->documento_cuenta_pagarsAuxiliar as $documento_cuenta_pagar) {
				$row=array();
				
				if($i!=0) {
					$row=documento_cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=documento_cuenta_pagar_util::getDataReportRow($tipo,$documento_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//orden_compra
				if(Funciones::existeCadenaArrayOrderBy(orden_compra_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($documento_cuenta_pagar->getorden_compras())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(orden_compra_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=orden_compra_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($documento_cuenta_pagar->getorden_compras() as $orden_compra) {
						$row=orden_compra_util::getDataReportRow('RELACIONADO',$orden_compra,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//imagen_documento_cuenta_pagar
				if(Funciones::existeCadenaArrayOrderBy(imagen_documento_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($documento_cuenta_pagar->getimagen_documento_cuenta_pagars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(imagen_documento_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=imagen_documento_cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($documento_cuenta_pagar->getimagen_documento_cuenta_pagars() as $imagen_documento_cuenta_pagar) {
						$row=imagen_documento_cuenta_pagar_util::getDataReportRow('RELACIONADO',$imagen_documento_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//devolucion
				if(Funciones::existeCadenaArrayOrderBy(devolucion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($documento_cuenta_pagar->getdevolucions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(devolucion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=devolucion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($documento_cuenta_pagar->getdevolucions() as $devolucion) {
						$row=devolucion_util::getDataReportRow('RELACIONADO',$devolucion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}
				
				$i++;
			}
		}
		
		if($cellReport!=null);
		
		return $data;
	}
	
	public function getDataReportVertical() : array {	
		$data=array();
		$row=array();
		$cellReport=new CellReport();
		$this->documento_cuenta_pagarsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->documento_cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->documento_cuenta_pagarsAuxiliar)<=0) {
					$this->documento_cuenta_pagarsAuxiliar=$this->documento_cuenta_pagars;
				}
			} else {
				$this->documento_cuenta_pagarsAuxiliar=$this->documento_cuenta_pagars;
			}
		/*} else {
			$this->documento_cuenta_pagarsAuxiliar=$this->documento_cuenta_pagarsReporte;	
		}*/
		
		foreach ($this->documento_cuenta_pagarsAuxiliar as $documento_cuenta_pagar) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(documento_cuenta_pagar_util::getdocumento_cuenta_pagarDescripcion($documento_cuenta_pagar),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnumero(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->gettipo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmonto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto Parcial',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Parcial',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmonto_parcial(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Moneda',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Moneda',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmoneda(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Vencimiento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vencimiento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getfecha_vence(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nro De Pagos',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro De Pagos',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnumero_de_pagos(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Balance',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getbalance(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Balance Mon',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance Mon',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getbalance_mon(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nro Documento Pagado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Documento Pagado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnumero_pagado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Id Pagado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Pagado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_pagado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Modulo Origen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo Origen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmodulo_origen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Origen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Origen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_origen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Modulo Destino',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo Destino',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmodulo_destino(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Destino',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Destino',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_destino(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Pc',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Pc',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnombre_pc(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Hora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Hora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->gethora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto Mora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Mora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmonto_mora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Interes Mora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Interes Mora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getinteres_mora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Dias Gracia Mora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Dias Gracia Mora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getdias_gracia_mora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Instrumento Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Instrumento Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getinstrumento_pago(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Cambio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Cambio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->gettipo_cambio(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nro Documento Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Documento Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnro_documento_proveedor(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Clase Registro',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Clase Registro',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getclase_registro(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Estado Registro',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado Registro',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getestado_registro(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Motivo Anulacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Motivo Anulacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmotivo_anulacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto 1',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto 1',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getimpuesto_1(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto 2',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto 2',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getimpuesto_2(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto Incluido',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto Incluido',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getimpuesto_incluido(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Observaciones',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observaciones',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getobservaciones(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Grupo Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Grupo Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getgrupo_pago(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Termino Idpv',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Termino Idpv',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->gettermino_idpv(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Forma Pago Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Forma Pago Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_forma_pago_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nro Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnro_pago(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Referencia Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Referencia Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getreferencia_pago(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Hora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Hora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getfecha_hora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Id Base',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Base',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_base(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_cuenta_corrienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface documento_cuenta_pagar_base_controlI {			
		
		public function inicializarVariables(string $strType);		
		public function inicializar();
		
		public function cargarParametros();		
		public function cargarDatosLogicClaseBean(bool $esParaLogic=true);		
		public function inicializarMensajesDatosInvalidos();		
		public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo);		
		public function inicializarMensajesDefectoDatosInvalidos();
		
		public function nuevo();		
		public function actualizar();		
		public function eliminar(?int $idActual=0);		
		public function getIndiceNuevo() : int;		
		public function getIndiceActual(documento_cuenta_pagar $documento_cuenta_pagar,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(documento_cuenta_pagar $documento_cuenta_pagar,array $documento_cuenta_pagars);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : documento_cuenta_pagar_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $documento_cuenta_pagars,documento_cuenta_pagar $documento_cuenta_pagar);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(documento_cuenta_pagar_param_return $documento_cuenta_pagarReturnGeneral);		
		public function actualizarEstadoCeldasBotones(string $strAccion,bool $bitGuardarCambiosEnLote=false,bool $bitEsMantenimientoRelacionado=false);		
		public function manejarRetornarExcepcion(Exception $e);		
		public function cancelarControles();		
		public function inicializarAuxiliares();		
		public function inicializarMensajesTipo(string $tipo,$e=null);		
		public function prepararEjecutarMantenimiento();		
		public function setTipoAction(string $action='INDEX');		
		public function cargarDatosCliente();		
		public function cargarParametrosPagina();		
		public function cargarParametrosEventosTabla();		
		public function cargarParametrosReporte();		
		public function cargarParamsPostAccion();		
		public function cargarParamsPaginar();
		
		public function returnHtml(bool $bitConRetrurnAjax);		
		public function returnAjax();
		
		public function actualizarDesdeSessionDivStyleVariables(documento_cuenta_pagar_session $documento_cuenta_pagar_session);		
		public function actualizarInvitadoSessionDivStyleVariables(documento_cuenta_pagar_session $documento_cuenta_pagar_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(documento_cuenta_pagar $documento_cuenta_pagarOrigen,documento_cuenta_pagar $documento_cuenta_pagar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(documento_cuenta_pagar_control $documento_cuenta_pagar_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $documento_cuenta_pagars=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(documento_cuenta_pagar_session $documento_cuenta_pagar_session);		
		public function setPermisosUsuarioConPermiso(string $strPermiso);		
		public function setPermisosMantenimientoUsuarioConPermiso(string $strPermiso);
		
		public function setPermisosUsuario();		
		public function setAccionesUsuario();		
		
		//Todo,ActualizarOriginal,Consulta,Busqueda,Reporte
		public function inicializarPermisos();		
		public function inicializarSetPermisosUsuarioClasesRelacionadas();
		
		
		//VIEW_LAYER
		public function setHtmlTablaDatos() : string;		
		public function getHtmlTablaDatos(bool $paraReporte=false) : string;		
		public function setHtmlTablaDatosParaBusqueda() : string;		
		public function getHtmlTablaDatosParaBusqueda(bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosResumen(array $documento_cuenta_pagars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $documento_cuenta_pagars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(documento_cuenta_pagar $documento_cuenta_pagar=null) : string;
		
		public function generarHtmlReporte();		
		public function generarHtmlFormReporte();		
		public function generarHtmlRelacionesReporte();
		
		public function generarReporteAuxiliar();		
		public function generarFpdf();		
		public function generarReporteConPhpExcel(string $strTipoReporte='PDF');		
		public function generarReporteConPhpExcelVertical(string $strTipoReporte='PDF');		
		public function generarReporteConPhpExcelRelaciones(string $strTipoReporte='PDF');		
		public function getHeadersReport(string $tipo='NORMAL');
		
		public function ValCol(string $sColName,bool $paraReporte);				
		public function getDataReport(bool $paraRelaciones=false,string $tipo='NORMAL') : array;		
		public function getDataReportVertical() : array;
	}

	*/
}

?>
