<?php

class Parameter extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_parameter", type="integer", length=11, nullable=false)
     */
    public $id_parameter;

    /**
     *
     * @var integer
     * @Column(column="pembagian_data", type="integer", length=2, nullable=false)
     */
    public $pembagian_data;

    /**
     *
     * @var double
     * @Column(column="learning_rate", type="double", nullable=false)
     */
    public $learning_rate;

    /**
     *
     * @var double
     * @Column(column="window", type="double", nullable=false)
     */
    public $window;

    /**
     *
     * @var double
     * @Column(column="akurasi_bb", type="double", nullable=false)
     */
    public $akurasi_bb;

    /**
     *
     * @var double
     * @Column(column="akurasi_tb", type="double", nullable=false)
     */
    public $akurasi_tb;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("balita");
        $this->setSource("parameter");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'parameter';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Parameter[]|Parameter|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Parameter|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
