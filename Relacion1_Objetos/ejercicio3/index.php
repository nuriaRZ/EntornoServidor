<?php

include_once 'DadoPoker.php';
$d1 = new DadoPoker();
$tirada= DadoPoker::tirar($d1);
echo "Dado 1: ".$tirada."<br>";
echo DadoPoker::getTiradas()."<br>";
$d2 = new DadoPoker();
$tirada= DadoPoker::tirar($d2);
echo "Dado 2: ".$tirada."<br>";
echo DadoPoker::getTiradas()."<br>";
$d3 = new DadoPoker();
$tirada= DadoPoker::tirar($d3);
echo "Dado 3: ".$tirada."<br>";
echo DadoPoker::getTiradas()."<br>";
$d4 = new DadoPoker();
$tirada= DadoPoker::tirar($d4);
echo "Dado 4: ".$tirada."<br>";
echo DadoPoker::getTiradas()."<br>";
$d5 = new DadoPoker();
$tirada= DadoPoker::tirar($d5);
echo "Dado 5: ".$tirada."<br>";
echo DadoPoker::getTiradas()."<br>";
$d6 = new DadoPoker();
$tirada= DadoPoker::tirar($d6);
echo "Dado 6: ".$tirada."<br>";
echo DadoPoker::getTiradas()."<br>";






?>
