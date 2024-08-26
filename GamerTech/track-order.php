<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Detalles de seguimiento de pedidos</title>
<!-- Agregamos la biblioteca jsPDF -->
<script src="pdf/jsPDF-1.3.2/dist/jspdf.min.js"></script>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f0f0f0;
  }
  .invoice-details {
    text-align: center;
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 8px;
    max-width: 600px;
    background-color: #fff;
  }
  .company-name {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    text-transform: uppercase;
  }
  .company-info {
    font-size: 14px;
    margin-bottom: 10px;
    text-align: left;
  }
  .company-info p {
    margin: 5px 0;
  }
  .fontpink2 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: left;
  }
  .fontkink1, .fontkink2 {
    font-size: 16px;
    font-weight: bold;
    text-align: left;
  }
  .fontkink {
    font-size: 16px;
    text-align: left;
  }
  .row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
  }
  .label {
    flex-basis: 200px;
  }
  .success-message {
    font-weight: bold;
    color: green;
    text-align: left;
  }
  .error-message {
    font-weight: bold;
    color: red;
    text-align: left;
  }
  /* Estilo para el cuadro que agrupa los detalles */
  .details-box {
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 20px;
    text-align: left;
  }
  /* Estilo para la tabla */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  th, td {
    padding: 8px;
    border-bottom: 1px solid #ccc;
  }
</style>
</head>
<body>

<div class="invoice-details">
  <div class="company-name">GameTech Abancay</div>
  <div class="company-info">
    <p>Abancay, Perú</p>
    <p>gametechabancay@gmail.com</p>
    <p>Teléfono: (+51) 948445199</p>
  </div>

  <div class="fontpink2"><b>Detalle de seguimiento</b></div>

  <?php
    session_start();
    include_once 'includes/config.php';
    $oid=intval($_GET['oid']);
  ?>

  <!-- Contenedor del cuadro de detalles -->
  <div class="details-box">
    <table>
      <tr>
        <th>Orden nro:</th>
        <td><?php echo $oid; ?></td>
      </tr>

      <?php 
      $ret = mysqli_query($con, "SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
      $num = mysqli_num_rows($ret);
      if ($num > 0) {
        while ($row = mysqli_fetch_array($ret)) {
      ?>
        <tr>
          <th>FECHA:</th>
          <td><?php echo $row['postingDate']; ?></td>
        </tr>
        <tr>
          <th>ESTADO:</th>
          <td><?php echo $row['status']; ?></td>
        </tr>
        <tr>
          <th>OBSERVACIÓN:</th>
          <td><?php echo $row['remark']; ?></td>
        </tr>
      <?php 
        }
      } else {
      ?>
        <tr>
          <td colspan="2" class="error-message">
            Orden aún no procesada
          </td>
        </tr>
      <?php  
      }

      $st = 'Delivered';
      $rt = mysqli_query($con, "SELECT * FROM orders WHERE id='$oid'");
      while ($num = mysqli_fetch_array($rt)) {
        $currrentSt = $num['orderStatus'];
      }
      if ($st == $currrentSt) {
      ?>
        <tr>
          <td colspan="2" class="success-message">
            Producto entregado exitosamente
          </td>
        </tr>
      <?php 
      } 
      ?>
    </table>
  </div>

  <!-- Botón de imprimir -->
  <button onclick="generatePDF()">DESCARGAR</button>

</div>

<!-- Agregamos el script para generar el PDF -->
<script>
  function generatePDF() {
    // Crear una instancia de jsPDF
    var doc = new jsPDF();

    // Obtenemos el contenido de la factura
    var invoiceContent = document.querySelector('.invoice-details').innerHTML;

    // Generamos el PDF con el contenido de la factura
    doc.fromHTML(invoiceContent, 15, 15, {
      'width': 180
    });

    // Descargamos el PDF con el nombre "detalle_seguimiento.pdf"
    doc.save('detalle_seguimiento.pdf');
  }
</script>

</body>
</html>
