<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 12/14/17
 * Time: 6:49 AM
 */

/** User Manual
 *  Base Observer Help to create event listener simple
 * 1- Create your own Observer file and locate it into app/Observers
 * 2- Extend it from BaseObserver form this Package
 * 3- Override boot method in your Model what you want to track events
 * 4- Put following code into "boot" of your model after "parent::boot();"
 *          Order2::observe(Order2Observer::class);
 * 5- add what event you want into event service provider with this convention
 * 'App\Events\{Model}{Method}Event' => [
 * 'App\Listeners\{Model}{Method}Listener',
 * ],
 * 6- generate events
 * 7- extend all event with 'BaseModelEvent' or 'BaseModelPivotEvent' and remove all class code
 * 8- get model in listener class with following command
 * $event->getModel();
 * 9- add observer class into boot method of model
 */

namespace Alive2212\LaravelModelEventService\Observers;

use Alive2212\LaravelMessageService\MessageService;
use App\Resources\StringHelper;

class BaseObserver
{
    protected $eventNamePrefix = 'App\\Events\\';

    /**
     * @param $model
     */
    public function creating($model)
    {
        $this->callEvent($model);
    }

    /**
     * @param $params
     */
    public function callEvent(...$params)
    {
        $eventName = $this->getEventListenerName();
        $this->messageHandler($params);
        if (class_exists($eventName)) {
            event(new $eventName($params));
        }
    }

    /**
     * @return string
     */
    public function getEventListenerName()
    {
        $calledClass = (str_replace('Observer', '', collect(explode('\\', get_class($this)))->last()));
        $calledMethod = (new StringHelper())->upperFirstLetter(debug_backtrace()[2]['function']);
        $eventName = $this->eventNamePrefix . $calledClass . $calledMethod . 'Event';
        return (string)$eventName;
    }

    /**
     * @param $model
     */
    public function created($model)
    {
        $this->callEvent($model);
    }

    /**
     * @param $model
     */
    public function updating($model)
    {
        $this->callEvent($model);
    }

    /**
     * @param $model
     */
    public function updated($model)
    {
        $this->callEvent($model);
    }

    /**
     * @param $model
     */
    public function saving($model)
    {
        $this->callEvent($model);
    }

    /**
     * @param $model
     */
    public function saved($model)
    {
        $this->callEvent($model);
    }

    /**
     * @param $model
     */
    public function deleting($model)
    {
        $this->callEvent($model);
    }

    /**
     * @param $model
     */
    public function deleted($model)
    {
        $this->callEvent($model);
    }

    /**
     * @param $model
     */
    public function restoring($model)
    {
        $this->callEvent($model);
    }

    /**
     * @param $model
     */
    public function restored($model)
    {
        $this->callEvent($model);
    }

    /**
     * For many to many relation
     * Before do it
     * Attaching
     *
     * @param $model
     * @param $relationName
     * @param $pivotIds
     * @param $pivotIdsAttributes
     */
    public function pivotAttaching($model, $relationName, $pivotIds, $pivotIdsAttributes)
    {
        $this->callEvent($model, $relationName, $pivotIds, $pivotIdsAttributes);
    }

    /**
     * For many to many relation
     * Before do it
     * Detaching
     *
     * @param $model
     * @param $relationName
     * @param $pivotIds
     * @param $pivotIdsAttributes
     */
    public function pivotDetaching($model, $relationName, $pivotIds, $pivotIdsAttributes)
    {
        $this->callEvent($model, $relationName, $pivotIds, $pivotIdsAttributes);
    }

    /**
     * For many to many relation
     * Before do it
     * Updating
     *
     * @param $model
     * @param $relationName
     * @param $pivotIds
     * @param $pivotIdsAttributes
     */
    public function pivotUpdating($model, $relationName, $pivotIds, $pivotIdsAttributes)
    {
        $this->callEvent($model, $relationName, $pivotIds, $pivotIdsAttributes);
    }

    /**
     * For many to many relation
     * After it done
     * Attached
     *
     * @param $model
     * @param $relationName
     * @param $pivotIds
     * @param $pivotIdsAttributes
     */
    public function pivotAttached($model, $relationName, $pivotIds, $pivotIdsAttributes)
    {
        $this->callEvent($model, $relationName, $pivotIds, $pivotIdsAttributes);
    }

    /**
     * For many to many relation
     * After it done
     * Detached
     *
     * @param $model
     * @param $relationName
     * @param $pivotIds
     * @param $pivotIdsAttributes
     */
    public function pivotDetached($model, $relationName, $pivotIds, $pivotIdsAttributes)
    {
        $this->callEvent($model, $relationName, $pivotIds, $pivotIdsAttributes);
    }

    /**
     * For many to many relation
     * After it done
     * Updated
     *
     * @param $model
     * @param $relationName
     * @param $pivotIds
     * @param $pivotIdsAttributes
     */
    public function pivotUpdated($model, $relationName, $pivotIds, $pivotIdsAttributes)
    {
        $this->callEvent($model, $relationName, $pivotIds, $pivotIdsAttributes);
    }

    /**
     * @return string
     */
    public function getEventNamePrefix()
    {
        return $this->eventNamePrefix;
    }

    /**
     * @param string $eventNamePrefix
     */
    public function setEventNamePrefix($eventNamePrefix)
    {
        $this->eventNamePrefix = $eventNamePrefix;
    }

    /**
     * @param $params
     */
    public function messageHandler($params)
    {
        $messageService = new MessageService();
        $eventType = (new StringHelper())->upperFirstLetter(debug_backtrace()[2]['function']);
        $messageService->handle($params[0], $eventType);
    }
}
