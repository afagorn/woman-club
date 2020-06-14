<?php
namespace App\Repositories\Interfaces;

interface IPromocodeRepository
{
    public function getValidByName(string $name);

    public function findValidAll();
}
