<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Actualizar pedido</title>
<style>
  /* Agrega tus estilos CSS aquí */

  body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
  }

  #container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }

  h1 {
    color: #ff6f69;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
  }

  th {
    text-align: left;
  }

  td {
    text-align: center;
  }

  select, textarea {
    width: 100%;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  .btn-group {
    display: flex;
    justify-content: space-between;
  }

  .btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
  }

  .btn-primary {
    background-color: #ff6f69;
  }

  .btn-secondary {
    background-color: #4ecdc4;
  }
</style>
</head>
<body>

<?php
session_start();

include_once 'include/config.php';
if(strlen($_SESSION['alogin'])==0)
{ 
  header('location:index.php');
}
else {
  $oid = intval($_GET['oid']);
  if(isset($_POST['submit2'])){
    $status = $_POST['status'];
    $remark = $_POST['remark'];//space char

    $query = mysqli_query($con,"insert into ordertrackhistory(orderId,status,remark) values('$oid','$status','$remark')");
    $sql = mysqli_query($con,"update orders set orderStatus='$status' where id='$oid'");
    echo "<script>alert('pedido actualizado correctamente');</script>";
  }
}
?>

<div id="container">
  <h1>Actualizar estado de pedido</h1>

  <table>
    <tr>
      <th>Nro Orden:</th>
      <td><?php echo $oid; ?></td>
    </tr>
    <?php
    $ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
    while($row=mysqli_fetch_array($ret)) {
    ?>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $row['postingDate']; ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php echo $row['status']; ?></td>
    </tr>
    <tr>
      <th>Observación:</th>
      <td><?php echo $row['remark']; ?></td>
    </tr>
    <?php } ?>
  </table>

  <?php
  $st = 'Delivered';
  $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
  while($num=mysqli_fetch_array($rt)) {
    $currrentSt = $num['orderStatus'];
  }
  if($st == $currrentSt) {
  ?>
  <p><b>Producto entregado</b></p>
  <?php } else { ?>
  <form name="updateticket" id="updateticket" method="post">
    <table>
      <tr>
        <td><b>Estado:</b></td>
        <td>
          <select name="status" required>
            <option value="">Seleccionar estado</option>
            <option value="En proceso">En proceso</option>
            <option value="Entregado">Entregado</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><b>Observaciones:</b></td>
        <td>
          <textarea cols="50" rows="7" name="remark" required></textarea>
        </td>
      </tr>
    </table>
    <div class="btn-group">
      <input type="submit" name="submit2" value="Actualizar" class="btn btn-primary" />
      <input type="submit" name="submit2" value="Cerrar Ventana" class="btn btn-secondary" onClick="return f2();" />
    </div>
  </form>
  <?php } ?>
</div>

<script language="javascript" type="text/javascript">
function f2() {
  window.close();
}
</script>

</body>
</html>
