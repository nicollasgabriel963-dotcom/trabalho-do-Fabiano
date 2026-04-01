<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
session_start();
$erros = $_SESSION['erros'] ?? [];
$dados = $_SESSION['dados'] ?? [];

unset($_SESSION['erros']);
unset($_SESSION['dados']);
?>
<meta charset="UTF-8">
<title>Cadastro</title>

<style>
body {
    font-family: Arial;
    background: #f4f4f4;
}

.container {
    width: 400px;
    margin: auto;
    background: white;
    padding: 20px;
    margin-top: 50px;
    border-radius: 10px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
}

.erro {
    color: red;
    font-size: 14px;
}

button {
    margin-top: 10px;
    padding: 10px;
    width: 100%;
    background: #28a745;
    color: white;
    border: none;
}
</style>

<script>
function validarFormulario() {
    let nome = document.getElementById("nome").value;
    let email = document.getElementById("email").value;
    let senha = document.getElementById("senha").value;
    let mensagem = document.getElementById("mensagem").value;

    let valido = true;

    document.querySelectorAll(".erro").forEach(e => e.innerHTML = "");

   <input type="text" name="nome" value="<?= $dados['nome'] ?? '' ?>">
<div class="erro"><?= $erros['nome'] ?? '' ?></div>

   <input type="text" name="email" value="<?= $dados['email'] ?? '' ?>">
<div class="erro"><?= $erros['email'] ?? '' ?></div>

    <input type="password" name="senha">
<div class="erro"><?= $erros['senha'] ?? '' ?></div>

   <textarea name="mensagem"><?= $dados['mensagem'] ?? '' ?></textarea>
<div class="erro"><?= $erros['mensagem'] ?? '' ?></div>

</script>

</head>
<body>

<div class="container">
    <h2>Cadastro</h2>

    <form action="processa.php" method="POST" onsubmit="return validarFormulario()">

        Nome:
        <input type="text" id="nome" name="nome">
        <div class="erro" id="erro-nome"></div>

        Email:
        <input type="text" id="email" name="email">
        <div class="erro" id="erro-email"></div>

        Senha:
        <input type="password" id="senha" name="senha">
        <div class="erro" id="erro-senha"></div>

        Mensagem:
        <textarea id="mensagem" name="mensagem" maxlength="250"></textarea>
        <div class="erro" id="erro-mensagem"></div>

        <button type="submit">Enviar</button>

    </form>
</div>

</body>
</html>