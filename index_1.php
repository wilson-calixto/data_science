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
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><b>LAN&Ccedil;AMENTOS</b></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

									<a class="thumbnail text-center" data-toggle="modal" href='#modalbusca'>
										<span class="fa fa-search fa-5x"></span><br>
										<h4><b>FILTRO</b></h4>
									</a>

									<a class="thumbnail text-center" data-toggle="modal" href='#modalbuscaprelancamento'>
										<h4>
											<b><span class="fa fa-search fa-1x"></span> BUSCAR PR&Eacute;-LAN&Ccedil;AMENTOS EM ABERTO</b>
										</h4>
									</a>

									<div class="modal fade" id="modalbusca">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title"><b>FILTRO</b></h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<form id="formulariobusca">
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																<label for="cpfcnpj_prop">PROPRIET&Aacute;RIO</label>
																<select name="cpfcnpj_prop" id="cpfcnpj_prop" class="form-control" required="required">
																	<option value="T">TODOS</option>
																	<?php
																	$stmtprop = $conn->prepare("SELECT * FROM tabproprietarios ORDER BY nome ASC");
																	$stmtprop->execute();
																	$queryprop = $stmtprop->fetchAll();
																	foreach ($queryprop as $resultprop) {
																		?>
																		<option value="<?php echo $resultprop['cpfcnpj'];?>"><?php echo utf8_encode($resultprop['nome']);?></option>
																		<?php
																	}
																	?>
																</select>
															</div>
															<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 1.5%;">
																<label>BLOCO DE LANÇAMENTO</label><br>
																<label><input type="radio" name="bloco_lancamento" id="bloco_lancamento" value="0" onclick="exibeCamposFormularioBusca(this.value)" checked> <b>Aluguel</b></label>
																<label style="padding-left: 15px;"><input type="radio" name="bloco_lancamento" id="bloco_lancamento" value="1" onclick="exibeCamposFormularioBusca(this.value)"> <b>Locador</b></label>
															</div>
															<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top: 1%;" id="dividlancamento">
																<label for="id_lancamento">TIPO DE LAN&Ccedil;AMENTO</label>
																<select name="id_lancamento" id="id_lancamento" class="form-control" required="required">
																	<option value="T">TODOS</option>
																	<?php
																	$stmttipolanc = $conn->prepare("SELECT * FROM tabtipos_lancamentos ORDER BY descricao ASC");
																	$stmttipolanc->execute();
																	$querytipolanc = $stmttipolanc->fetchAll();
																	foreach ($querytipolanc as $resulttipolanc) {
																		?>
																		<option value="<?php echo $resulttipolanc['id'];?>"><?php echo utf8_encode($resulttipolanc['descricao']);?></option>
																		<?php
																	}
																	?>
																</select>
															</div>
															<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 1%;" id="divsituacao">
																<label for="situacao">SITUA&Ccedil;&Atilde;O</label>
																<select name="situacao" id="situacao" class="form-control" required="required">
																	<option value="T">PAGOS E N&Atilde;O PAGOS</option>
																	<option value="P">PAGOS</option>
																	<option value="N">N&Atilde;O PAGOS</option>
																</select>
															</div>
															<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divcontrato">
																<label for="id_contrato">CONTRATO</label>	
																<input type="text" name="id_contrato" id="id_contrato" class="form-control" value="<?php if(isset($_GET['recibo']) && $_GET['recibo'] == 'S'){ echo $_GET['idcontrato'];}?>">
															</div>
															<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divmes">
																<label for="mes">M&Ecirc;S</label>
																<input type="text" name="mes" id="mes" class="form-control">
															</div>
															<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divano">
																<label for="ano">ANO</label>
																<input type="text" name="ano" id="ano" class="form-control">
															</div>
															<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divdata_ini">
																<label for="data_ini">DATA INICIAL</label>
																<input type="text" name="data_ini" id="data_ini" class="form-control" data-provide="datepicker" data-date-language="pt-BR" data-date-format="dd/mm/yyyy">
															</div>
															<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divdata_fin">
																<label for="data_fin">DATA FINAL</label>
																<input type="text" name="data_fin" id="data_fin" class="form-control" data-provide="datepicker" data-date-language="pt-BR" data-date-format="dd/mm/yyyy">
															</div>
														</form>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal"><b>FECHAR JANELA</b></button>
													<button type="button" class="btn btn-primary" onclick="buscarlancamentos_filtro();"><b>REALIZAR BUSCA</b></button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade" id="modalbuscaprelancamento">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title"><b>BUSCA DE PR&Eacute;-LAN&Ccedil;AMENTOS</b></h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<form id="formulariobuscaprelancamento">
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																<label for="cpfcnpj_prop">PROPRIET&Aacute;RIO</label>
																<select name="cpfcnpj_prop" id="cpfcnpj_prop" class="form-control" required="required">
																	<option value="T">TODOS</option>
																	<?php
																	$stmtprop = $conn->prepare("SELECT * FROM tabproprietarios ORDER BY nome ASC");
																	$stmtprop->execute();
																	$queryprop = $stmtprop->fetchAll();
																	foreach ($queryprop as $resultprop) {
																		?>
																		<option value="<?php echo $resultprop['cpfcnpj'];?>"><?php echo utf8_encode($resultprop['nome']);?></option>
																		<?php
																	}
																	?>
																</select>
															</div>
															<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 1%;">
																<label for="tipo">TIPO DE PR&Eacute;-LAN&Ccedil;AMENTO</label>
																<select name="tipo" id="tipo" class="form-control" required="required">
																	<option value="T">TODOS</option>
								                                    <option value="0">Energia el&eacute;trica/&aacute;gua</option>
								                                    <option value="1">IPTU</option>
								                                    <option value="2">Condom&iacute;nio</option>
								                                    <option value="3">Diversos</option>
								                                    <option value="4">Prestação</option>
																</select>
															</div>
															<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;">
																	<label for="inicio">DE</label>
																	<input type="text" name="inicio" id="inicio" class="form-control" data-provide="datepicker" data-date-language="pt-BR" data-date-format="dd/mm/yyyy" >
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;">
																	<label for="fim">AT&Eacute;</label>
																	<input type="text" name="fim" id="fim" class="form-control" data-provide="datepicker" data-date-language="pt-BR" data-date-format="dd/mm/yyyy">
																</div>
														</form>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal"><b>FECHAR JANELA</b></button>
													<button type="button" class="btn btn-primary" onclick="buscarprelancamentos();"><b>REALIZAR BUSCA</b></button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<a class="thumbnail text-center" href='#' onclick="modalIdOpen();">
										<!-- <span class="fa fa-plus fa-5x"></span><br> -->
										<h4><b>CADASTRAR LAN&Ccedil;AMENTOS BLOCO ALUGU&Eacute;IS</b></h4>
									</a>
									<div class="modal fade" id="modal-id">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title text-center"><b>CADASTRO DE LAN&Ccedil;AMENTOS</b></h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<form id="formcadastrolancamento">
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="divcontrato" style="margin-top: 1%;">
																	<label for="id_contrato"><b>CONTRATO</b></label>
																	<input type="text" name="id_contrato" id="id_contrato" class="form-control contrato">
																</div>
																<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="margin-top: 1%;">
																	<label for="id_lancamento">TIPO DE LAN&Ccedil;AMENTO</label>
																	<select class="form-control" name="id_lancamento" id="id_lancamento" onchange="exibircampos(this.value)">
																		<?php
																			$sqlcadastrotipolancamento = $conn->prepare("SELECT * FROM tabtipos_lancamentos ORDER BY descricao ASC");
																			$sqlcadastrotipolancamento->execute();
																			$cadastrotipolancamento= $sqlcadastrotipolancamento->fetchAll();
																			foreach ($cadastrotipolancamento as $tipolancamento) {
																		?>
																			<option value="<?php echo $tipolancamento['id'];?>"><?php echo utf8_encode($tipolancamento['descricao']);?></option>
																		<?php
																			}
																		?>
																	</select>
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="divparcelado" style="margin-top: 1%;">
																	<label>PARCELADO</label>
																	<select name="parcelado" id="parcelado" class="form-control" onchange="exibircamposparcelados(this.value);">
																		<option value="S" selected>SIM</option>
																		<option value="N">N&Atilde;O</option>
																	</select>
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="divprestacao" style="margin-top: 1%;">
																	<label for="prestacao">PRESTA&Ccedil;&Atilde;O</label>
																	<select class="form-control" name="prestacao" id="prestacao">
																		<option value="N">N&Atilde;O</option>
																		<option value="S">SIM</option>
																	</select>
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divvalor">
																	<label for="valor">VALOR</label>
																	<input type="text" name="valor" id="valor" class="form-control moeda">
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="divparcelas" style="display: none; margin-top: 1%;">
																	<label for="quantidadeparcelas">PARCELAS</label>
																	<input type="text" name="quantidadeparcelas" id="quantidadeparcelas" class="form-control">
																</div>
																<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="divdescricao" style="margin-top: 1%;">
																	<label for="descricao">DESCRI&Ccedil;&Atilde;O</label>
																	<input type="text" name="descricao" id="descricao" class="form-control">
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divdatavencto">
																	<label for="data_vencto">DATA VENCTO.</label>
																	<input type="text" name="data_vencto" id="data_vencto" class="form-control" data-provide="datepicker" data-date-language="pt-BR" data-date-format="dd/mm/yyyy">
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divano">
																	<label for="ano">ANO</label>
																	<input type="text" name="ano" id="ano" value="<?= date('Y') ?>" class="form-control">
																</div>
																<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 1%;" id="divmes_consumo">
																	<label id="label_consumo_nao_parcelado" for="mes_consumo">MÊS DE CONSUMO</label>
																	<label id="label_consumo_parcelado" for="mes_consumo" style="display: none;">1º MÊS DE CONSUMO</label>
																	<select name="mes_consumo" id="mes_consumo" class="form-control" required="required">
																		<option value="01">Janeiro</option>
																		<option value="02">Fevereiro</option>
																		<option value="03">Março</option>
																		<option value="04">Abril</option>
																		<option value="05">Maio</option>
																		<option value="06">Junho</option>
																		<option value="07">Julho</option>
																		<option value="08">Agosto</option>
																		<option value="09">Setembro</option>
																		<option value="10">Outubro</option>
																		<option value="11">Novembro</option>
																		<option value="12">Dezembro</option>
																	</select>
																</div>
																<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 1%;" id="divmes_vencimento">
																	<label id="label_vencimento_nao_parcelado" for="mes_vencimento">MÊS DE VENCIMENTO</label>
																	<label id="label_vencimento_parcelado" for="mes_vencimento" style="display: none;">1º MÊS DE VENCIMENTO</label>
																	<select name="mes_vencimento" id="mes_vencimento" class="form-control" required="required">
																		<option value="01">Janeiro</option>
																		<option value="02">Fevereiro</option>
																		<option value="03">Março</option>
																		<option value="04">Abril</option>
																		<option value="05">Maio</option>
																		<option value="06">Junho</option>
																		<option value="07">Julho</option>
																		<option value="08">Agosto</option>
																		<option value="09">Setembro</option>
																		<option value="10">Outubro</option>
																		<option value="11">Novembro</option>
																		<option value="12">Dezembro</option>
																	</select>
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divqtd_repeticoes">
																	<label for="qtd_repeticoes">REPETIR POR</label>
																	<select name="qtd_repeticoes" id="qtd_repeticoes" class="form-control" required="required">
																		<?php
																		for($i = 1; $i <= 12; $i++){
																		?>
																			<option value="<?= $i ?>"><?= $i ?> mes(es)</option>
																		<?php
																		}
																		?>
																	</select>
																	<!-- <input type="text" name="qtd_repeticoes" id="qtd_repeticoes" placeholder="x meses" class="form-control"> -->
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divinicio">
																	<label for="inicio">DE</label>
																	<input type="text" name="inicio" id="inicio" class="form-control" data-provide="datepicker" data-date-language="pt-BR" data-date-format="dd/mm/yyyy" >
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divfim">
																	<label for="fim">AT&Eacute;</label>
																	<input type="text" name="fim" id="fim" class="form-control" data-provide="datepicker" data-date-language="pt-BR" data-date-format="dd/mm/yyyy">
																</div>
																<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top: 1%;" id="divrecebidopor">
																	<label for="recebidopor">CREDITAR/DEBITAR</label>
																	<select class="form-control" name="recebidopor" id="recebidopor">
																		<option value="CI">CREDITAR ADM.(+)</option>
																		<option value="DI">DEBITAR ADM.(-)</option>
																		<option value="CP">CREDITAR PROP.(+)</option>
																		<option value="DP">DEBITAR PROP.(-)</option>
																	</select>
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;">
																	<label for="boleto">BOLETO</label>
																	<select class="form-control" name="boleto" id="boleto">
																		<option value="S">SIM</option>
																		<option value="N">NÃO</option>
																	</select>
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;">
																	<label for="recibo">RECIBO</label>
																	<select class="form-control" name="recibo" id="recibo">
																		<option value="S">SIM</option>
																		<option value="N">NÃO</option>
																	</select>
																</div>
																<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="divobservacao" style="margin-top: 1%;">
																	<label for="observacao">OBSERVA&Ccedil;&Atilde;O</label>
																	<textarea class="form-control" name="observacao" id="observacao" rows="2" cols="1"></textarea>
																</div>
															</div>
														</form>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal"><b>FECHAR</b></button>
													<button type="button" class="btn btn-primary" onclick="cadastrarlancamento();"><b>CADASTRAR</b></button>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<a class="thumbnail text-center" data-toggle="modal" href='#modalCadastroLancamentoLocador'>
										<!-- <span class="fa fa-plus fa-5x"></span><br> -->
										<h4><b>CADASTRAR LAN&Ccedil;AMENTOS DIRETO NO BLOCO LOCADOR</b></h4>
									</a>
									<div class="modal fade" id="modalCadastroLancamentoLocador">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title text-center"><b>CADASTRO DE LAN&Ccedil;AMENTOS - DIRETO NO BLOCO LOCADOR</b></h4>
												</div>
												<div class="modal-body">
													<form id="formcadastrarlancamentoslocador">
														<div class="row">
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																<label for="cpfcnpj_prop">PROPRIET&Aacute;RIO</label>
																<select name="cpfcnpj_prop" id="cpfcnpj_prop" class="form-control" required="required">
																	<option disabled selected>SELECIONE</option>
																	<?php
																		$stmtprop = $conn->prepare("SELECT * FROM tabproprietarios ORDER BY nome ASC");
																		$stmtprop->execute();
																		$queryprop = $stmtprop->fetchAll();
																		foreach ($queryprop as $resultprop) {
																	?>
																		<option value="<?php echo $resultprop['cpfcnpj'];?>"><?php echo utf8_encode($resultprop['nome']);?></option>
																	<?php
																		}
																	?>
																</select>
															</div>
															<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" id="dividlancamento" style="margin-top: 1%;">
																<label for="id_lancamento">TIPO DE LAN&Ccedil;AMENTO</label>
																<select name="id_lancamento" id="id_lancamento" class="form-control" required="required">
																		<?php
																			$sqlcadastrotipolancamento = $conn->prepare("SELECT * FROM tabtipos_lancamentos ORDER BY descricao ASC");
																			$sqlcadastrotipolancamento->execute();
																			$cadastrotipolancamento= $sqlcadastrotipolancamento->fetchAll();
																			foreach ($cadastrotipolancamento as $tipolancamento) {
																		?>
																			<option value="<?php echo $tipolancamento['id'];?>"><?php echo utf8_encode($tipolancamento['descricao']);?></option>
																		<?php
																			}
																		?>
																</select>
															</div>
															<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="margin-top: 1%;">
																<label for="descricao">DESCRI&Ccedil;&Atilde;O</label>
																<input type="text" name="descricao" id="descricao" class="form-control" value="" required="required" pattern="" title="">
															</div>
															<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divvalor">
																<label for="valor">VALOR</label>
																<input type="text" name="valor" id="valor" class="form-control moeda">
															</div>
															<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divdatavencto">
																<label for="data_vencto">DATA VENCTO.</label>
																<input type="text" name="data_vencto" id="data_vencto" class="form-control" data-provide="datepicker" data-date-language="pt-BR" data-date-format="dd/mm/yyyy">
															</div>
															<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;">
																<label for="sinal">SINAL</label>
																<select name="sinal" id="sinal" class="form-control" required="required">
																	<option value="+">+</option>
																	<option value="-">-</option>
																</select>
															</div>
															<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;">
																<label for="prestacao">PRESTA&Ccedil;&Atilde;O</label>
																<select name="prestacao" id="prestacao" class="form-control" required="required">
																	<option value="S">SIM</option>																	
																</select>
															</div>
															<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top: 1%;">
																<label for="situacao">SITUA&Ccedil;&Atilde;O</label>
																<select name="situacao" id="situacao" class="form-control" ">																	
																	<option value="3">PAGO/VALIDADO</option>
																</select>
															</div>

															<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divdatavencto">
																<label for="data_pagto">DATA PAGTO.</label>
																<input type="text" name="data_pagto" id="data_pagto" class="form-control" data-provide="datepicker" data-date-language="pt-BR" data-date-format="dd/mm/yyyy">
															</div>									
														</div>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal"><b>FECHAR</b></button>
													<button type="button" class="btn btn-primary" onclick="cadastrarlancamentolocador();"><b>CADASTRAR</b></button>
												</div>
											</div>
										</div>
									</div>
								</div>










								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<a class="thumbnail text-center" data-toggle="modal" href='#modalCadastroLancamentoLocadorEditavel'>
										<!-- <span class="fa fa-plus fa-5x"></span><br> -->
										<!-- trocar o nome desse modal -->
										<h4><b>CADASTRAR LAN&Ccedil;AMENTOS LOCADOR</b></h4>
									</a>
									<div class="modal fade" id="modalCadastroLancamentoLocadorEditavel">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title text-center"><b>CADASTRO DE LAN&Ccedil;AMENTOS -  LOCADOR</b></h4>
												</div>
													<div class="modal-body">
														<form id="formcadastrarlancamentoslocadoreditavel">
																
																<div class="row">
																	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
																		<label for="cpfcnpj_prop">PROPRIET&Aacute;RIO</label>
																		<select name="cpfcnpj_prop" id="cpfcnpj_prop" class="form-control" required="required">
																			<option disabled selected>SELECIONE</option>
																			<?php
																				$stmtprop = $conn->prepare("SELECT * FROM tabproprietarios ORDER BY nome ASC");
																				$stmtprop->execute();
																				$queryprop = $stmtprop->fetchAll();
																				foreach ($queryprop as $resultprop) {
																			?>
																				<option value="<?php echo $resultprop['cpfcnpj'];?>"><?php echo utf8_encode($resultprop['nome']);?></option>
																			<?php
																				}
																			?>
																		</select>
																		<button type="button" class="btn btn-primary" onclick="buscarimoveis();"><b>BUSCAR IMOVEIS</b></button>

																	</div>
																	<div class="col-xs-9 col-sm-9 col-md-2 col-lg-2" id="divcontrato" style="margin-top: 1%;">
																		<label for="id_contrato"><b>CONTRATO</b></label>
																		<input type="text" name="id_contrato" id="id_contrato" class="form-control">
																	</div>
																</div>

																<div class="row">
																	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
																	<label for="id_imovel">IMOVEL</label>
																	<select name="id_imovel" id="id_imovel" class="form-control">
																		<option disabled selected>SELECIONE</option>

																			<?php

																				
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

																
																

																<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" id="divimovel" style="margin-top: 1%;">
																<label for="id_imovel"><b>IMOVEIS</b></label>
																	<input type="text" name="id_imovel" id="id_imovel" class="form-control">

																</div>																

						
																

																<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" id="dividlancamento" style="margin-top: 1%;">
																	<label for="id_lancamento">TIPO DE LAN&Ccedil;AMENTO</label>
																	<select name="id_lancamento" id="id_lancamento" class="form-control" required="required">
																			<?php
																				$sqlcadastrotipolancamento = $conn->prepare("SELECT * FROM tabtipos_lancamentos ORDER BY descricao ASC");
																				$sqlcadastrotipolancamento->execute();
																				$cadastrotipolancamento= $sqlcadastrotipolancamento->fetchAll();
																				foreach ($cadastrotipolancamento as $tipolancamento) {
																			?>
																				<option value="<?php echo $tipolancamento['id'];?>"><?php echo utf8_encode($tipolancamento['descricao']);?></option>
																			<?php
																				}
																			?>
																	</select>
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divmes">
																	<label for="mes">M&Ecirc;S</label>
																	<input type="text" name="mes" id="mes" class="form-control">
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divano">
																	<label for="ano">ANO</label>
																	<input type="text" name="ano" id="ano" class="form-control">
																</div>																
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divdatavencto">
																	<label for="data_vencto">DATA VENCTO.</label>
																	<input type="text" name="data_vencto" id="data_vencto" class="form-control" data-provide="datepicker" data-date-language="pt-BR" data-date-format="dd/mm/yyyy">
																</div>
																<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 1%;" id="divvalor">
																	<label for="valor">VALOR</label>
																	<input type="text" name="valor" id="valor" class="form-control moeda">
																</div>
																<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="margin-top: 1%;">
																	<label for="descricao">DESCRI&Ccedil;&Atilde;O</label>
																	<textarea name="descricao" id="descricao" class="form-control" rows="5"></textarea>
																	<!-- SE DER PROBLEMA DESCOMENTE ESSA LINHA 
																	<input type="text" name="descricao" id="descricao" class="form-control" value="" required="required" pattern="" title="" rows="5">-->
																</div>															
														</form>
													</div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal"><b>FECHAR</b></button>
													<button type="button" class="btn btn-primary" onclick="cadastrarlancamentolocadoreditavel();"><b>CADASTRAR</b></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>












								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<a class="thumbnail text-center" data-toggle="modal" href='#modalResetarPrestacao'>
										<!-- <span class="fa fa-plus fa-5x"></span><br> -->
										<h4><b>RESETAR PRESTAÇÃO DE CONTAS</b></h4>
									</a>
									<div class="modal fade" id="modalResetarPrestacao">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title text-center"><b>RESETAR PRESTAÇÃO DE CONTAS</b></h4>
												</div>
												<div class="modal-body">
													<form id="formresetarprestacao">
														<div class="row">
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																<label for="cpfcnpj_prop">PROPRIET&Aacute;RIO</label>
																<select name="cpfcnpj_prop" id="cpfcnpj_prop" class="form-control" required="required">
																	<option disabled selected>SELECIONE</option>
																	<?php
																		$stmtprop = $conn->prepare("SELECT * FROM tabproprietarios ORDER BY nome ASC");
																		$stmtprop->execute();
																		$queryprop = $stmtprop->fetchAll();
																		foreach ($queryprop as $resultprop) {
																	?>
																		<option value="<?php echo $resultprop['cpfcnpj'];?>"><?php echo utf8_encode($resultprop['nome']);?></option>
																	<?php
																		}
																	?>
																</select>
															</div>															
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" onclick="desbloquearlancamentos();"><b>DESBLOQUEAR LANCAMENTOS</b></button>
													<button type="button" class="btn btn-default" data-dismiss="modal"><b>FECHAR</b></button>
													<button type="button" class="btn btn-primary" onclick="resetarprestacao();"><b>RESETAR</b></button>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="divconteudo"></div>
	</div>
