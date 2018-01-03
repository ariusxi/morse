<!DOCTYPE html>
<html>
	<head>
		<title>Tradutor de Código Morse</title>
	</head>
	<body>
		<?php
			$morse = [
				'a' => '.-', 
				'b' => '-...', 
				'c' => '-.-.', 
				'd' => '-..', 
				'e' => '.', 
				'f' => '..-.', 
				'g' => '--.', 
				'h' => '....', 
				'i' => '..', 
				'j' => '.---' , 
				'k' => '-.-', 
				'l' => '.-..', 
				'm' => '--',
				'n' => '-.', 
				'o' => '---', 
				'p' => '.--.', 
				'q' => '--.-', 
				'r' => '.-.', 
				's' => '...', 
				't' => '-', 
				'u' => '..-',
				'v' => '...-',
				'w' => '.--',
				'x' => '-..-',
				'y' => '-.--',
				'z' => '--..'
			];

			if(isset($_POST['code'])){
				$saida = '';
				$mensagem = strtolower($_POST['code']);

				if(isset($_POST['desconverter'])){
					$palavras = explode('/', $mensagem);
				}else{
					$palavras = explode(' ', $mensagem);
				}
				foreach($palavras as $i => $palavra){
					if(isset($_POST['desconverter'])){
						$letras = explode(' ', $palavra);
						$n = 0;
						foreach($letras as $i => $code){
							$saida .= array_search($code, $morse);
							$n++;
						}
						if($n == count($letras)){
							$saida .= ' ';
						}
					}else{
						for($n = 0; $n < strlen($palavra); $n++){
							$saida .= $morse[$palavra[$n]].'   ';

							if($n == (strlen($palavra)-1)){
								$saida .= '/';
							}
						}
					}
				}
				echo $saida;
			}
		?>
		<form action="" method="post" enctype="multipart/form-data">
			<label for="mensagem">Informe sua palavra ou texto</label>
			<p><input type="checkbox" name="desconverter" value="1">Desconverter</p>
			<textarea name="code" cols="30" rows="5"></textarea><br>
			<input type="submit" name="Executar">
		</form>
	</body>
</html>