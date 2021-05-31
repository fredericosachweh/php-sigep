<?php
/**
 * Este script cria e retorna uma instância de {@link \PhpSigep\Model\PreListaDePostagem}
 *
 * Como existe mais de um exemplo que precisa de uma {@link \PhpSigep\Model\PreListaDePostagem}, esse script foi criado
 * para compartilhar o código necessário para a criação da {@link \PhpSigep\Model\PreListaDePostagem}.
 */


// ***  DADOS DA ENCOMENDA QUE SERÁ DESPACHADA *** //
    $dimensao = new \PhpSigep\Model\Dimensao();
    $dimensao->setAltura(20);
    $dimensao->setLargura(20);
    $dimensao->setComprimento(20);
    $dimensao->setDiametro(0);
    $dimensao->setTipo(\PhpSigep\Model\Dimensao::TIPO_PACOTE_CAIXA);

    $destinatario = new \PhpSigep\Model\Destinatario();
    $destinatario->setNome('Bruno Reis Marques');
    $destinatario->setLogradouro('Rua São Francisco Xavier');
    $destinatario->setNumero('381');
    $destinatario->setComplemento('apto 405');

    $destino = new \PhpSigep\Model\DestinoNacional();
    $destino->setBairro('Tijuca');
    $destino->setCep('20550-010');
    $destino->setCidade('Rio de Janeiro');
    $destino->setUf('RJ');
    $destino->setNumeroNotaFiscal('1267');
    $destino->setNumeroPedido('772654984');
    // Estamos criando uma etique falsa, mas em um ambiente real voçê deve usar o método
    // {@link \PhpSigep\Services\SoapClient\Real::solicitaEtiquetas() } para gerar o número das etiquetas
    $etiqueta = new \PhpSigep\Model\Etiqueta();
    $etiqueta->setEtiquetaComDv('JN666711974BR');

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
    $encomenda->setPeso(0.500);// 500 gramas
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

return $plp;
