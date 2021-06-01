<?php
/**
 * Este script cria e retorna uma instância de {@link \PhpSigep\Model\PreListaDePostagem}
 *
 * Como existe mais de um exemplo que precisa de uma {@link \PhpSigep\Model\PreListaDePostagem}, esse script foi criado
 * para compartilhar o código necessário para a criação da {@link \PhpSigep\Model\PreListaDePostagem}.
 */


    require_once __DIR__ . '/bootstrap-exemplos.php';


    $nome = $_POST['name'] ?? 'sem nome';
    $logradouro = $_POST['logradouro'] ?? 'sem logradouro';
    $numero = $_POST['numero'] ?? 'sem número';
    $complemento = $_POST['complemento'] ?? 'sem complemento';
    $bairro = $_POST['bairro'] ?? 'bairro não definido.';
    $cep = $_POST['cep'] ?? 'cep não definido.';
    $cidade = $_POST['cidade'] ?? 'cidade não definida';
    $uf = $_POST['uf'] ?? 'uf não definida.';
    $nNota = $_POST['nNota'] ?? 'nº da nota não definida.';
    $nPedido = $_POST['nPedido'] ?? 'nº nota do pedido não definido.';
    $nEtiqueta = $_POST['nEtiqueta'] ?? 'nº etiqueta não definida';
    $peso = $_POST['peso'] ?? 'peso não definido';

// ***  DADOS DA ENCOMENDA QUE SERÁ DESPACHADA *** //
    $dimensao = new \PhpSigep\Model\Dimensao();
    $dimensao->setAltura(20);
    $dimensao->setLargura(20);
    $dimensao->setComprimento(20);
    $dimensao->setDiametro(0);
    $dimensao->setTipo(\PhpSigep\Model\Dimensao::TIPO_PACOTE_CAIXA);

    $destinatario = new \PhpSigep\Model\Destinatario();
    $destinatario->setNome($nome);
    $destinatario->setLogradouro($logradouro);
    $destinatario->setNumero($numero);
    $destinatario->setComplemento($complemento);

    $destino = new \PhpSigep\Model\DestinoNacional();
    $destino->setBairro($bairro);
    $destino->setCep($cep);
    $destino->setCidade($cidade);
    $destino->setUf($uf);
    $destino->setNumeroNotaFiscal($nNota);
    $destino->setNumeroPedido($nPedido);
    // Estamos criando uma etique falsa, mas em um ambiente real voçê deve usar o método
    // {@link \PhpSigep\Services\SoapClient\Real::solicitaEtiquetas() } para gerar o número das etiquetas
    $etiqueta = new \PhpSigep\Model\Etiqueta();
    $etiqueta->setEtiquetaComDv($nEtiqueta);

    $servicoAdicional = new \PhpSigep\Model\ServicoAdicional();
    $servicoAdicional->setCodigoServicoAdicional(\PhpSigep\Model\ServicoAdicional::SERVICE_REGISTRO);
    // Se não tiver valor declarado informar 0 (zero)
    $servicoAdicional->setValorDeclarado(0);

    $encomenda = new \PhpSigep\Model\ObjetoPostal();
    $encomenda->setServicosAdicionais(array($servicoAdicional));
    $encomenda->setDestinatario($destinatario);
    $encomenda->setDestino($destino);
    $encomenda->setDimensao($dimensao);
    $encomenda->setEtiqueta($etiqueta);
    $encomenda->setPeso($peso);// 500 gramas
    $encomenda->setServicoDePostagem(new \PhpSigep\Model\ServicoDePostagem(\PhpSigep\Model\ServicoDePostagem::SERVICE_SEDEX_41556));
// ***  FIM DOS DADOS DA ENCOMENDA QUE SERÁ DESPACHADA *** //

// *** DADOS DO REMETENTE *** //
    $remetente = new \PhpSigep\Model\Remetente();
    $remetente->setNome('Ubook Editora SA');
    $remetente->setLogradouro('Av das Américas');
    $remetente->setNumero('500');
    $remetente->setComplemento('Bloco 12 salas 303/304');
    $remetente->setBairro('Barra da Tijuca');
    $remetente->setCep('22640-904');
    $remetente->setUf('RJ');
    $remetente->setCidade('Rio de Janeiro');
// *** FIM DOS DADOS DO REMETENTE *** //


$plp = new \PhpSigep\Model\PreListaDePostagem();
$plp->setAccessData(new \PhpSigep\Model\AccessDataHomologacao());
$plp->setEncomendas(array($encomenda));
$plp->setRemetente($remetente);

// Logo da empresa remetente
$logoFile = __DIR__ . '/logo-etiqueta.png';

//Parametro opcional indica qual layout utilizar para a chancela. Ex.: CartaoDePostagem::TYPE_CHANCELA_CARTA, CartaoDePostagem::TYPE_CHANCELA_CARTA_2016
$layoutChancela = array(\PhpSigep\Pdf\CartaoDePostagemModico::TYPE_CHANCELA_CARTA);

$pdf = new \PhpSigep\Pdf\CartaoDePostagemModico($plp, time(), $logoFile, $layoutChancela);
$pdf->render();

// return $plp;
