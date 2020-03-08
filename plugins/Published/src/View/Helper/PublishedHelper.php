<?php
namespace Published\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Published helper
 */
class PublishedHelper extends Helper
{
    public $helpers = ['Url', 'Html', 'Form', 'SmartHtml'];
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function control($item)
    {
        return $this->Form->control('published', [
            'type' => 'checkbox',
            'checked' => $item->published,
            'label' => __('Published')
        ]);
    }

    /**
     * Метод показывает текующий режим публикации
     * и выдает ссылку на смену режима.
     */
    public function publishLink($item)
    {
        if (!($item instanceOf \Cake\ORM\Entity)) {
            return;
        }

        $title        = __('unpublish');
        $dataTitle    = __('Are you sure you want to publish?');
        $style_mode   = 'btn-warning';

        if ($item->published) {
            $title        = __('publish');
            $dataTitle    = __('Are you sure you want to be removed from publication?');
            $style_mode   = 'btn-success';
        }

        return $this->SmartHtml->postLink(
            $title,
            $this->Url->build(
                [
                    'controller' => $item->getSource(),
                    'action' => 'setPublished',
                    h($item->id)
                ]
            ),
            [
                'class' => 'btn btn-xs ' . $style_mode,
                'data-title' => $dataTitle
            ]
        );
    }
}
