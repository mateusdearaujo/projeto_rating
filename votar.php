<?php

try {
    $pdo = new PDO("mysql:dbname=projeto_rating;host=localhost:3306", "mateus", "");
} catch(PDOException $e) {
    echo "Erro: ".$e->getMessage();
}

if(!empty($_GET['id']) && !empty($_GET['nota'])) {
    $id = intval($_GET['id']);
    $nota = intval($_GET['nota']);

    if($nota >= 1 && $nota <= 5) {
        $sql = $pdo->prepare("INSERT INTO votos SET id_filme = :id_filme, nota = :nota");
        $sql->bindValue(":id_filme", $id);
        $sql->bindValue(":nota", $nota);
        $sql->execute();

        $sql = $pdo->prepare("UPDATE filmes SET media = (select (SUM(nota) / COUNT(*)) from votos where votos.id_filme = filmes.id) WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        header("Location: index.php");
    }
}