</body>

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script src="../jquerys/vex-master/js/vex.combined.min.js"></script>
<script type="text/javascript">vex.defaultOptions.className = 'vex-theme-bottom-right-corner';</script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('body').on('padding-right', '0');
	});

	$('#ano').mask('0000');
	$('.contrato').mask('0000.0');
	// $("#qtd_repeticoes").mask('00');
	$("#quantidadeparcelas").mask('00');
	$(".moeda").maskMoney({allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
	$(".modalformeditlanc").on("show.bs.modal", function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"));
	});

	// Função que deixa pré-selecionado um tipo de lançamento ao abrir o modal de cadastro de lançamentos no bloco de alugueis. Ela existe para previnir bugs.
	function modalIdOpen(){
		$("#modal-id").modal();
		$("#formcadastrolancamento #id_lancamento option:selected").removeAttr('selected');
		$("#formcadastrolancamento #prestacao option:selected").removeAttr('selected');
		$("#formcadastrolancamento #parcelado option[value='N']").prop('selected', true);
		$("#formcadastrolancamento #divdatavencto").show(500);
		$("#formcadastrolancamento #divinicio").show(500);
		$("#formcadastrolancamento #divfim").show(500);
		$("#formcadastrolancamento #divano").hide(500);
		$("#formcadastrolancamento #divqtd_repeticoes").hide(500);
		$("#formcadastrolancamento #divmes_consumo").hide(500);
		$("#formcadastrolancamento #divmes_vencimento").hide(500);
		$("#formcadastrolancamento #divparcelado").hide(500);
		$("#formcadastrolancamento #divparcelas").hide(500);
	}

	function exibircampos(valor){
		// Respectivamente: Aluguel, IRRF, IPTU, Água, Energia elétrica, Condomínio, Taxa extra condomínio, Taxa Administrativa (10%) e Taxa de limpeza
		if(valor == 1 || valor == 3 || valor == 4 || valor == 5 || valor == 6 || valor == 7 || valor == 22 || valor == 32 || valor == 99){
			// Campos em comum para tipos de lançamentos que podem ser parcelados ou replicados para vários meses:
			$("#formcadastrolancamento #divmes_consumo").show(500);
			$("#formcadastrolancamento #divmes_vencimento").show(500);
			$("#formcadastrolancamento #divano").show(500);
			$("#formcadastrolancamento #divdatavencto").hide(500);
			$("#formcadastrolancamento #divinicio").hide(500);
			$("#formcadastrolancamento #divfim").hide(500);

			// Campos para tipos lançamentos que podem ser parcelados
			if(valor == 4 || valor == 5 || valor == 6 || valor == 22){
				$("#formcadastrolancamento #divparcelado").show(500);
				$("#formcadastrolancamento #parcelado option[value='S']").prop('selected', true);
				$("#formcadastrolancamento #divqtd_repeticoes").hide(500);
				exibircamposparcelados('S');
			}else{
				$("#formcadastrolancamento #divparcelado").hide(500);
				$("#formcadastrolancamento #parcelado option[value='N']").prop('selected', true);
				$("#formcadastrolancamento #divqtd_repeticoes").show(500);
				exibircamposparcelados('N');
			}
		}else{
			// Campos que referem-se à lançamentos que são feitos de forma individual (sem replicação e sem parcela):
			$("#formcadastrolancamento #divmes_consumo").hide(500);
			$("#formcadastrolancamento #divmes_vencimento").hide(500);
			$("#formcadastrolancamento #divano").hide(500);

			$("#formcadastrolancamento #divdatavencto").show(500);
			$("#formcadastrolancamento #divinicio").show(500);
			$("#formcadastrolancamento #divfim").show(500);

			$("#formcadastrolancamento #divparcelado").hide(500);
			$("#formcadastrolancamento #divparcelas").hide(500);
			$("#formcadastrolancamento #divqtd_repeticoes").hide(500);
		}
	}

	function exibircamposparcelados(valor){
		if(valor == "S"){
			$("#formcadastrolancamento #divparcelas").show(500);
			$("#formcadastrolancamento #label_consumo_parcelado").show(500);
			$("#formcadastrolancamento #label_vencimento_parcelado").show(500);
			$("#formcadastrolancamento #label_consumo_nao_parcelado").hide(500);
			$("#formcadastrolancamento #label_vencimento_nao_parcelado").hide(500);
		}else{
			$("#formcadastrolancamento #divparcelas").hide(500);
			$("#formcadastrolancamento #label_consumo_parcelado").hide(500);
			$("#formcadastrolancamento #label_vencimento_parcelado").hide(500);
			$("#formcadastrolancamento #label_consumo_nao_parcelado").show(500);
			$("#formcadastrolancamento #label_vencimento_nao_parcelado").show(500);
		}
	}

	// Função que esconde/exibe data de pagamento caso o lançamento esteja validado. Refere-se ao modal de lançamentos do bloco locador.
	function exibircampospagamento(valor){
		if(valor == 3)
			$("#divdatapagamentolocador").show(500);
		else
			$("#divdatapagamentolocador").hide(500);
	}

	// Função que esconde/exibe o filtro de pesquisa conforme o bloco de lançamento selecionado.
	function exibeCamposFormularioBusca(valor){
		if(valor == 0){
			// $("#formulariobusca")
			$("#divdata_ini").show(500);
			$("#divdata_fin").show(500);
			$("#divano").show(500);
			$("#divmes").show(500);
			$("#divcontrato").show(500);
			$("#divsituacao").show(500);
			$("#dividlancamento").show(500);
			$("#formulariobusca #cpfcnpj_prop option:eq(0)").prop('selected', true);
			$("#formulariobusca #cpfcnpj_prop option[value='T']").prop('disabled', false);
		}else if(valor == 1){
			$("#divdata_ini").hide(500);
			$("#divdata_fin").hide(500);
			//$("#divdata_ini").show(500);
			//$("#divdata_fin").show(500);
			$("#divano").hide(500);
			$("#divmes").hide(500);
			$("#divcontrato").hide(500);
			$("#divsituacao").hide(500);
			$("#dividlancamento").hide(500);
			$("#formulariobusca #cpfcnpj_prop option:eq(1)").prop('selected', true);
			$("#formulariobusca #cpfcnpj_prop option[value='T']").prop('disabled', true);
		}
	}

	// Função que realiza a busca dos lançamentos com base no modal de filtro de pesquisa
	function buscarlancamentos_filtro(){
		var form = $("#formulariobusca").serialize();
		var bloco = $("#formulariobusca #bloco_lancamento:checked").val();
		if(bloco == 0){
			$.ajax({
				url: 'listalancamentos.php',
				type: 'post',
				data: form,
				beforeSend: function(){
					$("#divconteudo").html("<div class='row'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'><b>Carregando...</b></div></div>");
					$('.modal').modal('hide');
		            $('.modal-backdrop').remove();$('body').removeClass('modal-open');    
				},
				success: function (retorno) {
					$("#divconteudo").html(retorno);
				}
			});
		}else if(bloco == 1){
			$.ajax({
				url: '_listar_lancamento_locador.php',
				type: 'POST',
				data: form,
				beforeSend: function(){
					$("#divconteudo").html("<div class='row'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'><b>Carregando...</b></div></div>");
					$('.modal').modal('hide');
		            $('.modal-backdrop').remove();$('body').removeClass('modal-open');   
				},
				success: function (data) {
					$("#divconteudo").html(data);
				}
			});
		}
	}

	// Função que lista os lançamentos filtrados
	function buscarlancamentos(){
		var form = $("#formulariobusca").serialize();
		$.ajax({
			url: 'listalancamentos.php',
			type: 'post',
			data: form,
			beforeSend: function(){
				$("#divconteudo").html("<div class='row'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'><b>Carregando...</b></div></div>");
	        	$('.modal').modal('hide');
	        	$('body').removeClass('modal-open');  
	        	$('.modal-backdrop').remove();
			},
			success: function (retorno) {
				$("#divconteudo").html(retorno);
			}
		});
	}

	// Função que realiza a listagem de lançamentos após o cadastro do mesmo.
	function listalancamentos_apos_cadastro(){
		var formulario = $("#formulariocarregalistalancamentos").serialize();
		$.ajax({
			url: 'listalancamentos.php',
			type: 'post',
			data: formulario,
			beforeSend: function(){
				$("#divconteudo").html("<div class='row'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'><b>Carregando...</b></div></div>");
				$('.modal').modal('hide');
		        $('.modal-backdrop').remove();$('body').removeClass('modal-open');   
			},
			success: function (retorno) {
				$("#divconteudo").html(retorno);
			}
		});
	}

	// Função que lista os lançamentos do locador
	function lista_lancamentos_locador(cpfcnpj_prop){
		$.ajax({
			url: '_listar_lancamento_locador.php',
			method: 'POST',
			data: {cpfcnpj_prop: cpfcnpj_prop},
			beforeSend: function(){
				$("#divconteudo").html("<div class='row'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'><b>Carregando...</b></div></div>");
				$('.modal').modal('hide');
		        $('.modal-backdrop').remove();$('body').removeClass('modal-open');   
			},
			success: function (retorno) {
				$("#divconteudo").html(retorno);
			}
		});
	}

	function buscarprelancamentos(){
		var form = $("#formulariobuscaprelancamento").serialize();
		var data_inicio = $("#formulariobuscaprelancamento #inicio").val();
		var data_fim = $("#formulariobuscaprelancamento #fim").val();
		if((data_inicio == "" && data_fim != "") || (data_inicio != "" && data_fim == "")){
			alert("Dados inválidos para data!");
		}else{
			$.ajax({
				url: 'listarprelancamentos.php',
				type: 'POST',
				data: form,
				beforeSend: function(){
					$("#divconteudo").html("<div class='row'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'><b>Carregando...</b></div></div>");
					$('.modal').modal('hide');
		            $('.modal-backdrop').remove();$('body').removeClass('modal-open');   
				},
				success: function (retorno) {
					$("#divconteudo").html(retorno);
				}
			});
		}
	}

	function updatelancamento(id){
		var form = $("#formupdatelancamento").serialize();
		$.ajax({
			url: 'atualizarlancamento.php',
			type: 'post',
			data: form,
			success: function (retorno) {
				$.alert('Lan&ccedil;amento atualizado com sucesso !');
				$('.modal').modal('hide');
		        $('.modal-backdrop').remove();$('body').removeClass('modal-open');
				$("#divconteudo").html(retorno);
			}
		});
	}

	function excluirlancamentounico(id){
		$.confirm({
			title: 'Aten&ccedil;&atilde;o !',
			content: 'Confirma a exclus&atilde;o deste lan&ccedil;amentos?',
			animation: 'zoom',
			type: 'red',
			closeAnimation: 'scale',
			buttons: {
				Confirmar: function(){
					$.ajax({
						url: 'excluirlancamentoindividual.php',
						type: 'post',
						data: {id:id},
						success: function (retorno) {
							$.alert('Lan&ccedil;amento exclu&iacute;dos com sucesso !');
							$("#listalancamentos").html(retorno);
						}
					});
				},
				Cancelar: function(){
					$.alert('A&ccedil;&atilde;o cancelada.');	
				}
			}
		});
	}

	function excluirtodoslancamentos(idcontrato){
		$.confirm({
			title: 'Aten&ccedil;&atilde;o !',
			content: 'Confirma a exclus&atilde;o de todos os lan&ccedil;amentos?',
			animation: 'zoom',
			type: 'red',
			closeAnimation: 'scale',
			buttons: {
				Confirmar: function(){
					$.ajax({
						url: 'excluirtodoslancamentos.php?idcontrato='+idcontrato,
						type: 'post',
						beforeSend: function(){
							$("#listalancamentos").html("Excluindo lanc...");
						},
						success: function (retorno) {
							$.alert('Lan&ccedil;amentos exclu&iacute;dos com sucesso !');
							$("#listalancamentos").html(retorno);		
						}
					});
				},
				Cancelar: function(){
					$.alert('A&ccedil;&atilde;o cancelada.');	
				}
			}
		});
	}

	function cadastrarlancamento(){
		var form = $("#formcadastrolancamento").serialize();
		$.ajax({
				url: 'registrarlancamento.php',
				type: 'post',
				data: form,
				success: function (retorno) {
					$('.modal').modal('hide');
		            $('.modal-backdrop').remove();$('body').removeClass('modal-open');
					$("#divconteudo").html(retorno);
				}
			});
	}


	function buscarimoveis3(){			
 
			var cpfcnpj_prop = $("#formcadastrarlancamentoslocadoreditavel #cpfcnpj_prop").val();

	}
	function buscarimoveis2(){			
 
			var cpfcnpj_prop = $("#formcadastrarlancamentoslocadoreditavel #cpfcnpj_prop").val();
			return cpfcnpj_prop; 
	}

	function validarlancamento(idlancamento){
		$.confirm({
			title: 'Aten&ccedil;&atilde;o !',
			content: 'Confirma a baixa do lan&ccedil;amento selecionado ?<br>'+
			'<div class="form-group">' +
			'<label>DATA DE PAGAMENTO</label>' +
			'<input type="text" class="name form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="pt-BR" name="datapagto" id="datapagto" required />' +
			'<label>FORMA DE PAGAMENTO</label>' +
			'<select class="form-control" name="tiporec" id="tiporec">' +
			'<option value="E">Balc&atilde;o (Esp&eacute;cie) </option>' +
			'<option value="C">Cheque </option>' +
			'<option value="T">Boleto </option>' +
			'<option value="CDC">Desconto cau&ccedil;&atilde;o</option>' +
			'<option value="AP">Cr&eacute;dito em conta</option>' +
			'</select>' +
			'</div>',
			animation: 'zoom',
			type: 'red',
			closeAnimation: 'scale',
			buttons: {
				Confirmar: function(){
					var arr = [];
					var datapagto = $("#datapagto").val();
					var tiporec = $("#tiporec").val();
					$.ajax({
						url: 'validarlancamento.php',
						type: 'post',
						data: {idlancamento : idlancamento, data_pagto : datapagto, tiporec : tiporec},
						beforeSend: function(){
							$("#listalancamentos").html("<b>Realizando baixa...</b>");
						},
						success: function (retorno) {
							$("#listalancamentos").html(retorno);
							//$.alert('Lan&ccedil;amento baixado com sucesso !');
						//	$.alert('Lan&ccedil; conferido com sucesso !');
							//$.alert('Lan&ccedil;amento validado com sucesso !');
							$.alert('Lan&ccedil;amento enviado com sucesso !');
							$('.modal').modal('hide');
		                	$('.modal-backdrop').remove();$('body').removeClass('modal-open');
						}
					});
				},
				Cancelar: function(){
					$.alert('A&ccedil;&atilde;o cancelada.');	
				}
			}
		});
	}

	function ModalLancamentosRegistrados(id){
		$.ajax({
			type: "POST",
			url: "../adminboletos/ajax/modal_lancamentos_registrados2.ajax.php?id="+id+"&tipo=BV",
			data: "teste",
			success: function(dados) {
				vex.dialog.buttons.YES.text = "FECHAR";
				vex.dialog.alert(dados);
			},
			error: function(){
				$("#DivDadosBoleto").html("ERROR");	
			}
		});
	}

	function cadastrarlancamentolocador(){
		var form = $("#formcadastrarlancamentoslocador").serialize();
		$.ajax({
			url: 'registrarlancamentolocador.php',
			type: 'post',
			data: form,
			success: function(data){
				// console.log(data);
				$.alert('Lan&ccedil;amento registrado com sucesso !');
				$('.modal').modal('hide');
		        $('.modal-backdrop').remove();$('body').removeClass('modal-open');
				$("#divconteudo").html(data);
			},
			error: function(jqXHR, textStatus, errorThrown){
				$.alert("Error: "+errorThrown);
			}
		});
	}
	


	function desbloquearlancamentos(){
		var form = $("#formresetarprestacao").serialize();
		$.ajax({
			url: 'desbloquear_lancamentos.php',
			type: 'post',
			data: form,
			success: function(data){
				console.log(data);
				$.alert('Lancamentos desbloqueados com sucesso !');
				$('.modal').modal('hide');
		        $('.modal-backdrop').remove();$('body').removeClass('modal-open');
				$("#divconteudo").html(data);
			},
			error: function(jqXHR, textStatus, errorThrown){
				$.alert("Error: "+errorThrown);
			}
		});
	}
	


	function resetarprestacao(){
		var form = $("#formresetarprestacao").serialize();
		$.ajax({
			url: 'reset_prestacao.php',
			type: 'post',
			data: form,
			success: function(data){
				console.log(data);
				$.alert('Prestacao resetada com sucesso !');
				$('.modal').modal('hide');
		        $('.modal-backdrop').remove();$('body').removeClass('modal-open');
				$("#divconteudo").html(data);
			},
			error: function(jqXHR, textStatus, errorThrown){
				$.alert("Error: "+errorThrown);
			}
		});
	}
	




	function cadastrarlancamentolocadoreditavel(){
		var form = $("#formcadastrarlancamentoslocadoreditavel").serialize();
		$.ajax({
			url: 'registrarlancamentolocadoreditavel.php',
			type: 'post',
			data: form,
			success: function(data){
				console.log(data);
				$.alert('Lan&ccedil;amento registrado com sucesso !');
				$('.modal').modal('hide');
		        $('.modal-backdrop').remove();$('body').removeClass('modal-open');
				$("#divconteudo").html(data);
			},
			error: function(jqXHR, textStatus, errorThrown){
				$.alert("Error: "+errorThrown);
			}
		});
	}
	
	// Função que carrega o modal com informações chaves para as consultas necessárias para efetuar a baixa.
	function carregaModal(id, tipo_tabprelancamento){
		$.ajax({
			url: "_modal_baixa_prelancamento.php",
			method: "POST",
			data: {
				id: id,
				tipo_tabprelancamento: tipo_tabprelancamento
			},
			success: function(retorno){
				$("#modal-body-baixa-prelancamento").html(retorno);
			}
		});
	}
	
	function refreshPage(){
        $('.modal').modal('hide');
		$('.modal-backdrop').remove();$('body').removeClass('modal-open');
        window.location.href = "https://www.manausimovel.com.br/sec/lancamentos/";
    }

    function buscarimoveis(){
		var cpfcnpj_prop = $("#formcadastrarlancamentoslocadoreditavel #cpfcnpj_prop").val();

		$.ajax({
			url: "_modal_buscar_imoveis.php",
			method: "POST",
			data: {
				cpfcnpj_prop: cpfcnpj_prop,				
			},
			success: function (retorno) {
					//$("#modal-body").html(retorno);
				    $("#modal-body").append("<h1>Título</h1>");

				}			
		});
	}

		function resetarlancamento(idlancamento){
		$.confirm({
			title: 'Aten&ccedil;&atilde;o !',
			content: 'Confirma o reset deste lan&ccedil;amentos?',
			animation: 'zoom',
			type: 'red',
			closeAnimation: 'scale',
			buttons: {
				Confirmar: function(){
					$.ajax({
						url: 'resetarlancamento.php',
						type: 'post',
						data: {id:idlancamento},
						success: function (retorno) {
							$.alert('Lan&ccedil;amento resetado com sucesso !');
							$('.modal').modal('hide');
		               		$('.modal-backdrop').remove();$('body').removeClass('modal-open');
							$("#listalancamentos").html(retorno);
						}
					});
				},
				Cancelar: function(){
					$.alert('A&ccedil;&atilde;o cancelada.');	
				}
			}
		});
	}


</script>
</html>