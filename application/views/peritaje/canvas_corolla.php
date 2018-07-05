<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <title>E-Signature</title>
  <!-- Styles -->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <style>
    body {
      padding-top: 20px;
      padding-bottom: 20px;
    }
    #sig-canvas {
      border: 2px dotted #CCCCCC;
      border-radius: 5px;
      cursor: crosshair;
    }
    #sig-dataUrl {
      width: 100%;
    }
  </style>
</head>
<body>
  <!-- Content -->
  <div class="container">
    <div class="row">
     
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12" align="center">
        <canvas id="sig-canvas" width="500" height="245">
        </canvas>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12" align="center">
        <a href="#" class="btn btn-primary" id="sig-submitBtn" class="btn btn-success btn-xlg" download="<?=$id_cliente?>_sedan.jpeg">Guardar</a>
        <div style="display: none">
          <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
        </div>
      </div>
    </div>
    <br/>
    <br/>
  </div>
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <!--<script src="https://code.angularjs.org/snapshot/angular.min.js"></script>-->
  <script src="<?=$this->config->base_url()?>assets/js/singature.js"></script>
</body>
</html>