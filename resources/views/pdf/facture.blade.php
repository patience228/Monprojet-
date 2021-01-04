<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facture</title>
  <style>
 .printable-content {
	 margin: 16px;
	 overflow-x: scroll;
	 overflow-y: scroll;
	 background-color: #fff;
}
 .printable-content .printable-area {
	 width: 595px;
	 height: 540px;
}
 .printable-content .printable-area .header-table {
	 background-color: #18ac52;
	 margin: 2%;
	 width: 96%;
	 color: #fff;
}
 .printable-content .printable-area .header-table th, .printable-content .printable-area .header-table td {
	 text-align: center;
	 padding: 5px;
}
 .printable-content .printable-area .header-table .title {
	 padding: 5px 20px;
	 font-size: 20px;
	 font-weight: bold;
	 text-transform: uppercase;
}
 .printable-content .printable-area h1, .printable-content .printable-area h3 {
	 margin-left: 10px;
}
 .printable-content .printable-area h3 {
	 margin-top: 20px;
}
 .printable-content .printable-area .subheader-table {
	 margin: 2%;
	 width: 96%;
}
 .printable-content .printable-area .subheader-table td {
	 vertical-align: top;
}
 .printable-content .printable-area .subheader-table td dt {
	 font-size: 11px;
	 color: #999;
	 margin-bottom: 5px;
}
 .printable-content .printable-area .subheader-table td dd {
	 margin: 0;
}
 .printable-content .printable-area .subheader-table td:last-child {
	 text-align: right;
}
 .printable-content .printable-area .subheader-table td:last-child dd {
	 font-size: 28px;
	 font-weight: bold;
}
 .printable-content .printable-area .detail-table {
	 margin: 2%;
	 width: 96%;
	 border-top: 2px solid #ccc;
	 border-bottom: 2px solid #ccc;
}
 .printable-content .printable-area .detail-table th, .printable-content .printable-area .detail-table td {
	 padding: 5px;
}
 .printable-content .printable-area .detail-table th {
	 border-bottom: 2px solid #ccc;
}
 .printable-content .printable-area .detail-table td:nth-child(2), .printable-content .printable-area .detail-table td:nth-child(4) {
	 text-align: center;
}
 .printable-content .printable-area .detail-table td:nth-child(3) {
	 text-align: center;
}
 .printable-content .printable-area .footer-table {
	 margin: 2%;
	 width: 96%;
}
 .printable-content .printable-area .footer-table td {
	 padding: 5px;
	 text-align: right;
	 font-weight: bold;
}
 
  </style>
