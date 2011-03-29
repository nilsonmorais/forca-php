<html>
<head>
	<title>Forca</title>
	<link rel="StyleSheet" href="css/style.css" TYPE="text/css" />
    <META http-equiv="Content-Type" content="text/html; charset=UTF8">
	<script language="javascript">
	function teste(){
		new Ajax.Request('funcoes.php',	{
		method:'get',
		parameters: {action: 'iniciar'},
		onSuccess: function(transport){
		  var response = transport.responseText || "no response text";
		  alert("Success! \n\n" + response);
		},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	}

	function iniciar() {
		$('inicio').hide();
		$('main_2').show();
		$('adicionar').show();
		new Ajax.Updater('main_2','funcoes.php', { 
				method: 'get', 
				parameters: {action: 'iniciar'},
			});
	}
	function loading() {
		$('inicio').show();
		$('main_2').hide();
		$('adicionar').hide();
	}
	function add_letra() {
		var letra = $('letra').getValue();
		var completa = $('completa').getValue();
		var palavra = $('palavra').innerHTML;
		var total_letras = $('total_letras').innerHTML;
		if (letra == '') return;
		new Ajax.Updater('main_2','funcoes.php', {
				method:'get',
				parameters: {action: 'add_letra', letra: letra, completa: completa, palavra: palavra},
				onComplete: check_win();
			});
		$('total_letras').replace('<span id="total_letras">'+total_letras+letra+","+'</span>');
		$('letra').replace('<input type="textbox" id="letra" maxlength="1" align="center" size="3"/>');
		$('letra').focus();
		check_win();
	}
	function check_win(){
		var completa = $('completa').getValue();
		var palavra = $('palavra').innerHTML;
		if (completa == palavra) {
			alert("Você Venceu!");
			return;
		}
	}
	</script>
</head>
<body onLoad="script:loading();">
<script type="text/javascript" src="js/prototype.js"></script>

<div id="div_main" class="div_geral">
	<h1>Jogo da Forca</h1>

	<div id="main_2" class="div_geral">
		Carregando...
	</div>
	<div id="inicio" class="div_geral">
		<input type='button' onclick='script:iniciar();' value='Iniciar' />
	</div>
	<div id="adicionar" class="div_geral">
		<input type="textbox" id="letra" maxlength="1" align="center" size="3"/>
		<input type="button" id="add_letra" value="Adicionar" onclick="script:add_letra();" />
		<div class="div_geral">
			Letras já usadas: <span id="total_letras"></span>
		</div>
	</div>
</div>


</body>
</html>
