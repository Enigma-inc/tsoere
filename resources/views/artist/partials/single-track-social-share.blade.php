<div class="social">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{$track->path}}" data-toggle="tooltip" title="share on facebook" target="_bl" type="button" class="btn btn-sm ink-reaction btn-floating-action btn-default-dark">
        <i class="text-lg text-info fa fa-facebook"></i>
    </a>
    <a href="whatsapp://send?text={{$track->path}}" type="button" class="btn btn-sm ink-reaction btn-floating-action btn-default-dark" target="_blank">
        <i data-toggle="tooltip" title="share on whatsapp" class="text-success text-ultra-bold fa fa-whatsapp"></i>
    </a>                                        
    <a href="https://twitter.com/intent/tweet?url={{$track->path}}" data-toggle="tooltip" title="share on twitter" target="_blank" type="button" class="btn btn-sm ink-reaction btn-floating-action btn-default-dark">
        <i class="text-info text-bold fa fa-twitter"></i>
    </a>
</div>