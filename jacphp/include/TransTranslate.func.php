<?php

function TransTranslate($i)
{
    $result = '';    
    if (is_numeric(substr($i, -1)))
        $result .= substr($i, -1) . ' - Speed ';
    if (strtoupper($i[0]) == 'A' && is_numeric($i[1]))
        $result .= 'Automatic';
    if (strtoupper($i[0]) == 'M' && is_numeric($i[1]))
        $result .= 'Manual';
    if (strtoupper(substr($i, 0, 2)) == 'AM')
        $result .= 'Automated Manual';
    if (strtoupper(substr($i, 0, 2)) == 'AS')
        $result .= 'Select Shift';
    if (strtoupper(substr($i, 0, 2)) == 'AV')
        $result .= 'Continuously Variable';
    return $result;
}
