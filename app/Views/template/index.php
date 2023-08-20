<?php include __DIR__ . "/partials/header.php"; ?>


<div class="container mx-auto flex flex-wrap py-6">

    <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <?php foreach ($posts as $post) : ?>
            <article class="flex flex-col shadow my-4 w-full">
                <!-- Article Image -->
                <?php if (!empty($post->thumbnail)) : ?>
                    <a href="<?= $post->url() ?>" class="hover:opacity-75">
                        <img src="<?= $post->thumbnail ?>">
                    </a>
                <?php endif; ?>
                <div class="bg-white flex flex-col justify-start p-6">
                    <!-- <div class="text-blue-700 text-sm font-bold uppercase pb-4">
                            <a href="">Technology</a>
                            <span> - </span>
                            <a href="">Technology</a>
                        </div> -->
                    <a href="<?= $post->url() ?>" class="text-3xl font-bold hover:text-gray-700 pb-4"><?= $post->title ?></a>
                    <p href="<?= $post->url() ?>" class="text-sm pb-3">
                        Published on <?= $post->createdAtHumanFormat() ?>
                    </p>
                    <a href="<?= $post->url() ?>" class="pb-6"><?= $post->summery() ?></a>
                    <a href="<?= $post->url() ?>" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>

        <?php endforeach; ?>

        <!-- Pagination -->
        <div class="flex items-center py-8">
            <a href="#" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
            <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">2</a>
            <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next <i class="fas fa-arrow-right ml-2"></i></a>
        </div>

    </section>

    <?php include __DIR__ . "/partials/sidebar.php"; ?>


</div>
<?php include __DIR__ . "/partials/footer.php"; ?>