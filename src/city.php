<?php
require('../config/database.php');
header('Content-Type: text/html; charset=utf-8');

// --- Insertar ciudad ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $country_id = $_POST['country_id'];
    $city_name  = $_POST['city_name'];

    if (!empty($country_id) && !empty($city_name)) {
        $query = "INSERT INTO cities (name, region_id) VALUES ($1, $2)";
        $res = pg_query_params($supa_conn, $query, array($city_name, $country_id));
        echo $res ? "<script>alert('Ciudad registrada correctamente');</script>"
                  : "<script>alert('Error al registrar la ciudad');</script>";
    }
}

// --- Cargar países ---
$query_countries = "SELECT id, name FROM countries ORDER BY name ASC";
$result_countries = pg_query($supa_conn, $query_countries);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Market-App || Add City</title>
  <link rel="icon" type="image/png" href="icons/market_main.png"/>
</head>
<body bgcolor="#D2D9D3">

  <h2>Registrar Ciudad</h2>

  <form method="POST" action="">
    <label>País:</label>
    <select name="country_id" required>
      <option value="">--Seleccione un país--</option>
      <?php while ($row = pg_fetch_assoc($result_countries)): ?>
        <option value="<?php echo htmlspecialchars($row['id']); ?>">
          <?php echo htmlspecialchars($row['name']); ?>
        </option>
      <?php endwhile; ?>
    </select>

    <br><br>

    <label>Ciudad:</label>
    <input type="text" name="city_name" required>

    <br><br>
    <button type="submit">Guardar Ciudad</button>
  </form>

</body>
</html>
