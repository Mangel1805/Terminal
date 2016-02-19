<a href="arden-insertar.php">
<input type="button"  class="btn-info btn-lg" name="button" id="button" value="Nuevo">
</a>
</div>
<?Php

  //require('../../conexion.php'); //llama al archivo conexion
  $con=Conectar();
  $sql=$con->prepare('select * from arden'); //Se prepara la sentencia SQL
  $sql->execute(); //ejecutarla sentencia
  $resultado=$sql->fetchALL(PDO::FETCH_ASSOC); //FETCHALL devuleve un array que contiene todas las filas de una tabla

  // echo "<a href='formulario.php'>Insertar</a></br></br>";
   echo("<hr><table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th>#</th>
            <th>TERMINAL</th>
            <th>DESCRIPCION</th>
            <th>VALOR</th>
            <th>--------</th>
            <th>--------</th>
        </tr>
    </thead>
    <tbody>");
       
  foreach($resultado as $row)
  {
   // echo("<tr> <td>". $row["per_ced"]."</td><td>".$row["per_nombre"].  " </td><td> ".$row["per_apellido"]."</td><td>".$row["per_telefono"]."</td><td>".$row["per_direccion"]."</td><td>".$row["per_ciudad"]."</td><td>".$row["per_email"]."</td><td><a href='up.php?id=".$row["per_id"]."  '>Eliminar</a></td><td><a href='eli.php?id=".$row["per_id"]."'>Eliminar</a></td></tr>");
    echo("<tr>
            <td>".$row["ard_id"]."</td>
            <td>".$row["ard_terminal"]."</td>
            <td>".$row["ard_descipcion"]."</td>
            <td>".$row["ard_valor"]."</td>
           <td><a href='../../Terminal/arden-actualizar.php?
            id=".$row["ard_id"].
            "&terminal=".$row["ard_terminal"].
            "&descripcion=".$row["ard_descipcion"].
            "&valor=".$row["ard_valor"].
            "'><button type='button' class='btn btn-primary btn-sm'>
                  <span class='glyphicon glyphicon-edit' aria-hidden='true'>
                  </span>
               </button>
            </a></td>
            <td><a href='../../Terminal/arden-eliminar.php?id=".$row["ard_id"]."  '>
            <button type='button' class='btn btn-danger btn-sm'>
                      <span class='glyphicon glyphicon-remove' aria-hidden='true'>
                      </span>
                  </button>
            </a></td>
        </tr>");
  }
    
  echo "</tbody></table></div>";
  //header("location:http://localhost/mantenimiento/formulario.php")
?>
