<?php
use App\Models\Seasons;
function isUppercase ( $value , $message , $fail )
{
    if ( $value != mb_strtoupper ( $value , 'UTF-8' ) ) {
        $fail( $message );
    }
}

function getAllSeasons()
{
   $seasons = new Seasons;
   return $seasons->getAll();
}
