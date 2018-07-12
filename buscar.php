<?php 

try {
	$pdo = new PDO("mysql:dbname=agendamob;host=localhost", "root", "");
} catch (PDOException $e) {
	echo "erro".$e->getMenssage();
} 

?>

<?php 

if (empty($_POST['texto'])) {
	$texto = addslashes($_POST['texto']);

	$sql = prepare("SELECT * FROM am_local_atendimento WHERE DS_LOCAL_ATENDIMENTO LIKE :texto");
	$sql->bindValue(":texto", "%".$texto."%");
	$sql->execute();

	if ($sql->rowCount() > 0) {
		
		foreach ($sql->fetchAll() as $pessoa) {
			echo $pessoa['nome']."<br>";
		}
	}
}


 ?>