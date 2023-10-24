<?php
function checkPhone($phoneInput){
    $patternPhone= "/^[6-7]\d{8}$/";
    if (preg_match($patternPhone, $phoneInput)) { return true; } else {
        echo "<script>alert ('¡ El número de teléfono no es válido !');</script>"; 
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
            // Accede a la población de la dirección
            $city = "¡ Población no encontrada !";

            foreach ($data->results[0]->address_components as $component) {
                if (in_array("locality", $component->types)) {
                    $city = $component->long_name;
                    break;
                }
            }
            return true;  // Devuelve true...sin errores.            
        } else {
            echo "<script>alert ('¡ Dirección no válida !');</script>"; 
            return false; // Devuelve false a un error de dirección.
        }
    } else {
        $city= "Error API Google Maps";
        echo "<script>alert ('¡ Dirección no válida !');</script>"; 
        return false;
    }
}
?>