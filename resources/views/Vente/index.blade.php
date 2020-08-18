@extends('layouts.layout')

@section('content')
<script>
    function opendiag(lien) {
    window.open(''+lien+'', "Recu", "height=850,width=850");
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
            <li class="breadcrumb-item active">Gestion des ventes</li>
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
      <div class="modal fade" id="Mjr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                   <form action="{{route('ModifierCart','id')}}" class="form-info" method="post" autocomplete="on">
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
      <div class="modal fade" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle réduction sur vente</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
 <form action="{{ route('Reduction.store') }}" method="POST">
                                       @csrf              	  <div class="modal-body">

 <div class="form-group">
                 <label for="libelle">Libellé de la réduction</label>
                 <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Libellé de la réduction" required="">
               </div>

 <div class="form-group">
                 <label for="dateD">Date début de la promo</label>
                 <input type="date" class="form-control" name="dateD" placeholder="Date début de la promo" required="">
               </div>
               <div class="form-group">
                 <label for="dateF">Date de fin de la promo</label>
                 <input type="date" class="form-control" name="dateF" placeholder="Date fin de la promo" required="">
               </div>
               <div class="form-group">
                 <label for="taux">Taux</label>
                 <input type="number" class="form-control" min="1" value="5" max="100" id="taux" name="taux" placeholder="taux de la promo" required="">
               </div>
                 <div class="form-group">
                 <label for="min">somme minimale</label>
                 <input type="number" class="form-control" min="1" id="min" name="min" placeholder="somme minimale" required="">
               </div>
                     <div class="form-group">
                 <label for="max">somme maximale</label>
                 <input type="number" class="form-control" min="1" id="max" name="max" placeholder="somme maximale" required="">
               </div>
                 </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
               <button type="submit" class="btn btn-primary">Sauvegarder</button>
             </div>
             </form>

           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
       </div>

  <div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle réduction sur article</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('Redpro.store') }}" method="POST">
              {{ csrf_field() }}
                          <div class="modal-body">
                            <div class="form-group">
            <label>Libellé de l'article</label>
            <select class="form-control select2" style="width: 100%;" name="art_id">
            @foreach($Article1s as $Article1)

            <option value="{{$Article1->id}}">{{$Article1->libart}}</option>

            @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="libelle">Libellé de la réduction</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Libellé de la réduction" required="">
            </div>

            <div class="form-group">
            <label for="dateD">Date début de la réduction</label>
            <input type="date" class="form-control" id="dateD" name="dateD" placeholder="Date début de la réduction" required="">
            </div>
            <div class="form-group">
            <label for="dateF">Date de fin de la réduction</label>
            <input type="date" class="form-control" id="dateF" name="dateF" placeholder="Date fin de la réduction" required="">
            </div>
            <div class="form-group">
            <label for="taux">Taux</label>
            <input type="number" min="1" class="form-control" value="5" max="100" id="taux" name="taux" placeholder="taux de la réduction" required="">
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

      <!-- /.row -->


      <div class="modal fade" id="reql" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ajouter un reglement</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
