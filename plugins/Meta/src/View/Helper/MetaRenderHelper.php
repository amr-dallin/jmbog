<?php
namespace Meta\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * MetaRender helper
 */
class MetaRenderHelper extends Helper
{
    /**
     * Helpers used by this helper.
     *
     * @var array
     */
    public $helpers = ['Html', 'Text', 'Image', 'Url'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'title' => null,
        'description' => null,
        'fb' => [
            'app_id' => null
        ],
        'og' => [
            'title' => null,
            'description' => null,
            'url' => null,
            'type' => 'website',
            'site_name' => null,
            'locale' => null,
            'image' => [
                'url' => null,
                'width' => null,
                'height' => null,
                'type' => null
            ]
        ],
        'twitter' => [
            'card' => 'summary',
            'site' => null,
            'creator' => null
        ]
    ];

    private $item;

    public function init($item)
    {
        if (null === $item) {
            return $this;
        }

        $this->item = $item;
        foreach($this->item->meta_tags as $tag) {
            $this->setConfig(str_replace(':', '.', $tag->property), $tag->value);
        }

        $this->setTitle();
        $this->setDescription();

        $this->setConfig(
            'og.url',
            $this->Url->build(
                $this->getView()->getRequest()->getAttribute('here'),
                true
            )
        );

        return $this;
    }

    public function setTitle($title = null)
    {
        if (null !== $title) {
            $this->setConfig('title', $this->truncate($title, 60));
            return $this;
        }

        if (
            empty($this->getConfig('title')) &&
            isset($this->item->title) &&
            !empty($this->item->title)
        ) {
            $this->setConfig(
                'title',
                $this->truncate($this->item->title, 60)
            );
        }

        return $this;
    }

    public function setDescription($description = null)
    {
        if (null !== $description) {
            $this->setConfig('description', $this->truncate($description, 160));
            return $this;
        }

        if (
            empty($this->getConfig('description')) &&
            isset($this->item->body) &&
            !empty($this->item->body)
        ) {
            $this->setConfig('description', $this->truncate($this->item->body, 160));
        }

        return $this;
    }

    private function truncate(string $text, int $length = 60)
    {
        return strip_tags(
            $this->Text->truncate(
                $text,
                $length,
                [
                    'ellipsis' => '',
                    'exact' => false,
                    'html' => true
                ]
            )
        );
    }

    /**
     * Render view block.
     *
     * @return string
     */
    public function render()
    {
        $tags  = $this->baseMetaTagsRender();
        $ogTags = $this->openGraphMetaTagsRender();
        if (null !== $ogTags) {
            $tags .= $ogTags;
            $tags .= $this->Html->meta([
                'property' => "fb:app_id",
                'content' => $this->getConfig('fb.app_id')
            ]);
            $tags .= $this->twitterMetaTagsRender();
        }

        return $tags;
    }

    private function baseMetaTagsRender()
    {
        $tags = $this->Html->meta([
            'link' => $this->Url->build(
                $this->getView()->getRequest()->getAttribute('here'),
                true
            ),
            'rel' => 'canonical'
        ]);

        if (!empty($this->getConfig('title'))) {
            $tags .= $this->Html->tag('title', $this->getConfig('title'));
        }

        if (!empty($this->getConfig('description'))) {
            $tags .= $this->Html->meta('description', $this->getConfig('description'));
        }

        return $tags;
    }

    private function openGraphMetaTagsRender()
    {
        if (empty($this->getConfig('og.title'))) {
            return null;
        }

        $tags = '';
        foreach($this->getConfig('og') as $key => $value) {
            if (empty($value) || $key === 'image') {
                continue;
            }

            if (is_array($value)) {
                foreach($value as $k => $v) {
                    $tags .= $this->Html->meta([
                        'property' => "og:{$key}:{$k}",
                        'content' => $v
                    ]);
                }
                continue;
            }

            $tags .= $this->Html->meta([
                'property' => "og:{$key}",
                'content' => $value
            ]);
        }

        return $tags;
    }

    private function twitterMetaTagsRender()
    {
        $tags = '';
        foreach ($this->getConfig('twitter') as $key => $value) {
            if (empty($value)) {
                continue;
            }
            $tags .= $this->Html->meta(['name' => "twitter:{$key}", 'content' => $value]);
        }

        return $tags;
    }
}
