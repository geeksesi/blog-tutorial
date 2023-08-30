<?php include __DIR__ . "/partials/header.php"; ?>

<div class="container mx-auto flex flex-wrap py-6">

    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        <article class="flex flex-col shadow my-4 w-full">
            <!-- Article Image -->
            <?php if (!empty($post->thumbnail)) : ?>
                <img class="hover:opacity-75" src="<?= $post->getThumbnailUrl() ?>">
            <?php endif; ?>
            <div class="bg-white flex flex-col justify-start p-6">
                <a class="text-blue-700 text-sm font-bold uppercase pb-4">Technology</a> <!-- @todo implement category -->
                <h1 class="text-3xl font-bold hover:text-gray-700 pb-4"><?= $post->title ?></h1>
                <p class="text-sm pb-8">
                    Published on <?= $post->createdAtHumanFormat() ?>
                </p>
                <?= $post->body ?>
            </div>
        </article>
        <!-- 
            <div class="w-full flex pt-6">
                <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                    <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
                </a>
                <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                    <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
                </a>
            </div> -->


    </section>

    <?php include __DIR__ . "/partials/sidebar.php"; ?>


</div>
<?php include __DIR__ . "/partials/footer.php"; ?>