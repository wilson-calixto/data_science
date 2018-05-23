<!DOCTYPE html>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
include("../checar_session.php");
include("funcoes.php");

// require_once("funcoes.php");
$usuario = $_SESSION['sec'][0];



$proprietario="493.493.412-04";

?>
<html lang="pt-Br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>.:: SAI ::.</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<link rel="stylesheet" type="text/css" href="../jquerys/vex-master/css/vex-theme-bottom-right-corner.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="row">
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<label for="id_imovel">IMOVEL</label>
			<select name="id_imovel" id="id_imovel" class="form-control">
				<option disabled selected>SELECIONE</option>

					<?php
						$proprietario=$_Post['cpfcnpj_prop']																				
						$stmtimov = $conn->prepare("SELECT * FROM tabimoveis WHERE cpfcnpj_prop = '$proprietario' OR cpfcnpj_prop2 = '$proprietario'" );
						$stmtimov->execute();
						$queryimov = $stmtimov->fetchAll();
						foreach ($queryimov as $rowsimovel) {
					?>

						<option value="<?php echo $rowsimovel['id'];?>"><?php echo GetDescImovel($rowsimovel['id'])." &Aacute;GUA: ".$rowsimovel['nragua']." / "." ENERGIA: ".$rowsimovel['nrluz']." IPTU: ".$rowsimovel['nriptu'];?></option>
					<?php
						}
					?>
			</select>																	
		</div>													
	</div>
</body>										