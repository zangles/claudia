<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class patient extends Model
{

    public function turns()
    {
        return $this->hasMany(Turn::class);
    }

    public function measures()
    {
        return $this->hasMany(PatientMeasure::class);
    }

    public function getWeights()
    {
        return $this->measures()->where('measure','=' ,'Weight')->get();
    }

    public function getWeight()
    {
        return $this->measures()->where('measure','=' ,'Weight')->get()->last()->value;
    }

    public function getHeight()
    {
        return $this->measures()->where('measure','=' ,'Height')->get()->last()->value;
    }

    public function getHeights()
    {
        return $this->measures()->where('measure','=' ,'Height')->get();
    }

    public function getIMC()
    {
        return round($this->getWeight() / pow(($this->getHeight()/100),2), 2);
    }

    public function getIMCText()
    {
        $text = "";
        $imc = $this->getIMC();

        if ($imc < 18.49) {
            $text = "Infra Peso";
        }

        if ($imc >= 18.50 and $imc < 24.99) {
            $text = "Peso Normal";
        }

        if ($imc >= 25 and $imc < 29.99) {
            $text = "Sobre Peso";
        }

        if ($imc >= 30 and $imc < 34.99) {
            $text = "Obesidad Leve";
        }

        if ($imc >= 35 and $imc < 39.99) {
            $text = "Obesidad Media";
        }

        if ($imc >= 40) {
            $text = "Obesidad Morbida";
        }

        return $text;
    }
}
