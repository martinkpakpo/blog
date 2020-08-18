<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MyShop</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script>
    function date_heure1(id)
    {
            date = new Date;
            annee = date.getFullYear();
            moi = date.getMonth();
            mois = new Array('Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao&ucirc;t', 'Septembre', 'Octobre', 'Novembre', 'D&eacute;cembre');
            j = date.getDate();
            jour = date.getDay();
            jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
            h = date.getHours();
            if(h<10)
            {
                    h = "0"+h;
            }
            m = date.getMinutes();
            if(m<10)
            {
                    m = "0"+m;
            }
            s = date.getSeconds();
            if(s<10)
            {
                    s = "0"+s;
            }
            resultat = jours[jour]+' '+j+' '+mois[moi]+' '+annee;
            document.getElementById(id).innerHTML = resultat;
            setTimeout('date_heure1("'+id+'");','1000');
            return true;
    }
    </script>
</head>

<body>

<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <!-- title row -->
    <div class="row">
        <div class="col-12">
          <h4>
            <i class="fas fa-globe"></i> MyShop 2.0.
            <small class="float-right" id="date_heure1"></small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
    <div class="row invoice-info" style="border-style: solid;">
        <div class="col-sm-4 invoice-col">
          <address>
              @foreach ($Infos as $Info)
          <strong>{{$Info->libelle}}</strong><br>
          {{$Info->adresse}}<br>
              Tél: {{$Info->numero}}<br>
              Email: {{$Info->mail}}
              @endforeach

          </address>
        </div>
        <!-- /.col -->
      
        <!-- /.col -->
      </div>
      <div class="row">
          <div class="col-md-4">
              <b>Parametres de recherche</b><br>
            <b><span class="badge badge-secondary">{{$date1}}</span> </b><br>            
            <b><span class="badge badge-secondary">{{$date2}}</span> </b><br>            
          </div>
      </div>
    <!-- info row -->
    <!-- /.row -->
    <h1>Les articles vendus</h1>
    <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
              <thead>
                  <tr>
                    <th>Libellé</th>
                    <th>Quantité</th>
                              
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($chart_datas1 as $chart_data1)
                      <tr>
                        <td>{{$chart_data1->lib}}</td>
                        <td>{{$chart_data1->Qte}}</td>
                       
                      </tr>
                  
                  @endforeach
                  </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
    <!-- Table row -->
    <h1>Les ventes</h1>

    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                  <th>Date</th>
                  <th>Référence de la vente</th>
                  <th>Montant total</th>
                  <th>Réduction</th>
                  <th>Montant à payé</th>
                  <th>Tva</th>
                  <th>Opérateur</th>
                  <th>etat</th>                
                </tr>
                </thead>
                <tbody>
                    @foreach($Ventes as $Vente)
                    <tr>
                      <td>{{$Vente->datecr}}</td>
                      <td>{{$Vente->ref}}</td>
                      <td>{{$Vente->total}}</td>
                      <td>{{$Vente->reduction}}</td>
                      <td>{{$Vente->paye}}</td>
                      <td>{{$Vente->tva}}</td>
                      <td>{{$Vente->user->name}}</td>
                      <td>          @if ($Vente->etat==0)
                                <span class="badge badge-danger">NON SOLDE</span>
                                @else
                                <span class="badge badge-success">SOLDE</span>
                
                                @endif</td>
                
                    </tr>
                
                @endforeach
                </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row invoice-info" style="border-style: solid;">
        <div class="col-sm-4 invoice-col">

        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">

        </div>
        <!-- /.col -->
      
        <!-- /.col -->
      </div>

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<script type="text/javascript">window.onload = date_heure1('date_heure1');</script>

<script type="text/javascript">
  window.addEventListener("load", window.print());
</script>
</body>
</html>
