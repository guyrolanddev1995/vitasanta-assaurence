<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Agents
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
        <li class="active">Agent</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top:20px">
        <div class="row mt-4">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ajouter un agent</h3>
                </div>
               
                <form role="form"  enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group @error('matricule') has-error @enderror">
                      <label for="matricule">Matricule</label>
                      <input type="text" wire:model="matricule" class="form-control" id="matricule" placeholder="Entrer le numero matricule">
                      @error('agent') 
                          <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                              {{ $message }}
                          </label>
                      @enderror
                    </div>

                    <div class="form-group @error('nom') has-error @enderror">
                        <label for="nom">Nom</label>
                        <input type="text" wire:model="nom" class="form-control" id="nom" placeholder="Entrer le nom dd l'agent">
                        @error('nom') 
                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="form-group @error('prenom') has-error @enderror">
                        <label for="prenom">Prénom</label>
                        <input type="text" wire:model="prenom" class="form-control" id="prenom" placeholder="Entrer le prénom de l'argent">
                        @error('prenom') 
                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                {{ $message }}
                            </label>
                        @enderror
                    </div>

                    <div class="form-group @error('code') has-error @enderror">
                        <label for="code">code d'encaissement</label>
                        <input type="text" wire:model="code" class="form-control" id="code" placeholder="Entrer le d'encaissement de l'agent">
                        @error('code') 
                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                </div>
                  <!-- /.box-body -->
    
                  <div class="box-footer">
                    @if($isUpdated)
                        <button type="submit" wire:click.prevent="cancel" class="btn btn-secondary">Annuler</button>
                        <button type="submit" wire:click.prevent="update" class="btn btn-primary pull-right">Mettre à jour</button>
                    @else
                        <button type="submit" wire:click.prevent="save" class="btn btn-primary pull-right">Enregister</button>
                    @endif
                    
                  </div>
                </form>
              </div>
              <!-- /.box -->    
            </div>
        </div>
    </section>

    <section class="content container-fluid" style="margin-top:10px">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Liste des Agents</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="14%">Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Code</th>
                    <th width="18%">Date</th>
                    <th width="10%">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($agents as $key => $agent)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $agent->matricule }}</td>
                            <td>{{ $agent->nom }}</td>
                            <td>{{ $agent->prenom }}</td>
                            <td>{{ $agent->code }}</td>
                            <td>{{ $agent->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <button wire:click="edit({{ $agent->id }})" href="#"  class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                                    <button wire:click="delete({{ $agent->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
    
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>