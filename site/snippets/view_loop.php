<section class="st-wrapper" id="<?php echo $page->parent()->uid() ?>">

    <?php if(kirby()->request()->params()->headers() == 'show' || !kirby()->request()->params()->headers()): ?>
        <header class="st-header">
            <h<?php echo $page->parent()->depth() ?>><?php echo $page->parent()->title()->html() ?></h<?php echo $page->parent()->depth() ?>>
        </header>
    <?php endif; ?>

    <?php if(kirby()->request()->params()->notes() == 'show'): ?>
        <div class="st-notes">
            <?php echo $page->parent()->text()->kirbytext() ?>
        </div>
    <?php endif; ?>

    <?php if($page->parent()->hasSections()): ?>
        <?php foreach($page->parent()->sections() as $section): ?>
            <?php snippet('view_loop', array('page' => $section->view())); ?>
        <?php endforeach; ?>

    <?php elseif($page->parent()->hasHtmlcode()): ?>
        <div class="st-view">
            <?php echo $page->parent()->htmlcode()->html() ?>
        </div>

        <?php if(kirby()->request()->params()->code() == 'show'): ?>
            <div class="st-code">
                <pre>
                    <code>
                        <?php echo html($page->parent()->htmlcode(), $keepTags = false) ?>
                    </code>
                </pre>
            </div>
        <?php endif; ?>

    <?php endif; ?>

</section>