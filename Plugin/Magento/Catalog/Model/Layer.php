<?php

namespace Magentomaster\Discontinue1\Plugin\Magento\Catalog\Model;

class Layer
{

    public function aroundGetProductCollection(
        \Magento\Catalog\Model\Layer $subject,
        \Closure $proceed
    ) {
        $collection = $proceed();
        $collection
            ->addAttributeToSelect('*')
            ->addAttributeToFilter(array(
                array(
                    'attribute' => 'discontinue',
                    'null' => true),
                array(
                    'attribute' => 'discontinue',
                    'eq' => '0')
            ));
        return $collection;
    }


}