<form id="myform">
  <div class="modal-body">
    <div class="form-group">
  <label>Référence de la vente</label>
  <select class="form-control select2" style="width: 100%;" id="vente_id" name="vente_id">
  @foreach($Ventes1 as $Vente1)

  <option value="{{$Vente1->id}}">{{$Vente1->ref}}</option>

  @endforeach
  </select>
  </div>
  <div class="form-group">
  <label id="donne">Mode de reglement</label>

  <select class="form-control select2" style="width: 100%;" name="mode_id" id="mode_id" required>
  @foreach($Modes as $Mode)

  <option value="{{$Mode->id}}">{{$Mode->libelle}}</option>

  @endforeach
  </select>                                            </div>

  <div class="form-group">
  <label id="donne">Montant</label>
         <input type="number" class="form-control" min="50" value="100" name="donne" id="donnei">
  </div>
  <div class="form-group">
  <label id="montant">Montant à payer</label>
  <input type="number" class="form-control" min="50" value="100" name="montant" id="montanti">
  </div>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-danger" id="closest" data-dismiss="modal">Fermer</button>
  <button type="button" id="ajaxSubmit" class="btn btn-primary">Valider</button>
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
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Vente</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-reg-tab" data-toggle="pill" href="#custom-tabs-one-reg" role="tab" aria-controls="custom-tabs-one-reg" aria-selected="false">Reglement</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Réduction générale</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Réduction sur article</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">Ajouter une ligne</h3>
                        </div>
    
                        <form action="{{ route('addCart') }}" class="" method="POST">
                          {{ csrf_field() }}
                        <div class="card-body">

    <div class="row">
    <div class="form-group col-md-12">
            <label>Libellé de l'article</label>
            <select class="form-control select2" style="width: 100%;" name="art_id" required>
             @foreach($Articles as $Article)

              <option value="{{$Article->id}}">{{$Article->libart}}</option>

              @endforeach
            </select>
          </div>
    </div>
    <div class="row">
    <div class="form-group col-md-12">
            <label for="QteMin1">Quantité</label>
            <input type="number" value="1" min="1"  required name="Qte" class="form-control">
     </div>
    </div>

                        </div>
                        <div class="card-footer">
                          <div class="row">
                            <div class="form-group col-md-12">
                          <button type="submit" class="btn btn-lg btn-success">Ajouter</button>
                          </div>
                          </div>
                        </div>
                      </form>

                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card card-secondary">
                                <div class="card-header">
                                  <h3 class="card-title">Le panier</h3>
                                </div>


                                <div class="card-body">

                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Libellé</th>
                                        <th>Pu</th>
                                        <th>Qte</th>
                                        <th>Total brut</th>
                                        <th>Réduction</th>
                                        <th>Total à payer</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($Carts as $Cart)

                                      <tr>
                                        <td><input type="text" class="form-control" readonly name="" value="{{$Cart->name}}"></td>
                                        <td>
                                          <input type="text" name="" value="{{$Cart->price}}" class="form-control" readonly>
                                        </td>
                                        <td>
                                          <input type="text" name="" value="{{$Cart->qty}}" class="form-control" readonly>
                                        </td>
                                        <td>
                                          <input type="text" name="" value="{{$Cart->qty*$Cart->price}}" class="form-control" readonly>
                                        </td>
                                        <td>
                                          <input type="text" name="" value="{{($Cart->qty*$Cart->price)*$Cart->options->size}}" class="form-control" readonly>
                                        </td>
                                        <td>
                                          <input type="text" name="" id="result" value="{{($Cart->qty*$Cart->price)-($Cart->qty*$Cart->price*$Cart->options->size)}}" class="form-control" readonly>
                                        </td>
                                        <td>
                                          <a class="text-red" href="/Retirer/{{$Cart->rowId}}"><i class="fas fa-trash"></i> </a> <a class="text-secondary" class="btn btn-danger" data-toggle="modal" data-target="#Mjr" data-id="{{$Cart->rowId}}" data-idp="{{$Cart->id}}" data-qe="{{$Cart->qty}}" href="#"><i class="fas fa-edit"></i> </a>
                                        </td>
                                      </tr>
                                      @endforeach

                                    </tbody>
                                </table>
                                </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col-md-12">
                            <h4>
                              Nombre de produit: {{Cart::count()}}
                            </h4>
                          </div>
                        </div>
                      </div>
                                <!-- /.card-body -->
                              </div>
                    </div>
                  </div>

<div class="row">
  <div class="col-md-4">

  </div>
  <div class="col-md-8">
    @if (Cart::count()!=0)
    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">Reglement</h3>

      </div>
      <form id="formee">
      <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="form-control select2" style="width: 100%;" id="tvav" name="tva" required>
                        <option value="0.18">Oui</option>
                        <option value="0">Non</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="form-control select2" style="width: 100%;" name="mode_id" id="mode_idv" required>
                      @foreach($Modes as $Mode)

                      <option value="{{$Mode->id}}">{{$Mode->libelle}}</option>

                      @endforeach
                    </select>                                            </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="number" class="form-control" min="50" value="100" id="donnev" name="donne">
                  </div>
                </div>


            </div>
      </div>
      <div class="card-footer">
        <div class="form-group">
          <button type="button" id="addvente" class="btn btn-success">Enregistrement</button>
          <a class="btn btn-danger" href="/Retirer/vente">Annuler</a>
        </div>
      </div>
      </form>

      </div>
    @endif

  </div>
</div>
<br/>
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
  <th>etat</th>
 <th></th>

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
  <th>Opérateur</th>  <th>etat</th>

 <th></th>

