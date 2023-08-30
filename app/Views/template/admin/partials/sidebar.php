<!--Sidebar-->
<aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

    <ul class="list-reset flex flex-col">
        <?php foreach ($sidebar as $item) : ?>
            <li class=" w-full h-full py-3 px-2 border-b border-light-border <?= $item['selected'] ? 'bg-white' : '' ?>">
                <a href="<?= $item['url'] ?>" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    <i class="<?= $item['icon'] ?> float-left mx-2"></i>
                    <?= $item["text"] ?>
                </a>
            </li>
        <?php endforeach; ?>


    </ul>
    </li>
    </ul>

</aside>
<!--/Sidebar-->