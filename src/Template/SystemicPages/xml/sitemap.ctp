<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= $this->Url->build(['_name' => 'home'], true) ?></loc>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= $this->Url->build(['controller' => 'Events', 'action' => 'index'], true) ?></loc>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= $this->Url->build(['controller' => 'Plots', 'action' => 'index'], true) ?></loc>
        <priority>0.8</priority>
    </url>

    <?php foreach($events as $event): ?>
    <url>
        <loc><?= $this->Url->build(['_name' => 'event_view', 'id' => $this->Number->format($event->id)], true) ?></loc>
    </url>
    <?php endforeach; ?>
</urlset>
