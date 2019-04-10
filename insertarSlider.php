

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
      <link rel="stylesheet" href="css/estilos2.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="css/estilos.css" rel="stylesheet">
</head>


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <br>
          <br>
          <br>
          <br>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button  type="button" class="btn btn-sm btn-outline-danger cancelar"><a href="sliders.php">Cancelar</a></button>
              <button type="button" class="btn btn-sm btn-outline-success" id="nuevo_registro"><a href="insertarSliders.php">Nuevo</a></button>
            </div>
          </div>
        </div>

        <div class="table-responsive view" id="show_data">
</body>

        <h2>Sliders</h2>
        <div class="table-responsive view" id="show_data">
          <form action="insertarSliders.php" method="POST">
    <div class="campo">
      <label for="texto">Texto</label>
      <input type="text" name="texto" >
    </div>
    <div class="campo">
      <input type="submit" value="insertar">
    </div>
  </form>
            </thead>

            <tbody></tbody>
          </table>
        </div>
        </body>
</html>