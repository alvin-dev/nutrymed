<?php
if (isset($_POST['BTEnvia'])) {
 
 //Variaveis de POST, Alterar somente se necessário 
 //====================================================
 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $telefone = $_POST['phone']; 
 $endereco = $_POST['adress'];

 $razaosocial = $_POST['social'];
 $cnpj = $_POST['cnpj'];
 
 $tiposervico = $_POST['tipo-servico'];
 $sabores = $_POST['sabores'];
 $porcao = $_POST['porcao'];
 $apresentacao = $_POST['apresentacao'];
 $precoalvo = $_POST['preco-alvo'];
 $recproduto = $_POST['requisitos'];

$potefrasco = $_POST['pote-frasco'];
$lata = $_POST['lata'];
$blister = $_POST['blister'];
$revestimento = $_POST['revestimento'];
$rotuloadessivo = $_POST['rotulo-adesivo'];
$lacreexterno = $_POST['lacre-externo'];
$checkbox = array ($potefrasco, $lata, $blister, $revestimento, $rotuloadessivo, $lacreexterno);
 //====================================================
 
 //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 //==================================================== 
 $email_remetente = "nutrymed@nutrymed.com.br"; // deve ser uma conta de email do seu dominio 
 //====================================================
 
 //Configurações do email, ajustar conforme necessidade
 //==================================================== 
 $email_destinatario = "nutrymed@nutrymed.com.br"; // pode ser qualquer email que receberá as mensagens
 $email_reply = "$email"; 
 $email_assunto = "Cotação Site Nutrymed"; // Este será o assunto da mensagem
 //====================================================
 
 //Monta o Corpo da Mensagem
 //====================================================
 $email_conteudo = "Informações Pessoais: \n";
 $email_conteudo .= "Nome = $nome \n";
 $email_conteudo .= "Telefone = $telefone \n";
 $email_conteudo .= "Email = $email \n";
 $email_conteudo .= "Endereço = $endereco \n";

 $email_conteudo .= "\n Dados da Empresa: \n";
 $email_conteudo .= "Razão Social = $razaosocial \n";
 $email_conteudo .= "CNPJ = $cnpj \n";
 
 $email_conteudo .= "\n Tipo de Serviço: \n";
 $email_conteudo .= " $tiposervico \n";
 $email_conteudo .= "Sabores = $sabores \n";
 $email_conteudo .= "Porção = $porcao \n";
 $email_conteudo .= "Apresentação = $apresentacao \n";
 $email_conteudo .= "Preço Alvo = $precoalvo \n";
 $email_conteudo .= "Requisitos do Produto = $recproduto \n";

 $email_conteudo .= "\n Assinale os Materiais de Embalagens: \n";
 $email_conteudo .=  join(", ", array_filter($checkbox));
 
 //====================================================
 
 //Seta os Headers (Alterar somente caso necessario) 
 //==================================================== 
 $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
 //====================================================
 
 //Enviando o email 
 //==================================================== 
 if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
  header("Location: https://www.nutrymed.com.br/form-send.html"); 
 } 
 else{ 
 echo "</b>Falha no envio do E-Mail!</b>"; } 
 //====================================================
} 
?>