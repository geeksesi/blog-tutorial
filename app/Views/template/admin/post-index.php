<?php include __DIR__ . "/partials/header.php"; ?>
<div class="flex flex-1">
    <?php include __DIR__ . "/partials/sidebar.php"; ?>

    <!--Main-->
    <main class="bg-white-300 flex-1 p-3 overflow-hidden">

        <!-- Card Sextion Starts Here -->
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

            <!-- card -->

            <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                <div class="px-6 py-2 border-b border-light-grey flex justify-between">
                    <div class="font-bold text-xl">Trending Categories</div>
                    <a href="/admin/post/create" class="font-bold text-xl p-2 bg-green-600 text-white rounded">Create a Post</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-grey-darkest">
                        <thead class="bg-grey-dark text-white text-normal">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">title</th>
                                <th scope="col">created at</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $post) : ?>
                                <tr>
                                    <th scope="row"><?= $post->id ?></th>
                                    <td>
                                        <?= $post->title ?>
                                    </td>
                                    <td><?= $post->createdAtHumanFormat() ?></td>
                                    <td class="flex space-between justify-around">
                                        <a href="<?= $post->url() ?>" class="text-green-500"><i class="fas fa-eye"></i></a>
                                        <a href="/admin/post/edit/<?= $post->id ?>" class="text-black-500"><i class="fas fa-edit"></i></a>
                                        <a class="text-red-500" href="/admin/post/delete/<?= $post->id ?>">
                                            <button type=" submit"><i class="fas fa-trash-alt"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /card -->

        </div>
        <!-- /Cards Section Ends Here -->

        <?php include __DIR__ . "/partials/pagination.php"; ?>


    </main>
    <!--/Main-->
</div>
<?php include __DIR__ . "/partials/footer.php"; ?>