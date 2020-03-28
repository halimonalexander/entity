<?php

namespace HalimonAlexander\Entity\DatabaseInitializer;

class AbstractDTO
{
    public function doubleQuote($value)
    {
        if (is_string($value)) {
            return sprintf('"%s"', $value);
        }
        
        if (is_array($value)) {
            foreach ($value as $key => $field) {
                $value[$key] = sprintf('"%s"', $field);
            }
            
            return $value;
        }
        
        throw new \RuntimeException('Value type is unknown for quotation');
    }
}
