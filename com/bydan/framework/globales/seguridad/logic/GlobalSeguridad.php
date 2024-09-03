<?php declare(strict_types = 1);

namespace com\bydan\framework\globales\seguridad\logic;

use Exception;

class GlobalSeguridad {
	
	//REQUERIDO
	//DESDE CLIENTES FUNCIONA CON 192.168.1.4 NO CON bydan-PC
	public static string $NOMBRE_PC_SERVER='192.168.1.4';//bydan-PC';
	public static string $IP_PC_SERVER='192.168.1.4';
	public static bool $CON_USUARIOS=true;//USUARIO DB, NO USUARIO WINDOWS	
	public static bool $CON_IPS=true;//SI SE NECESITA RESTRINGIR	
	public static bool $CON_MODULOS=false;//SOLO SI SE REQUIERE	
	
	public static bool $SIN_VALIDAR=true;
	
	
	//NO_USADO,TALVEZ
	public static bool $CON_MAC_ADDRESS=false;//NO ESTABLE, NO ES POSIBLE TRAER INFO	
	public static bool $CON_CLAVE_SISTEMA=false;//NO USADO, EN HOSTING, DONDE UBICAR, Y SI SE UBICA EN APLICACION NO ES SEGURIDAD	
	
	
	
	public static function validarLicenciaCliente(string $sUsuarioPCCliente,string  $sNamePCCliente,string $sIPPCCliente,string $sMacAddressPCCliente,string $dFechaServer,
	    int $idUsuario,string $sNombreModuloActual='INVENTARIO',string $sNombreUsuarioActual='ADMIN'):bool {
	
	    $validar=true;	
		$sClaveSistema='';
		$sEncript='';
		$sNamePCServer='';
		
		if(GlobalSeguridad::$SIN_VALIDAR){
			return true;	
		}
		
		/*
		$aux='';
		$aux_encript='';
		
		$aux_f='';
		$aux_encript_f='';
		*/
		
		//M.AC)VB=NF_GZ(XB=NM.AZ(XS,DB=N
		//$aux_f='2014-06-01';//M.AC)VB=NF_GZ(XC)VK!LZ(XC)VB=N
		//$aux_encript_f=FuncionesSeguridad::getStringFechaReversa($aux_f,true);
		
		//$aux='192.168.1.4';
		//$aux_encript=substr(sha1($aux),0,20);
		
		$sNamePCServer=$_SERVER['SERVER_NAME']; 
		$sIPPCServer=$_SERVER['SERVER_ADDR']; 
		
		
		if($sNamePCServer=='127.0.0.1' || $sNamePCServer=='localhost' || $sNamePCServer=='' || $sNamePCServer==null) {
			$sNamePCServer=GlobalSeguridad::$NOMBRE_PC_SERVER;				
		}
		
		
		if($sIPPCServer=='127.0.0.1' || $sIPPCServer=='localhost' || $sIPPCServer=='' || $sIPPCServer==null) {
			$sIPPCServer=GlobalSeguridad::$IP_PC_SERVER;
			$sIPPCCliente=GlobalSeguridad::$IP_PC_SERVER;			
		}
		
		
		$sClaveSistema='b252a6640923b0ec069458c972ddc5383a3c5d90';
		//$dFechaServer='2014-01-01';
		//$sNombreUsuarioActualEncript='b521caa6e1db82e5a01c924a419870cb72b81635';
		//$sNombreModuloActualEncript='83aeade1adc7931170de97074296fbee87920253';
		
		$sEncript=substr(sha1($sNamePCServer),0,20);
		
		$sNamePCServerEncript=sha1($sNamePCServer);
		$sIPPCServerEncript=sha1($sIPPCServer);
		$sNombreModuloActualEncript=sha1($sNombreModuloActual);
		$sNombreUsuarioActualEncript=sha1($sNombreUsuarioActual);
		$sIPPCClienteEncript=sha1($sIPPCCliente);		
				
		$xml=simplexml_load_file('com/bydan/framework/global/seguridad/resources/'.$sEncript.'.xml');
		
		
		
		$sNamePCServerLicencia='';
		$sIPPCServerLicencia='';
		$arrIpsLicencia=array();
		$sClaveSistemaLicencia='';
		$dFechaServerLicencia='';//null;
		$arrUsuariosLicencia=array();
		$arrModulosLicencia=array();
		
		
		$sUsuarioPCClienteLicencia='';		
		$arrMacAddressesLicencia=array();		
		$idUsuarioLicencia=1;
		$isClienteWebLicencia=false;
		//$sMacAddressPCClienteLicencia='';
		//$sMacAddressServerLicencia='';
		//$sUsuarioLicencia='';
		//$sDateFormat='yyyy-MM-dd';
										
				
		//Global
		if($xml!=null){
    		foreach($xml->children() as $child) {
    			//Licencia
      			//echo $child->getName() . ': ' . $child . '<br>';
      			
      			foreach($child->children() as $child2) {
      				//echo $child2->getName() . ': ' . $child2 . '<br>';
      				
      				if($child2->getName()=='ClaveSistema') {
      					  $sClaveSistemaLicencia=GlobalSeguridad::getXmlNodeValue($child2);	
      					  continue;				
      				}
      				
      				if($child2->getName()=='FechaCaduca') {
      					  $dFechaServerLicencia=GlobalSeguridad::getXmlNodeValue($child2);
      					  $dFechaServerLicencia=FuncionesSeguridad::getStringFechaReversa($dFechaServerLicencia,false);
      					  continue;					
      				}
      				
      				if($child2->getName()=='NombrePc') {
      					  $sNamePCServerLicencia=GlobalSeguridad::getXmlNodeValue($child2);
      					  continue;					
      				}
      				
      				if($child2->getName()=='IpPc') {
      					  $sIPPCServerLicencia=GlobalSeguridad::getXmlNodeValue($child2);	
      					  continue;				
      				}
      				
      				if($child2->getName()=='UsuarioPc') {
      					  $sUsuarioPCClienteLicencia=GlobalSeguridad::getXmlNodeValue($child2);
      					  continue;					
      				}
      				
      				if($child2->getName()=='idUsuarioPrincipal') {
      					  $idUsuarioLicencia=GlobalSeguridad::getXmlNodeValue($child2);	
      					  continue;				
      				}
      				
      				if($child2->getName()=='EsClienteWeb') {
      					  $isClienteWebLicencia=GlobalSeguridad::getXmlNodeValue($child2);
      					  continue;					
      				}
      				
      				if($child2->getName()=='MacAddresses'
      					|| $child2->getName()=='Modulos'
      					|| $child2->getName()=='Usuarios'
      					|| $child2->getName()=='Ips')
      					 
      				{
      						
      						
      					if($child2->getName()=='MacAddresses' && GlobalSeguridad::$CON_MAC_ADDRESS) {
      						
      						foreach($child2->children() as $mac_adddress) {
      							$arrMacAddressesLicencia[]=GlobalSeguridad::getXmlNodeValue($mac_adddress);
      						}
      						
      						continue;
      						
      					} else if($child2->getName()=='Ips' && GlobalSeguridad::$CON_IPS) {
      						
      						foreach($child2->children() as $ip) {
      							$arrIpsLicencia[]=GlobalSeguridad::getXmlNodeValue($ip);
      						}
      						
      						continue;
      						
      					} else if($child2->getName()=='Modulos') {
      						
      						foreach($child2->children() as $modulo) {
      							$arrModulosLicencia[]=GlobalSeguridad::getXmlNodeValue($modulo);
      						}
      						
      						continue;
      						
      					} else if($child2->getName()=='Usuarios') {
      						
      						foreach($child2->children() as $usuario) {
      							$arrUsuariosLicencia[]=GlobalSeguridad::getXmlNodeValue($usuario);
      						}
      						
      						continue;
      					}  					  					
      				}
      			}
    		}
		}
		
		//NOMBRE XML CON NOMBRE PC CLIENTE(TALVEZ DE ARCHIVO)
		//$sNamePCServer
		if($sNamePCServerEncript!=$sNamePCServerLicencia) {
			$sMensajeExcepcion='NO COINCIDEN DATOS DE LA LICENCIA (PC)';
			$validar=false;
		}
		//NOMBRE XML CON NOMBRE PC CLIENTE FIN
				
				
		//IP SERVER
		//$sIPPCServer
		if($sIPPCServerEncript!=$sIPPCServerLicencia) {
			$sMensajeExcepcion='NO COINCIDEN DATOS DE LA LICENCIA (IP-SERVER)';
			$validar=false;
		}
		//IP SERVER
		
		//MAC_ADDRESS XML CON MAC_ADDRESS PC CLIENTE
		
		//if(GlobalSeguridad::$CON_MAC_ADDRESS) {
		//	if($sMacAddressPCCliente!='') {
		//		if(!GlobalSeguridad::existeTextoEnArray($sMacAddressPCCliente,$arrMacAddressesLicencia)) {						 
		//			$sMensajeExcepcion='NO COINCIDEN DATOS DE LA LICENCIA (ADDRESS)';
		//			$validar=false;		
		//		}
		//	}
		//}
		
		//MAC_ADDRESS XML CON MAC_ADDRESS PC CLIENTE FIN
				

		//IPS->TALVEZ
		if(GlobalSeguridad::$CON_IPS) {
			if($sIPPCCliente!='127.0.0.1' && $sIPPCCliente!='localhost' && $sIPPCCliente!='' && $sIPPCCliente!=null) {
								
				//$sIPPCCliente
				if(!GlobalSeguridad::existeTextoEnArray($sIPPCClienteEncript,$arrIpsLicencia)) {						 
					$sMensajeExcepcion='NO COINCIDEN DATOS DE LA LICENCIA (IP)';
					$validar=false;
					//System.out.println(sMacAddressPCServer);
					//System.out.println(sMacAddressPCServerLicencia);
				}
			}
		}
		//IPS_FIN
		
		//CLAVE XML CON CLAVE PC CLIENTE(DE ARCHIVO)->NO
		if(GlobalSeguridad::$CON_CLAVE_SISTEMA) {
			if($sClaveSistema!=$sClaveSistemaLicencia) {
				$sMensajeExcepcion='NO COINCIDEN DATOS DE LA LICENCIA (KEY)';
				$validar=false;
			}
		}
		//CLAVE XML CON CLAVE PC CLIENTE FIN
				
				
		//FECHA XML CON FECHA PC CLIENTE->SI
		if(strtotime($dFechaServer) > strtotime($dFechaServerLicencia)) {
			$sMensajeExcepcion='LICENCIA CADUCADA';
			$validar=false;
		}
		//FECHA XML CON FECHA PC CLIENTE FIN
				
				
		//MODULO XML CON MODULO ACTUAL PC CLIENTE->TALVEZ		
		if(GlobalSeguridad::$CON_MODULOS) {
			if($sNombreModuloActualEncript!='' && $sNombreModuloActual!='TODOS') {
				if(!GlobalSeguridad::existeTextoEnArray($sNombreModuloActualEncript,$arrModulosLicencia)) {
					//if(!sMacAddressPCServer.equals(sMacAddressPCServerLicencia)) {
					$sMensajeExcepcion='NO COINCIDEN DATOS DE LA LICENCIA (MODULO)';
					$validar=false;
					//System.out.println(sNombreModuloActualEncript);
					//System.out.println(sMacAddressPCServerLicencia);
				}
			}
		}
		//MODULO XML CON MODULO ACTUAL PC CLIENTE
				
		//USUARIO XML CON USUARIO ACTUAL PC CLIENTE->NO		
		if(GlobalSeguridad::$CON_USUARIOS) {	
			if($sNombreUsuarioActualEncript!='' && $sNombreUsuarioActual!='TODOS') {
				if(!GlobalSeguridad::existeTextoEnArray($sNombreUsuarioActualEncript,$arrUsuariosLicencia)) {
					//if(!sMacAddressPCServer.equals(sMacAddressPCServerLicencia)) {
					$sMensajeExcepcion='NO COINCIDEN DATOS DE LA LICENCIA (USUARIO)';
					$validar=false;
					//System.out.println(sNombreUsuarioActualEncript);
					//System.out.println(sMacAddressPCServerLicencia);
				}
			}
		}
		//USUARIO XML CON USUARIO ACTUAL PC CLIENTE

		if($sMensajeExcepcion!='') {
		  throw new Exception($sMensajeExcepcion);
		}
		
		
		//TEMPORAL, PARA QUITAR MENSAJES ADVERTENCIA
		if($sUsuarioPCClienteLicencia=='999');
		if(count($arrMacAddressesLicencia)<1);
		if($idUsuarioLicencia==-999);
		if($isClienteWebLicencia);
		
		return $validar;
	}
	
	public static function getXmlNodeValue(string|null $child):string {
		$value='';
		
		$value=$child.'';
		
		return $value;
	}
	
	private static function existeTextoEnArray(string $sNombre, array $arrValues):bool {
		$existe=false;
		
		foreach($arrValues as $sNombreLocal) {
			if($sNombreLocal==$sNombre) {
				$existe=true;
				break;
			}
		}
		
		return $existe;
	}
}

?>