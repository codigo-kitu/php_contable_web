<?php declare(strict_types = 1);

namespace com\bydan\framework\globales\seguridad\logic;

class FuncionesSeguridad {	
    
	public static function getStringFecha(string $sFecha,bool $paraFinal) : string {
		$sFechaFinal=$sFecha;
		
		if($paraFinal) {
			$sFechaFinal=str_replace('-','Z(X',$sFechaFinal);
			$sFechaFinal=str_replace('0','C)V',$sFechaFinal);
			$sFechaFinal=str_replace('1','B=N',$sFechaFinal);
			$sFechaFinal=str_replace('2','M.A',$sFechaFinal);
			$sFechaFinal=str_replace('3','S,D',$sFechaFinal);
			$sFechaFinal=str_replace('4','F_G',$sFechaFinal);
			$sFechaFinal=str_replace('5','H+J',$sFechaFinal);
			$sFechaFinal=str_replace('6','K!L',$sFechaFinal);
			$sFechaFinal=str_replace('7','Q*W',$sFechaFinal);
			$sFechaFinal=str_replace('8','E:R',$sFechaFinal);
			$sFechaFinal=str_replace('9','T$Y',$sFechaFinal);
		
		} else {
			$sFechaFinal=str_replace('Z(X','-',$sFechaFinal);
			$sFechaFinal=str_replace('C)V','0',$sFechaFinal);
			$sFechaFinal=str_replace('B=N','1',$sFechaFinal);
			$sFechaFinal=str_replace('M.A','2',$sFechaFinal);
			$sFechaFinal=str_replace('S,D','3',$sFechaFinal);
			$sFechaFinal=str_replace('F_G','4',$sFechaFinal);
			$sFechaFinal=str_replace('H+J','5',$sFechaFinal);
			$sFechaFinal=str_replace('K!L','6',$sFechaFinal);
			$sFechaFinal=str_replace('Q*W','7',$sFechaFinal);
			$sFechaFinal=str_replace('E:R','8',$sFechaFinal);
			$sFechaFinal=str_replace('T$Y','9',$sFechaFinal);
		}
			
		return $sFechaFinal;
	}
	
	public static function getStringFechaReversa(string $sFecha,bool $paraFinal) : string {
		
		$sFechaFinal=$sFecha;
		
		if($paraFinal) {
			$sFechaFinal=str_replace('-','Z(X',$sFechaFinal);
			$sFechaFinal=str_replace('0','C)V',$sFechaFinal);
			$sFechaFinal=str_replace('1','B=N',$sFechaFinal);
			$sFechaFinal=str_replace('2','M.A',$sFechaFinal);
			$sFechaFinal=str_replace('3','S,D',$sFechaFinal);
			$sFechaFinal=str_replace('4','F_G',$sFechaFinal);
			$sFechaFinal=str_replace('5','H+J',$sFechaFinal);
			$sFechaFinal=str_replace('6','K!L',$sFechaFinal);
			$sFechaFinal=str_replace('7','Q*W',$sFechaFinal);
			$sFechaFinal=str_replace('8','E:R',$sFechaFinal);
			$sFechaFinal=str_replace('9','T$Y',$sFechaFinal);
		
		} else {
			$sFechaFinal=str_replace('Z(X','-',$sFechaFinal);
			$sFechaFinal=str_replace('C)V','0',$sFechaFinal);
			$sFechaFinal=str_replace('B=N','1',$sFechaFinal);
			$sFechaFinal=str_replace('M.A','2',$sFechaFinal);
			$sFechaFinal=str_replace('S,D','3',$sFechaFinal);
			$sFechaFinal=str_replace('F_G','4',$sFechaFinal);
			$sFechaFinal=str_replace('H+J','5',$sFechaFinal);
			$sFechaFinal=str_replace('K!L','6',$sFechaFinal);
			$sFechaFinal=str_replace('Q*W','7',$sFechaFinal);
			$sFechaFinal=str_replace('E:R','8',$sFechaFinal);
			$sFechaFinal=str_replace('T$Y','9',$sFechaFinal);
		}
			
		return $sFechaFinal;
	}
}
?>