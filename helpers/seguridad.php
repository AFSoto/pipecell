<?php

function limpiarTexto($texto)
{
    return htmlspecialchars(
        trim($texto),
        ENT_QUOTES,
        'UTF-8'
    );
}

function limpiarDecimal($numero)
{
    return filter_var($numero, FILTER_VALIDATE_FLOAT);
}

function limpiarEntero($numero)
{
    return filter_var($numero, FILTER_VALIDATE_INT);
}
