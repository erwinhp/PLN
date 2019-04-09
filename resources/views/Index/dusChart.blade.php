@extends('layouts.Dash')
@section('content')
<?php

  $pr='';
  $pr2='';
  $pr3='';
 ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->
<link rel="stylesheet" href="{{URL::to('/')}}/assets/libs/css/Indexreq.css">
<script src="{{URL::to('/')}}/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/DD.js') }}"></script>


<div class="select">
    <form action="" method="get" >
    <select name="var2" class="center-on-page" id="dropkabReq">
    <option value="0" style="display:none;font-size:20px;">Kabupaten</option>
    @foreach ($Kab as $k)
    <option value="{{$k->id}}">{{$k->kabupaten}}</option>
    @endforeach
    </select>
    </form>
</div>


<div class="select">
  <form action="" method="get" id="ddKec">
  </form>
</div>

<div class="select">
    <form action="" method="get" id="dddes">
    </form>
</div>

<div class="select">
    <form action="" method="get" id="dddus">
    <?php
    if (isset($_GET['var4'])) {$pr=$_GET['var4'];}
    $Dest = DB::select('SELECT id,RtRw,PotPel,Keterangan,idDus FROM ket WHERE (idDus)=:j', ['j' => $pr]);
    $PLN=0;
    $NONPLN=0;
    $BELUM=0;
     ?>
    </form>
</div>

@foreach ($Dest as $dusz)
@if ($dusz->Keterangan === "PLN")
<?php
$PLN=$PLN+1;
 ?>
@elseif($dusz->Keterangan === "NON PLN")<?php
$NONPLN=$NONPLN+1;
?>
@else
<?php
$BELUM=$BELUM+1;
?>
@endif
@endforeach


<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div style="width:100%;margin-top: 20px;">
  <span class="pull-right clearfix"></span>
     <div class="card">
         <div class="card-body">
  <head>
      <!--Load the AJAX API-->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Topping');
          data.addColumn('number', 'Slices');
          data.addRows([
            ['PLN', <?php echo $PLN ?>],
            ['NON PLN', <?php echo $NONPLN ?>],
            ['Belum', <?php echo $BELUM ?>],

          ]);

          // Set chart options
          var options = {'title':'Chart Dusun',
                         'width':900,
                         'height':750};

          // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
      </script>
    </head>

    <body>
      <!--Div that will hold the pie chart-->
      <div id="chart_div"></div>
    </body>



</div>
</div>
</div>
</div>



@endsection
