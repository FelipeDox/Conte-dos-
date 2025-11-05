<?php
echo "<h1>Fale Conosco</h1>";
echo "<p>Entre em contato conosco através do email: contato@exemplo.com</p>";
?>

<form action="enviar-form.php" method="post">
    <label>Nome:</label>
    <input type="text" name="nome" required><br><br>
    <label>Email:</label>
    <input type="email" name="email" required><br><br>
    <label>Mensagem:</label><br>
    <textarea name="mensagem" rows="5" cols="30" required></textarea><br><br>
    <label>Telefone:</label>
    <input type="tel" name="telefone" required><br><br>
    <input type="submit" value="Enviar">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    echo "<h2>Obrigado por entrar em contato, $nome!</h2>";
    echo "<p>Recebemos sua mensagem e entraremos em contato através do email: $email ou telefone: $telefone em breve.</p>";
}
?>