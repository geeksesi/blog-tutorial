<?php include __DIR__ . "/partials/header.php"; ?>
<div class="flex flex-1">
    <?php include __DIR__ . "/partials/sidebar.php"; ?>

    <!--Main-->
    <main class="bg-white-300 flex-1 p-3 overflow-hidden">

        <!-- Card Sextion Starts Here -->
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 ">

            <div class="rounded overflow-hidden shadow bg-white mx-2 w-full p-5">

                <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
                    <?= $extraMethod ?? '' ?>
                    <div class="space-y-12">


                        <div class="sm:col-span-3 my-5">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <input type="text" name="title" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-600 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $post->title ?? '' ?>">
                            </div>
                        </div>

                        <div class="col-span-full my-5">
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Thumbnail</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                <div class="h-12 w-12">
                                    <?php if (isset($post->thumbnail)) : ?>
                                        <img src="<?= $post->getThumbnailUrl() ?>" class="w-full" />
                                    <?php else : ?>
                                        <svg class="w-full text-gray-600" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                        </svg>
                                    <?php endif; ?>

                                </div>
                                <input type="file" name="thumbnail" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-600 hover:bg-gray-50" value="Upload Thumbnail" accept="image/png, image/jpeg, image/jpg" />
                            </div>
                        </div>


                        <div class="col-span-full my-5">
                            <div class="mt-2">
                                <textarea id="about" name="body" rows="30" class="block w-full rounded-md border-1 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-600 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $post->body ?></textarea>
                            </div>
                        </div>


                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button class="bg-indigo-600 rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm">Save</button>
                        </div>
                </form>

            </div>

        </div>



    </main>
    <!--/Main-->
</div>
<?php include __DIR__ . "/partials/footer.php"; ?>