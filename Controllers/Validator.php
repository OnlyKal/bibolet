<?php


class Validator
{
    private $errors=[];
    /**
     * Function pour verifier si un champs n'est pas vide
     *
     * @param mixed $texte
     * @return boolean
     */
    public static function isEmpty($texte)
    {
        if (!empty($texte)) {
            return false;
        }
        return true;
    }
    public static function isNotEmpty($texte)
    {
        if (!empty($texte)) {
            return true;
        }
        return false;
    }
    /**
     * Function pour verifier si l'email est valide
     *
     * @param [type] $texte
     * @return boolean
     */
    public static function isEmail($texte)
    {
        if (filter_var($texte, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    
    /**
     * pour verifier si un post est un entier
     *
     * @param mixed $texte
     * @return boolean
     */
    public static function isInt($texte)
    {
        if (filter_var($texte, FILTER_VALIDATE_INT)) {
            return true;
        }
        return false;
    }
    /**
     * Pour verifier si une session existe
     *
     * @param mixed $session
     * @return void
     */
    public static function sessionExist($session)
    {
        if (isset($session) && !empty($session)) {
            return true;
        }
        return false;
    }


    
    /**
     * check if is string
     *
     * @param mixed $texte
     * @return boolean
     */
    public function isString($texte)
    {
        if (preg_match('/^[0-9]{10}+$/', $texte)) {
            return true;
        }
        return false;
    }
    /**
     * check if is valide phone number
     *
     * @param mixed $texte
     * @return boolean
     */
    public function isPhone($texte)
    {
        if (preg_match("/^[0-9]{10}+$/", $texte)) {
            return true;
        }
        return false;
    }
    /**
     * Fonction de criptage des password;
     *
     * @param mixed $password
     * @return void
     */
    public static function crypt($password)
    {
        return password_hash($password, PASSWORD_ARGON2I);
    }

}
