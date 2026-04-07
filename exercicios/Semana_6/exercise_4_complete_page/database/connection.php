<?php
function getDatabaseConnection() {
    return new PDO('sqlite:' . __DIR__ . '/news.db'); //assim podemos chamar o servidor de qualquer lado, nao precisa de ser necessariamente neste repositorio
}
?>