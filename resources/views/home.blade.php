
@extends('layouts.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">MyShop 2.0</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Module</a></li>
            <li class="breadcrumb-item active">Accueil</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <script>
    function opendiag(lien) {
    window.open(''+lien+'', "Recu", "height=850,width=850");
  }
</script>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <!-- Categorie -->

      @if((Auth::user()->etat==0))



      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cube"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CATEGORIES</span>
              <span class="info-box-number">
                {{$Categorie}}           
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tags"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ARTICLES</span>
              <span class="info-box-number">{{$Article}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">SORTIES DE STOCK</span>
            <span class="info-box-number">{{$vente}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-globe"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">UTILISATEURS</span>
            <span class="info-box-number">{{$user}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-plus-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ENTREES DE STOCK</span>
              <span class="info-box-number">
                {{$Livraison}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">REGLEMENTS</span>
            <span class="info-box-number">{{$Produit}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">FOURNISSEURS</span>
              <span class="info-box-number">{{$Fournisseur}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-minus-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">REDUCTIONS</span>
              <span class="info-box-number">{{$Reduction}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

<div class="card card-secondary">
<div class="card-header">
  <h3 class="card-title">Liste des ventes</h3>

</div>
<div class="card-body">
  <table id="example4" class="table table-bordered table-striped ">
    <thead>
    <tr>
      <th>Date</th>
      <th>Référence de la vente</th>
      <th>Montant total</th>
      <th>Réduction</th>
      <th>Montant à payé</th>
      <th>Tva</th>
      <th>Opérateur</th>
     <th></th>
    
    </tr>
    </thead>
    <tbody>
        @foreach($V as $Vente)
        <tr>
          <td>{{$Vente->datecr}}</td>
          <td>{{$Vente->ref}}</td>
          <td>{{$Vente->total}}</td>
          <td>{{$Vente->reduction}}</td>
          <td>{{$Vente->paye}}</td>
          <td>{{$Vente->tva}}</td>
          <td>{{$Vente->user->name}}</td>
        <td><button onclick="opendiag('/Voir/{{$Vente->id}}');" class="btn btn-secondary"><i class="fas fa-eye"></i> </button></td>
    
        </tr>
    
    @endforeach
    </tbody>
    <tfoot>
    <tr>
      <th>Date</th>
      <th>Référence de la vente</th>
      <th>Montant total</th>
      <th>Réduction</th>
      <th>Montant à payé</th>
      <th>Tva</th>
      <th>Opérateur</th>
     <th></th>
    
    </tr>
    </tfoot>
    </table>
</div>
</div>


      

@endif





      <!-- /.row -->








      <!-- Main row -->
      
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  @endsection
