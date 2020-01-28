<?php
use Cake\Event\EventManager;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Burzum\FileStorage\Storage\Listener\LocalListener;
use Burzum\FileStorage\Storage\Listener\ImageProcessingListener;
use Burzum\FileStorage\Storage\StorageUtils;
use Burzum\FileStorage\Storage\StorageManager;

StorageManager::config('Local', [
	'adapterOptions' => [ROOT . DS . 'file_storage', true],
	'adapterClass' => '\Gaufrette\Adapter\Local',
	'class' => '\Gaufrette\Filesystem'
]);

EventManager::instance()->on(new LocalListener([
    'imageProcessing' => true
]));

EventManager::instance()->on('FileStorage.afterSave', function ($event, $entity) {
    TableRegistry::get('Burzum/FileStorage.FileStorage')->deleteOldFileOnSave($entity);
});

// For automated image processing you'll have to attach this listener as well
EventManager::instance()->on(new ImageProcessingListener());

Configure::write('FileStorage', [
    'imageSizes' => [
        'file_storage' => [
            'crop160' => [
                'squareCenterCrop' => [
                    'size' => 160
                ]
            ]
        ]
    ]
]);
StorageUtils::generateHashes();