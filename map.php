<?php include "header.php"; ?>

<div class="card">
<h2>🌍 Emission Map by City</h2>
<p>Map shows average carbon emissions across cities.</p>
<div id="map" style="height:500px;position:relative;"></div>
</div>

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<?php
$q=$conn->query("
SELECT users.city,
AVG(history.footprint) avgf
FROM history
JOIN users ON users.id=history.user_id
GROUP BY users.city
");

$cities=[];

while($row=$q->fetch_assoc()){
    if(!empty($row['city']))
        $cities[]=$row;
}
?>

<style>
.pulse-pin::after{
content:'';
position:absolute;
width:24px;
height:24px;
background:rgba(0,150,0,0.25);
border-radius:50%;
top:0;
left:0;
animation:pulse 2s infinite;
}

@keyframes pulse{
0%{transform:scale(1);opacity:.6;}
100%{transform:scale(2);opacity:0;}
}
</style>

<script>
var map=L.map('map').setView([20.5937,78.9629],5);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
    attribution:'© OpenStreetMap'
}).addTo(map);

let cities=<?= json_encode($cities) ?>;

let coords={
"Mumbai":[19.0760,72.8777],
"Pune":[18.5204,73.8567],
"Delhi":[28.7041,77.1025],
"Bangalore":[12.9716,77.5946],
"Chennai":[13.0827,80.2707],
"Hyderabad":[17.3850,78.4867],
"Kolkata":[22.5726,88.3639],
"Ahmedabad":[23.0225,72.5714]
};

cities.forEach(cityData=>{
    let city=cityData.city;
    let avg=parseFloat(cityData.avgf);

    if(coords[city]){
        let color="green";
        if(avg>20) color="red";
        else if(avg>=10) color="orange";

        let icon=L.divIcon({
html:`
<div class="pulse-pin" style="
position:relative;
width:24px;
height:24px;
background:${color};
border-radius:50% 50% 50% 0;
transform:rotate(-45deg);
border:2px solid white;
box-shadow:0 0 6px rgba(0,0,0,0.5);">
<div style="
position:absolute;
width:10px;
height:10px;
background:white;
border-radius:50%;
top:5px;
left:5px;"></div>
</div>`
        });

        L.marker(coords[city],{icon:icon})
        .addTo(map)
        .bindPopup(
`<b>${city}</b><br>
Avg Emission: ${avg.toFixed(2)} kg CO₂/day`
        );
    }
});

/* Legend */
let legend=document.createElement("div");
legend.style.position="absolute";
legend.style.top="12px";
legend.style.right="12px";
legend.style.background="white";
legend.style.padding="8px";
legend.style.borderRadius="8px";
legend.style.fontSize="12px";
legend.style.boxShadow="0 0 6px rgba(0,0,0,0.3)";
legend.style.zIndex="1000";

legend.innerHTML=`
<b>Emission Level</b><br>
<span style="color:green">Green</span> = Low<br>
<span style="color:orange">Orange</span> = Medium<br>
<span style="color:red">Red</span> = High
`;

document.getElementById("map").appendChild(legend);
</script>

<?php include "footer.php"; ?>
