<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap - Prebuilt Layout</title>

<!-- Bootstrap -->
<link href="../static/css/bootstrap.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

</head>
<body>

<div class="container-fluid">


  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 class="text-center">Revisar Turno</h3>
    </div>

  </div>
 <hr>

</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-12">
    
    </div>

    <form id="form1" name="form1" method="post" action="consultar_turno.php" >

	  <label>Turno</label>
    <input type="text" class="form-control" name="codigo" id="codigo" value=""><br>
    
<br>
   <input class="btn btn-success btn-lg"  value="Consultar" onClick="verificar_campos()" name="enviar">
    </form>

  </div>
  
  
  
  
  
  
  <hr>
  
  </div>
  <hr>
 
  
  <hr>
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>Footer </h4>
      <p>Copyright &copy; 2015 &middot; All Rights Reserved &middot; <a href="http://yourwebsite.com/" >My Website</a></p>
    </div>
  </div>
  
  
  <hr>
</div>

</body>



<script type="text/javascript">
  

function verificar_campos() {
    var text=document.forms[0].codigo.value.length;
    if(text==0) {
        document.forms[0].codigo.focus();
        alert("Ingresar el Código del turno de 8 Caracteres ");
        return false;
    }else{
        document.forms[0].submit();
    }

}

</script>

<script src="../static/js/jquery.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../static/js/bootstrap.js"></script>
</html>
