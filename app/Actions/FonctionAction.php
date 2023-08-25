<?php

namespace App\Actions;

class FonctionAction
{
    public static function getRef($longueur) {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $caracteresLength = strlen($caracteres);
        $ref = '';

        for ($i = 0; $i < $longueur; $i++) {
            $indiceAleatoire = rand(0, $caracteresLength - 1);
            $ref .= $caracteres[$indiceAleatoire];
        }

        return $ref;
    }

    public static function genererMatricule($numero, $long) {
        $matricule = str_pad($numero, $long, '0', STR_PAD_LEFT);
        return $matricule;
    }
}
