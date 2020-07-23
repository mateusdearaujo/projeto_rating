<?php

try {
    $pdo = new PDO("mysql:dbname=projeto_rating;host=localhost:3306", "mateus", "");
} catch(PDOException $e) {
    echo "Erro: ".$e->getMessage();
}

$sql = $pdo->query("SELECT * FROM filmes");
$sql->execute();

if($sql->rowCount() > 0) {
    $sql = $sql->fetchAll();
} else {
    echo "Não há filmes cadastrados";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rating</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
<div class="container">
    <h1>Filmes</h1>

    <?php foreach($sql as $filme): ?>
        <fieldset>
            <div>
                <strong><?php echo utf8_encode($filme['titulo'])." ( ".$filme['media']." )" ?></strong>
                <div>
                    <a href="votar.php?id=<?php echo $filme['id'] ?>&nota=1"><span class="material-icons">star_rate</span></a>
                    <a href="votar.php?id=<?php echo $filme['id'] ?>&nota=2"><span class="material-icons">star_rate</span></a>
                    <a href="votar.php?id=<?php echo $filme['id'] ?>&nota=3"><span class="material-icons">star_rate</span></a>
                    <a href="votar.php?id=<?php echo $filme['id'] ?>&nota=4"><span class="material-icons">star_rate</span></a>
                    <a href="votar.php?id=<?php echo $filme['id'] ?>&nota=5"><span class="material-icons">star_rate</span></a>
                </div>
            </div>
            <hr/>
        </fieldset>
    <?php endforeach; ?>
</div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>