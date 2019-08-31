<?php

class Tinggibadan extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_balita", type="integer", length=3, nullable=false)
     */
    public $id_balita;

    /**
     *
     * @var string
     * @Column(column="nama", type="string", length=25, nullable=false)
     */
    public $nama;

    /**
     *
     * @var string
     * @Column(column="jk", type="string", length=1, nullable=false)
     */
    public $jk;

    /**
     *
     * @var integer
     * @Column(column="umur", type="integer", length=11, nullable=false)
     */
    public $umur;

    /**
     *
     * @var integer
     * @Column(column="tinggi", type="integer", length=11, nullable=false)
     */
    public $tinggi;

    /**
     *
     * @var string
     * @Column(column="cr_ukur", type="string", length=1, nullable=false)
     */
    public $cr_ukur;

    /**
     *
     * @var string
     * @Column(column="vit_a", type="string", length=1, nullable=false)
     */
    public $vit_a;

    /**
     *
     * @var string
     * @Column(column="ekonomi", type="string", length=9, nullable=false)
     */
    public $ekonomi;

    /**
     *
     * @var string
     * @Column(column="pendidikan_ibu", type="string", length=16, nullable=false)
     */
    public $pendidikan_ibu;

    /**
     *
     * @var string
     * @Column(column="pekerjaan_ayah", type="string", length=12, nullable=false)
     */
    public $pekerjaan_ayah;

    /**
     *
     * @var string
     * @Column(column="status_gizi", type="string", length=2, nullable=false)
     */
    public $status_gizi;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("balita");
        $this->setSource("tinggibadan");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tinggibadan';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tinggibadan[]|Tinggibadan|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tinggibadan|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
