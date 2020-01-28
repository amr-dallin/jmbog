<?php
namespace Meta\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * MetaForm helper
 */
class MetaFormHelper extends Helper
{
    public $helpers = ['Form', 'Html', 'Image'];
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'tags' => [
            'title' => [],
            'description' => [],
            'og:title' => [],
            'og:description' => []
        ],
        'prefix' => '',
        'key' => 0
    ];

    public function render($metaTags, $prefix = '')
    {
        $this->setConfig('key', 0);
        $this->setConfig('prefix', $prefix);
        $this->tags($metaTags);

        $title = $this->title();
        $description = $this->description();
        $ogTitle = $this->ogTitle();
        $ogDescription = $this->ogDescription();

        return $this->Html->tag(
            'div',
            $this->Html->tag('div', $title . $description, ['class' => 'col-md-6 mb-4 mb-md-0']) .
                $this->Html->tag('div', $ogTitle . $ogDescription, ['class' => 'col-md-6']),
            ['class' => 'row']
        );
    }

    private function tags($metaTags)
    {
        if (empty($metaTags)) {
            return;
        }

        foreach($metaTags as $tag) {
            $this->setConfig("tags.{$tag->property}", [
                'id' => $tag->id,
                'value' => $tag->value
            ]);
        }
    }

    private function title()
    {
        $content = $this->Form->control(
            $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.property",
            [
                'type' => 'hidden',
                'value' => 'title'
            ]
        );
        $content .= $this->Form->control(
            $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.value",
            [
                'placeholder' => __d('smart_admin', 'Title Tag'),
                'value' => $this->getConfig('tags.title.value')
            ]
        );

        if ($this->getConfig('tags.title.id')) {
            $content .= $this->Form->control(
                $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.id",
                [
                    'type' => 'hidden',
                    'value' => $this->getConfig('tags.title.id')
                ]
            );
        }

        $this->setConfig('key', $this->getConfig('key') + 1);

        return $content;
    }

    private function description()
    {
        $content = $this->Form->control(
            $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.property",
            [
                'type' => 'hidden',
                'value' => 'description'
            ]
        );
        $content .= $this->Form->control(
            $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.value",
            [
                'rows' => 2,
                'placeholder' => __d('smart_admin', 'Meta Description'),
                'value' => $this->getConfig('tags.description.value')
            ]
        );

        if (!empty($this->getConfig('tags.description.id'))) {
            $content .= $this->Form->control(
                $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.id",
                [
                    'type' => 'hidden',
                    'value' => $this->getConfig('tags.description.id')
                ]
            );
        }

        $this->setConfig('key', $this->getConfig('key') + 1);

        return $content;
    }

    private function ogTitle()
    {
        $content = $this->Form->control(
            $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.property",
            [
                'type' => 'hidden',
                'value' => 'og:title'
            ]
        );
        $content .= $this->Form->control(
            $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.value",
            [
                'placeholder' => __d('smart_admin', 'Open Graph Title'),
                'value' => $this->getConfig('tags.og:title.value')
            ]
        );

        if (!empty($this->getConfig('tags.og:title.id'))) {
            $content .= $this->Form->control(
                $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.id",
                [
                    'type' => 'hidden',
                    'value' => $this->getConfig('tags.og:title.id')
                ]
            );
        }

        $this->setConfig('key', $this->getConfig('key') + 1);

        return $content;
    }

    private function ogDescription()
    {
        $content = $this->Form->control(
            $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.property",
            [
                'type' => 'hidden',
                'value' => 'og:description'
            ]
        );
        $content .= $this->Form->control(
            $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.value",
            [
                'rows' => 2,
                'placeholder' => __d('smart_admin', 'Open Graph Description'),
                'value' => $this->getConfig('tags.og:description.value')
            ]
        );

        if (!empty($this->getConfig('tags.og:description.id'))) {
            $content .= $this->Form->control(
                $this->getConfig('prefix') . "meta_tags.{$this->getConfig('key')}.id",
                [
                    'type' => 'hidden',
                    'value' => $this->getConfig('tags.og:description.id')
                ]
            );
        }

        $this->setConfig('key', $this->getConfig('key') + 1);

        return $content;
    }
}
