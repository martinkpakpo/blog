@extends('layouts.layout')

@section('content')
<script>
  var x={{Auth::user()->etat}} 
    if (x==1) {
      window.setTimeout("document.getElementById('logout-form').submit();",6);
  }
</script>
<script type="text/javascript">
  function opendiag() {
    window.open("/Inventaire", "Inventaire", "height=850,width=850");
  }
  var supplyerID = 0;
    var Supplier_name;
    var alert_supplier = -1;
    var dataProduct = [];
var x={{Cart::count()}} 
    if (x!=0) {
  window.setTimeout('window.location="/Retirer/all"',60000);
  }
  function supplyercheck(selTag) {
        Supplier_name = selTag.options[selTag.selectedIndex].text;
        supplyerID = selTag.options[selTag.selectedIndex].value;
        document.getElementById('display_supplyer').innerHTML = Supplier_name;


        if (supplyerID < 10000)
            alert_supplier = 1;
        else
            alert_supplier = -1;

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

  <div class="modal fade" id="Mjr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
               <form action="{{route('dropLigne','id')}}" class="form-info" method="post" autocomplete="on">
           @csrf
           @method('PUT')
        <div class="modal-body">
            <div class="form-group">
                           <input class="form-control s" type="hidden" name="id"/>
                           <input class="form-control sq" type="hidden" name="qtes"/>
                           <input class="form-control sid" type="hidden" name="idp"/>


            </div>
            <div class="form-group">
                            <label>Libellé de l'article</label>
                            <select class="form-control select2" style="width: 100%;" name="art_id" required>
                             @foreach($Articles as $Article)

                              <option value="{{$Article->id}}">{{$Article->libart}}</option>

                              @endforeach
                            </select>
                          </div>
            <div class="form-group">
                           <label>Quantité</label>
                          <input class="form-control" type="number" value="1" min="1" name="Qte"/>
            </div>
            <div class="form-group">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <button class="btn btn-primary" type="submit">Modifier</button>
            </div>
        </div>
      </form>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>

  <!-- Categorie -->

  <div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle categorie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('addCat') }}" method="POST">
          {{ csrf_field() }}
                      <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Libellé de la Catégorie:</label>
              <input type="text" class="form-control" name="libcat" id="recipient-name" required>
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
  <div class="modal fade" id="ViewCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Voir la Catégorie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">code de la Catégorie:</label>
                          <input type="text" class="form-control" name="id" id="idcatview" readonly>
                        </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Libellé de la Catégorie:</label>
              <input type="text" class="form-control" name="libcat" id="libcatview">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
  <div class="modal fade" id="editCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modification de la Catégorie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('editCat','id') }}" method="POST">
                                                             @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Code de la Catégorie:</label>
                          <input type="text" class="form-control" name="id" id="idcatedit" readonly>
                        </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Libellé de la Catégorie:</label>
              <input type="text" class="form-control" name="libcat" id="libcatedit" required>
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


  <div class="modal fade" id="deleteCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Voulez vous supprimer ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('deleteCat','id') }}" method="POST">
                                                             @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">code de la Catégorie:</label>
                          <input type="text" class="form-control" name="id" id="idcatdelete" readonly>
                        </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Libellé de la Catégorie:</label>
              <input type="text" class="form-control" name="libcat" id="libcatdelete" readonly>
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
  <!-- Categorie -->
  <!-- produit -->
  <div class="modal fade" id="addpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvau produit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('addpro') }}" method="POST">
          {{ csrf_field() }}
                      <div class="modal-body">
                        <div class="form-group">
                            <label>Libellé de la catégorie</label>
                            <select class="form-control select2" style="width: 100%;" name="cat_id">
                            @foreach($Categories as $Categorie)

                            <option value="{{$Categorie->id}}">{{$Categorie->libcat}}</option>

                            @endforeach
                            </select>
                        </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Libellé du produit:</label>
              <input type="text" class="form-control" name="libpro" id="recipient-name">
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
  <div class="modal fade" id="Viewpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Voir le produit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Code du produit:</label>
                          <input type="text" class="form-control" name="id" id="idproview" readonly>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Code du produit:</label>
                          <input type="text" class="form-control" name="id" id="cat_idview" readonly>
                        </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Libellé du produit:</label>
              <input type="text" class="form-control" name="libcat" id="libproview" readonly>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
  <div class="modal fade" id="editpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modification du produit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('editpro','id') }}" method="POST">
                                                             @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Libellé du produit:</label>
                          <input type="text" class="form-control" name="id" id="idproedit" readonly>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Libellé de la Catégorie:</label>
                          <select class="form-control select2" style="width: 100%;" name="cat_id">
                          @foreach($Categories as $Categorie)

                          <option value="{{$Categorie->id}}">{{$Categorie->libcat}}</option>

                          @endforeach
                          </select>                            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Libellé du produit:</label>
              <input type="text" class="form-control" name="libpro" id="libproedit">
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


  <div class="modal fade" id="deletepro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Voulez vous supprimer ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('deletepro','id') }}" method="POST">
                                                             @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Code du produit:</label>
                          <input type="text" class="form-control" name="id" id="idprodelete" readonly>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Libellé de la Catégorie:</label>
                          <input type="text" class="form-control" name="" id="cat_idelete" readonly>
                        </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Libellé du produit:</label>
              <input type="text" class="form-control" name="libcat" id="libprodelete" readonly>
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
  <!-- produit -->
  <!-- /.row -->

  <!-- article -->
  <div class="modal fade" id="addart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle article</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('addart') }}" method="POST">
          {{ csrf_field() }}
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Libellé de la Catégorie:</label>
                          <select class="form-control select2" style="width: 100%;" name="cat_id" required>
                          @foreach($Categories as $Categorie)

                          <option value="{{$Categorie->id}}">{{$Categorie->libcat}}</option>

                          @endforeach
                          </select>  
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Libellé de l'article:</label>
                          <input type="text" class="form-control" name="libart" required>
                        </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Quantité minimale sueil:</label>
              <input type="number" min="1" class="form-control" name="QteMin" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Prix unitaire:</label>
              <input type="number" min="1" class="form-control" name="Pu" id="recipient-name" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Valable aux remise</label>
              <select class="form-control select2" style="width: 100%;" name="reductible" required>

                <option value="0">Oui</option>
                <option value="1">Non</option>

                </select>              </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Quantité à laquelle sont Valable les réductions:</label>
              <input type="number" min="1" class="form-control" name="Qtered" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Montant à réduire:</label>
              <input type="number" min="1" class="form-control" name="montantmax" required>
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
  <div class="modal fade" id="Viewart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Voir l'article</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

                      <div class="modal-body">
                        <div class="form-group">
                            <label>Libellé de la Catégorie</label>
                            <input type="text" class="form-control" name="" id="idartview">

                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Libellé de l'article:</label>
                          <input type="text" class="form-control" name="libart" id="libartview">
                        </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Quantité minimale sueil:</label>
              <input type="number" min="1" class="form-control" name="QteMinview">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Prix unitaire:</label>
              <input type="number" min="1" class="form-control" name="Pu" id="Puview">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
  <div class="modal fade" id="editart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modification de l'article</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('editart','id') }}" method="POST">
                                                             @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <input type="text" class="form-control" name="id" id="idartedit">

            <div class="form-group">
              <label for="libartedit" class="col-form-label">Libellé de l'article:</label>
              <input type="text" class="form-control" name="libart" id="libartedit" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Quantité minimale sueil:</label>
              <input type="number" min="1" class="form-control" name="QteMin"  required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Prix unitaire:</label>
              <input type="number" min="1" class="form-control" name="Pu" id="recipient-name" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Valable aux remises</label>
              <select class="form-control select2" style="width: 100%;" name="reductible" required>

                <option value="0">Oui</option>
                <option value="1">Non</option>

                </select>              </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Quantité à laquelle sont Valable les remises:</label>
              <input type="number" min="1" class="form-control" name="Qtered" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Montant à réduire:</label>
              <input type="number" min="1" class="form-control" name="montantmax" required>
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
  <!-- Article -->
  <!-- Fournisseur -->

  <div class="modal fade" id="addFrs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau fournisseur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('addFrs') }}" method="POST">
          {{ csrf_field() }}
                      <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Libellé de la société:</label>
              <input type="text" class="form-control" name="nom" id="recipient-name" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nom du responsable:</label>
              <input type="text" class="form-control" name="rep" id="recipient-name" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Numéro de téléphone:</label>
              <input type="text" class="form-control" name="tel"  id="ex-phone" required>
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




  <div class="modal fade" id="editFrs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau fournisseur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('editFrs','id') }}" method="POST">
                                                             @csrf
                      @method('PUT')
                      <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id" id="idfrsedit" required>

              <label for="recipient-name" class="col-form-label">Libellé de la société:</label>
              <input type="text" class="form-control" name="nom" id="namefrsedit" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nom du responsable:</label>
              <input type="text" class="form-control" name="rep" id="repfrsedit" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Numéro de téléphone:</label>
              <input type="text" class="form-control" name="tel"  id="ex-phoneedit" required>
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
  <!-- Fournisseur -->


  <div class="modal fade" id="addLiv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle article</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('addLiv') }}" method="POST">
          {{ csrf_field() }}
                      <div class="modal-body">
                        <div class="form-group">
                            <label>Libellé de l'article</label>
                            <select class="form-control select2" style="width: 100%;" name="art_id">
                            @foreach($Articles as $Article)

                            <option value="{{$Article->id}}">{{$Article->libart}}</option>

                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Libellé du fournisseur</label>
                            <select class="form-control select2" style="width: 100%;" name="frs_id">
                            @foreach($Fournisseurs as $Fournisseur)

                            <option value="{{$Fournisseur->id}}">{{$Fournisseur->nom}}</option>

                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Quantité:</label>
                          <input type="number" min="1" class="form-control" name="Qte">
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
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Catégorie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Article</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Fournisseur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab1" data-toggle="pill" href="#custom-tabs-one-settings1" role="tab" aria-controls="custom-tabs-one-settings1" aria-selected="false">Approvisionnement</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab2" data-toggle="pill" href="#custom-tabs-one-settings2" role="tab" aria-controls="custom-tabs-one-settings2" aria-selected="false">Inventaire</a>
                  </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                 <div class="row">
                     <div class="col-md-10">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCat">Ajouter une Catégorie</button>
                     </div>
                     <div class="col-md-2">
                     </div>
                 </div>
                 <br>
                 <div class="row">
                     <div class="col-md-12">
                            @if ($errors->has('libcat'))
                            <div class="callout callout-danger">
                               <h4>ERREUR!</h4>
                                  <p>{{ $errors->first('libcat') }}</p>
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
                          <td>{{$Categorie->libcat}}</td>
                         <td>
                            <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-libcat="{{$Categorie->libcat}}" data-id="{{$Categorie->id}}" data-target="#ViewCat">
                                <i class="fas fa-folder">
                                </i>
                                voir
                            </a>
                            <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-libcat="{{$Categorie->libcat}}" data-id="{{$Categorie->id}}" data-target="#editCat">
                                <i class="fas fa-pencil-alt">
                                </i>
                                modifier
                            </a>
                            <a class="btn btn-danger btn-sm"  data-toggle="modal" data-libcat="{{$Categorie->libcat}}" data-id="{{$Categorie->id}}" data-target="#deleteCat" href="#">
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
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                  <div class="row">
                    <div class="col-md-10">
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addart">Ajouter une article</button>

                    </div>
                    <div class="col-md-2">

                   </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                           @if($errors->has('libart'))
                           <div class="callout callout-danger">
     <h4>ERREUR!</h4>

     <p>{{ $errors->first('libart') }}</p>
     </div>
                     @endif
                    </div>
                </div>
                <br/>
                   <table id="example3" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                     <th>Libellé</th>
                     <th>Catégorie</th>
                     <th>Prix unitaire</th>
                     <th>Quantité en stock</th>
                     <th>Quantité entrée</th>
                     <th>Quantité sortie</th>
                     <th>Action</th>
                   </tr>
                   </thead>
                   <tbody>
                     @foreach($Articles as $Article)
                     <tr>
                       <td>{{$Article->libart}}</td>
                       <td>{{$Article->categorie->libcat}}</td>
                       <td>{{$Article->Pu}}</td>
                       <td>{{$Article->QteStock}}</td>
                       <td>{{$Article->entree}}</td>
                       <td>{{$Article->sortie}}</td>
                       <td>

                          <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-libpro="{{$Article->categorie->libcat}}" data-libart="{{$Article->libart}}" data-id="{{$Article->id}}"  data-target="#editart">
                              <i class="fas fa-pencil-alt">
                              </i>
                              modifier
                          </a>
                       
                       </td>
                     </tr>
     @endforeach
                      </tbody>
                   <tfoot>
                   <tr>
                     <th>Libellé</th>
                     <th>Catégorie</th>
                     <th>Prix unitaire</th>
                     <th>Quantité en stock</th>
                     <th>Quantité entrée</th>
                     <th>Quantité sortie</th>
                     <th>Action</th>
                   </tr>
                   </tfoot>
                 </table>                      </div>
                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                  <div class="row">
                    <div class="col-md-10">
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFrs">Ajouter un fournisseur</button>

                    </div>
                    <div class="col-md-2">

                   </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                           @if($errors->has('nom')||$errors->has('rep')||$errors->has('tel'))
                           <div class="callout callout-danger">
     <h4>ERREUR!</h4>

     <p>{{ $errors->first('nom') }}</p>
     <p>{{ $errors->first('rep') }}</p>
     <p>{{ $errors->first('tel') }}</p>

     </div>
                     @endif
                    </div>
                </div>
                <br/>
                   <table id="example4" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                     <th>Code</th>
                     <th>Nom de la société</th>
                     <th>Représentant</th>
                     <th>Téléphone</th>
                     <th>Action</th>
                   </tr>
                   </thead>
                   <tbody>
                     @foreach($Fournisseurs as $Fournisseur)
                     <tr>
                       <td>{{$Fournisseur->id}}</td>
                       <td>{{$Fournisseur->nom}}</td>
                       <td>{{$Fournisseur->rep}}</td>

                       <td>{{$Fournisseur->tel}}</td>
                       <td>
                          <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-rep="{{$Fournisseur->rep}}" data-id="{{$Fournisseur->id}}" data-nom="{{$Fournisseur->nom}}" data-tel="{{$Fournisseur->tel}}" data-target="#editFrs">
                              <i class="fas fa-pencil-alt">
                              </i>
                              modifier
                          </a>
                       </td>
                     </tr>
      @endforeach
                   </tbody>
                   <tfoot>
                     <th>Code</th>
                     <th>Nom de la société</th>
                     <th>Représentant</th>
                     <th>Téléphone</th>
                     <th>Action</th>
                   </tfoot>
                 </table>
               </div>
                <div class="tab-pane fade" id="custom-tabs-one-settings1" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab1">
                  <div class="row">
                    <div class="col-md-4">
                    
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-secondary">
                      <div class="card-header">
                        <h3 class="card-title">Article</h3>
                          </div>
                            <div class="card-body">
                              <form action="{{ route('addLigne') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Article</label>
                                        <select class="form-control select2" style="width: 100%;" id="arti_id" name="art_id">
                                          @foreach($Articles as $Article)
                                          <option value="{{$Article->id}}">{{$Article->libart}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Quantité</label>

                                      <input type="number" min="1" value="1" class="form-control" name="Qte" id="Qtei">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                    <a href="/Retirer/all" class="btn btn-danger">Annuler</a>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                          <div class="col-md-12">
                            <div class="card card-secondary">
                                <div class="card-header">
                                   <h3 class="card-title">Information du panier</h3>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="row">
                                        <div class="col-md-3">
                                          <label class="label"> Nom du fournisseur: </label>
                                        </div> 
                                      <div class="col-md-3">
                                        <label id="display_supplyer" class="label"> Not selected </label>
                                      </div>  
                                      </div>
                                      <table class="table table-bordered">
    <thead>                  
      <tr>
        <th>Libellé</th>
        <th>Quantité</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($Carts as $Cart)

      <tr>
        <td><input type="text" class="form-control" readonly name="" value="{{$Cart->name}}"></td>
        <td><input type="text" name="" value="{{$Cart->qty}}" class="form-control" readonly></td>
        <td><a class="text-red" href="/Retirer/Livraison/{{$Cart->rowId}}"><i class="fas fa-trash"></i> </a> <a class="text-secondary" class="btn btn-danger" data-toggle="modal" data-target="#Mjr" data-id="{{$Cart->rowId}}" data-idp="{{$Cart->id}}" data-qe="{{$Cart->qty}}" href="#"><i class="fas fa-edit"></i> </a></td>
      </tr>
      @endforeach

    </tbody>
</table>

                                      </div>
                                  </div>
                                  <form action="{{ route('addLiv') }}" method="POST">
                                    {{ csrf_field() }}
                                 
                                    @if(Cart::count()!=0)
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control select2" onchange="supplyercheck(this)" style="width: 100%;"  id="frs_id" name="frs_id">
                                              @foreach($Fournisseurs as $Fournisseur)
                                                <option value="{{$Fournisseur->id}}">{{$Fournisseur->nom}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                      </div>
                                    
                                    </div>
                                    <div class="row">
                                      <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success">Enregistrer</button>
                                        <a href="/Retirer/all" class="btn btn-danger">Annuler</a>

                                      </div>
                                    </div>
                                    @endif
                                  
                                  </form>
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    </div>
      
                    
                    
                    
                 
                 


                <br/>
                <table id="example5" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Code</th>
                  <th>Date</th>

                  <th>Article</th>
                  <th>Fournisseur</th>
                  <th>Quantité</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($Livraisons as $Livraison)
                  <tr>
                    <td>{{$Livraison->id}}</td>
                    <td>{{$Livraison->dateCr}}</td>

                    <td>{{$Livraison->dateCr}}</td>
                    <td>{{$Livraison->fournisseurs->nom}}</td>

                    <td>{{$Livraison->Qte}}</td>

                  </tr>
   @endforeach
                </tbody>
                <tfoot>
                  <th>Code</th>
                  <th>Date</th>
                  <th>Article</th>
                  <th>Fournisseur</th>
                  <th>Quantité</th>
                </tfoot>
              </table>
            </div>
                 <div class="tab-pane fade" id="custom-tabs-one-settings2" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab2">

                <br/>
<div class="invoice p-3 mb-3">
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

  <!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-12">

<button type="button" class="btn btn-default" onclick="opendiag();"><i class="fas fa-print"></i> Imprimer</button>

    </div>
  </div>
</div>
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
