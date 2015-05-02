<?php

namespace Teamnfc\Entity;


class EntityFactory
{
    /**
     * @param $entityName
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public static function get($entityName, $data)
    {
        if (!class_exists($entityName)) {
            throw new \Exception("Wrong entity requested: { " . $entityName . " }");
        }

        return $entityName::populate($data);
    }
}