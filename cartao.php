<?php

	$toht     = 0;
	$toatr    = 0;
	$totalDia = array();

	$cartao = array();

	for ($i=1; $i <= 7; $i++) { 
		$cartao[$i]['eM'] = 900;//fgets(STDIN);
		$cartao[$i]['sM'] = 1200;//fgets(STDIN);
		$cartao[$i]['eT'] = 1400;//fgets(STDIN);
		$cartao[$i]['sT'] = 1800;//fgets(STDIN);
	}

	for ($i=1; $i <= 7; $i++) { 

		$entradaManha = $cartao[$i]['eM'];
		$saidaManha   = $cartao[$i]['sM'];

		$entradaManha = ($entradaManha/100)*60 + $entradaManha %100;
		$saidaManha   = ($saidaManha/100)*60  + $saidaManha %100;

		$tm           = $saidaManha - $entradaManha;
		$atrm         = $entradaManha - 480;

        $entradaTarde = $cartao[$i]['eT'];
        $saidaTarde   = $cartao[$i]['sT'];

        $entradaTarde = ($entradaTarde/100)*60 + $entradaTarde %100;
        $saidaTarde   = ($saidaTarde/100)*60  + $saidaTarde %100;
        $tt   = $saidaTarde - $entradaTarde;

        $totalDia[$i]["h"] = $tm + $tt;

        $atrt = $entradaTarde - 840;
        $totalDia[$i]["a"] = $atrm + $atrt;

		$th = $tm + $tt;
		$ta = $atrm + $atrt;

		$toht  = $toht  + ($tm + $tt);
		$toatr = $toatr + ($atrm + $atrt);
	}

    for ($i=1; $i <= 7; $i++) {

        echo "dia $i:\n";
        echo "entrada manha: {$cartao[$i]['eM']} | saida manha {$cartao[$i]['sM']} \n";
        echo "entrada manha: {$cartao[$i]['eT']} | saida manha {$cartao[$i]['sT']} \n";

        echo "horas trabalhadas: ". ($totalDia[$i]["h"]/60)." \n";
        echo "horas atraso     : ". ($totalDia[$i]["a"]/60)." \n";

    }

    echo "media de trabalho diaria: ".($toht/60) / count($cartao);
    echo "media de atrasos  diaria: ".($toht/60) / count($cartao);


