<?php

namespace App\Services;

class InvoiceService
{
   public function read(string $xml): array
   {
      $xml = simplexml_load_string($xml);

      if ($xml == false) {
         throw new \Exception("XML não suportado!");
      }

      // Registrar namespace se existir
      $namespaces = $xml->getNamespaces(true);
      if (isset($namespaces[''])) {
         $xml->registerXPathNamespace('n', $namespaces['']);
         $emitenteNome = (string) $xml->xpath('//n:emit/n:xNome')[0];
         $dataEmissao = (string) $xml->xpath('//n:ide/n:dhEmi')[0];
      } else {
         $emitenteNome = (string) $xml->emit->xNome;
         $dataEmissao = (string) $xml->ide->dhEmi;
      }

      $chave = (string) $xml->infNFe['Id'];

      $produtos = [];

      foreach ($xml->infNFe->det as $det) {
         $codigo = $det->prod->cProd;
         $produto = $det->prod->xProd;
         $quantidade = $det->prod->qCom;
         $valor = $det->prod->vProd;

         $produtos[] = [
            'code' => (string) $codigo,
            'name' => (string) $produto,
            'amount' => (int) $quantidade,
            'price' => (float) $valor
         ];
      }

      return [
         'name' => $emitenteNome,
         'code' => $chave,
         'date' => $dataEmissao,
         'products' => $produtos
      ];
   }


}
