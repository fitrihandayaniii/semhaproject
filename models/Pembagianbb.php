<?php

class Pembagianbb extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_pembagianbb", type="integer", length=3, nullable=false)
     */
    public $id_pembagianbb;

    /**
     *
     * @var integer
     * @Column(column="id_balita", type="integer", length=3, nullable=false)
     */
    public $id_balita;

    /**
     *
     * @var integer
     * @Column(column="x1", type="integer", length=11, nullable=false)
     */
    public $x1;

    /**
     *
     * @var double
     * @Column(column="x2", type="double", nullable=false)
     */
    public $x2;

    /**
     *
     * @var double
     * @Column(column="x3", type="double", nullable=false)
     */
    public $x3;

    /**
     *
     * @var integer
     * @Column(column="x4", type="integer", length=11, nullable=false)
     */
    public $x4;

    /**
     *
     * @var integer
     * @Column(column="x5", type="integer", length=11, nullable=false)
     */
    public $x5;

    /**
     *
     * @var integer
     * @Column(column="x6", type="integer", length=11, nullable=false)
     */
    public $x6;

    /**
     *
     * @var double
     * @Column(column="x7", type="double", nullable=false)
     */
    public $x7;

    /**
     *
     * @var double
     * @Column(column="x8", type="double", nullable=false)
     */
    public $x8;

    /**
     *
     * @var string
     * @Column(column="target", type="string", length=5, nullable=false)
     */
    public $target;

    /**
     *
     * @var string
     * @Column(column="jenisdata", type="string", nullable=false)
     */
    public $jenisdata;

    /**
     *
     * @var string
     * @Column(column="bagidata", type="string", nullable=false)
     */
    public $bagidata;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("balita");
        $this->setSource("pembagianbb");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pembagianbb';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pembagianbb[]|Pembagianbb|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pembagianbb|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
