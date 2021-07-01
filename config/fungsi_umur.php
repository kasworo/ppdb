<?php
	function umur($tgl_lahir, $tgl_batas)
	{
		$lahir = new DateTime($tgl_lahir);
		$batas = new DateTime($tgl_batas);
		$diff = $batas->diff($lahir);
		return $diff->y." thn ".substr('0'.$diff->m,-2)." bln ".$diff->d ." hari";
	}
?>