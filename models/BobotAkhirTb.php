<?php

class BobotAkhirTb extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_bobot_akhir", type="integer", length=11, nullable=false)
     */
    public $id_bobot_akhir;

    /**
     *
     * @var integer
     * @Column(column="id_parameter", type="integer", length=11, nullable=false)
     */
    public $id_parameter;

    /**
     *
     * @var integer
     * @Column(column="w", type="integer", length=2, nullable=false)
     */
    public $w;

    /**
     *
     * @var integer
     * @Column(column="x", type="integer", length=1, nullable=false)
     */
    public $x;

    /**
     *
     * @var double
     * @Column(column="nilai", type="double", nullable=false)
     */
    public $nilai;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("balita");
        $this->setSource("bobot_akhir_tb");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'bobot_akhir_tb';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return BobotAkhirTb[]|BobotAkhirTb|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return BobotAkhirTb|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
