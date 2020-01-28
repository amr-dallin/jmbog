<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
return [
    'prevActive' => '<li><a href="{{url}}" title="'. __('Previous Page') . '">«</a></li>',
    'prevDisabled' => '',
    'nextActive' => '<li><a href="{{url}}" title="'. __('Next Page') . '">»</a></li>',
    'nextDisabled' => '',
    'first' => '<a class="pagination__prev" href="{{url}}" title="'. __('First Page') . '">« '. __('First Page') . '</a> ',
    'last' => '<a class="pagination__next" href="{{url}}" title="'. __('Last Page') . '">'. __('Last Page') . ' »</a>',
    'number' => '<li><a href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="pagination__current">{{text}}</li>',
    'counterPages' => '<p><br/>'. __('Page') . ' {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total</p>'
    
];
