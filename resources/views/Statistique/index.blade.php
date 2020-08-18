@extends('layouts.app')

@section('content')


<script>
  var x={{Auth::user()->etat}}
    if (x==1) {
      window.setTimeout("document.getElementById('logout-form').submit();",6);
  }
</script>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">MyShop 2.0</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Module</a></li>
            <li class="breadcrumb-item active">Statistique</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->

      <!-- Categorie -->
<div class="row">
      <div class="col-md-12">
        <div class="card card-secondary">
          <div class="card-header">
           <h3 class="card-title">Graphique de comparaison des articles</h3>
          </div>
          <div class="card-body" align="center">
            <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
          </div>
        </div>

      </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
             <h3 class="card-title">Recherche périodique de ventes et articles vendues</h3>
            </div>
            <div class="card-body" align="center">
           
              <form action="{{route('Statistique.store')}}" class="form-info" method="post" autocomplete="on">
              
                              @csrf       
                              <div class="row">
                                <div class="col-md-6 form-group">
                                          <label>Date1:</label>
                                  <input type="date" id="date1" name="date1" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                  <label>Date2:</label>
                                                                    <input type="date" id="date2" name="date2" class="form-control">
                                  </div>
                                 
                              </div>
                              <div class="row">
                                <div class="col-md-4 form-group">
                               </div>
                               <div class="col-md-4 form-group">
                                <button class="btn btn-primary" id="rech" type="submit"><i class="fas fa-search"></i> Recherchers</button>   
                             </div>
                                <div class="col-md-4 form-group">
                               </div>
                              </div>
                  </form>
               
            </div>
          </div>
  
        </div>
        </div>



      <!-- Main row -->

      <!-- /.row -->



    </div><!--/. container-fluid -->
  </section>

@endsection
