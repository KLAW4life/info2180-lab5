
<?php 
  $country = filter_var($_GET['country'], FILTER_SANITIZE_STRING);
  $cities = filter_var($_GET['context'], FILTER_SANITIZE_STRING);
?>


<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
// $stmt = $conn->query("SELECT * FROM countries");
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
$cities_search = $conn->query(" SELECT DISTINCT cities.name as cities_name, cities.country_code, cities.district,
cities.population,countries.name as cities_country_name, countries.continent,countries.independence_year,countries.head_of_state FROM cities JOIN countries ON
cities.country_code = countries.code WHERE countries.name LIKE '%$country%';");


$cities_results = $cities_search->fetchAll(PDO::FETCH_ASSOC);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php 
/*
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
*/
?>


<?php if(empty($cities)): 
  // var_dump($results);
  ?>
  <table>
    <tr id="head">
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>

    <?php foreach ($cities_results as $row): ?>
      <tr>
        <td><?=$row['cities_name']?></td>
        <td><?=$row['district']?></td>
        <td><?=$row['population']?></td>
      </tr>

    <?php endforeach; ?>
  </table>

<?php else: 
  // var_dump($cities_results);
  ?>
  <table>
    <tr>
      <th>Country Name</th>
      <th>Continent</th>
      <th>Independence Year</th>
      <th>Head of State</th>
    </tr>

    <?php foreach ($results as $row): ?>
      <tr>
        <td><?=$row['name']?></td>
        <td><?=$row['continent']?></td>
        <td><?=$row['independence_year']?></td>
        <td><?=$row['head_of_state']?></td>
      </tr>

    <?php endforeach; ?>
  </table>
  
<?php endif;?>

