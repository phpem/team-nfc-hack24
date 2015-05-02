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
        $namespace = '\\Teamnfc\\Entity\\';
        $entityName = $namespace . $entityName;

        if (!class_exists($entityName)) {
            throw new \Exception("Wrong entity requested: { " . $entityName . " }");
        }

        return $entityName::populate($data);
    }
}