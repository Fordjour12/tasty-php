<?php

function longday()
{
    static $a = 0;
    ++$a;

    echo $a;



}

longday();
longday();
