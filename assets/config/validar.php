<?php
    //VALIDACIÓN DE CORREO ELECTRONICO 
    function valida_email($valor){
        if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $valor)) {
            return true;
        }else {
            return false;
        }
    }
    //VALIDACIÓN DE TELEFONO
    function valida_phone($valor){
        if (preg_match('((\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8})', $valor)) {
            return true;
        }else {
            return false;
        }
    }
    //VALIDACÓN DE CURP 
    function valida_curp($valor){
          if (preg_match('/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/', $valor)) {
            return true;
        }else {
            return false;
        }
    }

    //VALIDACÓN DE RFC 
    function valida_rfc($valor){
        if (preg_match('/^([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/', $valor)) {
          return true;
      }else {
          return false;
      }
  }

?>