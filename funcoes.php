<?php

function debug($str){
if ($_GET['debug'] == 1) { 
		print "<div style='border: 1px solid red;background: #FAA;padding: 5px;margin: 10px;border-radius: 10px;font-size: 12px;text-align: left;'>DEBUG:";
		print_r($str);
		print "</div>";
	}
}

if ($_GET['action'] == '') {
	print "Erro";
} else {
	$action = $_GET['action'];
	switch ($action) {
		case 'iniciar':
			//Pega uma lista de palavras
			$palavras = array("carro","corrida","cena","dedos","caminhada","acusador");
			//Embaralha
			shuffle($palavras);
			echo "<div id='box_palavra' class='div_geral'>
			<input type='hidden' id='completa' value='".strtoupper($palavras[0])."' />
			<span id='palavra'>".str_repeat('_',strlen($palavras[0]))."</span>
			</div>";
			break;
		case 'add_letra':
			$letra = $_GET['letra']; 
			$completa = $_GET['completa']; 
			$palavra = $_GET['palavra']; 
			$temp="";
			for($x=0;$x<strlen($completa);$x++){
				if ((strtoupper(substr($completa,$x,1)) == strtoupper($letra)) || (strtoupper(substr($palavra,$x,1)) == strtoupper(substr($completa,$x,1)))) {
					$temp = $temp . strtoupper(substr($completa,$x,1));
				} else {
					$temp = $temp . "_";
				}
			}
			echo "<div id='box_palavra' class='div_geral'>
			<input type='hidden' id='completa' value='".strtoupper($completa)."' />
			<span id='palavra'>".$temp."</span>
			</div>";
			break;
	}
}
?>
