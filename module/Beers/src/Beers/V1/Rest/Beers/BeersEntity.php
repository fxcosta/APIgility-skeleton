<?php
namespace Beers\V1\Rest\Beers;

class BeersEntity
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $description;

    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description
        ];
    }

    public function exchangeArray($data)
    {
        foreach($data as $key => $value) {
            if(in_array($key, ['id', 'name', 'description'])){
                $this->$key = $value;
            }
        }
    }
}
