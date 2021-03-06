<?php

class BingoTicket75Impl implements BingoTicket
{
    private $id = PREFIX_BINGO_75;
    private $state = STATE_CREATED;
    private $content = [];
    private $type = TYPE_BINGO_75;

    public function __construct($content)
    {
        $this->id .= (string) time();
        $this->state = STATE_CREATED;
        $this->content = $content;
        $this->type = TYPE_BINGO_75;
    }

    public function render()
    {
        print "Ticket " . $this->id . ": [";
        print_r($this->content);
        print " ]";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getType()
    {
        return $this->type;
    }
}