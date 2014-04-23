<?php
/**
 * Created by PhpStorm.
 * User: Crocell
 * Date: 23/04/14
 * Time: 15:04
 */

/**
 * Class Payment
 * @author Alban Truc
 */
class Payment
{
    /** @var  string|MongoId $_id identifiant unique du paiement */
    private $_id;

    /** @var  int $state 0 = paiement initié, clic sur le bouton buy now
     * 1 = paiement effectué, retour paypal correct
     * 2 = échec de paiement, paypal retourne une erreur
     * Pour ce qui est d'un paiement annulé, voir la documentation "Correspondance des statuts et codes".
     */
    private $state;

    /** @var  string|MongoId $idUser utilisateur ayant effectué l'opération */
    private $idUser;

    /** @var  float $amount montant de l'opération */
    private $amount;

    /** @var  MongoDate $date timestamp de l'opération */
    private $date;

    /** @var  NULL|array retour de paypal. Pas de retour pour un paiement  d'état 0. */
    private $paypalReturn;

    /**
     * - Récupère le nombre d'arguments de la fonction {@link https://php.net/manual/en/function.func-num-args.php}
     * - Associe chaque propriété de la classe avec le bon argument {@link https://php.net/manual/en/function.func-get-arg.php}
     * @author Alban Truc
     * @since 23/04/2014
     */
    public function __construct()
    {
        $numberOfArgs = func_num_args();

        switch($numberOfArgs)
        {
            case 1: //construit l'objet à partir d'un tableau, issu par exemple d'une requête en base
                $array = func_get_arg(0);
                $this->_id = (array_key_exists('_id', $array)) ? $array['_id'] : NULL;
                $this->state = (array_key_exists('state', $array)) ? (int)$array['state'] : NULL;
                $this->idUser = (array_key_exists('idUser', $array)) ? $array['idUser'] : NULL;
                $this->amount = (array_key_exists('amount', $array)) ? (float)$array['amount'] : NULL;
                $this->date = (array_key_exists('date', $array)) ? $array['date'] : NULL;
                $this->paypalReturn = (array_key_exists('paypalReturn', $array)) ? $array['paypalReturn'] : NULL;
                break;
            case 5: //toutes les propriétés sont passées dans la fonction, non sous la forme d'un tableau
                $this->state = (int)func_get_arg(0);
                $this->idUser = func_get_arg(1);
                $this->amount = (float)func_get_arg(2);
                $this->date = func_get_arg(3);
                $this->paypalReturn = func_get_arg(4);
                break;
        }
    }

    /**
     * @param MongoId|string $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return MongoId|string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int $state
     */
    public function setState($state)
    {
        $this->state = (int)$state;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return (int)$this->state;
    }

    /**
     * @param MongoId|User|string $user
     */
    public function setUser($user)
    {
        $this->idUser = $user;
    }

    /**
     * @return MongoId|User|string
     */
    public function getUser()
    {
        return $this->idUser;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = (float)$amount;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return (float)$this->amount;
    }

    /**
     * @param MongoDate $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return MongoDate
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param array|NULL $paypalReturn
     */
    public function setPaypalReturn($paypalReturn)
    {
        $this->paypalReturn = $paypalReturn;
    }

    /**
     * @return array|NULL
     */
    public function getPaypalReturn()
    {
        return $this->paypalReturn;
    }
}