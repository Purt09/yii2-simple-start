<?php


namespace core\services;


class MainService
{
    /**
     * Несколько связанных действий с бд, лучше делать через транзакции!
     * @param callable $callable Действия с бд
     */
    protected function transaction(callable $callable)
    {
        $db = \Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            call_user_func($callable);
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollback();
        }
    }
}