</tr>
</tfoot>
</table>

                </div>
                <div class="tab-pane fade" id="custom-tabs-one-reg" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  <div class="row">
                      <div class="col-md-10">
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reql">Ajouter une reglement</button>
                      </div>
                      <div class="col-md-2">

                     </div>
                  </div>

                  <br>

                  <br/>
                     <table id="example5" class="table table-bordered table-striped ">
                     <thead>
                     <tr>
                       <th>Date</th>
                       <th>Référence de la vente</th>
                       <th>Montant donné</th>
                       <th>Montant payé</th>
                       <th>Relicat</th>
                       <th>Mode de payement</th>
                       <th></th>

                     </tr>
                     </thead>
                     <tbody>
                         @foreach($Reglements as $Reglement)
                         <tr>
                           <td>{{$Reglement->datecr}}</td>
                           <td>{{$Reglement->vente->ref}}</td>
                           <td>{{$Reglement->donne}}</td>
                           <td>{{$Reglement->montant}}</td>
                           <td>{{$Reglement->relicat}}</td>
                           <td>{{$Reglement->mode->libelle}}</td>
                           <td></td>

                         </tr>

         @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                      <th>Date</th>
                      <th>Référence de la vente</th>
                      <th>Montant donné</th>
                      <th>Montant payé</th>
                      <th>Relicat</th>
                      <th>Mode de payement</th>
                      <th></th>

                     </tr>
                     </tfoot>
                   </table>
                           </div>
                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  @if((Auth::user()->etat==0))

                  <div class="row">
                      <div class="col-md-10">
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-info">Ajouter une réduction sur vente</button>
                      </div>
                      <div class="col-md-2">

                     </div>
                  </div>
                  @endif
                  <br>
                  <div class="row">
                      <div class="col-md-12">
                             @if ($errors->has('libelle'))
                             <div class="callout callout-danger">
       <h4>ERREUR!</h4>

       <p>{{ $errors->first('libelle') }}</p>
       </div>
                       @endif
                      </div>
                  </div>
                  <br/>
                     <table id="example3" class="table table-bordered table-striped ">
                     <thead>
                     <tr>

                       <th>Code</th>
                       <th>Libellé de la réduction</th>
                       <th>Taux</th>
                       <th>Date début</th>
                       <th>Date Fin</th>

                     </tr>
                     </thead>
                     <tbody>
                         @foreach($Reductions as $Reduction)
                         <tr>
                           <td>{{$Reduction->id}}</td>
                           <td>{{$Reduction->libelle}}</td>
                           <td>{{$Reduction->taux*100}}%</td>
                           <td>{{$Reduction->dateD}}</td>
                           <td>{{$Reduction->dateF}}</td>

                         </tr>

         @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                       <th>Code</th>
                       <th>Libellé de la réduction</th>
                       <th>Taux</th>
                       <th>Date début</th>
                       <th>Date Fin</th>
                     </tr>
                     </tfoot>
                   </table>
                           </div>
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                  @if((Auth::user()->etat==0))

                  <div class="row">
                      <div class="col-md-10">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCat">Ajouter une réduction sur article</button>
                      </div>
                      <div class="col-md-2">

                     </div>
                  </div>
                  @endif
                  <br>
                  <div class="row">
                      <div class="col-md-12">
                             @if ($errors->has('libelle'))
                             <div class="callout callout-danger">
       <h4>ERREUR!</h4>

       <p>{{ $errors->first('libelle') }}</p>
       </div>
                       @endif
                      </div>
                  </div>
                  <br/>
                     <table id="example1" class="table table-bordered table-striped ">
                     <thead>
                     <tr>

                       <th>Code</th>
                       <th>Libellé de la réduction</th>
                       <th>Libellé du produit</th>
                       <th>Taux</th>
                       <th>Date début</th>
                       <th>Date Fin</th>

                     </tr>
                     </thead>
                     <tbody>
                         @foreach($Redpros as $Redpro)
                         <tr>
                           <td>{{$Redpro->id}}</td>
                           <td>{{$Redpro->libelle}}</td>
                           <td>{{$Redpro->article->libart}}</td>
                           <td>{{$Redpro->taux*100}}%</td>
                           <td>{{$Redpro->dateD}}</td>
                           <td>{{$Redpro->dateF}}</td>

                         </tr>

         @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                       <th>Code</th>
                       <th>Libellé de la réduction</th>
                       <th>Libellé du produit</th>
                       <th>Taux</th>
                       <th>Date début</th>
                       <th>Date Fin</th>
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
