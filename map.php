<?php include "header.php"; ?>

<div class="card">
<h2>🌍 Emission Map by City</h2>
<p>
Green = Low emission | Orange = Medium | Red = High emission<br>
🔴 Red AQI markers show highly polluted cities.
</p>

<div id="map" style="height:500px;"></div>
</div>

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<?php
$q = $conn->query("
SELECT users.city,
AVG(history.footprint) avgf
FROM history
JOIN users ON users.id = history.user_id
GROUP BY users.city
");

if(!$q){
    die("Query error: ".$conn->error);
}

$cities = [];

while($row = $q->fetch_assoc()){
    if(!empty($row['city']))
        $cities[] = $row;
}
?>

<script>

/* Map center */
var map = L.map('map').setView([20.5937,78.9629],5);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
    attribution:'© OpenStreetMap'
}).addTo(map);

/* Emission data */
let cities = <?= json_encode($cities) ?>;

/* Coordinates */
let coords = {
    "Mumbai":[19.0760,72.8777],
    "Pune":[18.5204,73.8567],
    "Delhi":[28.7041,77.1025],
    "Bangalore":[12.9716,77.5946],
    "Chennai":[13.0827,80.2707],
    "Hyderabad":[17.3850,78.4867],
    "Kolkata":[22.5726,88.3639],
    "Ahmedabad":[23.0225,72.5714]
};

/* Add emission markers */
cities.forEach(cityData => {

    let city = cityData.city;
    let avg = parseFloat(cityData.avgf);

    if(coords[city]) {

        let color = "green";

        if(avg > 20)
            color = "red";
        else if(avg >= 10)
            color = "orange";

        let icon = L.divIcon({
            html: `<div style="
                background:${color};
                width:18px;
                height:18px;
                border-radius:50%;
                border:2px solid white;
                box-shadow:0 0 6px rgba(0,0,0,0.5);
            "></div>`
        });

        L.marker(coords[city], {icon: icon})
        .addTo(map)
        .bindPopup(
            `<b>${city}</b><br>
             Avg Emission: ${avg.toFixed(2)} kg CO₂/day`
        );
    }
});


/* ================= AQI MAJOR CITIES ================= */

/* Approximate AQI values */
let aqiCities = [
    {city:"Delhi", lat:28.7041, lng:77.1025, aqi:320},
    {city:"Mumbai", lat:19.0760, lng:72.8777, aqi:180},
    {city:"Kolkata", lat:22.5726, lng:88.3639, aqi:210},
    {city:"Chennai", lat:13.0827, lng:80.2707, aqi:140},
    {city:"Bangalore", lat:12.9716, lng:77.5946, aqi:120},
    {city:"Hyderabad", lat:17.3850, lng:78.4867, aqi:160}
];

/* AQI red markers */
aqiCities.forEach(c => {

    let icon = L.divIcon({
        html: `<div style="
            background:red;
            width:14px;
            height:14px;
            border-radius:50%;
            border:2px solid white;
            box-shadow:0 0 8px rgba(255,0,0,0.8);
        "></div>`
    });

    L.marker([c.lat, c.lng], {icon: icon})
    .addTo(map)
    .bindPopup(
        `<b>${c.city}</b><br>
         AQI Level: ${c.aqi}<br>
         <span style="color:red">
         High Pollution Area
         </span>`
    );
});

</script>

<?php include "footer.php"; ?>
