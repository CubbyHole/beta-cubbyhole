<?php
/**
 * Created by Notepad++.
 * User: Alban Truc
 * Date: 30/01/14
 * Time: 14:51
 */

interface UserManagerInterface
{
    /**
     * - Génère un GUID
     * - Supprime les tirets et accolades
     * @author Alban Truc
     * @since 23/02/2014
     * @return string
     */

    function generateGUID();

    /**
     * - Insère un compte gratuit.
     * - Insère l'utilisateur qui va posséder ce compte.
     * - Gestion des exceptions MongoCursor: http://www.php.net/manual/en/class.mongocursorexception.php
     * - Gestion des erreurs, avec notamment:
     *       Annulation de l'insertion du compte gratuit si l'insertion de l'utilisateur a échoué
     * @author Alban Truc
     * @param string $name
     * @param string $firstName
     * @param string $email
     * @param string $password
     * @param string $geolocation
     * @since 02/2014
     * @return bool TRUE si l'insertion a réussi, FALSE sinon
     */

    function addFreeUser($name, $firstName, $email, $password, $geolocation);

    /**
     * Authentifier un utilisateur:
     * - Récupère l'utilisateur inscrit avec l'e-mail indiquée. S'il y en a un:
     *  - Vérifie le mot de passe. S'il correspond:
     *      - Récupère son compte
     * @author Alban Truc
     * @param string $email
     * @param string $password
     * @since 02/2014
     * @return User|array contenant le message d'erreur
     */

    function authenticate($email, $password);

    /**
     * Vérifier la disponibilité d'une adresse e-mail
     * @author Alban Truc
     * @param string $email
     * @since 02/2014
     * @return bool FALSE si email déjà prise, TRUE sinon
     */

    public function checkEmailAvailability($email);

    /**
     * Inscription:
     * - Vérifie certains critères sur les paramètres fournis
     * - Appelle la fonction de vérification de disponibilité de l'e-mail
     * - Appelle la fonction d'ajout d'un free user
     * - Appelle la fonction d'authentification qui retourne (si tout va bien) l'utilisateur inscrit à l'instant
     * @author Alban Truc
     * @param string $name
     * @param string $firstName
     * @param string $email
     * @param string $password
     * @param string $passwordConfirmation
     * @param string $geolocation
     * @since 02/2014
     * @return User|array contenant le message d'erreur
     *
     * IMPORTANT: ne pas oublier de gérer l'envoi d'e-mail d'inscription!
     */

    function register($name, $firstName, $email, $password, $passwordConfirmation, $geolocation = 'Not specified');
}
?>