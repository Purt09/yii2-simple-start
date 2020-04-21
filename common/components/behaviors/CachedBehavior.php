<?php
namespace common\components\behaviors;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Если необходимо обновлять кеш после изменения значений в бд
 * то надо использовать это поведение в ActiveRecord
 * данной сущности
 *
 * Class CachedBehavior
 * @package common\components\behaviors
 */
class CachedBehavior extends Behavior
{
    public $cache_key;

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'deleteCache',
            ActiveRecord::EVENT_AFTER_UPDATE => 'deleteCache',
            ActiveRecord::EVENT_AFTER_DELETE => 'deleteCache',
        ];
    }

    public function deleteCache()
    {
        foreach ($this->cache_key as $id){
            Yii::$app->cache->delete($id);
        }
    }
}