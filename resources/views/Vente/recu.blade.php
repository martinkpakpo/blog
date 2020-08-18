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
        <div class="col-sm-4 invoice-col">

        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            @foreach ($Ventes as $Vente)
            <b>Facture #{{$Vente->id}}</b><br>
            <br>
            <b>Vente ref:</b> {{$Vente->ref}}
            @endforeach

        </div>
        <!-- /.col -->
      </div>
    <!-- info row -->
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Libellé</th>
            <th>Prix unitaire</th>
            <th>Quantité entrée</th>
            <th>Total brut</th>
            <th>taux de réduction</th>
            <th>Total à payé</th>

          </tr>
          </thead>
          <tbody>
            @foreach($Details as $Detail)
            <tr>
              <td>{{$Detail->article->libart}}</td>
              <td>{{$Detail->pu}}</td>
              <td>{{$Detail->Qte}}</td>
              <td>{{$Detail->total}}</td>
              <td>{{$Detail->taux*100}}%</td>
              <td>{{$Detail->totalR}}</td>


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
        <div class="col-sm-4 invoice-col">

                    @foreach($Ventes as $Vente)
                    <label>Total: {{$Vente->total}}FCFA</label><br>
                    <label> Réduction: {{$Vente->reduction}}FCFA</label><br>
                    <label>Tva: {{$Vente->totaltva}}FCFA ({{$Vente->tva*100}}%)</label><br>
                    <label>Total à payé: {{$Vente->paye}}FCFA</label><br>
                    <label>Montant réglé: {{$Vente->paye-$Vente->reste}}FCFA</label><br>
                    <label>Montant reste: {{$Vente->reste}}FCFA</label><br>

                @if ($Vente->etat==0)
                <span class="badge badge-danger">NON SOLDE</span>
                @else
                <span class="badge badge-success">SOLDE</span>

                @endif
                <br>
                @endforeach

        </div>
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
