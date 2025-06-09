<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <?php
// Verifica se os dados foram enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Preparar consulta segura
    $stmt = $conn->prepare("SELECT senha FROM tblusuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    // Verifica se encontrou o usuário
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($senha_hash);
        $stmt->fetch();

        // Verifica a senha
        if ($senha) {
            $_SESSION['usuario'] = $usuario;
            echo "Login bem-sucedido! Bem-vindo, $usuario.";
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>
    
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario" required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>