</head>
<body>
  <div class="printable-content">
  <div class="printable-area" id="printable-area">
    <table class="header-table">
      <tr>
        <td width="40%" class="title"><img src="dist/img/log.jpg" alt="logo" height="50px" align="center" /><br /> IAI-TOGO</td>
        <td width="60%">
          <table width="100%">
            <tr>
              <td width="50%">Dépôt de boissons</td>
              <td width="50%">+228 22 20 47 00</td>
            </tr>
            <tr>
              <td>iaitogo@iai-togo.tg</td>
              <td>Lomé,Togo</td>
            </tr>
            <tr>
              <td>www.iai-togo.tg</td>
              <td>07 BP 12456 Lomé 07, TOGO</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <h1>Facture de vente</h1>
    <table class="subheader-table">
      <tr>
        <td width="30%">
          <dt>Facture de:</dt>
          <dd>Client: 
            @php
                $Commandes = \Illuminate\Support\Facades\DB::table('porters')
                  ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
                  ->distinct()
                  ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
                  ->distinct()
                  ->join('clients','commandes.num_Clt','=','clients.num_Clt')
                  ->distinct()
                  ->select('commandes.*','produits.*','clients.nom_Clt','porters.*')
                  ->where('commandes.code','=',$num_client)
                  ->get();
              
            

              $total = 0;
              foreach ($Commandes as  $value) {
                # code...
                $total += $value->Qte_Cmde * $value->PV_Prdt;
              }
                foreach($Commandes as $cmd){
                  $client=$cmd->nom_Clt;
                }
                

                echo $client;
              @endphp
              </dd>
          <dd>Contact: 
          @php
              $Commandes = \Illuminate\Support\Facades\DB::table('porters')
                ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
                ->distinct()
                ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
                ->distinct()
                ->join('clients','commandes.num_Clt','=','clients.num_Clt')
                ->distinct()
                ->select('commandes.*','produits.*','clients.tel_Clt','porters.*')
                ->where('commandes.code','=',$num_client)
                ->get();
            
          

            $total = 0;
            foreach ($Commandes as  $value) {
              # code...
              $total += $value->Qte_Cmde * $value->PV_Prdt;
            }
              foreach($Commandes as $cmd){
                $contact=$cmd->tel_Clt;
              }
              

              echo $contact;
            @endphp
            </dd>
            <dd>Date: {{date(" d-m-Y ")}}</dd>
          
        </td>
        <td width="30%">
          <dt>Commande :</dt>
          <dd>N <sup>0</sup> 
            @php
              echo $num_client;
            @endphp
          </dd>
          
          <dd>Echeance: 
               @php
              $factures = \Illuminate\Support\Facades\DB::table('entrainers')
            ->join('factures','entrainers.num_Fact','=','factures.num_Fact')
            ->distinct()
            ->join('reglements','entrainers.num_Reglem','=','reglements.num_Reglem')
            ->distinct()
            ->join('commandes','commandes.num_Cmde','=','factures.num_Cmde')
            ->distinct()
            ->select('factures.*','reglements.*','entrainers.*','commandes.*')
            ->where('commandes.code','=',$num_client)
            ->get();
            
            foreach($factures as $fact){
             // $echeance=0;
                $echeance=$fact->echeance;
                //return $echeance;
              }
              
              
              echo $echeance;
            @endphp
          </dd>
          <dd>Caissier: {{ session('Agent') }}</dd>
        </td>
        <td width="40%">
          <dt>Montant Total:</dt>
          <dd>{{$total}} FCFA</dd>
        </td>
      </tr>
    </table>
    <h3>Details de la facture</h3>
    <table class="detail-table">
      <tr>
        <th width="20%">Produit</th>
        <th width="20%">Model</th>
        <th width="20%">Prix</th>
        <th width="20%">Quantité</th>
        <th width="20%">Total</th>
      </tr>
            @foreach($Commandes as $value => $key)
          <tr class="data-heading">
              
                  @if ($key)
                  
                  <td>{{$key->design_Prdt}}</td>
                          <td>{{$key->model_Prdt}}</td>
                  <td>{{$key->PV_Prdt}}</td>
              @endif
                  <td>{{$key->Qte_Cmde}}</td>
                  <td>{{$key->PV_Prdt * $key->Qte_Cmde}}  FCFA </td>
                
            </tr>
            @endforeach
    </table>
    
    <table class="footer-table">
         @php
          $factures = \Illuminate\Support\Facades\DB::table('entrainers')
            ->join('factures','entrainers.num_Fact','=','factures.num_Fact')
            ->distinct()
            ->join('reglements','entrainers.num_Reglem','=','reglements.num_Reglem')
            ->distinct()
            ->join('commandes','commandes.num_Cmde','=','factures.num_Cmde')
            ->distinct()
            ->select('factures.*','reglements.*','entrainers.*','commandes.*')
            ->where('commandes.code','=',$num_client)
            ->get();
        @endphp
         @foreach ($factures as $facture)
          <tr>
            <td width="80%">Remise: </td>
            <td width="20%">{{$facture->REM }}  FCFA</td>
          </tr>
          @endforeach

          @foreach ($factures as $facture)
          <tr>
            <td>Montant à payer: </td>
            <td>{{$total-$facture->REM }}  FCFA</td>
          </tr>
          @endforeach

          @foreach ($factures as $facture)
          <tr>
            <td>Mode de paiement: </td>
            <td>{{$facture->type_Reglem }}</td>
          </tr>
          @endforeach

          @foreach ($factures as $facture)
          <tr>
            <td>Montant reglé: </td>
            <td>{{$facture->MT_Reglem }}  FCFA</td>
          </tr>
          @endforeach

          @foreach ($factures as $facture)
          <tr>
            <td>Reste à payer: </td>
            <td>{{($total-$facture->REM)-($facture->MT_Reglem) }} FCFA</td>
          </tr>
          @endforeach
    </table>
  </div>
</div>
</body>
</html>
