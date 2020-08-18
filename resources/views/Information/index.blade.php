@extends('layouts.layout')

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
            <li class="breadcrumb-item active">Gestion de stock</li>
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

      <div class="modal fade" id="addinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter les Informations de la société</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('Information.store') }}" method="POST">
              {{ csrf_field() }}
                          <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Libellé de la société:</label>
                  <input type="text" class="form-control" name="libelle" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Adresse:</label>
                  <input type="text" class="form-control" name="adresse" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Numéro:</label>
                  <input type="text" class="form-control" name="numero"  id="ex-phone" required>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Mail:</label>
                  <input type="email" class="form-control" name="mail">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Valider</button>
            </div>
            </form>

          </div>
        </div>
      </div>


      <div class="modal fade" id="editm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modification du type de reglement</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('Mode.update','id') }}" method="POST">
                                                                 @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Code:</label>
                              <input type="text" class="form-control" name="id" id="idmodeedit" readonly>
                            </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Libellé:</label>
                  <input type="text" class="form-control" name="libelle" id="libmodeedit">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Valider</button>
            </div>
            </form>

          </div>
        </div>
      </div>


      <div class="modal fade" id="deleteMode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Voulez vous supprimer ?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

                          <div class="modal-body">
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Code de la categorie:</label>
                              <input type="text" class="form-control" name="id" id="idmodedelete" readonly>
                            </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Libellé de la categorie:</label>
                  <input type="text" class="form-control" name="libelle" id="libmodedelete" readonly>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
              <a class="btn btn-primary" href="" id="lien">Valider</a>
            </div>

          </div>
        </div>
      </div>




      <div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un type de reglement</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('Mode.store') }}" method="POST">
              {{ csrf_field() }}
                          <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Libellé :</label>
                  <input type="text" class="form-control" name="libelle" id="recipient-name">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Valider</button>
            </div>
            </form>

          </div>
        </div>
      </div>





      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Mes Informations</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Types de reglement</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                 <div class="row">
                     <div class="col-md-10">
                        @if (empty($Info))
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addinfo">Ajouter ma société</button>

                       @endif
                     </div>
                     <div class="col-md-2">

                    </div>
                 </div>
                 <br>
                 <div class="row">
                     <div class="col-md-12">
                            @if ($errors->has('libelle')||$errors->has('numero'))
                            <div class="callout callout-danger">
      <h4>ERREUR!</h4>

      <p>{{ $errors->first('libelle')}}</p>
      <p>{{ $errors->first('numero')}}</p>

      </div>
                      @endif
                     </div>
                 </div>
                 <br/>
                 <?php foreach ($Infos as $key => $value): ?>
                     <form action="{{ route('Information.update','id') }}" method="POST">
                                                                          @csrf
                                   @method('PUT')
                                     <div class="form-group row">
                                       <label for="inputName" class="col-sm-2 col-form-label">Libellé de ma société</label>
                                       <div class="col-sm-10">
                                         <input type="hidden" class="form-control" name="id" required value="{{$value->id}}">

                                         <input type="text" class="form-control" name="libelle" id="inputName" required value="{{$value->libelle}}">
                                       </div>
                                     </div>
                                     <div class="form-group row">
                                       <label for="inputEmail" class="col-sm-2 col-form-label">Numéro</label>
                                       <div class="col-sm-10">
                                         <input type="text" class="form-control" name="numero" required id="ex-phoneedit" value="{{$value->numero}}">
                                       </div>
                                     </div>
                                     <div class="form-group row">
                                       <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                                       <div class="col-sm-10">
                                         <input type="text" class="form-control" id="inputName2"  name="mail" required value="{{$value->mail}}">
                                       </div>
                                     </div>
                                     <div class="form-group row">
                                       <label for="inputExperience" required class="col-sm-2 col-form-label">Adresse</label>
                                       <div class="col-sm-10">
                                         <textarea class="form-control" id="inputExperience" name="adresse" required>{{$value->adresse}}</textarea>
                                       </div>
                                     </div>
                                     <div class="form-group row">
                                       <div class="offset-sm-2 col-sm-10">
                                         <button type="submit" class="btn btn-danger">modifier</button>
                                       </div>
                                     </div>
                                   </form>

                 <?php endforeach; ?>
                   </div>
                   <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                   <div class="row">
                       <div class="col-md-10">
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCat">Ajouter</button>
                       </div>
                       <div class="col-md-2">

                      </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                              @if ($errors->has('libelle')||$errors->has('numero'))
                              <div class="callout callout-danger">
        <h4>ERREUR!</h4>

        <p>{{ $errors->first('libelle')}}</p>
        <p>{{ $errors->first('numero')}}</p>

        </div>
                        @endif
                       </div>
                   </div>
                   <br/>
                   <table id="example1" class="table table-bordered table-striped ">
                   <thead>
                   <tr>

                     <th>Code</th>
                     <th>Libellé</th>
                     <th>Action</th>
                   </tr>
                   </thead>
                   <tbody>
                       @foreach($Categories as $Categorie)
                       <tr>
                         <td>{{$Categorie->id}}</td>
                         <td>{{$Categorie->libelle}}</td>
                        <td>
                           <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-libcat="{{$Categorie->libelle}}" data-id="{{$Categorie->id}}" data-target="#editm">
                               <i class="fas fa-pencil-alt">
                               </i>
                               modifier
                           </a>
                           <a class="btn btn-danger btn-sm"  data-toggle="modal" data-libcat="{{$Categorie->libelle}}" data-id="{{$Categorie->id}}" data-target="#deleteMode" href="#">
                               <i class="fas fa-trash">
                               </i>
                               supprimer
                           </a>
                        </td>
                       </tr>

               @endforeach
                   </tbody>
                   <tfoot>
                   <tr>

                       <th>Code</th>
                       <th>Libellé</th>
                       <th>Action</th>
                   </tr>
                   </tfoot>
                 </table>
                     </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.row -->



    </div><!--/. container-fluid -->
  </section>
  @endsection
