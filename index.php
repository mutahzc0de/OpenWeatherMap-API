<?php
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
require 'vendor/autoload.php';
$lang = 'en';
$units = 'metric';
$owm = new OpenWeatherMap('313d3a19c1089e4d7919809f5a9a5e04');
?>


<form action="#" method="post" accept-charset="utf-8">
    <select required name="country" class="countries" id="countryId">
        <option value="">Select Country</option>
    </select>
    <select required name="state" class="states" id="stateId">
         <option value="">Select State</option>
    </select>
    <select required name="city" class="cities" id="cityId">
       <option value="">Select City</option>
    </select>
    <button type="submit" id="check">check</button>
    </div>
</form>

<hr/>

<?php 
if (isset($_POST['city'])) {
    try {
        $weather = $owm->getWeather($_POST['city'], $units, $lang);
    } catch(OWMException $e) {
        echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
    } catch(\Exception $e) {
        echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
    }

     echo 'The weather of city '. $weather->city->name.' at '.date('d M Y').' is '.$weather->weather->description;

    //echo '<code>'.htmlspecialchars($weather->city->name).'</code>';



}else{
    echo "Pilih Kota";
} ?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>   
<script src="js/location.js"></script>   

