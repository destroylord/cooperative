<?php

namespace App\Enum;

enum TypeSavingEnum: string
{

    case PRINCIPAL = 'principal'; // simpanan pokok
    case MANDATORY = 'mandatory'; // simpanan wajib
    case VOLUNTARY = 'voluntary'; // simpanan sukarela

}
