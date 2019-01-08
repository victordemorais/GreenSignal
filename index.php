<?php 
	
	include_once("db/connect.php");
	include_once("inc/header.php");
	include_once("inc/mask.php");
	$db = new Database();
	$query = "SELECT * FROM cliente";
	$read = $db->select($query);
	?>
	<div class="main">
	<a href="create.php" class="btn"><i class="fa fa-user-plus"></i> Novo Cliente</a>
<table>
<thead>
<tr>
 <th>#</th>
 <th>Nome</th>
 <th>Idade</th>
 <th>Tipo de Pessoa</th>
 <th>CPF/CNPJ</th>
 <th>Status</th>
 <th>Cliente Desde</th>
 <th>Atualizado em</th>
 <th>Ação</th>
</tr>
</thead>
<?php 
while($row = $read->fetch_assoc()){
?>
<tr>

 <td><?=  $row['id']; ?></td>
 <td><?=  $row['nome']; ?></td>
 <td><?=  $row['idade']; ?></td>
 <td><?=  $row['cpf_cnpj']; ?></td>
  <td><?php if($row['ativo'] == 1){
  echo "Ativo";
  }else{
  echo "Inativo";
  }
  ?></td>
 <td><?=  $row['tipo_pessoa']; ?></td>
 <td><?= date("d/m/Y", strtotime($row['criadoem'])); ?></td>
 <td><?= date("d/m/Y", strtotime($row['atualizadoem'])); ?></td>
 <td><a href="update.php?id=<?=$row['id'];?>" class="btn-small" style="background:#09f" ><i class="fa fa-edit"></i></a>
 <a href="delete.php?id=<?=$row['id'];?>" class="btn-small" style="background:#E74C3C" ><i class="fa fa-trash"></i></a> </td>
</tr>
<?php } ?>
</table>
</div>
<?php include_once("inc/footer.php");?>