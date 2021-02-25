@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Souscriptions
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
                <h3 class="box-title">Liste des souscriptions</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Montant</th>
                    <th>Client</th>
                    <th>Tel</th>
                    <th>Départ</th>
                    <th>Destination</th>
                    <th>Transporteur</th>
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
                            <td with="8%">{{ $souscribe->heure_sousc }}</td>
                            <td>{{ $souscribe->montant_sousc }}</td>
                            <td width="14%">{{ $souscribe->nom }}</td>
                            <td>{{ $souscribe->phone }}</td>
                            <td>{{ $souscribe->villeDepart->nom }}</td>
                            <td>{{ $souscribe->villeArrivee->nom }}</td>
                            <td>{{ $souscribe->transporteur->nom }}</td>
                            <td>{{ $souscribe->mode_paiement }}</td>
                            <td>{{ $souscribe->ref_paiement }}</td>
                            <td>{{ $souscribe->code_agent }}</td>
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