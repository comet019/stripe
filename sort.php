
<?php
  class MCC{
    public $MCCname;
    public $MCCcodeName;
    public $MCCcode;
  }
  $handle = fopen("sort.txt", "r");  //*********************************THIS IS WHERE YOU COPIED YOUR MCC LIST FROM STRIPE
  if ($handle) {
    $counter = 0;
    $MCCObjectArray = array();
    $name = ' ';
    $codeName = '';
    $code = '';
      while (($line = fgets($handle)) !== false) {
          $counter++;
          $space = 0;
          $lineLen = strlen($line);
          if($counter % 2 !== 0){
            $line = substr($line, 0, -1);
            $name = $line;
          }else{

            for($i = 0; $i < $lineLen; $i++){
              if(ctype_space($line[$i])){
                if($i !== '0' && $space !== '0') $space = 1;
              }else{
                if($space == '1'){

                  if(is_nan($line[$i]) === false) {
                    $code .= $line[$i];
                  }
                }else{
                  $codeName .= $line[$i];
                }
              }

            }
            $addToArraay = new MCC();
            $addToArraay->MCCname = $name;
            $addToArraay->MCCcodeName = $codeName;
            $addToArraay->MCCcode = $code;
            array_push($MCCObjectArray, $addToArraay);
            unset($addToArraay);
            $name = ' ';
            $codeName = '';
            $code = '';
          }

      }

      fclose($handle);
  } else {
      die("failed");
  }
  $myfile = fopen("StripeMCC.json", "w") or die("Unable to open file!");
  $txt = json_encode($MCCObjectArray, JSON_PRETTY_PRINT);
  fwrite($myfile, $txt);
  echo '<pre>';
  echo $txt;
  echo '</pre>';
?>

