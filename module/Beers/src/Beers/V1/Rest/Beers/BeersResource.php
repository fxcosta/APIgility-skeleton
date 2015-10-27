<?php
namespace Beers\V1\Rest\Beers;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbTableGateway;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class BeersResource extends AbstractResourceListener
{
    private $db;

    private $tableGateway;

    public function __construct($db)
    {
        $this->db = $db;
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new BeersEntity());
        $this->tableGateway = new TableGateway('beer', $db, null, $resultSet);
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $entity = new BeersEntity();
        $data = json_decode(json_encode($data), true);
        $entity->exchangeArray($data);
        $data = $entity->getArrayCopy();
        $this->tableGateway->insert($data);
        $data['id'] = $this->tableGateway->getLastInsertValue();
        return $data;
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $result = $this
            ->tableGateway
            ->select(
                [
                    'id' => $id
                ]
            )
            ->current();
        return $result;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $where = new Where();
        if (isset($params['name']) && $params['name'] != '') {
            $likeSpec = new Where();
            $likeSpec->like('name', '%' . $params['name'] . '%');
            $where->addPredicate($likeSpec);

            $likeSpec = new Where();
            $likeSpec->like('description', '%' . $params['name'] . '%');
            $where->orPredicate($likeSpec);
        }

        $sort = null;

        if (in_array($params['sort'], array_keys((new BeersEntity())->getArrayCopy()))) {
            $sort = $params['sort'];
        }

        $dbTableGatewayAdapter = new DbTableGateway($this->tableGateway, $where, $sort);
        return new BeersCollection($dbTableGatewayAdapter);
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
