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
            <li class="breadcrumb-item active">Gestion des utilisateurs</li>
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

     
<div class="modal fade" id="use1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Boite de dialogue</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <h6 class="text-danger">Voulez-vous supprimer cet utilisateur?</h6>
       <div class="form-group">
          <label for="LibTypeStructure" class="col-form-label">Identifiant</label>
          <input type="text" class="form-control" id="idT" name="id" readonly="">
        </div>
         <div class="form-group">
          <label for="LibTypeStructure" class="col-form-label">Nom de l'utilisateur:</label>
          <input type="text" class="form-control" id="LibTypeStructure" name="LibTypeStructure" readonly="">
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      <a href="" type="button" class="btn btn-success supp">Valider</a>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="user2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Boite de dialogue</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <h6 class="text-danger">Voulez-vous éditer cet utilisateur?</h6>
       <div class="form-group">
          <label for="LibTypeStructure" class="col-form-label">Identifiant</label>
          <input type="text" class="form-control" id="idT" name="id" readonly="">
        </div>
         <div class="form-group">
          <label for="LibTypeStructure" class="col-form-label">Nom de l'utilisateur:</label>
          <input type="text" class="form-control" id="LibTypeStructure" name="LibTypeStructure" readonly="">
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      <a href="" type="button" class="btn btn-success supp">Valider</a>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="user3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Boite de dialogue</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <h6 class="text-danger">Voulez-vous nommer cet utilisateur en tant qu'admin?</h6>
       <div class="form-group">
          <label for="LibTypeStructure" class="col-form-label">Identifiant</label>
          <input type="text" class="form-control" id="idT" name="id" readonly="">
        </div>
         <div class="form-group">
          <label for="LibTypeStructure" class="col-form-label">Nom de l'utilisateur:</label>
          <input type="text" class="form-control" id="LibTypeStructure" name="LibTypeStructure" readonly="">
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      <a href="" type="button" class="btn btn-success supp">Valider</a>
    </div>
  </div>
</div>
</div>









     <div class="modal fade" id="user1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ajouter des Utilisateurs</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
                  <form method="POST" action="{{ route('User.store') }}">
                                      @csrf     
                                                  <div class="modal-body">


 <div class="form-group row">
                          <label for="etat" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                          <div class="col-md-6">
                            <select name="etat" id="etat" class="form-control">
                              <option value="1">Utilisateur</option>
                              <option value="0">Administrateur</option>
                            </select>

                              @if ($errors->has('etat'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('etat') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom et prénom') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                              @if ($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Nom d"utilisateur') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('mot de passe') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmé mot de passe') }}</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
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
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Utilisateur</a>
                </li>
             
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">
            
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                   <div class="row">
                       <div class="col-md-10">
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user1">Ajouter</button>
                       </div>
                       <div class="col-md-2">

                      </div>
                   </div>
                   <br>
                   <div class="row">
                       <div class="col-md-12">
                              @if ($errors->has('name')||$errors->has('email')||$errors->has('password'))
                              <div class="callout callout-danger">
        <h4>ERREUR!</h4>

        <p>{{ $errors->first('name')}}</p>
        <p>{{ $errors->first('email')}}</p>
        <p>{{ $errors->first('password')}}</p>

        </div>
                        @endif
                       </div>
                   </div>
                   <br/>
                   <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Ref</th>
                <th>nom et prénom</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              
                @foreach($Users as $User)
              <tr>
                <td>{{$User->id}}</td>
                <td>{{$User->name}}</td>
                <td>
                  @if($User->etat==1 && $User->connect==1)
            <span class="badge badge-warning">Utilisateur</span>
            <span class="badge badge-success">Actif</span>

            <!-- /.card-tools -->
          <!-- /.card-header -->
       
          <!-- /.card-body -->
                  @elseif ($User->etat==0 && $User->connect==1)
                 
        <span class="badge badge-warning">Administrateur</span>
            <span class="badge badge-success">Actif</span>
                  @elseif ($User->connect==0)
                  <span class="badge badge-warning">Utilisateur</span>
                  <span class="badge badge-danger">inactif</span>
                  @endif
               </td>

                <td>
                    @if($User->etat==1 && $User->connect==1)
                                       <button class="btn btn-danger" data-toggle="modal" data-target="#use1" data-id="{{$User->id}}" data-lib="{{$User->name}}"><i class="fa fa-trash"></i></button>

                                             <button class="btn btn-primary" data-toggle="modal" data-target="#user3" data-id="{{$User->id}}" data-lib="{{$User->name}}"><i class="fa fa-edit"></i> Admin</button>

                  @elseif ($User->etat==0 && $User->connect==1)
         
                  @elseif ($User->connect==0)
                                       <button class="btn btn-success" data-toggle="modal" data-target="#user2" data-id="{{$User->id}}" data-lib="{{$User->name}}"><i class="fa fa-edit"></i></button>

                  @endif
                  <button class="btn btn-secondary" data-toggle="modal" data-target="#recuser2" data-id="{{$User->id}}" data-lib="{{$User->name}}"><i class="fa fa-cog"></i></button>

                </td>
               
              </tr>
          
@endforeach

              </tbody>
              <tfoot>
                <tr>
                <th>Ref</th>
                <th>nom et prénom</th>
                <th>Role</th>
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
