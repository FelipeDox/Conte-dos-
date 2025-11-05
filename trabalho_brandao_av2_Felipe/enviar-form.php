<?php
$arquivo_json = 'receber_dados.json';

// (Null Coalesce) para evitar erro se a chave POST não existir
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$mensagem = $_POST['mensagem'] ?? '';
$telefone = $_POST['telefone'] ?? '';

$contatos = [];

//decodificar os dados existentes
if (file_exists($arquivo_json)) {
    $json = file_get_contents($arquivo_json);
    $dados_existentes = json_decode($json, true);

    if (is_array($dados_existentes)) {
        $contatos = $dados_existentes;
    }
}

// Cria o novo contato 
$novo_contato = [
    'nome' => $nome,
    'email' => $email,
    'mensagem' => $mensagem,
    'telefone' => $telefone
];

// Adiciona o novo contato
$contatos[] = $novo_contato;

// Grava no arquivo e USA O IF/ELSE CORRETAMENTE
// Se file_put_contents retornar algo diferente de false (sucesso)...
if (file_put_contents($arquivo_json, json_encode($contatos, JSON_PRETTY_PRINT)) !== false) {
    // Bloco de SUCESSO
    echo "<p>✅ **Obrigado pelo contato, $nome!**</p>";
    echo "<p>Recebemos sua mensagem: **'$mensagem'**. Entraremos em contato através do email: **$email** ou telefone: **$telefone** em breve.</p>";
} else {
    // Bloco de FALHA
    echo "<p>❌ Erro ao enviar mensagem. Tente novamente mais tarde.</p>"; 
}
?>