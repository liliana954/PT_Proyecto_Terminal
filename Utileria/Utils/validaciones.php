 <?php
    $variable = null;  // variable de ejemplo, esta variable se debera reemplazar por la que se modificara



    // ------------------ PARA CORREO ELECTRONICO --------------------
    /*
        Validacion del correo electronico, es un estandar internacional
        NO MODIFICAR
    */
    if (preg_match("/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])", $variable)) {
        // Codigo 
    }

    // ------------------- PARA NUMEROS  ------------------------

    /*
        Solo acepta numeros del 0 al 9
        Solo acepta de 1 a 5 digitos maximo
        No acepta caracteres especiales ni espacios
    */
    if (preg_match("/^([0-9]{1,5})$", $variable)) {
        // Codigo 
    }

    /*
        Solo acepta numeros del 0 al 9
        Solo acepta de 1 a 5 digitos maximo
        Acepta espacios - Cuenta como digito
        No acepta caracteres especiales
    */
    if (preg_match("/^([0-9 ]{1,5})$", $variable)) {
        // Codigo 
    }

    /*
        Solo acepta numeros del 0 al 9
        Solo acepta exactamente 8 digitos
        No acepta caracteres especiales ni espacios
    */
    if (preg_match("/^([0-9]{8})$", $variable)) {
        // Codigo 
    }
    


    // -------------------- PARA TEXTO ------------------------
    /*
        Acepta 8 caracteres, de los cuales debe tener:
            1. Mayuscula
            2. Un numero
            3. Un caracter especial
    */
    if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!#%*?&])[A-Za-z\d@$!#%*?&]{8}$/", $variable)) {
        // Codigo 
    }



    /*
        Solo acepta letras de la a-z minusculas
        No acepta caracteres especiales ni espacios
    */
    if(preg_match("/^[a-z]*$", $variable)){
        // Codigo
    }

    /*
        Solo acepta letras de la a-z minusculas
        Acepta espacios
        No acepta caracteres especiales
    */
    if(preg_match("/^[a-z ]*$", $variable)){
        // Codigo
    }

    /*
        Solo acepta letras de la A-Z mayusculas
        No acepta caracteres especiales ni espacios
    */
    if(preg_match("/^[A-Z]*$", $variable)){
        // Codigo
    }

    /*
        Solo acepta letras de la A-Z mayusculas
        Acepta espacios
        No acepta caracteres especiales
    */
    if(preg_match("/^[A-Z ]*$", $variable)){
        // Codigo
    }


    /*
        Solo acepta letras de la a-z minusculas y mayusculas
        No acepta caracteres especiales ni espacios
    */
    if(preg_match("/^[a-zA-Z]*$", $variable)){
        // Codigo
    }

    /*
        Solo acepta letras de la a-z minusculas y mayusculas
        Acepta espacios
        No acepta caracteres especiales
    */
    if(preg_match("^([a-zA-Z ]*)$", $variable)){
        // Codigo
    }


    
?>