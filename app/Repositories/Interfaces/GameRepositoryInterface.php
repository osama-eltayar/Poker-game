<?php
namespace App\Repositories\Interfaces;

interface GameRepositoryInterface
{
    public function draftCard();
    public function getPercentage();
    public function checkGame($card = null);

}
