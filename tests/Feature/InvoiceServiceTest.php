<?php

namespace Tests\Feature;

use App\Models\StockModel;
use App\Services\InvoiceService;
use App\Services\InventoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvoiceServiceTest extends TestCase
{

   use RefreshDatabase;

   public function test_save(): void
   {
      $servico = new InvoiceService();

      $xml = '<NFe xmlns="http://www.portalfiscal.inf.br/nfe"><infNFe Id="NFe13250502337524002656656270000714139691464854" versao="4.00"><ide><cUF>13</cUF><cNF>69146485</cNF><natOp>VENDA</natOp><mod>65</mod><serie>627</serie><nNF>71413</nNF><dhEmi>2025-05-22T11:07:06-04:00</dhEmi><tpNF>1</tpNF><idDest>1</idDest><cMunFG>1302603</cMunFG><tpImp>4</tpImp><tpEmis>9</tpEmis><cDV>4</cDV><tpAmb>1</tpAmb><finNFe>1</finNFe><indFinal>1</indFinal><indPres>1</indPres><procEmi>0</procEmi><verProc>12</verProc><dhCont>2025-05-22T11:07:06-04:00</dhCont><xJust>ENTRADA EM CONTINGENCIA</xJust></ide><emit><CNPJ>02337524002656</CNPJ><xNome>INFO STORE COMPUTADORES DA AMAZONIA LTDA</xNome><xFant>INFO STORE</xFant><enderEmit><xLgr>AV CORONEL TEIXEIRA</xLgr><nro>5705</nro><xCpl>SHOP PONTA NEGRA</xCpl><xBairro>PONTA NEGRA</xBairro><cMun>1302603</cMun><xMun>MANAUS</xMun><UF>AM</UF><CEP>69037000</CEP><cPais>1058</cPais><xPais>BRASIL</xPais><fone>9232129953</fone></enderEmit><IE>053684095</IE><CRT>3</CRT></emit><dest><CPF>01506890202</CPF><xNome>HONORIO RIOS SANCHES JUNIOR</xNome><enderDest><xLgr>RUA BARTOLOMEU B DA SILVA</xLgr><nro>SN</nro><xBairro>DOM PEDRO I</xBairro><cMun>1302603</cMun><xMun>MANAUS</xMun><UF>AM</UF><CEP>69040070</CEP><cPais>1058</cPais><xPais>BRASIL</xPais><fone>92985928509</fone></enderDest><indIEDest>9</indIEDest><email>honoriojunior321@gmail.com</email></dest><det nItem="1"><prod><cProd>MOU0936</cProd><cEAN>SEM GTIN</cEAN><xProd>MOUSE USB WIRELESS M185 CIN (NACIONAL)</xProd><NCM>84716053</NCM><CEST>2103100</CEST><CFOP>5102</CFOP><uCom>UN</uCom><qCom>1.0000</qCom><vUnCom>85.95000000</vUnCom><vProd>85.95</vProd><cEANTrib>SEM GTIN</cEANTrib><uTrib>UN</uTrib><qTrib>1.0000</qTrib><vUnTrib>85.95000000</vUnTrib><vDesc>7.74</vDesc><indTot>1</indTot></prod><imposto><vTotTrib>19.41</vTotTrib><ICMS><ICMS00><orig>2</orig><CST>00</CST><modBC>3</modBC><vBC>78.21</vBC><pICMS>20.00</pICMS><vICMS>15.64</vICMS></ICMS00></ICMS></imposto></det><det nItem="2"><prod><cProd>MEM0256</cProd><cEAN>SEM GTIN</cEAN><xProd>MEMORIA    P/ NOTE  8GB DDR4 3200 HIKER (IMPORTADO)</xProd><NCM>84733042</NCM><CEST>2103500</CEST><CFOP>5102</CFOP><uCom>UN</uCom><qCom>1.0000</qCom><vUnCom>139.95000000</vUnCom><vProd>139.95</vProd><cEANTrib>SEM GTIN</cEANTrib><uTrib>UN</uTrib><qTrib>1.0000</qTrib><vUnTrib>139.95000000</vUnTrib><vDesc>12.59</vDesc><indTot>1</indTot></prod><imposto><vTotTrib>51.81</vTotTrib><ICMS><ICMS20><orig>1</orig><CST>20</CST><modBC>3</modBC><pRedBC>65.00</pRedBC><vBC>44.58</vBC><pICMS>20.00</pICMS><vICMS>8.92</vICMS></ICMS20></ICMS></imposto></det><total><ICMSTot><vBC>122.79</vBC><vICMS>24.56</vICMS><vICMSDeson>0.00</vICMSDeson><vFCP>0.00</vFCP><vBCST>0.00</vBCST><vST>0.00</vST><vFCPST>0</vFCPST><vFCPSTRet>0.00</vFCPSTRet><vProd>225.90</vProd><vFrete>0.00</vFrete><vSeg>0.00</vSeg><vDesc>20.33</vDesc><vII>0</vII><vIPI>0</vIPI><vIPIDevol>0</vIPIDevol><vPIS>0</vPIS><vCOFINS>0</vCOFINS><vOutro>0.00</vOutro><vNF>205.57</vNF><vTotTrib>71.22</vTotTrib></ICMSTot></total><transp><modFrete>9</modFrete></transp><pag><detPag><tPag>03</tPag><vPag>205.57</vPag><dPag>2025-05-22</dPag></detPag></pag><infAdic><infCpl>|           SERIALIZACAO DE PRODUTOS             |------------------------------------------------|------------------------------------------------|||||||Pis e cofins.Operacao isenta da contribuicao conf. mandado de seguranca n 0000927.47.2013.4.01.3200 N 100350.47.2016.4.01.3200 ||||||||Pis e cofins.Operacao isenta da contribuicao conf. mandado de seguranca n 0000927.47.2013.4.01.3200 N 100350.47.2016.4.01.3200 ||||</infCpl></infAdic><infRespTec><CNPJ>53113791000122</CNPJ><xContato>Renato Alves</xContato><email>resp_tecnico_dfe_varejo@totvs.com.br</email><fone>1120997271</fone></infRespTec></infNFe><infNFeSupl><qrCode><![CDATA[http://sistemas.sefaz.am.gov.br/nfceweb/consultarNFCe.jsp?p=13250502337524002656656270000714139691464854|2|1|22|205.57|6548496672422f4f546b536d4a337630514a746663495830436d673d|1|7E8DA09F28168A70008AE99063F49D35B3417198]]></qrCode><urlChave>http://www.sefaz.am.gov.br/nfce/consulta</urlChave></infNFeSupl><Signature xmlns="http://www.w3.org/2000/09/xmldsig#"><SignedInfo xmlns="http://www.w3.org/2000/09/xmldsig#"><CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"></CanonicalizationMethod><SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"></SignatureMethod><Reference URI="#NFe13250502337524002656656270000714139691464854"><Transforms><Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"></Transform><Transform Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"></Transform></Transforms><DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"></DigestMethod><DigestValue>eHIfrB/OTkSmJ3v0QJtfcIX0Cmg=</DigestValue></Reference></SignedInfo><SignatureValue>ZqM06iiEO8T7Nduyt/Ns2nAX2vJBFR9eAR89ehr2LUzHQie3d6P6h9hH0Q8lSwqLC10GqCnMMhHaSIQRdX0rHOwpjC31hHjhBWy9vGm/WdVgDOyH4oQ+aiJA4lFjvGDpNLEwjHrv0EaFSjm1hleAiphr70yPQJzK02CtrjxRNfyFETzm/9MhTC7t9daJpKRhBca4yvdBUowMfZVklyqR2k+LaWcnilf67oVjX4BrZFZcEsjmlwecZNUv1MUdcfHm4roxPHxPS01t2G9nPqavRR1oVxWsDghZdi4d+KyK52f9lDYGuTQjFm35VcUCPBnlttGNMwHNmOPT2lOxM51ZEw==</SignatureValue><KeyInfo><X509Data><X509Certificate>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</X509Certificate></X509Data></KeyInfo></Signature></NFe>';

      $data = $servico->read($xml);

      $inventory = new InventoryService();

      $s = StockModel::create([
         'date' => now(),
         'name' => now(),
      ]);

      $inventory->saveInvoice($s->id, $data);

      $stock = StockModel::find($s->id);


      $this->assertModelExists($stock);
      $this->assertEquals(now(), $stock->name);
      $this->assertEquals(now(), $stock->date);
      $this->assertCount(1, $stock->invoices);

      dump($stock->invoices[0]->products);

   }
}
