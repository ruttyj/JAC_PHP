<?php
function FuelTranslate($i)
{
    if(strtoupper($i) == 'X')
            return 'Regular Gasoline';
    if(strtoupper($i) == 'N')
            return 'N';
    if(strtoupper($i) == 'Z')
            return 'Premium Gasoline';
    if(strtoupper($i) == 'D')
            return 'Diesel';
    if(strtoupper($i) == 'E')
            return 'Ethanol (E85)';
}