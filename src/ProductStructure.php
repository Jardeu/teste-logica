<?php

namespace App;

class ProductStructure
{
    const products = [
        "preto-PP",
        "preto-M",
        "preto-G",
        "preto-GG",
        "preto-GG",
        "branco-PP",
        "branco-G",
        "vermelho-M",
        "azul-XG",
        "azul-XG",
        "azul-XG",
        "azul-P"
    ];

    public function make(): array
    {
        //todo your code.

        $new_products = array();
        $sizes = [];
        $color = '';

        foreach (ProductStructure::products as $prod) {
            $array = explode("-", $prod);

            if ($array[0] == $color) {
                array_push($sizes, $array[1]);
                $new_products[$color] = $sizes;
            } else {
                $color = $array[0];
                $sizes = [];

                array_push($sizes, $array[1]);
                $new_products[$color] = $sizes;
            }
        }

        unset($sizes);

        $sizes = array();

        $amount = 0;
        $comp_value = '';
        $comp_key = '';

        foreach ($new_products as $key => $value) {
            if ($key != $comp_key) {
                $comp_key = $key;
                $sizes = array();
            }
            foreach ($value as $val) {
                if ($val == $comp_value) {
                    $amount += 1;

                    $sizes[$comp_value] = $amount;
                } else {
                    $comp_value = $val;
                    $amount = 0;
                    $amount += 1;

                    $sizes[$comp_value] = $amount;
                }
            }

            $new_products[$key] = $sizes;
        }

        return $new_products;
    }
}
