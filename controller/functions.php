<?php
include("querys.php");

function checkPhone($phoneInput) {
    $patternPhone = "/^[6-7]\d{8}$/";
    if (preg_match($patternPhone, $phoneInput)) {
        return true;
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                ¡ El número de teléfono no es válido !
              </div>";
        return false;
    }
}

function checkAddress($addressInput) {
    $env = parse_ini_file('.env');
    $apiKey = $env['GOOGLE_MAPS_API_KEY'];

    $formatAddress = str_replace(" ", "+", $addressInput);
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $formatAddress . "&key=" . $apiKey;
    $result = file_get_contents($url);
    if ($result) {
        $data = json_decode($result);

        if ($data->status == "OK") {
            $city = "¡ Población no encontrada !";

            // Accede a la población de la dirección
            foreach ($data->results[0]->address_components as $component) {
                if (in_array("locality", $component->types)) {
                    $city = $component->long_name;
                    break;
                }
            }

            // Ciudades permitidas para entrega a domicilio
            $allowedCities= ['Málaga','Colmenar','Casabermeja','Riogordo'];
            $deliveryEnabled= (in_array($city,$allowedCities)) ? 1 : 0;

            return ['city' => $city,
                    'deliveryEnabled' => $deliveryEnabled, ];
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                ¡ Dirección no válida !
              </div>";
            return false; // Devuelve false a un error de dirección.
        }
    } else {
        $city = "Error API Google Maps";
        echo "<div class='alert alert-danger' role='alert'>
                ¡ Dirección no válida !
              </div>";
        return false;
    }
}

function writeProducts() {
    echo "  <table class='table table-striped m-4'>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th class='col-2'>Cantidad</th>
                </tr>
            </thead>
            <tbody>";
    $products = getProducts();
    while ($row = mysqli_fetch_assoc($products)) {
        echo "<tr>";
        echo "<td>{$row['product']}</td>";
        echo "<td>{$row['price']} €</td>";
        echo "<td><input type='number' name='items[{$row['id']}][quantity]' value='0' min='0'>";
        echo "<input type='hidden' name='items[{$row['id']}][product_id]' value='{$row['id']}'></td>";
        echo "</tr>";
    }
    echo "</tbody> </table>";
}

function getProductPrice($connection, $product_id) {
    $sql = "SELECT price FROM products WHERE id = $product_id";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        return $row['price'];
    } else {
        return 0; // Precio predeterminado en caso de no encontrar el producto
    }
}

function calculateTotal($connection, $items) {
    $total = 0;

    foreach ($items as $item) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];

        if ($quantity > 0) {
            $price = getProductPrice($connection, $product_id);
            $total += $price * $quantity;
        }
    }
    return $total;
}

function correctBooking($date, $time) {
    $dateTimeString = $date . ' ' . $time;
    $dateTimeObj = new DateTime($dateTimeString);
    $currentDateTime = new DateTime();
    return ($dateTimeObj > $currentDateTime) ? true : false;
}
?>