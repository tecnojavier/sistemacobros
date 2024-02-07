<?php
include("conexion/conexion.php");

$columns = ['NoFactura', 'Fecha', 'Monto', 'CantidaMeses', 'Concepto', 'Dui'];
$columnsWhere = ['Dui'];
$table = "registro";

$campo = isset($_POST['campo']) ? $conexion->real_escape_string($_POST['campo']) : null;

$where = '';

if($campo != null){
    $where = "WHERE (";

    $cont = count($columnsWhere);
    for($i = 0; $i < $cont; $i++){
        $where .= $columnsWhere[$i] . " LIKE '%". $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

$sql = "SELECT " . implode(", ", $columns) . " 
FROM $table
$where 
ORDER BY NoFactura DESC
Limit 100";
$resultado = $conexion->query($sql);
$num_rows = $resultado->num_rows;

$html = '';

if($num_rows > 0){
    while($row = $resultado->fetch_assoc()){
        $html .= '<tr>';
        $html .= '<td>'.$row['NoFactura'].'</td>';
        $html .= '<td>'.$row['Fecha'].'</td>';
        $html .= '<td>'.$row['Monto'].'</td>';
        $html .= '<td>'.$row['CantidaMeses'].'</td>';
        $html .= '<td>'.$row['Concepto'].'</td>';
        $html .= '<td>'.$row['Dui'].'</td>';
        $html .= '</tr>';
    }
} else{
    $html .= '<tr>';
    $html .= '<td colspan="7">Sin resultados</td>';
    $html .= '</tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);