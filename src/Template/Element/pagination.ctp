<div class="pagination">
    <?php
    echo $this->Paginator->first();
    echo $this->Html->tag('ol', $this->Paginator->prev() . $this->Paginator->numbers() . $this->Paginator->next());
    echo $this->Paginator->last();
    ?>
</div>