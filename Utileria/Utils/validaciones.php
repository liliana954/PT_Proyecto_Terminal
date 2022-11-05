 <?php
    $variable = null;  // variable de ejemplo, esta variable se debera reemplazar por la que se modificara


    // ------------------- PARA NUMEROS  ------------------------

    /*
        Solo acepta numeros del 0 al 9
        Solo acepta de 1 a 5 digitos maximo
        No acepta caracteres especiales ni espacios
    */
    if (preg_match("/^([0-9]{1,5})$", $variable)) {
        // Codigo 
    }
    
    
    



    // -------------------- PARA TEXTO ------------------------

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