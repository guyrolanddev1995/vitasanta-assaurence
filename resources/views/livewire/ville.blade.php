<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Villes
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
            <li class="active">Villes</li>
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
                      <h3 class="box-title">Ajouter une ville</h3>
                    </div>
                   
                    <form role="form"  enctype="multipart/form-data">
                      <div class="box-body">
                        <div class="form-group @error('ville') has-error @enderror">
                          <label for="ville">Nom de la ville</label>
                          <input type="text" wire:model="ville" class="form-control" id="ville" placeholder="Entrer le nom de la ville">
                          @error('ville') 
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
                    <h3 class="box-title">Liste des villes</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th width="5%">#</th>
                        <th>Ville</th>
                        <th width="18%">Date</th>
                        <th width="10%">Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($villes as $key => $ville)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $ville->nom }}</td>
                                <td>{{ $ville->created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button wire:click="edit({{ $ville->id }})" href="#"  class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                                        <button wire:click="delete({{ $ville->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
        <!-- /.content -->
    </div>
</div>
