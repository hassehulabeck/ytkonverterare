<?php

function convertArea($unit, $antal) {

  $enheter = [
    "kvadratmeter" => 1,
    "hektar" => 10000,
    "fotbollsplan" => 6825,
    "kvadratkilometer" => 1000000
  ];

  $returString = "";

  // Omräkningarna har jag lagt i en array.
  // För just den här lösningen är det viktigt att egenskaperna(keys)
  // har samma namn som i enheter ovan.

  // Tyvärr tyder detta förfarande på att min lösning kan göras bättre.

  $conversions = [
    "kvadratmeter" => $enheter[$unit] / $enheter['kvadratmeter'],
    "hektar" => $enheter[$unit] / $enheter['hektar'],
    "fotbollsplan" => $enheter[$unit] / $enheter['fotbollsplan'],
    "kvadratkilometer" => $enheter[$unit] / $enheter['kvadratkilometer']
  ];

  foreach ($enheter as $key=>$value) {
    // Undvik att få med den enhet vi skickar som ett argument.
    if ($key != $unit) {
      $returString .= "<li>" . ($conversions[$key] * $antal) . " $key.</li>";
    }
  }
  return "$antal $unit motsvaras av:<ul>" . $returString;
}
echo convertArea("fotbollsplan", 1.46519);
?>
