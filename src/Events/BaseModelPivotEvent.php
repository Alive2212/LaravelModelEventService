<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 12/11/17
 * Time: 7:55 AM
 */

namespace Alive2212\LaravelModelEventService\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;


class BaseModelPivotEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var
     */
    protected $model;

    /**
     * @var
     */
    protected $relationName;

    /**
     * @var
     */
    protected $pivotIds;

    /**
     * @var
     */
    protected $pivotIdsAttributes;

    /**
     * Create a new event instance.
     * @param $params
     * @internal param $model
     * @internal param $relationName
     * @internal param $pivotIds
     * @internal param $pivotIdsAttributes
     */
    public function __construct($params)
    {
        $counter = 0;
        foreach ($params as $param) {
            switch ($counter){
                case 0:
                    $this->model = $param;
                    break;
                case 1:
                    $this->relationName = $param;
                    break;
                case 2:
                    $this->pivotIds = $param;
                    break;
                case 3:
                    $this->pivotIdsAttributes = $param;
                    break;
            }
            $counter+=1;
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return PrivateChannel
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getRelationName()
    {
        return $this->relationName;
    }

    /**
     * @param mixed $relationName
     */
    public function setRelationName($relationName)
    {
        $this->relationName = $relationName;
    }

    /**
     * @return mixed
     */
    public function getPivotIds()
    {
        return $this->pivotIds;
    }

    /**
     * @param mixed $pivotIds
     */
    public function setPivotIds($pivotIds)
    {
        $this->pivotIds = $pivotIds;
    }

    /**
     * @return mixed
     */
    public function getPivotIdsAttributes()
    {
        return $this->pivotIdsAttributes;
    }

    /**
     * @param mixed $pivotIdsAttributes
     */
    public function setPivotIdsAttributes($pivotIdsAttributes)
    {
        $this->pivotIdsAttributes = $pivotIdsAttributes;
    }
}