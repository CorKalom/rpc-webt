<?php
    namespace kk\orm;

/**
 * @Entity @Table(name="roll")
 **/
class Roll{
    /** @Id @Column(type="integer") @GeneratedValue  **/
    protected $id;
    /** @Column(type="datetime") **/
    protected $date;
    /** @Column(type="string") **/
    protected $result;

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setDate()
    {
        $this->date = new \DateTime("now");
    }

    public function setResult($result)
    {
        $this->result = $result;
    }
}