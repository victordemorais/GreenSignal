<?php 
	
	include_once("db/connect.php");
	include_once("inc/header.php");
	include_once("inc/mask.php");
	
if(isset($_POST['submit'])){
		
	$db = new Database();
		$nome= mysqli_real_escape_string($db->connect, $_POST['nome']);
		$idade= mysqli_real_escape_string($db->connect, $_POST['idade']);
		$tipo_pessoa= mysqli_real_escape_string($db->connect, $_POST['tipo_pessoa']);
		$cpfcnpj= mysqli_real_escape_string($db->connect, $_POST['cpfcnpj']);
		
		
	
	$query = "insert into cliente(nome, idade, tipo_pessoa,cpf_cnpj, ativo,criadoem, atualizadoem) values ('$nome',$idade,'$tipo_pessoa','$cpfcnpj',1,'".date('Y-m-d') ."','". date('Y-m-d') ."')";
	$insert = $db->insert($query);
	}
	?>
	
	
<div class="main" style="max-width:500px; text-align:center">
<form action="create.php" method="post">
<div  class="separated">
	<label class="label_form">Nome</label>
	<input type="text" name="nome" placeholder="Digite o nome do cliente." required>
</div>
<div class="separated">
	<label class="label_form">Idade</label>
	<input type="text" name="idade" placeholder="Digite a idade." required>
</div>
<div  class="separated">
	<label class="label_form">Tipo de Pessoa</label>
	<select name="tipo_pessoa" required>
		<option value="">Selecione</option>
		<option value="Física">Pessoa Física</option>
		<option value="Jurídica">Pessoa Jurídica</option>
	</select>
</div>
<div  class="separated">
	<label class="label_form">CPF / CNPJ</label>
	<input type="text" name="cpfcnpj" placeholder="Digite o nome do cliente." id="cpfcnpj" required>
</div>
	<a href="index.php" class="btn" style="width:49%; border-color:#09f; color:#09f;"><i class="fa fa-angle-double-left"></i> Voltar</a>
	<button type="submit" name="submit" class="btn" style="width:50%; background:#27AE60; color:#fff"><i class="fa fa-user-plus"></i> Cadastrar Cliente</button>
	
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script type="text/javascript">
	$("#cpfcnpj").keydown(function(){
    try {
    	$("#cpfcnpj").unmask();
    } catch (e) {}
    
    var tamanho = $("#cpfcnpj").val().length;
	
    if(tamanho < 11){
        $("#cpfcnpj").mask("999.999.999-99");
    } else if(tamanho >= 11){
        $("#cpfcnpj").mask("99.999.999/9999-99");
    }
    
    var elem = this;
    setTimeout(function(){
    	elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});
</script>
<?php include_once("inc/footer.php");?>