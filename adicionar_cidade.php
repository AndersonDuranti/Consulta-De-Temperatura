<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $temperatura = $_POST["temperatura"];
    $clima = $_POST["clima"];

    // Conectar ao banco de dados SQLite
    $db = new SQLite3('cidades.db');

    // Preparar a consulta SQL para inserir a cidade
    $query = $db->prepare("INSERT INTO cidades (nome, temperatura, clima) VALUES (:nome, :temperatura, :clima)");
    $query->bindParam(':nome', $nome, SQLITE3_TEXT);
    $query->bindParam(':temperatura', $temperatura, SQLITE3_FLOAT);
    $query->bindParam(':clima', $clima, SQLITE3_TEXT);

    // Executar a consulta SQL
    $result = $query->execute();

    if ($result) {
        echo "Cidade adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar cidade!";
    }

    $db->close();
}
?>
