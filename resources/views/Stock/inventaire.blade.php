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

    <div class="row">
      <div class="col-12">
        <h3 class="my-3" >Etat du stock au <small id="date_heure1"></small></h3>
      </div>
    </div>
    <!-- info row -->
    <!-- /.row -->
    
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Code</th>
            <th>Libellé</th>
            <th>Produit</th>
            <th>Prix unitaire</th>
            <th>Quantité entrée</th>
            <th>Quantité en stock</th>
            <th>Quantité sortie</th>
          </tr>
          </thead>
          <tbody>
            @foreach($Articles as $Article)
            <tr>
              <td>{{$Article->id}}</td>
              <td>{{$Article->libart}}</td>
              <td>{{$Article->categorie->libcat}}</td>
              <td>{{$Article->Pu}}</td>
              <td>{{$Article->entree}}</td>
              <td>{{$Article->QteStock}}</td>
              <td>{{$Article->sortie}}</td>


            </tr>
   @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


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
