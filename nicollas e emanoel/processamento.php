<?php
include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$mensagem = $_POST['mensagem'];

$erros = [];

<?php
session_start();
include("conexao.php");

$erros = [];

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$mensagem = $_POST['mensagem'];

// Nome
if (empty($nome)) {
    $erros['nome'] = "O nome é obrigatório";
}

// Email
if (empty($email)) {
    $erros['email'] = "O email é obrigatório";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros['email'] = "Email inválido (ex: nome@email.com)";
}

// Senha
if (empty($senha)) {
    $erros['senha'] = "A senha é obrigatória";
} elseif (strlen($senha) < 6) {
    $erros['senha'] = "Senha muito curta (mínimo 6 caracteres)";
}

// Mensagem
if (empty($mensagem)) {
    $erros['mensagem'] = "A mensagem é obrigatória";
} elseif (strlen($mensagem) > 250) {
    $erros['mensagem'] = "Máximo de 250 caracteres";
}

// Se tiver erro
if (!empty($erros)) {
    $_SESSION['erros'] = $erros;
    $_SESSION['dados'] = $_POST;
    header("Location: index.php");
    exit;
}

// Se estiver tudo certo
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, email, senha, mensagem)
        VALUES ('$nome', '$email', '$senhaHash', '$mensagem')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>