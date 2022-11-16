<?php
    function zbrajanjeZnakova($word)
    {
        $word = strtolower($word); //Pretvara sva slova u mala slova
        $word = str_split($word); // Podijeli rijec/string na slova (niza/polja) ana => a,n,a

        $suglasnik = 0;
        $samoglasnik = 0;

        foreach($word as $charachter) //ako se zadovolji case izvrši i izadji iz switch
        {
            switch($charachter) 
           
            {
                case "a":
                case "e":
                case "i":
                case "o":
                case "u":
                    $samoglasnik++; //zbroji samoglasniek ako ime slucaj ana => a,n,a 1,0,1 = 2! 0 je suglasnik 
                    break;
                default:
                    $suglasnik++; // posto nema suglasnika nadjenoga = samoglasnik Zbraja!!
                    break;

            }


        }

        return array($samoglasnik, $suglasnik ); // Suglasnik 1 Samoglasnik 0 
    }

?>