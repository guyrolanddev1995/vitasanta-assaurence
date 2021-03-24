@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Souscriptions des véhicules
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
        <li class="active">Souscription</li>
      </ol>
    </section>

    <section class="content container-fluid" style="margin-top:10px">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Liste des souscriptions des véhicules</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Immatriculation</th>
                    <th>Mode de paiement</th>
                    <th>Référence du paiement</th>
                    <th>Code Encaisseur</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($souscribes  as $key => $souscribe)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td width="8%">{{ $souscribe->date_sousc }}</td>
                            <td>{{ $souscribe->montant }}</td>
                            <td width="14%">{{ $souscribe->immatriculation }}</td>
                            <td>{{ $souscribe->mode_paiement }}</td>
                            <td>{{ $souscribe->ref_paiement }}</td>
                            <td>{{ $souscribe->code_encaisseur }}</td>
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
@endsection